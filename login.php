<?php 
  include "inc/session.php";
  include "inc/myclass.php";
   $myclass = new myclass;

   session::init();

   session::checksession();
   

?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico  and fontasasme linkup -->
  <link rel="stylesheet" href="font/css/fontawesome.min.css">
  <link rel="stylesheet" href="font/css/brands.min.css">
  <link rel="stylesheet" href="font/css/solid.min.css">

<!-- bootstrap and main css linkup -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/main.css">
</head>

<body>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->




  <div class="login-page" class="mypic" style="background-image: url(img/log-2.jpg);">
       <div class="container">
          <?php 


        
      $msg = "";
      if(isset($_POST['login'])){

        if($_POST['user'] == "" and $_POST['pass'] == "" ){
        $msg ="<div class='alert alert-danger'><strong>Danger! </strong>Field must not be empty</div>";
        }
        else{

        $user=$_POST['user'];
        $pass=$_POST['pass'];

        $log = $myclass->mylog($user, $pass);

        if($log){

          session::setsession("login", true);
          session::setsession("studentname", $log->name);
          session::setsession("id", $log->student_id);
          session::setsession("role", $log->role);

                 session::setsession("attn", $log->attendance);

          session::setsession("logmsg","<div class='alert alert-success'><strong>Success! </strong> Sueeseefully loging </div>");
          
          header("location:index.php");
        }else{
           $msg ="<div class='alert alert-danger'><strong>Danger! </strong>password or user id does not match</div>";
        }

      }

}

   ?>


          <div class="login-style">

       <form action="<?php  echo $_SERVER['PHP_SELF']; ?>" method="post" >



  <div class="form-group" style="max-width:400px;margin:0 auto; position: center;padding-top:200px;">
     <h3 class="h3" style="padding:15px">School Management System</h3>
    <?php

         if($msg){
          echo $msg;
         }
     ?>



    
           
<label class="sr-only" for="inlineFormInputGroupUsername">User Id</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text"><span><i class="fas fa-user"></i></span></div>
        </div>
        <input type="text" class="form-control"  name="user" id="inlineFormInputGroupUsername" placeholder="User Id...">
      </div></br>

      <label class="sr-only" for="inlineFormInputGroupUsername">Password</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text"><span><i class="fas fa-key"></i></span></div>
        </div>
        <input type="password" class="form-control"  name="pass" id="inlineFormInputGroupUsername" placeholder="password...">
      </div></br>
<!--
        <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
  </div>
--><input type="submit" name="login" value="Login" class="btn btn-info form-control" style="padding-top:5px;">



    </div>

  
 
</form>
       </div>
     </div>
  </div>
     

</body>

</html>
