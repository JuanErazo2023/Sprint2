<?php
// Asegúrate de que la sesión esté iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verifica si el usuario ha iniciado sesión antes de continuar
if (!isset($_SESSION['usuario_id'])) {
    // Redirige al usuario si no ha iniciado sesión
    header('Location: iniciarForm.php');
    exit();
}

// Incluye el archivo de conexión a la base de datos
include 'conexion.php';

// Obtiene el ID de usuario de la sesión
$id_usuario = $_SESSION['usuario_id'];

// Consulta SQL para obtener el historial de libros del usuario
$sql = "SELECT libro.Titulo_libro, libro.Portada
        FROM historial_libros_visitados
        JOIN libro ON historial_libros_visitados.id_libro = libro.ID_libro
        WHERE historial_libros_visitados.id_usuario = ?
        ORDER BY historial_libros_visitados.fecha_visita DESC";  // Ordenar por fecha de visita, mostrando los libros más recientes primero


// Prepara la consulta
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id_usuario);

// Ejecuta la consulta
$stmt->execute();

// Obtiene los resultados
$result = $stmt->get_result();
$historialLibros = $result->fetch_all(MYSQLI_ASSOC);

// Cierra la conexión
$conn->close();
?>

<!-- HTML y presentación de la información -->
<div class="container mt-4">
    <h1>Historial de Libros</h1>

    <div class="row row-cols-1 row-cols-md-3 flex-nowrap overflow-auto"> <!-- Añade las clases flex-nowrap y overflow-auto -->
        <?php foreach ($historialLibros as $libro): ?>
            <div class="col">
                <div class="card h-100 mb-2" style="max-width: 200px;"> <!-- Ajusta el valor de mb-2 según sea necesario -->
                    <img src="<?php echo $libro['Portada']; ?>" alt="Portada del libro <?php echo $libro['Titulo_libro']; ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $libro['Titulo_libro']; ?></h5>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
