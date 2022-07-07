<?php include"header.php"; ?>

<?php if(session::getsession("role") ==  "Admin"){ ?>

  <?php  ////////////////////  ?>


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
    </div>
<!-- body nav start-->

    <!-- body  nav end-->




    <table class="table">
         <tr>
          <td>
            <a href="../action/addtransport.php"><button class="btn btn-dark">Add Transport</button>
          </td>
         </tr>     
    </table>

        <?php  
        if(isset($_GET['action']) and $_GET['action'] == "delete"){
          $id = (int) $_GET['id'];
         $myaction->trasnport_del($id);
        }


     ?>
 
       <table class="table table-striped">
         <thead class="table-dark">
           <tr style="text-align: center;">
            <th>Student Id</th>
             <th>Bus No</th>
             <th>Route</th>
             <th>Time</th>
             <th>Action</th>             
           </tr>

         </thead>
         <tbody>
             <?php 
               
               
            foreach ($myaction->transport_admin() as $value) {               
            
             ?>
           <tr style="text-align: center;">
            <td><?php echo $value['student_id']; ?></td>
             <td><?php echo $value['bus_name']; ?></td>
             <td><?php echo $value['route']; ?></td>
             <td><?php echo $value['journey_time']; ?></td>
             <td>
                <span><i class="fas fa-edit"></i></span>
     <?php echo "<a href='../action/edittransport.php?action=edit&id=".$value['student_id']."'><span class='btn btn-info btn-sm'>Edit</span></a>"; ?> || 
     <span><i class="fas fa-trash-alt"></i></span>
     <?php echo "<a href='?action=delete&id=".$value['student_id']."'><span class='btn btn-danger btn-sm'>Delete</span></a>"; ?>
            </td>

           </tr>

         <?php } ?>

       </tbody>

       </table>

     </div>  
</div>















  <?php  

}else{

  ////////////////////


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
      <td><button class="btn btn-dark">Students Transports</button></td>
      <td style="text-align: right;"><a href="../index.php"><button class="btn btn-dark">Back</button></a></td>
    </tr>
  </table>


    <!-- body nav end-->

       <table class="table table-striped">
         <thead class="table-dark table-hover">
           <tr>
             <th>Bus No</th>
             <th>Route</th>
             <th>Time</th>             
           </tr>

         </thead>
         <tbody>
             <?php 


               
                $id = session::getsession("id");

                if($myclass->transport($id) == true)
                {
            foreach ($myclass->transport($id) as $value) {
                 
              

             ?>
           <tr>
             <td><?php echo $value['bus_name']; ?></td>
             <td><?php echo $value['route']; ?></td>
             <td><?php echo $value['journey_time']; ?></td>

           </tr>

         <?php

          }



          ?>

       </tbody></br>

       </table>
   
    <table class="table table-dark">
        <tr>
            <td>You have used Transpost</td>
         </tr>
    </table>
  <?php }else{ ?>
        <table class="table table-dark">
        <tr>
            <td>You have not used Transpost</td>
         </tr>
    </table>

<?php } ?>
     </div>
  </div>
</div>


<?php } ?>
<!--jquery linkup here -->



<?php  include "../footer.php"; ?>