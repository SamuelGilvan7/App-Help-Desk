<?php
    session_start();

    //variavel que verifica se autenticação foi realizada
    $usuario_autenticado = false;

    $usuario_app = array(
        array('email' => 'adm@teste.com.br', 'senha' => '12345'),
        array('email' => 'user@teste.com.br', 'senha' => 'abcde'),
    );

    foreach($usuario_app as $user){
        $user ['email'];
        $user ['senha'];

        if ($user ['email'] == $_POST['email'] && $user ['senha'] == $_POST['senha']) {
            $usuario_autenticado = true;   
        } 
        
        if ($usuario_autenticado){
            echo 'Usuário autenticado';
            $_SESSION['autenticado'] = 'SIM';
            header('Location: home.php'); //redireciona para a página home
        } else {
            $_SESSION['autenticado'] = 'NAO';
            header('Location: index.php?login=erro'); //redireciona para a página de login e avisa que houve erro
        }

    }
    
    /*$_GET['email'];
    $_GET['senha'];*/
?>