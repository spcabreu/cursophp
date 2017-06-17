
<?php 
require_once 'cabecalho.php';
require_once 'conexao.php';
require_once 'banco-categoria.php';
require_once 'ProdutoDAO.php';
require_once 'Produto.php';
require_once 'Ebook.php';
require_once 'LivroFisico.php';
 
verificaUsuario();
$dao = new ProdutoDAO($conexao);
if(isset($_GET['id'])) {
    $produto = $dao -> buscarProdutoPorId($_GET['id']);
} else {
    $produto = new Produto;
    $produto -> setCategoria(new Categoria());
}

?>

<?php $categorias = listaCategorias($conexao); ?>

<h1>Formulário de Cadastro</h1>
<form action="adiciona-produto.php" method="post" data-livro="<?=$produto -> temIsbn()?>">
   <input type="hidden" name="id" value="<?= $produto -> getId() ?>">
    <div class="form-group">
        <label for="nome">Nome:</label>
        <input id="nome" type="text" name="nome" value="<?= $produto -> getNome()?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="preco">Preço:</label>
        <input id="preco" type="text" name="preco" value="<?= $produto -> getPreco()?>" class="form-control">
    </div>
    <div class="form-group">
        <label>Descrição</label>
        <textarea name="descricao" class="form-control"><?= $produto -> getDescricao()?></textarea>
    </div>
        <div class="checkbox">
        <label>
            <input type="checkbox" name="usado" value="true" <?= $produto -> getUsado()?'checked':'' ?> />
            Usado:
        </label>
        </div>
    <div class="form-group">
        <label>Categoria:</label>
        <select name="categoria" class="form-control">
          <?php foreach($categorias as $categoria) : ?>
                <option value="<?=$categoria['id'] ?>" <?=$produto -> getCategoria() -> getId() ==
                                  $categoria['id']?'selected': '' ?>>
                      <?=$categoria['nome']?>
                </option>
            <?php endforeach ?>  
        </select>
    </div>
    <div class="form-group">
        <label>Tipo de produto</label>
        <select name="tipoProduto" class="form-control">
            <option value="Produto" <?=!$produto -> temIsbn() ? 'selected' : ''?> >Geral</option>
            <optgroup label="Livro">
                <option value="Ebook" <?=$produto -> temWaterMark() ? 'selected' : ''?> >Ebook</option>
                <option value="LivroFisico" <?=$produto -> temTaxaImpressao() ? 'selected' : ''?> >Livro Físico</option>
            </optgroup>
        </select>
    </div>
    <div class="form-group isbn">
        <label>ISBN (quando for um livro)</label>
        <?php if ($produto->temIsbn()) {
            $isbn = $produto->getIsbn();
        } else {
            $isbn = "";
        } ?>
        <input class="form-control" name="isbn" value="<?=$isbn ?>"/>
    </div>
    <div class="form-group waterMark">
        <label>Watermark (quando for um ebook)</label>
        <?php if ($produto->temWaterMark()) {
            $waterMark = $produto-> getWaterMark();
        } else {
            $waterMark = "";
        }?>
        <input class="form-control" name="waterMark" value="<?=$waterMark ?>"/>
    </div>
    <div class="form-group taxaImpressao">
        <label>Taxa de impressão (quando for um livro físico)</label>
        <?php if ($produto->temTaxaImpressao()) {
            $taxaImpressao = $produto-> getTaxaImpressao();
        } else {
            $taxaImpressao = "";
        }?>
        <input class="form-control" name="taxaImpressao" value="<?=$taxaImpressao ?>"/>
    </div>
    <input type="submit" value="Cadastrar" class="btn btn-primary">
</form>
<script src="js/campo-isbn.js"></script>
<?php require_once("rodape.php"); ?>