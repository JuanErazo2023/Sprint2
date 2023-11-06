<?php
include 'menu.php';
include 'conexion.php';
?>

<!-- Formulario -->
<form class="text-center border border-light p-5" action="agregarLI.php" method="POST" enctype="multipart/form-data">

    <p class="h4 mb-4">Agregar Libro</p>

        <!-- Fila -->
    <div class="row">
        <!-- Abre Columna -->
        <div class="col">
            <!-- Titulo -->
            <input type="text" id="titulo" name="titulo" class="form-control mb-4" placeholder="Titulo del libro" required>

            <!-- Autor -->
            <input type="text" id="autor" name="autor" class="form-control mb-4" placeholder="Autor del libro" required>

            <!-- Editorial -->
            <input type="text" id="editorial" name="editorial" class="form-control mb-4" placeholder="Editorial del libro" required>

            <!-- Paginas -->
            <input type="number" id="paginas" name="paginas" class="form-control mb-4" placeholder="Numero de paginas" min="0" required>
        </div>
        <!-- Cierra Columna -->

        <!-- Abre Columna -->
        <div class="col">
            <!-- Seleccionar Archivo -->
            <label class="form-label" for="customFile">Cargar portada del libro</label>
            <input type="file" class="form-control" id="customFile" name="customFile" required />
        </div>
        <!-- Cierra Columna -->
    </div>
    <!-- Cierra fila -->

    <!-- Boton Agregar -->
    <button class="btn btn-dark" type="submit">Agregar Libro</button>

</form>
<!-- Cierra Formulario -->