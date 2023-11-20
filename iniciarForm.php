<?php
include 'conexion.php';

// Definir una variable para almacenar el mensaje de alerta
$alerta = "";

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener las credenciales del formulario de inicio de sesión
    $correotel = $_POST['correotel'];
    $contra = $_POST['contra'];

    // Consulta SQL para verificar las credenciales
    $sql = "SELECT id_usuario, nombre, contrasena FROM usuarios WHERE email_telefono = '$correotel'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        // El usuario existe, verificar la contraseña
        $fila = $resultado->fetch_assoc();
        $contrasena_bd = $fila['contrasena'];

        if ($contra == $contrasena_bd) {
            // Las credenciales son correctas, puedes iniciar sesión
            session_start();
            $_SESSION['usuario_id'] = $fila['id_usuario'];
            $_SESSION['usuario_nombre'] = $fila['nombre'];
            $_SESSION['correo_telefono'] = $correotel;

            // Redirigir a la página de inicio o a alguna página después del inicio de sesión
            header("Location: index.php");
            exit();
        } else {
            $alerta = "Contraseña incorrecta";
        }
    } else {
        $alerta = "Usuario no encontrado";
    }

    // Mostrar la alerta si está presente
    echo '<script>';
    echo 'var alerta = "' . $alerta . '";';
    echo 'if (alerta !== "") {';
    echo 'alert(alerta);';
    echo '}';
    echo '</script>';

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Banco de la Republica de San Juan de Pasto</title>
    <link rel="stylesheet" href="css/mdb.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css"> <!-- Agrega tu archivo CSS personalizado -->
    <script src="js/mdb.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
</head>

<body>
    <!-- Background image -->
    <div class="bg-image" style="background-image: url('img/fondo-login-register.jpeg'); height: 100vh;">

        <div class="mask" style="background-color: hsla(0, 0%, 0%, 0.6)">
            <div class="d-flex flex-column justify-content-center align-items-center text-center h-100 text-white">
                <h1 class="text-white mb-3">Iniciar sesión.</h1>
                <h2 class="text-white mb-0">Inicia sesión para continuar.</h2>
                <h3 class="text-white mb-0">No tienes cuenta?</h3>
                <h3> <a href="registerForm.php" target="_blank">Registrate</a> </h3>

                <!-- Default form subscription -->
                <form class="text-center p-5" action="" onsubmit="return validarFormulario()" method="POST">

                    <!-- Email -->
                    <input type="text" id="correo" name="correotel" class="form-control mb-4" placeholder="E-mail o telefono">

                    <input type="password" id="contra" name="contra" class="form-control mb-4" placeholder="Contraseña">

                    <!-- Sign in button -->
                    <button class="btn btn-white" type="submit">Iniciar sesión</button>
                </form>

                <!-- Script de validación -->
                <script>
                    function validarFormulario() {
                        var correotelInput = document.getElementById("correotel");
                        var correotelValor = correotelInput.value;

                        // Expresión regular para validar correo electrónico o número de teléfono
                        var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+|\d{10}$/;

                        if (!regex.test(correotelValor)) {
                            alert("Por favor, ingresa un correo electrónico válido o un número de teléfono válido.");
                            return false; // Evita que el formulario se envíe
                        }

                        return true; // Permite que el formulario se envíe si la validación es exitosa
                    }
                </script>

                <button class="btn btn-white" onclick="volverAlMenu()">Volver al Menú Principal</button>

                <script>
                    function volverAlMenu() {
                        // Puedes redirigir a la página del menú principal
                        window.location.href = "index.php";
                        // O realizar alguna otra acción para volver al menú principal
                    }
                </script>

                <!-- Default form subscription -->
            </div>
        </div>
    </div>
    <!-- Background image -->

</body>

</html>

