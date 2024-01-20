<?php 
    include('../../../inc/conecta.php');
    include('functions/insertsContato.php');

    $dados = json_decode(file_get_contents('php://input'));
    if(!isset($dados)){
        die('Erro! Dados incompletos');
    }

    $sqlInsertContato = "INSERT INTO CONTATO (NOME, EMAIL, TELEFONE) VALUES ('$dados->nome', '$dados->email', '$dados->telefone')";
    realizarInsertContatoNoBD($sqlInsertContato, $link);
    
    $sqlBuscarContato = "SELECT ID FROM CONTATO WHERE EMAIL = '$dados->email'";
    $querySelectContato = mysql_query($sqlBuscarContato, $link);
    if (!isset($querySelectContato)){
        die('Database error: ' . mysql_error());
    }

    $contato = mysql_fetch_assoc($querySelectContato);
    $idContato = $contato['ID'];
    $sqlInsertEndereco = "INSERT INTO ENDERECO (RUA, NUMERO, BAIRRO, CIDADE, ESTADO, CEP, ID_CONTATO) VALUES ('$dados->rua', '$dados->numero', '$dados->bairro', '$dados->cidade', '$dados->estado', '$dados->cep', '$idContato')";
    realizarInsertEnderecoContato($sqlInsertEndereco, $link);

?>