<?php
session_start();

// Incluir la configuración y definir la clase Database
require_once 'config/config.php';
require_once 'model/db.php';

require_once 'model/usuarioModel.php';
require_once 'model/entradaModel.php';

class Controller
{
    private $conn; // para la conexión a la base de datos
    private $createUserModel; //para pasar la conexión a la base de datos a usuarioModel
    private $entradaModel; //para pasar la conexión a la base de datos a entradaModel



    public function __CONSTRUCT()
    {
        $this->createUserModel = new usuarioModel();
    }

    public function Index()
    {
        // Le paso los datos a la vista
        require("views/loginView.php");
    }

    public function CrearUsuario()
    {
        require("views/registrarseView.php");
    }

    public function GuardarNuevoUsuarioEnBaseDeDatos()
    {
        $nuevoUsuario = new UsuarioModel();
        // Recopila los datos del formulario
        $nuevoUsuario->nombre = $_POST['nombre'];
        $nuevoUsuario->apellido = $_POST['apellido'];
        $nuevoUsuario->email = $_POST['email'];
        $nuevoUsuario->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $nuevoUsuario->rol = 'u';
        // Llama a la función en el modelo para registrar el usuario
        if ($this->createUserModel->crearUsuario($nuevoUsuario)){
            echo '<script>abrirModal("registroExitoso");</script>';
            header('Location: ?op=login');
        }
        else{
            echo '<script>abrirModal("registroFallido");</script>';
            header('Location: ?op=registrarse');
        }
    }


    public function IngresarInicioBlogs()
    {
        require("views/homeBlogs.php");
    }

    public function Ingresar()
    {
        require("views/homeBlogs.php");
    }
}
