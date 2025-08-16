<?php
require_once("../config/conexion.php");
require_once("../models/categoria.php");

$categoria = new categoria();

switch ($_GET["op"]) {
    case "combo":
        $datos = $categoria->get_categoria();
        if (is_array($datos) == true && count($datos) > 0) {
            $html = "<option label='Seleccione'></option>";
            foreach ($datos as $row) {
                $html .= "<option value='".$row["cat_id"]."'>".$row["cat_nom"]."</option>";
            }
            echo $html;
        }
    break;
}


?>