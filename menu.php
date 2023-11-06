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
    <!-- Collapsible wrapper -->
    
    <!-- Barra de busqueda -->
    <div class="input-group">
      <form action="busqueda.php" method="GET" class="d-flex">
        <input type="search" class="form-control rounded col-md-6" name="busqueda" placeholder="Busca libros por Título, Autor o Editorial" aria-label="Search" aria-describedby="search-addon" />
        <div class="input-group-append">
          <button type="submit" class="btn btn-dark">Buscar Libro</button>
        </div>
      </form>
    </div>

    <!-- Elementos lado derecho -->

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
            <a class="dropdown-item" href="#">My profile</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Settings</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Logout</a>
          </li>
        </ul>
      </div>
    </div>
    <!-- Elementos lado derecho -->
  </div>
  <!-- Container wrapper -->
  
</nav>
<!-- Navbar -->

