<?php
require_once'cabecalho.php';
require_once'conexao.php';
require_once'ProdutoDAO.php';
require_once 'Produto.php';
require_once 'LivroFisico.php';
require_once 'Ebook.php';
require_once 'Categoria.php';

verificaUsuario();
?>  
   
<?php
    $id = $_POST['id'];
    $tipo = $_POST['tipoProduto'];
    if($tipo == "Ebook") {
        $produto = new Ebook();
        $produto -> setIsbn($_POST["isbn"]);
        $produto -> setWaterMark($_POST["waterMark"]);
        } else if($tipo == "LivroFisico") {
            $produto = new LivroFisico();
            $produto -> setIsbn($_POST["isbn"]);
            $produto -> setTaxaImpressao($_POST["taxaImpressao"]);
            }
    else {
        $produto = new Produto();
    }
    $dao = new ProdutoDAO($conexao);
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