<?php
require_once'cabecalho.php';
require_once'conexao.php';
require_once'ProdutoDAO.php';
require_once 'Produto.php';
require_once 'Categoria.php';

verificaUsuario();
?>  
   
<?php
    $id = $_POST['id'];
    $dao = new ProdutoDAO($conexao);
    $produto = new Produto();
    $categoria = new Categoria();
    $produto->setId($id);
    $produto->setNome($_POST['nome']);
    $produto->setPreco($_POST['preco']);
    $produto->setDescricao($_POST['descricao']);
    $categoria->setId($_POST['categoria']);
    $produto->setCategoria($categoria);
    
    if(isset($_POST["usado"])) { 
        $produto->setUsado("true");
    } else { 
    $produto->setUsado("false");
    }

    if($id) {
            $salvou = $dao -> alteraProduto($produto);
        } else {
            $salvou = $dao -> insereProduto($produto);
        }

    if($salvou) { ?>
        <p class="alert-success">
            Produto <?= $produto->getNome() ?>, R$ <?= $produto->getPreco() ?> adicionado com sucesso!
        </p> <?php 
    } else { ?> 
        <p class="alert-danger"> Produto <?= $produto->getNome() ?>, não foi adicionado! </p> <?php 
    }
?>

<?php require_once("rodape.php"); ?>