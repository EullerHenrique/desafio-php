<?php

include('../inc/conecta.php');

$idContato = $_GET['id'];
if(!$idContato){
    die('Erro! ID não informado');
}else if(!is_numeric($idContato)){
    die('Erro! ID inválido');
}

$sql = "SELECT * FROM ENDERECO WHERE ID_CONTATO = $idContato";
$queryEndereco = mysql_query($sql, $link);
if (!$queryEndereco){
    die('Database error: ' . mysql_error());
}

?>