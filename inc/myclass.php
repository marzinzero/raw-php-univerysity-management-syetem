<?php

spl_autoload_register(function($class){

include "$class".".php";

});


class myclass{
/*
	 public function check_sub($sub_name){
	 	$sql ="SELECT * FROM courses where course_name=:name";
		$stmt = db::mydb()->prepare($sql);	     
	     $stmt->bindvalue(':name', $sub_name);
	     $stmt->execute();	     
	     

	     if($stmt->rowcount() > 0){
	     	return $msg = "<div class='alert alert-warning'><strong>Warning! </strong>Subject already exist database.</div>";
	     }
	 }
*/
//insert couses Name function
	public function insertcourse($sub_name, $id){

		$sql ="insert into courses(student_id, course_name) values (:id, :subname)";
		$stmt = db::mydb()->prepare($sql);
	     $stmt->bindvalue(':subname', $sub_name);
	     $stmt->bindvalue(':id', $id);
	     return $stmt->execute();

	}

//Show couses Name function
     
     	public function show_course($id){

		$sql ="SELECT * FROM courses where student_id=:id";
		$stmt = db::mydb()->prepare($sql);	     
	     $stmt->bindvalue(':id', $id);
	     $stmt->execute();	     
	      return $stmt->fetchAll();
	    



	}
   //Show couses by admin permitation function 
/*
     	public function show_course_admin(){
		$sql ="SELECT * FROM courses";
		$stmt = db::mydb()->prepare($sql);	    
	    $stmt->execute();	     
	     return $stmt->fetchAll();
   



	}
	*/	 

    //check studetns id for database date 12/25/2018
	  	public function check_id($id){

		$sql ="SELECT student_id FROM my_table where student_id=:id";
		$stmt = db::mydb()->prepare($sql);	     
	    $stmt->bindvalue(':id', $id);
	    $stmt->execute();

	      if($stmt->rowcount() > 0){
	      	return true;
	      }else{
	      	return false;
	      }

	      
        }


        public function set_role($student_id, $student_role){
        	$sql = "UPDATE my_table set role=:role where student_id=:id";
        	$stmt = db::mydb()->prepare($sql);
        	$stmt->bindvalue(':role', $student_role);
        	$stmt->bindvalue(':id', $student_id);
         	return $stmt->execute();	
        }


       public function serch_name($search_txt){
        	$sql = "SELECT * from my_table where student_id like '%$search_txt%' or name like '%$search_txt%' or address like '%$search_txt%'";
        	$stmt = db::mydb()->prepare($sql);        
         	$stmt->execute();
         	return $stmt->fetchAll();	
        }


      //check studetns id for database date 12/25/2018 end


	   public function mylog($user, $pass){
		$sql ="SELECT * FROM my_table where student_id=:id and password=:password";
		$stmt = db::mydb()->prepare($sql);
	     $stmt->bindvalue(':id', $user);
	      $stmt->bindvalue(':password', $pass);
	      $stmt->execute();
	      return $stmt->fetch(PDO::FETCH_OBJ);



	}

/*
	   public function show(){
		$sql ="SELECT * FROM my_table limit 1,10";
		$stmt = db::mydb()->prepare($sql);
	    $stmt->execute();
	   return $stmt->fetchAll();
	}

	*/

		  public function show_results($id){
		$sql ="SELECT * FROM results where student_id=:id";
		$stmt = db::mydb()->prepare($sql);
		$stmt->bindparam(':id',$id);
	    $stmt->execute();
	   return $stmt->fetchAll();
	}



///////students maks for edit


	public function show_students_marks($code){
		$sql ="SELECT * FROM results where sub_code=:code";
		$stmt = db::mydb()->prepare($sql);
		$stmt->bindparam(':code',$code);
	    $stmt->execute();
	   return $stmt->fetch();

	}

	public function show_results_students(){
        $sql ="SELECT * FROM results";
		$stmt = db::mydb()->prepare($sql);		
	    $stmt->execute();
	    return $stmt->fetchAll();

	}

	public function show_payments($id){
		$sql ="SELECT * FROM payments where student_id=:id";
		$stmt = db::mydb()->prepare($sql);
		$stmt->bindparam(':id',$id);
	    $stmt->execute();
	   return $stmt->fetchAll();
	}


	//Show total avg of marks for database....


		public function total_payments($id){
		$sql ="SELECT SUM(payment_amount) from payments where student_id=:id";
		$stmt = db::mydb()->prepare($sql);
		$stmt->bindparam(':id',$id);
	    $stmt->execute();
	    return $stmt->fetch(PDO::FETCH_ASSOC);
	    
	   
	}


	//Show Routine for database
     
     	public function show_routine($id){

		$sql ="SELECT * FROM routine where student_id=:id";
		$stmt = db::mydb()->prepare($sql);	     
	     $stmt->bindvalue(':id', $id);
	     $stmt->execute();
	     return $stmt->fetchAll();

	}


	//Show transport for university 

     	public function transport($id){

		$sql ="SELECT * FROM transport where student_id=:id";
		$stmt = db::mydb()->prepare($sql);	     
	     $stmt->bindvalue(':id', $id);
	     $stmt->execute();
	     return $stmt->fetchAll();

	}


//Delete function are declared here.........

	public function delete_data($id){

		$sql = "DELETE from my_table where student_id=:id";
		$stmt = db::mydb()->prepare($sql);	     
	     $stmt->bindvalue(':id', $id);
	     $stmt->execute();
	    
	}


	//insert function are declared here.........

	public function insert_students_info($student_id, $student_name, $student_birth, $student_dep, $student_batch, $student_address, $student_pass){

		$sql = "INSERT INTO my_table(student_id, name, date_of_birth, dep, batch, address, password)VALUES(:student_id, :name, :data_of_birth, :dep, :batch, :address, :password)";
		$stmt = db::mydb()->prepare($sql);	     
	     $stmt->bindparam(':student_id', $student_id);
	     $stmt->bindparam(':name', $student_name);
	     $stmt->bindparam(':data_of_birth', $student_birth);
	     $stmt->bindparam(':dep', $student_dep);
	     $stmt->bindparam(':batch', $student_batch);
	     $stmt->bindparam(':address', $student_address);
	     $stmt->bindparam(':password', $student_pass);
	     return $stmt->execute();
	    
	}

	//Update function are declared here.........
      
      	public function show_students_info($id){

		$sql = "SELECT * FROM my_table where student_id=:id";
		$stmt = db::mydb()->prepare($sql);	    
		$stmt->bindparam(':id', $id);
	    $stmt->execute();
	    return $stmt->fetch();
	    
	}

	public function update_student_info($student_id, $student_name, $student_birth, $student_dep, $student_batch, $student_address, $student_pass, $id){

		  $sql = "UPDATE my_table SET student_id=:student_id, name=:name, date_of_birth=:birth, dep=:dep, batch=:batch, address=:address, password=:password where student_id=:id";
		$stmt = db::mydb()->prepare($sql);	     
	     $stmt->bindparam(':student_id', $student_id);
	     $stmt->bindparam(':name', $student_name);
	     $stmt->bindparam(':birth', $student_birth);
	     $stmt->bindparam(':dep', $student_dep);
	     $stmt->bindparam(':batch', $student_batch);
	     $stmt->bindparam(':address', $student_address);
	     $stmt->bindparam(':password', $student_pass);
	     $stmt->bindparam(':id', $id);
	     return $stmt->execute();
	}

	//Update students list function are End here.........

//Update function for courses page are declared here.........
	public function student_course_show($sub){
        $sql = "SELECT * FROM courses where course_name=:name";
		$stmt = db::mydb()->prepare($sql);	    
		$stmt->bindparam(':name', $sub);
	    $stmt->execute();
	    return $stmt->fetch();
	}



}



?>