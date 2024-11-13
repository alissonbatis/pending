<?php 
  if(isset($_POST['submit'])){

    //print_r($_POST['nome']);
    //print_r($_POST['email']);
    //print_r($_POST['telefone']);

    include_once('../config.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];
    $senha2 = $_POST['senha2'];

    if($senha != $senha2){

    }else{
      $result = mysqli_query($conexao, "INSERT INTO usuarios(nome, email, telefone, senha) VALUES('$nome', '$email', '$telefone', '$senha')");

      header('Location: /pendingPHP/public/login/login.php');
    }

    
  }


?>



<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pending</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/pendingPHP/public/login/login.css">
    <link rel="stylesheet" href="/pendingPHP/public/singUp/singUp.css">
    
  </head>
  <body>
    <div class = "alertSenha hidden" id = 'alertSenha'>
        as senhas nao conicidem.
    </div>
    
    <main>
      <div>
        <section>
          <h2 class="prompt-extrabold">Sing Up</h2>
        </section>
        <section>
          <img src="/pendingPHP/public/img/LogoPretaSemFundo.png" alt="logo">
        </section>
      </div>

      <form action ="singUp.php" method = "POST" onsubmit="verificarSenhas(event)">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Nome de Usuário</label>
          <input type="text" class="form-control" id="inputDoNomeUsuario" name="nome" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name ="email">
            <div id="emailHelp" class="form-text">Nunca compartilharemos seu e-mail com mais ninguém.</div>
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Telefone</label>
          <input type="number" class="form-control" id="inputDoTelefone" name = "telefone" required>
        </div>


        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Crie uma senha</label>
          <input type="password" class="form-control" id="senha1" name = "senha" required>
          <div id="passwordHelp" class="form-text">Não coloque senhas óbvias</div>
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Repita a senha</label>
            <input type="password" class="form-control" id="senha2" name = "senha2">
          </div>
        <input type="submit" class="btn btn-primary" name ="submit" onclick = "verificarSenhas()" value = "Criar" required></input>
        
      </form>
    </main>

    <footer>
      <a href="#">Sobre</a>
      <a href="#">Trabalhe conosco</a>
      <a href="#">Termos</a>
    </footer>

    <div class="divCopy">Copyright © 2024 Pending.</div>

    <script src = "singUp.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>