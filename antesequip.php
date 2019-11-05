<?php
  include_once('scripts/conexao.php');
  include_once('scripts/verificaLogin.php');
  include_once('scripts/menu.php');
  include_once('scripts/codigoantesequip.php');
  include_once('scripts/deslogar.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Selecionar Bloco - Unicid</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
    
  </head>
  <body>
    <div class="container">
      <div class="col-lg-12 text-center">
        <h3 class="mt-5">Selecionar Blocos</h3><hr>
        <div class="text-center" style="padding:50px 0">
          <center>
            <div class="col-sm-8 col-md-6 col-lg-4">
              <?php 
                while ($exibeBlocos = mysqli_fetch_array($cosultabloco)) {
                  $codigo = $exibeBlocos{0};
                  $descricao = $exibeBlocos{1};
                  echo(
                    "<form method='POST' action='solicitarequip.php'>
                      <input type='hidden' value='$codigo' name='codigob'>
                      <input type='submit' name='enviabloco' class='btn btn-primary btn-lg btn-block' Value='$descricao'>
                    </form>"
                  );
                }
              ?>
            </div>
          </center>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
