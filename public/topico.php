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





    //========================================================================

    // Capture o nome do tópico e o ID do tópico da URL
    $topicoNome = isset($_GET['topico']) ? $_GET['topico'] : 'Tópico não encontrado';
    $topicoId = isset($_GET['topicoId']) ? $_GET['topicoId'] : 0;

    // Recuperar dados adicionais do tópico se necessário
    $resultTasks = mysqli_query($conexao, "SELECT * FROM tasks WHERE topico_id = '$topicoId'");
    


    //verificar se ha taks
    $tasks = [];
    if(mysqli_num_rows($resultTasks) > 0) {
        while($task = mysqli_fetch_assoc($resultTasks)) {
            $tasks[] = $task;
        }
        
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($topicoNome); ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                        echo "<li style = list-style:''><a href='topico.php?topicoId={$topico['id']}&topico={$topico['topicoNome']}&topicoUser={$topico['usuario_id']}'>{$topico['topicoNome']}</a></li>";
                    }
                } else {
                    echo "<p>Nenhum tópico encontrado.</p>";
                }
            ?>
        </section>
    </aside>

    <main>
        <h1><?php echo htmlspecialchars($topicoNome); ?></h1>
        
        <button class = "addTask" id = "botaoAddTask"> 
            Add Task
        </button>


        <div class ="menuTask hidden" id = "menuTask">
            <button id = "checkbox">Checkbox</button>
            <button id = "text">Text</button>
        </div>






        <section class="tasks" id="sectionTasks">
            <?php
                // Exibir os tópicos
                if(count($tasks) > 0) {
                    foreach($tasks as $task) {
                        if($task['tipo'] == 'checkbox'){
                            echo "<div class = 'task'>
                                <input type = 'checkbox'>{$task['taskNome']}
                            </div> ";
                            
                        }else{
                            echo "<p class = 'task'>{$task['taskNome']}</p> ";
                        }
                        
                    }
                } else {
                    echo "<p>Nenhuma task encontrada.</p>";
                }
            ?>
           
        </section>
    </main>
    

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
