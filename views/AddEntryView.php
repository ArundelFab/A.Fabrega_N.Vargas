<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Entrada</title>
    <link href="public/css/homeStyles.css" type="text/css" rel="stylesheet">
    <link href="public/css/addEntryStyles.css" type="text/css" rel="stylesheet">
</head>

<body>
    <header>
        <?php include 'public/html/nav.php'; ?>
    </header>

    <div class="banner">
        <h1>Bienvenido al creador de Entradas</h1>
        </h1>
    </div>
    <form action="./?op=registrarNuevaEntrada" method="POST">
        <div class="contenedor-addForm">
            <div class="rendered-form">
                <div class="formbuilder-text form-group field-inputTitulo">
                    <span data-tooltip="Máximo 100 caracteres (obligatorio)" data-flow="right">Título de la entrada</span>
                    <input type="text" class="form-control" name="inputTitulo" maxlength="100" id="inputTitulo" title="Ingresa un título cautivador que interese a tus lectores (máximo 100 caracteres)" required="required" aria-required="true">
                </div>
                <div class="formbuilder-select form-group field-inputTema">
                    <span data-tooltip="(obligatorio)" data-flow="right">Seleccione el tema de esta entrada</span>
                </div>
                <select class="contSelect" name="inputTema" id="inputTema" required="required" aria-required="true">
                    <option value="Artes" selected="true" id="inputTema-0">Artes</option>
                    <option value="Comidas" id="inputTema-1">Comidas</option>
                    <option value="VideoJuegos" id="inputTema-2">Videojuegos</option>
                    <option value="Tecnologias" id="inputTema-3">Tecnologías</option>
                    <option value="Deportes" id="inputTema-4">Deportes</option>
                </select>
                <div class="formbuilder-textarea form-group field-inputContenido">
                    <span data-tooltip="(obligatorio)" data-flow="right">Aquí, escriba el contenido de la entrada</span>
                    <textarea type="textarea" class="form-control" name="inputContenido" access="false" id="inputContenido" required="required" aria-required="true"></textarea>
                </div>
                <button class="buttonSubmit" id="submit">Ingresar Entrada</button>
                <a href="?op=Inicio">
                    <button class="buttonSubmit">Cancelar</button>
                </a>
            </div>
        </div>
    </form>

    <!--- Footer--->
    <?php include 'public/html/footerInfoPersonal.html'; ?>
</body>

</html>