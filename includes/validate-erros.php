<?php

function validateInput ($title, $content, $published_at){

$errors = [];
if ($_SERVER['REQUEST_METHOD'] == "POST"){

	if ($_POST['title'] == ''){

        $errors[] = "Titile is required";
	}
	
if ($_POST['content'] == ''){
	$errors[] = "Content is required";
}

$date_time = date_create_from_format('Y-m-d H:i:s', $_POST['published_at']);
	var_dump($_POST['published_at']);
if ($date_time === false){
	$errors[] = "Wrong time";
}
$test_time = date_get_last_errors($date_time);
	var_dump($test_time);
	
if ($test_time['warning_count'] > 0){
	$errors[] = "Wrong time";	
   }	
  }
	return $errors;
}
?>

<!--
<DOCTYPE !HTML>
<html>
<body>
	<h1>My Blog</h1>
	<h3>Edit Article</h3>
	
	<?php foreach ($errors as $error) : ?>
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
			<input type="datetime" name="published_at" id="published_at" placeholder="Y-m-d H:i:s" value="<?php echo htmlspecialchars($published_time); ?>">
		</div>
	    
		<br>
		<button>Save</button>
	</form>
	
</body>
</html>
-->
