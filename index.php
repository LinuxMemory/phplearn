<?php

require 'includes/database.php';
require 'includes/auth.php';
session_start();

$conn = getDB();

$db = "select * from articles";

$result = mysqli_query($conn, $db);


if ($result == NULL){
echo mysqli_error($conn);

} else {
	
$articles = mysqli_fetch_all($result, MYSQLI_ASSOC);


 }

?>

<!DOCTYPE html>

<html>
<body>

<h1>My Blog</h1>

<?php if(!isLogged()): ?>
<?php echo "You are not logged in"; ?> <a href="login.php">Log in</a>
<?php else : ?>
<?php echo "You are logged in"; ?> <a href="logout.php">Log out</a>
<p></p>
<a href="new-article.php">New article</a>

<?php endif; ?>
	
	
<?php foreach($articles as $article): ?>
<h3>	<li><a href="article.php?id=<?php echo htmlspecialchars($article['id']); ?>"><?php echo htmlspecialchars($article['title']); ?></a></li></h3>
	<p><?php echo htmlspecialchars($article['content']); ?></p>
<?php endforeach; ?>

	

</body>
</html>

