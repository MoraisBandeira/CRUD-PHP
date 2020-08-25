<?php
require_once '../database/conexao.php';

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

                        $sql = "INSERT INTO produtos (nome ,preco ,descricao ,imagem) VALUES ('$nome','$preco','$descricao','$novo_nome')";

                                    if(mysqli_query($conn, $sql)){
                                            header('Location: ../index.php?sucesso');
                                    }else{
                                        header('Location: ../index.php?error');
                                    }
                    }else{
                        header('Location: ../index.php?error_campoVazio');
                    }
        }else{
                        header('Location: ../index.php?error_extension');
                    }
         
    
        }
                



   }else{
    header('Location: index.php?error_arquivoNaoEnviado');
   }