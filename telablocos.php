<?php
  include_once('scripts/conexao.php');
  include_once('scripts/verificaLogin.php');
  include_once('scripts/menu.php');
  include_once('scripts/Blocostela.php');
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link rel="stylesheet" href="style/style.css">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
        <h3 class="mt-5">Cadastrar Bloco</h3>
          <div class="text-center" style="padding:50px 0">
            <center>
              <div class="col-sm-10 col-md-8 col-lg-6">
                <table class="table table-hover centered">
                  <thead class="thead-dark">
                    <tr>
                      <th>Blocos</th>
                      <th>Ação</th>
                    </tr>   
                  </thead>
                  <tbody>
                    <?php       
                      while ($exibirRegistros = mysqli_fetch_array($consulta)) {
                        $codigo = $exibirRegistros{0};
                        $descricao = $exibirRegistros{1};

                        echo(
                          "<tr>
                            <td>$descricao</td>
                            <td><form method='post'>
                            <input type='hidden' name='codigo'value='$codigo'>
                            <button type='submit' name='exc'  style='background-color:transparent;border:0px;' ><img src='images/recuse.png'></a></button>
                            </form></td>
                          </tr>"
                        );
                      }	          
                    ?>  
                  </tbody>
                </table> 
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
