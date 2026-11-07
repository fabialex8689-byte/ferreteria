<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Content-Type: application/json');
    
    
    require_once('../modelos/conexion.php');
    require_once('../modelos/departamento.php');

    $control = $_GET['control'];
    $departamento = new departamento($conexion);
    $vec = [];

    switch($control){
        case 'consulta':
            $vec = $departamento->consulta();
        break;
        case 'eliminar':
            $id = $_GET['id'];
            
            $vec = $departamento->eliminar($id);
        case 'insertar':
            $json = file_get_contents('php://input');
            $params = json_decode($json);

            $vec = $departamento->insertar($params);
        break;
        case 'editar':
            $json = file_get_contents('php://input');
            $id = $_GET['id'];
            $params = json_decode($json);

            $vec = $departamento->editar($id, $params);  
        break;
    }

    echo json_encode($vec);
   
?>