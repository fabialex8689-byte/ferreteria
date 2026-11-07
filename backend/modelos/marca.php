<?php
    class marca{
        //atributos
        private $conexion;

        public function __construct($conexion){
            $this->conexion = $conexion;
        }

        //metodos de clase

        public function consulta(){
            $sql = "SELECT * FROM marca ORDER BY nombre";
            $res = mysqli_query($this->conexion, $sql) or die('No encontro la tabla marca');

            $vec = [];
            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }
            return $vec;
        }

        public function eliminar($id){
            $sql = "DELETE FROM marca WHERE id_marca = $id";
            mysqli_query($this->conexion, $sql) or die('No elimino el registro');

            $vec = [];
            $vec['resultado'] = "OK";
            $vec["mensaje"] = "Se elimino el registro";

            return $vec;

        }

        public function insertar($params){
            $sql = "INSERT INTO marca(nombre) VALUES('params->nombre')";
            mysqli_query($this->conexion, $sql) or die('No inserto el registro');

            $vec = [];
            $vec['resultado'] = "OK";
            $vec["mensaje"] = "Se inserto el registro";

            return $vec;
        }

        public function editar($id, $params){
            $sql = "UPDATE marca SET nombre = '$params->nombre' WHERE id_marca = $id";
            mysqli_query($this->conexion, $sql) or die('No edito el registro');

            $vec = [];
            $vec['resultado'] = "OK";
            $vec["mensaje"] = "Se edito el registro";

            return $vec;
        }
    }

?>