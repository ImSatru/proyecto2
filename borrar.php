<?php
include 'conectar.php';
$correo=$_GET['correo'];


#prepare la instrucción de guardado
$sql = "DELETE from usuario where coreo=?";

$comando= $pdo->prepare($sql);
$comando->execute([$correo]);


?>
