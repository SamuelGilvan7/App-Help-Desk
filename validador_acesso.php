<?php 
  session_start();
  // Verifica se o usuário está autenticado.
  // Se a variável de sessão 'autenticado' não existir ou for diferente de 'SIM',
  // o usuário é redirecionado para a página inicial com o código de erro 2.
  if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') 
  header('Location: index.php?login=erro2');


?>