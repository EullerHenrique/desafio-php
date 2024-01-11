<?php 

$servername = "database";
$username = "root";
$password = "root";

    $link = mysql_connect($servername, $username, $password);
    if (!$link) {
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db('test', $link);    
?>

