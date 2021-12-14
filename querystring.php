<?php

$posts = [1 => 'Good news', 3 => 'Read this', 5 => 'Important announcement'];

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Posts</title>
    </head>
    <body>

    <h1>Posts</h1>

    <ul>
        <?php foreach($posts as $id => $title): ?>
        
            <li><a href="post.php?id=<?php echo $id; ?>"><?php echo $title; ?> </a></li>
            
        <?php endforeach; ?>
    </ul>

    </body>
</html>