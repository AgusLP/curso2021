<?php
session_start();

    if (isset($_SESSION["nom"]) or isset($_SESSION["pas"])){
        echo $_SESSION["nom"];
        echo $_SESSION["pas"];
    }   else{
        header("Location: http://dawjavi.insjoaquimmir.cat/mbalague/curso2021/UF1A3/sessio.php");
    }


?>

