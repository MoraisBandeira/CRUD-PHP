<?php require_once 'database/conexao.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Editar</title>
</head>
<body>
<div class="container">
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand h1" href="#">Editar</a>
</nav>
    <?php 
    if(isset($_GET['id'])){
        $id = mysqli_escape_string($conn, $_GET['id']);
        $sql = "SELECT * FROM produtos WHERE id = '$id' ";
        $resultado = mysqli_query($conn, $sql);
        $dados = mysqli_fetch_array($resultado);

    }
    
    ?>
    <form action="config/produto-update.php" method="POST"  enctype="multipart/form-data">
            <input type="hidden" name='id' value="<?php echo $dados['id'];?>">
           <div class="form-group col-md-6">
            <input type="text" class="form-control" id="produto-nome" name='nome' value="<?php echo $dados['nome'];?>">
            </div>
            <div class="form-group col-md-6">
            <input type="text" class="form-control" id="produto-preco"name='preco' value="<?php echo $dados['preco'];?>">
            </div>
            <div class="form-group col-md-6">
            <textarea class="form-control" id="produto-descricao" name='descricao'><?php echo $dados['descricao'];?></textarea>
            </div>
           <div class="form-group ml-3 mt-3">
            <input type="file" class="form-control-file" id="produto-img" name="imagem">
          </div>
          <button type="submit" name='update' class="btn btn-primary mb-2">atualizar</button>
    </form>
    </div>
    




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    
</body>
</html>