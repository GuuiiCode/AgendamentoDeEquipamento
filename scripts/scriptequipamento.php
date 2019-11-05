<?php

	//LISTANDO BLOCOS
	$rs = "select * from bloco";
	$blocos = mysqli_query($conexao,$rs);
	$cont = mysqli_num_rows($blocos);
	
	// SALVANDO DADOS
	if(isset($_POST['Cadastrar'])){
		$descricao = $_POST['descricao'];
		$bloco = $_POST['bloco'];
		$quantidade = $_POST['quantidade'];
		
		$sql = "insert into equipamento(descricao,bloco,quantidade)  
									values ('$descricao','$bloco','$quantidade')";
		$salvar = mysqli_query($conexao,$sql);
		
		if (isset($cadastro)) {
			echo(
				'<center>
					<div class="alert alert-danger">
						<strong>Erro:</strong> Não foi Possivel realizar o Cdastro!
					</div>
				</center>'
			);
		} else {
			echo(
				'<center>
					<div class="alert alert-success">
						Salvo com Sucesso!
					</div>
				</center>'
			);
		}
	  
		/*//LISTANDO BLOCOS	
		$rs = "select * from bloco";
		$blocos = mysqli_query($conexao,$rs);
		$cont = mysqli_num_rows($blocos);*/
	}
?>