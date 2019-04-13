

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

</script>

</head>
<body>
<b>

    <div class="container">
      <form action="card.php" method = "POST">
      
   
		  <label for="cype">Type of Card</label>
           <select>
		   <option><b>Credit Card</option>
		   <option><b>Debit Card</option><br>
			</select>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" required>
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" required>
            <label for="expmonth">Exp date</label>
            <input type="text" id="expdate" name="expmonth" placeholder="MM/YY" required>
         
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv">
           
        
        <input type="submit" value="Proceed to Pay" class="btn" onclick = "go()">
      </form>
  
  </div>

</body>
</html>
