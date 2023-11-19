<?php
session_start();
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_id = $_SESSION['usuario_id'];
    $password = $_POST['password'];

    // Verificar la contraseña en la base de datos
    $sql = "SELECT * FROM usuarios WHERE id_usuario = $usuario_id AND contrasena = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Contraseña correcta: Eliminar registros relacionados en historial_libros_visitados
        $sqlDeleteHistorial = "DELETE FROM historial_libros_visitados WHERE id_usuario = $usuario_id";
        $conn->query($sqlDeleteHistorial);

        // Eliminar el perfil del usuario
        $deleteSql = "DELETE FROM usuarios WHERE id_usuario = $usuario_id";
        $conn->query($deleteSql);

        // Cerrar sesión
        session_unset();
        session_destroy();

        // Redireccionar al usuario a la página de inicio o donde desees
        header("Location: index.php");
        exit();
    } else {
        // Contraseña incorrecta: Mostrar alerta en la misma página
        echo '<script>alert("Contraseña incorrecta. Inténtalo de nuevo."); window.history.back();</script>';
        exit(); // Salir del script después de mostrar la alerta
    }
}
?>







