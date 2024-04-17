<?php
    //inicia uma sessão
    session_start();

    //print_r($_REQUEST);
    //print_r($result);


    // Verifica se há submit, e se o e-mail ou senha não estão vaioz
    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
    {
        include_once('config.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];
    
        //cria um variável para guardar o comando SQL. O comando SQL verifica se existe email e 
        //senha no banco de dados que coincide com o digitado no formulário de login  
        $sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";
        
        //cria uma variável para salvar o resultado do comando SQL
        $result = $conexao->query($sql);

        //Verifica se o numero de linhas do resultado é menor que 1
        if (mysqli_num_rows($result) < 1)
        {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: login.php');
        }
        else
        {
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            header('Location: sistema.php');
        }
    
    
    }
    else
    {
        //Não acessa
        header('Location: login.php');
    }

?>
