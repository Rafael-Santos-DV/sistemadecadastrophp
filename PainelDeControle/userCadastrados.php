<?php
if (isset($_SESSION["permisao_master"])){
    include("../scripts/conexaodb.php");
    $sql = "SELECT ID, USERNAME, EMAIL FROM Users";
    $dados = $conexao->prepare($sql);
    $dados->execute();
    $dados_array = $dados->fetchAll(PDO::FETCH_ASSOC);
    if (count($dados_array) > 0) {
        foreach ($dados_array as $chave=>$valor){
            print ("
            <tr>
                <td>".$valor["ID"]."</td>
                <td>".$valor["USERNAME"]."</td>
                <td>".$valor["EMAIL"]."</td>
                <td>
                    <span class='apagar-icons'>
                        <ion-icon name='trash-outline'></ion-icon>
                    </span>
                </td>
                <td class='td-class'>
                    <a id='fechar-i' class='format-link' href='painelControle.php'>
                        <ion-icon name='close-outline'></ion-icon>
                    </a>
                    <a class='format-link' href='painelAlterDices.php?valor=".$valor["ID"]."'>
                        <span class='hov'>
                            <ion-icon name='checkmark-outline'></ion-icon>
                        </span> 
                    </a>
                </td>
            </tr>");
        }
    }else{
        print ("
            <tr>
                <td>0</td>
                <td>sem registro</td>
                <td>sem registros</td>
                <td>
                    <span class='apagar-icons'>
                        <ion-icon name='trash-outline'></ion-icon>
                    </span>
                </td>
                <td class='td-class'>
                    <a id='fechar-i' class='format-link' href='painelControle.php'>
                        <ion-icon name='close-outline'></ion-icon>
                    </a>
                    <a class='format-link' href='painelAlterDices.php?valor=0'>
                        <span class='hov'>
                            <ion-icon name='checkmark-outline'></ion-icon>
                        </span> 
                    </a>
                </td>
            </tr>");
    }

}else{
    header("Location: ../index.php");
}

?>