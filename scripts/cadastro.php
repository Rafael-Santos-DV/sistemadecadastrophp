<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style2.css"/>
    <title>Area de Cadastro</title>
    <style>
        .ativar{
           color: red;
           padding: 10px;
           font-size: 14px;
           position: relative;
           top: -5px;
           display: block;
        }
    </style>
    
</head>
<body>
    <div class="box-cadastro">
        <div class="box-form">
            <div class="title-center"><h2>Cadastro</h2></div>
            <?php
                if(isset($_SESSION["user_existente"])){
                    print("<div style='color: red;'class='existente-user'>".$_SESSION["user_existente"]."</div>");
                    
                }
            ?>
            <form action="../scripts/fazerCadastro.php" method="post">
                <div class="container-inputs">
                    <div class="container-flexs">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="type" name="cadastro-user" placeholder="Nome de Usuário" required/>
                        <?php
                        if(isset($_SESSION["permisao_name"])) {
                            echo "<span class='ativar'>Informe um nome de usuário válido!</span>";
                        }
                        ?>
                       
                    </div>
                    <div class="container-flexs">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input text="text" name="cadastro-email" placeholder="E-mail" required/>
                        <?php
                        if(isset($_SESSION["permisao_email"])) {
                            echo "<span class='ativar'>Informe um e-mail válido!</span>";
                        }
                        ?>
                    </div>
                    <div class="container-flexs">
                        <ion-icon name="key-outline"></ion-icon>
                        <input text="password" name="cadastro-senha" placeholder="Sua Senha" maxlength="30" required/>
                        <?php
                        if(isset($_SESSION["permisao_senha"])) {
                            echo "<span class='ativar'>Informe uma senha com no mínimo 6 caracteres!</span>";
                            
                        }
                        ?>
                    </div>
                    <div class="btn-cadastro-center">
                        <input type="submit" name="cadastrar" value="Fazer Cadastro"/>
                    </div>
                    
                </div>
                <div class="login-acount">
                    <a href="../index.php"><span>Já tem conta?</span></a>
                </div>
               
            </form>
        </div>
    </div>
    <?php
    session_destroy();
    ?>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
