<?php 
    include_once('scripts/conexao.php');
    session_start();

    if (isset($_POST['validar'])) {
        $login = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT email,senha,tipo FROM usuario where email = '$login' and senha = '$senha' ";
        $rs = mysqli_query($conexao,$sql);
        $contador = mysqli_num_rows($rs);
        
        if($reg = mysqli_fetch_array($rs)){
            $log = $reg{0};
            $pass = $reg{1};
            $tipo = $reg{2};

            $log = $login ;
            $pass = $senha;

            $_SESSION['login'] = $log;
            $_SESSION['senha'] = $pass;
            $_SESSION['tipo'] = $tipo;

            if ($tipo == "Professor") {
                header("Location: pageProfessor.php");
            } else {
                header("Location: controlador.php");
            }
        } else {
            $_SESSION['erro'] = "erro";
            header('location:login.php');
        }
    }   
?>