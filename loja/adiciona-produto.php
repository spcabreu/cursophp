<?php

require_once 'cabecalho.php';
require_once 'conexao.php';
require_once 'banco-produto.php';
verificaUsuario();

?>

<?php
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $categoria = $_POST['categoria'];
    if(isset($_POST["usado"])) {
        $usado = "true";
    } else {
        $usado = "false";
    }
    if(insereProduto($conexao, $nome,$preco,$descricao,$categoria,$usado))
    {
        ?> <p class="alert-success">
        Produto <?= $nome ?>, R$ <?= $preco ?> adicionado com sucesso! </p>
    <?php
    } else {
        ?> <p class="alert-danger"> Produto <?= $nome ?>, não foi adicionado! </p>
        <?php
    } ?>
<?php require_once("rodape.php"); ?>