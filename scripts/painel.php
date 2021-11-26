<?php
session_start();

if (isset($_POST["logar"])) {
    $_SESSION["permisao_db"] = TRUE;
    $_SESSION["permisao_clear"] = TRUE;
    include("conexaodb.php");
    include("cleardices.php");
    $nome_de_usuario = clearDices($_POST["username"]);
    $senha_do_user = clearDices($_POST["usersenha"]);
    $new_sql = "SELECT * FROM Users  WHERE USERNAME = :nome and PASSWORD = :senha";
    $new_conexao = $conexao->prepare($new_sql);
    $new_conexao->bindParam(":nome", $nome_de_usuario);
    $new_conexao->bindParam(":senha", $senha_do_user);
    $dice = $new_conexao->execute();
    $result = $new_conexao->fetchAll(PDO::FETCH_ASSOC);
    if (count($result) > 0) {
        $_SESSION["user_logado"] = $nome_de_usuario;
        header("Location: verifications.php");
    }
    else{
        $_SESSION["erro_user"] = TRUE;
        header("Location: ../index.php?q=1");
        
    }
}else{
    header("Location: ../index.php?q=1");
}

?>