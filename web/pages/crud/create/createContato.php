<?php 

    include('../../../inc/conecta.php');

    $dados = json_decode(file_get_contents('php://input'));
    if(!isset($dados)){
        die('Erro! Dados incompletos');
    }

    $sqlInsertContato = "INSERT INTO CONTATO (NOME, EMAIL, TELEFONE) VALUES ('$dados->nome', '$dados->email', '$dados->telefone')";
    $queryInsertContato = mysql_query($sqlInsertContato, $link);
    if (!isset($queryInsertContato)){
        die('Database error: ' . mysql_error());
    }else if(mysql_affected_rows($link) == -1){
        die('Email já cadastrado!');
    };
    
    $sqlBuscarContato = "SELECT ID FROM CONTATO WHERE EMAIL = '$dados->email'";
    $querySelectContato = mysql_query($sqlBuscarContato, $link);
    if (!isset($querySelectContato)){
        die('Database error: ' . mysql_error());
    }

    $contato = mysql_fetch_assoc($querySelectContato);
    $idContato = $contato['ID'];
    $sqlInsertEndereco = "INSERT INTO ENDERECO (RUA, NUMERO, BAIRRO, CIDADE, ESTADO, CEP, ID_CONTATO) VALUES ('$dados->rua', '$dados->numero', '$dados->bairro', '$dados->cidade', '$dados->estado', '$dados->cep', '$idContato')";
    $queryInsertEndereco = mysql_query($sqlInsertEndereco, $link);
    if (!isset($queryInsertEndereco)){
        die('Database error: ' . mysql_error());
    }else{
        echo 'Contato cadastrado com sucesso!';
    }

?>