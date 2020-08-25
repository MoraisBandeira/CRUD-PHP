<?php require_once 'database/conexao.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Crud</title>
</head>
<body>
<div class="container">
    
        <nav class="navbar navbar-light bg-light">
  <a class="navbar-brand h1" >Produtos</a>
  <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal-Form"><i class="fas fa-plus"></i></button>
</nav>
    

<div class="row mt-5 border-0">
    <table class="table border-0">
  <thead class="border-0">
    <tr>
      <th scope="col">imagen</th>
      <th scope="col">nome</th>
      <th scope="col">preco</th>
      <th scope="col">descricao</th>
    </tr>
  </thead>
  <tbody class="border-0">
      <?php
      $sql = "SELECT * FROM produtos";
      $resultado = mysqli_query($conn, $sql);
      while($dados = mysqli_fetch_array($resultado)):
      ?>
    <tr>
      <td><figure><img src="public/<?php echo $dados['imagem']?>" alt="img" width="100" height="100"></figure></td>
      <td><?php echo $dados['nome']; ?></td>
      <td>R$ <?php echo $dados['preco']; ?></td>
      <td><?php echo $dados['descricao']; ?></td>
      <td><a href="#" class="btn btn-warning" data-toggle="modal" data-target="#modal-id<?php echo $dados['id']?>"><i class="fas fa-marker"></i></a></td>
      <td><a href="config/deletar.php?id=<?php echo $dados['id']?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
    </tr>
          
              <div class="modal fade" id="modal-id<?php echo $dados['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title h1" id="exampleModalLabel">Editar Produto</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                    <div class="modal-body">
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
      <?php endwhile; ?>
  </tbody>
</table>
</div>
<div class="row">
    <div class="modal fade" id="modal-Form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title h1" id="exampleModalLabel">Novo Produto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="modal-body">
              <form action="config/produto-create.php" method="POST"  enctype="multipart/form-data">
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" id="produto-nome" placeholder="Nome" name='nome'>
                    </div>
                    <div class="form-group col-md-6">
                    <input type="text" class="form-control" id="produto-preco" placeholder="Preço" name='preco'>
                    </div>
                    <div class="form-group col-md-6">
                    <textarea class="form-control" id="produto-descricao" placeholder="Descrição" name='descricao'></textarea>
                    </div>
                  <div class="form-group ml-3 mt-3">
                    <input type="file" class="form-control-file" id="produto-img" name='imagem'>
                  </div>
                  <button type="submit" name='cadastrar' class="btn btn-primary mb-2">ADD</button>
            </form>
          </div>
          
    </div>
</div>


    </div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
    
</body>
</html>