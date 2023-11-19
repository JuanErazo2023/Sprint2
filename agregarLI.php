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
$sql = "INSERT INTO LIBRO (Titulo_libro, Autor_libro, Editorial_libro, Numero_paginas, Portada) VALUES ('$titulo', '$autor', '$editorial', '$paginas', '$targetFile')";


if ($conn->query($sql) === TRUE) {
    echo "Nuevo registro creado correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
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
        window.onload = function() {
            alert("<?php echo $mensaje_exito; ?>");
            redireccionarAFormulario();
        };
</script>