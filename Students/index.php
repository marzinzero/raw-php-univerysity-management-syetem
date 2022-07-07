     
<?php 
  //include "../inc/session.php";
  //include "../inc/myclass.php";
   //$myclass = new myclass;

   //session::init();
  
 //session::logcheck();
  //session::logcheck();
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
  <link rel="stylesheet" href="../font/css/fontawesome.min.css">
  <link rel="stylesheet" href="../font/css/brands.min.css">
  <link rel="stylesheet" href="../font/css/solid.min.css">

<!-- bootstrap and main css linkup -->
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/main.css">
</head>

<body>
  <!--[if lte IE 9]>
  
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

<?php  

  if(isset($_GET['action']) and $_GET['action'] == 'logout'){

    session::logout();
  }
 ?>
  <div class="container-fluid">
<nav class="navbar navbar-expand-lg " id="fixed" style="background-color:rgba(21, 21, 21, .9)">
  <a class="navbar-brand" href="#" style="color:rgba(221, 221, 221, .7)">School Management System</a>
  <div class="ml-auto logout" >
    <div class="log">     
    <span><i class="fas fa-power-off fadesign"></i></span><a href="?action=logout">Logout</a>
     </div>
    </div>
    
</nav>    

<div class="container-fluid">
  <div class="row">
  <div class="col-md-2 sidebar" style="background-color:rgba(50, 50, 50, .8);">

    <div class="user-img">
 <!--
    
       <img src="../img/ethan.png"><span style="padding:0px 5px;"> 
   

  </span></a>

    -->
       <?php 
         $name =  session::getsession("studentname");
         if(isset($name)){
          echo $name;
         }


       ?> 
  </div>
<ul>
 <!----  
      <div class="logs" style="margin-top:15px;">            
        
         <a href="home.php"><span><i class="fas fa-home fadesign"></i></span>Home</a>  
        
     </div>
 -->
     <div class="mydash">
    <h4 class="h4">Dashboard</h4>
     </div>

  <div class="logs">
     <a href="attendance.php"><span><i class="fas fa-list-ol fadesign"></i></span>Attendance</a>
    </div>

    <div class="logs">
     <a href="courses.php"><span><i class="fas fa-address-book fadesign"></i></span>Courses</a>
    </div>

    <div class="logs">
     <a href="marks.php"><span><i class="fas fa-user-edit fadesign"></i></span>Marks</a>
   </div>

   <div class="logs">
     <a href="payment.php"><span><i class="fas fa-dollar-sign fadesign"></i></span>Payment status</a></li>
   </div>

 <div class="logs">
    <a href="certificate.php"><span><i class="fas fa-user-graduate fadesign"></i></span>Get certificate</a>
</div>

 <div class="logs">
     <a href="routine.php"><span><i class="fas fa-address-card fadesign"></i></span>Class Routine</a>
 </div>

<div class="logs">
     <a href="transport.php"><span><i class="fas fa-bus-alt fadesign"></i></span>Transport</a>
</div>
   </ul>
     </div>
     <!-- body header-->

<!-- body header end-->

  <div class="col-md-10">
    <div style="padding-top:10px;">
         <?php 
         $msg =  session::getsession("logmsg");
         if(isset($msg)){
          echo $msg;
         }

    session::setsession("logmsg",  null);



       ?> 
</div>
    <div class="row" style="padding:0px 20px;">



     <div class="col-md-6 first-box ml-auto" style="margin-top:20px;">
       <div class="home-box">
        <a href="index.php"><span><i class="fas fa-user fa-2x"></i></span><h3>Studetns Portal</h3></a>
        </div>

      </div>

       <div class="col-md-3 first-box ml-auto" style="margin-top:20px;">
       <div class="home-box">
        <a href="attendance.php"><span><i class="fas fa-list-ol fa-2x"></i></span><h3>Attendance</h3></a>
        </div>

         </div>
      </div>
         
  <!--- 2nd start  -->
       <div class="row" style="padding:0px 20px;">

        <div class="col-md-4 first-box" style="margin-top:20px;">
            <div class="home-box">
             <a href="courses.php"><span><i class="fas fa-address-book fa-2x"></i></span><h3>Courses</h3></a>
             </div> 
           </div> 

      <div class="col-md-3 first-box ml-auto" style="margin-top:20px;">
       <div class="home-box">
        <a href="marks.php"><span><i class="fas fa-user-edit fa-2x"></i></span><h3>Marks</h3></a>
          </div> 
        </div>

       <div class="col-md-3 first-box ml-auto" style="margin-top:20px;">
       <div class="home-box">
        <a href="payment.php"><span><i class="fas fa-dollar-sign fa-2x"></i></span><h3>Payment status</h3></a>
          </div> 
        </div>

         </div>

           
<!--- 3rd start  -->
       <div class="row" style="padding:0px 20px;">

        <div class="col-md-4 first-box" style="margin-top:20px;">
            <div class="home-box">
             <a href="certificate.php"><span><i class="fas fa-user-graduate fa-2x"></i></span><h3>Get certificate</h3></a>
             </div> 
           </div> 

      <div class="col-md-3 first-box ml-auto" style="margin-top:20px;">
       <div class="home-box">
        <a href="routine.php"><span><i class="fas fa-address-card fa-2x"></i></span><h3>Class Routine</h3></a>
          </div> 
        </div>

       <div class="col-md-3 first-box ml-auto" style="margin-top:20px;">
       <div class="home-box">
        <a href="transport.php"><span><i class="fas fa-bus-alt fa-2x"></i></span><h3>Transport</h3></a>
          </div> 
        </div>

         </div>

      

</div> 
    <!--- 3rd end  -->
</div>
<!--jquery linkup here -->



<?php  include "../footer.php"; ?>