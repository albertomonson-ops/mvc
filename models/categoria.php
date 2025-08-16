<?php 

class categoria extends Conectar {
    /* TODA: Obtener todas las categorias */
    public function get_categoria() {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM tm_categoria WHERE est=1";
        $stmt = $conectar->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

   }
?>
