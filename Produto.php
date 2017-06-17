<?php

class Produto
{
    private $id;
    private $nome;
    protected $preco;
    private $descricao;
    private $categoria;
    private $usado;
    
    public function precoComDesconto() {
        return $this -> preco * 0.9;
    }
    
    /*public function __toString() {
        return "Produto com nome: {$this -> nome}";
    }*/
    
    /*public function __construct($nome,$preco) {
        $this -> nome = $nome;
        $this -> preco = $preco;
    }*/
    
    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getPreco(){
		return $this->preco;
	}

	public function setPreco($preco){
		$this->preco = $preco;
	}

	public function getDescricao(){
		return $this->descricao;
	}

	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}

	public function getCategoria(){
		return $this->categoria;
	}

	public function setCategoria($categoria){
		$this->categoria = $categoria;
	}

	public function getUsado(){
		return $this->usado;
	}

	public function setUsado($usado){
		$this->usado = $usado;
	}
    
    public function temIsbn() {
        return $this -> temWaterMark() ||
               $this -> temTaxaImpressao();
    }
    
    public function temWaterMark() {
        return $this instanceof Ebook;
    }
    
    public function temTaxaImpressao() {
        return $this instanceof LivroFisico;
    }
}

?> 