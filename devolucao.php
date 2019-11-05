<?php 
  include_once('scripts/conexao.php');
  include_once('scripts/verificaLogin.php');
  include_once('scripts/menu.php');
  include_once('scripts/deslogar.php');

  $us = $_SESSION['login'];

  $sql4 = "select bloco from usuario where email = '$us'";
  $csBloco = mysqli_query($conexao,$sql4);

  while($ss = mysqli_fetch_array($csBloco)){
    $blocoos = $ss{0};
  }

  $sql2 = "select * from pedido 
          where bloco = '$blocoos' and status = 'Pendente Devolução' or status ='Devolvido'";
  $consulta = mysqli_query($conexao,$sql2);
  $cont = mysqli_num_rows($consulta);

  if (isset($_POST['aprovarDevolucao'])) {
    $codigoet = $_POST['codigo'];

    $sql3 = "UPDATE `pedido` SET `status` = 'Devolvido' WHERE `codigo` = $codigoet";
    $update = mysqli_query($conexao,$sql3);

    echo("<meta HTTP-EQUIV='refresh' CONTENT='0.30'; URL='devolucao.php'>");
    echo(
      '<center>
        <div class="alert alert-warning" role="alert">
          Devolvido com Sucesso!
        </div>
      <center>'
    );
  }

  if (isset($_POST['ReprDev'])) {
    $codigo07 = $_POST['codigo'];

    $del = "DELETE FROM `pedido` where `codigo` = '$codigo07'";
    $delete = mysqli_query($conexao,$del);

    echo"<meta HTTP-EQUIV='refresh' CONTENT='0.30'; URL='devolucao.php'>";
    echo('
      <center>
        <div class="alert alert-danger" role="alert">
          <strong>Exclusão Realizada com Sucesso!</strong>.
        </div>
      </center>'
    );
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Devolução</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link rel="stylesheet" href="style/style.css">
  </head>
  <body>
    <div class="container">
      <div class="col-lg-12 text-center">
        <h3 style="padding:40px 0">Devolução</h3>
        <table class="table table-hover responsive-table centered">
          <thead class="thead-dark">
            <tr>
              <th>Usuário</th>
              <th>Bloco</th>
              <th>Sala</th>
              <th>Equipamento</th>
              <th>Status</th>
              <th>Devolver</th>
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
                    <td>$obss</td>"
                );

                if ($statuus == "Devolvido") {
                  echo(
                      "<td>
                        <form method='POST'>
                          <input type='hidden' name='codigo' value='$codigo'>
                          <button type='submit' name='ReprDev'  style='background-color:transparent;border:0px;' alt='Excluir Equipamento'><img src='images/recuse.png'</a></button>
                        </form>
                      </td>
                    </tr>" 
                  );
                } 
                if($statuus == "Pendente Devolução"){
                  echo(
                      "<td>
                        <form method='POST'>
                          <input type='hidden' name='codigo' value='$codigo'>
                          <button type='submit' name='aprovarDevolucao'  style='background-color:transparent;border:0px;' ><img src='images/aprov.png'></a></button>
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
