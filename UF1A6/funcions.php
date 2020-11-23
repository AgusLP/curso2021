<?php


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function connectDB($server,$user,$pass,$db){
    $conn = new mysqli($server,$user,$pass,$db);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}


function isAdmin($email){


  $admin=false;
  $conn = connectDB('localhost', 'mbalague', 'mbalague', 'mbalague_login2');
  $sql = "select * from usuaris where email='$email'  and rols_id=1 ";
  if (!$resultado = $conn->query($sql)) {
    die("error ejecutando la consulta:".$conn->error);
  }
  if ($resultado->num_rows == 1) {
    $admin=true;

  }

  return $admin;

}

function checkProductUser($email,$idproducto){
    
$retorno=false;



$conn = connectDB('localhost', 'mbalague', 'mbalague', 'mbalague_login2');
$sql = "select * from productos  where id=".$idproducto."   and usuario_id=".getUserID($email);
if (!$resultado = $conn->query($sql)) {
  die("error ejecutando la consulta:".$conn->error);
}
if ($resultado->num_rows == 1) {


  $retorno=true;


}

return $retorno;

}




function getUserID($email){

  $usuari["id"]=0;
  $conn = connectDB('localhost', 'mbalague', 'mbalague', 'mbalague_login2');
  $sql = "select * from usuaris where email='$email'  ";
  if (!$resultado = $conn->query($sql)) {
    die("error ejecutando la consulta:".$conn->error);
  }
  if ($resultado->num_rows == 1) {


    $usuari = $resultado->fetch_assoc();


  }
  return $usuari["id"];

}

function getUserData($email){

  $usuari;
  $conn = connectDB('localhost', 'mbalague', 'mbalague', 'mbalague_login2');
  $sql = "select * from usuaris where email='$email'  ";
  if (!$resultado = $conn->query($sql)) {
    die("error ejecutando la consulta:".$conn->error);
  }
  if ($resultado->num_rows == 1) {


    $usuari = $resultado->fetch_assoc();


  }
  return $usuari["id"];

}




function getProductData($id){

  $producto;
  $conn = connectDB('localhost', 'mbalague', 'mbalague', 'mbalague_login2');
  $sql = "select * from productos where id=$id  ";
  if (!$resultado = $conn->query($sql)) {
    die("error ejecutando la consulta:".$conn->error);
  }
  if ($resultado->num_rows == 1) {


    $producto = $resultado->fetch_assoc();

}

return $producto;

}




function generate_string( $strength = 16) {
   $input = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

  $input_length = strlen($input);
  $random_string = '';
  for($i = 0; $i < $strength; $i++) {
      $random_character = $input[mt_rand(0, $input_length - 1)];
      $random_string .= $random_character;
  }

  return $random_string;
}




function userExists($email){

  $exists=false;
  $conn = connectDB('localhost', 'mbalague', 'mbalague', 'mbalague_login2');
  $sql = "select * from usuaris where email='$email'  ";
  if (!$resultado = $conn->query($sql)) {
    die("error ejecutando la consulta:".$conn->error);
  }
  if ($resultado->num_rows == 1) {


    $exists=true;


  }
  return $exists;

}



function deleteProductCategory($cat,$prod){



  $conn = connectDB('localhost', 'mbalague', 'mbalague', 'mbalague_login2');
  $sql = "delete from categoria_producto where producto_id=$prod and categoria_id=$cat ";
  if (!$conn->query($sql)) {
    die("error ejecutando la consulta:".$conn->error);
  }

  //borrar la imagen de disco
  return true;
  




}

function deleteImage($id,$ruta){



  $conn = connectDB('localhost', 'mbalague', 'mbalague', 'mbalague_login2');
  $sql = "delete from imagenes where id=$id ";
  if (!$conn->query($sql)) {
    die("error ejecutando la consulta:".$conn->error);
  }

  unlink($ruta);


  //borrar la imagen de disco
  return true;





}

function deleteProduct($id){



  $conn = connectDB('localhost', 'mbalague', 'mbalague', 'mbalague_login2');
  $sql = "delete from productos where id=$id ";
  if (!$conn->query($sql)) {
    die("error ejecutando la consulta:".$conn->error);
  }
  return true;


}

function deleteUser($id){



  $conn = connectDB('localhost', 'mbalague', 'mbalague', 'mbalague_login2');
  $sql = "delete from usuaris where id=$id ";
  if (!$conn->query($sql)) {
    die("error ejecutando la consulta:".$conn->error);
  }
  return true;



}

function updatePasswordUser($email,$password){
    


  $conn = connectDB('localhost', 'mbalague', 'mbalague', 'mbalague_login2');
  $sql = "update usuaris set password=md5('$password') where email='$email' ";
  if (!$conn->query($sql)) {
    die("error ejecutando la consulta:".$conn->error);
  }
  return true;



}


function updateProduct($nom,$desc,$precio,$id){



  $conn = connectDB('localhost', 'mbalague', 'mbalague', 'mbalague_login2');
  $sql = "update productos set nom='$nom',descripcion='$desc',precio=$precio where id=$id ";
  if (!$conn->query($sql)) {
    die("error ejecutando la consulta:".$conn->error);
  }
  return true;



}


function updateUser($nom,$email,$password,$id){



  $conn = connectDB('localhost', 'mbalague', 'mbalague', 'mbalague_login2');
  $sql = "update usuaris set nom='$nom',email='$email',password=md5('$password') where id=$id ";
  if (!$conn->query($sql)) {
    die("error ejecutando la consulta:".$conn->error);
  }
  return true;
  


}

function addImageToProduct($ruta,$nom,$idproducto){



  $conn = connectDB('localhost', 'mbalague', 'mbalague', 'mbalague_login2');
  $sql = "insert into imagenes (nom,ruta,producto_id) values ('$nom','$ruta',$idproducto) ";
  if (!$conn->query($sql)) {
    die("error ejecutando la consulta:".$conn->error);
  }
  return true;



}

function addProduct($nom,$desc,$precio){



    $conn = connectDB('localhost', 'mbalague', 'mbalague', 'mbalague_login2');
    $sql = "insert into productos (nom,descripcion,precio,usuario_id) values ('$nom','$desc',$precio,".getUserID($_SESSION["login"]).")  ";
    if (!$conn->query($sql)) {
      die("error ejecutando la consulta:".$conn->error);
    }
    return true;
  
  
  
  }
  
  function addUser($nom,$email,$password){
  
  
  
    $conn = connectDB('localhost', 'mbalague', 'mbalague', 'mbalague_login2');
    $sql = "insert into usuaris (email,password,nom) values ('$email',md5('$password'),'$nom')  ";
    if (!$conn->query($sql)) {
      die("error ejecutando la consulta:".$conn->error);
    }
    return true;
  
  
  
  }
  /**
   * return true si email existeix
   * return false si email no existeix
   */
  function checkIfEmailExists($email){
  
  
    $resultat=false;
    $conn = connectDB('localhost', 'mbalague', 'mbalague', 'mbalague_login2');
    $sql = "select * from usuaris where email='$email'  ";
    if (!$resultado = $conn->query($sql)) {
        die("error ejecutando la consulta:".$conn->error);
    }
    if ($resultado->num_rows == 1) {
      $resultat=true;
    }
  
    return $resultat;
  
  
  }
  /**
   *
   * return true usuari i pasword correcte
   * return false cas contrari
   */
  function validaUsuari($email,$password){
  
      $resultat=false;
      $conn = connectDB('localhost', 'mbalague', 'mbalague', 'mbalague_login2');
      $sql = "select * from usuaris where email='$email' and password='$password' ";
      if (!$resultado = $conn->query($sql)) {
        die("error ejecutando la consulta:".$conn->error);
      }
      if ($resultado->num_rows == 1) {
        $resultat=true;
      }
  
      return $resultat;
  
  }
  
  ?>