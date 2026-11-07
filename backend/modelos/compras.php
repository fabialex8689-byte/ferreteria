<?php
    class compras{
        //atributos
        private $conexion;

        public function __construct($conexion){
            $this->conexion = $conexion;
        }

        //metodos de clase

        public function consulta(){
            $sql = "SELECT c.*, i.nombre AS inventario, p.razon_social AS proveedor, u.nombre AS usuario FROM compras c
                    INNER JOIN inventario i ON c.id_producto = i.id_producto
                    INNER JOIN proveedor p ON c.id_proveedor = p.id_proveedor
                    INNER JOIN usuario u ON c.id_usuario = u.id_usuario
                    ORDER BY fecha_registro DESC;
";
            $res = mysqli_query($this->conexion, $sql) or die('No encontro la tabla compras');

            $vec = [];
            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }
            return $vec;
        }
        
        public function insertar($params){
            $sql = "INSERT INTO compras(detalle_compra, cantidad, subtotal, iva, total, fecha_registro, id_producto, id_proveedor, id_usuario) 
                    VALUES('$params->detalle_compra', $params->cantidad, $params->subtotal, $params->iva, $params->total, $params->fecha_registro, $params->id_producto, $params->id_proveedor, $params->id_usuario);

            mysqli_query($this->conexion, $sql) or die('No inserto el registro')";

            $vec = [];
            $vec['resultado'] = "OK";
            $vec["mensaje"] = "Se inserto el registro";

            return $vec;
        }

        public function editar($id, $params){        
            $sql = "UPDATE compras SET detalle_compra = $params->detalle_compra, cantidad = $params->cantidad, subtotal = $params->subtotal, iva = $params->iva, total = $params->total, fecha_registro = $params->fecha_registro, id_producto = $params->id_producto, id_proveedor = $params->id_proveedor, id_usuario = $params->id_usuario WHERE id_compra = $id";

            mysqli_query($this->conexion, $sql) or die('No edito el registro');

            $vec = [];
            $vec['resultado'] = "OK";
            $vec["mensaje"] = "Se edito el registro";

            return $vec;
        }
        
    }

?>