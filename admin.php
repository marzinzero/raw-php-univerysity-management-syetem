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

<div class="container-fluid">
<nav class="navbar navbar-expand-lg " id="fixed" style="background-color:#CBCBCB">
  <a class="navbar-brand" href="#"><img src="img/school.png" height="45px"></a>
  <div class="log ml-auto" >          
    <a href="#" class="btn btn-info">Logout</a>
    </div>      

</nav>
</div>



<!--body part-->
<div class="container-fluid">

<div class="col-md-2 dashboard" style="min-height:550px; background-color:#F8F9FA">
  <div class="uerimg">
  <img src="img/user.png" height="60px" width="60px"style="border-radius:50%; text-align: center;"><span style="color:#000; padding:0px 15px;">online</span>
</div>

  <div class="dasboard-menu">
      <div class="das">
          <a href="#">Dashboard</a>
      </div>
   <ul>     
     <li><a href="lib/address.php"> Address</a></li>
     <li><a href="lib/courses.php"> Courses</a></li>
     <li><a href="lib/marks.php"> Marks</a></li>
     <li><a href="lib/attendance.php">Attendance</a></li>
     <li><a href="lib/payment.php">Payment status</a></li>
     <li><a href="lib/certificate.php">Get certificate</a></li>
     <li><a href="lib/routine.php">Class Routine</a></li>     
   </ul>

     </div>
   </div>
</div>

<!--jquery linkup here -->



  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script> 

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->

  <script> 
  $(document).ready(function(){           


     $("#hide").click(function(){
       $("#show").fadeToggle('fast');
     });

  });
 </script>



</body>

</html>
