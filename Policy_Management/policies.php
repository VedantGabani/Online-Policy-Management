<!DOCTYPE html>
<html>
<head>
	<title>Policy Page</title>
<style>
body 
{
	font-family: Arial, Helvetica, sans-serif;
}

button {
  background-color: #4CAF50;
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

.container {
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

</style>

	

<frameset rows=10%,* border=0>
	<frame src="policyheading.php">
	<frameset cols=20%,* border=0>
		<?php
		$id = $_GET['id'];
			echo	"<frame src='policymode.php?id=$id'>";
			
	echo	"<frame src='vehicle.php?id=$id' name='policydisplay'> "; ?>
	</frameset>
</frameset>
</head>
<body>
<center>
<h2>Payment</h2>

</body>
</html>
