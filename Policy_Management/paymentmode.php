<!DOCTYPE html>
<html>
<head>
<title>Payment Mode</title>
<style>
body
{
	position:relative;
	top:7px;
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

 
 <a href="<?php			
	$id = $_GET['id'];
	echo "card.php?id=$id" ; ?> "   target="paymentdisplay">Credit/Debit Card</a>
 <a href="<?php			
	$id = $_GET['id'];
	echo "netbanking.php?id=$id" ; ?> " target="paymentdisplay">Netbanking</a>

 


</body>
</html>
