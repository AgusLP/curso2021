<?php
session_start();
if (isset($_SESSION["user"]) and $_SESSION["pass"]){
    echo("hola: ".$_SESSION["user"]);
    if(isset($_POST["adeu"])){
        session_destroy();
    }
}else {
    header("Location: index.php");
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
<form action="home.php" method="post">
        <input type="submit" name="adeu" value="log out">
    </form>
</body>
</html>