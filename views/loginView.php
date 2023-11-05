<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión</title>
  <link href="public/css/loginStyles.css" type="text/css" rel="stylesheet">

</head>

<body>
  <div class="fondoForm">
    <div class="formularioLogin">
      <div class="form" id="form">
        <h1>¡Qué gusto tenerte de vuelta!</h1>

        <div class="campo email">
          <div class="icon"></div>
          <label for="email">Ingrese su Email:</label>
          <input class="input" id="email" type="mail" autocomplete="on" />
        </div>

        <div class="campo password">
          <div class="icon"></div>
          <label for="password">Ingrese su Contraseña:</label>
          <input class="input" id="password" type="password" />
        </div>

        <button class="buttonSubmit" id="submit">INICIAR SESIÓN</button>

        <h2><a href="?op=registrarse">Quisiera Crear una cuenta</a></h2>

      </div>
    </div>

  </div>
</body>

</html>