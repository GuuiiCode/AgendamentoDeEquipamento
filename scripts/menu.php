<?php 
    if($_SESSION['tipo'] == "Controlador"){
      echo(
        '<ul class="topnav">
          <li><a href="controlador.php">Home</a></li>
          <li><a href="cadblocos.php">Cadastrar Bloco</a></li>
          <li><a href="cadEquipamento.php">Cadastrar Equipamentos</a></li>
	        <li><a href="devolucao.php">Devoluções</a></li>
          <li class="right"><a href="?deslogar">Sair</a></li>
        </ul>'
      );
    } else {
      echo(
        '<ul class="topnav">
          <li><a class="active" href="pageProfessor.php">Home</a></li>
          <li><a href="antesequip.php">Solicitar Equipamentos</a></li>
          <li class="right"><a href="?deslogar">Sair</a></li>
        </ul>'
      );
    }
?>