<?php
    class informes{
        //atributos
        private $conexion;

        public function __construct($conexion){
            $this->conexion = $conexion;
        }

        //metodos de clase

        public function consulta(){
            $sql = "SELECT i.*, v.cantidad AS ventas, c.detalle_compra AS compras, u.nombre AS usuario FROM informes i
                    INNER JOIN ventas v ON i.id_venta = v.id_venta
                    INNER JOIN compras c ON i.id_compra = c.id_compra
                    INNER JOIN usuario u ON i.id_usuario = u.id_usuario
                    ORDER BY periodo DESC";

            $res = mysqli_query($this->conexion, $sql) or die('No encontro la tabla informes');

            $vec = [];
            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }
            return $vec;
        }
           //preguntar insertar y editar//           
    }

?>