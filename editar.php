<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <?php
    require 'config.php';

    $id = 0;

    if(isset($_GET['id']) && !empty($_GET['id'])) {
      $id = addslashes($_GET['id']);
    } 

    if(isset($_POST['nome']) && !empty($_POST['nome'])){
      $nome = addslashes($_POST['nome']);
      $email = addslashes($_POST['email']);

      $sql = "UPDATE usuarios SET nome = :novonome, email = :novoemail WHERE id = :id";

      $sql = $pdo->prepare($sql);
      $sql->bindValue(':novonome', $nome);
      $sql->bindValue(':novoemail', $email);
      $sql->bindValue(':id', $id);
      $sql->execute();

      header("Location: index.php");
    }
   
      $sql = "SELECT * FROM usuarios WHERE id = :id";

      // $sql = $pdo->query($sql);
      $sql = $pdo->prepare($sql);
      $sql->bindValue(':id', $id);
      $sql->execute();     

      if($sql->rowCount() > 0) {
        $dado = $sql->fetch();
      } else {
        header("Location: index.php");
      }
  ?>
    <main>
      <div class="container">
        <form method="POST">
          <div class="form-group mt-2">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" class="form-control w-50" id="nome" value="<?php echo $dado['nome']; ?>" />
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control w-50" id="email" value="<?php echo $dado['email']; ?>" />
          </div>
          <input type="submit" class="btn btn-primary" value="Atualizar"/>
        </form>
      </div>  
    </main>
  </body>
</html>