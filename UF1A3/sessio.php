<?php

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){


    if ($_REQUEST["nombre"]== "marc@gmail.com" and $_REQUEST["pass"] == "abc1234") {
        $_SESSION["nom"]=$_REQUEST["nombre"];
        $_SESSION["pas"]=$_REQUEST["pass"];
        header("Location: https://dawjavi.insjoaquimmir.cat/mbalague/curso2021/UF1A3/sessio2.php");
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