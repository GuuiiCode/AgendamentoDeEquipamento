<?php

  if (isset($_POST['Cadastrar'])) {
    $nomebloco = $_POST['descricao'];

    $sql = "insert into bloco(descricao) values ('$nomebloco')";
    $cadastro = mysqli_query($conexao,$sql);

    if (isset($cadastro)) {
        echo( 
            '<center>
              <div class="alert alert-success">
                Salvo com Sucesso.
              </div>
            </center>'
        );
    } else {
      echo(
          '<center>
              <div class="alert alert-danger">
                <strong>Erro:</strong> Não foi Possivel realizar o cadastro.
              </div>
          </center>'
      );
    }
  }
?>