<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Content-Type: application/json');
    
    
    require_once('../modelos/conexion.php');
    require_once('../modelos/marca.php');

    $control = $_GET['control'];
    $marca = new marca($conexion);
    $vec = [];

    switch($control){
        case 'consulta':
            $vec = $marca->consulta();
        break;
        case 'eliminar':
            $id = $_GET['id'];
            
            $vec = $marca->eliminar($id);
        case 'insertar':
            $json = file_get_contents('php://input');
            $params = json_decode($json);

            $vec = $marca->insertar($params);
        break;
        case 'editar':
            $json = file_get_contents('php://input');
            $id = $_GET['id'];
            $params = json_decode($json);

            $vec = $marca->editar($id, $params);  
        break;
    }

    echo json_encode($vec);
   
?>