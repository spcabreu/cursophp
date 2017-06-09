<?php

function insereCategoria($conexao, $nome) {
    $sql = "INSERT INTO categorias (nome) VALUES ('{$nome}')";
    $resultado = mysqli_query($conexao, $sql);
    return $resultado;
}

function listaCategorias($conexao) {
    $sql = "SELECT * FROM categorias";
    $resultado = mysqli_query($conexao, $sql);
    $lista = array();
    while($categoria = mysqli_fetch_assoc($resultado)) {
        array_push($lista, $categoria);
    }
    return $lista;
}

function removeCategoria($conexao, $id) {
    $sql = "DELETE FROM categorias WHERE id = {$id}";
    $resultado = mysqli_query($conexao, $sql);
    return $resultado;
}

?>