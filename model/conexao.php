<?php
    require_once './init.php';
   
    class Banco{
        protected $mysqli;

         public function __construct(){
        $this->conexao();
       }

       private function conexao(){
        $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO , BD_SENHA, BD_BANCO);
      }

        public function setProduto($nome,$preco,$descricao,$imagem){
            $stmt = $this->mysqli->prepare("INSERT INTO produtos (nome, preco, descricao, imagem) VALUES ('$nome','$preco','$descricao','$imagem')");
            $stmt->bind_param("ssss",$nome,$preco,$descricao,$imagem);
            if( $stmt->execute() == TRUE){
                return true ;
            }else{
                return false;
            }

        }

        public function updateProduto($nome,$preco,$descricao,$imagem,$id){
            $stmt = $this->mysqli->prepare("UPDATE produtos SET nome = $nome, preco = $preco, descricao = $descricao, imagem = $imagem WHERE id = $id");
            $stmt->bind_param("ssss",$nome,$preco,$descricao,$imagem,$id);
            if($stmt->execute()==TRUE){
                return true;
            }else{
                return false;
            }
        }
    
            public function deleteProduto($id){
                if($this->mysqli->query("DELETE FROM produtos WHERE id = $id;")== TRUE){
                    return true;
                }else{
                    return false;
                }

            }

            public function getProduto(){
                $result = $this->mysqli->query("SELECT * FROM produtos");
                while($row = $result->fetch_array(MYSQLI_ASSOC)){
                    $array[] = $row;
                }
                return $array;
        
            }
    }

   













//    $servidor = "localhost";
//    $usuario = "root";
//    $senha = "";
//    $dbname = "produtos";    
//    //Criar a conexao
//    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
    
//    if(!$conn){
//        die("Falha na conexao: " . mysqli_connect_error());
//    }else{
        //echo "Conexao realizada com sucesso";
//    }      
?> 