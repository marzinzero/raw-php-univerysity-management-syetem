<?php



class session{

	public static function init(){
		if(session_status() == PHP_SESSION_NONE){
			session_start();
		}
	}

	public static function setsession($key, $value){

		 $_SESSION[$key]=$value;

	}

		public static function getsession($key){
			if(isset($_SESSION[$key])){

                 return $_SESSION[$key];
			}else{
				return false;
			}

	}


	public static function logout(){
       session_unset();
       session_destroy();
       header("location:login.php");

	}

		public static function logoutpage(){
       session_unset();
       session_destroy();
       header("location:../login.php");

	}

	 public static function logpagecheck(){
           if(self::getsession("login") == false){
			  self::logoutpage();
          }

	   }



		public static function logcheck(){
            if(self::getsession("login") == false){
			  self::logout();
            }

	}
	

	public static function checksession(){
       if(self::getsession("login") == true){
       	header("location:Students/index.php");
       }

	}
	
	

	
}


?>