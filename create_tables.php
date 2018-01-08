<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "startblog";

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", "root" , "");

    if ($conn){
        echo "Connected to database ".$dbname;
    }
}
catch(PDOException $e){
    echo $e->getMessage();
}
$dbh = "CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `admin_user` bool COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1";

$stmt = $conn->prepare($dbh);
$stmt->execute();

$dbh = "CREATE TABLE IF NOT EXISTS `users3` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `admin_user` boolean COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1";

$stmt = $conn->prepare($dbh);
$stmt->execute();

$dbh = "CREATE TABLE IF NOT EXISTS `posts` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `content` text COLLATE utf8_unicode_ci,
  `date` datetime COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1";

$stmt = $conn->prepare($dbh);
$stmt->execute();

if ($conn){
    echo "Table users created successfully";
}else {
    echo "Error creating table";
}

