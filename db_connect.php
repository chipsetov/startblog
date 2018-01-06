<?php


$db_host = 'localhost';
$db_name = 'startblog';
$db_user = 'root';
$db_password = '';

define("DEBUG", true);

$dsn = 'mysql:host='.$db_host.';dbname='.$db_name.';charset=utf8';

try //...To connect to DB
{
    $db = new PDO($dsn, $db_user, $db_password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
}
catch(Exception $e) //Did not connect
{
    if(DEBUG == true)
    {
        $db_error = $e->getMessage();
        die($db_error);
    }
    else
    {
        die('Cannot connect to DB');
    }
}

?>