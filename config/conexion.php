<?php
class Conectar {
    public $dbh;

    public function __construct() {
        $this->Conexion();
    }

    public function Conexion() {
        try {
            $this->dbh = new PDO("mysql:host=localhost;dbname=crud2;charset=utf8", "root", "itsok123*-");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Comentado para evitar output inesperado
            // echo "✅ Conexión exitosa a la base de datos<br>";
            return $this->dbh;
        } catch (Exception $e) {
            // Manejar error, por ejemplo:
            // error_log($e->getMessage());
            die("Error en la base de datos: " . $e->getMessage());
        }
    }

    public function set_names() {
        return $this->dbh->query("SET NAMES 'utf8'");
    }
}


// --- Prueba de conexión ---
$conexion = new Conectar();
$conexion->Conexion();

?>
