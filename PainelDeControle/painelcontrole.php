<?php
session_start();
if(!isset($_SESSION["user_logado"])){
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style3.css"/>
    <title>Painel Master</title>
    
</head>
<body>
    <div class="master">
        
        <div class="container">
            
            <div class="box">
                <div class="btn-sair">
                    <a href="../index.php?q=1"><ion-icon name="log-out-outline"></ion-icon></a>
                </div>  
                <h2>Usuários cadastrados</h2>
                <div class="result">
                    <?php
                    if(isset($_SESSION["status_del"])){
                        echo "<p style='color: white;'>".$_SESSION["status_del"]."</p>";
                    }
                    ?>
                </div>
                <div class="mini-container">
                    <table>
                        <tr>
                            <th>
                                <span><ion-icon class="ths-icons" name="id-card-outline"></ion-icon></span>
                                <span class="centra-span">Id</span>
                            </th>
                            <th>
                                <span><ion-icon class="ths-icons" name="people-circle-outline"></ion-icon></span>
                                <span class="centra-span">Nome de Usuário</span>
                            </th>
                            <th>
                                <span><ion-icon class="ths-icons" name="mail-outline"></ion-icon></span>
                                <span class="centra-span">E-mail</span>
                            </th>
                        </tr>
                        <?php
                        $_SESSION["permisao_master"] = TRUE;
                        include("userCadastrados.php");
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="../javascript/transitionsIcons.js"></script>
</body>
</html>