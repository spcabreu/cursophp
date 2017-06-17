<?php

require_once 'Livro.php';

    class Ebook extends Livro {
        private $waterMark;
        
        public function precoComDesconto() {
        return $this -> preco * 0.1;
        }
        
        public function getWaterMark(){
		  return $this->waterMark;
	    }

        public function setWaterMark($waterMark){
            $this->waterMark = $waterMark;
        }    
    }