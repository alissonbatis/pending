<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pending</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@400;800&display=swap" rel="stylesheet">
  </head>
  <body>
    
    <main>
      <div>
        <section>
          <h2 class="prompt-extrabold">Login</h2>
        </section>
        <section>
          <img src="/pending/public/img/LogoPretaSemFundo.png" alt="logo">
        </section>
        
      </div>

      <form action= "/pending/public/testeLogin.php" method ="POST">

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email</label>
          <input type="email" class="form-control" id="inputEmail" name = "email" required>
        </div>

        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Senha</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name ="senha" required>
        </div>

        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
          <label class="form-check-label" for="exampleCheck1">Aceito os Termos de Serviço</label>
        </div>


        <input type="submit" class="btn btn-primary" name = "submit" ></input>

        <div>
          <a href= "/pending/public/changePassword/changePass.html">Esqueceu a senha?</a>
          <a href= "/pending/public/singUp/singUp.php">Não tem uma conta? Criar conta</a>
        </div>
        
      </form>
    </main>

    <footer>
      <a href="#">Sobre</a>
      <a href="#">Trabalhe conosco</a>
      <a href="#">Termos</a>
    </footer>

    <div class="divCopy">Copyright © 2024 Pending.</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
