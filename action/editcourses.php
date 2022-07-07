     
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
         <td>Edit Students Courses</td>        
       </tr>
      </tbody>
      
     </table>

  <table class="table">
    <tbody style="text-align: right; padding:5px;">
        <tr>
        <td>
          <a href="../lib/courses.php"><button class="btn btn-info">Back</button></a>
        </td>        
       </tr>
    </tbody>
  </table>

  <?php 
       if(isset($_POST['course'])){
         $id   = $_POST['student_id'];
         $sub  = $_POST['sub'];
         $mysub = $_POST['mysub'];

          $sub = $myaction->update_courses($id, $sub, $mysub);
         if($sub){
          echo "<div class='alert alert-success'><strong>Success! </strong>Successfully update students courses</div>";
         }
       }

    ?>

     <?php  
     
     if(isset($_GET['action']) and $_GET['action'] == "edit"){
        $sub =$_GET['sub'];
         $course = $myclass->student_course_show($sub);

          ?>

<form action="<?php  echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" >

  <table class="table table-responsive">
    
     <tbody>
      <input type="hidden" name="mysub" class="form-control" value="<?php echo $course['course_name']; ?>" >
      <tr>
     <td>Student Id</td>
    <td><input type="text" name="student_id" class="form-control" value="<?php echo $course['student_id']; ?>" ></td>
      <td>Couses</td>
        <td>
        <input type="text" name="sub" class="form-control" value="<?php echo $course['course_name']; ?>" ></td>      
        </tr>
        <tr>
          <td><input type="submit" name="course"  value="Update" class="btn btn-success"></td>
        </tr>     
     </tbody>
   </table>        
  </form>


 <?php

     }else{

   ?>
 
<form action="<?php  echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" >

  <table class="table table-responsive">
    
     <tbody>
       <tr>
         <td>Student Id</td><td><input type="text" name="student_id" class="form-control"></td>
         <td>Couses</td><td><input type="text" name="student_courses" class="form-control"></td>
        </tr>
        <tr>
          <td><input type="submit" name="course" value="Update" class="btn btn-success"></td>
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