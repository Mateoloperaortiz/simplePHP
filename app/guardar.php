<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);

    if (!empty($nombre)) {
        $stmt = $conn->prepare("INSERT INTO usuarios (nombre) VALUES (?)");
        $stmt->bind_param("s", $nombre);

        if ($stmt->execute()) {
            echo "<h1>¡Nombre guardado correctamente!</h1>";
            echo "<a href='index.html'>Volver al formulario</a>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "El nombre no puede estar vacío.";
    }
}

$conn->close();
?>