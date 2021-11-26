<?php
if (isset($_SESSION["permisao_clear"])){
    function clearDices($string_name) {
        $string_name_user = trim($string_name);
        $string_name_user = stripslashes($string_name_user);
        $string_name_user = htmlspecialchars($string_name_user);
        return $string_name_user;
    }

}else{
    header("Location: ../index.php");
}


?>