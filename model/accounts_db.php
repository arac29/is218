<?php
function get_all(){
	global $conn;
	$query = 'SELECT * FROM accounts ORDER BY id';
	$statement = $db->prepare($query);
	$statement->execute();
	return $statement; 
}
/*
function get_user($email,$pass){
	global $conn;
	$stmt = $conn->prepare('SELECT * FROM accounts WHERE email=? AND password=?');
	$stmt->bindParam(1, $email, PDO::PARAM_INT);
	$stmt->bindParam(2, $pass, PDO::PARAM_INT);
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt->closeCursor();
	return $row;

}
function create_user($email,$first,$last,$bday,$pass){
	global $conn;
	$stmt = $conn->prepare("INSERT INTO accounts (email,fname,lname,birthday,password) 
			VALUES ('$email','$first','$last','$bday','$pass')");
	$stmt->execute();
}
*/

class UsersDB 
	{
	    public static function get_all() 
	    {
	        $db = Database::database();
	        $query = 'SELECT * FROM accounts';
	        $statement = $db->prepare($query);
	        $statement->execute();
	        
	        $accounts = array();
	        foreach ($statement as $row)
	        {
	            $account = new User($row['email'],$row['fname'],$row['lname'],$row['birthday'],$row['password']);
	            $accounts[] = $account;
	        }
	        return $accounts;
	    }
	    public static function get_user($email,$pass){
	    	$db = Database::database();
			$stmt = $db->prepare("SELECT * FROM accounts WHERE email='$email' AND password='$pass' ");
			$stmt->execute();
			$acct = array();
			foreach ($stmt as $row)
	        {
	            $account = new User($row['id'],$row['email'],$row['fname'],$row['lname'],$row['birthday'],$row['password']);
	            $acct[] = $account;
	        }
			return $acct;
			//Array ( [0] => User Object ( [id:User:private] => aa986@njit.edu [email:User:private] => alma [fname:User:private] => alva [lname:User:private] => 2018-11-14 [bday:User:private] => [pass:User:private] => ) )

		}
	    public static function create_user($email,$first,$last,$bday,$pass)
	    {
	    	$db = Database::database();
	    	$query = "INSERT INTO accounts (email,fname,lname,birthday,password) VALUES ('$email','$first','$last','$bday','$pass') ";
	    	$statement = $db->prepare ($query);
	    	$statement->execute();
	    	$statement->closeCursor();
		}

	}



	
class User
	{
		private $id;
		private $email;
		private $fname;
		private $lname;
		private $bday;
		private $pass;
		public function __construct($Id, $Email, $Fname, $Lname, $Birthday, $Password) 
		{
	        $this->id = $Id;
	        $this->email = $Email;
	        $this->fname = $Fname;
	        $this->lname = $Lname;
	        $this->bday = $Birthday;
	        $this->pass = $Password;
    	}
		public function getId()
		{
			return $this->id;
		}
		
		public function getEmail()
		{
			return $this->email;
		}
		
		public function getFname()
		{
			return $this->fname;
		}
		
		public function getLname()
		{
			return $this->lname;
		}
				
		public function getBirthday()
		{
			return $this->bday;
		}
		public function getPass()
		{
			return $this->pass;
		}
		public function displayUserRow() {
			//return '<tr><td>User</td><td>Data</td><td>Goes</td><td>Here</td></tr>';
			return "<td>$this->id</td>
				<td>$this->owneremail</td>
				<td>$this->fname</td>
				<td>$this->bday </td>
				<td>$this->lname</td>";
	
		}
	}

?>



