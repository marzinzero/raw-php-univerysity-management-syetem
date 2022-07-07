     
<?php include"header.php"; ?>


<div class="container-fluid">
  <div class="row">
  <div class="col-md-2 sidebar" style="background-color:rgba(50, 50, 50, .8);">

        <div class="" style="padding:10px;color:#fff;text-align: center;">        
        <?php 
        $name = session::getsession("role");
          if($name){
            echo $name;
          }

         ?>
     </div>


    <ul>  

     <div class="mydash">
     <div class="logs">
         <a href="../index.php"><h4 class="h4">Dashboard</h4></a>
       </div>
     </div>
    <div class="logs">
     <a href="../student.php"><span><i class="fas fa-user fadesign"></i></span>Students</a>
    </div>

    <div class="logs">
     <a href="../lib/courses.php"><span><i class="fas fa-address-book fadesign"></i></span>Courses</a>
    </div>

    <div class="logs">
     <a href="../lib/marks.php"><span><i class="fas fa-user-edit fadesign"></i></span>Marks</a>
   </div>

   <div class="logs">
     <a href="../lib/payment.php"><span><i class="fas fa-dollar-sign fadesign"></i></span>Payment status</a>
   </div>

 <div class="logs">
     <a href="../lib/routine.php"><span><i class="fas fa-address-card fadesign"></i></span>Class Routine</a>
 </div>

<div class="logs">
     <a href="../lib/transport.php"><span><i class="fas fa-bus-alt fadesign"></i></span>Transport</a>
</div>

   </ul>
     </div>
     <div class="col-md-10" style="margin-top:20px;">

          <div style="padding-top:10px;">
         <?php 
         $msg =  session::getsession("logmsg");
         if(isset($msg)){
          echo $msg;
         }

    session::setsession("logmsg",  null);



       ?> 
<!-- body nav start-->

    <!-- body nav end-->

     <!-- body start-->
     <table class="table">
      <tbody class="table-dark" style="text-align: center; padding:5px;">
        <tr>
         <td>Students Marks</td>        
       </tr>
      </tbody>
      
     </table>

  <table class="table">
    <tbody style="text-align: right; padding:5px;">
        <tr>
        <td>
          <a href="../lib/marks.php"><button class="btn btn-info">Back</button></a>
        </td>        
       </tr>
    </tbody>
  </table>

      <?php 
      if(isset($_POST['update'])){

    $code = $_POST['mycode'];
    $student_id = $_POST['student_id'];
    $sub_name = $_POST['Subjetct'];
    $sub_code = $_POST['Code'];
    $sub_cgpa = $_POST['Cgpa'];
    $sub_grade = $_POST['Grade'];
    $marks = $myaction->update_marks($student_id, $sub_name, $sub_code, $sub_cgpa, $sub_grade, $code);
        if($marks){
         echo "<div class='alert alert-success'><strong>Success! </strong>Successfully Update students marks</div>";
     }
      }

      ?>



  <?php

    if(isset($_GET['action'])  and $_GET['action'] == "edit"){
      $code = $_GET['code'];

      $studetn_edit = $myclass->show_students_marks($code);
       
    
  
  ?>


<form action="<?php  echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" >

  <table class="table table-responsive">
    
     <tbody>
      <input type="hidden" name="mycode" class="form-control" value="<?php echo $studetn_edit['sub_code'];  ?>">
       <tr>
         <td>Id</td><td><input type="text" name="student_id" class="form-control" value="<?php echo $studetn_edit['student_id'];  ?>"></td>
         <td>Subjetct</td><td><input type="text" value="<?php echo $studetn_edit['sub_name'];  ?>" name="Subjetct" class="form-control"></td>
       </tr>
        <tr>
         <td>Subjetct Code</td><td><input type="text" value="<?php echo $studetn_edit['sub_code'];  ?>" name="Code" class="form-control"></td>
         <td>Cgpa</td><td><input type="text" value="<?php echo $studetn_edit['sub_cgpa'];  ?>" name="Cgpa" class="form-control"></td>
       </tr>
        <tr>
         <td>Grade</td><td><input type="text" value="<?php echo $studetn_edit['sub_grade'];  ?>" name="Grade" class="form-control"></td>
         </tr>
         <tr>
          <td><input type="submit" name="update" value="Update" class="btn btn-success">
         </tr>
     </tbody>
   </table>
          
  
     </form>
   <?php } else{ ?>

          <form action="<?php  echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" >

  <table class="table table-responsive">
    
     <tbody>
      <input type="hidden" class="form-control" >
       <tr>
         <td>Id</td><td><input type="text" name="student_id" class="form-control" v"></td>
         <td>Subjetct</td><td><input type="text" name="Subjetct" class="form-control"></td>
       </tr>
        <tr>
         <td>Subjetct Code</td><td><input type="text"  name="Code" class="form-control"></td>
         <td>Cgpa</td><td><input type="text"  name="Cgpa" class="form-control"></td>
       </tr>
        <tr>
         <td>Grade</td><td><input type="text"  name="Grade" class="form-control"></td>
         </tr>
         <tr>
          <td><input type="submit" name="update" value="Update" class="btn btn-success">
         </tr>
     </tbody>
   </table>
          
  
     </form>

    <?php } ?>
        <!-- body end-->
     </div>
  </div>
</div>


<!--jquery linkup here -->



<?php  include "../footer.php"; ?>