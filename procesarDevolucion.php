<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero_reserva = $_POST['id_pre'];

    // Actualizar el estado a "Devuelto"
    $sql_update = "UPDATE PRESTAMOS SET Estado = 'Devuelto' WHERE ID_pre = '$numero_reserva'";

    if ($conn->query($sql_update) === TRUE) {
        echo "Devolución procesada correctamente";
    } else {
        echo "Error al procesar la devolución: " . $conn->error;
    }

    $conn->close();
}
$mensaje_exito = "Devolucion procesada con exito!!";
?>

<script>
        // Función para redirigir al formulario
        function redireccionarAFormulario() {
            window.location.href = 'devolucion.php';
        }

        // Función para mostrar la notificación
        window.onload = function() {
            alert("<?php echo $mensaje_exito; ?>");
            redireccionarAFormulario();
        };
</script>


