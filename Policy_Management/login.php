<?php

	$connection = mysqli_connect('localhost', 'root', '');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'userdb');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
 $gid = $username = $password  = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// Assigning POST values to variables.
	$username = $_POST['uname'];
	$password = $_POST['psw'];

	// CHECK FOR THE RECORD FROM TABLE
	$query = "SELECT * FROM `login` WHERE username='$username' and password='$password'";
	 
	$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
	$count = mysqli_num_rows($result);
	
	    while($row = $result->fetch_assoc()) {
	 
	$gid = $row["id"];
		}
	if ($count == 1){
	//echo "Login Credentials verified";
	echo "<script>alert('Success');</script> ";
	header("Location: http://localhost/new/account.php?id=$gid");
	}
	else{
	echo "<script>alert('Invalid Credentials');</script>";
	//echo "Invalid Login Credentials";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
<style>
body 
{
	font-family: Arial;
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
  opacity: 0.8;
}

.container,.welcome {
	
  padding: 16px;
}

.modal {
  display: none; 
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
.login{
	margin: auto;
	
}
.welcome{
	 background-color: #f2f2f2;
	  padding: 12px;
	text-align:center;
	position:relative;
	border: 1px solid lightgrey;
  border-radius: 3px;
  
}

</style>
</head>
<script>
function ValidateEmail(inputText1,inputText2)
{
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(inputText1.value.match(mailformat))
	{
	document.form1.text1.focus();
	return true;
	}
	else
	{
	alert("You have entered an invalid email address!");
	document.form1.text1.focus();
	return false;
	}
	var phoneno = /^\d{10}$/;
	  if(inputtxt2.value.match(phoneno))
	  {
		
		  return true;
	  }
	  else
	  {
		 alert("Not a valid Phone Number");
		 document.form1.text1.focus();
		 return false;
	  }
}

</script>
<body>
	<div class="welcome">
	
	<h3>WELCOME</h3>
	</div>
<div class="login">
<center>
<h2>Login</h2>

<form method="post" action="login.php">
 <div class="container">
      <label for="uname"><b>Username</b></label><br>
      <input type="text" name="uname" required><br><br>

      <label for="psw"><b>Password</b></label><br>
      <input type="password" name="psw" required>
    </div>
    
	  <button type="submit" style="width:10%;" name="loginbtn" >Login</button>
	<button onclick="document.getElementById('registerpg').style.display='block'" style="width:10%;" >Register</button>
</div>
</center>
</form>
<div id="registerpg" class="modal" style="text-align:center;">
  
  <form name="form1" class="modal-content animate" action="register.php" method="post">
      <h1>Register</h1>
    
    <hr>
	<label for="Name"><b>Name</b></label><br>
    <input type="text" name="name" required><br><br>
	
	<label for="email"><b>Email</b></label><br>
    <input type="text"  name="email"   required><br><br>

    <label for="psw"><b>Password</b></label><br>
    <input type="password"  name="rpsw"  required><br><br>

    <label for="psw-repeat"><b>Confirm Password</b></label><br>
    <input type="password"  name="rcpswd" required><br><br>
	
  	<label for="dob"><b>Date of birth</b></label><br>
    <input type="text" name="dob" required><br><br>
	
	<label for="number"><b>Number</b></label><br>
    <input type="text" name="number"  required><br><br>
	
	
	<hr>

    <input type="checkbox" name="terms" required>By creating an account you agree to our Terms & Privacy.</p>
    <button type="submit" class="registerbtn" style="width:20%;" onclick= "ValidateEmail(document.form1.email,document.form1.number)">Create Account</button>
	 <button type="reset" class="resetbtn" style="width:20%;" >Reset</button>
	<div class="container signin">
    <p>Already have an account? <a href="login.php" >Sign in</a>.</p>
  </div>
  </div>
  </form>

<script>

	var modal = document.getElementById('registerpg');

	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
</script>

</body>
</html>
