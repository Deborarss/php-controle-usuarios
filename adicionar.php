<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Adicionar Novo Usuário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <?php
    require 'config.php';

    if(isset($_POST['nome']) && !empty($_POST['nome'])) {
      $nome = addslashes($_POST['nome']);
      $email = addslashes($_POST['email']);
      $senha = md5(addslashes($_POST['senha']));

      $sql = "INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha";

      $sql = $pdo->prepare($sql);
      $sql->bindValue(':nome', $nome);
      $sql->bindValue(':email', $email);
      $sql->bindValue(':senha', $senha);
      $sql->execute();

      // Redireciona para a página index
      header("Location: index.php");
    } 
  ?>
    <main>
      <div class="container">
        <form method="POST">
          <div class="form-group mt-2">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" class="form-control w-50" id="nome" placeholder="Digite seu nome"/>
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control w-50" id="email" placeholder="Digite seu email"/>
          </div>
          <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" class="form-control w-50" id="senha" placeholder="Digite sua senha"/>
          </div>
          <input type="submit" class="btn btn-primary" value="Adicionar"/>
        </form>
      </div>  
    </main>
  </body>
</html>