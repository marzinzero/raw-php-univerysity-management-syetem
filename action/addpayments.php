     
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
         <td>Students Marks</td>        
       </tr>
      </tbody>
      
     </table>

  <table class="table">
    <tbody style="text-align: right; padding:5px;">
        <tr>
        <td>
          <a href="../lib/payment.php"><button class="btn btn-info">Back</button></a>
        </td>        
       </tr>
    </tbody>
  </table>

      <?php 
      if(isset($_POST['insert'])){    

    $student_id = $_POST['student_id'];
    $semister = $_POST['semister'];
    $payment_amount = $_POST['payment_amount'];
    $payment_date = $_POST['payment_date'];

    if($student_id == "" or $semister == "" or $payment_amount == "" or $payment_date == ""){
      echo "<div class='alert alert-warning'><strong>Warning! </strong>Field must not be empty.</div>";
    }
    elseif((int)$student_id == false){
        echo "<div class='alert alert-warning'><strong>Warning! </strong>Student id must be number.</div>";
    }else{
   
        $marks = $myaction->insert_payments($student_id, $semister, $payment_amount, $payment_date);
        if($marks){
         echo "<div class='alert alert-success'><strong>Success! </strong>Successfully insert students Payments</div>";
         }
 }

}

      ?>


   <?php  ?>

          <form action="<?php  echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" >

  <table class="table table-responsive">
    
     <tbody>
      
             <tr>
         <td>Student Id</td><td><input type="text"  name="student_id" class="form-control" v"></td>
         <td>Semister</td><td><input type="text"  name="semister" class="form-control"></td>
       </tr>
        <tr>
         <td>Payment Amount</td><td><input type="text" name="payment_amount" class="form-control"></td>
         <td>Payment Date</td><td><input type="text" name="payment_date" class="form-control" 
          value="<?php 
           $today = new datetime();
           date_default_timezone_set('Asia/Dhaka');
          echo $today->format('y-m-d').date(' h:i:s a');
          
          

          ?>"  

          >
        </td>
       </tr>
       <tr>
          <td><input type="submit" name="insert" value="Insert" class="btn btn-success">
         </tr>
          </tbody>

   </table>
          
  
     </form>

    <?php  ?>
        <!-- body end-->
     </div>
  </div>
</div>


<!--jquery linkup here -->



<?php  include "../footer.php"; ?>