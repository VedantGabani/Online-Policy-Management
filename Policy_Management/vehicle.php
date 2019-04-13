
<!DOCTYPE html>
<html>
<head>
<title>Card</title>
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


</style>
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
$vname = $rnum = $rcnum = $id ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 {
$vname = $_POST['vname'];
	$rnum = $_POST['rnum'];
	$rcnum = $_POST['rcnum'];
	$mid = $_POST['id'];
}
$sqlid = "SELECT * FROM vehicle ORDER BY pid ASC";
	$result = $conn->query($sqlid);
	 while($row = $result->fetch_assoc())
	 {
		$pid = $row["pid"];
	 }
	 $o = "1";
	 $pid = $pid + $o ; 
	 if($pid == 1 ){
	 $pid = $pid +99;}
	$sql = " INSERT INTO vehicle  (id ,vname , rnum , rcnum,pid) VALUES ('$mid' , '$vname', '$rnum' , '$rcnum' , '$pid' )";
	 $_SESSION['pid'] = $pid;
if ($conn->query($sql) === TRUE) {
    echo "Policy added";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();
?>
<script>
function go()
	{
		window.open(" <?php $mid = "" ; 
	$mid = $_GET['id']; 
	echo "http://localhost/new/account.php?id=$mid" ;?> ","_top");
		
	}
function pay()
	{
		window.open(" <?php  $mid = "" ; 
	$mid = $_GET['id']; 
	echo "http://localhost/new/payment.php?id=$mid" ;?> ","_top");
		
	}
</script>
</head>
<body>
<b>
	
    <div class="container">
      <form action="vehicle.php" method = "POST">
  
			 <label for="id">Account ID</label>
             <input type="text" id="id" name="id" required>
              <label for="vname">Model of Car</label>
             <input type="text" id="vname" name="vname" required>
		   <label for="rnum">Registartion Number</label>
             <input type="text" id="rnum" name="rnum" required>
            <label for="rcnumber">RC NUMBER</label>
            <input type="text" id="rcnum" name="rcnum" required>
			 <input type="submit" value="Buy" class="btn" onclick = "pay()">
	<input type="submit" value="Pay Later" class="btn" onclick="go()">
      </form>
  
  </div>

</body>
</html>

