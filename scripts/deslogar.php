<?php
  if(isset($_GET['deslogar'])){
    session_destroy();
    header("location: login.php");
  }
?>