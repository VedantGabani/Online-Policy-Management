<?php
session_start();

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 {
$pid = "";
	$pid = $_SESSION['pid'];
		
		$sql = "DELETE FROM life WHERE pid=$pid";
	

}
if ($conn->query($sql) === TRUE) {
    echo "Policy delete";
	header("Refresh:0");
}

 else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

?>

