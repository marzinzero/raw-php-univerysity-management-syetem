<?php
spl_autoload_register(function($class){

include "$class".".php";

});

class action{


	public function check($mydata){
		$mydata = trim($mydata);
		$mydata = stripcslashes($mydata);
		$mydata = htmlspecialchars($mydata);
		return $mydata;
	}

//show total avg marks of results

		public function marks_avg($id){
		$sql ="SELECT AVG(sub_cgpa) from results where student_id=:id";
		$stmt = db::mydb()->prepare($sql);
		$stmt->bindparam(':id',$id);
	    $stmt->execute();
	    return $stmt->fetch(PDO::FETCH_ASSOC);
	    
	   
	}

	//update studetns marks of results table

		public function update_marks($student_id, $sub_name, $sub_code, $sub_cgpa, $sub_grade, $code){
		$sql ="UPDATE results SET student_id=:id, sub_name=:name, sub_code=:code, sub_cgpa=:cgpa, sub_grade=:grade where sub_code=:checkcode";
		$stmt = db::mydb()->prepare($sql);
		$stmt->bindparam(':id', $student_id);
		$stmt->bindparam(':name', $sub_name);
		$stmt->bindparam(':code', $sub_code);
		$stmt->bindparam(':cgpa', $sub_cgpa);
		$stmt->bindparam(':grade', $sub_grade);
		$stmt->bindparam(':checkcode', $code);	
	    return $stmt->execute();
	    
	    
	   
	}

	//insert students marks for database
	public function insert_marks($student_id, $sub_name, $sub_code, $sub_cgpa, $sub_grade){

		$sql = "INSERT into results(student_id, sub_name, sub_code, sub_cgpa, sub_grade)values(:id, :name, :code, :cgpa, :grade)";
		$stmt = db::mydb()->prepare($sql);
		$stmt->bindparam(':id', $student_id);
		$stmt->bindparam(':name', $sub_name);
		$stmt->bindparam(':code', $sub_code);
		$stmt->bindparam(':cgpa', $sub_cgpa);
		$stmt->bindparam(':grade', $sub_grade);
		return $stmt->execute();

	}

//delete students marks for database
		public function del_marks($sub_code){

		$sql = "DELETE FROM results where sub_code=:code";
		$stmt = db::mydb()->prepare($sql);
		$stmt->bindparam(':code', $sub_code);
		return $stmt->execute();

	}
   //students payments for database


	public function show_students_payment($id){
		$sql = "SELECT * from payments where student_id=:id";
		$stmt = db::mydb()->prepare($sql);
		$stmt->bindparam(':id', $id);
		$stmt->execute();
		return $stmt->fetch();
	}

	public function show_payments_admin(){
		$sql = "SELECT * from payments";
		$stmt = db::mydb()->prepare($sql);		
	    $stmt->execute();
		return $stmt->fetchAll();
	}

	public function update_payments($student_id, $semister, $payment_amount, $payment_date, $id){
       $sql ="UPDATE payments SET student_id=:id, sem=:sem, payment_amount=:amount, payment_date=:payment_date where student_id=:mayid";
		$stmt = db::mydb()->prepare($sql);
		$stmt->bindparam(':id', $student_id);
		$stmt->bindparam(':sem', $semister);
		$stmt->bindparam(':amount', $payment_amount);
		$stmt->bindparam(':payment_date', $payment_date);
		$stmt->bindparam(':mayid', $id);		
	    return $stmt->execute();
	}

  public function payments_del($id){
		$sql = "DELETE from payments WHERE student_id=:id";
		$stmt = db::mydb()->prepare($sql);
		$stmt->bindparam(':id', $id);	
	    return $stmt->execute();		
	}

	public function insert_payments($student_id, $semister, $payment_amount, $payment_date){
		  $sql ="INSERT INTO payments (student_id, sem, payment_amount, payment_date) values(:id, :sem, :amount, :mydate)";
		$stmt = db::mydb()->prepare($sql);
		$stmt->bindparam(':id', $student_id);
		$stmt->bindparam(':sem', $semister);
		$stmt->bindparam(':amount', $payment_amount);
		$stmt->bindparam(':mydate', $payment_date);				
	    return $stmt->execute();
	}



	//students payments end function

	//students routine start function go here......

	public function show_students_routine($sub_name){
		$sql = "SELECT * from routine where sub_name=:sub_name";
		$stmt = db::mydb()->prepare($sql);
		$stmt->bindparam(':sub_name', $sub_name);
		$stmt->execute();
		return $stmt->fetch();

	}
  
	public function update_routine($student_id, $sub_name, $course_code, $tec_name, $room_no, $time_slot, $subject_name){
         
         $sql ="UPDATE routine SET student_id=:id, sub_name=:sub_name, sub_code=:sub_code, sub_tec=:sub_tec, sub_room=:sub_room, sub_time=:sub_time where sub_name=:mysub";
		$stmt = db::mydb()->prepare($sql);
		$stmt->bindparam(':id', $student_id);
		$stmt->bindparam(':sub_name', $sub_name);
		$stmt->bindparam(':sub_code', $course_code);
		$stmt->bindparam(':sub_tec', $tec_name);
		$stmt->bindparam(':sub_room', $room_no);
		$stmt->bindparam(':sub_time', $time_slot);
		$stmt->bindparam(':mysub', $subject_name);		
	    return $stmt->execute();


	}

	public function show_routine_admin(){
		$sql = "SELECT * from routine";
		$stmt = db::mydb()->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function insert_students_routin($student_id, $Subject, $Code, $tec_name, $room_no, $time_slot){
         $sql ="INSERT INTO routine (student_id, sub_name, sub_code, sub_tec, sub_room, sub_time) values(:id, :sub_name, :sub_code, :sub_tec, :sub_room, :sub_time)";
		$stmt = db::mydb()->prepare($sql);
		$stmt->bindparam(':id', $student_id);
		$stmt->bindparam(':sub_name', $Subject);
		$stmt->bindparam(':sub_code', $Code);
		$stmt->bindparam(':sub_tec', $tec_name);
		$stmt->bindparam(':sub_room', $room_no);
		$stmt->bindparam(':sub_time', $time_slot);
	    return $stmt->execute();

	}

     
     public function routin_del($sub_name){
		$sql = "DELETE from routine WHERE sub_name=:sub_name";
		$stmt = db::mydb()->prepare($sql);
		$stmt->bindparam(':sub_name', $sub_name);	
	    return $stmt->execute();	
     }
	//students routine End function ..............

    //students transport function start..............
    public function transport_admin(){
         $sql = "SELECT * FROM transport";
         $stmt = db::mydb()->prepare($sql);		 	
	     $stmt->execute();
	     return  $stmt->fetchAll();
    }

    public function show_students_trasnport($id){

    	$sql = "SELECT * from transport where student_id=:id";
		$stmt = db::mydb()->prepare($sql);
		$stmt->bindparam(':id', $id);
		$stmt->execute();
		return $stmt->fetch();

    }

  public function update_transport($id, $student_id, $bus_name, $route, $time){

   $sql ="UPDATE transport SET student_id=:id, bus_name=:bus_name, route=:route, journey_time=:journey_time where student_id=:myid";
    	$stmt = db::mydb()->prepare($sql);
		$stmt->bindparam(':id', $student_id);
		$stmt->bindparam(':bus_name', $bus_name);
		$stmt->bindparam(':route', $route);
		$stmt->bindparam(':journey_time', $time);
		$stmt->bindparam(':myid', $id);		
	    return $stmt->execute();

  }

  public function trasnport_del($id){

       $sql = "DELETE from transport WHERE student_id=:id";
		$stmt = db::mydb()->prepare($sql);
		$stmt->bindparam(':id', $id);	
	    return $stmt->execute();
  }

    public function  insert_transport($student_id, $bus_name, $route, $time_slot){

         $sql ="INSERT INTO transport (student_id, bus_name, route, journey_time) values (:id, :bus_name, :route, :journey_time)";
		$stmt = db::mydb()->prepare($sql);
		$stmt->bindparam(':id', $student_id);
		$stmt->bindparam(':bus_name', $bus_name);
		$stmt->bindparam(':route', $route);
		$stmt->bindparam(':journey_time', $time_slot);	
	    return $stmt->execute();

     }


    //students transport function End..............

     //students Courses function start..............

     public function update_courses($id, $sub, $mysub){
     	 $sql ="UPDATE courses SET student_id=:student_id, course_name=:course where course_name=:course_name";
     	 $stmt = db::mydb()->prepare($sql);
     	 $stmt->bindvalue(':student_id',$id);
     	 $stmt->bindvalue(':course',$sub);
         $stmt->bindvalue(':course_name',$mysub);
         $update =  $stmt->execute();
         return $update;


     }

     public function course_del($sub){
     	$sql = "DELETE from courses WHERE course_name=:name";
		$stmt = db::mydb()->prepare($sql);
		$stmt->bindparam(':name', $sub);	
	    return $stmt->execute();
     }

     public function insert_course($student_id, $course){
     	 $sql ="INSERT INTO courses (student_id, course_name) values (:id, :course_name)";
		$stmt = db::mydb()->prepare($sql);
		$stmt->bindparam(':id', $student_id);
		$stmt->bindparam(':course_name', $course);
	    return $stmt->execute();
     }
}


?>