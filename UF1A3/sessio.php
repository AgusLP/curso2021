<?php

session_start();

include "libreria.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $_SESSION["usuario"]= $_REQUEST["nombre"];
    $_SESSION["contraseña"]= $_REQUEST["pass"];
    $email = correo($_SESSION["usuario"]);
    $Comprovacioncontra = contraseña($_SESSION["contraseña"]);
    if ($email = TRUE and $Comprovacioncontra = TRUE){
        if ($_REQUEST["nombre"]== "marc@gmail.com" and $_REQUEST["pass"] == "abcd") {
            header("Location: https://dawjavi.insjoaquimmir.cat/mbalague/curso2021/UF1A3/sessio2.php");
        }else{
            echo "Te has equivocado";
        }
    }else{
        echo "No esta en el formato que tiene que ser";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="sessio.php" method="post">
        Nombre: <input type="text" name="nombre"></br>
        Contraseña: <input type="password" name="pass">
        <input type="submit" value="enviar">
    </form>
</body>
</html>