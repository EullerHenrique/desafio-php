<?php

include('../inc/conecta.php');

$sql = "SELECT * FROM CONTATO ORDER BY NOME ASC";
$queryContatos = mysql_query($sql, $link);
if (!$queryContatos){
    die('Database error: ' . mysql_error());
}

?>