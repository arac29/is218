<?php
/*
	$servername= "sql1.njit.edu";
	$username="aa986";
	$project="aa986";
	$password= "alumni22";
	
	try{
		$conn = new PDO("mysql:host=$servername;dbname=aa986", $username, $password);
	}
	catch(PDOException $e){
		$error_message= $e->getMessage();
		include('db_error.php');
		exit();
	}
*/
//NEW USING CLASSES:

class Database {
    private static $dsn= "mysql:host=sql1.njit.edu;dbname=aa986";
    private static $username = "aa986";
    private static $project="aa986";
    private static $password = "alumni22";
    private static $conn;

    private function __construct() {}


    public static function database () {
        if (!isset(self::$conn)) {
            try {
                self::$conn = new PDO(self::$dsn,
                                     self::$username,
                                     self::$password);
            } 
            catch(PDOException $e){
				$error_message= $e->getMessage();
				include('db_error.php');
				exit();
            }
        }
        return self::$conn;
    }
}
?>