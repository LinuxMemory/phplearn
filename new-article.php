<?php
require 'includes/database.php';
$errors = [];
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	
var_dump($_POST['content']);
	
if ($_POST['title'] == ''){

	$errors[] = "Titile is required";
	
}

if($_POST['content'] == '') {

$errors[] = "Content is required";

}

if ($_POST['published_time'] == ''){
	$_POST['published_time'] = null;

}
	
if ($_POST['published_time'] !=''){
$date_time = date_create_from_format('Y-m-d H:i:s', $_POST['published_time']);

if ($date_time === false){
$errors[] = "Date is wrong";
} else {
$date_time = date_get_last_errors();
if ($date_time['warning_count'] > 0){
$errors[] = "Date is wrong";
}

}


}

if (empty($errors)){

$conn = getDB();

$sql = "INSERT INTO articles(title, content, published_time) VALUES(?,?,?)";

$stmt = mysqli_prepare($conn, $sql);

if ($stmt === false) {
echo mysqli_error($conn);

} else {


	
mysqli_stmt_bind_param($stmt, "sss", $_POST['title'], $_POST['content'], $_POST['published_time']);

if (mysqli_stmt_execute($stmt)) {

$id = mysqli_insert_id($conn);

echo "Inserted id equals: $id";
	
if (isset($_SERVER['HTTPS']) & $_SERVER['HTTPS'] != "on"){
	$protocl = "https";
} else {
	$protocol = "http";
}
		
	header("Location: $protocol://" . $_SERVER['HTTP_HOST'] . "/article.php?id=$id");
			}else {
echo "not working";
	}
		} 
	} 
}
?>






<html>
<body>
	<h1>My blog</h1>
	
	<h2>New article</h2>

	<?php foreach ($errors as $value): ?>
	<ul><li><p><?php echo $value; ?></li></ul>
	<?php endforeach; ?>
	
	<form method="post">
		
		<div>
			<label for="title">Title</label>
			<input type="text" name="title" id="title" value="<?php echo htmlspecialchars($_POST['title']); ?>">
		</div>
		<br>
		<div>
			<label for="content">Content</label>
			<textarea name="content" id="content"><?php echo htmlspecialchars($_POST['content']); ?></textarea>
		</div>
		<br>
		<div>
			<label for="published_time">Published at</label>
			<input type="date-local" name="published_time" id="published_time" placeholder="0000-00-00" value="<?php echo $_POST['published_time']; ?>">
		</div>
		<br>
		<button>Send</button>
		
	</form>
	
	
</body>
</html>