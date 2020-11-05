<?php
    include "libreria.php";

    if($_SERVER["REQUEST_METHOD"]=='POST'){
        $_SESSION["usuario"]=$_REQUEST["RegistarMail"];
        $_SESSION["contraseña"]=$_REQUEST["RegistaraContra"];

        $conn = new msqli('localhost', 'mbalague', 'mbalague', 'mbalague_');

        if ($msqli->connect_error){
            die("Connection failed: " . $conn->connect_error);

        }
        $usuari = $_REQUEST["RegistarMail"];
        $contra = $_REQUEST["RegistaraContra"];

        $comprovaremail=correo($_SESSION["usuario"]);
        $comprovarcontraseña=contraseña($_SESSION["contraseña"]);
        if (isset($_REQUEST["registrar"])){
            if ($comprovaremail == TRUE && $comprovarcontraseña == TRUE){
                if ($_POST["RegistarMail"]== md5("$usuari") && $_POST["RegistaraContra"]== md5("$contra")){
                    echo "Usuario ya existente";
                }else{
                    echo "Usuario añadido";
                    $conn -> query("INSERT INTO 'usuario'('users', 'passwords') VALUES ($usuari, $contra");
                    $result = (mysqli_query($mysqli.$conn)); 
                
            }
        }
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
    <form action="registro.php" method="post">
        <input type="submit" value="Log out">
        Nombre: <input type="text" name="nombre"></br>
        Contraseña: <input type="password" name="pass">
    </form>
</body>
</html>
