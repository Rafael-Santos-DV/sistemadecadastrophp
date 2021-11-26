<?php
$hostname = "localhost";
$username = "root";
$password = "leafar";
$dbName = "Sistema_de_cadastro";

if (isset($_SESSION["permisao_db"])){
    $conexao = new PDO("mysql:host=$hostname; dbname=$dbName", $username, $password);

}else{
    header("Location: ../index.php");
}

?>