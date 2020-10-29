<?php

session_start();
include "libreria.php";
$fallon="";
$fallocontra="";
$error= false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nombre = $_POST["nombre"];
    $pass = $_POST["pass"];
    if (filter_var($nombre)== false) {
        $fallon="La ha de ser un mail";
        $error = true;
    }   
    if (preg_match ("/^[a-zA-Z0-9]+$/", $pass)== false){
        $fallocontra= "La password solo de numeros o de letras ";
        $error= true;
    }        

      
    try{
        $conn = new mysqli('localhost', 'mbalague', 'mbalague', 'mbalague_');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

    $sql = "INSERT INTO usuario (users, passwords) VALUES (?, ?)";
    $res=$conn->prepare($sql);
    $res->bind_param("ss", $nombre, $pass);
    $res->execute();
    $conn->close();
 }catch(mysqli_sql_exception $e) {
     $e->errorMessage();
 }
}
/*
$sql = "SELECT * FROM usuario";
$result = $conn->prepare($sql);
if(!$resultado = $conn ->query($sql)){
    die("Error ejecutando la consulta: ".$conn->error); 
}
while ($usuari = $resultado->fetch_assoc()){
    echo $usuari["users"].",".$usuari["passwords"]."<br>";
}
$resultado-> free();
$conn->close();
*/
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