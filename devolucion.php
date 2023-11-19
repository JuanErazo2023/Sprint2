<?php
include 'menu.php';
include 'conexion.php';
?>

<form class="text-center border border-light p-5" action="devinfo.php" method="POST">

    <p class="h4 mb-4">Registrar Devolución</p>

    <!-- Fila -->
    <div class="row">
        <!-- Abre Columna -->
        <div class="col">

            <!-- Codigo de reserva -->
            <label for="code_re" class="form-label">Número de prestamo:</label>
            <input type="text" id="code_re" name="code_re" class="form-control mb-4" placeholder="Número de reserva" required>

        </div>
        <!-- Cierra Columna -->
    </div>
    <!-- Cierra fila -->

    <!-- Boton Ver Reserva -->
    <button class="btn btn-dark" type="submit">Ver reserva</button>

</form>
