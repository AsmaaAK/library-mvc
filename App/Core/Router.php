<?php
namespace App\Core;

class Router
{

    private array $routes = ['GET' => [], 'POST' => []];

    public function get(string $path, $handler): void  
    { 
        $this->routes['GET'][$this->norm($path)] = $handler; 
    }

    public function post(string $path, $handler): void 
    { 
        $this->routes['POST'][$this->norm($path)] = $handler; 
    }

    public function dispatch(string $method, string $uri): void
    {
        header('Content-Type: text/html; charset=utf-8');

        $path = parse_url($uri, PHP_URL_PATH) ?? '/';

        // Remove base dir
        $base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
        if ($base !== '' && $base !== '/' && str_starts_with($path, $base)) {
            $path = substr($path, strlen($base));
            if ($path === false || $path === '') $path = '/';
        }

        // Normalize
        if ($path !== '/' && str_ends_with($path, '/')) {
            $path = rtrim($path, '/');
        }

        // Try exact match first
        $handler = $this->routes[$method][$path] ?? null;
        $params = [];

        // If not exact match, check for dynamic routes
        if (!$handler) {
            foreach ($this->routes[$method] as $route => $h) {
                $pattern = preg_replace('#\{[a-zA-Z0-9_]+\}#', '([a-zA-Z0-9_-]+)', $route);
                if (preg_match('#^' . $pattern . '$#', $path, $matches)) {
                    array_shift($matches); // remove full match
                    $params = $matches;
                    $handler = $h;
                    break;
                }
            }
        }

        if (!$handler) {
            http_response_code(404);
            echo "404 Not Found";
            return;
        }

        // Call handler
        if (is_array($handler)) {
            [$class, $action] = $handler;
            (new $class())->$action(...$params);
        } else {
            $handler(...$params);
        }
    }

    private function norm(string $p): string
    {
        $p = rtrim($p, '/');
        return $p === '' ? '/' : $p;
    }
}
