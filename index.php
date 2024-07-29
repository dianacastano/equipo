<?php
if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'];
} else {
    $controller = 'equipo';
    $action = 'showAddForm';
}

require_once './controlador/equipocontroller.php';

$controllerName = ucfirst($controller) . 'Controller';
$controller = new $controllerName();

$controller->{$action}();
?>
