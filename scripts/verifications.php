<?php
session_start();

if (isset($_SESSION["user_logado"])){
    header("Location: ../PainelDeControle/painelcontrole.php");
}else{
    header("Location: ../index.php");
}

?>