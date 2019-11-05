<?php
	include_once('scripts/conexao.php');

	if (isset($_POST['exc'])) {
		$codigos = $_POST['codigo'];

		$sql2 = "DELETE from equipamento where codigo = '$codigos'";
		$excluir = mysqli_query($conexao,$sql2);

		if (isset($excluir)) {
			echo(
				'<center>
					<div class="alert alert-success">
						Excluido com Sucesso.
					</div>
				</center>';
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

	$sql = "SELECT b.descricao, e.descricao, e.quantidade, e.codigo 
			from bloco b inner join equipamento e on b.codigo = e.bloco";
	$rs = mysqli_query($conexao,$sql);
	$cont = mysqli_num_rows($rs);

	$sql3 = "select * from bloco";
	$consultab = mysqli_query($conexao,$sql3);
	$conta = mysqli_num_rows($consultab);	
?>