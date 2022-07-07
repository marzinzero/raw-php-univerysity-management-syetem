     
<?php include"header.php"; ?>




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
      <td>
        <a href="../action/addcourses.php"><button class="btn btn-dark">Add Courses</button></a>
      </td>
      <td style="text-align: right;"><a href="../index.php"><button class="btn btn-dark">Back</button></a></td>
    </tr>
  </table>


    <?php  
        if(isset($_GET['action']) and $_GET['action'] == "delete"){
          $sub =$_GET['sub'];
         $myaction->course_del($sub);
        }


     ?>
     <!-- body start-->
     <form action="" method="post">

       <table class="table table-striped">
  <thead class="table-dark">
        <tr style="text-align: center;">          
          <th>Student ID</th>
          <th>Registerd Courses</th>
          <th>Action</th>        
        </tr>
  </thead>

  <!--Pagination Start-->
      <?php

         $per_page = 6;
         if(isset($_GET['page'])){
          $page = $_GET['page'];
         }else{
          $page = 1;
         }

         $start_pages = ($page - 1) * $per_page;


      ?>


  <!--Pagination Start-->
    <tbody>
         <?php

          $sql ="SELECT * FROM courses limit $start_pages, $per_page";
          $stmt = db::mydb()->prepare($sql);      
          $stmt->execute();      
          $sub_view = $stmt->fetchAll();
                    
               //$sub_view = $myclass->show_course_admin();                        
              foreach ($sub_view as $value) {                           
                      
                ?>        
      <tr style="text-align: center;">
        
            <td><?php  echo $value['student_id']; ?></td>        

           <td><?php  echo $value['course_name']; ?> </td>              
            <td>
 <span><i class="fas fa-edit"></i></span>
<?php echo "<a href='../action/editcourses.php?action=edit&sub=".$value['course_name']."'><span class='btn btn-info btn-sm'>Edit</span></a>"; ?> || 
                <span>
                  <i class="fas fa-trash-alt"></i>
                </span>
    <?php echo "<a href='?action=delete&sub=".$value['course_name']."'><span class='btn btn-danger btn-sm'>Delete</span></a>"; ?>
            </td>                                 
          
      
           </tr>
 <?php } ?> 
            
   </tbody>
   
       </table>
     </form>
        <!-- body end-->
        <!--Pagination Start-->
            <?php

          $row ="SELECT * FROM courses";
          $stmt = db::mydb()->prepare($row);      
          $stmt->execute();

          $total_rows = $stmt->rowcount();
          $total_page = ($total_rows/$per_page);

            echo "<span class='pagination'><a href='courses.php?page=1'>".'First Page'."</a>";

              for ($i=1; $i <=$total_page; $i++) { 
                echo "<a href='courses.php?page=".$i."'>".$i."</a>";
              }

            echo "<a href='courses.php?page=$total_page'>".'Last Page'."</a></span>";
            ?>

        <!--Pagination End-->
     </div>
  </div>
</div>





<?php
}
else
{


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
      <td><button class="btn btn-dark">Students Courses</button></td>
      <td style="text-align: right;"><a href="../index.php"><button class="btn btn-dark">Back</button></a></td>
    </tr>
  </table>
    <!-- body nav end-->

     <!-- body start-->
     <form action="" method="post">

       <table class="table">

           <tr class="bg-dark">
             <td style="text-align: center;border-right:2px solid #fff; color:#fff">You are Offer this courses</td>
             <td style="text-align: center; color:#fff">You are Registerd this courses</td>       
           </tr>

            <tr>
               <td style="border-right:2px solid #ccc;">
                <h3>Courses are Available</h3>
    <input type="checkbox" name="sub[]" value="Computer Architecture CSE 6263"> Computer Architecture <strong>CSE 6263</strong></br>
    <input type="checkbox" name="sub[]" value="Computer Pheripherals CSE 6264"> Computer Pheripherals<strong>CSE 6264</strong></br>
    <input type="checkbox" name="sub[]" value="Programming in c CSE 6265"> Programming in c<strong>CSE 6265</strong></br>
<input type="checkbox" name="sub[]" value="Object oriended Programming CSE 6266"> Object oriended Programming<strong>CSE 6266</strong></br>
    <input type="checkbox" name="sub[]" value="compiler Design CSE 6266"> Compiler Design<strong>CSE 6266</strong></br>
    <input type="checkbox" name="sub[]" value="Physics NT 5567"> Physics<strong>NT 5567</strong></br>
   <input type="checkbox" name="sub[]" value="Bangla NT 5545"> Bangla<strong>NT 5545</strong></br>
     <input type="checkbox" name="sub[]" value="English part 1 NT 5542"> English part 1<strong>NT 5542</strong></br>
  <input type="checkbox" name="sub[]" value="Machine Design CSE 6267"> Machine Design<strong>CSE 6267</strong></br>         
               </td>
             

          <td style="border-bottom:1px solid #ccc;">
                <?php
                $id = session::getsession("id");
                     
                 if(isset($_POST['sub-send'])){

                    $sub = $_POST['sub'];
                                   
                  
               foreach ($sub as  $value) {
                //$sub_list = implode('', $sub);
                
               $reg = $myclass->insertcourse($value, $id);

              }
                  if($reg){
                  echo "<div class='alert alert-success'><strong>Success! </strong>Successfully registration Courses</div>";
                }
   

               }
               ?>




            <h3>You are Registered this course</h3>
             <ol type="1">     

               <?php            
               $sub_view = $myclass->show_course($id);
                 
                    foreach ($sub_view as $value) {                           
                         $show = $value['course_name']
                ?>
               <li><?php   echo $show;// ?></li>
                <?php } ?>
             </ol>
             

           </td>

           </tr>
           <tr>
            <td>
               <input type="submit" name="sub-send"  class="btn btn-success" value="Submit">
           </tr>

       </table>
     </form>
        <!-- body end-->
     </div>
  </div>
</div>

<?php }  ?>

<!--jquery linkup here -->



<?php  include "../footer.php"; ?>