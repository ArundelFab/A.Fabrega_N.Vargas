<?php
session_start();

/*Aqui van los require de los modelos que usemos
require_once 'model/modelo.php';
*/


class Controller {
    public function Index(){
        //Le paso los datos a la vista
        require("views/login.php");
    }

    public function CrearUsuario(){
        require("views/registrarse.php");
    }

    public function IngresarInicioBlogs(){
        require("views/homeBlogs.php");
    }

    public function Ingresar(){
        require("views/homeBlogs.php");
    }
    

}
