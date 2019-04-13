
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
$name = $age = $habits = $number = $annual  = $mid ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 {
	$name = $_POST['name'];
	$age = $_POST['age'];
	$habit = $_POST['habits'];
	$annual= $_POST['annual'];
	$mid = $_POST['id'];
	$sqlid = "SELECT * FROM life ORDER BY pid ASC";
	$result = $conn->query($sqlid);
	 while($row = $result->fetch_assoc())
	 {
		$pid = $row["pid"];
	 }
	
	 $o = "1";
	 $pid = $pid + $o;
	 if($pid == 1 )
		 $pid = $pid +299;
	
	$sql ="INSERT INTO life  (id , name , age , habit , income,pid ) VALUES( ' $mid ' ,'$name', '$age' , '$habit' , '$annual' ,'$pid')";
	
if ($conn->query($sql) === TRUE) {
    echo "Policy added";

	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();}
?>
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
<script>
	function go()
	{
		window.open(" <?php $mid = "" ; 
	$mid = $_GET['id']; 
	echo "http://localhost/new/account.php?id=$mid" ;?> ","_top");
		
	}
	function pay()
	{
		window.open(" <?php session_start(); $mid = "" ; 
	$mid = $_GET['id']; 
	echo "http://localhost/new/payment.php?id=$mid" ;?> ","_top");
		$_SESSION['ptype']="life";
	}
</script>
</head>
<body>
<b>
	
    <div class="container">
      <form action="life.php" method = "post">
      
        
		 <label for="id">Account ID</label>
             <input type="text" id="id" name="id" required>
             <label for="cname">Name Of Person</label>
             <input type="text" id="name" name="name" required>
		   <label for="rnum">Age Of Person</label>
             <input type="text" id="age" name="age" required>
            <label for="disease">Habits</label>
            <input type="text" id="habits" name="habits" required>
	
	<label for="anum">Annual Income</label>
             <input type="text" id="annual" name="annual" required>  
          
        <input type="submit" value="Buy" class="btn" onclick = "pay()">
		<input type="submit" value="Pay Later" class="btn" onclick = "go()">
      </form>
  
  </div>

</body>
</html>
