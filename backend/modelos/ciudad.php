<?php
    class ciudad{
        //atributos
        private $conexion;

        public function __construct($conexion){
            $this->conexion = $conexion;
        }

        //metodos de clase

        public function consulta(){
            $sql = "SELECT * FROM ciudad ORDER BY nombre";
            $res = mysqli_query($this->conexion, $sql) or die('No encontro la tabla ciudad');

            $vec = [];
            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }
            return $vec;
        }

        public function consulta2($id_departamento){
            $sql = "SELECT * FROM ciudad WHERE id_departamento = $id_departamento ORDER BY nombre";
            $res = mysqli_query($this->conexion, $sql) or die('No encontro la tabla ciudad');

            $vec = [];
            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }
            return $vec;
        }

        public function eliminar($id){
            $sql = "DELETE FROM ciudad WHERE id_ciudad = $id";
            mysqli_query($this->conexion, $sql) or die('No elimino el registro');

            $vec = [];
            $vec['resultado'] = "OK";
            $vec["mensaje"] = "Se elimino el registro";

            return $vec;

        }

        public function insertar($params){
            $sql = "INSERT INTO ciudad(nombre, id_departamento) VALUES('params->nombre', 1, $params->departamento)";
            
            mysqli_query($this->conexion, $sql) or die('No inserto el registro');

            $vec = [];
            $vec['resultado'] = "OK";
            $vec["mensaje"] = "Se inserto el registro";

            return $vec;
        }

        public function editar($id, $params){
            $sql = "UPDATE ciudad SET nombre = '$params->nombre', id_departamento = $params->departamento WHERE id_ciudad = $id";
            mysqli_query($this->conexion, $sql) or die('No edito el registro');

            $vec = [];
            $vec['resultado'] = "OK";
            $vec["mensaje"] = "Se edito el registro";

            return $vec;
        }
    }

?>