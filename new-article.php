<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	
	var_dump($_POST);	


require 'includes/database.php';

$sql = "INSERT INTO articles(title, content, published_time) VALUES(?,?,?)";

$stmt = mysqli_prepare($conn, $sql);

if ($stmt === false) {
echo mysqli_error($conn);

} else {

mysqli_stmt_bind_param($stmt, "sss", $_POST['title'], $_POST['content'], $_POST['published_time']);

if (mysqli_stmt_execute($stmt)) {

$id = mysqli_insert_id($conn);

echo "Inserted id equals: $id";

	
		} 
	}
}
?>






<html>
<body>
	<h1>My blog</h1>
	
	<h2>New article</h2>
	
	<form method="post">
		
		<div>
			<label for="title">Title</label>
			<input type="text" name="title" id="title">
		</div>
		<br>
		<div>
			<label for="content">Content</label>
			<textarea name="content" id="content"></textarea>
		</div>
		<br>
		<div>
			<label for="published_time">Published at</label>
			<input type="date-local" name="published_time" id="published_time" placeholder="0000-00-00" >
		</div>
		<br>
		<button>Send</button>
		
	</form>
	
	
</body>
</html>