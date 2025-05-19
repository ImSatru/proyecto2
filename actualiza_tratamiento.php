<?php
include 'conectar.php';

$codigo = $_POST['codigo'];
$nombreTratamiento = $_POST['nombre_tratamiento'];
$fechaAplicacion = $_POST['fecha_aplicacion'];
$laboratorio = $_POST['laboratorio'];
$nombreExperto = $_POST['nombre_experto'];

$sql = "UPDATE tratamientos SET 
    nombre_tratamiento = '$nombreTratamiento',
    fecha_aplicacion = '$fechaAplicacion',
    laboratorio = '$laboratorio',
    nombre_experto = '$nombreExperto'
WHERE codigo = '$codigo'";

if (mysqli_query($con, $sql)) {
    echo "Actualización de tratamiento exitosa";
} else {
    echo "Error al actualizar: " . mysqli_error($con);
}

mysqli_close($con);
?>
