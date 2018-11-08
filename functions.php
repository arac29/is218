
<?php
function authenticate($UCID,$pass,$db){ //called in 2 and 3 
	global $t;
	$s   =  "select * from AA where UCID = '$UCID' and pass ='$pass'" ;
	print "<br><br>SQL select statement is: $s<br><br>"; 
	($t = mysqli_query ($db,$s) )  or die ( mysqli_error ($db) );
	$num = mysqli_num_rows($t);
	print "<br>There were $num rows retrieved from DB table.<br><br>";
	if ($num==0){
		return false;};
	return true;
}

function display($UCID,$number,&$output,$db){
	global $t;
	$s   =  "select * from TT where UCID = '$UCID' order by amount desc limit $number" ;
	($t = mysqli_query ($db,$s) )  or die ( mysqli_error ($db) );
	$output.="<br>SQL select statement is: $s<br>"; 

	//table  create
	$output.="<table border=2 width=50%>";
	$output.= "<tr><th>UCID</th><th>type</th><th>amount</th><th>datetime</th><th>mail</th>";
 
	while($r=mysqli_fetch_array($t,MYSQLI_ASSOC)){
	
		$UCID= 		$r["UCID"];
		$type=		$r["type"];
		$amount=	$r["amount"];
		$datetime=  $r["datetime"];
		$mail=      $r["mail"];
		$x=0;
		
		$output.="<tr>"; 
		//CREATE A ROW
		$output.="<td>$UCID</td>";
		$output.="<td>$type</td>";
		$output.="<td>$amount</td>";
		$output.="<td>$datetime</td>";
		$output.="<td>$mail</td>";

		$output.="</tr>";
		
		
	};
$output.="</table>";
	
return $output;
}


//$se="insert into TT values ('$UCID','D','$amount',NOW(),'$mail') ";
//	echo "$se <br><br>";
//	($t=mysqli_query($db,$se)) or die(mysqli_error($db));
//	echo "<br> Row inserted<br><br>" ;

?>