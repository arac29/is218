<?php include ('view/header.php');?>


	<div class="container-contact">

		<div class="wrap-contact">
			<form class="contact-form validate-form" action="." method="post">
				<span class="contact-form-title">
					Login
				</span>

				<div class="wrap-input validate-input" data-validate="Please enter your name">
					<input class="input" type="text" name="email" placeholder="Email">
					<span class="focus-input100"></span>
				</div>


				<div class="wrap-input validate-input" data-validate = "Please enter password">
					<input class="input" type="text" name="pass" placeholder="Password">
					<span class="focus-input"></span>
				</div>

				<div class="container-contact-form-btn">
					<button class="contact-form-btn">
						<span>
							Submit
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>
</body>


<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);  
ini_set('display_errors' , true);
include('info.php');
$email= $_POST["email"]; 
$pass= $_POST["pass"];
$flag=false;

if (empty($email)){ 
	echo "<b>ERROR: email is empty</b>"; 
	$flag=true ;}
else if(!strpos($email,'@')) { 
	echo"<br><b> ERROR:</b> no @ <br>"; 
	$flag=true;}
else{ echo "<br><b>Email: </b> $email <br>"; }

if (empty($pass)){ 
	echo "<b><br>ERROR: Password is empty <br></b>"; 
	$flag=true; }
else if(strlen($pass)<8 ){ 
	echo "<b><br>ERROR: Password must be at least 8 characters</b><br>" ; 
	$flag=true;}
else{ echo "<br><b>Password: </b> $pass <br>"; }

if (!$flag){
	
	try{
		$conn = new PDO("mysql:host=$servername;dbname=aa986", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare('SELECT * FROM accounts WHERE email=? AND password=?');
		$stmt->bindParam(1, $email, PDO::PARAM_INT);
		$stmt->bindParam(2, $pass, PDO::PARAM_INT);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$id=$row['id'];

		if( ! $row){
			header ("refresh:1; url=form1.html" ); 
			die('<h2> Cannot authenticate! </h2>');

		}
		else{ echo"<h2> Welcome </h2>";
			session_start();
			$_SESSION['logged']=true;
			$_SESSION["email"]=$email;
			$_SESSION['id']=$id;
			$_SESSION['fname']=$row['fname'];
			$_SESSION['lname']=$row['lname'];
			echo "Name: ". $_SESSION['fname']." ".$_SESSION["lname"];

			header("refresh:9; url=display.php");
		}
	}
	catch(PDOException $e){
		echo "<br> connection failed: ". $e->getMessage();
	}
	$conn = null;
}

?>

