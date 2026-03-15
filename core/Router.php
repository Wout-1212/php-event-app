<?php

namespace Core;

/**
 * {O_o}
 *
 * If you understand this you are ready for the next step in your PHP journey 😝
 * -- Sam
 */
class Router
{
    private $routes = [];

    /**
     * Add routes to the routing table based on the pattern
     */
    public function add($pattern, $controller, $method)
    {
        $pattern = trim($pattern, '/');
        $pattern = preg_replace('/\/\{([a-zA-Z0-9_]+)\?\}/', '(?:/(?P<\1>[^/]+))?', $pattern);
        $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<\1>[^/]+)', $pattern);
        $this->routes["#^$pattern$#"] = ['controller' => $controller, 'method' => $method];
    }

    /**
     * See if we have a match and execute the controller method
     * If there are any params in the URL, pass them to the controller method
     */
    public function dispatch($uri)
    {
        $uri = trim($uri, '/');

        foreach ($this->routes as $pattern => $route) {
            if (preg_match($pattern, $uri, $matches)) {
                $controllerName = $route['controller'];
                $method = $route['method'];

                require_once "../app/controllers/{$controllerName}.php";

                $fullControllerName = "App\\Controllers\\{$controllerName}";
                $controller = new $fullControllerName();

                /**
                 * Filter the array to keep only elements with string keys.
                 */
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

                /**
                 * Call the controller method and pass the params
                 */
                echo call_user_func_array([$controller, $method], $params);
                return;
            }
        }

        /**
         * If we reach this point, the page was not found
         */
        http_response_code(404);
        echo "404 - Page Not Found";
    }

}
