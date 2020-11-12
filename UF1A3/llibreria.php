<?php
    function validacio($comprovaciomail){
        if (!filter_var($comprovaciomail, FILTER_VALIDATE_EMAIL)) {
            return FALSE;
        }else {
            return TRUE;
        }
    }
    function validaciopass($comprovaciopass){
        if (!preg_match("/^[a-zA-Z-' ]*$/", $comprovaciopass)) {
            return FALSE;
        }else {
            return TRUE;
        }
    }
    function closeS(){
        session_destroy();
        header ("Location: https://dawjavi.insjoaquimmir.cat/mbalague/curso2021/UF1A3/session.php");
    }
    function consultaProductes($conn ,$user){
        $sql = "SELECT * FROM USER WHERE user = '$user'";
            
        $resultat = $conn->prepare($sql);
        $resultat->execute();
        $resultat->bind_result($id, $nom, $descripcio, $preu, $id_user);
        echo "<table border=1><tr><th  colspan ='3'><p><b>Aquest son els teus productes</b></p></th></tr>";
        echo "<tr><td><b>Mail</b></td><td><b>Password</b></td><td><b>Role</b></td></tr>";
        while($resultat->fetch()){
            echo "<tr><td> $id </td><td> $nom </td><td> $descripcio</td><td>$preu</td><td>$id_user</td></tr>";
        }
        echo "</table><br>";
    }

    function contRol($conn, $user){
        $sqlr = "SELECT id_role FROM USER WHERE user = '$user'";
        $resultat = $conn->prepare($sqlr);
        $resultat->execute();
        $resultat->bind_result($roler);
        while($resultat->fetch()){
            $roler;
        }
        return $roler;
    }

    function consultaTotal ($conn){
        $sqlt = "SELECT * FROM USER";
        $resultat = $conn->prepare($sqlt);
        $resultat->execute();
        $resultat->bind_result($tuser, $tpass, $trole);
        echo "<h1>Aqui son les dades de tots els usuaris: </h1><br>";
        echo "<table border=1>";
        echo "<tr><th><b>users</b></th><th><b>password</b></th><th><b>role</b></th></tr>";
        while($resultat->fetch()){
            echo "<tr><td>$tuser</td><td>$tpass</td><td>$trole</td></tr>";
        }
        echo "</table>";
    }
    function adminMod($conn, $user, $newuser, $newpass, $newrole){
        $sqla = "UPDATE USER SET user = '$newuser' , password = '$newpass', role = '$newrole' WHERE user='$user'";
        $resultat = (mysqli_query($conn, $sqla) or die("Error". mysqli_error($conn)));
        echo "Tot ha anat bé torna a carregar la página per veure els canvis";
    }
    function usersUpdate($conn , $user, $newuser, $newpass){
        $sqlup = "UPDATE USER SET user = '$newuser' , password = '$newpass', role = 'user' WHERE user='$user'";
        $resultat = (mysqli_query($conn, $sqlup) or die("Error". mysqli_error($conn)));
        echo "Tot ha anat bé torna a session i entra de nou amb la teva nova info.";
    }

    function eliminarUsuari($conn, $deluser){
        $sqld = "DELETE FROM USER WHERE user = '$deluser'";
        $resultat = mysqli_query($conn, $sqld) or die('Consulta fallida: ' . mysqli_error($conn));
        echo "<br>Recarrega la página per veure els canvis.";
    }

    function createUserA($conn, $newuser, $newpass, $newrole){
        $sql = "INSERT INTO USER (user , password, role) VALUES ('$regUser', '$regPass', '$newrole')";
        $result = (mysqli_query($conn, $sql) or die("Error: ". mysqli_error($conn)));
    }
    function insertarProducte($conn, $user){
        $sql = "INSERT INTO PRODUCTE (id, Nom, Descripcio, Preu, id_user) VALUES ('$id', '$nom','$descripcio', '$preu', '$id_user')";
        $result = (mysqli_query($conn, $sql) or die("Error: ". mysqli_error($conn)));
    }
    
?>



