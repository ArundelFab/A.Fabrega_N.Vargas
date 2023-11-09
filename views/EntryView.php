<!DOCTYPE html>
<html lang="en">
<?php
@session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Entrada</title>
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
                    <h3 style="font-size:medium;">Lo subiste:<?php echo $entradaEditable['fecha_publicacion']; ?></h3>
                </div>
                <form action="./?op=actualizarEntrada" method="POST">
                    <div class="contenido"> <!--para editar la entrada-->
                        <br>
                        <input type="text" name="entrada_id" style="display:none;" value="<?php echo $entradaEditable['entrada_id']; ?>">
                        <span data-tooltip="Máximo 100 caracteres (obligatorio)" data-flow="right">Cambiar Título de la entrada:</span>
                        <input type="text" class="form-control" name="inputTitulo" maxlength="100" id="inputTitulo" value="<?php echo $entradaEditable['titulo']; ?>" required="required" aria-required="true">
                        <br><br>
                        <div class="cont-select">
                            <span data-tooltip="Verificar antes de guardar cambios" data-flow="bottom">Cambiar Tema de la entrada: </span>
                            <select class="contSelect" name="inputTema" id="inputTema" required="required" aria-required="true">
                                <option value="Artes" id="inputTema-0">Artes</option>
                                <option value="Comidas" id="inputTema-1">Comidas</option>
                                <option value="VideoJuegos" id="inputTema-2">Videojuegos</option>
                                <option value="Tecnologias" id="inputTema-3">Tecnologías</option>
                                <option value="Deportes" id="inputTema-4">Deportes</option>
                            </select>
                        </div>
                        <br><br>
                        <span data-tooltip="" data-flow="right">Cambiar contenido de la entrada:</span>

                        <textarea type="textarea" class="form-control" name="inputContenido" access="false" id="inputContenido" required="required" aria-required="true">
                            <?php echo $entradaEditable['contenido']; ?>
                        </textarea>
                        <button class="buttonSubmit" id="submit">Actualizar Entrada</button>
                    </div>
                </form>
                <div class="contenido"> <!--para editar la entrada-->
                <form action="./?op=eliminarEntrada" method="POST">
                    <input type="text" name="entrada_id" style="display:none;" value="<?php echo $entradaEditable['entrada_id']; ?>">
                    <button class="buttonSubmit" style="background-color: #ff617c;" id="submit">❌ Eliminar Entrada ❌</button>
                    <a href="?op=Mis Entradas">
                        <button class="buttonSubmit">Cancelar Edición</button>
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