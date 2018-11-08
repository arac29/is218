<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);  
ini_set('display_errors' , true);
include('info.php');

session_start();

if(!isset($_SESSION['logged'])){
	echo"<br> Login First...<br><br>";
	header("refresh:1;url=form1.html");
	exit();
}

$email=$_SESSION["email"];


try{
	$conn = new PDO("mysql:host=$servername;dbname=aa986", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$query='SELECT * FROM questions';
	$st=$conn->prepare($query);
	$st->execute();
	$questions=$st->fetchAll();
	$st->closeCursor();
	
}
catch(PDOException $e){
	echo "<br> connection failed: ". $e->getMessage();
}
$conn = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
</head>
<style>
table,td{
	border:1px black solid;
}
tr.title{
	font-weight:bold;
}
<?php include 'css/main.css'; ?>
</style>
<body>
	<div class="container-contact">

		<div class="wrap-contact">
			<div class="contact-form-title">
				Welcome
			</div>
			<table>
			<tr class="title">
				<td>id</td><td>Owner Email</td>
				<td>Owner ID</td><td>Date Created</td>
				<td>Title</td><td>Body</td><td>Skills</td><td>Score</td>
			</tr>

			<?php foreach($questions as $questions) {?>
			<tr>
				<td><?php echo $questions['id'];?></td>
				<td><?php echo $questions['owneremail'];?></td>
				<td><?php echo $questions['ownerid'];?></td>
				<td><?php echo $questions['createddate'];?></td>
				<td><?php echo $questions['title'];?></td>
				<td><?php echo $questions['body'];?></td>
				<td><?php echo $questions['skills'];?></td>
				<td><?php echo $questions['score'];?></td>
			</tr>
			<?php }?>
			</table>
		<br>
			<div class="container-contact-form-btn">
				<a href="form3.html">Create New Question</a>
			</div>
		</div>
	</div>
</body>
</html>
