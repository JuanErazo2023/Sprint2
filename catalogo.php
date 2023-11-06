<?php
include 'menu.php';
include 'conexion.php';

// Consulta para obtener los datos de los libros
$sql = "SELECT * FROM libro";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="container"><h1>Catálogo de Libros</h1><div class="row">';

    while ($row = $result->fetch_assoc()) {
        echo '<div class="col-md-4"><div class="card mb-4">';
        echo '<img src="' . $row["Portada"] . '" class="card-img-top" alt="Portada del Libro" style="width: 417px; height: 600px; object-fit: cover;">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row["Titulo_libro"] . '</h5>';
        echo '<p class="card-text">Autor: ' . $row["Autor_libro"] . '</p>';
        echo '<p class="card-text">Editorial: ' . $row["Editorial_libro"] . '</p>';
        echo '<p class="card-text">Numero de paginas: ' . $row["Numero_paginas"] . '</p>';
        echo '</div></div></div>';
    }

    echo '</div></div>';
} else {
    echo "No se encontraron libros en la base de datos.";
}

$conn->close();
?>

