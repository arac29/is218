<?php

print "Hello <br>" ;
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);  
ini_set('display_errors' , 1);

$email= $_GET["email"]; 
echo "email is $email <br>";
$pass= $_GET["pass"];
echo "password is $pass <br>";


if ($email==""){
	echo "<br> ERROR: email is empty";
}
else if(!strpos($email,'@')) {
	echo"<br> ERROR: no @ <br>";
}

if ($pass==""){
	echo "ERROR: Password is empty <br>";
}
else if(strlen($pass)<8 ){
	echo "ERROR: Password must be at least 8 characters";
}



?>