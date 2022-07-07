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
     <a href="payment.php"><span><i class="fas fa-dollar-sign fadesign"></i></span>Payment status</a>
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

    <!-- body nav end-->
            <table class="table">     
           <tr>
            <td style="text-align: left;">
               <a href="../action/addmarks.php"><button class="btn btn-dark">Insert Mraks</button></a>
            </td>
         </tr>    
        </table>


      <?php 
          

          if(isset($_GET['action']) and $_GET['action'] == "delete"){
            $code=$_GET['code'];
            $myaction->del_marks($code);
          }

       ?>

    <form action="" method="post">

        <table class="table table-striped">


          <thead class="table-dark">

            <tr style="text-align: center;">
              <th>Students ID</th>
              <th>Subjects</th>
              <th>Subjects Code</th>
              <th>CGPA</th>
              <th>Grade</th>
              <th>Action</th>  
            </tr>

          </thead>
          <tbody>

            <?php               
              
             $resuts = $myclass->show_results_students(); 
            foreach ($resuts as $value) {
                 
              

             ?>
            <tr style="text-align: center;">
              <td><?php  echo $value['student_id']; ?></td>
              <td><?php  echo $value['sub_name']; ?></td>
              <td><?php  echo $value['sub_code']; ?></td>
              <td><?php  echo $value['sub_cgpa']; ?></td>
              <td><?php  echo $value['sub_grade']; ?></td>
              <td>
                <span><i class="fas fa-edit"></i></span>
<?php echo "<a href='../action/editmarks.php?action=edit&code=".$value['sub_code']."'><span class='btn btn-info btn-sm'>Edit</span></a>"; ?> || 
                <span>
                  <i class="fas fa-trash-alt"></i>
                </span>
    <?php echo "<a href='?action=delete&code=".$value['sub_code']."'><span class='btn btn-danger btn-sm'>Delete</span></a>"; ?>
              </td>
            </tr>            
              <?php  } ?>

             
            


          </tbody>
        </table>

     </form>  
     </div>
  </div>


</div>




















<?php //////////////////////////////////////////////////// 
} else {




    ?>

<div class="container-fluid">
  <div class="row">
  <div class="col-md-2 sidebar" style="background-color:rgba(50, 50, 50, .8);">

        <div class="" style="padding:10px;color:#fff;text-align: center;">        
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
     <a href="payment.php"><span><i class="fas fa-dollar-sign fadesign"></i></span>Payment status</a>
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
   <table class="table">
    <tr>
      <td><button class="btn btn-dark">Students Marks</button></td>
      <td style="text-align: right;"><a href="../index.php"><button class="btn btn-dark">Back</button></a></td>
    </tr>
  </table>


    <!-- body nav end-->
    <form action="" method="post">
       <table class="table">
        <tr>
         <td class="bg-dark" style="text-align: center; color:#fff">Semister Resuts are show here</td>
        </tr>
         <tr>

           <td class="" style="text-align: center;">

             <select name="results[]">
              <option>Select Semister</option>
               <option id="my_show">Fall 2018</option>
               
               <!--
               <option>Spring 2018</option>
               <option>Summer 2018</option>
              -->
             </select>
           </td>
         </tr>
      

     
        </table>


        <table class="table" id="my_hide">


          <thead>

            <tr style="text-align: center;">
              <th>Subjects</th>
              <th>Subjects Code</th>
              <th>CGPA</th>
              <th>Grade</th>
            </tr>

          </thead>
          <tbody>

            <?php 
               
                $id = session::getsession("id");
                $resuts = $myclass->show_results($id); 
            foreach ($resuts as $value) {                
               

             ?>
    
               <tr style="text-align: center;">
             <td><?php  echo $value['sub_name']; ?></td>
              <td><?php  echo $value['sub_code']; ?></td>
              <td><?php  echo $value['sub_cgpa']; ?></td>
              <td><?php  echo $value['sub_grade']; ?></td>
              <td>
            </tr>            
              <?php  } ?>           
            
             

              <tr style="text-align: center;">
              <td class="bg-success"><Strong>Average:</Strong></td>
              <td class="bg-success"></td>
              <td class="bg-success">
                <?php
                $id = session::getsession("id");
                 $marks = $myaction->marks_avg($id);
                 foreach ($marks as $value) {
                   echo round($value,3);


              ?></td>
             <td class="bg-success">
              <?php 
            
                     if($marks == 4){

                      echo "A+";
                     }
                     elseif($marks >= 3.75){
                       echo "A";
                     }
                      elseif($marks >= 3.5){
                       echo "A-";
                     }
                      elseif($marks >= 3){
                       echo "B";
                     }
                     elseif($marks >= 2.75){
                       echo "C";
                     }
                      elseif($marks >= 2.5){
                       echo "D";
                     }
                     else{
                      echo "F";
                     }


             }  ?></td>
            </tr>
            


          </tbody>
        </table>

     </form>  
     </div>
  </div>


</div>


<?php } ?>

<!--jquery 
  
<script src="../js/jquery-ui.min.js"></script>
<script src="../js/jquery-3.3.1.min.js"></script> 
linkup here -->


  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/main.js"></script>
  <script src="../js/jquery-ui.min.js"></script>
  <script src="../js/jquery-3.3.1.min.js"></script> 

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->

  <script> 

    $(document).ready(function(){
     $("#my_show").click(function(){

       $("#my_hide").toggle('slow')
     });
  });


 </script>

</body>

</html>