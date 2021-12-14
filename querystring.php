<?php 

if ($_SERVER['REQUEST_METHOD'] == "POST") {

var_dump($_POST);
}


?>


<!DOCTYPE html>
<html>
	
<body>
	
	<form method="post">
		
		<div>
			<label for="text">Text:</label>
			<input type="text" name="text" id="text">
		</div>
		
		<div>
			<input type="checkbox" name="checkbox" value="yes" id="checkbox">
			<label for="checkbox">Yes</label>
		</div>
		
		
		<p>Colours:</p>
		<div>
			 <input type="radio" id="blue" name="color" value="blue">
			 <label for="blue">Blue</label>
		</div>
		
		<div>
			<input type="radio" id="red" name="color" value="red">
			<label for="red">Red</label>
		</div>
		
		<div>
			 <input type="radio" id="green" name="color" value="green">
			 <label for="green">Green</label>
		</div>
	

		
		<button>Send</button>
		
	</form>

</body>
	
</html>
	
	