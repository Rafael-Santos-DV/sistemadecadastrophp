<?php
session_start();
$permisao_nome = $permisao_senha = $permisao_user_email = FALSE;


if (isset($_POST["cadastrar"])){
    $_SESSION["permisao_db"] = TRUE;
    $_SESSION["permisao_clear"] = TRUE;
    include("cleardices.php");
    include("conexaodb.php");
    $username = clearDices($_POST["cadastro-user"]);
    $email = clearDices($_POST["cadastro-email"]);
    $senha = clearDices($_POST["cadastro-senha"]);


    if (strlen($username) < 4){
        $_SESSION["permisao_name"] = TRUE;
    }else{
        $permisao_nome = TRUE;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["permisao_email"] = TRUE;

    }else{
        $permisao_user_email = TRUE;
    }

    if (strlen($senha) < 7) {
        $_SESSION["permisao_senha"] = TRUE;
    }else{
        $permisao_senha = TRUE;
    }

    if ($permisao_senha && $permisao_nome && $permisao_user_email) {
        

        $sql = "SELECT * FROM Users WHERE USERNAME = '$username' or email = '$email'";
        $resultado_verification = $conexao->prepare($sql);
        $resultado_verification->execute();
        $todos_elementos = $resultado_verification->fetchAll(PDO::FETCH_ASSOC);
    
        
        if (count($todos_elementos)) {
            $_SESSION["user_existente"] = "Nome de usuário ou E-mail já estão em uso!";
            header("Location: Cadastro.php");

        }else{
            $sql = "INSERT INTO users(USERNAME, PASSWORD, email)
            values (
                :USERNAME,
                :PASSWORD,
                :email
            )";
            
            $resultado = $conexao->prepare($sql);
            $resultado->bindParam(":USERNAME", $username);
            $resultado->bindParam(":PASSWORD", $senha);
            $resultado->bindParam(":email", $email);
            $resultado->execute();
            $todos_results = $resultado->fetchAll(PDO::FETCH_ASSOC);
        
            $_SESSION["user_cadastrado"] = "Usuário cadastrado com sucesso!";
        
            header("Location: ../index.php?q=1");
        
        }
    }else{
        header("Location: cadastro.php");
    }
    
}else{
    header("Location: ../index.php");
}

?>