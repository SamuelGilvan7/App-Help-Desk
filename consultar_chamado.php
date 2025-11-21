<?php
require_once "validador_acesso.php";
?>

<?php 
// Array que receberá os chamados
$chamados = [];

// Abrindo o arquivo
$arquivo = fopen('arquivo.hd', 'r');

// Lendo cada linha do arquivo
while(!feof($arquivo)) {
    $registro = fgets($arquivo);
    
    // Evita linhas em branco no final do arquivo
    if(trim($registro) != '') {
        $chamados[] = $registro;
    }
}

fclose($arquivo); // Fecha o arquivo
?>

<html>
<head>
  <meta charset="utf-8" />
  <title>App Help Desk</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

  <style>
    .card-consultar-chamado {
      padding: 30px 0 0 0;
      width: 100%;
      margin: 0 auto;
    }
  </style>
</head>

<body>

<?php require "nav.php"; ?>

<div class="container">    
  <div class="row">

    <div class="card-consultar-chamado">
      <div class="card">
        <div class="card-header">
          Consulta de chamado
        </div>
        
        <div class="card-body">
          
          <?php foreach($chamados as $chamado) { ?>

            <?php 
              // Separando os dados do chamado
              $chamado_dados = explode('-', $chamado);

              // SE PERFIL FOR 2 (USUÁRIO COMUM), MOSTRA APENAS OS CHAMADOS DELE
              if($_SESSION['perfil'] == 2) {
                
                if($_SESSION['id'] != $chamado_dados[0]) {
                  continue;
                }
              }
              // Garantindo que existem ao menos 4 itens
              if(count($chamado_dados) < 4) {
                continue;
              }

              
            ?>

            <div class="card mb-3 bg-light">
              <div class="card-body">

                <h5 class="card-title">
                  <?php echo $chamado_dados[1]; ?>
                </h5>

                <h6 class="card-subtitle mb-2 text-muted">
                  <?php echo $chamado_dados[2]; ?>
                </h6>

                <p class="card-text">
                  <?php echo $chamado_dados[3]; ?>
                </p>

                <p class="card-text text-muted">
                  Criado por ID: <?php echo $chamado_dados[0]; ?>
                </p>

              </div>
            </div>

          <?php } ?>

          <div class="row mt-5">
            <div class="col-6">
              <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>
</div>

</body>
</html>
