
<?php  include "header.php"; ?>
<!--body part-->
<?php
if(session::getsession("role") == "Admin"){
//admin permit start
?>

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
         <a href="#"><h4 class="h4">Dashboard</a>
       </div>
     </div>

    <div class="logs">
     <a href="#"><span><i class="fas fa-user fadesign"></i></span>Students</a>
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
       </div> 
         
  <!--- 2nd start  -->


           
<!--- 3rd start  -->

      <table class="table">     
         <tr>            
          <td>
           <a href="action/addstudents.php"> <button class="btn btn-dark">Add Student</button></a>
            <a href="action/addrole.php"> <button class="btn btn-dark">Add Role</button></a>
          </td>
          
    <form action="action/search.php" METHOD="POST">
        <td>         
          <input type="text" name="search_txt" class="form-control" placeholder="Search">       
        </td>
        <td>
           <button type="submit" name="stdunet_serch" class="btn btn-dark">Search</button>    
        </td>
    </form>

         </tr>     
      </table>

      <?php 
          

          if(isset($_GET['action']) and $_GET['action'] == "Delete"){
            $id=(int) $_GET['id'];
            $myclass->delete_data($id);
          }

       ?>





<table class="table table-striped">
         <thead class="table-dark">
          <!-------pagination------->

          <?php 
            
            $per_page = 6;
             if(isset($_GET['page'])){
              $page = $_GET['page'];
             }else{
              $page = 1;
             }

             $start_pages = ($page - 1) * $per_page;
          
           
          ?>


          <!-----pagination--------->


           <tr style="text-align: center;">
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


    $sql  ="SELECT * FROM my_table limit $start_pages, $per_page";
    $stmt = db::mydb()->prepare($sql);
    $stmt->execute();
    $results =  $stmt->fetchAll();


   foreach ($results as $value) {
     # code...
   
         
           ?>
            <tr style="text-align: center;">
              <td><?php echo $value['id']; ?></td>
              <td><?php echo $value['student_id']; ?></td>
              <td><?php echo $value['name']; ?></td>
              <td><?php echo $value['dep']; ?></td>
              <td><?php echo $value['batch']; ?></td>
              <td><span><i class="fas fa-edit"></i></span>
      <?php echo "<a href='action/editstudents.php?action=Edit&id=".$value['student_id']."'><button class='btn btn-sm btn-info'>Edit</button></a>"; ?> || 
                <span>
                  <i class="fas fa-trash-alt"></i>
                </span>
    <?php echo "<a href='?action=Delete&id=".$value['student_id']."'<button class='btn btn-sm btn-danger'>Delete</button></a>"; ?>

              </td>    
           </tr>


           <?php } ?>
                       
          </tbody>

       </table>

          <!---pagination Start----->

            <?php

            $row  = "SELECT * FROM my_table";
            $results = db::mydb()->prepare($row);
            $results->execute();

            $total_rows = $results->rowcount();
            $total_pages = ceil($total_rows/$per_page);
           

            echo "<span class='pagination'><a href='index.php?page=1'>".'First Page'."</a>";

                for ($i=1; $i <= $total_pages ; $i++) { 
                          echo "<a href='index.php?page=".$i."'>".$i."</a>";
                         }         
        
            echo "<a href='index.php?page=$total_pages'>".'Last Page'."</a></span>"; ?>
     
          <!---pagination End----->
     </div>
  </div>
</div>



     </div>
  </div>
</div>


<?php } ?>

<?php  include "footer.php"; ?>