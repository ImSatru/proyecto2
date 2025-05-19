<?php
include 'conectar.php';

$sql = "SELECT * FROM plantas";
$result = mysqli_query($con, $sql);

$datos = array();

while ($fila = mysqli_fetch_assoc($result)) {
    $datos[] = $fila;
}

echo json_encode($datos);
mysqli_close($con);
?>
