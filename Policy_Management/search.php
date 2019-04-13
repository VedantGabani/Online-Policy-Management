<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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


hr{color : #4CAF50; }

.active {
  background-color: #4CAF50;
  color: white;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
   background-color: #f2f2f2;
}

li {
  float: left;
}

li a {
  display: block;
  
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  
   background-color: #f2f2f2;
  color: black;
  display: block;
 
  cursor: pointer;
}

li a:hover {
  background-color: #ccc;
}
li a:active {
 background-color: #e24a4a;;
}
.menu
{
	border: 1px solid lightgrey;
  border-radius: 3px;
}

#vehicle input {
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
.search
{
	position : relative;
	float : right;
	margin : 11px auto auto 550px;
}


</style>

</head>
<body>
<div class="menu">
<ul>
	 <li><a href=" <?php session_start(); $mid = "" ; 
	$mid = $_SESSION['mid']; 
	echo "http://localhost/new/policyinfo.php?id=$mid" ; ?>">Vehicle</a></li>
  <li><a href=" <?php $mid = "" ; 
	$mid = $_SESSION['mid']; 
	echo "http://localhost/new/lifeinfo.php?id=$mid" ; ?>">Life</a></li>
  <li><a href=" <?php $mid = "" ; 
	$mid = $_SESSION['mid']; 
	echo "http://localhost/new/medicalinfo.php?id=$mid" ; ?>">Medical</a></li>
	<li><div class="search"><form action="search.php" method="post">
	<input type="text" name="pid" >
	<button  type="submit" ><i class="fa fa-search"></i></button></form></div></li>
</ul>

  
</div>
<div id="vehicle">

<br>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdb";
$pid = "";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
	$pid = $_POST['pid'];
	if($pid > 99 && $pid < 200){
	$sql = "SELECT * FROM vehicle where pid= $pid ";
$result = $conn->query($sql);
echo "<form action='deletevehicle.php' method='post'>";
	if ($result->num_rows > 0) {
		echo "<table>";
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$pid = $row["pid"];
			 echo "<tr><td>Policy ID</td><td>" . $row["pid"].  " </td>";
			 echo "<tr><td>Vehicle Name</td><td>" . $row["vname"].  " </td>";
			echo "<tr><td>Registration number</td> <td>" . $row["rnum"].  " </td> ";
		 echo "<tr><td>RC number</td> <td>" . $row["rcnum"].  " </td>";
	
		  echo "<tr><td colspan=2><input type='submit' value='Delete Policy' class='btn'  ></td> ";
		$_SESSION['pid'] = $pid;
	}echo "</table>";
	}
	else {
      echo  "<table><tr><th>You have no policies</th></table>";
}echo "</form>";
	} 
	
	if($pid > 199 && $pid < 300){
	$sql = "SELECT * FROM medical where pid= $pid ";
$result = $conn->query($sql);
echo "<form action='deletemedical.php' method='post'>";
	if ($result->num_rows > 0) {
		echo "<table>";
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$pid = $row["pid"];
 echo "<tr><td>Policy ID</td><td>" . $row["pid"].  " </td>";
		echo "<tr><td>Name</td> <td>" . $row["name"].  " </td> ";
		echo "<tr><td>Age</td> <td>" . $row["age"].  " </td> ";
		 echo "<tr><td>Blood Group</td><td>" . $row["bgroup"].  " </td>";
		 echo "<tr><td>Medical History</td><td>" . $row["medical"].  " </td><br>";

		  echo "<tr><td colspan=2><input type='submit' value='Delete Policy' class='btn'  ></td> ";
		$_SESSION['pid'] = $pid;
	}echo "</table>";
	
	}else {
      echo  "<table><tr><th>You have no policies</th></table>";
}}
echo "</form>";
	if($pid > 299) {
	$sql = "SELECT * FROM life where pid= $pid ";
$result = $conn->query($sql);
echo "<form action='deletelife.php' method='post'>";
	if ($result->num_rows > 0) {
		echo "<table>";
	
		while($row = $result->fetch_assoc()) {
			$pid = $row["pid"];
		 echo "<tr><td>Policy ID</td><td>" . $row["pid"].  " </td>";
		 echo "<tr><td>Name</td><td>" . $row["name"].  " </td>";
		echo "<tr><td>Age</td> <td>" . $row["age"].  " </td> ";
     echo "<tr><td>Habit</td> <td>" . $row["habit"].  " </td>";
     echo "<tr><td>Income</td> <td>" . $row["income"].  " </td>";
		  echo "<tr><td colspan=2><input type='submit' value='Delete Policy' class='btn'  ></td> ";
		$_SESSION['pid'] = $pid;
	}
		echo "</table>";
	}	
else {
      echo  "<table><tr><th>You have no policies</th></table>";
	  }
}
}
echo "</form>";
$conn->close();
?> 
</div>
</div>
</body>
</html>