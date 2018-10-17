<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);  
ini_set('display_errors' , 1);

$name= $_GET["name"]; 
$body= $_GET["body"];
$skills= $_GET["skills"]; 

if (empty($name)){echo "<br><b>ERROR: Name is empty <br></b>";}
else if(strlen($name)<3 ){echo "<b>ERROR: Name must be at least 3 characters</b><br>";}
else{echo "<b>Name:</b> is $name <br>";}

if (empty($body)){ echo "<br><b>ERROR: Body is empty <br></b>";}
else if(strlen($name)>500 ){echo "<b>ERROR: Body limit is 500 characters</b><br>";}
else{ echo "<b>Body:</b> $body <br>";}

$skills_arr=explode(",",$skills);
if (sizeof($skills_arr)<2){ echo"<br><b>ERROR: Enter at least two skills<br></b>";} 
else{
	echo "<b>Skills:</b><br>";
	print_r($skills_arr);
}


//$arr=array('First name'=>$first,'Last name'=>$last,'Birthday'=>$bday,'Email'=>$email,'Password'=>$pass);
/*
foreach($arr as $key => $value){
	if ( $value==""){ echo "<br><b>ERROR: $key is empty<br></b>";}
	else if ($key=='Email' && !strpos($value,'@') ){ 
		echo"<br><b>ERROR: no @ in $key<br></b>";}
	else if($key=="Password" && strlen($value)<8 ){
		echo "<br><b>ERROR:$key must be at least 8 characters<br></b>";}
	else{ echo "<br><b> $key </b>: $value<br>";}
}*/

?>