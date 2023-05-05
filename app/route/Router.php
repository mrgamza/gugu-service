<?php

require_once DOCUMENT_ROOT().'/controller/HelloController.php';
require_once DOCUMENT_ROOT().'/controller/ErrorController.php';

class Router {

    private static $instance;

    public static function get() {
        if (null === static::$instance) {
            static::$instance = new Router();
        }

        return static::$instance;
    }

    public function route() {
        $request_uri = $_SERVER['REQUEST_URI'];

        if ($request_uri == "/") {
            $helloController = new HelloController();
            $helloController->get();
            return;
        }

        $request_path = parse_url($request_uri, PHP_URL_PATH);
        $paths = explode("/", $request_path);
        $count = count($paths);
        $last = $paths[$count - 1];
        $result = $this->call_controller($last, '');

        if (!$result) {
            $result = $this->call_controller($paths[$count - 2], $last);
        }

        if (!$result) {
            $error = new ErrorController();
            $error->print_message($request_uri);
        }
    }

    public function call_controller($class, $params) {
        try {
            $request_method = strtolower($_SERVER['REQUEST_METHOD']);
            $controller = ucfirst($class).'Controller';
            $file_path = DOCUMENT_ROOT().'/controller/'.$controller.'.php';
            if (file_exists($file_path)) {
                require_once $file_path;
                $target = new $controller();
                call_user_func_array(array($target, $request_method), array($params));
                return true;
            }
        } catch (Error $e) {}

        return false;
    }
}