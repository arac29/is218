<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);  
ini_set('display_errors' , 1);

$first= $_GET["first"]; 
$last= $_GET["last"];
$bday= $_GET["bday"]; 
$email= $_GET["email"];
$pass= $_GET["pass"];

$arr=array('First name'=>$first,
			'Last name'=>$last,
			'Birthday'=>$bday,
			'Email'=>$email,
			'Password'=>$pass);

foreach($arr as $key => $value){
	if ( $value==""){ echo "<br><b>ERROR: $key is empty<br></b>";}
	else if ($key=='Email' && !strpos($value,'@') ){ 
		echo"<br><b>ERROR: no @ in $key<br></b>";}
	else if($key=="Password" && strlen($value)<8 ){
		echo "<br><b>ERROR:$key must be at least 8 characters<br></b>";}
	else{ echo "<br><b> $key </b>: $value<br>";}
}

?>