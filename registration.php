<?php
///**
// * Created by PhpStorm.
// * User: AntoA
// * Date: 05.01.2018
// * Time: 14:53
// */
//require('header.php'); ?>
<!---->
<?php
//
////register.php
//
///**
// * Start the session.
// */
//session_start();
//
///**
// * Include ircmaxell's password_compat library.
// */
//require 'lib/password.php';
//
///**
// * Include our MySQL connection.
// */
//require 'connect.php';
//
//
////If the POST var "register" exists (our submit button), then we can
////assume that the user has submitted the registration form.
//if(isset($_POST['register'])){
//
//    //Retrieve the field values from our registration form.
//    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
//    $pass = !empty($_POST['password']) ? trim($_POST['password']) : null;
//
//    //TO ADD: Error checking (username characters, password length, etc).
//    //Basically, you will need to add your own error checking BEFORE
//    //the prepared statement is built and executed.
//
//    //Now, we need to check if the supplied username already exists.
//
//    //Construct the SQL statement and prepare it.
//    $sql = "SELECT COUNT(username) AS num FROM users WHERE username = :username";
//    $stmt = $pdo->prepare($sql);
//
//    //Bind the provided username to our prepared statement.
//    $stmt->bindValue(':username', $username);
//
//    //Execute.
//    $stmt->execute();
//
//    //Fetch the row.
//    $row = $stmt->fetch(PDO::FETCH_ASSOC);
//
//    //If the provided username already exists - display error.
//    //TO ADD - Your own method of handling this error. For example purposes,
//    //I'm just going to kill the script completely, as error handling is outside
//    //the scope of this tutorial.
//    if($row['num'] > 0){
//        die('That username already exists!');
//    }
//
//    //Hash the password as we do NOT want to store our passwords in plain text.
//    $passwordHash = password_hash($pass, PASSWORD_BCRYPT, array("cost" => 12));
//
//    //Prepare our INSERT statement.
//    //Remember: We are inserting a new row into our users table.
//    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
//    $stmt = $pdo->prepare($sql);
//
//    //Bind our variables.
//    $stmt->bindValue(':username', $username);
//    $stmt->bindValue(':password', $passwordHash);
//
//    //Execute the statement and insert the new account.
//    $result = $stmt->execute();
//
//    //If the signup process is successful.
//    if($result){
//        //What you do here is up to you!
//        echo 'Thank you for registering with our website.';
//    }
//
//}
//
//?>
<!--<h1>Register</h1>-->
<!--<form action="registration.php" method="post">-->
<!--    <label for="username">Username</label>-->
<!--    <input type="text" id="username" name="username"><br>-->
<!--    <label for="password">Password</label>-->
<!--    <input type="text" id="password" name="password"><br>-->
<!--    <input type="submit" name="register" value="Register"></button>-->
<!--</form>-->
<!---->
<?php
//require('footer.php');
//
//?>


<?php

session_start();

require_once 'create_db.php';

require "create_tables.php";

require "db_connect.php";


//If the POST var "register" exists (our submit button), then we can
//assume that the user has submitted the registration form.
if(isset($_POST['register']))

    //Retrieve the field values from our registration form to $ username variable.
    //Check if usermane field isn't empty. If it isn't - trim spaces off the string.
    //else, the default value is null
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
//The same with the password
$password = !empty($_POST['password']) ? trim($_POST['password']) : null;

//Construct the SQL statement and prepare it.
$dbh = "select top (1) username FROM users WHERE username = :username";

$stmt = $pdo->prepare($dbh);

//Bind the provided username to the select statement
$stmt->bindvalue(':username', $username);

//Execute
$stmt->execute();

//Fetch the row.
$row = $stmt->fetch(PDO::FETCH_ASSOC);

//If the username already exists- display an error message
if($row['num']>0){
    die('This username is taken');
}

//If the username is not taken, hash the password and register the new user
$passwordHash = password_hash($pass, password_bcrypt, array("cost" => 12));

//Prepare the INSERT statement
$sql = "INSERT INTO users (username, password) values (:username, :password)";
$stmt = $pdo->prepare($sql);

//Bind values to variables.
$stmt->bindValue(':username', $username);
$stmt->bindValue(':password', $passwordHash);

//Execute the statement and insert the new account
$result = $stmt->execute();

//If the signup is successful
if($result){
    echo 'Thank you for registering with our website';
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<h1>Register Here</h1>
<form action="user_registration.php" method="">
    <label for="username">Username</label>
    <input type="text" id="username" name="username"><br>
    <label for="username">Username</label>
    <input type="text" id="username" name="username"><br>
    <button type="submit" name="register" value="register"></button>
</form>
</body>
</html>
?>