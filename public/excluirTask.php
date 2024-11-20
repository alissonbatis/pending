<?php 
session_start();
include 'config.php';  // Inclua o arquivo de configuração com a conexão ao banco

if((!isset($_SESSION['email']) == true ) and (!isset($_SESSION['senha']) == true)){
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login/login.php');
}

$logado = $_SESSION['email'];

$taskId = isset($_GET['idDaTask']) ? trim($_GET['idDaTask'], '"') : 0;

if (is_numeric($taskId)) {
    $taskId = intval($taskId); // Converte para número inteiro
} else {
    $taskId = 0; // Valor padrão
}




if ($taskId > 0) {
    // Prepare a query para evitar SQL Injection
    $stmt = $conexao->prepare("DELETE FROM tasks WHERE id = ?");
    $stmt->bind_param("i", $taskId);

    if ($stmt->execute()) {
        if (isset($_SERVER['HTTP_REFERER'])) {
            // Redireciona para a página anterior
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit;}
        //header("Location: topico.php?topicoId={$topicoId}&topico={$topicoNome}&topicoUser={$usuarioId}"); // Alterar para a página adequada
        echo "<script>console.log('Tarefa excluída com sucesso')</script>";
    } else {
        echo "Erro ao excluir a tarefa: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID inválido.";
}
?>