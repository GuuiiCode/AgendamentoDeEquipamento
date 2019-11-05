<?php
  include_once('scripts/conexao.php');
  include_once('scripts/verificaLogin.php');
  include_once('scripts/menu.php');
  include_once('scripts/scriptbloco.php'); 
  include_once('scripts/deslogar.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Cadastro de Blocos</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
    
  </head>
  <body>
    <div class="container">
      <div class="col-lg-12 text-center">
        <h3 class="mt-5">Cadastro de Blocos</h3><hr>
        <div class="text-center" style="padding:50px 0">
          <center>
            <div class="col-sm-6 col-md-6 col-lg-4">
              <form id="login-form" class="text-left" method="POST" action="">
                <div class="main-login-form">
                  <div class="form-group">
                    <label for="lg_username" class="sr-only">Descrição</label>
                    <input type="text" class="form-control" id="lg_username" name="descricao" placeholder="Nome do Bloco" required>
                  </div>
                  <div class="row ">
                    <div class="col-6">
                      <button type="submit" class="btn btn-primary" name="Cadastrar">Cadastrar</button>
                    </div>
                    <div class="col-6">
                      <button type="button" class="btn btn-danger">
                        <a href="telablocos.php" style="color:white;">Listar</a>
                      </button>
                    </div>
                  </div>
                </div>
              </form>
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
