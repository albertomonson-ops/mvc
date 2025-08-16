<?php 

class Producto extends Conectar {
    public function get_producto() {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT 
                    tm_producto.prod_id,
                    tm_producto.cat_id,
                    tm_producto.prod_nom,
                    tm_producto.prod_desc,
                    tm_producto.prod_cant,
                    tm_categoria.cat_nom
                FROM tm_producto
                INNER JOIN tm_categoria 
                    ON tm_producto.cat_id = tm_categoria.cat_id
                WHERE tm_producto.estado = 1;";
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

    public function insert_producto($cat_id, $prod_nom, $prod_desc, $prod_cant) {
    try {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO tm_producto (cat_id, prod_nom, prod_desc, prod_cant fech_crea, estado)
                VALUES (?, ?, ?, ?, now(), 1)";
        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $cat_id);
        $stmt->bindValue(2, $prod_nom);
        $stmt->bindValue(3, $prod_desc);
        $stmt->bindValue(4, $prod_cant);
        $stmt->execute();
        return $conectar->lastInsertId();
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }
}

        /* TODO actualizacion de producto */
    public function update_producto($prod_id, $cat_id, $prod_nom, $prod_desc, $prod_cant) {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE tm_producto SET cat_id=?, prod_nom=?, prod_desc=?, prod_cant=?, fech_modi=now() WHERE prod_id = ?";
        $stmt = $conectar->prepare($sql);
        $stmt->bindValue(1, $cat_id);
        $stmt->bindValue(2, $prod_nom);
        $stmt->bindValue(3, $prod_desc);
        $stmt->bindValue(4, $prod_cant);
        $stmt->bindValue(5, $prod_id);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
?>
