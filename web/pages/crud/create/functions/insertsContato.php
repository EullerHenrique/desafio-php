<?php 
    function realizarInsertContato($sqlInsertContato, $link){  
        $queryInsertContato = mysql_query($sqlInsertContato, $link);
 
        if (!isset($queryInsertContato)) {
           throw new Exception('Database error: ' . mysql_error());
        } else {
            $erro = mysql_errno($link);
            if ($erro == 1062) {
              throw new Exception('Contato já cadastrado!');
            }
        }
    }

    function realizarInsertEnderecoContato($sqlInsertEnderecoContato, $link){
        $queryInsertEndereco = mysql_query($sqlInsertEndereco, $link);
        if (!isset($queryInsertEndereco)){
            die('Database error: ' . mysql_error());
        }else{
            echo 'Contato cadastrado com sucesso!';
        }
    }
?>
