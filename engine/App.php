<?php

namespace Engine;

use Engine\Http\Request;
use Engine\Router\Router;

class App
{
    public function run(): void
    {
        $paths = require_once dirname(__DIR__) . '/app/configs/paths.php';

        $router = new Router();
        $request = Request::createFromGlobals();

        $router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

    }
}