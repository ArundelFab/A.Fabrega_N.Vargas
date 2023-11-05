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
        <h1>¡Qué gusto que regreses!</h1>

        <div class="campo email">
          <div class="icon"></div>
          <label for="email">Ingrese su Email:</label>
          <input class="input" id="email" type="mail" placeholder="Ingrese su Email" autocomplete="on" />
        </div>

        <div class="campo password">
          <div class="icon"></div>
          <label for="password">Ingrese su Contraseña:</label>
          <input class="input" id="password" type="password" placeholder="Ingrese su Contraseña" />
        </div>

        <button class="buttonSubmit" id="submit">INICIAR SESIÓN</button>

        <h2>Para crear tu cuenta, has click <a href="?op=registrarse">Aquí</a></h2>

      </div>
    </div>

  </div>
</body>

</html>