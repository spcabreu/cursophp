<?php
    require_once 'conexao.php';
    require_once 'banco-usuario.php';
    require_once 'sessao.php';

    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $senhaMd5 = md5($senha);
    $usuario = buscaUsuario($conexao,$login,$senhaMd5);
    if($usuario == null){
        header("LOCATION:index.php?erro=true");
    } else {
        logaUsuario($usuario["login"]);
        header("LOCATION:produto-lista.php");
    }
?>


