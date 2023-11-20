<?php
include 'menu.php';
include 'conexion.php';

// Obtener la consulta de búsqueda del formulario
$busqueda = $_GET["busqueda"];

// Consulta SQL para buscar libros que coincidan con el título, autor o editorial
$sql = "SELECT * FROM libro WHERE Titulo_libro LIKE '%$busqueda%' OR Autor_libro LIKE '%$busqueda%' OR Editorial_libro LIKE '%$busqueda'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="container"><h1>Resultados de la Búsqueda</h1><div class="row">';

    while ($row = $result->fetch_assoc()) {
        echo '<div class="col-md-4"><div class="card mb-4">';
        echo '<img src="' . $row["Portada"] . '" class="card-img-top" alt="Portada del Libro" style="width: 417px; height: 600px; object-fit: cover;">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row["Titulo_libro"] . '</h5>';
        echo '<p class="card-text">Autor: ' . $row["Autor_libro"] . '</p>';
        echo '<p class="card-text">Editorial: ' . $row["Editorial_libro"] . '</p>';
        echo '<p class="card-text">Número de páginas: ' . $row["Numero_paginas"] . '</p>';
        echo '</div></div></div>';
    }

    echo '</div></div>';
} else {
    echo '<div class="container"><h1>No se encontraron resultados para la búsqueda: ' . $busqueda . '</h1></div>';
}

$conn->close();
?>

