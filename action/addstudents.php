     
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
         <td>Students Insert</td>        
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

  $msg;
  
  if(isset($_POST['stdn'])){

    $student_id = $myaction->check($_POST['student_id']);
    $student_name = $myaction->check($_POST['student_name']);
    $student_birth = $myaction->check($_POST['student_birth']);
    $student_dep = $_POST['student_dep'];
    $student_batch = $_POST['student_batch'];
    $student_address = $myaction->check($_POST['student_address']);
    $student_pass = $myaction->check($_POST['student_pass']);
           

        if($myclass->check_id($student_id) == true){
            $msg ="<div class='alert alert-warning'><strong>Warning! </strong>Student id is already Exist.</div>";
            echo $msg;
         }else{

  

      if($student_id == "" || $student_name == "" || $student_birth == "" || $student_dep == "" || $student_batch == "" || $student_address == "" || $student_pass == ""){

           $msg ="<div class='alert alert-warning'><strong>Warning! </strong>Field must not be empty</div>";
           echo $msg;
        }


        elseif((int)$student_id == false)
        {
           $msg ="<div class='alert alert-warning'><strong>Warning! </strong>Id must be Number</div>";
           echo $msg;
        }
        //elseif(!preg_match("/^[a-zA-Z ]*$/",$student_name){       
              //echo "<div class='alert alert-warning'><strong>Warning! </strong>Only letters and white space allowed</div>";
          //}
      
        elseif(strlen($student_pass) < 6)
        {
           $msg ="<div class='alert alert-warning'><strong>Warning! </strong>Password must be more than 6 characters</div>";
           echo $msg;
        }else{

        $insert = $myclass->insert_students_info($student_id, $student_name, $student_birth, $student_dep, $student_batch, $student_address, $student_pass);
        if($insert)
        {
           $msg ="<div class='alert alert-success'><strong>Success! </strong>Successfully add students informations</div>";
           echo $msg;
        }
      }
      }


}

  ?>
  
<form action="<?php  echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" >

  <table class="table table-responsive">
    
     <tbody>
       <tr>
         <td>Student Id</td><td><input type="text" name="student_id" class="form-control"></td>
         <td>Name</td><td><input type="text" name="student_name" class="form-control"></td>
       </tr>
        <tr>
         <td>Date of Birth</td><td><input type="text" name="student_birth" class="form-control"></td>
         <td>Depertment</td><td>
            <select name="student_dep">
             <option>Dep</option>
             <option>CSE</option>
             <option>BBA</option>
             <option>EEE</option>
           </select>
         </td>
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
        <!-- body end-->
     </div>
  </div>
</div>


<!--jquery linkup here -->



<?php  include "../footer.php"; ?>