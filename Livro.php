<?php

abstract class Livro extends Produto
{
    private $isbn;
    
//    public abstract function precoComDesconto();
    
    public function getIsbn(){
		return $this->isbn;
	}

	public function setIsbn($isbn){
		$this->isbn = $isbn;
	}    

}