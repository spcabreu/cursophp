<?php

require_once("cabecalho.php");
require_once("conexao.php");
require_once("ProdutoDAO.php");
verificaUsuario();

?>
    <h1>Lista de Produtos</h1>
    <?php
        $dao = new ProdutoDAO($conexao);
        $produtos = $dao -> listaProdutos(); 
    ?>
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>PREÇO</th>
                    <th>PREÇO COM DESCONTO</th>
                    <th>DESCRIÇÃO</th>
                    <th>CATEGORIA</th>
                    <th>USADO</th>
                    <th>ISBN</th>
                    <th>WATER MARK</th>
                    <th>TAXA IMPRESSÃO</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php 
        foreach($produtos as $prod) {
        ?>
        <tr>
            <td><?= htmlspecialchars($prod -> getId()) ?></td>
            <td><?= htmlspecialchars($prod -> getNome()) ?></td>
            <td><?= $prod -> getPreco() ?></td>
            <td><?= $prod -> precoComDesconto() ?></td>
            <td><?= $prod -> getDescricao() ?></td>
            <td><?= $prod -> getCategoria() -> getNome()?></td>
            <td><?= $prod -> getUsado() ? 'sim' : 'não' ?></td>
            <td>
                <?php
                    if($prod -> temIsbn()) {
                        echo $prod -> getIsbn();
                    }
                ?>
            </td>
            <td>
                <?php
                    if($prod -> temWaterMark()) {
                        echo $prod -> getWaterMark();
                    }
                ?>
            </td>
            <td>
                <?php
                    if($prod -> temTaxaImpressao()) {
                        echo $prod -> getTaxaImpressao();
                    }
                ?>
            </td>
            <td>
               <a class="btn btn-warning" href="produto-formulario.php?id=<?=$prod -> getId()?>">Editar</a>
                <form action="remove-produto.php" method="post">
                    <input type="hidden" name="id" value="<?=$prod -> getId()?>">
                    <button class="btn btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
        <?php } ?>
        </tbody>
            <?php 
        if (array_key_exists("excluido", $_GET) && $_GET['excluido']=='true') { ?>
                <p class="alert-success">Produto removido com sucesso!</p>
                <?php } ?>
        </table>
        <?php require_once("rodape.php");?>