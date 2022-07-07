     
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
         <td>Students Role</td>
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
  if(isset($_POST['role'])){

    $student_id = $_POST['student_id'];
    $student_role = $_POST['student_role'];

      if($student_id == "" or $student_role == ""){
        echo "<div class='alert alert-warning'><strong>Warning! </strong>Field must not be empty</div>";
      }else{

      $role = $myclass->set_role($student_id, $student_role);
        if($role){
          echo "<div class='alert alert-success'><strong>Success! </strong>Successfully add students Role</div>";
        }
  } 
   }


    ?>
<form action="<?php  echo $_SERVER['PHP_SELF']; ?>" method="post" >

   <table class="table">
     <tbody>
       <tr>
         <td>Student Id</td><td><input type="text" name="student_id" class="form-control"></td>
         <td>Role</td>
         <td>
           <select name="student_role" class="form-control"">
             <option>Role</option>
             <option>Admin</option>
             <option>Editor</option>            
           </select>
         </td>
       </tr>

       <tr>
        <td><input type="submit" name="role" value="Add Role" class="btn btn-success">
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