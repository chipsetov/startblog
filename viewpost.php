<?php //require('includes/config.php');?>
<?php require('connect.php');
$stmt = $pdo->prepare('SELECT id, title, content, postDate FROM posts WHERE id = :postID');
$stmt->execute(array(':postID' => $_GET['id']));
$row = $stmt->fetch();

//if post does not exists redirect user.
if($row['id'] == ''){
    header('Location: ./');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blog - <?php echo $row['title'];?></title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
</head>
<body>

<div id="wrapper">

    <h1>Blog</h1>
    <hr />
    <p><a href="./">Blog Index</a></p>


    <?php
    echo '<div>';
    echo '<h1>'.$row['title'].'</h1>';
    echo '<p>Posted on '.date('jS M Y', strtotime($row['postDate'])).'</p>';
    echo '<p>'.$row['content'].'</p>';
    echo '</div>';
    ?>

</div>

</body>
</html>