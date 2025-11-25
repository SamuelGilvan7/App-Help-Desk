<?php 
    session_start();

    $id = $_SESSION['id'];
    $titulo = str_replace( '#', '-',  $_POST['titulo'] );
    $categoria = str_replace( '#', '-',  $_POST['categoria'] );
    $descricao = str_replace( '#', '-',  $_POST['descricao'] );

    //abrindo o arquivo
    $arquivo = fopen( '../../app_help_desk/arquivo.hd' , 'a');

    

    //implode
    $dados = implode( '-' , array( $id ,$titulo, $categoria, $descricao ));
    $texto =  $dados . PHP_EOL;
    //escrevendo no arquivo
    fwrite($arquivo, $texto);
    //fechando o arquivo
    fclose($arquivo);

    header('Location: abrir_chamado.php');
?>   