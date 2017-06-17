<?php
require_once 'Produto.php';
require_once 'LivroFisico.php';
require_once 'Ebook.php';
require_once 'Categoria.php';

class ProdutoDAO {
    private $conexao;
    public function __construct($conexao) {
        $this -> conexao = $conexao;
    }
    
    function buscarProdutoPorId($id) {
        $sql = "SELECT * FROM produtos WHERE  id = {$id}";
        $resultado = mysqli_query($this -> conexao,$sql);
        $array = mysqli_fetch_assoc($resultado);
        if($array['isbn'] == "") {
                    $produto = new Produto();
                } else if($array["waterMark"] != "") {
                    $produto = new Ebook();
                    $produto -> setIsbn($array['isbn']);
                    $produto -> setWaterMark($array['waterMark']);
                } else {
                    $produto = new LivroFisico();
                    $produto -> setIsbn($array['isbn']);
                    $produto -> setTaxaImpressao($array['taxaImpressao']);
                }
        $produto -> setId($array['id']);
        $produto -> setNome($array['nome']);
        $produto -> setPreco($array['preco']);
        $produto -> setDescricao($array['descricao']);
        $categoria = new Categoria();
        $categoria -> setId($array['categoria_id']);
        $produto -> setCategoria($categoria);
        $produto -> setUsado($array['usado']);
        return $produto;
    }

    function insereProduto($produto) {
        if($produto -> temIsbn()) {
            $isbn = $produto -> getIsbn();
        } else {
            $isbn = "";
        }
        if($produto -> temWaterMark()) {
            $waterMark = $produto -> getWaterMark();
        } else {
            $waterMark = "";
        }
        if($produto -> temTaxaImpressao()) {
            $taxaImpressao = $produto -> getTaxaImpressao();
        } else {
            $taxaImpressao = "null";
        }
        $sql = "INSERT INTO produtos (nome,preco,descricao, categoria_id,usado, isbn, waterMark, taxaImpressao) 
                VALUES ('{$produto->getNome()}',{$produto->getPreco()},
               '{$produto->getDescricao()}',{$produto->getCategoria()->getId()},{$produto->getUsado()},'{$isbn}',
               '{$waterMark}',{$taxaImpressao})";
        $resultado = mysqli_query($this -> conexao, $sql);
        return $resultado;
    }

    function alteraProduto($produto) {
        if($produto -> temIsbn()) {
            $isbn = $produto -> getIsbn();
        } else {
            $isbn = "";
        }
        if($produto -> temWaterMark()) {
            $waterMark = $produto -> getWaterMark();
        } else {
            $waterMark = "";
        }
        if($produto -> temTaxaImpressao()) {
            $taxaImpressao = $produto -> getTaxaImpressao();
        } else {
            $taxaImpressao = "null";
        }
        $sql = "UPDATE produtos set nome = '{$produto -> getNome()}',
                                preco = {$produto -> getPreco()},
                                descricao = '{$produto -> getDescricao()}',
                                categoria_id = {$produto -> getCategoria() -> getId()},
                                usado = {$produto -> getUsado()},
                                isbn = '{$isbn}',
                                waterMark = '{$waterMark}',
                                taxaImpressao = {$taxaImpressao}
                WHERE id = {$produto -> getId()}";
     
        $resultado = mysqli_query($this -> conexao, $sql);
        return $resultado;
    }

    function listaProdutos() {
        $sql = "SELECT p.*, c.nome AS categoria FROM produtos AS p 
                LEFT JOIN categorias AS c 
                ON p.categoria_id = c.id";
        $resultado = mysqli_query($this -> conexao, $sql);
        $lista = array();
            while($array = mysqli_fetch_assoc($resultado)) {
                if($array['isbn'] == "") {
                    $produto = new Produto();
                } else if($array["waterMark"] != "") {
                    $produto = new Ebook();
                    $produto -> setIsbn($array['isbn']);
                    $produto -> setWaterMark($array['waterMark']);
                } else {
                    $produto = new LivroFisico();
                    $produto -> setIsbn($array['isbn']);
                    $produto -> setTaxaImpressao($array['taxaImpressao']);
                }
            $produto -> setId($array['id']);
            $produto -> setNome($array['nome']);
            $produto -> setPreco($array['preco']);
            $produto -> setDescricao($array['descricao']);
            $categoria = new Categoria();
            $categoria -> setNome($array['categoria']);
            $produto -> setCategoria($categoria);
            $produto -> setUsado($array['usado']);
            array_push($lista, $produto);
        }
        return $lista;
    }

    function removeProduto($id) {
        $sql = "DELETE FROM produtos WHERE id = {$id}";
        $resultado = mysqli_query($this -> conexao, $sql);
        return $resultado;
    }
    
}

?>