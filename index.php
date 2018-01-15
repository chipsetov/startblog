<?php

//if(session_status()!=PHP_SESSION_ACTIVE) session_start();
session_start();
require('header.php');

print_r($_SESSION); ?>

<?php require('connect.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blog</title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
</head>
<body>

<div id="wrapper">

    <h1>Blog</h1>
    <hr />

    <?php
    try {

        $stmt = $pdo->query('SELECT id, title, postDesc, postDate FROM posts ORDER BY id DESC');

        while($row = $stmt->fetch()){


           // $stmt = $pdo->query("select sum(`like`) as `like`,sum(`unlike`) as `unlike` from `likes` where pid = :row['id'])");


            echo '<div>';
            echo '<h1><a href="viewpost.php?id='.$row['id'].'">'.$row['title'].'</a></h1>';
            echo '<p>Posted on '.date('jS M Y H:i:s', strtotime($row['postDate'])).'</p>';
            echo '<p>'.$row['postDesc'].'</p>';
            echo '<p><a href="viewpost.php?id='.$row['id'].'">Read More</a></p>';
            echo '</div>';

        }

    } catch(PDOException $e) {
        echo $e->getMessage();
    }
    ?>

</div>


<?php
require('footer.php');

