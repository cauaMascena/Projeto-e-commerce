<?php

/*CONEXÃO COM BANCO DE DADOS*/
require('../database/conexao.php');

/*
TRATAMENTO DOS DADOS VINDOS DO FORMULÁRIO

- TIPOS DA AÇÃO
- EXECUÇÃO DOS PROCESSOS DA AÇÃO SOLICITADA

*/
switch ($_POST['acao']) {
    case 'inserir':

        // echo 'INSERIR';exit;

        $descricao = $_POST['descricao'];

        /*MONTGEM DA INSTRUÇÃO SQL DE INSERÇÃO DE DADOS:*/
        $sql = "INSERT INTO tbl_categoria (descricao)
        VALUES ('$descricao')";

        // echo $sql;exit;

        /*
        mysql_query parametros:
        1 - Uma conexão aberta e válida
        2 - Uma instrução sql válida
        */
        $resultado = mysqli_query($conexao, $sql);

        header('location:index.php');

        // echo '<pre>';
        // var_dump($resultado);
        // echo '</pre>';
        // exit;

        break;
    
    default:
        # code...
        break;
}



?>