<?php 
session_start();
include 'config.php';  // Inclua o arquivo de configuração com a conexão ao banco

if((!isset($_SESSION['email']) == true ) and (!isset($_SESSION['senha']) == true)){
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login/login.php');
}

$logado = $_SESSION['email'];

// Recupera o usuário logado
$resultUsuario = mysqli_query($conexao, "SELECT usuario_id FROM usuarios WHERE email = '$logado'");
$usuario = mysqli_fetch_assoc($resultUsuario);
$usuarioId = $usuario['usuario_id'];

// Verifica se o nome do tópico foi enviado
if (isset($_POST['topicoNome']) && !empty($_POST['topicoNome'])) {
    $topicoNome = mysqli_real_escape_string($conexao, $_POST['topicoNome']);
    

    // Insere o novo tópico no banco de dados
    $query = "INSERT INTO topicos (usuario_id, topicoNome) VALUES ('$usuarioId', '$topicoNome')";
    




    if (mysqli_query($conexao, $query)) {


        $topicoId = mysqli_insert_id($conexao);
        // Redireciona para a página de tópicos ou outra página desejada
        header("Location: topico.php?topicoId={$topicoId}&topico={$topicoNome}&topicoUser={$usuarioId}"); // Alterar para a página adequada
    } else {
        echo "Erro ao criar tópico: " . mysqli_error($conexao);
    }
} else {
    echo "Nome do tópico não foi informado.";
}
?>
