<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_p = $_POST['nombre_pre'];
    $cedula_p = $_POST['cedula_pre'];
    $id_libro = $_POST['libro_pre'];
    $fecha_p = $_POST['fecha_pre'];
    $fecha_d = $_POST['fecha_dev'];

    // Obtén el título del libro basado en el ID
    $sql_libro = "SELECT Titulo_libro FROM libro WHERE ID_libro = '$id_libro'";
    $result_libro = $conn->query($sql_libro);

    if ($result_libro->num_rows > 0) {
        $row_libro = $result_libro->fetch_assoc();
        $titulo_p = $row_libro['Titulo_libro'];

        // Inserta en la tabla de préstamos
        $sql = "INSERT INTO PRESTAMOS (Nombre_cliente, Cedula_cliente, Titulo_libro, libro_id, Fecha_pre, Fecha_dev) 
                VALUES ('$nombre_p', '$cedula_p', '$titulo_p', '$id_libro', '$fecha_p', '$fecha_d')";

        if ($conn->query($sql) === TRUE) {
            echo "Nuevo registro creado correctamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: No se encontró el libro con ID " . $id_libro;
    }

    $conn->close();
}
$mensaje_exito = "Prestamo registrado con exito!!";
?>

<script>
        // Función para redirigir al formulario
        function redireccionarAFormulario() {
            window.location.href = 'prestamo.php';
        }

        // Función para mostrar la notificación
        window.onload = function() {
            alert("<?php echo $mensaje_exito; ?>");
            redireccionarAFormulario();
        };
</script>