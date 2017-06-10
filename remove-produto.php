<?php
require_once 'sessao.php';
require_once 'conexao.php';
require_once 'ProdutoDAO.php';

$id = $_POST['id'];
$dao = new ProdutoDAO($conexao);
$dao -> removeProduto($id);
header("LOCATION:produto-lista.php?excluido=true");
die();
?>
    <?php 
    verificaUsuario();
?>

        <p class="text-sucess">Produto
            <?=id?> removido!</p>
        <?php
require_once 'rodape.php';
?>