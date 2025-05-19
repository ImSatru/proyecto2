<?php
include 'conectar.php';

$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$color = $_POST['color'];
$zona = $_POST['zona'];
$fertilizante = $_POST['fertilizante'];
$altura = $_POST['altura'];
$edad = $_POST['edad'];

$sql = "UPDATE plantas SET 
    nombre = '$nombre',
    color = '$color',
    zona = '$zona',
    fertilizante = '$fertilizante',
    altura = '$altura',
    edad = '$edad'
WHERE codigo = '$codigo'";

if (mysqli_query($con, $sql)) {
    echo "Actualización de planta exitosa";
} else {
    echo "Error al actualizar: " . mysqli_error($con);
}

mysqli_close($con);
?>
