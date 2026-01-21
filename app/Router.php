<?php

class Router
{
    private array $routes = [];

    public function get(string $pattern, array $action): void
    {
        $this->addRoute('GET', $pattern, $action);
    }

    public function post(string $pattern, array $action): void
    {
        $this->addRoute('POST', $pattern, $action);
    }

    private function addRoute(string $method, string $pattern, array $action): void
    {
        // Transforme /produit/{id} en regex
        $regex = preg_replace('/\{(\w+)\}/', '(?P<$1>[^/]+)', $pattern);
        $regex = '#^' . $regex . '$#';

        $this->routes[$method][$regex] = $action;
    }

    public function dispatch(string $uri, string $method): void
    {
        $path = parse_url($uri, PHP_URL_PATH);

        foreach ($this->routes[$method] ?? [] as $regex => $action) {

            if (preg_match($regex, $path, $matches)) {

                $params = array_filter(
                    $matches,
                    fn($key) => !is_int($key),
                    ARRAY_FILTER_USE_KEY
                );

                [$controller, $methodName] = $action;
                (new $controller())->$methodName($params ?? []);
                return;
            }
        }

        http_response_code(404);
        echo "404 - Page non trouvée";
    }
}
