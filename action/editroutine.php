     
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
         <td>Students Class Routine</td>        
       </tr>
      </tbody>
      
     </table>

  <table class="table">
    <tbody style="text-align: right; padding:5px;">
        <tr>
        <td>
          <a href="../lib/routine.php"><button class="btn btn-info">Back</button></a>
        </td>        
       </tr>
    </tbody>
  </table>


      <?php 
      if(isset($_POST['routine'])){

    $subject_name = $_POST['mysub'];

    $student_id = $_POST['student_id'];
    $sub_name = $_POST['subject_name'];
    $course_code = $_POST['course_code'];
    $tec_name = $_POST['tec_name'];
    $room_no = $_POST['room_no'];
    $time_slot = $_POST['time_slot'];
    $marks = $myaction->update_routine($student_id, $sub_name, $course_code, $tec_name, $room_no, $time_slot, $subject_name);
        if($marks){
         echo "<div class='alert alert-success'><strong>Success! </strong>Successfully Update students Routine</div>";
     }
      }

      ?>

  <?php

   if(isset($_GET['action'])  and $_GET['action'] == "edit"){
      $sub_name = $_GET['sub_name'];

      $studetn_edit = $myaction->show_students_routine($sub_name);
  ?>
  
<form action="<?php  echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" >

  <table class="table table-responsive">
    
     <tbody>
      <input type="hidden" name="mysub" value="<?php echo $studetn_edit['sub_name'];  ?>">
       <tr>
         <td>Student Id</td><td><input type="text" value="<?php echo $studetn_edit['student_id'];  ?>" name="student_id" class="form-control"></td>
         <td>Subject Name</td><td><input type="text" value="<?php echo $studetn_edit['sub_name'];  ?>" name="subject_name" class="form-control"></td>
       </tr>

       <tr>
         <td>Course Code</td><td><input type="text" value="<?php echo $studetn_edit['sub_code'];  ?>" name="course_code" class="form-control"></td>
         <td>Teacher Name</td><td><input type="text" value="<?php echo $studetn_edit['sub_tec'];  ?>" name="tec_name" class="form-control"></td>
       </tr>

       <tr>
         <td>Room No</td><td><input type="text" value="<?php echo $studetn_edit['sub_room'];  ?>" name="room_no" class="form-control"></td>
         <td>Time Slot</td><td><input type="text" value="<?php echo $studetn_edit['sub_time'];  ?>" name="time_slot" class="form-control"></td>
       </tr>

       <tr>
         <td><input type="submit" name="routine" value="Update" class="btn btn-success"></td>
        </tr>
     </tbody>
   </table>
          
  
     </form>

   <?php } else{ ?>

         <form action="<?php  echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" >

  <table class="table table-responsive">
    
     <tbody>
      <input type="hidden" name="mysub" >
       <tr>
         <td>Student Id</td><td><input type="text" name="student_id" class="form-control"></td>
         <td>Subject Name</td><td><input type="text" name="subject_name" class="form-control"></td>
       </tr>

       <tr>
         <td>Course Code</td><td><input type="text" name="course_code" class="form-control"></td>
         <td>Teacher Name</td><td><input type="text" name="tec_name" class="form-control"></td>
       </tr>

       <tr>
         <td>Room No</td><td><input type="text"  name="room_no" class="form-control"></td>
         <td>Time Slot</td><td><input type="text"  name="time_slot" class="form-control"></td>
       </tr>

       <tr>
         <td><input type="submit" value="Update" class="btn btn-success"></td>
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