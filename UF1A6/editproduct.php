
<?php
include("contrologin.php");
include("funcions.php");

$nom = "";
$desc =  "";
$precio =  "";
$id = "";



if($_SERVER['REQUEST_METHOD'] == 'POST') {



    if(!checkProductUser($_SESSION["login"],$_REQUEST["idc"])){
        die("error de seguretat");

    }

    if(isset($_FILES["imagen"])){


        mkdir("imagenes/".getUserID($_SESSION["login"]), 0777);

        $dir_subida = 'imagenes/'.getUserID($_SESSION["login"])."/";
        $fichero_subido = $dir_subida . basename($_FILES['imagen']['name']);


        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $fichero_subido)) {

            addImageToProduct($fichero_subido,$_FILES['imagen']['name'],$_REQUEST["idc"]);

            header("location:editproduct.php?idc=".$_REQUEST["idc"]);

        } else {
            die("problemas subiendo el fichero");
        }
        
    }else{



        updateProduct($_REQUEST["nom"],$_REQUEST["desc"],$_REQUEST["precio"],$_REQUEST["idc"]);
        header("location:privada.php");


    }

}else{




    if(!checkProductUser($_SESSION["login"],$_REQUEST["idc"])){

        die("error de seguretat");

    }else{



            $producto = getProductData($_REQUEST["idc"]);
            $nom = $producto["nom"];
            $desc = $producto["descripcion"];
            $precio = $producto["precio"];
            $id = $producto["id"];



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit product</title>
</head>
<body>

<? if(isset($_REQUEST["msg"])){ echo $_REQUEST["msg"]; }   ?>
<form method="post">
        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom" value="<?=$nom?>"><br>

        <label for="desc">Descripcion:</label>
        <input type="text" name="desc" id="desc"  value="<?=$desc?>"><br>

        <label for="precio">Precio:</label>
        <input type="text" name="precio" id="precio"  value="<?=$precio?>"><br>



        <input type="hidden" name="id" id="id"   value="<?=$id?>"><br>


        <input type="hidden" name="idc" id="id"   value="<?=$_REQUEST["idc"]?>"><br>

        <input type="submit" value="Editar">

        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit product</title>
</head>
<body>

<? if(isset($_REQUEST["msg"])){ echo $_REQUEST["msg"]; }   ?>
<form method="post">
        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom" value="<?=$nom?>"><br>

        <label for="desc">Descripcion:</label>
        <input type="text" name="desc" id="desc"  value="<?=$desc?>"><br>

        <label for="precio">Precio:</label>
        <input type="text" name="precio" id="precio"  value="<?=$precio?>"><br>



        <input type="hidden" name="id" id="id"   value="<?=$id?>"><br>


        <input type="hidden" name="idc" id="id"   value="<?=$_REQUEST["idc"]?>"><br>

        <input type="submit" value="Editar">
        
</form>
<h1>Imagenes del producto</h1>
<form  enctype="multipart/form-data" method="post">
<input type="file" name="imagen" id="">
<input type="hidden" name="idc" id="id"   value="<?=$_REQUEST["idc"]?>"><br>

<br><input type="submit" value="Añadir nueva imagen">
</form>

<?php



 //listar todos los imagenes del producto actual


 $conn = connectDB('localhost', 'mbalague', 'mbalague', 'mbalague_login2');
 $sql = "select * from imagenes where producto_id = ".$_REQUEST["idc"];
 if (!$resultado = $conn->query($sql)) {
   die("error ejecutando la consulta:".$conn->error);
 }




   }


?>

<h1>Añadir categoria al producto</h1>



<?php

$conn = connectDB('localhost', 'javi', 'javi', 'javi_a5');
$sql = "select * from categoria where id not in ( SELECT categoria_id FROM categoria_producto where producto_id=".$_REQUEST["idc"]." )";
if (!$resultado = $conn->query($sql)) {
  die("error ejecutando la consulta:".$conn->error);
}



  while($categoria=$resultado->fetch_assoc()){
    echo "<a  href=\"addProductToCategoria.php?cat=".$categoria["id"]."&prod=".$_REQUEST["idc"]."\">".$categoria["nom"]."</a>| ";


  }


?>




<h1>Categorias del producto</h1>
<?php



 //listar todos los categorias del producto actual


 $conn = connectDB('localhost', 'javi', 'javi', 'javi_a5');
 $sql = "select c.id, c.nom from categoria_producto cp inner join categoria c on c.id=cp.categoria_id where cp.producto_id = ".$_REQUEST["idc"];
 if (!$resultado = $conn->query($sql)) {
   die("error ejecutando la consulta:".$conn->error);
 }



   while($categoria=$resultado->fetch_assoc()){
     echo $categoria["nom"]."<a onclick=\"return confirm('Are you sure?')\" href=\"deletecategoria.php?cat=".$categoria["id"]."&prod=".$_REQUEST["idc"]."\">B</a><br> ";

   }
   

?>

<br>
<a href="privada.php">Tornar</a>


</body>
</html>

<?

}


?>