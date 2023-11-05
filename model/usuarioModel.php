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

    public function obtenerUsuarioPorUsername($username)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE username = ?");
            $stmt->execute([$username]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Manejar el error, por ejemplo, registrar en un archivo de registro
            return null; // Error al obtener el usuario
        }
    }

    public function actualizarUsuario($userId, $username, $password, $email)
    {
        try {
            $stmt = $this->conn->prepare("UPDATE usuarios SET username = ?, password = ?, email = ? WHERE user_id = ?");
            $stmt->execute([$username, $password, $email, $userId]);
            return true; // Éxito al actualizar el usuario
        } catch (PDOException $e) {
            // Manejar el error, por ejemplo, registrar en un archivo de registro
            return false; // Error al actualizar el usuario
        }
    }

    public function eliminarUsuario($userId)
    {
        try {
            $stmt = $this->conn->prepare("DELETE FROM usuarios WHERE user_id = ?");
            $stmt->execute([$userId]);
            return true; // Éxito al eliminar el usuario
        } catch (PDOException $e) {
            // Manejar el error, por ejemplo, registrar en un archivo de registro
            return false; // Error al eliminar el usuario
        }
    }
}
