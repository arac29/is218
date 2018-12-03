<?php
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
?>