<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Content-Type: application/json');
    
    
    require_once('../modelos/conexion.php');
    require_once('../modelos/clientes.php');

    $control = $_GET['control'];
    $clientes = new clientes($conexion);
    $vec = [];

    switch($control){
        case 'consulta':
            $vec = $clientes->consulta();
        break;
        case 'insertar':
            $json = file_get_contents('php://input');
            $params = json_decode($json);

            $vec = $clientes->insertar($params);
        break;
        case 'editar':
            $json = file_get_contents('php://input');
            $id = $_GET['id'];
            $params = json_decode($json);

            $vec = $clientes->editar($id, $params);  
        break;
    }

    echo json_encode($vec);
   
?>