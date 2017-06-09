<?php

require_once("cabecalho.php");
require_once("conexao.php");
require_once("banco-produto.php");
verificaUsuario();

?>

<h1>Lista de Produtos</h1>
<?php $produtos = listaProdutos($conexao); ?>
<table class="table table-striped table-hover table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>PREÇO</th>
            <th>DESCRIÇÃO</th>
            <th>CATEGORIA</th>
            <th>USADO</th>
            <th>AÇÕES</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($produtos as $prod)
        {
        ?>
            <tr>
           <td> <?= $prod["id"] ?> </td>
           <td> <?= $prod["nome"] ?> </td>
           <td> <?= $prod["preco"] ?> </td>
           <td> <?= $prod["descricao"] ?> </td>
           <td> <?= $prod["categoria"] ?> </td>
           <td> <?= $prod["usado"] ? 'sim' : 'não' ?> </td>
           <td>
             <form action="remove-produto.php" method="post">
                 <input type="hidden" name="id" value="<?=$prod['id']?>">
                 <button class="btn btn-danger">Remover</button>
             </form>
            </td>
        </tr> <?php } ?>
    </tbody>
    <?php
        if (array_key_exists("excluido", $_GET) && $_GET['excluido']=='true') {
    ?>
    <p class="alert-success">Produto removido com sucesso!</p>
    <?php } ?>
</table>

<?php require_once("rodape.php");?>