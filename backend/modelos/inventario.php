<?php
    class inventario{
        //atributos
        private $conexion;

        public function __construct($conexion){
            $this->conexion = $conexion;
        }

        //metodos de clase

        public function consulta(){
            $sql = "SELECT i.*, m.nombre AS marca, u.nombre AS  usuario     FROM inventario i
                    INNER JOIN marca m ON i.id_marca = m.id_marca
                    INNER JOIN usuario u ON i.id_usuario = u.id_usuario
                    ORDER BY i.nombre;";

            $res = mysqli_query($this->conexion, $sql) or die('No encontro la tabla inventario');

            $vec = [];
            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }
            return $vec;
        }

        public function eliminar($id){
            if (empty($id) || !is_numeric($id)) {
                $vec = [];
                $vec['resultado'] = "ERROR";
                $vec["mensaje"] = "Id producto no valido para eliminar";
                return $vec;
            }
            
            $sql = "DELETE FROM inventario WHERE id_producto = $id";
            mysqli_query($this->conexion, $sql) or die('No elimino el registro');

            $vec = [];
            $vec['resultado'] = "OK";
            $vec["mensaje"] = "Se elimino el registro";

            return $vec;

        }

        public function insertar($params){

            $sql = "INSERT INTO inventario(nombre, stock, precio_compra, precio_venta, id_marca, id_usuario) 
                    VALUES('$params->nombre', $params->stock, $params->precio_compra, $params->precio_venta, $params->id_marca, $params->id_usuario);";

            mysqli_query($this->conexion, $sql) or die('No inserto el registro');

            $vec = [];
            $vec['resultado'] = "OK";
            $vec["mensaje"] = "Se inserto el registro";

            return $vec;
        }

        public function editar($id, $params){        
            $sql = "UPDATE inventario SET nombre = '$params->nombre', stock = $params->stock, precio_compra = $params->precio_compra, precio_venta = $params->precio_venta, id_marca = $params->id_marca, id_usuario = $params->id_usuario WHERE id_producto = $id";

            mysqli_query($this->conexion, $sql) or die('No edito el registro');

            $vec = [];
            $vec['resultado'] = "OK";
            $vec["mensaje"] = "Se edito el registro";

            return $vec;
        }
        
    }

?>