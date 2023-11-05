<?php

require_once "model/DB.php";

//aqui van los controllers
require("./controller/controller.php");

//Instancio el controlador
$controller = new Controller;

if (isset($_GET['op'])) {
    $opcion = $_GET['op'];


    if ($opcion == "registrarse") {
        //Llamo al método ver pasándole la clave que me están pidiendo
        $controller->CrearUsuario();
    } 
    else if ($opcion == "login") {
        //Llamo al método ver pasándole la clave que me están pidiendo
        $controller->Index();
    } 

    else if ($opcion == "ingresar") {
        $controller->Ingresar();
    }
    
    else if ($opcion == "") {}
} 
else {
    //funcion por defecto -> index -> login
    $controller->Index();
}
