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
            <label for="libro_pre" class="form-label">Selecciona un libro:</label>
            <select class="form-select" name="libro_pre" id="libro_pre" required>
                <?php
                    include 'conexion.php';
                    $sql = "SELECT ID_libro, Titulo_libro FROM libro";
                    $result = $conn->query($sql);

                    // Llena la lista desplegable con los nombres de los libros
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['ID_libro'] . "'>" . $row['Titulo_libro'] . "</option>";
                    }
                ?>
            </select>

            <!-- fecha -->
            <br><label class="text" for="fecha_pre">Fecha de prestamo</label>
            <input type="date" id="fecha_pre" name="fecha_pre" class="form-control mb-4" placeholder="Editorial del libro" required>

            <br><label class="text" for="fecha_dev">Fecha de devolucion</label>
            <input type="date" id="fecha_dev" name="fecha_dev" class="form-control mb-4" placeholder="Editorial del libro" required>

        </div>
        <!-- Cierra Columna -->
    </div>
    <!-- Cierra Fila -->

    <!-- Boton Registrar -->
    <button class="btn btn-dark" type="submit">Registrar Prestamo</button>

</form>
