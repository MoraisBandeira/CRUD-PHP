<?php
require_once 'conexao.php';

class Produto extends Banco {

    private $nome;
    private $preco;
    private $descricao;
    private $imagem;

    //Metodos Set
    public function setNome($nome){
            $this->nome = $nome;
    }
    public function setPreco($preco){
             $this->preco = $preco;
    }
    public function setDescricao($descricao){
             $this->descricao = $descricao;
    }
    public function setImagem($imagem){
             $this->imagem = $imagem;
    }

    //Metodos Get
    public function getNome(){
        return $this->nome;
    }
    public function getPreco(){
        return $this->preco;
    }
    public function getDescricao(){
        return $this->descricao;
    }
    public function getImagem(){
        return $this->imagem;
    }

    public function incluir(){
        return $this->setProduto($this->getNome(),$this->getPreco(),$this->getDescricao(),$this->getImagem());
    }
}


?>