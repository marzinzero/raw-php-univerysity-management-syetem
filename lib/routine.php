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
  
<div id="printTable">
<!--
       <table class="table">     
         <tr>
            <td class="table-dark" style="text-align: center;">Fall Semister 2018 Class Routine</td>
         </tr>     
        </table>
        --->
      <table class="table">     
           <tr>
            <td style="text-align: left;">
               <a href="../action/addroutine.php"><button class="btn btn-dark">Add Routine</button></a>
            </td>
         </tr>    
        </table>
      <?php
         if(isset($_GET['action']) and $_GET['action'] == "delete"){
            $sub_name= $_GET['sub_name'];
            $myaction->routin_del($sub_name);
          }

        

      ?>
     <form action="<?php  echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">

       <table class="table table-striped" id="">
         <thead class="table-dark table-hover">
           <tr style="text-align: center;">
            <th>Student Id</th>
             <th>Subject Name</th>
             <th>Course Code</th>
             <th>Teacher Name</th>
             <th>Room No</th>
             <th>Time</th>
             <th>Action</th>        
           </tr>
         </thead>
         <tbody>
               <?php  
                
                 $routine = $myaction->show_routine_admin();

                 foreach ($routine as $value) {                 

             ?>


             <tr style="text-align: center;">    
            <td><?php echo $value['student_id']; ?></td>   
            <td><?php echo $value['sub_name']; ?></td>
            <td><?php echo $value['sub_code']; ?></td>
            <td><?php echo $value['sub_tec']; ?></td>
            <td><?php echo $value['sub_room']; ?></td>
            <td><?php echo $value['sub_time']; ?></td>
            <td>
     <span><i class="fas fa-edit"></i></span>
     <?php echo "<a href='../action/editroutine.php?action=edit&sub_name=".$value['sub_name']."'><span class='btn btn-info btn-sm'>Edit</span></a>"; ?> || 
     <span><i class="fas fa-trash-alt"></i></span>
     <?php echo "<a href='?action=delete&sub_name=".$value['sub_name']."'><span class='btn btn-danger btn-sm'>Delete</span></a>"; ?>
            </td>
          </tr>

          <?php  } ?>

         </tbody>
       </table>
     </form>
     </div>      
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
      <td><button class="btn btn-dark">Students Routine</button></td>
      <td style="text-align: right;"><a href="../index.php"><button class="btn btn-dark">Back</button></a></td>
    </tr>
  </table>


    <!-- body nav end-->
  
<div id="printTable">
       <table class="table table-striped" id="">
         <thead class="table-dark table-hover">
                      <tr style="text-align: center;">
            <th>Student Id</th>
             <th>Subject Name</th>
             <th>Course Code</th>
             <th>Teacher Name</th>
             <th>Room No</th>
             <th>Time</th>
             <th>Action</th>        
           </tr>
         </thead>
         <tbody>
               <?php  
                  $id = session::getsession("id");
                 $routine = $myclass->show_routine($id);

                 foreach ($routine as $value) {                 

             ?>


             <tr style="text-align: center;">    
            <td><?php echo $value['student_id']; ?></td>   
            <td><?php echo $value['sub_name']; ?></td>
            <td><?php echo $value['sub_code']; ?></td>
            <td><?php echo $value['sub_tec']; ?></td>
            <td><?php echo $value['sub_room']; ?></td>
            <td><?php echo $value['sub_time']; ?></td>
      <td><span>
        <i class="fas fa-edit"></i></span>
        <a href="#">Edit</a> || <span><i class="fas fa-trash-alt"></i></span>
        <a href="#">Delete</a></td>
          </tr>

          <?php  } ?>

         </tbody>
       </table>
     </div>
       <button class="btn btn-dark" onclick="myprint();">Print Routine</button>
   </div>
  </div>
</div>

<?php } ?>

<!--jquery linkup here -->

<?php  include "../footer.php"; ?>