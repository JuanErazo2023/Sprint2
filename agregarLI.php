<?php
include 'conexion.php';

$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$editorial = $_POST['editorial'];
$paginas = $_POST['paginas'];

// Manejo de la imagen
$targetDir = "portadas/"; // Establece la carpeta de destino para las imágenes
$targetFile = $targetDir . basename($_FILES["customFile"]["name"]);

// Verifica si se cargó una imagen
if (!empty($_FILES["customFile"]["name"])) {
    if (move_uploaded_file($_FILES["customFile"]["tmp_name"], $targetFile)) {
        // La imagen se ha cargado con éxito, y $targetFile contiene la ruta de la imagen
    } else {
        echo "Error al cargar la imagen.";
    }
} else {
    echo "Debes cargar una imagen.";
}

// Prepara la consulta SQL para insertar datos en la tabla "libros"
$sql_libro = "INSERT INTO LIBRO (Titulo_libro, Autor_libro, Editorial_libro, Numero_paginas, Portada) VALUES ('$titulo', '$autor', '$editorial', '$paginas', '$targetFile')";

if ($conn->query($sql_libro) === TRUE) {
    // Obtener el ID del último libro insertado
    $id_libro_insertado = $conn->insert_id;

    // Obtener el ID del usuario actual (asumiendo que estás utilizando sesiones)
    session_start();
    $id_usuario_actual = $_SESSION['id_usuario'];

    // Obtener todos los usuarios
    $obtener_usuarios_sql = "SELECT id_usuario FROM usuarios";
    $result_usuarios = $conn->query($obtener_usuarios_sql);

    if ($result_usuarios->num_rows > 0) {
        // Enviar notificación solo a usuarios registrados
        $mensaje_notificacion = "Nuevo libro agregado: $titulo de $autor";

        while ($row_usuario = $result_usuarios->fetch_assoc()) {
            $id_usuario = $row_usuario['id_usuario'];

            // Insertar la notificación solo para el usuario actual
            if ($id_usuario != $id_usuario_actual) {
                $insertar_notificacion_sql = "INSERT INTO Notificaciones_Usuarios (id_usuario, id_libro, mensaje) VALUES ('$id_usuario', '$id_libro_insertado', '$mensaje_notificacion')";

                if ($conn->query($insertar_notificacion_sql) !== TRUE) {
                    echo "Error al insertar la notificación: " . $insertar_notificacion_sql . "<br>" . $conn->error;
                }
            }
        }
    } else {
        echo "No hay usuarios en la base de datos.";
    }

    $result_usuarios->close();
} else {
    echo "Error al agregar el nuevo libro: " . $sql_libro . "<br>" . $conn->error;
}

$conn->close();

$mensaje_exito = "Libro agregado con éxito";
?>

<script>
    // Función para redirigir al formulario
    function redireccionarAFormulario() {
        window.location.href = 'Agregar_libro.php';
    }

    // Función para mostrar la notificación
    window.onload = function () {
        alert("<?php echo $mensaje_exito; ?>");
        redireccionarAFormulario();
    };
</script>



