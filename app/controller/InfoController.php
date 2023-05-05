<?php

require_once 'BaseController.php';

class InfoController extends BaseController {

    function get() {
        $object = [
            'version' => '1.0'
        ];
        $this->responseWriteSuccess($object);
    }
}