<?php
include 'menu.php';
include 'conexion.php';
?>

<form class="text-center border border-light p-5" action="registrarPre.php" method="POST">

    <p class="h4 mb-4">Registrar Prestamo</p>

        <!-- Fila -->
    <div class="row">
        <!-- Abre Columna -->
        <div class="col">
                <!-- nombre -->
            <input type="text" id="nombre_pre" name="nombre_pre" class="form-control mb-4" placeholder="Nombre del cliente" required>

            <!-- cedula -->
            <input type="number" id="cedula_pre" name="cedula_pre" class="form-control mb-4" placeholder="Cedula del cliente" min="0" required>

            <!-- titulo -->
            <input type="text" id="titulo_pre" name="titulo_pre" class="form-control mb-4" placeholder="Titulo del libro" required>

            <!-- editorial -->
            <input type="text" id="editorial_pre" name="editorial_pre" class="form-control mb-4" placeholder="Editorial del libro" required>

            <!-- fecha -->
            <label class="text" for="fecha_pre">Tiempo de prestamo</label>
            <input type="date" id="fecha_pre" name="fecha_pre" class="form-control mb-4" placeholder="Editorial del libro" required>

        </div>
        <!-- Cierra Columna -->
    </div>
    <!-- Cierra Fila -->

    <!-- Boton Registrar -->
    <button class="btn btn-dark" type="submit">Registrar Prestamo</button>

</form>