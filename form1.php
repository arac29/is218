<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);  
ini_set('display_errors' , true);

$email= $_GET["email"]; 
$pass= $_GET["pass"];
if ($email==""){
	echo "ERROR: email is empty";
}
else if(!strpos($email,'@')) {
	echo"<br> ERROR: no @ <br>";
}
else{
	echo "email is $email <br>";
}

if ($pass==""){
	echo "ERROR: Password is empty <br>";
}
else if(strlen($pass)<8 ){
	echo "ERROR: Password must be at least 8 characters";
}
else{
	echo "password is $pass <br>";
}



?>