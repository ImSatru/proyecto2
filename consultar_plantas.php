<?php
include 'conectar.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = $_POST['codigo'] ?? null;

    if ($codigo === null) {
        echo json_encode(null);
        exit;
    }

    try {
        $stmt = $pdo->prepare("SELECT * FROM plantas WHERE codigo = :codigo");
        $stmt->execute(['codigo' => $codigo]);
        $planta = $stmt->fetch();

        if ($planta) {
            echo json_encode($planta);
        } else {
            echo json_encode(null); // No encontrada
        }
    } catch (PDOException $e) {
        echo json_encode(["error" => $e->getMessage()]);
    }
} else {
    echo json_encode(["error" => "Método inválido"]);
}
?>
