<?php
include 'menu.php';
include 'conexion.php';

// Consulta para obtener los datos de los libros
$sql = "SELECT * FROM libro";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="container"><h1>Catálogo de Libros</h1><div class="row">';

    while ($row = $result->fetch_assoc()) {
        // Configura el modal para cada libro
        echo '<div class="col-md-4">';
        echo '<div class="card mb-4" data-libro-id="' . $row["ID_libro"] . '">';
        echo '<img src="' . $row["Portada"] . '" class="card-img-top" alt="Portada del Libro" style="width: 417px; height: 600px; object-fit: cover;" data-toggle="modal" data-target="#modalLibro' . $row["ID_libro"] . '">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row["Titulo_libro"] . '</h5>';
        echo '<p class="card-text">Autor: ' . $row["Autor_libro"] . '</p>';
        echo '<p class="card-text">Editorial: ' . $row["Editorial_libro"] . '</p>';
        echo '<p class="card-text">Número de páginas: ' . $row["Numero_paginas"] . '</p>';
        echo '</div></div></div>';

        // Modal para mostrar información detallada
        echo '<div class="modal fade" id="modalLibro' . $row["ID_libro"] . '" tabindex="-1" role="dialog" aria-labelledby="modalLibroLabel' . $row["ID_libro"] . '" aria-hidden="true">';
        echo '<div class="modal-dialog modal-lg" role="document">';
        echo '<div class="modal-content">';
        echo '<div class="modal-header">';
        echo '<h5 class="modal-title" id="modalLibroLabel' . $row["ID_libro"] . '">' . $row["Titulo_libro"] . '</h5>';
        echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span>';
        echo '</button>';
        echo '</div>';
        echo '<div class="modal-body">';
        echo '<img src="' . $row["Portada"] . '" class="img-fluid" alt="Portada del Libro" style="max-width: 300px; max-height: 400px;">'; // Ajusta los valores según tus preferencias
        echo '<p>Autor: ' . $row["Autor_libro"] . '</p>';
        echo '<p>Editorial: ' . $row["Editorial_libro"] . '</p>';
        echo '<p>Número de páginas: ' . $row["Numero_paginas"] . '</p>';
        echo '</div>';
        echo '<div class="modal-footer">';
        echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>';
        echo '<button type="button" class="btn btn-primary">Actualizar información</button>'; // Puedes ajustar este botón según tus necesidades
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

    echo '</div></div>';
} else {
    echo "No se encontraron libros en la base de datos.";
}

// Cierra la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Libros</title>

    <!-- Agrega el bloque de código JavaScript jQuery y AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".card").on("click", function() {
                var libroID = $(this).data("libro-id");
                
                // Realiza una solicitud AJAX para agregar el libro al historial (ajusta la URL según tu configuración)
                $.ajax({
                    type: "POST",
                    url: "agregar_al_historial.php", // Reemplaza con la ruta correcta a tu script PHP
                    data: { libroID: libroID },
                    success: function(response) {
                        console.log(response); // Puedes manejar la respuesta del servidor aquí (por ejemplo, mostrar un mensaje al usuario)
                    },
                    error: function(error) {
                        console.error("Error en la solicitud AJAX: " + error);
                    }
                });
            });
        });
    </script>
    <!-- Agrega otros elementos en la sección head si es necesario -->
</head>
<body>

<!-- Resto de tu código -->

<!-- Agrega el script de Bootstrap al final del cuerpo para un rendimiento óptimo -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>




