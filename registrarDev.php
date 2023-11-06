<?php
include 'conexion.php';

$nombre_d = $_POST['nombre_dev'];
$cedula_d = $_POST['cedula_dev'];
$titulo_d = $_POST['titulo_dev'];
$editorial_d = $_POST['editorial_dev'];
$fecha_d = $_POST['fecha_dev'];


$sql = "INSERT INTO DEVOLUCIONES (Nombre_cliente, 	Cedula_cliente, Titulo_libro, Editorial_libro, Fecha_dev) 
        VALUES ('$nombre_d', '$cedula_d', '$titulo_d', '$editorial_d', '$fecha_d')";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo registro creado correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>