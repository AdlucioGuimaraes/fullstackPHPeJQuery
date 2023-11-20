<?php
header('Access-Control-Allow-Origin: http://localhost');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Headers: Content-Type');

include 'routes/router.php';
$router= new Router();


$router->addRoute('/', 'pagina1');
$router->addRoute('/pagina2', 'pagina2');

$router->route();


?>