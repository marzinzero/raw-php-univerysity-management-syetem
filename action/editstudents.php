     
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

<!-- body nav start-->

    <!-- body nav end-->

     <!-- body start-->
     <table class="table">
      <tbody class="table-dark" style="text-align: center; padding:5px;">
        <tr>
         <td>Edit Students</td>        
       </tr>
      </tbody>
      
     </table>

  <table class="table">
    <tbody style="text-align: right; padding:5px;">
        <tr>
        <td>
          <a href="../index.php"><button class="btn btn-info">Back</button></a>
        </td>        
       </tr>
    </tbody>
  </table>
  <?php 
     
     if(isset($_POST['edit'])){

     $id = $_POST['id'];

    $student_id = $_POST['student_id'];
    $student_name = $_POST['student_name'];
    $student_birth = $_POST['student_birth'];
    $student_dep = $_POST['student_dep'];
    $student_batch = $_POST['student_batch'];
    $student_address = $_POST['student_address'];
    $student_pass = $_POST['student_pass'];

     $edit = $myclass->update_student_info($student_id, $student_name, $student_birth, $student_dep, $student_batch, $student_address, $student_pass, $id);
    if($edit){
    echo "<div class='alert alert-success'><strong>Success! </strong>Successfully Update students informations</div>";
     }
           
     }

      
   ?>

  <?php
    if(isset($_GET['action'])  and $_GET['action'] == "Edit"){
      $id = (int) $_GET['id'];

      $studetn_edit = $myclass->show_students_info($id);
       
         ?>

  <form action="<?php  echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">

  <table class="table table-responsive">
    
     <tbody>
      <input type="hidden" name="id"class="form-control" value="<?php echo $studetn_edit['student_id'];  ?>"  >
       <tr>
  <td>Student Id</td><td><input type="text" name="student_id"class="form-control" value="<?php echo $studetn_edit['student_id'];  ?>"  ></td>
  <td>Name</td><td><input type="text" value="<?php echo $studetn_edit['name'];  ?>" name="student_name" class="form-control" > </td>
       </tr>
        <tr>
         <td>Date of Birth</td><td><input type="text" value="<?php echo $studetn_edit['date_of_birth'];  ?>" name="student_birth" class="form-control"></td>
         <td>Depertment</td><td><input type="text" value="<?php echo $studetn_edit['dep'];  ?>" name="student_dep" class="form-control"></td>
       </tr>
        <tr>
         <td>Batch</td>
         <td>
           <input type="text" value="<?php echo $studetn_edit['batch'];  ?>" name="student_batch" class="form-control">
         </td>
         <td>Address</td><td><input type="text" value="<?php echo $studetn_edit['address'];  ?>" name="student_address" class="form-control"></td>
       </tr>
        <tr>
         <td>password</td><td><input type="text" value="<?php echo $studetn_edit['password'];  ?>" name="student_pass" class="form-control"></td>
         </tr>
         <tr>
          <td><input type="submit" name="edit" value="Edit" class="btn btn-success">
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
         <td>Student Id</td><td><input type="text" name="student_id" class="form-control" value="<?php  ?>"></td>
         <td>Name</td><td><input type="text" name="student_name" class="form-control"></td>
       </tr>
        <tr>
         <td>Date of Birth</td><td><input type="text" name="student_birth" class="form-control"></td>
         <td>Depertment</td><td><input type="text" name="student_dep" class="form-control"></td>
       </tr>
        <tr>
         <td>Batch</td>
         <td>
           <select name="student_batch">
             <option>Batch</option>
             <option>52th</option>
             <option>53th</option>
             <option>54th</option>
           </select>
         </td>
         <td>Address</td><td><input type="text" name="student_address" class="form-control"></td>
       </tr>
        <tr>
         <td>password</td><td><input type="password" name="student_pass" class="form-control"></td>
         </tr>
         <tr>
          <td><input type="submit" name="stdn" value="Insert" class="btn btn-success">
         </tr>
     </tbody>
   </table>
          
  
     </form>

   <?php } ?>
        <!-- body end-->
     
  </div>
</div>


<!--jquery linkup here -->



<?php  include "../footer.php"; ?>