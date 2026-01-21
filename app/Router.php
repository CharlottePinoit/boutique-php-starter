<?php

namespace App;

class Router
{
    private array $routes = [];

    public function get(string $pattern, array $action): void
    {
        $regex = preg_replace('/\{(\w+)\}/', '(?P<$1>[^/]+)', $pattern);
        $regex = '#^' . $regex . '$#';

        $this->routes['GET'][$regex] = $action;
    }

    public function post(string $pattern, array $action): void
    {
        $regex = preg_replace('/\{(\w+)\}/', '(?P<$1>[^/]+)', $pattern);
        $regex = '#^' . $regex . '$#';

        $this->routes['POST'][$regex] = $action;
    }



    public function dispatch(string $uri, string $method): void
    {
        $path = parse_url($uri, PHP_URL_PATH);

        foreach ($this->routes[$method] ?? [] as $regex => $handler) {

            if (preg_match($regex, $path, $matches)) {
                [$controller, $action] = $handler;
                $params = array_filter(
                    $matches,
                    fn($key) => !is_int($key),
                    ARRAY_FILTER_USE_KEY
                );

                $controllerInstance = new $controller();
                $controllerInstance->$action(...$params);
                return;
            }
        }

        http_response_code(404);
        echo "404 - Page non trouvée";
    }
}
