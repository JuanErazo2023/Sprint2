<?php
include 'conexion.php';

$nombre = $_POST['nombre'];
$correotel = $_POST['correotel'];
$contra = $_POST['contra'];

$sql = "INSERT INTO usuarios (nombre, email_telefono, contrasena, fecha_registro) 
        VALUES ('$nombre', '$correotel', '$contra', NOW())";

if ($conn->query($sql) === TRUE) {
    // Recuperar el usuario_id después del registro
    $usuario_id = $conn->insert_id;

    // Iniciar sesión
    session_start();
    $_SESSION['usuario_id'] = $usuario_id; // Guarda el usuario_id en la sesión
    $_SESSION['usuario_nombre'] = $nombre; // Guarda el nombre de usuario en la sesión
    $_SESSION['correo_telefono'] = $correotel; // Guarda el correo o teléfono en la sesión

    echo "Nuevo registro creado correctamente";

    // Redirige al usuario a la página que desees después del registro
    header('Location: index.php');
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

