<?php

namespace App\Router;

class Router
{
    public function __construct()
    {
        $this->addRoute('/', function () {
            require __DIR__.'/../Views/welcome.php';
        });
        $this->addRoute('/registration', function () {
            require __DIR__.'/../Views/registration.php';
        });
        $this->addRoute('/login', function () {
            require __DIR__ . '/../Views/login.php';
        });
        $this->addRoute('/profile', function () {
            require __DIR__.'/../Views/profile.php';
        });
        $this->addRoute('/register', function () {
            require __DIR__ . '/../Actions/User/register.php';
        });
        $this->addRoute('/signIn', function () {
            require __DIR__ . '/../Actions/User/signIn.php';
        });
        $this->addRoute('/signOut', function () {
            require __DIR__ . '/../Actions/User/signOut.php';
        });

        $this->dispatch();
    }
    private array $routes = [];

    public function addRoute($route, $function): void
    {
        $this->routes[$route] = $function;
    }

    public function dispatch(): void
    {
        $url = $_SERVER['REQUEST_URI'] ?? '/';

        if(isset($this->routes[$url])) {
            call_user_func($this->routes[$url]);
        } else {
            http_response_code(404);
            echo "Page not found";
        }
    }
}