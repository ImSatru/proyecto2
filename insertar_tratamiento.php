<?php
include 'conectar.php';

$codigo = $_POST['codigo'];
$nombreTratamiento = $_POST['nombre_tratamiento'];
$fechaAplicacion = $_POST['fecha_aplicacion'];
$laboratorio = $_POST['laboratorio'];
$nombreExperto = $_POST['nombre_experto'];

$sql = "INSERT INTO tratamientos (codigo, nombre_tratamiento, fecha_aplicacion, laboratorio, nombre_experto)
VALUES ('$codigo', '$nombreTratamiento', '$fechaAplicacion', '$laboratorio', '$nombreExperto')";

if (mysqli_query($con, $sql)) {
    echo "Registro de tratamiento exitoso";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

mysqli_close($con);
?>
