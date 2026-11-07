<?php
    class proveedor{
        //atributos
        private $conexion;

        public function __construct($conexion){
            $this->conexion = $conexion;
        }

        //metodos de clase

        public function consulta(){
            $sql = "SELECT p.*, c.nombre AS ciudad FROM proveedor p
                    INNER JOIN ciudad c ON p.id_ciudad = c.id_ciudad";

            $res = mysqli_query($this->conexion, $sql) or die('No encontro la tabla proveedor');

            $vec = [];
            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }
            return $vec;
        }
        
        public function insertar($params){
            $sql = "INSERT INTO proveedor(razon_social, contacto, correo, direccion, id_ciudad) 
                    VALUES('$params->razon_social', $params->contacto, '$params->correo', '$params->direccion', $params->id_ciudad);

            mysqli_query($this->conexion, $sql) or die('No inserto el registro')";

            $vec = [];
            $vec['resultado'] = "OK";
            $vec["mensaje"] = "Se inserto el registro";

            return $vec;
        }

        public function editar($id, $params){        
            $sql = "UPDATE proveedor SET razon_social = '$params->razon_social', contacto = $params->contacto, correo = '$params->correo', direccion = '$params->direccion',  id_ciudad = $params->id_ciudad WHERE id_proveedor = $id";

            mysqli_query($this->conexion, $sql) or die('No edito el registro');

            $vec = [];
            $vec['resultado'] = "OK";
            $vec["mensaje"] = "Se edito el registro";

            return $vec;
        }
        
    }

?>