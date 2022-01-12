<?php

require 'includes/database.php';

$conn = getDB();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
	
$db = "select * from articles where id = " . $_GET['id'];

var_dump($db);	
	
$result = mysqli_query($conn, $db);


if ($result == NULL){
echo mysqli_error($conn);

} else {
	
$articles = mysqli_fetch_assoc($result);

} 


 } else {
$articles == null;
	
var_dump($articles);

}


?>

<!DOCTYPE html>

<html>
<body>
<h1>My Blog</h1>
<?php if(empty($articles)) : ?>
	<?php echo "Articles not found"; ?>

<?php else : ?>


<h3><li><?php echo $articles['title']; ?></li></h3>
	<p><?php echo $articles['content']; ?></p>
<?php endif; ?>

<a href="edit-article.php?id=<?php echo $_GET['id'] ?>">Edit article page</a>	
<form method='post' action="delete.php?id=<?php echo $_GET['id'] ?>">
	<button>Delete</button>
	</form>

	
</body>
</html>

