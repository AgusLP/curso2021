<?php

session_start();


include "librerias.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $_SESSION["usuario"] = $_REQUEST["email"];
    $_SESSION["contraseña"] = $_REQUEST["password"];
    setcookie("user", sha1(md5($_REQUEST["email"])), time() + 365 * 24 * 60 * 60); 
    setcookie("contraseña", sha1(md5($_REQUEST["password"])), time() + 365 * 24 * 60 * 60); 
    $conn = new msqli('localhost', 'mbalague', 'mbalague', 'mbalague_');
    if ($conn -> connect_error){
        die("Connection failed: ". $conn -> connect_error);
    }
    $usuari= $_REQUEST["email"];
    $contra= $_REQUEST["password"];

    $comprovaremail=correo($_SESSION["usuario"]);
    $comprovarcontraseña=contraseña($_SESSION["contraseña"]);
    if ($comprovaremail=true && $comprovarcontraseña=true){
        if ($_COOKIE["user"] == sha1(md5("marc@gmail.com")) && $_COOKIE["contraseña"] == sha1(md5("abcd"))){
            header("Location: ./sessions2.php");
            }else{
                echo "Este correo no existe";
        }

        }else{
        echo "Este correo no está en el formato idoneo";
        }
    }else{
        header("Location: registro.php");
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
        <h2>Iniciar Sesion:</h2>
        <form action="sessions.php "method="post">
            <label>Nombre usuario: </label> <input type="text" value="" size="30" maxlength="100" name="email" id="" /><br /><br />
            <label>Contraseña: </label> <input type="password" value="" size="30" maxlength="100" name="password" id="" /><br /><br />
            <lable>Aceptar Cookies</label><input type="checkbox" name="Aceptar"><br></br>
            <lable>Rechazar Cookies</label><input type="checkbox" name="Rechazar"><br></br>
            <button id="mysubmit" type="submit">Enviar</button>
            <button name="registrar" type="submit">Registarse</button>
        </form>
    </body>
    </html>