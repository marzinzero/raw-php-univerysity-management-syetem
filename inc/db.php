<?php

 class db{



 	public static function mydb(){

 		 $host = "mysql:host=localhost;dbname=student";
 		 $user = "root";
 		 $pass = "";


 		try{
          $pdo = new PDO($host, $user, $pass);
 		}
 		catch(PDOexception $e)
 		{
          echo "Error: ".$e->getmessage();

 		}

         return $pdo;

 	}


 }


?>