<?php
require_once("./model/Produto.php");
class cadastroController{

    private $cadastro;

    public function __construct(){
        $this->cadastro = new Produto();
        $this->Criar();
    }

    
    private function Criar(){
            if(isset($_POST['cadastrar'])){
        
            if(isset($_FILES['imagem'])){
                $extensao = strtolower(substr($_FILES['imagem']['name'], -4)); 
                $novo_nome = md5(time()) . $extensao; 
                $diretorio = "../public/"; 
                $allowd_file_ext = array(".jpg", ".jpeg", ".png");
                echo var_dump ($extensao);
                if(in_array($extensao, $allowd_file_ext)){

                    move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$novo_nome); 
            
                            $nome = mysqli_escape_string($conn, $_POST['nome']);
                            $preco = mysqli_escape_string($conn, $_POST['preco']);
                            $descricao = mysqli_escape_string($conn, $_POST['descricao']);

                            if(!empty($nome) && !empty($preco) && !empty($descricao) && !empty($novo_nome)){
                                        $this->cadastro->setNome($nome);
                                        $this->cadastro->setPreco($preco);
                                        $this->cadastro->setDescricao($descricao);
                                        $this->cadastro->setImagem($novo_nome);
                                        $result = $this->cadastro->incluir();
                                        if($result >= 1){
                                            echo "<script>alert('Registro incluído com sucesso!');document.location='../view/cadastro.php'</script>";
                                        }else{
                                            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
                                        }
                                
                            }else{
                                echo "<script>alert('Erro ao gravar registro!, campo vazio');history.back()</script>";
                            }
                        }else{
                                echo "<script>alert('Erro ao gravar registro!, extenção invalida');history.back()</script>";
                            }
                
                }else{
                    echo "<script>alert('Erro ao gravar registro!, Arquivo não enviado');history.back()</script>";
                }
     }
  }
}
new cadastroController();