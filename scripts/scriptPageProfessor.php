<?php 

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
    
    //SALVAR BANCO DE DADOS
    $sql = "INSERT INTO `pedido` (`codigo`,`usuario`,`bloco`,`sala`,`equipamento`,`obs`,`data`,`status`) 
                    VALUES (NULL,'$professor','$bloco','$sala','$equipamento','$obs','$data','$status');";
    $salvar = mysqli_query($conexao,$sql);
    
    if ($statuss == "Aprovado") {
      $sql20 = "UPDATE `equipamento` SET `quantidade` = `quantidade`-1 
                WHERE `equipamento`.`codigo` = $codigoequip";
      $upd = mysqli_query($conexao,$sql20);
    }
  }

  if (isset($_GET['deslogar'])) {
    session_destroy();
    header("location: login.php");
  }

  $user = $_SESSION['login'];
  $sql2 = "SELECT * FROM PEDIDO WHERE USUARIO = '$user'";
  $consulta = mysqli_query($conexao,$sql2);
  $cont = mysqli_num_rows($consulta);
  
  if (isset($_POST['devolver'])) {
    $codigoet = $_POST['codigo'];
    $update = "UPDATE `pedido` SET `status` = 'Pendente Devolução' WHERE `codigo` = $codigoet";
    $alterar = mysqli_query($conexao,$update);
    
    echo(
        '<center>
          <div class="alert alert-warning" role="alert">
            <strong>Devolução Realizada com Sucesso!</strong>.
          </div>
        </center>'
    );

  } else if (isset($_POST['ReprDev'])) {
    $codigo07 = $_POST['codigo'];
    $del = "DELETE FROM `pedido` where `codigo` = '$codigo07'";
    $delete = mysqli_query($conexao,$del);
    
    echo(
        '<center>
          <div class="alert alert-danger" role="alert">
            <strong>Exclusão Realizada com Sucesso!</strong>.
          </div>
        </center>'
    );
  }
?>