<?php 
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'pending';

    $conexao = new mysqli($dbHost,$dbUsername,$dbPassword ,$dbName);

    //if ($conexao->connect_error) {
        // Caso haja erro, exibe a mensagem
    //    die("Falha na conexão: " . $conexao->connect_error);
    //} else {
    //    // Caso a conexão seja bem-sucedida, você pode continuar
    //    echo "Conexão efetuada com sucesso!";
    //}
?>
