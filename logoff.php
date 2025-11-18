<?php 
/*
 //remover indices do array de sessão
 //unset() - remover um índice específico
    session_start();
    unset($_SESSION['autenticado']);

 // destruir a variável de sessão
 //session_destroy() - destruir todas as variáveis de sessão
 */
 session_destroy();

 header('Location: index.php');
?>