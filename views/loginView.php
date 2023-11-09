<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión</title>
  <link href="public/css/loginStyles.css" type="text/css" rel="stylesheet">

</head>

<body>
  <form class="fondoForm" action="./?op=ingresar" method="POST">
    <div class="formularioLogin">
      <div class="form" id="form">
        <a class="A-logo" href="?op=Block_Home"><img class="logo-Blocks" src="public/img/LogoBlogParcialNelson.png" alt="BlockLogo"></a>
        <h1>¡Bienvenido nuestro Blog!</h1>
        <h2>Ingresa tus credenciales para Iniciar Sesión</h2>

        <div class="campo email">
          <div class="icon"></div>
          <label for="email">Email:</label>
          <input class="input" id="email" type="mail" autocomplete="on" name="email" />
        </div>

        <div class="campo password">
          <div class="icon"></div>
          <label for="password">Contraseña:</label>
          <input class="input" id="password" type="password" name="password" />
        </div>
        <h2 id="indicadorCampos"></h2>
        <button class="buttonSubmit" id="submit" disabled>INICIAR SESIÓN</button>

        <h2><a href="?op=registrarse">Quiero Crear una cuenta</a></h2>
      </div>
    </div>
  </form>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const buttonSubmit = document.getElementById('submit');
      // para validar que no estén vacíos los campos
      const mailInput = document.querySelector('input[name="email"]');
      const passwordInput = document.querySelector('input[name="password"]');
      const indicadorCampos = document.getElementById('indicadorCampos');
      //mensaje de error campos vacíos

      mailInput.addEventListener('input', validarCampo);
      passwordInput.addEventListener('input', validarCampo);

      function validarCampo() {
        const email = mailInput.value;
        const password = passwordInput.value;
        if (email == '' || password == '') {
          //Validar que los campos no estén vacíos
          indicadorCampos.style.color = '#DC143C';
          indicadorCampos.textContent = 'No dejar Campos obligatorios (*) vacíos';
          buttonSubmit.style.background = 'var(--rojoAlerta)';
          buttonSubmit.disabled = true;
        } else { // los campos no están vacíos
          indicadorCampos.textContent = '';
          buttonSubmit.disabled = false;
          buttonSubmit.style.background = 'var(--colorBotones)';
        }
      }
    });
  </script>

  <!--- Footer--->

</body>

</html>