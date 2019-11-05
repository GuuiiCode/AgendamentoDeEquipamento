<?php

	if (isset($_POST['Cadastrar'])) {
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		$telefone = $_POST['telefone'];
		$tipo = $_POST['tipo'];
		$bloco = $_POST['bloco'];

		$sql = "insert into usuario(email,senha,telefone,tipo,bloco) 
									values ('$email','$senha','$telefone','$tipo','$bloco')";
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