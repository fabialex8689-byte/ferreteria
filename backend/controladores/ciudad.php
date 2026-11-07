<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Content-Type: application/json');
    
    
    require_once('../modelos/conexion.php');
    require_once('../modelos/ciudad.php');

    $control = $_GET['control'];
    $ciudad = new ciudad($conexion);
    $vec = [];

    switch($control){
        case 'consulta':
            $vec = $ciudad->consulta();
        break;
        case 'eliminar':
            $id = $_GET['id'];
            
            $vec = $ciudad->eliminar($id);
        case 'insertar':
            $json = file_get_contents('php://input');
            $params = json_decode($json);

            $vec = $ciudad->insertar($params);
        break;
        case 'editar':
            $json = file_get_contents('php://input');
            $id = $_GET['id'];
            $params = json_decode($json);

            $vec = $ciudad->editar($id, $params);  
        break;
    }

    echo json_encode($vec);
   
?>