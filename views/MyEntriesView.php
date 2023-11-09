<!DOCTYPE html>
<html lang="en">
<?php
@session_start();
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Entradas</title>
    <link href="public/css/homeStyles.css" type="text/css" rel="stylesheet">
</head>

<body>
    <header>
        <?php include 'public/html/nav.php'; ?>
    </header>
    <div class="banner">
        <?php
        if ($_SESSION["acceso"] != true) {
            echo "<h1>Para ver sus entradas.</h1>";
            echo "<h3><a href='registrarse'>Registrese</a> o <a href='registrarse'>Inicie Sesión</a>  para tener acceso a más funcionalidades.</h3>";
        } else {
            echo "<h1>Hola, " . $_SESSION["nombre"] . " " . $_SESSION["apellido"] . "</h1>";
            echo '<h3>Te uniste a Block el: ' . $_SESSION["fecha_registro"] . '</h3>';
        }

        ?>
    </div>
    <div class="entradas">

        <?php //para mostrar las entradas del usuario
        $entradaModel = new EntradaModel(); // Crear una instancia de EntradaModel
        $entradas = $entradaModel->obtenerEntradasPorUsuario($_SESSION["usuario_id"]);

        //si el usuario tiene entradas
        if (count($entradas) > 0) {
            echo "<a class='a-noEntries' href='?op=Añadir Entrada'>Añadir Entrada +</a>";
            echo '<h2>Presione en la entrada que desee editar o eliminar</h2>';
            // Itera a través de las entradas y muestra cada una en una tarjeta
            foreach ($entradas as $entrada) {
        ?>
                <div class="card-entrada">
                    <a href="?op=Editar Entrada&entrada_id=<?php echo $entrada->entrada_id; ?>">
                        <h1><?php echo $entrada->titulo; ?></h1>
                        <h2>💢<?php echo $entrada->tema; ?></h2>
                        <p><?php echo $entrada->contenido; ?></p>
                        <h4>Posteado por: <?php echo $_SESSION["nombre"]; ?> <?php echo $_SESSION["apellido"]; ?> - <?php echo $entrada->fecha_publicacion; ?></h4>
                        <h1 style="text-align: center; color:#144291;"></i>🛠</h1>
                    </a>
                </div>
        <?php
            }
        } else { // indica cuando el usuario no tiene entradas
            echo "<p class='p-noEntries'>No tienes entradas aún. ¡Crea tu primera entrada!</p>
            <a class='a-noEntries' href='?op=Añadir Entrada''>Añadir Entrada +</a>";
        }
        ?>
    </div>
    <!--- Footer--->
    <?php include 'public/html/footerInfoPersonal.html'; ?>


</body>

</html>