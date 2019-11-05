<?php
  include_once('scripts/conexao.php');
  include_once('scripts/ScCadLogin.php');
  include_once('scripts/deslogar.php');

  $sql = "Select * from bloco";
  $blocs = mysqli_query($conexao,$sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Cadastro Login</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style>
      body {
        padding-top: 54px;
      }
      @media (min-width: 992px) {
        body {
          padding-top: 56px;
        }
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Cadastro Login</a>
      </div>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="text-center" style="padding:50px 0">
            <center>
              <div class="col-sm-8 col-md-6 col-lg-4">
                <form id="login-form" class="text-left" method="POST" action="">
                  <div class="form-group">
                    <label for="lg_username" class="sr-only">Email</label>
                    <input type="text" class="form-control" id="lg_username" name="email" placeholder="Email" required>
                  </div>
                  <div class="form-group">
                    <label for="lg_username" class="sr-only">Senha</label>
                    <input type="password" class="form-control" id="lg_username" name="senha" placeholder="senha" required>
                  </div>
                  <div class="form-group">
                    <label for="lg_username" class="sr-only">Telefone</label>
                    <input type="text" class="form-control" id="lg_username" name="telefone" placeholder="Telefone" required>
                  </div>
                  <div class="form-group">
                    <select class="custom-select" name="tipo" id="tipo" required>
                      <option selected>Selecione o Tipo</option>
                      <option value="Professor">Professor</option>
                      <option value="Controlador">Controlador</option>
                    </select>
                  </div>
                  <div id="inputOculto">
                    <div class="form-group">
                      <select class="custom-select" name="bloco" required>
                        <option selected>Selecione o Bloco do Controlador</option>
                        <?php    
                          while($rs = mysqli_fetch_array($blocs)){
                            $codigo = $rs{0};
                            $descricao = $rs{1};
                            echo("<option value='$descricao'>$descricao</option>");
                          }
                        ?>  
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <button type="submit" class="btn btn-primary" name="Cadastrar">Cadastrar</button>
                    </div>
                    <div class="col-6">
                      <button type="button" class="btn btn-danger">
                        <a href="login.php" style="color:white;">Realizar Login</a>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </center>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#inputOculto').hide();
        $('#tipo').change(function() {
          if ($('#tipo').val() == 'Controlador') {
            $('#inputOculto').show();
          } else {
            $('#inputOculto').hide();
          }
        });
      });
    </script>
  </body>
</html>
