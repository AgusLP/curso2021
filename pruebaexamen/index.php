<?php
    session_start();
    if(isset($_POST["user"]) and isset($_POST["pass"])){
        $_SESSION["user"]=$_POST["user"];
        $_SESSION["pass"]=$_POST["pass"];
        $user=$_POST["user"];
        $pass=md5($_POST["pass"]);
        echo "$user";
        echo "$pass";
        $conn= new mysqli('localhost', 'mbalague', 'mbalague', 'mbalague_login2');
        $sql="SELECT email, password FROM usuaris";
        $result = $conn->prepare($sql);
        $result->execute();
        $result->bind_result($tnom, $tpass);
     
        while($result->fetch()) {
           if ($user==$tnom and $pass=$tpass){
                header("Location: home.php");
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
<form type="pruebaalex.php" method="post">
        <p>Nombre: <input type="text" name="user"/></p></br>
        <p>Contraseña: <input type="password" name="pass"/></p></br>
        <p><input type="submit" name="Entrar" value="Entrar"/>
        <input type="submit" name="recovery" value="RecordarPass">
    </form>
</body>
</html>