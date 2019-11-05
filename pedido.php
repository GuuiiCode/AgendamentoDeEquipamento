<?php
	include_once('scripts/conexao.php');
	include_once('scripts/verificaLogin.php');
	include_once('scripts/menu.php');
	include_once('scripts/deslogar.php');

	if (isset($_POST['solicitar'])) {
		$codigoequip = $_POST['codigos'];
		$qntd = $_POST['quantidade'];
		
		//Salvar Dados
		$sql = "SELECT b.descricao, e.descricao, e.quantidade, e.codigo 
				from bloco b inner join equipamento e on b.codigo = e.bloco 
				where e.codigo = $codigoequip; ";
		$rs = mysqli_query($conexao,$sql);
		$cont = mysqli_num_rows($rs);
		
		while($reg = mysqli_fetch_array($rs)){
			$bloco = $reg{0};
			$equipamento = $reg{1};
			$quantidade = $reg{2};
		}
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Pedido</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
  </head>
  <body>
	<div class="container">
    	<div class="row">
        	<div class="col-lg-12 text-center">
        		<div class="text-center" style="padding:50px 0">
					<center>
						<div class="col-sm-8 col-md-6 col-lg-4">
							<form id="login-form" class="text-left" method="POST" action="pageProfessor.php">
								<div class="form-group">
									<input type="hidden" class="form-control" id="lg_username" name="codigoequip" value="<?php echo($codigoequip); ?>" required>
								</div>
								<div class="form-group">
									<input type="hidden" class="form-control" id="lg_username" name="professor" value="<?php echo($_SESSION['login']);?>" required>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" id="lg_username" name="bloco" readonly="readonly" value="<?php echo($bloco)?>" required>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" id="lg_username" name="equipamento" readonly="readonly" value="<?php echo($equipamento)?>" required>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" id="lg_username" name="quantidade" readonly="readonly" value="1" required>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" id="lg_username" name="sala" placeholder="Sala" required>
								</div>
								<div class="form-group">
									<input type="date" class="form-control" name="data" required>
								</div>
								<div class="form-group">
									<textarea class="form-control" name ="obs" rows="5" placeholder="Observação/ Horario e etc."></textarea>
								</div>
								<div class="form-group">
									<input type="hidden" class="form-control" id="lg_username" name="status" value="Em Espera">
								</div>
								<button type="submit" class="btn btn-primary" name="confirmaPedido">Confirmar</button> 
							</form>
						</div>
					</center>
				</div>
        	</div>
    	</div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
