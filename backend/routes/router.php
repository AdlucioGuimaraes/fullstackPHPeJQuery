<?php

class Router {
    private $routes = [];

    public function addRoute($url, $controller) {
        $this->routes[$url] = $controller;
    }

    public function route() {
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        
        if (isset($this->routes[$url])) {
            $controller = $this->routes[$url];
            
            if (file_exists($controller . '.php')) {
                include $controller . '.php';
                
                // Se o arquivo incluído define a classe, instancie e execute o método "handle"
                if (class_exists($controller)) {
                    $controllerInstance = new $controller();
                    
                    if (method_exists($controllerInstance, 'handle')) {
                        $controllerInstance->handle();
                    } else {
                        echo "Método 'handle' não encontrado no controlador";
                    }
                } else {
                    echo "Classe do controlador não encontrada";
                }
            } else {
                echo "Arquivo do controlador não encontrado";
            }
        } else {
            echo "Rota não encontrada";
        }
    }
}

?>
