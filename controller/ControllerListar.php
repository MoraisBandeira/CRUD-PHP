<?php
require_once("./model/conexao.php");
class listarController{

    private $lista;

    public function __construct(){
        $this->lista = new Banco();
        $this->criarTabela();

    }

    private function criarTabela(){
        $row = $this->lista->getProduto();
        foreach ($row as $dados){
         echo  "<tr>";
         echo  "<td><figure><img src='public/".$dados['imagem']."' alt='img' width='100' height='100'></figure></td>";
         echo  "<td>".$dados['nome']."</td>";
         echo  "<td>R$ ".$dados['preco']."</td>";
         echo  "<td>".$dados['descricao']."</td>";
         echo  "<td><a href='#' class='btn btn-warning' data-toggle='modal' data-target='#modal-id".$dados['id']."'><i class='fas fa-marker'></i></a></td>";
         echo  "<td><a href='controller/ControllerDeletar.php?id=".$dados['id']."' class='btn btn-danger'><i class='fas fa-trash-alt'></i></a></td>";
         echo  "</tr>";

        }
    }
}