
<td class="table-dark" style="text-align:center;"><strong>Total Studetns</strong></td>


<






<?php  include "header.php"; ?>
<!--body part-->
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
         <a href="lib/home.php"><h4 class="h4">Dashboard</h4></a>
       </div>
     </div>

    <div class="logs">
     <a href="lib/courses.php"><span><i class="fas fa-address-book fadesign"></i></span>Courses</a>
    </div>

    <div class="logs">
     <a href="lib/marks.php"><span><i class="fas fa-user-edit fadesign"></i></span>Marks</a>
   </div>

   <div class="logs">
     <a href="lib/payment.php"><span><i class="fas fa-dollar-sign fadesign"></i></span>Payment status</a></li>
   </div>

 <div class="logs">
     <a href="lib/routine.php"><span><i class="fas fa-address-card fadesign"></i></span>Class Routine</a>
 </div>

<div class="logs">
     <a href="lib/transport.php"><span><i class="fas fa-bus-alt fadesign"></i></span>Transport</a>
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
       <table class="table table-striped">
         <thead class="table-dark table-hover">


           <tr>
             <th>serial No</th>
             <th>Id No</th>
             <th>Name</th>
             <th>Dept</th>
             <th>Batch</th>
             <th>Action</th>           
           </tr>
         </thead>

          <tbody>
                      <?php 

   foreach ($myclass->show() as $value) {
     # code...
   
         
           ?>
            <tr>
              <td><?php echo $value['id']; ?></td>
              <td><?php echo $value['student_id']; ?></td>
              <td><?php echo $value['name']; ?></td>
              <td><?php echo $value['dep']; ?></td>
              <td><?php echo $value['batch']; ?></td>
              <td><span><i class="fas fa-edit"></i></span><a href="#">Edit</a> || <span><i class="fas fa-trash-alt"></i></span><a href="#">Delete</a></td>    
           </tr>


           <?php } ?>
                       
          </tbody>
       </table>
     </div>
  </div>
</div>

<!--jquery linkup here -->



<?php  include "footer.php"; ?>