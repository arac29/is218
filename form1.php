<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);  
ini_set('display_errors' , true);

$email= $_GET["email"]; 
$pass= $_GET["pass"];
if (empty($email)){ echo "<b>ERROR: email is empty</b>"; }
else if(!strpos($email,'@')) { echo"<br><b> ERROR:</b> no @ <br>";}
else{ echo "<br><b>Email: </b> $email <br>"; }

if (empty($pass)){ echo "<b>ERROR: Password is empty <br></b>"; }
else if(strlen($pass)<8 ){ echo "<b><br>ERROR: Password must be at least 8 characters</b><br>";}
else{ echo "<br><b>Password: </b> $pass <br>"; }
?>