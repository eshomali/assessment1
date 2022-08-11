<?php 

define('DB_HOST', 'localhost'); 
define('DB_NAME', 'helloworld'); 
define('DB_USER','root'); 
define('DB_PASSWORD',''); 

$con = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con, "SELECT * FROM myDB ORDER BY date DESC");			//view database entries

echo "<table border='1'>
	
	<tr>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Address</th>
	<th>Address</th>
	<th>City</th>
	<th>State</th>
	<th>Zip Code</th>
	<th>Country</th>
	<th>Password</th>
	<th>date</th>
	</tr>";

while($row = mysqli_fetch_array($result)){

	echo "<tr>";
	echo "<td>" . $row['firstName'] . "</td>";
	echo "<td>" . $row['lastName'] . "</td>";
	echo "<td>" . $row['addressOne'] . "</td>";
	echo "<td>" . $row['addressTwo'] . "</td>";
	echo "<td>" . $row['city'] . "</td>";
	echo "<td>" . $row['state'] . "</td>";
	echo "<td>" . $row['zip'] . "</td>";
	echo "<td>" . $row['country'] . "</td>";
	echo "<td>" . $row['pass'] . "</td>";
	echo "<td>" . $row['date'] . "</td>";
	echo "</tr>";
}
echo "</table>";
	
mysqli_close($con);	
	
?>


<!DOCTYPE HTML> 
<html lang="en-US">
<head>
    <title>Back</title>
	<style>
		body{
			background-color:#f5f5DC;
		}
	</style>
</head>

<body>
	<p></p>
<form action="https://463143cd.ngrok.io" > 
  <button type="submit">Back</button>
</form> 
	<!--input id="button" type="submit" name="submit" value="Back"-->
</body>

</html>
