<?php

class JsonFormater {
    public static function encodeArray($data) {
        if(isset($data)) {
            return json_encode(iterator_to_array($data));
        }else {
            return "null";
        }
    }
}



?>