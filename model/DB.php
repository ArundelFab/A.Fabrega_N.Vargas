<?php
// archivo de configuración
require_once 'config/config.php';
class ConnDB
{
    private $host;
    private $database;
    private $username;
    private $password;
    private $conn;
    public static function conectarDB()
    {
        try {
            $conn = new PDO('mysql:host=' . constant('DB_HOST') . ';dbname=' . constant('DB_NAME') . ';charset=utf8', '' . constant('DB_USER') . '', '' . constant('DB_PASS') . '');
            // Establecer el modo de error para PDO en excepciones
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "EXITO en la conexión a la base de datos: ";
            return $conn;
        } catch (PDOException $e) {
            //echo "Error en la conexión a la base de datos: " . $e->getMessage();
            return null;
        }
    }
}
