<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear una Cuenta</title>
  <link href="public/css/loginStyles.css" type="text/css" rel="stylesheet">
</head>

<body>
  <form class="fondoForm" action="./?op=registrarNuevoUser" method="POST">
    <div class="formularioLogin">
      <div class="form" id="form">
      <a class="A-logo" href="?op=Block_Home"><img class="logo-Blocks" src="public/img/LogoBlogParcialNelson.png" alt="BlockLogo"></a>
        <h1>¡Te damos la Bienvenida!</h1>
        <h2>Ingrese sus credenciales para crear una cuenta.</h2>

        <div class="campo"> <!-- ... Campo para email ... -->
          <label>Correo Electrónico *</label>
          <input name="email" class="input" type="mail" placeholder="ej. mimail@mail.com" autocomplete="off" />
        </div>

        <div class="campo"><!-- ... Campo para nombre ... -->
          <label>Nombre *</label>
          <input class="input" name="nombre" type="text" placeholder="ej. Juan" autocomplete="off"" />
        </div>

        <div class=" campo"> <!-- ... Campo para apellido ... -->
          <label>Apellido *</label>
          <input class="input" name="apellido" type="text" placeholder="ej. Perez" autocomplete="off" />
        </div>

        <div class="campo"><!-- ... Campo para contraseña ... -->
          <label>Contraseña *</label>
          <input class="input" name="password" type="password" placeholder="* * * * * * * * * *" />
        </div>

        <div class="campo"> <!-- ... Campo solo para validar contraseña... -->
          <label>Vuelva a ingresar su Contraseña para validar *</label>
          <input class="input" name="confirm_password" type="password" placeholder="* * * * * * * * * *" />
        </div>
        <h2 id="indicadorCampos"></h2>
        <h2 id="indicadorPass"></h2>
        <button class="buttonSubmit" id="submit" disabled>REGISTRARME</button>
        <h2><a href="?op=login">Ya tengo una cuenta</a></h2>
      </div>
    </div>
  </form>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const botonRegistrar = document.getElementById('submit');
      // para validar que no estén vacíos los campos
      const mailInput = document.querySelector('input[name="email"]');
      const nombreInput = document.querySelector('input[name="nombre"]');
      const apellInput = document.querySelector('input[name="apellido"]');
      const indicadorCampos = document.getElementById('indicadorCampos'); //mensaje de error campos
      // para validar contraseña
      const passwordInput = document.querySelector('input[name="password"]');
      const confirmPasswordInput = document.querySelector('input[name="confirm_password"]');
      const indicadorPass = document.getElementById('indicadorPass'); //mensaje de error contraseñas

      mailInput.addEventListener('input', validarCampo);
      nombreInput.addEventListener('input', validarCampo);
      apellInput.addEventListener('input', validarCampo);

      function validarCampo() {
        const mail = mailInput.value;
        const nombre = nombreInput.value;
        const apellido = apellInput.value;
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;
        if (mail == '' || nombre == '' || apellido == '' || password == '' || confirmPassword == '') {
          //Validar que los campos no estén vacíos
          indicadorCampos.style.color = '#DC143C';
          indicadorCampos.textContent = 'No dejar Campos obligatorios (*) vacíos';
          botonRegistrar.disabled = true;
          botonRegistrar.style.background = 'var(--rojoAlerta)';
        } else { // los campos no están vacíos
          indicadorCampos.textContent = '';
          botonRegistrar.disabled = false;
          botonRegistrar.style.background = 'var(--colorBotones)';
        }
      }

      //validar que contraseñas sean iguales
      passwordInput.addEventListener('input', validatePassword);
      confirmPasswordInput.addEventListener('input', validatePassword);

      function validatePassword() {
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;

        if (password === confirmPassword) {
          indicadorPass.style.color = '#008000';
          indicadorPass.textContent = 'Contraseñas Validadas ✔';
          passwordInput.style.borderColor = 'green';
          confirmPasswordInput.style.borderColor = 'green';
          botonRegistrar.disabled = false;
          botonRegistrar.style.background = 'var(--colorBotones)';
        } else {
          indicadorPass.style.color = '#DC143C';
          indicadorPass.textContent = 'Contraseñas NO Coinciden ❌';
          passwordInput.style.borderColor = 'red';
          confirmPasswordInput.style.borderColor = 'red';
          botonRegistrar.disabled = true;
          botonRegistrar.style.background = 'var(--rojoAlerta)';
        }
      }
    });
  </script>

</body>

</html>