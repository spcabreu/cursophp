<?php

function buscaUsuario($conexao, $login, $senha) {
    $login = mysqli_real_escape_string($conexao,$login);
    $sql = "SELECT * FROM usuarios WHERE  login='{$login}' AND senha='{$senha}'";
    $resultado = mysqli_query($conexao, $sql);
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;
}

?>