<!DOCTYPE html>
<html lang="en">
<?php
@session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrada</title>
    <link href="public/css/homeStyles.css" type="text/css" rel="stylesheet">
</head>
<header>
    <?php include 'public/html/nav.php'; ?>
</header>

<body>
    <!-- <header>
        <?php include 'public/html/nav.html'; ?>
    </header> -->
    <?php

    if ($_SESSION["acceso"] = true) {
        //que tenga una sesión iniciada
        $entradaModel = new EntradaModel(); //instancia de EntradaModel
        $entradaEditable = (array) $entradaModel->obtenerEntradaPorId($_GET["entrada_id"]);
        if (count($entradaEditable) > 0) { //verificar que la consulta no venga vacía (existe la entrada en la bd)
            if ($entradaEditable['usuario_id'] != $_SESSION["usuario_id"]) {
                //no tiene acceso a editar entradas de otros usuarios
                header('Location: ?op=ERROR');
            } else {
                // coincide el user id de la sesion con con el de la entrada en la bd 
    ?>
                <div class="banner">
                    <!-- En el banner va titulo, tema, etc... -->
                    <h1><?php echo $entradaEditable['titulo']; ?></h1>
                    <h2><?php echo $entradaEditable['tema']; ?></h2>
                    <h2 >Fecha de Subida: <?php echo $entradaEditable['fecha_publicacion']; ?></h2>
                </div>
                <div class="contenido"> <!--para ver la entrada-->
                    <br>
                    <br>
                    <textarea readonly type="textarea" class="form-control" name="inputContenido" access="false" id="inputContenido" required="required" aria-required="true">
                            <?php echo $entradaEditable['contenido']; ?>
                        </textarea>
                </div>
                <div class="contenido"> <!--para editar la entrada-->
                    <a href="?op=Inicio">
                        <button class="buttonSubmit">Retornar</button>
                    </a>
                    </form>
                </div>


    <?php
            }
        } else {
            header('Location: ?op=ERROR');
        }
    } else {
        header('Location: ?op=ERROR');
    }
    if ($_SESSION["acceso"] != true && $_SESSION["usuario_id"]) {
        echo "<h1>Error en la selección de entradas.</h1>";
    } else {
    }



    ?>
    <!--- Footer--->
    <?php include 'public/html/footerInfoPersonal.html'; ?>
</body>

</html>