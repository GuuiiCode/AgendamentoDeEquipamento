<?php
  include_once('scripts/conexao.php');	
  include_once('scripts/verificaLogin.php');
  include_once('scripts/menu.php');
  include_once('scripts/scriptequipamento.php');
  include_once('scripts/deslogar.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Cadastro Equipamentos</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
  </head>
  <body>
    <div class="container">
      <div class="col-lg-12 text-center">
        <h3 class="mt-5">Cadastro Equipamentos</h3><hr>
        <div class="text-center" style="padding:50px 0">
          <center>
            <div class="col-sm-8 col-md-6 col-lg-4">
              <form id="login-form" class="text-left" method="POST" action="">
                <div class="form-group">
                  <label for="lg_username" class="sr-only">Descricao</label>
                  <input type="text" class="form-control" id="lg_username" name="descricao" placeholder="Descricao" required>
                </div>
                <div class="form-group">
                  <label for="lg_username" class="sr-only" required>Bloco</label>
                  <select class="custom-select my-1 mr-sm-2" name="bloco" id="inlineFormCustomSelectPref" required>
                    <option selected required></option>
                    <?php 
                      while($exibirRegistros = mysqli_fetch_array($blocos)){
                        $codigo = $exibirRegistros{0};
                        $descricao = $exibirRegistros{1};
                        echo("<option value='$codigo'>$descricao</option>");
                      }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="lg_username" class="sr-only">Quantidade</label>
                  <input type="text" class="form-control" id="lg_username" name="quantidade" placeholder="Quantidade" required>
                </div>
                <div class="row">
                  <div class="col-6">
                    <button type="submit" class="btn btn-primary" name="Cadastrar">Cadastrar</button>
                  </div>
                  <div class="col-6">
                    <button type="button" class="btn btn-danger">
                      <a href="verquipamentos.php" style="color:white;">Listar</a>
                    </button>
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