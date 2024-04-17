<?php
    session_start();    

    //Se não existe um email e uma senha na sessão:
    if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['email']); //destroi os dados
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    else
    {    
        include_once('config.php');
        $email = $_SESSION['email'];
         // Prepare a consulta SQL para evitar injeção de SQL
        $sql = "SELECT nome FROM usuarios WHERE email = ?";
         // Prepare a declaração SQL
        $stmt = $conexao->prepare($sql);
        // Associe o parâmetro
        $stmt->bind_param("s", $email);
        // Execute a consulta
        $stmt->execute();
        // Associe o resultado
        $stmt->bind_result($usuario);
        // Busque o resultado
        $stmt->fetch();
        $stmt->close();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema</title>

<style>
    body{
    font-family: Arial, Helvetica, sans-serif;
    background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17,54,71));
    }
</style>

</head>
<body>
    <nav>
        <div class="d-flex">
          <a href="sair.php" class="btn btn-danger me-5">Sair</a>
        </div>
    </nav>

    <?php
        echo "<h1> Bem vindo <u>$usuario</u></h1>";
    ?>
</body>
</html>