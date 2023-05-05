<?php

function number_value($text) {
    if ($text != null and is_numeric($text)) {
        return (int)$text;
    } else {
        return null;
    }
}