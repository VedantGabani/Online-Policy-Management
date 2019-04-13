
<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  align: center;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
input {

  background-color: #e24a4a;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

input:hover {
  opacity: 0.8;
}

</style>
<script>
function go()
	{
	
	window.open(" <?php $mid = "" ; 
	$mid = $_GET['id']; 
	echo "http://localhost/new/policies.php?id=$mid" ;?> ","_top");
		
	}
	function out()
	{
	window.open(" http://localhost/new/login.php" , "_top");
	}
</script>
</head>

<body>
<form action="accountinfo.php" method="post">
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdb";
$mid = "";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$mid = $_GET["id"];

$sql = "SELECT * FROM login where id= $mid";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
		 echo "<tr><td>ID</td><td>" . $row["id"].  " </td>";
		  echo "<tr><td>Email</td><td>" . $row["username"].  " </td>";
		echo "<tr><td>Name</td> <td>" . $row["Name"].  " </td> ";
     echo "<tr><td>Date of Birth</td> <td>" . $row["dob"].  " </td> ";
	 echo "<tr><td>Number</td> <td>" . $row["number"].  " </td> ";
    }
    echo "</table>";
} else {
    echo "0 results";
}
	
$conn->close();
?>

 <input type='button' value='Buy Policy'  id='probtn' name= 'probtn' onclick = "go();"> 
<input type='button' value='Sign Out' onclick = "out();" >
</body>
</html>