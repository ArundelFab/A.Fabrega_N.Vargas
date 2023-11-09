<?php
session_start();// Comienzo de la sesión

require_once 'model/usuario.php';
require_once 'model/ubicacion.php';


class Controller
{
    private $model;
    private $model2;
    private $model3;
    private $model4;
    private $resp;
    
    public function __CONSTRUCT(){
        $this->model = new Usuario();
        $this->model2 = new Ubicacion();
        $this->model3 = new Ubicacion();
        $this->model4 = new Usuario();
    }

    public function IngresarPanel(){
        $listaUsuario = new Usuario();
        $listaUsuario = $this->model4->ObtenerTodosLosUsuarios();
        require("view/panel/dashboard.php");
    }

    public function IngresarPerfil(){

        $usuario = new Usuario();
        $usuario = $this->model->Obtener($_SESSION['id']);

        $provincia =new Ubicacion();
        $provincia= $this->model2->ConsultarProvincia();

        $distritos =new Ubicacion();
        $distritos= $this->model3->ConsultarDistrito();

        require("view/panel/profile.php");
    }
    public function ActualizarDatos(){
        
        $usuario = new Usuario();
        $usuario->nombre = $_REQUEST['nombre'];
        $usuario->apellido = $_REQUEST['apellido'];
        $usuario->id_distrito= $_REQUEST['distrito'];
        $usuario->id=$_SESSION["id"];


        if (isset($_FILES['foto']))
        {
            move_uploaded_file($_FILES['foto']['tmp_name'], "./public/images/users/".$_SESSION["id"].".jpg");
            
            $usuario->foto = $_SESSION["id"].".jpg";

            $_SESSION["foto"]=$_SESSION["id"].".jpg";
        }
        else
        {
            $usuario->foto = $_SESSION["foto"];
        }
         
        
        $this->resp= $this->model->Actualizar($usuario);

        header('Location: ?op=perfil&msg='.$this->resp);
    }


}
