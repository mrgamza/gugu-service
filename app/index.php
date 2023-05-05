<?php
require_once 'route/Router.php';

function DOCUMENT_ROOT() {
    $root = $_SERVER["DOCUMENT_ROOT"].'/app';

    if ($_SERVER['SERVER_NAME'] != 'localhost') {
        return $_SERVER["DOCUMENT_ROOT"];
    }

    return $root;
}

Router::get()->route();