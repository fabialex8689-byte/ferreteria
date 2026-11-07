<?php
    class clientes{
        //atributos
        private $conexion;

        public function __construct($conexion){
            $this->conexion = $conexion;
        }

        //metodos de clase

        public function consulta(){
            $sql = "SELECT cl.*, c.nombre AS ciudad FROM clientes cl
                    INNER JOIN ciudad c ON cl.id_ciudad = c.id_ciudad";

            $res = mysqli_query($this->conexion, $sql) or die('No encontro la tabla clientes');

            $vec = [];
            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }
            return $vec;
        }
        
        public function insertar($params){
            $sql = "INSERT INTO clientes(nombre, telefono, correo, direccion, id_ciudad) 
                    VALUES('$params->nombre', $params->telefono, '$params->correo', '$params->direccion', $params->id_ciudad);

            mysqli_query($this->conexion, $sql) or die('No inserto el registro')";

            $vec = [];
            $vec['resultado'] = "OK";
            $vec["mensaje"] = "Se inserto el registro";

            return $vec;
        }

        public function editar($id, $params){        
            $sql = "UPDATE clientes SET nombre = '$params->nombre', telefono = $params->telefono, correo = '$params->correo', direccion = '$params->direccion',  id_ciudad = $params->id_ciudad WHERE id_cliente = $id";

            mysqli_query($this->conexion, $sql) or die('No edito el registro');

            $vec = [];
            $vec['resultado'] = "OK";
            $vec["mensaje"] = "Se edito el registro";

            return $vec;
        }
        
    }

?>