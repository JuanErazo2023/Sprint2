<!-- actualizarPerfil.php -->
<?php
include 'conexion.php';
session_start();

// Inicializar la variable de mensaje
$mensaje = "";

// Verificar si el formulario se ha enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el nuevo nombre del formulario
    $nuevoNombre = $_POST['nuevoNombre'];

    // Verificar si se ha subido una nueva imagen
    if (isset($_FILES['nuevaImagen']) && $_FILES['nuevaImagen']['error'] === UPLOAD_ERR_OK) {
        // Ruta donde se guardará la nueva imagen en la carpeta "fotosAct"
        $directorioDestino = 'fotosAct/';
        $nombreArchivo = $_FILES['nuevaImagen']['name'];
        $rutaCompleta = $directorioDestino . $nombreArchivo;

        // Mover la nueva imagen al directorio de destino
        move_uploaded_file($_FILES['nuevaImagen']['tmp_name'], $rutaCompleta);

        // Actualizar la ruta de la imagen en la base de datos
        $usuario_id = $_SESSION['usuario_id'];
        $sql = "UPDATE usuarios SET foto = '$rutaCompleta' WHERE id_usuario = $usuario_id";
        $conn->query($sql);

        $mensaje = "Perfil actualizado correctamente";
    }

    // Actualizar el nombre en la base de datos
    $usuario_id = $_SESSION['usuario_id'];
    $sql = "UPDATE usuarios SET nombre = '$nuevoNombre' WHERE id_usuario = $usuario_id";
    $conn->query($sql);

    // Actualizar la variable de sesión con el nuevo nombre
    $_SESSION['usuario_nombre'] = $nuevoNombre;

    $mensaje = "Perfil actualizado correctamente";
}

// Redirigir de nuevo al perfil después de la actualización
header("Location: perfil.php?mensaje=" . urlencode($mensaje));
exit();
?>


