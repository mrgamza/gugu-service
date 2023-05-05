<?php

require_once 'BaseController.php';

class ErrorController extends BaseController {

    function print_404() {
        http_response_code(404);
        echo '404 Not Found';
        exit;
    }

    function print_message($message) {
        http_response_code(404);
        echo $message;
        exit;
    }
}