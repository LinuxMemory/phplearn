<?php
require "includes/redirect-url.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST"){
	
if ($_POST['username'] == "dave" && $_POST['password'] == "1qazxsw2"){
	
	$_SESSION['is_logged'] = true;
	redirectURL("/index.php");
	
	
	} else {
		
		$errors = "Login is incorrect";
		
	}	
}


?>

<html>
<body>
	
	<h3>Login Page</h3>
	
	<form method="post">
		
	<p><?php echo $errors; ?></p>
		
		<div>
			<label for="username">Username</label>
			<input type="text" name="username" id="username">
		</div>
		
		<div>
			<label for="password">Password</label>
			<input type="password" name="password" id="password">
			
		</div>
		
		<button>Log In</button>
		
		
	</form>
	
</body>	
</html>
	