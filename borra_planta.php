<?php
include 'conectar.php';

$codigo = $_POST['codigo'];

$sql = "DELETE FROM plantas WHERE codigo = '$codigo'";

if (mysqli_query($con, $sql)) {
    echo "Planta eliminada correctamente";
} else {
    echo "Error al eliminar: " . mysqli_error($con);
}

mysqli_close($con);
?>
