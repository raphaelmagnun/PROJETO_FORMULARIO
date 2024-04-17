<?php
    session_start();
    unset($_SESSION['email']); //destroi os dados
    unset($_SESSION['senha']);
    header('Location: login.php');
?>