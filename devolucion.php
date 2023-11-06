<?php
include 'menu.php';
include 'conexion.php';
?>

<form class="text-center border border-light p-5" action="registrarDev.php" method="POST">

    <p class="h4 mb-4">Registrar Devolucion</p>

        <!-- Fila -->
    <div class="row">
        <!-- Abre Columna -->
        <div class="col">
            <!-- nombre -->
            <input type="text" id="nombre_dev" name="nombre_dev" class="form-control mb-4" placeholder="Nombre del cliente" required>

            <!-- cedula -->
            <input type="number" id="cedula_dev" name="cedula_dev" class="form-control mb-4" placeholder="Cedula del cliente" min="0" required>

            <!-- titulo -->
            <input type="text" id="titulo_dev" name="titulo_dev" class="form-control mb-4" placeholder="Titulo del libro" required>

            <!-- editorial -->
            <input type="text" id="editorial_dev" name="editorial_dev" class="form-control mb-4" placeholder="Editorial del libro" required> 

            <!-- fecha -->
            <label class="text" for="fecha_dev">Fecha de devolucion</label>
            <input type="date" id="fecha_dev" name="fecha_dev" class="form-control mb-4" placeholder="Editorial del libro" required>

        </div>
        <!-- Cierra Columna -->
    </div>
    <!-- Cierra fila -->

    <!-- Boton Registrar -->
    <button class="btn btn-dark" type="submit">Registrar Devolucion</button>

</form>