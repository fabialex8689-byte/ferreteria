<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Content-Type: application/json');
    
    
    require_once('../modelos/conexion.php');
    require_once('../modelos/usuario.php');

    $control = $_GET['control'];
    $usuario = new usuario($conexion);
    $vec = [];

    switch($control){
        case 'consulta':
            $vec = $usuario->consulta();
        break;

        case 'insertar':
            $json = file_get_contents('php://input');
            $params = json_decode($json);

            $vec = $usuario->insertar($params);
        break;

        case 'eliminar':
            $id = $_GET['id'];
            
            $vec = $usuario->eliminar($id);
        break;

        case 'editar':
            $json = file_get_contents('php://input');
            $id = $_GET['id'];
            $params = json_decode($json);

            $vec = $usuario->editar($id, $params);  
        break;
    }

    echo json_encode($vec);
   
?>