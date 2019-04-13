<?php

session_start();
	$connection = mysqli_connect('localhost', 'root', '');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'userdb');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}

$username = $password  = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// Assigning POST values to variables.
	$username = $_POST['username'];
	$password = $_POST['pswd'];

	// CHECK FOR THE RECORD FROM TABLE
	$query = "SELECT * FROM login WHERE username='$username' and password='$password'";
	 
	$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
	$count = mysqli_num_rows($result);

	if ($count == 1){

	//echo "Login Credentials verified";
	echo "Success <style type='text/css'> .modal{display: none;} </style>";
	
	}
	else{
	echo "Fail  ";
	//echo "Invalid Login Credentials";
	}
}
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

.banking input,select {
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
.modal {

  position: absolute; 
  z-index: 1; 
  left: 0;
  top: 0;
  width: 100%; 
  height: 100%; 
  overflow: auto; 
  background-color: rgba(0,0,0,0.4); 
  padding-top: 60px;
}

.modal-content {
  background-color: #fefefe;
  margin: 0 auto 15% auto;
  border: 1px solid #888;
  width: 70%;
}

.animate {
  -webkit-animation: animatezoom 0.5s;
  animation: animatezoom 0.5s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}
button {
  background-color: #e24a4a;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}
button:hover {
  opacity:0.8 ;
  cursor:pointer;
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
<body>
<b>
    <div class="container">
       <div class="banking">
		
		  <label for="bank">Bank</label>
           <select>
		   <option><b>State Bank of India</option>
		   <option><b>ICIC Bank</option>
		   <option><b>HDFC Bank</option><br>
			</select>
            <label for="acname">Account No.</label>
            <input type="text" id="acname" name="acname" required>
            <label for="amt">Transfer Amount</label>
            <input type="text" id="amt" name="amt" required >
            <label for="otp">OTP</label>
            <input type="text" id="otp" name="otp" required>
           </div></b></b></b></b>
		 <input type="submit" value="Proceed to Pay" class="btn"  id="paybtn" onclick="go()">
   </div>
  
	  
<div id="loginpg" class="modal" style="text-align:center;">
   <form class="modal-content animate" action="netbanking.php" method="post">
      <h1>Login</h1>
    
    <hr><br>
	<label for="Username"><b>Username</b></label>
    <input type="text" name="username" required><br><br>
	
    <label for="psw"><b>Password</b></label>
    <input type="password"  name="pswd" required><br><br>
	
	<hr>
    <button type="submit" class="loginbtn" style="width:20%;" >Login</button>

  </form>
  </div>
 <script>
 var modal = document.getElementById('loginpg');

	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
	
</script>


</body>
</html>
