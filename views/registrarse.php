<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear una Cuenta</title>
  <link href="public/css/loginStyles.css" type="text/css" rel="stylesheet">

</head>

<body>
  <div class="fondoForm">
    <div class="formularioLogin">
      <div class="form" id="form">
        <h1>¡Te damos la Bienvenida!</h1>
        <h2>Ingrese sus credenciales para crear una cuenta.</h2>
        <div class="campo --email">
          <div class="icon"></div>
          <label for="email">Correo Electrónico</label>
          <input class="input" id="email" type="mail" placeholder="ej. mimail@mail.com" autocomplete="on" />
        </div>
        <div class="campo --nombre">
          <div class="icon"></div>
          <label for="email">Nombre</label>
          <input class="input" id="email" type="mail" placeholder="ej. Juan" autocomplete="off" />
        </div>
        <div class="campo --apellido">
          <div class="icon"></div>
          <label for="email">Apellido</label>
          <input class="input" id="email" type="mail" placeholder="ej. Perez" autocomplete="off" />
        </div>
        <div class="campo --contraseña">
          <div class="icon"></div>
          <label for="email">Contraseña</label>
          <input class="input" id="password" type="password" placeholder="* * * * * * * * * *" />
        </div>
        <div class="campo --contraseñaValidar">
          <div class="icon"></div>
          <label for="email">Vuelva a ingresar su Contraseña</label>
          <input class="input" id="password" type="password" placeholder="* * * * * * * * * *" />
        </div>
        <button class="buttonSubmit" id="submit">REGISTRARME</button>
        <h2><a href="?op=login">Ya tengo una cuenta</a></h2>
      </div>
    </div>

  </div>
</body>

</html>