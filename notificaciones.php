<?php
include 'conexion.php';

// Consulta SQL para obtener las notificaciones no leídas (ajusta según tu estructura de base de datos)
$sql = "SELECT * FROM Notificaciones_Usuarios WHERE leida = 0 ORDER BY fecha DESC LIMIT 5"; // Limita a las últimas 5 notificaciones

$resultado = $conn->query($sql);

$notificaciones = array();

if ($resultado) {
    while ($row = $resultado->fetch_assoc()) {
        $notificaciones[] = array(
            'mensaje' => $row['mensaje'],
            'fecha' => $row['fecha']
            // Puedes agregar más campos según sea necesario
        );
    }
} else {
    echo "Error al ejecutar la consulta: " . $conn->error;
}

// Devolver las notificaciones como un objeto JSON
echo json_encode($notificaciones);

$conn->close();
?>

