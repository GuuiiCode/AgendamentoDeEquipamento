<?php
  if(isset($_POST['exc'])){
	  $codigos = $_POST['codigo'];
	  $sql2 = "DELETE FROM bloco where codigo = '$codigos'";
	  $excluir = mysqli_query($conexao,$sql2);
	  
	  if (isset($excluir)) {
      echo('
        <center>
          <div class="alert alert-success">
            Excluido com Sucesso.
          </div>
        </center>'
      );
    } else {
      echo(
        '<center>
          <div class="alert alert-danger">
            <strong>Erro:</strong> Não foi Possivel realizar a exclusão.
          </div>
        </center>'
      );
    }
  }

  $sql = "select codigo, descricao from bloco";
  $consulta = mysqli_query($conexao,$sql);
  $cont = mysqli_num_rows($consulta);

?>
 