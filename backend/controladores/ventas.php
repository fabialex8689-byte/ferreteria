<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Content-Type: application/json');
    
    
    require_once('../modelos/conexion.php');
    require_once('../modelos/ventas.php');

    $control = $_GET['control'];
    $ventas = new ventas($conexion);
    $vec = [];

    switch($control){
        case 'consulta':
            $vec = $ventas->consulta();
        break;
        case 'insertar':
            $json = file_get_contents('php://input');
            $params = json_decode($json);

            $vec = $ventas->insertar($params);
        break;
        case 'editar':
            $json = file_get_contents('php://input');
            $id = $_GET['id'];
            $params = json_decode($json);

            $vec = $ventas->editar($id, $params);  
        break;
    }

    echo json_encode($vec);
   
?>