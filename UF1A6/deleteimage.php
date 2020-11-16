
<?php

include("contrologin.php");
include("funcions.php");

//deberiamos comprobar que la imagen es del usuario.
if(true){

    deleteImage($_REQUEST["id"],$_REQUEST["ruta"]);
    header("location:editproduct.php?idc=".$_REQUEST["idc"]);

}else{
    die("error de seguretat...");
}





?>