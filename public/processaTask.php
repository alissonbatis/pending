<?php 
session_start();
include 'config.php';  // Inclua o arquivo de configuração com a conexão ao banco

if((!isset($_SESSION['email']) == true ) and (!isset($_SESSION['senha']) == true)){
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login/login.php');
}

$logado = $_SESSION['email'];

$topicoNome = isset($_POST['topico']) ? $_POST['topico'] : 'Tópico não encontrado';
$topicoId = isset($_POST['topicoId']) && is_numeric($_POST['topicoId']) ? $_POST['topicoId'] : 0;
$taskTipo = isset($_POST['tipo']) ? $_POST['tipo'] : 'Tipo não encontrado';

//recupera o usuario logado
$resultUsuario = mysqli_query($conexao, "SELECT usuario_id FROM usuarios WHERE email = '$logado'");
$usuario = mysqli_fetch_assoc($resultUsuario);
$usuarioId = $usuario['usuario_id'];






if ($topicoId == 0) {
    echo "<script>console.log('Erro: O ID do tópico não foi passado corretamente.');</script>";
    
}
echo "<script>console.log('ID do Tópico: {$topicoId}')</script>"; 






// Verifica se o nome do task foi enviado
if (isset($_POST['taskNome']) && !empty($_POST['taskNome'])) {
    $taskNome = mysqli_real_escape_string($conexao, $_POST['taskNome']);

    // Insere o nova task no banco de dados
    $query = "INSERT INTO tasks (topico_id, taskNome, tipo) VALUES ('$topicoId', '$taskNome', '$taskTipo')";
    if (mysqli_query($conexao, $query)) {
        // Redireciona para a página de tópicos ou outra página desejada
        header("Location: topico.php?topicoId={$topicoId}&topico={$topicoNome}&topicoUser={$usuarioId}"); // Alterar para a página adequada
    } else {
        echo "Erro ao criar task: " . mysqli_error($conexao);
    }
} else {
    echo "Nome da task não foi informada.";
}
?>
