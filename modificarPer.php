<?php
include 'menu.php';
include 'conexion.php';
?>

<h2>Modificar Perfil</h2>

<!-- Default form subscription -->
<form class="text-center border border-light p-5" action="actualizarPer.php" method="post" enctype="multipart/form-data">

    <p class="h4 mb-4">Actualiza tu perfil</p>

    <!-- Name -->
    <input type="text" name="nuevoNombre" id="nuevoNombre" class="form-control mb-4" placeholder="Ingresa tu nuevo nombre" required>

    <div class="custom-file">
        <input type="file" class="custom-file-input" name="nuevaImagen" id="nuevaImagen" lang="es">
        <label class="custom-file-label" for="nuevaImagen">Nueva Imagen de Perfil:</label>
    </div>

    <!-- Sign in button -->
    <button class="btn btn-info" type="submit">Actualizar</button>


</form>
<!-- Default form subscription -->