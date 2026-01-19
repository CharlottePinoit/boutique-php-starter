<?php

class Router
{
    /**
     * Tableau des routes
     * Structure :
     * [
     *   'GET' => [
     *       '/produits' => [Controller::class, 'method']
     *   ],
     *   'POST' => [
     *       '/contact' => [Controller::class, 'send']
     *   ]
     * ]
     */
    private array $routes = [];


    //Enregistre une route GET

    public function get(string $path, array $action): void
    {
        $this->routes['GET'][$path] = $action;
    }


    //Enregistre une route POST

    public function post(string $path, array $action): void
    {
        $this->routes['POST'][$path] = $action;
    }


    //Analyse l'URI et appelle la bonne action

    public function dispatch(string $uri, string $method): void
    {
        // Nettoie l'URL : /test?id=42 → /test
        $path = parse_url($uri, PHP_URL_PATH);

        // Vérifie si la route existe
        if (isset($this->routes[$method][$path])) {

            // Récupère le controller et la méthode
            [$controller, $action] = $this->routes[$method][$path];

            // Instancie le controller
            $controllerInstance = new $controller();

            // Appelle la méthode
            $controllerInstance->$action();

            return;
        }

        // Si aucune route ne correspond → 404
        http_response_code(404);
        echo "404 - Page non trouvée";
    }
}
