<?php

include('../inc/conecta.php');

$sql = "SELECT * FROM ENDERECO WHERE ID_CONTATO = $idContato";
$queryEndereco = mysql_query($sql, $link);
if (!$queryEndereco){
    die('Database error: ' . mysql_error());
}

?>