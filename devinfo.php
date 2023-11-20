<?php
include 'menu.php';
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén el número de reserva ingresado
    $numero_reserva = $_POST['code_re'];

    // Consulta para obtener la información del préstamo
    $sql = "SELECT ID_pre, Nombre_cliente, Cedula_cliente, Titulo_libro, libro_id, Fecha_pre, Fecha_dev, Estado
            FROM PRESTAMOS
            WHERE ID_pre = '$numero_reserva'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Muestra un nuevo formulario con la información obtenida
        $row = $result->fetch_assoc();
?>
        <form class="text-center border border-light p-5" action="procesarDevolucion.php" method="POST">
            <p class="h4 mb-4">Información de Reserva</p>

            <!-- Mostrar la información obtenida en el nuevo formulario -->
            <label for="id_pre" class="form-label">ID de Reserva:</label>
            <input type="text" id="id_pre" name="id_pre" class="form-control mb-4" value="<?php echo $row['ID_pre']; ?>" readonly>

            <label for="nombre_cliente" class="form-label">Nombre del cliente:</label>
            <input type="text" id="nombre_cliente" name="nombre_cliente" class="form-control mb-4" value="<?php echo $row['Nombre_cliente']; ?>" readonly>

            <label for="cedula_cliente" class="form-label">Cédula del cliente:</label>
            <input type="text" id="cedula_cliente" name="cedula_cliente" class="form-control mb-4" value="<?php echo $row['Cedula_cliente']; ?>" readonly>

            <label for="titulo_libro" class="form-label">Título del libro:</label>
            <input type="text" id="titulo_libro" name="titulo_libro" class="form-control mb-4" value="<?php echo $row['Titulo_libro']; ?>" readonly>

            <label for="libro_id" class="form-label">ID del libro:</label>
            <input type="text" id="libro_id" name="libro_id" class="form-control mb-4" value="<?php echo $row['libro_id']; ?>" readonly>

            <label for="fecha_pre" class="form-label">Fecha de préstamo:</label>
            <input type="text" id="fecha_pre" name="fecha_pre" class="form-control mb-4" value="<?php echo $row['Fecha_pre']; ?>" readonly>

            <label for="fecha_dev" class="form-label">Fecha de devolución:</label>
            <input type="text" id="fecha_dev" name="fecha_dev" class="form-control mb-4" value="<?php echo $row['Fecha_dev']; ?>" readonly>

            <label for="estado" class="form-label">Estado:</label>
            <input type="text" id="estado" name="estado" class="form-control mb-4" value="<?php echo $row['Estado']; ?>" readonly>

            <!-- Botón para procesar la devolución -->
            <button class="btn btn-dark" type="submit">Procesar Devolución</button>
        </form>
<?php
    } else {
        echo "No se encontró ninguna reserva con el número ingresado.";
    }
    $conn->close();
}
?>





