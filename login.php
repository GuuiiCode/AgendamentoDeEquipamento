<?php
  session_start();
  
  if (isset($_SESSION['login'])) {
    if ($_SESSION['tipo'] == "Professor") {
      header("location: pageProfessor.php");
      die();
    } else {
      header("location: controlador.php");
    }
  }
  if (isset($_SESSION['erro'])) {
    echo(
      "<center>
        <div class='alert alert-danger'>
          <strong>Erro:</strong> Usuário ou Senha Incorretos.
        </div>
      </center>"
    );
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style>
      body {
        padding-top: 70px;
      }
      @media (min-width: 992px) {
        body {
          padding-top: 70px;
        }
      }
    </style>
  </head>
  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <img src="images/logo.png" style="height:60px; width:150px;">
      </div>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="mt-5 alert alert-primary" role="alert">
            <h5>Bem-vindo!<br><br>Controle de Equipamentos UNICID</h5>
          </div>
          <div class="text-center" style="padding:50px 0">
            <center>
              <div class="col-sm-8 col-md-6 col-lg-4">
                <form id="login-form" class="text-left" method="POST" action="validaLogin.php">
                  <div class="form-group">
                    <label for="lg_username" class="sr-only">E-mail</label>
                    <input type="text" class="form-control" id="lg_username" name="email" placeholder="E-mail" required>
                  </div>
                  <div class="form-group">
                    <label for="lg_password" class="sr-only">Senha</label>
                    <input type="password" class="form-control" id="lg_password" name="senha" placeholder="Senha" required>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <button type="input" class="btn btn-primary" name="validar">Acessar</button>
                    </div>
                    <div class="col-6">
                      <button type="button" class="btn btn-danger">
                        <a href="cadlogin.php" style="color:white;">Cadastrar</a>
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

  </body>
</html>
