<?php
// Asegúrate de que la sesión esté iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verifica si el usuario ha iniciado sesión antes de continuar
if (!isset($_SESSION['usuario_id'])) {
    echo "Error: El usuario no ha iniciado sesión.";
    exit();
}

// Incluye el archivo de conexión a la base de datos
include 'conexion.php';

// Obtiene el ID de usuario de la sesión
$id_usuario = $_SESSION['usuario_id'];

// Obtiene el ID del libro enviado por la solicitud AJAX
$id_libro = isset($_POST['libroID']) ? $_POST['libroID'] : null;

// Verifica si el ID del libro es válido
if ($id_libro) {
    // Consulta SQL para agregar el libro al historial
    $sql = "INSERT INTO historial_libros_visitados (id_usuario, id_libro) VALUES (?, ?)";

    // Prepara la consulta
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $id_usuario, $id_libro);

    // Ejecuta la consulta
    $stmt->execute();

    // Puedes enviar una respuesta al cliente, por ejemplo, "Libro agregado al historial"
    echo "Libro agregado al historial con éxito.";
} else {
    echo "Error: ID de libro no válido.";
}

// Cierra la conexión
$conn->close();
?>



