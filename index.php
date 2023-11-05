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
    } 
    else if ($opcion == "login") {
        //llama funcion dentro de controller.php para llevar a loginView para usuarios existentes
        $controller->Index();
    } 

    else if ($opcion == "ingresar") {
        //llama funcion dentro de controller.php para llevar a homeView para usuarios validados
        $controller->Ingresar();
    }
    
    else if ($opcion == "") {}
} 
else {
    //funcion por defecto -> index -> login
    $controller->Index();
}
