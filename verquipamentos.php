<?php
  include_once('scripts/conexao.php');
  include_once('scripts/verificaLogin.php');
  include_once('scripts/menu.php'); 
  include_once('scripts/telaEquipamento.php');
  include_once('scripts/deslogar.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Equipamentos Disponiveis</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    
    <link rel="stylesheet" href="style/style.css">
  </head>
  <body>
    <div class="container">
      <div class="col-lg-12 text-center">
        <div class="text-center" >
          <h3 style="padding:40px 0">Equipamentos Disponiveis</h3>
          <table class="table table-hover responsive-table centered">
            <thead class="thead-dark">
              <tr>
                <th>Bloco</th>
                <th>Equipamento</th>
                <th>Quantidade</th>
                <th colspan="2">Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                while ($reg = mysqli_fetch_array($rs)) {
                  $bloco= $reg{0};
                  $descricao = $reg{1};
                  $quantidade = $reg{2};
                  $codigo = $reg{3};
                  
                  echo(
                    "<tr>
                      <td>$bloco</td>
                      <td>$descricao</td>
                      <td>$quantidade</td>
                      <td>
                        <form method='post'>
                          <input type='hidden' name='codigo' value='$codigo'>
                          <button type='submit' name='exc' style='background-color:transparent;border:0px;'>
                            <img src='images/recuse.png'/>
                          </button>
                        </form>
                      </td>
                      <td>
                        <form method='post' action='editEquipamento.php'>
                          <input type='hidden' name='codigo' value='$codigo'>
                          <input type='hidden' name='descricao' value='$descricao'>
                          <input type='hidden' name='quantidade' value='$quantidade'>
                          <input type='hidden' name='bloco' value='$bloco'>
                          <button type='submit' name='alt' style='background-color:transparent;border:0px;'>
                            <img src='images/edit.png'/>
                          </button>
                        </form>
                      </td>
                    </tr>"
                  );
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
    <script> 
      botao.on('click', function(event){
        dropDown.stop(true,true).slideToggle();
        // remove o tooltip ao clicar no dropdown
        $('.tooltip').remove();
        event.stopPropagation();
        // fecha o dropdown no evento "mouseleave"
        $('.dropDown').mouseleave(function(){
          dropDown.slideUp();
        });
      });
    </script>

  </body>
</html>
