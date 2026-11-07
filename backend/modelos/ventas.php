<?php
    class ventas{
        //atributos
        private $conexion;

        public function __construct($conexion){
            $this->conexion = $conexion;
        }

        //metodos de clase

        public function consulta(){
            $sql = "SELECT v.*, i.nombre AS producto, c.nombre AS clientes, u.nombre AS usuario FROM ventas v
                    INNER JOIN inventario i ON v.id_producto = i.id_producto
                    INNER JOIN clientes c ON v.id_cliente = c.id_cliente
                    INNER JOIN usuario u ON v.id_usuario = u.id_usuario
                    ORDER BY fecha DESC;";
            $res = mysqli_query($this->conexion, $sql) or die('No encontro la tabla ventas');

            $vec = [];
            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }
            return $vec;
        }
        
        public function insertar($params){
            $sql = "INSERT INTO ventas(cantidad, precio, subtotal, iva, total, fecha, id_producto, id_cliente, id_usuario) 
                    VALUES($params->cantidad, $params->precio, $params->subtotal, $params->iva, $params->total, $params->fecha, $params->id_producto, $params->id_cliente, $params->id_usuario);

            mysqli_query($this->conexion, $sql) or die('No inserto el registro')";

            $vec = [];
            $vec['resultado'] = "OK";
            $vec["mensaje"] = "Se inserto el registro";

            return $vec;
        }

        public function editar($id, $params){        
            $sql = "UPDATE ventas SET cantidad = $params->cantidad, precio = $params->precio, subtotal = $params->subtotal, iva = $params->iva, total = $params->total, fecha = $params->fecha, id_producto = $params->id_producto, id_cliente = $params->id_cliente, id_usuario = $params->id_usuario WHERE id_venta = $id";

            mysqli_query($this->conexion, $sql) or die('No edito el registro');

            $vec = [];
            $vec['resultado'] = "OK";
            $vec["mensaje"] = "Se edito el registro";

            return $vec;
        }
        
    }

?>