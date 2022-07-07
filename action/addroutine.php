     
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
         <td>Students Class Routine</td>        
       </tr>
      </tbody>
      
     </table>

  <table class="table">
    <tbody style="text-align: right; padding:5px;">
        <tr>
        <td>
          <a href="../lib/routine.php"><button class="btn btn-info">Back</button></a>
        </td>        
       </tr>
    </tbody>
  </table>

  <?php 

  $msg;

  if(isset($_POST['routine'])){

    $student_id = $_POST['student_id'];
    $Subject = $_POST['Subject'];
    $Code = $_POST['Code'];
    $tec_name = $_POST['tec_name'];
    $room_no = $_POST['room_no'];
    $time_slot = $_POST['time'];   
           

        if($myclass->check_id($student_id) == true){
            $msg ="<div class='alert alert-warning'><strong>Warning! </strong>Student id is already Exist.</div>";
            echo $msg;
         }else{

  

      if($student_id == "" || $Subject == "" || $Code == "" || $tec_name == "" || $room_no == "" || $time_slot == ""){

           $msg ="<div class='alert alert-warning'><strong>Warning! </strong>Field must not be empty</div>";
           echo $msg;
        }


        elseif((int)$student_id == false)
        {
           $msg ="<div class='alert alert-warning'><strong>Warning! </strong>Id must be Number</div>";
           echo $msg;
        }
         else{

        $insert = $myaction->insert_students_routin($student_id, $Subject, $Code, $tec_name, $room_no, $time_slot);
        if($insert)
        {
           $msg ="<div class='alert alert-success'><strong>Success! </strong>Successfully add students Routine.</div>";
           echo $msg;
        }
      }
      }


}
  ?>
  
<form action="<?php  echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" >

  <table class="table table-responsive">
    
     <tbody>
       <tr>
         <td>Student Id</td><td><input type="text" name="student_id" class="form-control"></td>
         <td>Subject Name</td>
         <td>
             <SELECT name="Subject">
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
         <td>Course Code</td>
         <td>
             <SELECT name="Code">
             <option>Course Code</option>
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

         <td>Teacher Name</td><td>
            <select name="tec_name">
            <option>Teacher Name</option>
             <option>Md.Delowar Hossain</option>
             <option>Rafita haque</option>
             <option>Ekramul Haque</option>
             <option>Jannatul Naim</option>
             <option>Mayjatun Hasna</option>
           </select>
         </td>
       </tr>

        <tr>
         <td>Room No</td>
         <td>
           <select name="room_no">
             <option>Room No</option>
             <option>Room - 1103</option>
             <option>Room - 1104</option>
             <option>Room - 1206</option>
             <option>Room - 1209</option>
             <option>Room - 1303</option>
             <option>Room - 1305</option>
           </select>
         </td>

         <td>Time Slot</td>
         <td>
            <select name="time">
            <option>Time Slot</option>
            <option>8AM - 10AM</option>
            <option>10AM - 12AM</option>
            <option>2PM - 3PM</option>
            <option>3PM - 4PM</option>             
            </select>
      
         </td>
       </tr>

          <td><input type="submit" name="routine" value="Insert" class="btn btn-success">
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