<!DOCTYPE html>
<html>
<?php 
require_once 'sessao.php';
?>

    <head>
        <meta charset="UTF-8">
        <title>Minha Loja</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/loja.css">
        <script src="js/jquery.js"></script>
    </head>

    <body>
        <?php 
if(usuarioEstaLogado()) { ?>
            <div class="navbar navbar-inverse navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <a href="index.php" class="navbar-brand">Minha Loja</a>
                    </div>
                    <div>
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="produto-formulario.php">Adiciona Produto</a>
                            </li>
                            <li>
                                <a href="produto-lista.php">Lista Produto</a>
                            </li>
                            <li>
                                <a href="contato.php">Contato</a>
                            </li>
                            <li>
                                <a href="logout.php">Lougout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php } ?>
                <p>
                    <?=usuarioLogado() ?>
                </p>
                <main class="container">
                    <section class="principal">