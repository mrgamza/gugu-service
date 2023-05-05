<?php

require_once 'BaseController.php';

class HelloController extends BaseController {

    function get() {
        echo 'Hello, php-service!';
    }
}