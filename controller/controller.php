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
    private $logUserModel; //para pasar la conexión a la base de datos a usuarioModel
    public $userModel; //para pasar la conexión a la base de datos a entradaModel
    public $entradaModel; //para pasar la conexión a la base de datos a entradaModel

    private $createEntradaModel; //para pasar la conexión a la base de datos a entradaModel
    private $updateEntradaModel; //para pasar la conexión a la base de datos a entradaModel


    public function __CONSTRUCT()
    {
        $this->userModel = new UsuarioModel();
        $this->entradaModel = new EntradaModel();
        $this->createUserModel = new usuarioModel();
        $this->logUserModel = new usuarioModel();
        $this->createEntradaModel = new EntradaModel();
        $this->updateEntradaModel = new EntradaModel();
    }

    public function Index()
    {
        // Le paso los datos a la vista
        require("views/homeView.php");
    }

    public function CrearUsuario()
    {
        require("views/registrarseView.php");
    }

    public function GuardarNuevoUsuarioEnBaseDeDatos()
    {
        if ( //valida que no vengan campos vacios aunque eso ya se validó con jscript
            isset($_POST['nombre']) && isset($_POST['apellido'])
            && isset($_POST['email']) && isset($_POST['password'])
        ) {
            $nuevoUsuario = new UsuarioModel();
            // Recopila los datos del formulario
            $_SESSION["acceso"] = true;
            $nuevoUsuario->nombre = $_POST['nombre'];
            $nuevoUsuario->apellido = $_POST['apellido'];
            $nuevoUsuario->email = $_POST['email'];
            $nuevoUsuario->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $nuevoUsuario->rol = 'u';
            // Llama a la función en el modelo para registrar el usuario
            if ($this->createUserModel->crearUsuario($nuevoUsuario)) {
                header('Location: ?op=login');
            } else {
                header('Location: ?op=registrarse');
            }
        }
    }

    public function IniciarSesion()
    {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $usuarioLogin = new UsuarioModel();
            // Recopila los datos del formulario
            $usuarioLogin->email = $_POST['email'];
            $usuarioLogin->password = $_POST['password'];
            // Llama a la función en el modelo para registrar el usuario
            if ($valoresparaSesion = $this->logUserModel->logearUsuario($usuarioLogin)) {
                //echo var_dump($valoresparaSesion);
                $_SESSION["acceso"]         = true;
                $_SESSION["usuario_id"]     = $valoresparaSesion["usuario_id"];
                $_SESSION["email"]          = $valoresparaSesion["email"];
                $_SESSION["nombre"]         = $valoresparaSesion["nombre"];
                $_SESSION["apellido"]       = $valoresparaSesion["apellido"];
                $_SESSION["rol"]            = $valoresparaSesion["rol"];
                $_SESSION["fecha_registro"] = $valoresparaSesion["fecha_registro"];
                header('Location: ?op=Inicio');
            } else {
                header('Location: ?op=login');
            }
        }
    }

    public function AgregarEntradaBaseDatos()
    {
        if ( //valida que no vengan campos vacios aunque eso ya se validó con jscript
            isset($_POST['inputTitulo']) && isset($_POST['inputTema'])
            && isset($_POST['inputContenido'])
        ) {
            $nuevaEntrada = new entradaModel();
            // Recopila los datos del formulario
            $nuevaEntrada->usuario_id = $_SESSION["usuario_id"];
            $nuevaEntrada->titulo = $_POST['inputTitulo'];
            $nuevaEntrada->tema = $_POST['inputTema'];
            $nuevaEntrada->contenido = $_POST['inputContenido'];
            // Llama a la función en el modelo para registrar el usuario
            if ($this->createEntradaModel->crearEntrada($nuevaEntrada)) {
                header('Location: ?op=Mis Entradas');
            } else {
                header('Location: ?op=Añadir Entrada');
            }
        } else {
            header('Location: ?op=Añadir Entrada');
        }
    }

    public function ActualizarEntradaBaseDatos()
    {
        if ( //valida que no vengan campos vacios aunque eso ya se validó con jscript
            isset($_POST['inputTitulo']) && isset($_POST['inputTema'])
            && isset($_POST['inputContenido']) && isset($_POST['entrada_id'])
        ) {
            $entradaActualizada = new entradaModel();
            // Recopila los datos del formulario
            $entrada_id = $_POST['entrada_id'];
            $entradaActualizada->titulo = $_POST['inputTitulo'];
            $entradaActualizada->tema = $_POST['inputTema'];
            $entradaActualizada->contenido = $_POST['inputContenido'];
            // Llama a la función en el modelo para registrar el usuario
            if ($this->updateEntradaModel->actualizarEntrada($entradaActualizada, $entrada_id)) {
                header('Location: ?op=Mis Entradas');
            } else {
                header('Location: ?op=ERROR');
            }
        }
    }

    public function eliminarEntradaBaseDatos()
    {
        if ( //valida que no vengan campos vacios aunque eso ya se validó con jscript
            isset($_POST['entrada_id'])
        ) {
            // Recopila los datos del formulario
            $entrada_id = $_POST['entrada_id'];
            // Llama a la función en el modelo para registrar el usuario
            if ($this->updateEntradaModel->eliminarEntrada($entrada_id)) {
                header('Location: ?op=Mis Entradas');
            } else {
                header('Location: ?op=ERROR');
            }
        }
    }

    public function obtenerUsuarios()
    {
        if ($this->userModel->obtenerUsuarios()) {
            header('Location: ?op=SIFUNCIONO');
        } else {
            header('Location: ?op=ERROR');
        }
    }



    public function EnterHomePageVerBlogs()
    {
        require("views/homeView.php");
    }

    public function EnterMyEntriesView()
    {
        require("views/MyEntriesView.php");
    }

    // Controlador

    public function EntryAdd()
    {
        require("views/AddEntryView.php");
    }

    public function mostrarEntradaView()
    {
        require("views/EntryView.php");
    }
    public function mostrarEntradaViewLectura()
    {
        require("views/EntryViewLectura.php");
    }
    public function mostrarAdminView()
    {
        require("views/AdminView.php");
    }
    public function Ingresar()
    {
        require("views/homeBlogs.php");
    }

    public function EnterLoginView()
    {
        require("views/loginView.php");
    }
}
