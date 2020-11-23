
<?php

include("contrologin.php");
include("funcions.php");

if($_SESSION["login"]=="marc@gmail.com"){

    deleteUser($_REQUEST["id"]);
    header("location:privada.php");

}else{
    die("error de seguretat...");
}





?>
