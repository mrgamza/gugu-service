<?php

require_once 'BaseController.php';

class GuguController extends BaseController {

    function get($dan) {
        if ($dan != null and !is_numeric($dan)) {
            $message = 'parameter dan not support value is '.$dan;
            $this->responseWriteFail('0204', $message);
            return false;
        }

        $dans = array();
        $dan = number_value($dan);
        if ($dan) {
            $value = $this->makeGugu($dan);
            array_push($dans, $value);
        } else {
            for ($dan=2; $dan<=9; $dan++) {
                $value = $this->makeGugu($dan);
                array_push($dans, $value);
            }
        }

        $this->responseWriteSuccess($dans);
    }

    private function makeGugu($dan) {
        $lines = array();

        for ($multiple = 1; $multiple <= 9; $multiple++) {
            $value = "$dan * $multiple = ".($dan * $multiple);
            array_push($lines, $value);
        }

        $value = [
            'title' => $dan . '단',
            'values' => $lines
        ];

        return $value;
    }
}