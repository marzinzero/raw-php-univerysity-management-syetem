     
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
            <table class="table">
              <tr class="table-light">
                 <td>Search page</td>
                 <td style="text-align:right;"><a href="../index.php"><button class="btn btn-primary btn-sm">Back</button></a></td>
              </tr>
            </table>
         <table class="table table-striped">
         
            <?php 
                  if(isset($_POST['stdunet_serch'])){

                     $search_txt = $_POST['search_txt'];

                     $search = $myclass->serch_name($search_txt);

                         if($search){
                         foreach ($search as $value) {
                           ?>
                                <thead class="table-dark">
                                  <tr>
                                    <th>Id No</th>
                                   <th>Name</th>
                                   <th>Address</th>                     
                                 </tr>
                                   </thead>
                             <tbody>


                                     <tr>
                                          <td><?php echo $value['student_id']; ?></td>
                                          <td><?php echo $value['name']; ?></td>
                                          <td><?php echo $value['address']; ?></td>
                                    </tr>
                                    </tbody>
                           <?php
                         }

                       }else{
                          echo "<div class='alert alert-warning'><strong>Warning! </strong>Data does not found</div>";
                         }

                  }

             ?>

 

     
         
    
        
          
        <!-- body end-->
     </div>
  </div>
</div>


<!--jquery linkup here -->



<?php  include "../footer.php"; ?>