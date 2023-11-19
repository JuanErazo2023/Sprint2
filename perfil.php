<?php
include 'menu.php';
include 'conexion.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <style>
        .img-container {
            position: relative;
            width: 350px; /* Ajusta el ancho del contenedor según tus preferencias */
            height: 350px; /* Ajusta la altura del contenedor según tus preferencias */
            overflow: hidden;
            border-radius: 50%; /* Hace la imagen redonda */
            margin-right: 20px; /* Ajusta el margen derecho según tus preferencias */
        }

        .img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ajusta el comportamiento de ajuste según tus preferencias */
            border: 2px solid black; /* Ajusta el grosor del borde según tus preferencias */
            border-radius: 50%; /* Asegura que la imagen sea redonda */
            cursor: pointer; /* Cambia el cursor al pasar sobre la imagen */
        }

        .user-info {
            margin-top: 10px; /* Ajusta el margen superior según tus preferencias */
        }

        .user-info h2,
        .user-info p,
        .user-info button {
            margin-bottom: 5px; /* Ajusta el margen inferior según tus preferencias */
        }
    </style>
</head>

<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <!-- Imagen de perfil con marco negro y funcionalidad de cambio -->
            <div class="img-container" id="upload-container">
                <?php
                // Obtener la ruta de la imagen de perfil desde la base de datos
                $usuario_id = $_SESSION['usuario_id'];

                $sql = "SELECT foto FROM usuarios WHERE id_usuario = $usuario_id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $ruta_imagen = $row['foto'];

                    // Mostrar la imagen de perfil
                    echo "<img src='$ruta_imagen' alt='Imagen de perfil' class='img-fluid rounded-circle' id='profile-image'>";
                }
                ?>
            </div>
        </div>
        <div class="col-md-8 user-info">
            <?php
                // Verificar si la sesión está activa antes de mostrar la información
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }

                // Verificar si las variables de sesión existen antes de mostrarlas
                $nombreUsuario = isset($_SESSION['usuario_nombre']) ? $_SESSION['usuario_nombre'] : '';
                $correoOTelefono = isset($_SESSION['correo_telefono']) ? $_SESSION['correo_telefono'] : '';
            ?>
            <!-- Nombre de usuario -->
            <h2><?php echo htmlspecialchars($nombreUsuario); ?></h2>
            <!-- Texto "Correo electrónico o correo" -->
            <p>Correo electrónico o teléfono:</p>
            <!-- Correo o teléfono -->
            <p><?php echo htmlspecialchars($correoOTelefono); ?></p>
            <!-- Botones -->
            <a href="modificarPer.php" class="btn btn-outline-primary btn-rounded">Modificar Perfil</a>
            <button class="btn btn-outline-danger btn-rounded" data-toggle="modal" data-target="#ventanaEliminarPerfil">Eliminar Perfil</button>
            <!-- No necesitas un botón aquí para cargar la imagen, ya que lo harás haciendo clic en la imagen de perfil -->
        </div>
    </div>
</div>

<!-- Modal para eliminar perfil -->
<div class="modal fade" id="ventanaEliminarPerfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Perfil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que deseas eliminar tu perfil?</p>
                <form id="eliminarPerfilForm" method="post" action="eliminarPer.php">
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-danger">Eliminar Perfil</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'historial.php'; ?>

</body>
