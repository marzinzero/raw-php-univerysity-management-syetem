<?php include"header.php"; ?>


<?php
if(session::getsession("role") == "Admin"){
//admin permit start
?>
<?php    ////////////////////////////////////////////////////      ?>



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
         <a href="#"><h4 class="h4">Dashboard</h4></a>
       </div>
     </div>

       <div class="logs">
     <a href="../student.php"><span><i class="fas fa-user fadesign"></i></span>Students</a>
    </div>

    <div class="logs">
     <a href="courses.php"><span><i class="fas fa-address-book fadesign"></i></span>Courses</a>
    </div>

    <div class="logs">
     <a href="marks.php"><span><i class="fas fa-user-edit fadesign"></i></span>Marks</a>
   </div>

   <div class="logs">
     <a href="payment.php"><span><i class="fas fa-dollar-sign fadesign"></i></span>Payment status</a></li>
   </div>

 <div class="logs">
     <a href="routine.php"><span><i class="fas fa-address-card fadesign"></i></span>Class Routine</a>
 </div>

<div class="logs">
     <a href="transport.php"><span><i class="fas fa-bus-alt fadesign"></i></span>Transport</a>
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
        <table class="table">     
           <tr>
            <td style="text-align: left;">
               <a href="../action/addpayments.php"><button class="btn btn-dark">Insert Payments</button></a>
            </td>
         </tr>    
        </table>

    <?php  
        if(isset($_GET['action']) and $_GET['action'] == "delete"){
          $id = (int) $_GET['id'];
         $myaction->payments_del($id);
        }


     ?>


       <table class="table table-striped">
         <thead class="table-dark">
           <tr>
            <th>Student Id</th>
             <th>Semister</th>
             <th>Payment Amount</th>
             <th>Payment Date & Time</th>
             <th>Action</th>                
           </tr>
         </thead>
        <tbody>
          <?php

         $pay = $myaction->show_payments_admin();
         foreach($pay as $value) {
                 
              

             ?>
          <tr>
           <td><?php echo $value['student_id']; ?></td>
           <td><?php  echo $value['sem']; ?></td>
           <td><?php  echo $value['payment_amount']; ?></td>
           <td><?php  echo $value['payment_date']; ?></td>
           <td>
                             <span><i class="fas fa-edit"></i></span>
<?php echo "<a href='../action/editpayment.php?action=edit&id=".$value['student_id']."'><span class='btn btn-info btn-sm'>Edit</span></a>"; ?> || 
                <span>
                  <i class="fas fa-trash-alt"></i>
                </span>
    <?php echo "<a href='?action=delete&id=".$value['student_id']."'><span class='btn btn-danger btn-sm'>Delete<span/></a>"; ?>
           </td> 
          </tr>

<?php } ?>

         </tbody>
       </table>
     </div>
  </div>
</div>








<?php //////////////////////////////////////////////////// 
} else {




    ?>

<div class="container-fluid">
  <div class="row">
  <div class="col-md-2 sidebar" style="background-color:rgba(50, 50, 50, .8);">

        <div class="" style="padding:10px 10px 10px 30px;color:#fff">        
        <?php 
        $name = session::getsession("studentname");
          if($name){
            echo $name;
          }

         ?>
     </div>


    <ul>  

     <div class="mydash">
     <div class="logs">
         <a href="home.php"><h4 class="h4">Dashboard</h4></a>
       </div>
     </div>

    <div class="logs">
     <a href="courses.php"><span><i class="fas fa-address-book fadesign"></i></span>Courses</a>
    </div>

    <div class="logs">
     <a href="marks.php"><span><i class="fas fa-user-edit fadesign"></i></span>Marks</a>
   </div>

   <div class="logs">
     <a href="payment.php"><span><i class="fas fa-dollar-sign fadesign"></i></span>Payment status</a></li>
   </div>

 <div class="logs">
     <a href="routine.php"><span><i class="fas fa-address-card fadesign"></i></span>Class Routine</a>
 </div>

<div class="logs">
     <a href="transport.php"><span><i class="fas fa-bus-alt fadesign"></i></span>Transport</a>
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
   <table class="table">
    <tr>
      <td><button class="btn btn-dark">Students Payment Status</button></td>
      <td style="text-align: right;"><a href="../index.php"><button class="btn btn-dark">Back</button></a></td>
    </tr>
  </table>


    <!-- body nav end-->


       <table class="table">
         <thead class="table-dark">
           <tr>
             <th>Semister</th>
             <th>Payment Amount</th>
             <th>Payment Date & Time</th>                
           </tr>
         </thead>
        <tbody>
          <?php
           $id = session::getsession("id");
            foreach ($myclass->show_payments($id) as $value) {
                 
              

             ?>
          <tr>
           <td><?php  echo $value['sem']; ?></td>
           <td><?php  echo $value['payment_amount']; ?></td>
           <td><?php  echo $value['payment_date']; ?></td>
          <tr>

<?php } ?>

            <tr>
              <td class="bg-info">Total Payment:</td>
              <td class="bg-info"><strong>
                <?php
                $id = session::getsession("id");
                 $pay = $myclass->total_payments($id);
                 foreach ($pay as $value) {
                   echo $value;
                 }
               

                ?>
   
              </strong></td>
              <td class="bg-info"></td>
            </tr>
         </tbody>
       </table>
     </div>
  </div>
</div>


<?php  }  ?>
<!--jquery linkup here -->



<?php  include "../footer.php"; ?>