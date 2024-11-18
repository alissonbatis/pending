<?php 
    session_start();

    if((!isset($_SESSION['email']) == true ) and (!isset($_SESSION['senha']) == true)){
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: login/login.php');
    }
    include 'config.php';
    $logado = $_SESSION['email'];

    $resultUsuario = mysqli_query($conexao, "SELECT usuario_id FROM usuarios WHERE email = '$logado'");
    $usuario = mysqli_fetch_assoc($resultUsuario);
    $usuarioId = $usuario['usuario_id'];
    echo "<script>console.log('usuarioId:{$usuarioId}');</script>";

    // Recuperar os tópicos do usuário logado
    $resultTopicos = mysqli_query($conexao, "SELECT * FROM topicos WHERE usuario_id = '$usuarioId'");

    // Verificar se há tópicos
    $topicos = [];
    if(mysqli_num_rows($resultTopicos) > 0) {
        while($topico = mysqli_fetch_assoc($resultTopicos)) {
            $topicos[] = $topico;
        }
        
    }
?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <img src="img/LogoLonga.png" alt="Logo">
    </header>

    <aside>
        <h4>Tópicos</h4>

        <button class = "botaoAddTop" id="botaoAddTop">
            <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
        </button>

        <section class="topicos" id="topicos">
            <?php
                // Exibir os tópicos
                if(count($topicos) > 0) {
                    foreach($topicos as $topico) {
                        echo "<li style = list-style:''><a href='topico.php?id={$topico['id']}&topico={$topico['topicoNome']}'>{$topico['topicoNome']}</a></li>";
                    }
                } else {
                    echo "<p>Nenhum tópico encontrado.</p>";
                }
            ?>
        </section>
    </aside>

    <main>
        <h3>Tasks pendentes</h3>
    </main>






    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
</body>
</html>
