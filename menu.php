<?php
session_start();

// Función para mostrar opciones de avatar según el estado de sesión
function mostrarOpcionesAvatar() {
  if (isset($_SESSION['usuario_nombre'])) {
      // Obtener la información de la foto del usuario desde la base de datos
      $usuario_id = $_SESSION['usuario_id']; // Asegúrate de tener el id del usuario
      $avatar = obtenerRutaFotoUsuario($usuario_id);

      // Opciones para usuario autenticado
      echo '
          <!-- Avatar -->
          <div class="dropdown me-5">
              <a
                class="dropdown-toggle d-flex align-items-center hidden-arrow"
                href="#"
                id="navbarDropdownMenuAvatar"
                role="button"
                data-mdb-toggle="dropdown"
                aria-expanded="false"
              >
                <img
                  src="' . $avatar . '"
                  class="rounded-circle"
                  width="40"
                  height="40"
                  alt="Avatar del usuario"
                  loading="lazy"
                />
              </a>
              <ul
                class="dropdown-menu dropdown-menu-end"
                aria-labelledby="navbarDropdownMenuAvatar"
              >
                <li>
                  <a class="dropdown-item" href="perfil.php">Perfil</a>
                </li>
                <li>
                  <a class="dropdown-item" href="cerrarses.php">Cerrar Sesión</a>
                </li>
              </ul>
            </div>
      ';
  } else {
      // Opciones para usuario no autenticado
      echo '
          <!-- Avatar -->
          <div class="dropdown me-5">
              <a
                class="dropdown-toggle d-flex align-items-center hidden-arrow"
                href="#"
                id="navbarDropdownMenuAvatar"
                role="button"
                data-mdb-toggle="dropdown"
                aria-expanded="false"
              >
                <img
                  src="img/2.webp"
                  class="rounded-circle"
                  height="25"
                  alt="Black and White Portrait of a Man"
                  loading="lazy"
                />
              </a>
              <ul
                class="dropdown-menu dropdown-menu-end"
                aria-labelledby="navbarDropdownMenuAvatar"
              >
                <li>
                  <a class="dropdown-item" href="iniciarForm.php">Iniciar Sesión</a>
                </li>
                <li>
                  <a class="dropdown-item" href="registerForm.php">Registrarse</a>
                </li>
              </ul>
            </div>
      ';
  }
}

function obtenerRutaFotoUsuario($usuario_id) {
  // Incluye el archivo de conexión
  include 'conexion.php';

  // Realiza la consulta a la base de datos para obtener la ruta de la foto del usuario
  $consulta = "SELECT foto FROM usuarios WHERE id_usuario = $usuario_id";
  $resultado = $conn->query($consulta);

  // Si la consulta es exitosa, obtén la ruta de la foto
  if ($resultado && $fila = $resultado->fetch_assoc()) {
      $ruta_foto = $fila['foto'];
  } else {
      // Si la consulta falla o no se encuentra la foto, usa una imagen por defecto
      $ruta_foto = 'img/imagen-por-defecto.jpg';
  }

  // Cierra el resultado
  $resultado->close();

  // Devuelve la ruta de la foto del usuario
  return $ruta_foto;
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Toggle button -->
        <button
          class="navbar-toggler"
          type="button"
          data-mdb-toggle="collapse"
          data-mdb-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="fas fa-bars"></i>
        </button>

        <!-- Elementos lado izquierdo -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" href="index.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="catalogo.php">Catalogo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Agregar_libro.php">Agregar Libro</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="prestamo.php">Registrar Prestamo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="devolucion.php">Registrar Devolucion</a>
          </li>
        </ul>
        <!-- Elementos lado izquierdo -->
    </div>
    <!-- Container wrapper -->

    <!-- Barra de busqueda -->
    <div class="input-group">
      <form action="busqueda.php" method="GET" class="d-flex">
        <input type="search" class="form-control rounded col-md-6" name="busqueda" placeholder="Busca libros por Título, Autor o Editorial" aria-label="Search" aria-describedby="search-addon" />
        <div class="input-group-append">
          <button type="submit" class="btn btn-dark">Buscar Libro</button>
        </div>
      </form>
    </div>

    <!-- Notifications -->
    <?php
    if (isset($_SESSION['usuario_nombre'])) {
        // Muestra el espacio para notificaciones solo si el usuario ha iniciado sesión
        echo '
            <div class="dropdown">
                <a class="text-reset me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bell"></i>
                    <span class="badge rounded-pill badge-notification bg-danger" id="notificationCount">1</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink" id="notificationList">
                    <!-- Aquí se mostrarán las notificaciones dinámicamente -->
                </ul>
            </div>';
    }
    ?>

    <!-- Elementos lado derecho -->
    <?php mostrarOpcionesAvatar(); ?>
    <!-- Elementos lado derecho -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->

<script>
function cargarNotificaciones() {
    console.log('Intentando cargar notificaciones...');
    fetch('notificaciones.php')
        .then(response => response.json())
        .then(data => {
            console.log('Respuesta recibida:', data);

            if (data.error) {
                console.error('Error en la respuesta:', data.error);
            } else if (Array.isArray(data)) {
                document.getElementById('notificationCount').innerText = data.length;
                document.getElementById('notificationList').innerHTML = '';

                data.forEach(notificacion => {
                    var listItem = document.createElement('li');
                    listItem.innerHTML = '<a class="dropdown-item" href="#">' + notificacion.mensaje + '</a>';
                    document.getElementById('notificationList').appendChild(listItem);
                });
            } else {
                console.error('Respuesta inesperada:', data);
            }
        })
        .catch(error => {
            console.error('Error al cargar las notificaciones:', error);
        });
}

window.onload = function () {
    console.log('Página cargada. Cargando notificaciones...');
    cargarNotificaciones();
};
</script>


</body>
</html>


