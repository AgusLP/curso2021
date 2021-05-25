<?php
    $servername = "localhost";
    $database = "mbalague_M03";
    $username = "mbalague";
    $password = "mbalague";
    $NUser= $_POST["correo"];
    $PassUser = $_POST["contraseña"];
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check connection
    if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
    }
     
    echo "Connected successfully";
     
    $sql = "INSERT INTO User (Nombre, Correo, Password) VALUES ('$NUser', '$PassUser')";
    if (mysqli_query($conn, $sql)) {
          echo "New record created successfully";
    } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
?>