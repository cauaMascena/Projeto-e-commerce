<?php

session_start();

require('../../database/conexao.php');

// echo '<pre>';
// var_dump($usuario, $senha);
// echo '</pre>';
// exit;

function realizarLogin($usuario, $senha, $conexao){
    $sql = "SELECT * FROM tbl_administrador
    WHERE usuario = '$usuario' AND senha = '$senha'";

    $resultado = mysqli_query($conexao, $sql);

    $dadosUsuario = mysqli_fetch_array($resultado);

    if(isset($dadosUsuario["usuario"]) && isset($dadosUsuario["senha"])) {
        echo "LOGADO!";
    } else {
        echo 'ALGO DEU ERRADO!';
    }
}

realizarLogin('cristiano', '12345', $conexao);

?>