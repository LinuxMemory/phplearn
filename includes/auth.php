<?php

function isLogged() {
	
	return ($_SESSION['is_logged']);

}


/*<?php if($_SESSION['is_logged']) :?>
<?php echo "You are logged in"; ?> <a href="logout.php">Log out</a>
	<br>
	<p></p>
	
	<a href="new-article.php">New article</a>

<?php else :?>
<?php echo "You are not logged in"; ?> <a href="login.php">Log in</a>
<?php endif; ?>
	*/