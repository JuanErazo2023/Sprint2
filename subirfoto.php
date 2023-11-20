<?php
include 'conexion.php';

// Verificar si se ha enviado un archivo
if (isset($_FILES["file"])) {
    $target_dir = "fotos/";  // Directorio donde se almacenarán las imágenes
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Verificar si el archivo es una imagen real
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if ($check !== false) {
        // Permitir solo ciertos formatos de imagen (puedes ajustar según tus necesidades)
        if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif") {
            echo "<script>
                    alert('Solo se permiten archivos JPG, JPEG, PNG y GIF.');
                    window.location.href = 'perfil.php';
                  </script>";
            $uploadOk = 0;
        }

        // Verificar si $uploadOk está establecido en 0 por algún error
        if ($uploadOk == 0) {
            echo "<script>
                    alert('Hubo un error al subir tu archivo.');
                    window.location.href = 'perfil.php';
                  </script>";
        } else {
            // Si todo está bien, intenta subir el archivo
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                // Actualizar la ruta de la imagen en la base de datos
                $ruta_imagen_nueva = $target_file;

                // Verificar si la sesión está activa antes de actualizar la base de datos
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }

                // Obtener el usuario_id de la sesión
                $usuario_id = $_SESSION['usuario_id'];

                // Actualizar la base de datos con la nueva ruta de la imagen
                $sql_update = "UPDATE usuarios SET foto = '$ruta_imagen_nueva' WHERE id_usuario = $usuario_id";

                if ($conn->query($sql_update) === TRUE) {
                    // Mostrar una alerta con botón "Aceptar"
                    echo "<script>
                            alert('La base de datos ha sido actualizada correctamente.');
                            window.location.href = 'perfil.php';
                          </script>";
                } else {
                    echo "<script>
                            alert('Error al actualizar la base de datos: " . $conn->error . "');
                            window.location.href = 'perfil.php';
                          </script>";
                }
            } else {
                echo "<script>
                        alert('Error en la conexión a la base de datos.');
                        window.location.href = 'perfil.php';
                      </script>";
            }
        }
    } else {
        echo "<script>
                alert('El archivo no es una imagen válida.');
                window.location.href = 'perfil.php';
              </script>";
    }
} else {
    echo "<script>
            alert('Lo siento, se ha producido un error al cargar el archivo.');
            window.location.href = 'perfil.php';
          </script>";
}

$conn->close();
?>



