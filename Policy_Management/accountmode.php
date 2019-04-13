<!DOCTYPE html>
<html>
<head>
<title>Payment Mode</title>
<style>
body
{
	position:relative;
	top:0px;
	border: 1px solid lightgrey;
  border-radius: 3px;
}

a {
  background-color: #f2f2f2;
  color: black;
  display: block;
  padding: 12px;
  text-decoration: none;
  cursor: pointer;
}

a:hover {
  background-color: #ccc;
}

a:active {
  background-color: #e24a4a;
  color: white;
 font-weight:bold;
}


</style>
</head>
<body>
	<?php session_start();
	$id = $_GET['id'];

 echo	" <a href='accountinfo.php?id=$id' target='display'>Account</a> ";
echo	"  <a href='policyinfo.php?id=$id' target='display'>Policy</a> " ;
echo	"  <a href='updatevehicle.php?id=$id' target='display'>Update Policy</a> " ;

 $_SESSION['mid'] = $id;
 ?>

<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("mouseenter", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
 
}
</script>
</body>
</html>
