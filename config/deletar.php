<?php
require_once '../database/conexao.php';

if(isset($_GET['id'])){
    
    $id = mysqli_escape_string($conn, $_GET['id']);
    $sql = "DELETE FROM produtos WHERE id ='$id' ";

            if(mysqli_query($conn, $sql)){
                    header('Location: http://localhost/crud/?deletado');
            }else{
                header('Location: http://localhost/crud/?error');
            }

    }
