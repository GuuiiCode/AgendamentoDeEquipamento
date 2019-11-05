<?php
	if (isset($_POST)) {
		$codigob = $_POST['codigob'];
		
		$sql = "SELECT b.descricao, e.descricao, e.quantidade, e.codigo 
				FROM bloco b inner join equipamento e on b.codigo = e.bloco 
				WHERE b.codigo = $codigob";
		$rs = mysqli_query($conexao,$sql);
		$cont = mysqli_num_rows($rs);
	}
?>