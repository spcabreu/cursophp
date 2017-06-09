<?php

require_once 'cabecalho.php';
require_once 'conexao.php';
require_once 'banco-categoria.php';

verificaUsuario();
$categorias = listaCategorias($conexao);

?>

<h1>Formulário de Cadastro</h1>
<form action="adiciona-produto.php" method="post">

    <div class="form-group">
        <label for="nome">Nome:</label>
        <input id="nome" type="text" name="nome" class="form-control">
    </div>

    <div class="form-group">
        <label for="preco">Preço:</label>
        <input id="preco" type="text" name="preco" class="form-control">
    </div>

    <div class="form-group">
        <label>Descrição</label>
        <textarea name="descricao" class="form-control"></textarea>
    </div>

    <div class="checkbox">
        <label>
            <input type="checkbox" name="usado" value="true"/>
            Usado:
        </label>
    </div>

    <div class="form-group">
        <label>Categoria:</label>
        <select name="categoria" class="form-control">
          <?php foreach($categorias as $categoria) : ?>
                <option value="<?=$categoria['id'] ?>">
                      <?=$categoria['nome']?>
                </option>
            <?php endforeach ?>
        </select>
    </div>

    <input type="submit" value="Cadastrar" class="btn btn-primary">
</form>

<?php require_once 'rodape.php';?>