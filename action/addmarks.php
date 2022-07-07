     
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
     <a href="../lib/payment.php"><span><i class="fas fa-dollar-sign fadesign"></i></span>Payment status</a></li>
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
         <td>Insert Students Marks</td>        
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

      if(isset($_POST['insert'])){

      $student_id = $_POST['student_id'];
      $sub_name = $_POST['Subjetct'];
      $sub_code = $_POST['Code'];
      $sub_cgpa = $_POST['Cgpa'];
      $sub_grade = $_POST['Grade'];

        if($student_id == "" or $sub_name == "" or $sub_code == "" or $sub_cgpa == "" or $sub_grade == ""){
      echo "<div class='alert alert-warning'><strong>Warning! </strong>Field must not be empty.</div>";
    }
    elseif((int)$student_id == false){
        echo "<div class='alert alert-warning'><strong>Warning! </strong>Student id must be number.</div>";
    }
    elseif((int)$sub_cgpa == false){
        echo "<div class='alert alert-warning'><strong>Warning! </strong>CGPA must be number.</div>";
    }else{

      $insert = $myaction->insert_marks($student_id, $sub_name, $sub_code, $sub_cgpa, $sub_grade);
       if($insert ){
        echo "<div class='alert alert-success'><strong>Success! </strong>Successfully Insert students marks</div>";
       }
        }
        }
   ?>

  
  

<form action="<?php  echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" >

  <table class="table table-responsive">
    
     <tbody>
         <tr>
         <td>Id</td><td><input type="text" name="student_id" class="form-control" v"></td>
         <td>Subjetct</td><td>
             <SELECT name="Subjetct">
             <option>Subjects Name</option>
             <option>Computer Architecture</option>
             <option>Computer Pheripherals</option>
             <option>Operating Sytem</option>
             <option>Networking</option>
             <option>Object Oriented Proramming</option>
             <option>Sytem Analysis And Design</option>
             <option>C Programming</option>
             <option>Compiler Design</option>
           </SELECT>
         </td>
       </tr>
        <tr>
         <td>Subjetct Code</td><td>
              <SELECT name="Code">
             <option>Subjects Code</option>
             <option>CSE 6263</option>
             <option>CSE 6264</option>
             <option>CSE 6265</option>
             <option>CSE 6266</option>
             <option>CSE 6267</option>
             <option>CSE 6268</option>
             <option>CSE 6269</option>
             <option>CSE 6370</option>
           </SELECT>
         </td>
         <td>Cgpa</td><td><input type="text"  name="Cgpa" class="form-control"></td>
       </tr>
        <tr>
         <td>Grade</td><td>
           <SELECT name="Grade">
             <option>Grade</option>
             <option>A+</option>
             <option>A</option>
             <option>A-</option>
             <option>B+</option>
             <option>B-</option>
             <option>C+</option>
             <option>C-</option>
             <option>F</option>
           </SELECT>
         </td>
         </tr>
         <tr>
          <td><input type="submit" name="insert" value="insert" class="btn btn-success">
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