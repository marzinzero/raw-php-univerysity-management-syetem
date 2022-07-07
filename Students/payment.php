     
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
  <div class="container-fluid">
<nav class="navbar navbar-expand-lg " id="fixed" style="background-color:rgba(21, 21, 21, .9)">
  <a class="navbar-brand" href="#" style="color:rgba(221, 221, 221, .7)">School Management System</a>
  <div class="ml-auto logout" >
    <div class="log">     
    <span><i class="fas fa-power-off fadesign"></i></span><a href="#">Logout</a>
     </div>
    </div>
    
</nav>

<div class="container-fluid">
  <div class="row">
  <div class="col-md-2 sidebar" style="background-color:rgba(50, 50, 50, .8);">
    <div class="user-img">
    <a href="#"><img src="../img/ethan.png"><span style="padding:0px 5px;">Ethan</span></a>
  </div>
    <ul>

      <div class="logs" style="margin-top:15px;">            
         <!----  
         <a href="home.php"><span><i class="fas fa-home fadesign"></i></span>Home</a>  
         -->
     </div>

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
     <!-- body header-->

<!-- body header end-->

     <div class="col-md-10" style="margin-top:20px;">

      <!-- body nav start-->
            <nav class="navbar bg-color border-radius-nav" style="margin-bottom:20px;">
          <a class="navbar-brand page-banner" href="courses.php" >
            <span><i class="fas fa-dollar-sign fadesign"></i></span>
          Payment Status</a>
            <div class="ml-auto logout" >
           <div class="page-banner-left">     
           <a style="color:#fff" href="index.php" ><span><i class="fas fa-arrow-circle-left"></i></span>Back</a>
           </div>
          </div> 
    </nav>


    <!-- body nav end-->


       <table class="table">
         <thead class="table-dark">
           <tr>
             <th>Semister</th>
             <th>Payment Amount</th>
             <th>Payment Date</th>                
           </tr>
         </thead>
        <tbody>
          <tr>
           <td>FAll 2018</td>
           <td>20500</td>
           <td><?php echo date("d-m-y") ?></td>
          <tr>

                 <tr>
           <td>FAll 2018</td>
           <td>20500</td>
           <td><?php echo date("d-m-y") ?></td>
          <tr>

                 <tr>
           <td>FAll 2018</td>
           <td>20500</td>
           <td><?php echo date("d-m-y") ?></td>
          <tr>

            <tr>
              <td class="bg-info">Total Payment:</td>
              <td class="bg-info"><strong>61500</strong></td>
              <td class="bg-info"></td>
            </tr>
         </tbody>
       </table>
     </div>
  </div>
</div>

<!--jquery linkup here -->



<?php  include "../footer.php"; ?>