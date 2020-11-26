<?php
session_start();

$conn = mysqli_connect('localhost', 'mbalague', 'mbalague', 'mbalague_login2');
$sql = "select * from productos";
if (!$resultado = $conn->query($sql)) {
  die("error ejecutando la consulta:".$conn->error);
}else{
    while($llista_productes = $resultado -> fetch_assoc()){

        echo "ID_Producte: ";
        echo $llista_productes['id'];
        echo "<br>";
        echo "Nom: ";
        echo $llista_productes['nom'];
        echo "<br>";
        echo "Descripcio: ";
        echo $llista_productes['descripcion'];
        echo "<br>";
        echo "Preu: ";
        echo $llista_productes['precio'];
        echo "<br>";
        echo "<a href=cestaCompra.php?idproductos
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
       
</body>
</html>

