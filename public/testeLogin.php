<?php 
    session_start();


    // Exibe todas as variáveis recebidas pelo formulário (para depuração)
    //print_r($_REQUEST);

    // Verifica se o formulário foi enviado e se os campos não estão vazios
    if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
        // Inclui o arquivo de configuração
        include_once('config.php');  // Ajuste o caminho se necessário
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";

        $result = $conexao-> query($sql);

        print_r($result);
        $mensagem = "nao existe";

        if(mysqli_num_rows($result) < 1){
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: login/login.php');
            
        }else{
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            header('Location: index.php');

        }

    } else {
        //nao acessa
        header('Location: login.php');
        exit(); // Garantir que o script pare após o redirecionamento
    }
?>
