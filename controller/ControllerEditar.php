<?php
require_once("./model/conexao.php");

class editarController {

    private $editar;
    

    public function __construct(){
        $this->editar = new Banco();
    }
    
    
    public function editarFormulario($nome,$preco,$descricao,$imagem,$id){
        if($this->editar->updateProduto($nome,$preco,$descricao,$imagem,$id) == TRUE){
            echo "<script>alert('Registro incluído com sucesso!');document.location='../view/index.php'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }
    }
    


}
  $editar = new editarController();
                if(isset($_POST['update'])){

                    if(isset($_FILES['imagem'])){
                
                        $extensao = strtolower(substr($_FILES['imagem']['name'], -4)); 
                        $novo_nome = md5(time()) . $extensao; 
                        $diretorio = "../public/"; 
                
                        move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$novo_nome); 
                        $nome = mysqli_escape_string($conn, $_POST['nome']);
                        $preco = mysqli_escape_string($conn, $_POST['preco']);
                        $descricao = mysqli_escape_string($conn, $_POST['descricao']);
                        $id = mysqli_escape_string($conn, $_POST['id']);
                
                        if(!empty($nome) && !empty($preco) && !empty($descricao) && !empty($novo_nome)){
                            $editar->editarFormulario($nome,$preco,$descricao,$novo_nome,$id);
                
                        }else{
                            
                            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
                        }
                    }else{
                        $nome = mysqli_escape_string($conn, $_POST['nome']);
                        $preco = mysqli_escape_string($conn, $_POST['preco']);
                        $descricao = mysqli_escape_string($conn, $_POST['descricao']);
                        $id = mysqli_escape_string($conn, $_POST['id']);
                
                        if(!empty($nome) && !empty($preco) && !empty($descricao)){
                            $editar->editarFormulario($nome,$preco,$descricao,$novo_nome,$id);
                
                        }else{
                            
                            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
                        }
                    }
                }

       // if(isset($_POST['submit'])){
       //     $editar->editarFormulario($_POST['nome'],$_POST['autor'],$_POST['quantidade'],$_POST['preco'],$_POST['id']);
       // }
?>