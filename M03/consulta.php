<?php
    $servername = "localhost";
    $database = "mbalague_M03";
    $username = "mbalague";
    $password = "mbalague";

    $correo = $_POST["correo"];
    $contraseña = $_POST["contraseña"];
 
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 



    $sql = "SELECT * from User WHERE Correo = '$correo' and Password = '$contraseña'";

    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo $row["Correo"];
      }
    } else {
      echo "No se ha encontrado ningun resultado";
    }
    $conn->close();
?>