<?php
	$hostname = "localhost";
	$user = "root";
	$password = "";
	$database = "db_agendamento";

	$conexao = mysqli_connect($hostname,$user,$password,$database);

	if(!$conexao){
		print "Falha na Conexão";
	}
?>