<?php

require("../database/conexao.php");

switch ($_POST["acao"]) {
    case 'inserir':

        // TRATAMENTO DA IMAGEM PARA UPLOAD

        // echo '<pre>';
        // var_dump($_FILES);
        // echo '<pre>';

        // RECUPERA NOME DO ARQUIVO
        $nomeArquivo = $_FILES["foto"]["name"];

        //RECUPERAR A EXTENSÃO DO ARQUIVO
        $extensao = pathinfo($nomeArquivo, PATHINFO_EXTENSION);

        //DEFINIR UM NOVO NOME PARA ARQUIVO DE IMAGEM
        $novoNome = md5(microtime()) . "." . $extensao;

        // echo $nomeArquivo;
        // echo '<pre>';
        // echo $novoNome;

        //UPLOAD DO ARQUIVO
        move_uploaded_file($_FILES["foto"]["tmp_name"], "fotos/$novoNome");

        // INSERÇÃO DE DADOS NA BASE DE DADOS DO MYSQL

        // RECEBIMENTO DOS DADOS

        $descricao = $_POST["descricao"];
        $peso = $_POST["peso"];
        $quantidade = $_POST["quantidade"];
        $cor = $_POST["cor"];
        $tamanho = $_POST["tamanho"];
        $valor = $_POST["valor"];
        $desconto = $_POST["desconto"];
        $categoriaId = $_POST["categoria"];

        // CRIAÇÃO DA INSTRUÇÃO SQL DE INSERÇÃO;
        $sql = "INSERT INTO tbl_produto
    (descricao,
     peso,
     quantidade,
     cor,
     tamanho,
     valor,
     desconto,
     imagem,
     categoria_id) 
     
    VALUES(
    '$descricao',
    $peso, 
    $quantidade, 
    '$cor', 
    '$tamanho',
    $valor,
    $desconto,
    '$novoNome',
    $categoriaId)";

    // EXECUÇÃO DO SQL DE INSERÇÃO
    $resultado = mysqli_query($conexao, $sql);

    // REDIRECIONAR PARA INDEX;

    header('location: index.php');

        break;

    default:
        # code...
        break;
}
