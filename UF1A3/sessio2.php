<?php
session_start();
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    
    session_destroy();
    session_unset();
    setcookie("usercookie", null, null, null);
    setcookie("passcookie", null, null, null);
    header("Location: ./session.php");
}
    if (isset($_SESSION["usuario"]) or isset($_SESSION["contraseña"])){
        echo $_SESSION["usuario"];
        echo $_SESSION["contraseña"];
    }   else{
        header("Location: http://dawjavi.insjoaquimmir.cat/mbalague/curso2021/UF1A3/sessio.php");
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
    <form action="sessio2.php" method="post">
        <input type="submit" value="Log out">
        Nombre: <input type="text" name="nombre"></br>
        Contraseña: <input type="password" name="pass">
    </form>
</body>
</html>