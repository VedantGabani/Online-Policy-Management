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
$vname = $rnum = $rcnum = $mid = $pid = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 {
$vname = $_POST['vname'];
	$rnum = $_POST['rnum'];
	$rcnum = $_POST['rcnum'];
	$pid = $_POST['pid'];
	$mid = $_GET['id'];
}
$sql = "SELECT * FROM vehicle where pid= $pid";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc())
	 {
		 if($vname == "")
			$vname = $row["vname"];
		if($rnum == "")
			$rnum = $row["rnum"];
		if($rcnum == "")
			$rcnum = $row["rcnum"];
	 }
}
	$sql = "UPDATE vehicle SET vname= '$vname' , rnum= '$rnum' , rcnum= '$rcnum'  WHERE   pid = '$pid' ";

	
if ($conn->query($sql) === TRUE) {
    echo "Policy edited";

} else {
	echo"<script>alert('Error');</script>";
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text],select {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #e24a4a;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  opacity:0.8 ;
}

hr {
  border: 1px solid lightgrey;
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


</style>
<script>
function go()
	{
		window.open(" <?php $mid = "" ; 
	$mid = $_GET['id']; 
	echo "http://localhost/new/account.php?id=$mid" ;?> ","_top");
		
	}

</script>
</head>
<body >
<form action="updatevehicle.php" method="post">
<div class="menu">
<ul>
  <li><a href=" <?php $mid = "" ; 
	$mid = $_GET['id']; 
	echo "http://localhost/new/updatevehicle.php?id=$mid" ; ?>">Vehicle</a></li>
  <li><a href=" <?php $mid = "" ; 
	$mid = $_GET['id']; 
	echo "http://localhost/new/updatelife.php?id=$mid" ; ?>">Life</a></li>
  <li><a href=" <?php $mid = "" ; 
	$mid = $_GET['id']; 
	echo "http://localhost/new/updatemedical.php?id=$mid" ; ?>">Medical</a></li>
 
</ul>
</div>
  <br>

<b>
	
    <div class="container">
      <form action="vehicle.php" method = "POST">
			<label for="vname">Policy ID<label>
             <input type="text" id="pid" name="pid" required >
              <label for="vname">Model of Car</label>
             <input type="text" id="vname" name="vname" >
		   <label for="rnum">Registartion Number</label>
             <input type="text" id="rnum" name="rnum">
            <label for="rcnumber">RC NUMBER</label>
            <input type="text" id="rcnum" name="rcnum" >
	<input type="submit" value="Update Information" class="btn" onclick="go()" >
      </form>
  
  </div>
<br>

</div>

</div>
</body>
</html>