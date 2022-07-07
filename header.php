<?php

spl_autoload_register(function($class){
   
   include "inc/"."$class".".php";


});

 session::init();
 session::logcheck();

$myclass = new myclass;
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

<div class="container-fluid">
<nav class="navbar navbar-expand-lg " id="fixed" style="background-color:rgba(21, 21, 21, .9)">
  <a class="navbar-brand" href="#" style="color:rgba(221, 221, 221, .7)">School Management System</a>
  <div class="ml-auto logout" >
    <div class="log">     
    <span><i class="fas fa-power-off fadesign"></i></span><a href="?action=logout">Logout</a>
     </div>
    </div>

    <?php  

  if(isset($_GET['action']) and $_GET['action'] == 'logout'){

    session::logout();
  }
 ?>
    
</nav>