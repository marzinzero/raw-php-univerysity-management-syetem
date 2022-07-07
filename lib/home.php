<?php include"header.php"; ?>

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

      
    <div class="row" style="padding:0px 20px; margin-left:-80px;">

        <div class="col-md-5 first-box ml-auto" style="margin-top:20px;">
            <div class="home-box">
             <a href="home.php"><span><i class="fas fa-home fa-2x"></i></span><h3>Home</h3></a>
             </div> 
           </div> 

           <div class="col-md-5 first-box ml-auto" style="margin-top:20px;">
            <div class="home-box">
             <a href="courses.php"><span><i class="fas fa-address-book fa-2x"></i></span><h3>Courses</h3></a>
             </div> 
           </div> 


      </div>
         
  <!--- 2nd start  -->
       <div class="row" style="padding:0px 20px;margin-left:-80px;">

    

      <div class="col-md-5 first-box ml-auto" style="margin-top:20px;">
       <div class="home-box">
        <a href="marks.php"><span><i class="fas fa-user-edit fa-2x"></i></span><h3>Marks</h3></a>
          </div> 
        </div>

       <div class="col-md-5 first-box ml-auto" style="margin-top:20px;">
       <div class="home-box">
        <a href="payment.php"><span><i class="fas fa-dollar-sign fa-2x"></i></span><h3>Payment status</h3></a>
          </div> 
        </div>

         </div>

           
<!--- 3rd start  -->
       <div class="row" style="padding:0px 20px;margin-left:-80px;">


      <div class="col-md-5 first-box ml-auto" style="margin-top:20px;">
       <div class="home-box">
        <a href="routine.php"><span><i class="fas fa-address-card fa-2x"></i></span><h3>Class Routine</h3></a>
          </div> 
        </div>


          <div class="col-md-5 first-box ml-auto" style="margin-top:20px;">
       <div class="home-box">
        <a href="transport.php"><span><i class="fas fas fa-bus-alt fa-2x"></i></span><h3>Transport</h3></a>
          </div> 
        </div>



         </div>

      

</div> 
    <!--- 3rd end  -->
</div>
<!--jquery linkup here -->



<?php  include "../footer.php"; ?>