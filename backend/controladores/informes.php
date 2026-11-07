<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Content-Type: application/json');
    
    
    require_once('../modelos/conexion.php');
    require_once('../modelos/informes.php');

    $control = $_GET['control'];
    $informes = new informes($conexion);
    $vec = [];

    switch($control){
        case 'consulta':
            $vec = $informes->consulta();
        break;
    }

    echo json_encode($vec);
   
?>