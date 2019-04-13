
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$name = $email = $dob = $number = $password  = $cpassword ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"]) or empty($_POST["dob"]) or empty($_POST["email"]) or empty($_POST["rpsw"]) or empty($_POST["email"]) or empty($_POST["number"]) )
  {
	  echo "Enter";
  }
  else{
$name = $_POST['name'];
	$password = $_POST['rpsw'];
	$email = $_POST['email'];
	$dob= $_POST['dob'];
	$number = $_POST['number'];
	$cpassword = $_POST['rcpswd'];
	$sqlid = "SELECT * FROM login ORDER BY ID DESC LIMIT 1";
	$result = $conn->query($sqlid);
	 while($row = $result->fetch_assoc())
	 {
		$id = $row["id"];
	 }
	 $o = "1";
	 $id = $id + $o ; 
	if($password == $cpassword)
	$sql ="INSERT INTO login  (username , password ,  Name , dob ,  number ,id) VALUES('$email', '$password' , '$name' , '$dob' , '$number' , '$id' )";
	
if ($conn->query($sql) === TRUE) {
    echo "account created";
	header('Location: http://localhost/new/login.php');
	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();}
?>