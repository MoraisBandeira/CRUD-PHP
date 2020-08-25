<?php
require_once '../database/conexao.php';

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
            $sql = "UPDATE produtos SET nome = '$nome' ,preco = '$preco' ,descricao = '$descricao',imagem = '$novo_nome' WHERE id ='$id'";

                if(mysqli_query($conn, $sql)){
                        header('Location: ../index.php?sucesso');
                }else{
                    header('Location: ../index.php?error');
                }

        }else{
            
            header('Location: ../index.php?error');
        }
    }else{
        $nome = mysqli_escape_string($conn, $_POST['nome']);
        $preco = mysqli_escape_string($conn, $_POST['preco']);
        $descricao = mysqli_escape_string($conn, $_POST['descricao']);
        $id = mysqli_escape_string($conn, $_POST['id']);

        if(!empty($nome) && !empty($preco) && !empty($descricao)){
            $sql = "UPDATE produtos SET nome = '$nome' ,preco = '$preco' ,descricao = '$descricao' ,imagem = '$imagem' WHERE id ='$id'";

                if(mysqli_query($conn, $sql)){
                        header('Location: ../index.php?sucesso');
                }else{
                    header('Location: ../index.php?error');
                }

        }else{
            
            header('Location: ../index.php?error');
        }
    }

    

    
}