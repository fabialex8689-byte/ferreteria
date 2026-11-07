<?php
    class usuario{
        //atributos
        private $conexion;

        public function __construct($conexion){
            $this->conexion = $conexion;
        }

        //metodos de clase

        public function consulta(){
            $sql = "";

            $res = mysqli_query($this->conexion, $sql) or die('No encontro la tabla usuarios');

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
                $vec["mensaje"] = "Id usuario no valido para eliminar";
                return $vec;
            }
            
            $sql = "DELETE FROM usuario WHERE id_usuario = $id";
            mysqli_query($this->conexion, $sql) or die('No elimino el registro');

            $vec = [];
            $vec['resultado'] = "OK";
            $vec["mensaje"] = "Se elimino el registro";

            return $vec;

        }

        public function insertar($params){

            $sql = "INSERT INTO usuario(nombre, stock, precio_compra, precio_venta, id_marca, id_usuario) 
                    VALUES('$params->nombre', $params->stock, $params->precio_compra, $params->precio_venta, $params->id_marca, $params->id_usuario);";

            mysqli_query($this->conexion, $sql) or die('No inserto el registro');

            $vec = [];
            $vec['resultado'] = "OK";
            $vec["mensaje"] = "Se inserto el registro";

            return $vec;
        }

        public function editar($id, $params){        
            $sql = "UPDATE usuario SET nombre = '$params->nombre', stock = $params->stock, precio_compra = $params->precio_compra, precio_venta = $params->precio_venta, id_marca = $params->id_marca, id_usuario = $params->id_usuario WHERE id_producto = $id";

            mysqli_query($this->conexion, $sql) or die('No edito el registro');

            $vec = [];
            $vec['resultado'] = "OK";
            $vec["mensaje"] = "Se edito el registro";

            return $vec;
        }
        
    }

?>