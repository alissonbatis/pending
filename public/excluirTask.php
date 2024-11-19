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




echo "{$taskId}"
?>