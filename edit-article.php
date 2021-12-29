<?php

require "includes/database.php";
require "includes/get-article.php";
require "includes/validate-erros.php";

$conn = getDB();

$articles = getArticle($conn, $_GET['id']);

$title = $articles['title'];
$content = $articles['content'];
$published_time = $articles['published_time'];
var_dump($content);
var_dump($articles);

$errors = validateInput($title, $content, $published_time);
var_dump($errors);


if ($articles === null) {
	echo "article not found";
}


?>

<!DOCTYPE HTML>
<html>
<body>
	<h1>My Blog</h1>
	<h3>Edit Article</h3>
	<?php foreach ($errors as $error): ?>
	<ul><li><?php echo $error; ?></li></ul>
	<?php endforeach; ?>
	
	<form method="post">
		
		<div>
			<label for="title">Article Name</label>
			<input type="text" name="title" id="title" value="<?php echo htmlspecialchars($title); ?>">
		</div><br>
		
		<div>
			<label for="content">Content</label>
			<textarea name="content" id="content"><?php echo htmlspecialchars($content); ?></textarea>			
		</div><br>
 
		<div>
			<label for="published_at">Published Time</label>
			<input type="datetime" name="published_at" id="published_at" value="<?php echo htmlspecialchars($published_time); ?>">
		</div>
	    
		<br>
		<button>Save</button>
	</form>
	
</body>
</html>