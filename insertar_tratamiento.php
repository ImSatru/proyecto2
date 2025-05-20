<?php
include 'conectar.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = $_POST['codigo'] ?? '';
    $nombre = $_POST['nombre_tratamiento'] ?? '';
    $fecha = $_POST['fecha_aplicacion'] ?? '';
    $laboratorio = $_POST['laboratorio'] ?? '';
    $experto = $_POST['nombre_experto'] ?? '';

    $sql = "INSERT INTO tratamientos (codigo, nombre_tratamiento, fecha_aplicacion, laboratorio, nombre_experto)
            VALUES (:codigo, :nombre, :fecha, :laboratorio, :experto)";
    
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([
            ':codigo' => $codigo,
            ':nombre' => $nombre,
            ':fecha' => $fecha,
            ':laboratorio' => $laboratorio,
            ':experto' => $experto
        ]);
        echo "Tratamiento registrado exitosamente";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Solicitud no válida.";
}
?>
