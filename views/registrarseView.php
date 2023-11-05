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
        <h1>¡Te damos la Bienvenida!</h1>
        <h2>Ingrese sus credenciales para crear una cuenta.</h2>

        <div class="campo"> <!-- ... Campo para email ... -->
          <label>Correo Electrónico</label>
          <input name="email" class="input" type="mail" placeholder="ej. mimail@mail.com" autocomplete="off" />
        </div>

        <div class="campo"><!-- ... Campo para nombre ... -->
          <label>Nombre</label>
          <input class="input" name="nombre" type="mail" placeholder="ej. Juan" autocomplete="off" />
        </div>

        <div class="campo"> <!-- ... Campo para apellido ... -->
          <label>Apellido</label>
          <input class="input" name="apellido" type="mail" placeholder="ej. Perez" autocomplete="off" />
        </div>

        <div class="campo"><!-- ... Campo para contraseña ... -->
          <label>Contraseña</label>
          <input class="input" name="password" type="password" placeholder="* * * * * * * * * *" />
        </div>

        <div class="campo"> <!-- ... Campo solo para validar contraseña... -->
          <label>Vuelva a ingresar su Contraseña para validarla</label>
          <input class="input" type="password" placeholder="* * * * * * * * * *" />
        </div>

        <button class="buttonSubmit" id="submit">REGISTRARME</button>
        <h2><a href="?op=login">Ya tengo una cuenta</a></h2>
      </div>
    </div>
  </form>

</body>

</html>