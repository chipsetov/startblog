<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername" , $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh = "CREATE DATABASE IF NOT EXISTS startblog";
    // use exec() because no results are returned
    $conn->exec($dbh);

    echo "Database startblog Created Successfully<br>";
}
catch(PDOException $e)
{
    $e->getMessage();
    echo $e;

}

$conn = null;

?>