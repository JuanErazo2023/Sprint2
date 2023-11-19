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
    <div
    class="bg-image"
    style="background-image: url('img/fondo-login-register.jpeg'); height: 100vh;">

        <div class="mask" style="background-color: hsla(0, 0%, 0%, 0.6">
            <div class="d-flex flex-column justify-content-center align-items-center text-center h-100 text-white">
                <h1 class="text-white mb-3">Crea una nueva cuenta</h1>
                <h2 class="text-white mb-0">Ya estás registrado?</h2>
                <h3> <a href="iniciarForm.php" target="_blank"> Inicia sesión</a> </h3>
                
                <!-- Default form subscription -->
                <form class="text-center p-5" action="registrarUs.php" onsubmit="return validarFormulario()" method="POST">

                    <!-- Name -->
                    <input type="text" id="nombre" name="nombre" class="form-control mb-4" placeholder="Nombre">

                    <!-- Email or Phone -->
                    <input type="text" id="correotel" name="correotel" class="form-control mb-4" placeholder="E-mail o telefono">

                    <input type="password" id="contra" name="contra" class="form-control mb-4" placeholder="Contraseña">

                    <!-- Sign in button -->
                    <button class="btn btn-white" type="submit">Registrarse</button>

                </form>

                <script>
                    function validarFormulario() {
                        var correoInput = document.getElementById("correo");
                        var correoValor = correoInput.value;

                        // Expresión regular para validar correo electrónico o número de teléfono
                        var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+|\d{10}$/;

                        if (!regex.test(correoValor)) {
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
