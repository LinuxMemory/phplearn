<?php

require 'includes/database.php';

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
	
<?php foreach($articles as $article): ?>
<h3>	<li><a href="article.php?id=<?php echo htmlspecialchars($article['id']); ?>"><?php echo htmlspecialchars($article['title']); ?></a></li></h3>
	<p><?php echo htmlspecialchars($article['content']); ?></p>
<?php endforeach; ?>

<a href=article.php> test </a>
	

</body>
</html>

