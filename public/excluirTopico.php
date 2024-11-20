<?php 
session_start();
include 'config.php';  // Inclua o arquivo de configuração com a conexão ao banco

if((!isset($_SESSION['email']) == true ) and (!isset($_SESSION['senha']) == true)){
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login/login.php');
}

$logado = $_SESSION['email'];

$topicoId = isset($_GET['idDoTopico']) ? trim($_GET['idDoTopico'], '"') : 0;

if (is_numeric($topicoId)) {
    $topicoId = intval($topicoId); // Converte para número inteiro
} else {
    $topicoId = 0; // Valor padrão
}




if ($topicoId > 0) {
    // Prepare a query para evitar SQL Injection
    $stmt = $conexao->prepare("DELETE FROM topicos WHERE id = ?");
    $stmt->bind_param("i", $topicoId);

    if ($stmt->execute()) {
        if (isset($_SERVER['HTTP_REFERER'])) {
            // Redireciona para a página anterior
            header("Location: index.php");
            exit;
            }
        echo "<script>console.log('Topico excluído com sucesso')</script>";
    } else {
        echo "Erro ao excluir o topico: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID inválido.";
}
?>