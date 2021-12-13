<?php
$db_host = "localhost";
$db_user = "cmsuser";
$db_pass = "Hsra35@5";
$db_name = "cms";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
	echo mysqli_connect_error();
} else {

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

</body>
</html>

