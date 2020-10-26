<?php

session_start();

include "libreria.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $_SESSION["usuario"]= $_REQUEST["nombre"];
    $_SESSION["contraseña"]= $_REQUEST["pass"];
    setcookie("usercookie", sha1(md5($_REQUEST["nombre"])), time() + 365 * 24 * 60 * 60 );
    setcookie("passcookie", sha1(md5($_REQUEST["pass"])), time() + 365 * 24 * 60 * 60 );
    $email = correo($_SESSION["usuario"]);
    $Comprovacioncontra = contraseña($_SESSION["contraseña"]);
    if ($email = TRUE && $Comprovacioncontra = TRUE ){
        if ($_COOKIE["usercookie"]== sha1(md5("marc@gmail.com")) && $_COOKIE["passcookie"] == sha1(md5("abcd"))) {
            header("Location: ./sessio2.php");
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
        Aceptar cookies: <input type="checkbox" name="Aceptar">
        <input type="submit" value="enviar">
    </form>
</body>
</html>