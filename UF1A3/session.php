<?php
    session_start();
    require "llibreria.php";


    if ($_SERVER['REQUEST_METHOD']=='POST'){
        if (isset($_POST["accept"])){
            if ($_POST["accept"] == "si"){
                setcookie('galleta',6, time() + 365 * 24 * 60 * 60); 
            }else if ($_POST["accept"] == "no"){
                header ("Location: https://www.google.com/?hl=ca");
            }
        }else if (isset($_POST["user"]) and isset($_POST["pass"])) {
            $conn = new mysqli('localhost', 'mbalague', 'mbalague', 'mbalague_');
            $user = $_REQUEST["user"];
            $pass = $_REQUEST["pass"];
            $sql = "SELECT * FROM USER WHERE email = '$user' and password = '$pass'";
            $result = $conn->prepare($sql);

            $_SESSION["email"]=$_REQUEST["user"];
            $_SESSION["Password"]=$_REQUEST["pass"];
            if (!$result = $conn->query($sql)){
                die ("error");
            }
            $comprovaciomail = validacio($_SESSION["email"]);
            $comprovaciopass = validaciopass($_SESSION["Password"]);
            if ($comprovaciomail == TRUE and $comprovaciopass == TRUE){ 

                if ($result -> num_rows > 0){
                    while ($usuario = $result->fetch_assoc()){
                        $conn->close();
                        header("Location: http://dawjavi.insjoaquimmir.cat/mbalague/curso2021/UF1A3/privada.php");
                    }
                }
            }else {
                echo "Contrasenya o mail sense el format indicat.";
            }
        }else if(isset($_POST["register"])){
            header ("Location: https://dawjavi.insjoaquimmir.cat/mbalague/curso2021/UF1A3/register.php");
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


    <?php
    if (!isset($_COOKIE['galleta'])){
    ?>
    <form action="session.php" method="post">
        <p>Aquest lloc utilitza cookies</p>
        <input type="submit" name="accept" value="si">
        <input type="submit" name="accept" value="no">
    </form>
    <?php
    }
    ?>



    <form action="session.php" method="post">
        <p>User: </p><input type="text" name="user"><br>
        <p>Password: </p><input type="password" name="pass"><br>
        <input type="submit" value="Accedir">
    </form><br>

    <form action="session.php" method="post">
        <p>Si vols registrarte: </p>
        <input type="submit" value="registre" name="register">
    </form>
    <form action="privada.php" method="post">
        <h1>Aquí pots afegir un producte</h1>
        <p>Id del producte: </p><input type="text" name= "regId"><br>
        <p>Nom del producte: </p><input type="text" name = "regNom"><br>
        <p>Petita descripcio del producte: </p><input type="text" name="regPass"><br>
        <p>Preu(€): </p><input type="text" name="regUser"><br>
        <input type="submit" value="ACABA">
    </form>
</body>
</html>