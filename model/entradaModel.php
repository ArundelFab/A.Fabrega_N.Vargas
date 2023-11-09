<?php

class EntradaModel
{

    private $conn;
    public $entrada_id;
    public $usuario_id;
    public $titulo;
    public $tema;
    public $contenido;
    private $pdo;
    public function __CONSTRUCT()
    {
        try {
            $this->pdo = ConnDB::conectarDB();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function crearEntrada($nuevaEntrada)
    {
        try {
            $stmt = "INSERT INTO entradas (usuario_id, titulo,tema,contenido) VALUES (?, ?, ?, ?)";
            $this->pdo->prepare($stmt)
                ->execute(
                    array(
                        $nuevaEntrada->usuario_id,
                        $nuevaEntrada->titulo,
                        $nuevaEntrada->tema,
                        $nuevaEntrada->contenido
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
    public function actualizarEntrada($entradaActualizada, $entrada_id)
    {
        try {
            $stmt = "UPDATE entradas SET titulo = ?, tema = ?, contenido = ? WHERE entrada_id = $entrada_id";
            $this->pdo->prepare($stmt)
                ->execute(
                    array(
                        $entradaActualizada->titulo,
                        $entradaActualizada->tema,
                        $entradaActualizada->contenido,
                    )
                );
            return true; // Retorna true si la actualización fue exitosa
        } catch (PDOException $e) {
            return false; // Retorna false si falló la actualización
        }
    }

    public function eliminarEntrada($entrada_id)
    {
        try {
            $stmt = "DELETE FROM entradas WHERE entrada_id = ?";
            $this->pdo->prepare($stmt)
                ->execute([$entrada_id]);

            return true; // Retorna true si la eliminación fue exitosa
        } catch (PDOException $e) {
            return false; // Retorna false si falló la eliminación
        }
    }



    public function obtenerEntradasPorUsuario($usuario_id)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM entradas WHERE usuario_id = ?");
            $stmt->execute([$usuario_id]);
            $entradas = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $entradas;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // Modelo
    public function obtenerEntradaPorId($entrada_id)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM entradas WHERE entrada_id = ?");
            $stmt->execute([$entrada_id]);
            $entrada = $stmt->fetch(PDO::FETCH_OBJ);
            return $entrada;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function obtenerEntradasRecientes()
    {
        try {
            $stmt = $this->pdo->prepare("
                SELECT entradas.*, usuarios.nombre, usuarios.apellido 
                FROM entradas
                JOIN usuarios ON entradas.usuario_id = usuarios.usuario_id
                ORDER BY entradas.fecha_publicacion DESC 
                LIMIT 7
            ");
            $stmt->execute();
            $entradasRecientes = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $entradasRecientes;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    
    
}
