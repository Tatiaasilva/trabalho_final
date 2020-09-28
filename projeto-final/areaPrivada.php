<?php
    session_start();
    if(!isset($_SESSION['id_usuario']))
    {
    	header("location: telalogin.php");
    	exit;
    }
    /*função que confirma o logout, voltando para a tela de login*/
?>



SEJA BEEEEEEEM VINDOOOOO!!
<a href="sair.php"> Sair </a>