<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Block 🧊</title>
    <link href="public/css/homeStyles.css" type="text/css" rel="stylesheet">
</head>

<body>
    <header>
        <?php include 'public/html/nav.php'; ?>
    </header>

    <div class="banner">
        <h1>¡Bienvenido a Block! <h1>
            </h1>
    </div>
    <div class="entradas">
    <h2 style="margin-top:20px;">Últimas Entradas Publicadas</h2>
    <?php
    $entradaModel = new EntradaModel(); // Crear una instancia de EntradaModel
    $entradas = $entradaModel->obtenerEntradasRecientes();
    //verificar que haya entradas
    if (count($entradas) > 0) {
        foreach ($entradas as $entrada) {
    ?>
            <div class="card-entrada">
                <a href="?op=Ver Entrada&entrada_id=<?php echo $entrada->entrada_id; ?>">
                    <h1><?php echo $entrada->titulo; ?></h1>
                    <h2>💢<?php echo $entrada->tema; ?></h2>
                    <p><?php echo $entrada->contenido; ?></p>
                    <h4>Posteado por: <?php echo $entrada->nombre; ?> <?php echo $entrada->apellido; ?> - <?php echo $entrada->fecha_publicacion; ?> </h4>
                </a>
            </div>
    <?php
        }
    }
    ?>
    </div>

    <!--- Footer--->
    <?php include 'public/html/footerInfoPersonal.html'; ?>
</body>

</html>