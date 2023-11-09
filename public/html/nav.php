<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/homeStyles.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

  <!-- Añade este script al head para el navbar oscurecido -->
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var navbar = document.querySelector("nav");

      window.addEventListener("scroll", function() {
        if (window.scrollY > 100) {
          navbar.classList.add("navbar-scroll");
        } else {
          navbar.classList.remove("navbar-scroll");
        }
      });
    });
  </script>
</head>

<body>
  <nav>
    <a href="?op=Inicio">
      <img class="logo-Blocks" src="public/img/LogoBlogParcialNelson.png" alt="BlockLogo">
    </a>
    <h1 class="nav-titulo"><?php echo isset($_GET['op']) ? $_GET['op'] : 'Inicio'; ?></h1>
    <ul class="list">
      <li><a id="btnNav" href="?op=Inicio"><i class="fas fa-home"></i> Inicio</a></li>
      <?php
      // Verifica si la sesión está iniciada
      if (isset($_SESSION["rol"])) {
        // Si está iniciada, muestra el botón de cerrar sesión y el de admin si es un admin
        echo '<li><a id="btnNav" href="?op=Mis Entradas"><i class="fas fa-book"></i> Mis Entradas</a></li>';
        echo '<li><a id="btnNav" href="?op=Añadir Entrada"><i class="fas fa-plus"></i> Añadir Entrada</a></li>';
        echo '<li><a id="btnNav" href="?op=cerrarsesion"><i class="fa-solid fa-arrow-right-from-bracket"></i> Cerrar Sesión</a></li>';
        if ($_SESSION["rol"] == "a") {
          echo '<li><a id="btnAdmin" href="?op=Vista Admin"><i class="fa-solid fa-toolbox"></i> Vista de Admin</a></li>';
        }
      } else {
        // Si no está iniciada, muestra los botones de iniciar sesión y registrarme
        echo '<li><a id="btnLogin" href="?op=login"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</a></li>';
        echo '<li><a id="btnRegistrar" href="?op=registrarse"><i class="fas fa-user-plus"></i> Registrarme</a></li>';
      }
      ?>
      <button class="menu">Menu</button>
    </ul>
  </nav>
</body>

</html>
