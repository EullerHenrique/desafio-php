<?php

include('../inc/conecta.php');

$totalPorPagina = $_GET['perPage'];
if(!$totalPorPagina){
    $totalPorPagina = 5;
}

$sqlTotal = "SELECT COUNT(*) as total FROM CONTATO";
$queryTotal = mysql_query($sqlTotal, $link);
$totalLinhas = mysql_result($queryTotal, 0, 'total');
$totalPaginas = ceil($totalLinhas / $totalPorPagina);

$paginaAtual = $_GET['page'];
if (!$paginaAtual || $paginaAtual < 0 || !is_numeric($paginaAtual) || $paginaAtual == 0 || $paginaAtual > $totalPaginas) {
    $paginaAtual=1; 
} 

//Ex: 0 * 10 = 0
//Ex: 1 * 10 = 10
$indiceInicial = ($paginaAtual-1) * $totalPorPagina;

//LIMIT -> Primeiro parametro é o índice do ínicio e o segundo é o total de registros
$sqlLimit = "SELECT * FROM CONTATO ORDER BY NOME ASC LIMIT $indiceInicial, $totalPorPagina";
$queryContatos = mysql_query($sqlLimit, $link);
if (!$queryContatos){
        die('Database error: ' . mysql_error());
}   

$paginaAnterior = $paginaAtual==1?1:$paginaAtual-1;
$paginaPosterior = $paginaAtual>$totalPaginas?$paginaAtual:$paginaAtual+1;

?>