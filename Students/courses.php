      
<?php 
  include "../inc/session.php";
  //include "../inc/myclass.php";
   //$myclass = new myclass;

   session::init();
  

  session::logcheck();
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
  <!--[if lte IE 9]>
  
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->
  <div class="container-fluid">
<nav class="navbar navbar-expand-lg " id="fixed" style="background-color:rgba(21, 21, 21, .9)">
  <a class="navbar-brand" href="#" style="color:rgba(221, 221, 221, .7)">School Management System</a>
  <div class="ml-auto logout" >
    <div class="log">     
    <span><i class="fas fa-power-off fadesign"></i></span><a href="?action=logout">Logout</a>
     </div>
         <?php  

  if(isset($_GET['action']) and $_GET['action'] == 'logout'){

    session::logout();
  }
 ?>
    </div>
    
</nav>

<div class="container-fluid">
  <div class="row">
  <div class="col-md-2 sidebar" style="background-color:rgba(50, 50, 50, .8);">
    <div class="user-img">
       <?php 
         $name =  session::getsession("studentname");
         if(isset($name)){
          echo $name;
         }


       ?> 
  </div>
    <ul>

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

     <div class="col-md-10" style="margin-top:20px;">
<!-- body nav start-->
            <nav class="navbar bg-color border-radius-nav" style="margin-bottom:20px;">
          <a class="navbar-brand page-banner" href="courses.php" >
            <span><i class="fas fa-address-book fadesign"></i></span>
          Courses</a>
            <div class="ml-auto logout" >
           <div class="page-banner-left">     
           <a style="color:#fff" href="index.php" ><span><i class="fas fa-arrow-circle-left"></i></span>Back</a>
           </div>
          </div> 
    </nav>


    <!-- body nav end-->

     <!-- body start-->

       

     <form action="" method="post">

       <table class="table">

           <tr class="bg-info">
             <td style="text-align: center;">You are Offer this courses</td>                 
           </tr>

           <?php 

            if(isset($courses)){
              echo "You have successfully inserted course";
            }
            ?>

            <tr>
               <td>
                <h3>Courses are Available</h3>
          <input type="checkbox" name="sub[]" value="Computer Architecture"> Computer Architecture <strong>CSE 6263</strong></br>
          <input type="checkbox" name="sub[]" value="Computer Pheripherals"> Computer Pheripherals <strong>CSE 6264</strong></br>
          <input type="checkbox" name="sub[]" value="Programming in c"> Programming in c <strong>CSE 6265</strong></br>
          <input type="checkbox" name="sub[]" value="Object oriended Programming"> Object oriended Programming <strong>CSE 6266</strong></br>
          <input type="checkbox" name="sub[]" value="compiler Design"> Compiler Design <strong>CSE 6266</strong></br>
          <input type="checkbox" name="sub[]" value="Physics"> Physics <strong>NT 5567</strong></br>
          <input type="checkbox" name="sub[]" value="Bangla"> Bangla <strong>NT 5545</strong></br>
          <input type="checkbox" name="sub[]" value="English part 1"> English part 1 <strong>NT 5542</strong></br>
          <input type="checkbox" name="sub[]" value="Machine Design"> Machine Design <strong>CSE 6267</strong></br>         
               </td>
            </tr>

           <tr>
            <td>
               <input type="submit" name="sub-send"  class="btn btn-success" value="Submit">
               <td>
           </tr>

            
            <tr>
               <td class="bg-info" style="text-align: center;">You are Registerd this courses</td>
            </tr>
          

          

            
            <tr>
              <td>
             <ol type="1">
                  <?php

                  include "../inc/myclass.php";

                  $my = new myclass;

                  

             if(isset($_POST['sub-send'])){
                $sub = 'sub[]';
                $subname = $_POST['sub'];
                 $sub_name=" ";
                 $id =  session::getsession("id");
            
                 foreach ($subname as $sub) {
                   $sub_name .= $sub. ",";
                   $id;
                 }
                $my->insertcourse($sub_name, $id);
                     


             ?>
              <?php 
                 foreach ($subname as $value) {
               # code...
             
             ?>
               <li><?php echo $value;  ?></li>
             <?php  }  




           } ?>
             </ol>             

          </td>
        </tr>


       </table>
     </form>
        <!-- body end-->
     </div>
  </div>
</div>

<!--jquery linkup here -->



<?php  include "../footer.php"; ?>