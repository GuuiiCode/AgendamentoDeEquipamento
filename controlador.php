<?php
  include_once('scripts/conexao.php');
  include_once('scripts/verificaLogin.php');
  include_once('scripts/menu.php'); 
  include_once('scripts/deslogar.php');

  if (isset($_POST['confirmaPedido'])) {
    $professor = $_POST['professor'];
    $bloco = $_POST['bloco'];
    $sala = $_POST['sala'];
    $data = $_POST['data'];
    $obs = $_POST['obs'];
    $status = $_POST['status'];

    //SALVAR BANCO DE DADOS
    $sql = "INSERT INTO `pedido` (`codigo`,`usuario`,`bloco`,`sala`,`equipamento`,`obs`,`data`,`status`) 
                VALUES (NULL,'$professor','$bloco','$sala','$equipamento','$obs','$data','$status');";
    $salvar = mysqli_query($conexao,$sql);

  } else if (isset($_POST['alteraStatus'])) {
    $codigo = $_POST['codigo'];

    $sql3 = "UPDATE pedido SET status = 'Aprovado' where codigo = $codigo";
    $altera = mysqli_query($conexao,$sql3);

    if(isset($altera)){
      echo(
          '<center>
            <div class="alert alert-success">
              Aprovado Com Sucesso.
            </div>
          </center>'
      );
    } else {
        echo(
          '<center>
            <div class="alert alert-danger">
              Falha ao Aprovar!
            </div>
          </center>'
        );
    }
  } else if (isset($_POST['reprovaStatus'])) {
    $codigo = $_POST['codigo'];

    $sqls = "UPDATE pedido SET status = 'Reprovado' where codigo = $codigo";
    $reprovar = mysqli_query($conexao,$sqls); 

    if (isset($reprovar)) {
        echo(
            '<center>
              <div class="alert alert-danger">
                Reprovado Com Sucesso!
              </div>
            </center>'
        );
      } else {
          echo(
            '<center>
              <div class="alert alert-danger">
                Falha ao Reprovar!
              </div>
          </center>'
        );
      }
  }

  $us = $_SESSION['login'];
  $sql4 = "select bloco from usuario where email = '$us'";
  $csBloco = mysqli_query($conexao,$sql4);

  while ($ss = mysqli_fetch_array($csBloco)) {
    $blocoos = $ss{0};
  }

  $sql2 = "select * from pedido where bloco = '$blocoos'";
  $consulta = mysqli_query($conexao,$sql2);
  $cont = mysqli_num_rows($consulta);
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Controlador - Bem Vindo</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" href="style/style.css">
  </head>
  <body>    
    <div class="container">
      <div class="col-lg-12 text-center">
        <h3 style="padding:40px 0">Solicitações</h3>
        <table class="table table-hover responsive-table centered">
          <thead class="thead-dark">
            <tr>
              <th>Usúario</th>
              <th>Bloco</th>
              <th>Sala</th>
              <th>Equipamento</th>
              <th>Status</th>
              <th>Observação</th>
              <th>Ação</th>        
            </tr>
          </thead>
          <tbody> 
            <?php
              while ($rs = mysqli_fetch_array($consulta)) {
                $codigo = $rs{0};
                $usuarios = $rs{1};
                $bloco = $rs{2};
                $sala = $rs{3};
                $equipamentos = $rs{4};
                $statuus = $rs{7};
                $obss = $rs{5};

                echo(
                  "<tr>
                    <td>$usuarios</td>
                    <td>$bloco</td>
                    <td>$sala</td>
                    <td>$equipamentos</td>
                    <td>$statuus</td>
                    <td>$obss</td>");
                
                if($statuus == "Devolvido" or $statuus == "Aprovado" 
                    or $statuus == "Pendente Devolução" or $statuus == "Reprovado"){
                    echo "<td></td>";
                } else {
                  echo("
                    <td>
                      <form method='POST'>
                        <input type='hidden' name='codigo' value='$codigo'>
                        <button type='submit' name='alteraStatus' style='background-color:transparent;border:0px;'>
                          <img src='images/aprov.png' >
                        </button>
                        <button type='submit' name='reprovaStatus' style='background-color:transparent;border:0px;'>
                          <img src='images/recuse.png' >
                        </button>
                      </form>
                    </td>
                  </tr>"
                  );
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
