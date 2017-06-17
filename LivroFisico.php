<?php
require_once 'Livro.php';

    class LivroFisico extends Livro {
        private $taxaImpressao;
        
        public function precoComDesconto() {
        return $this -> preco * 0.7;
        }
        
        public function getTaxaImpressao(){
		  return $this->taxaImpressao;
	    }

        public function setTaxaImpressao($taxaImpressao){
            $this->taxaImpressao = $taxaImpressao;
        }
    }