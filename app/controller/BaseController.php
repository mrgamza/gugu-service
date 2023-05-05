<?php

require_once DOCUMENT_ROOT().'/util/Utility.php';

class BaseController {

    protected function responseWriteSuccess($object) {
        $this->responseWrite("0000", "success", $object);
    }

    protected function responseWriteFail($code, $message) {
        $this->responseWrite($code, $message, null);
    }

    protected function responseWrite($code, $message, $object) {
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode(
            array(
                'code' => $code,
                'message' => $message,
                'data' => $object
            )
        );
    }
}