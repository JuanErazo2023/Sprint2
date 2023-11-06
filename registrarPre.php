<?php
include 'conexion.php';

$nombre_p = $_POST['nombre_pre'];
$cedula_p = $_POST['cedula_pre'];
$titulo_p = $_POST['titulo_pre'];
$editorial_p = $_POST['editorial_pre'];
$fecha_p = $_POST['fecha_pre'];


$sql = "INSERT INTO PRESTAMOS (Nombre_cliente, 	Cedula_cliente, Titulo_libro, Editorial_libro, Fecha_pre) 
        VALUES ('$nombre_p', '$cedula_p', '$titulo_p', '$editorial_p', '$fecha_p')";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo registro creado correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
