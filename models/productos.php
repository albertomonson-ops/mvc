<?php 

class Producto extends Conectar {
    public function get_producto() {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM tm_producto WHERE estado=1";
        $stmt = $conectar->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_producto_x_id($prod_id) {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM tm_producto WHERE prod_id = ?";
        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $prod_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_producto($prod_id) {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE tm_producto SET estado=0, fech_elim=now() WHERE prod_id = ?";
        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $prod_id);
        $stmt->execute();
        // Para UPDATE no hay resultados, retorna número de filas afectadas
        return $stmt->rowCount();
    }

    public function insert_producto($prod_nom) {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO tm_producto (prod_nom, fech_crea, estado) VALUES (?, now(), 1)";
        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $prod_nom);
        $stmt->execute();
        // Retorna último ID insertado
        return $conectar->lastInsertId();
    }

    public function update_producto($prod_id, $prod_nom) {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE tm_producto SET prod_nom=?, fech_modi=now() WHERE prod_id = ?";
        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $prod_nom);
        $stmt->bindValue(2, $prod_id);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
?>
