<?php
include 'conectar.php';

$codigo = $_POST['codigo'];

$sql = "SELECT * FROM tratamientos WHERE codigo = '$codigo'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    $tratamiento = mysqli_fetch_assoc($result);
    echo json_encode($tratamiento);
} else {
    echo json_encode(null);
}

mysqli_close($con);
?>
