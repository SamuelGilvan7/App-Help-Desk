<?php
    session_start();

    //variavel que verifica se autenticação foi realizada
    $usuario_autenticado = false;
    $usuario_id = null;
    $usuario_perfil_id =  null;

    $perfis = array(1 => 'Administrativo', 2 => 'Usuário');

    $usuario_app = array(
        array('id' => 1,'email' => 'adm@teste.com.br', 'senha' => '12345', 'perfil' => 1),        
        array('id' => 2,'email' => 'user@teste.com.br', 'senha' => 'abcde', 'perfil' => 1),
        array('id' => 3,'email' => 'jose@teste.com.br','senha' => '12345', 'perfil' => 2),
        array('id' => 4,'email' => 'maria@teste.com.br','senha' => '12345', 'perfil' => 2)
    );

    foreach($usuario_app as $user){
        /*$user ['email'];
        $user ['senha'];*/

        if ($user ['email'] == $_POST['email'] && $user ['senha'] == $_POST['senha']) {
            $usuario_autenticado = true;   
            $usuario_id = $user['id'];
            $usuario_perfil_id = $user['perfil'];
        } 
        
        if ($usuario_autenticado){
            echo 'Usuário autenticado';
            $_SESSION['autenticado'] = 'SIM';
            $_SESSION['id'] = $usuario_id;
            $_SESSION['perfil'] = $usuario_perfil_id;
            header('Location: home.php');
        } else {
            $_SESSION['autenticado'] = 'NAO';
            header('Location: index.php?login=erro'); //redireciona para a página de login e avisa que houve erro
        }

    }
    
    /*$_GET['email'];
    $_GET['senha'];*/
?>