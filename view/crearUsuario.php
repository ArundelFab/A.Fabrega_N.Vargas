<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
  

<link href="public/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="public/css/signin.css" rel="stylesheet">

<script>
    function ComprobarClave(){
        clave1 = document.formulario.password1.value
        clave2 = document.formulario.password2.value

        if (clave1 != clave2){
        alert("Las dos claves no son iguales...");
        return false;}
    } 

</script>

  </head>
  <body class="text-center">
    
<main class="form-signin w-100 m-auto">
<form name="formulario" class="form-signin" method="POST" action="./?op=registrar" onSubmit="return ComprobarClave()">
  <img class="mb-4" src="public/images/utp.svg" alt="" width="100" height="100">
  <h1 class="h3 mb-3 font-weight-normal">Crear Usuario</h1>
        
  <p class="<?php if (isset ($_GET['msg'])) echo $_GET['t'];?>"> <?php if (isset ($_GET['msg'])) echo $_GET['msg'];?> </p> 
  
            <div class="form-group">
            <input type="text" class="form-control item" id="nombre" placeholder="Nombre" name="nombre" required>
            </div>
            <br>
            <div class="form-group">
            <input type="text" class="form-control item" id="apellido" placeholder="Apellido" name="apellido" required>
            </div> 
            <br>
            <div class="form-group">
            <input type="email" class="form-control item" id="email" placeholder="Email" name="correo" required autofocus>
            </div>
            <br>
            <div class="form-group">
            <input type="password" class="form-control item" id="password"  placeholder="Password" name="password1" required>
            </div>
            <br>
            <div class="form-group">
            <input type="password" class="form-control item" id="repassword" placeholder="Password Nuevamente" name="password2" required>
            </div> 
            <br>

  <button class="btn btn-lg btn-primary btn-block" type="submit" onClick="comprobarClave()" >Crear Cuenta</button>
  <div class="mt-4">
    <div class="d-flex justify-content-center links">
      ¿Ya tiene cuenta? - <a href="./" class="ml-2">Acceder al Sistema</a>
    </div>

  <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
</form>
</main>


    
  </body>
</html>
