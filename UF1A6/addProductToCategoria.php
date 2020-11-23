
<?php

include("contrologin.php");
include("funcions.php");

$conn = connectDB('localhost', 'mbalague', 'mbalague', 'mbalague_login2');
$sql = "insert into categoria_producto (categoria_id,producto_id) values (".$_REQUEST["cat"].",".$_REQUEST["prod"].") ";
if (!$resultado = $conn->query($sql)) {
  die("error ejecutando la consulta:".$conn->error);
}

header("location:editproduct.php?idc=".$_REQUEST["prod"]);




?>