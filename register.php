<?php 

define('DB_HOST', 'localhost'); 
define('DB_NAME', 'helloworld'); 
define('DB_USER','root'); 
define('DB_PASSWORD','Scientia01!'); 

$con = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error()); 
$db = mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error()); 
$test = mysql_query('SELECT 1 from `myDB` LIMIT 1');			//run test query to determine if table exists
			
function NewUser() { 
	
	$firstName = $_POST['firstName']; 
	$lastName = $_POST['lastName']; 
	$addressOne = $_POST['addressOne']; 
	$addressTwo = $_POST['addressTwo']; 
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];	
	$country = $_POST['country'];
	$password = $_POST['pass'];
	$date = date('Y-m-d H:i:s');	
	$query = "INSERT INTO myDB (firstName,lastName,addressOne,addressTwo,city,state,zip,country,pass,date) VALUES ('$firstName','$lastName','$addressOne','$addressTwo','$city','$state','$zip','$country','$password','$date')"; 
	$flag = true;
	
	if (empty ($firstName)){
		echo "<font color='red'>Please enter your First Name!</font><br/><br/>";
		$flag = false;
	}
	if (empty ($lastName)){
		echo "<font color='red'>Please enter your Last Name!</font><br/><br/>";
		$flag = false;
	} 
	if (empty ($addressOne)){
		echo "<font color='red'>Please enter your Address!</font><br/><br/>";
		$flag = false;
	}
	if (empty ($city)){
		echo "<font color='red'>Please enter a City!</font><br/><br/>";
		$flag = false;
	}
/*	if (empty ($pass)){
		echo "<font color='red'>You must enter a password.</font><br/><br/>";
		$flag = false;
	} */
	
	if (!$flag){
		echo "Missing field(s), registration not confirmed.";
	}
	
	if ($flag){
		
		$data = mysql_query($query)or die(mysql_error());
		
		if($data){ 
		echo "Registration is confirmed.";
		}
	}
} 

function Register() { 

	if(!empty($_POST['firstName'])) { 
		$query = mysql_query("SELECT * FROM myDB WHERE firstName = '$_POST[firstName]' AND pass = '$_POST[pass]'") or die(mysql_error()); 
	
		if(!$row = mysql_fetch_array($query) or die(mysql_error())){
			
			NewUser(); 
		} 
		else{ 
			echo "You are already registered."; 
		} 
	}	
}

if($test !== FALSE)				//table exists
{
   	if(isset($_POST['submit'])){ 
		
		Register(); 
	}
}
else							//table doesn't exist..creating table..
{
    $sql = "CREATE TABLE myDB ( userID int(9) NOT NULL auto_increment, 
				firstName VARCHAR(50) NOT NULL, 
				lastName VARCHAR(50) NOT NULL, 
				addressOne VARCHAR(50) NOT NULL,
				addressTwo VARCHAR(50) NOT NULL,
				city VARCHAR(50) NOT NULL,
				state VARCHAR(50) NOT NULL,
				zip VARCHAR(10) NOT NULL,
				country VARCHAR(50) NOT NULL,
				pass VARCHAR(40) NOT NULL,
				date DATETIME NOT NULL,
				PRIMARY KEY(userID) )";
	
	$results = mysql_query($sql) or die (mysql_error());
	Register();
} 
	
?>


<!DOCTYPE HTML> 
<html lang="en-US">
<head>
    <title>Confirm</title>
	<style>
		body{
			background-color:#f5f5DC;
		}
	</style>
</head>

<body>
<body>
	<p></p>
<form action="https://0fc19506.ngrok.io" > 
  <button type="submit">Back</button>
</form> 
	<!--input id="button" type="submit" name="submit" value="Back"-->
</body>
</body>

</html>