<?php
class UsuarioModel
{
    private $conn;
    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $password;
    public $rol;

    private $msgConsulta;
    private $pdo;


    public function __CONSTRUCT()
    {
        try {
            $this->pdo = ConnDB::conectarDB();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function crearUsuario($nuevoUsuario)
    {
        try {
            $stmt = "INSERT INTO usuarios (email, nombre,apellido,password, rol) VALUES (?, ?, ?, ?, ?)";
            $this->pdo->prepare($stmt)
                ->execute(
                    array(
                        $nuevoUsuario->email,
                        $nuevoUsuario->nombre,
                        $nuevoUsuario->apellido,
                        $nuevoUsuario->password,
                        $nuevoUsuario->rol,
                    )
                );
            //$msgConsulta = "Exito en el ingreso de usuario"; // Éxito al crear el usuario
            //echo ($msgConsulta);
            return true; //Retorna true si fue exitoso el registro del usuario
        } catch (PDOException $e) {
            //$msgConsulta = "Error en el ingreso de usuario"; // fallo al crear el usuario
            //echo ($msgConsulta . "error: " . $e);
            return false; //Retorna false si falló el registro
        }
    }

    public function logearUsuario($usuarioLogin)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
            $stmt->execute([$usuarioLogin->email]);

            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($resultado) { // se verifica primero que la consulta no este vacía
                $resPass = $resultado['password']; //contraseña obtenida de la consulta
                if (password_verify($usuarioLogin->password, $resPass)) {
                    return $resultado;
                }
            }
            // deberia poner algo como un modal para que indique si es valido el inicio de sesión
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    public function obtenerUsuarios()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT usuario_id,nombre, apellido, email, rol,fecha_registro   FROM usuarios");
            $stmt->execute();

            $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $resultado;
            // deberia poner algo como un modal para que indique si es valido el inicio de sesión
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function obtenerCantEntradasPorUsuario()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT u.usuario_id, u.nombre, u.apellido, u.email, u.rol, u.fecha_registro, COUNT(e.entrada_id) as cant_entradas
            FROM usuarios u
            LEFT JOIN entradas e ON u.usuario_id = e.usuario_id
            GROUP BY u.usuario_id, u.nombre, u.apellido, u.email, u.rol, u.fecha_registro");
            $stmt->execute();

            $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $resultado;
            // deberia poner algo como un modal para que indique si es valido el inicio de sesión
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
