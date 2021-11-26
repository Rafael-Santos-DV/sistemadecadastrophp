<?php
session_start();

$request_id = "";
if(isset($_GET["valor"])){
    $_SESSION["permisao_db"] = TRUE;
    require("../scripts/conexaodb.php");
    if ($_GET["valor"] > 0){
        $request_id = trim($_GET["valor"]);
        $sql = "DELETE FROM Users WHERE ID = :id_user";
        $delete_db = $conexao->prepare($sql);
        $delete_db->bindParam("id_user", $request_id);
        $delete_db->execute();
        $dices_array = $delete_db->fetchAll(PDO::FETCH_ASSOC);
        echo $request_id;
        $_SESSION["status_del"] = "Usuário foi excluído com sucesso!";
        header("Location: painelcontrole.php");

    }else{
        $_SESSION["status_del"] = "Sem dados no DATABASE!";
        header("Location: painelcontrole.php");
    }
    
}else{
    header("Location: ../index.php");
}
?>