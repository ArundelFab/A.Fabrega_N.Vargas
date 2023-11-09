<?php

require_once "model/DB.php";

//aqui van los controllers
require("./controller/controller.php");

//Instancio el controlador
$controller = new Controller;

if (isset($_GET['op'])) {
    $opcion = $_GET['op'];


    if ($opcion == "registrarse") {
        //llama funcion dentro de controller.php para llevar a registrarseView para usuarios nuevos
        $controller->CrearUsuario();
    }

    if ($opcion == "registrarNuevoUser") {
        //llama funcion dentro de controller.php para registrar un nuevo usuario
        $controller->GuardarNuevoUsuarioEnBaseDeDatos();
    } else if ($opcion == "login") {
        //llama funcion dentro de controller.php para llevar a loginView para usuarios existentes
        $controller->EnterLoginView();
    } else if ($opcion == "ingresar") {
        //llama funcion dentro de controller.php para llevar a homeView para usuarios validados
        $controller->IniciarSesion();
    } else if ($opcion == "Inicio") {
        //llama funcion dentro de controller.php para llevar a homeView para usuarios validados
        $controller->EnterHomePageVerBlogs();
    } else if ($opcion == "Mis Entradas") {
        //llama funcion dentro de controller.php para llevar a homeView para usuarios validados
        $controller->EnterMyEntriesView();
    } elseif ($opcion == "Editar Entrada" && isset($_GET["entrada_id"])) {
        $controller->mostrarEntradaView();
        // Puedes agregar más lógica aquí si es necesario
    } elseif ($opcion == "Ver Entrada" && isset($_GET["entrada_id"])) {
        $controller->mostrarEntradaViewLectura();
        // Puedes agregar más lógica aquí si es necesario
    } else if ($opcion == "Añadir Entrada") {
        //llama funcion dentro de controller.php para llevar a homeView para usuarios validados
        $controller->EntryAdd();
    } else if ($opcion == "registrarNuevaEntrada") {
        //llama funcion dentro de controller.php para llevar a homeView para usuarios validados
        $controller->AgregarEntradaBaseDatos();
    } else if ($opcion == "actualizarEntrada") {
        //llama funcion dentro de controller.php para llevar a homeView para usuarios validados
        $controller->ActualizarEntradaBaseDatos();
    } else if ($opcion == "eliminarEntrada") {
        //llama funcion dentro de controller.php para llevar a homeView para usuarios validados
        $controller->eliminarEntradaBaseDatos();
    } else if ($opcion == "Vista Admin") {
        //llama funcion dentro de controller.php para llevar a homeView para usuarios validados
        $controller->mostrarAdminView();
    } else if ($opcion == "") {
        $controller->Index();
    } else if ($opcion == "cerrarsesion") {
        session_destroy();
        $controller->EnterLoginView();
    }
} else {
    //funcion por defecto -> index -> login
    $controller->Index();
}
