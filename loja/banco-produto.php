<?php

function insereProduto($conexao, $nome, $preco, $descricao, $categoria,$usado) {
    $sql = "INSERT INTO produtos (nome,preco,descricao, categoria_id,usado) VALUES ('{$nome}',{$preco},'{$descricao}',{$categoria},{$usado})";
    $resultado = mysqli_query($conexao, $sql);
    return $resultado;
}

function listaProdutos($conexao) {
    $sql = "SELECT p.*, c.nome AS categoria FROM produtos AS p 
            LEFT JOIN categorias AS c 
            ON p.categoria_id = c.id";
    $resultado = mysqli_query($conexao, $sql);
    $lista = array();
    while($produto = mysqli_fetch_assoc($resultado)) {
        array_push($lista, $produto);
    }
    return $lista;
}

function removeProduto($conexao, $id) {
    $sql = "DELETE FROM produtos WHERE id = {$id}";
    $resultado = mysqli_query($conexao, $sql);
    return $resultado;
}

?>