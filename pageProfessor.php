<?php
  include_once('scripts/conexao.php');
  include_once('scripts/verificaLogin.php');
  include_once('scripts/menu.php');
  include_once('scripts/deslogar.php');

  if (isset($_POST['confirmaPedido'])) {
    $codigoequip = $_POST['codigoequip'];
    $professor = $_POST['professor'];
    $bloco = $_POST['bloco'];
    $equipamento = $_POST['equipamento'];
    $quantidade = $_POST['quantidade'];
    $sala = $_POST['sala'];
    $data = $_POST['data'];
    $obs = $_POST['obs'];
    $status = $_POST['status'];
    
    $sql20 = "UPDATE `equipamento` 
              SET `quantidade` = `quantidade`-1 WHERE `equipamento`.`codigo` = $codigoequip";
    $upd = mysqli_query($conexao,$sql20);

    //SALVAR BANCO DE DADOS
    $sql = "INSERT INTO `pedido` (`codigo`,`usuario`,`bloco`,`sala`,`equipamento`,`obs`,`data`,`status`) 
                    VALUES (NULL,'$professor','$bloco','$sala','$equipamento','$obs','$data','$status');";
    $salvar = mysqli_query($conexao,$sql);
  }
  
  $user = $_SESSION['login'];
  $sql2 = "SELECT * FROM pedido WHERE usuario = '$user' ";
  $consulta = mysqli_query($conexao,$sql2);
  //$cont = mysqli_num_rows($consulta);
  
  if (isset($_POST['devolver'])) {
    $codigoet = $_POST['codigo'];
    
    $update = "UPDATE `pedido` SET `status` = 'Pendente Devolução' WHERE `codigo` = $codigoet";
    $alterar = mysqli_query($conexao,$update);

    echo"<meta HTTP-EQUIV='refresh' CONTENT='0.30'; URL='pageProfessor.php'>";
    echo('
      <center>
        <div class="alert alert-warning" role="alert">
          <strong>Devolução Realizada com Sucesso!</strong>.
        </div>
      </center>'
    );
  }else if (isset($_POST['ReprDev'])) {
    $codigo07 = $_POST['codigo'];

    $del = "DELETE FROM `pedido` where `codigo` = '$codigo07'";
    $delete = mysqli_query($conexao,$del);

    echo"<meta HTTP-EQUIV='refresh' CONTENT='0.30'; URL='pageProfessor.php'>";
    echo(
      '<center>
        <div class="alert alert-danger" role="alert">
          <strong>Exclusão Realizada com Sucesso!</strong>.
        </div>
      </center>'
    );
  }
?>

<!DOCTYPE html>
<html lang="enpt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Página do Professor</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link rel="stylesheet" href="style/style.css">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h3 style="padding:40px 0">Pedidos</h3>
          <table class="table table-hover responsive-table centered">
            <thead class="thead-dark">
              <tr>
                <th>Equipamento</th>
                <th>Data</th>
                <th>Status</th>
                <th>Ação</th>
              </tr>
            </thead>
            <tbody>
              <?php
                while($reg = mysqli_fetch_array($consulta)){
                  $codigo = $reg{0};
                  $usuarios = $reg{1};
                  $blocos = $reg{2};
                  $salas = $reg{3};
                  $equipamentos = $reg{4};
                  $obss = $reg{5};
                  $datas = $reg{6};
                  $statuss = $reg{7};
                  $dataformato = date("d-m-Y", strtotime($datas));

                  echo(
                    "<tr>
                      <td>$equipamentos</td>
                      <td>$dataformato</td>
                      <td>$statuss</td>"
                  );

                  if ($statuss == "Pendente Devolução" or $statuss == "Em Espera" 
                        or $statuss == "Devolvido") {
                    echo("<td></td>");
                  } else if ($statuss == "Reprovado"){
                    echo(
                      "<td>
                        <form method='POST'>
                          <input type='hidden' name='codigo' value='$codigo'>
                          <button type='submit' name='ReprDev'  style='background-color:transparent;border:0px;' alt='Excluir Equipamento'>
                            <img src='images/recuse.png'/>
                          </button>    
                        </form>
                      </td>"
                    );
                  } else if ($statuss == "Aprovado") {  
                    echo(
                        "<td>
                          <form method='POST'>
                            <input type='hidden' name='codigo' value='$codigo'>
                            <button type='submit' name='devolver'  style='background-color:transparent;border:0px;' alt='Devolver Equipamento'>
                              <img src='images/dev.png' alt='Devolver Equipamento'/>
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
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
