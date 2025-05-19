<?php
include 'conectar.php'; // ya tiene $pdo

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = $_POST['codigo'] ?? '';
    $nombre = $_POST['nombre'] ?? '';
    $color = $_POST['color'] ?? '';
    $zona = $_POST['zona'] ?? '';
    $fertilizante = $_POST['fertilizante'] ?? '';
    $altura = $_POST['altura'] ?? 0;
    $edad = $_POST['edad'] ?? 0;

    $sql = "INSERT INTO plantas (codigo, nombre, color, zona, fertilizante, altura, edad) 
            VALUES (:codigo, :nombre, :color, :zona, :fertilizante, :altura, :edad)";

    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([
            ':codigo' => $codigo,
            ':nombre' => $nombre,
            ':color' => $color,
            ':zona' => $zona,
            ':fertilizante' => $fertilizante,
            ':altura' => $altura,
            ':edad' => $edad
        ]);
        echo "Registro de planta exitoso";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Por favor, envía el formulario.";
}
?>