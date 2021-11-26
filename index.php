<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css"/>
    <title>Sistema</title>
</head>
<body>

    <div class="master">
        <div class="container">
            <?php
            if(isset($_SESSION["user_cadastrado"])){
                echo "<div style=' color: white; text-align: center;'><p>".$_SESSION["user_cadastrado"]."</p></div>";
                
            }
            ?>
            <h2>Login</h2>
            <form action="scripts/painel.php" method="post">
                <div class="box-username">
                    <ion-icon name="person-add-outline"></ion-icon>
                    <input class="alinhar-input" type="text" name="username" placeholder="Nome de Usuário" required />
                </div>
                <div class="box-password">
                    <ion-icon name="key-outline"></ion-icon>
                    <input id="senha-input" class="alinhar-input" type="password" name="usersenha" maxlength="30" placeholder="Senha" required />
                    <ion-icon style="display: none;" id='ativado' class='eye-icon' name="eye-outline"></ion-icon>
                    <ion-icon id='escondido' class='eye-icon' name="eye-off-outline"></ion-icon>
                </div>
                <div class="box-submit">
                    <input type="submit" name="logar" value="Entrar"/>
                </div>
                <span class="user_erro"><?php
                if(isset($_SESSION["erro_user"])){
                    echo "Nome de usuário ou senha incorrretos!";
                }
                ?></span>

            </form>
            <div class="new-cadastro">
                <a href="scripts/cadastro.php"><span>Não tem cadastro?</span></a>
            </div>
        </div>
    </div>
    <?php
        if(isset($_GET["q"])){
            session_destroy();
        }
    ?>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="javascript/eventosSenha.js"></script>
</body>
</html>