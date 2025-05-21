<?php
include 'conectar.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = $_POST['codigo'] ?? null;
    $nombre = $_POST['nombre_tratamiento'] ?? null;
    $fecha = $_POST['fecha_aplicacion'] ?? null;
    $laboratorio = $_POST['laboratorio'] ?? null;
    $experto = $_POST['nombre_experto'] ?? null;

    if ($codigo === null) {
        echo "Error: Código no recibido.";
        exit;
    }

    try {
        $sql = "UPDATE tratamientos SET
                    nombre_tratamiento = :nombre,
                    fecha_aplicacion = :fecha,
                    laboratorio = :laboratorio,
                    nombre_experto = :experto
                WHERE codigo = :codigo";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nombre' => $nombre,
            ':fecha' => $fecha,
            ':laboratorio' => $laboratorio,
            ':experto' => $experto,
            ':codigo' => $codigo
        ]);

        echo "Tratamiento actualizado correctamente";
    } catch (PDOException $e) {
        echo "Error al actualizar: " . $e->getMessage();
    }
} else {
    echo "Método no permitido";
}
?>
