<?php
require_once __DIR__ . '/../app/Controladores/ControladorAsistencias.php';

session_start();

$accion = $_GET['accion'] ?? 'listar';

$controlador = new ControladorAsistencias();

switch ($accion) {
    case 'listar':
        $controlador->listar();
        break;
    case 'crear':
        $controlador->crear();
        break;
    case 'guardar':
        $controlador->guardar();
        break;
    default:
        $controlador->listar();
}
