<?php
include 'conectar.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = $_POST['codigo'] ?? null;
    $nombre = $_POST['nombre'] ?? null;
    $color = $_POST['color'] ?? null;
    $zona = $_POST['zona'] ?? null;
    $fertilizante = $_POST['fertilizante'] ?? null;
    $altura = $_POST['altura'] ?? null;
    $edad = $_POST['edad'] ?? null;

    if ($codigo === null) {
        echo "Código no recibido.";
        exit;
    }

    try {
        $sql = "UPDATE plantas SET
            nombre = :nombre,
            color = :color,
            zona = :zona,
            fertilizante = :fertilizante,
            altura = :altura,
            edad = :edad
        WHERE codigo = :codigo";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nombre' => $nombre,
            ':color' => $color,
            ':zona' => $zona,
            ':fertilizante' => $fertilizante,
            ':altura' => $altura,
            ':edad' => $edad,
            ':codigo' => $codigo
        ]);

        echo "Planta actualizada correctamente";
    } catch (PDOException $e) {
        echo "Error en la actualización: " . $e->getMessage();
    }
} else {
    echo "Solicitud no válida.";
}
?>
