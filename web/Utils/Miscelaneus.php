<?php 

namespace Utils;

trait ParseDataProperties {
    public static function parseDataProperties($data) {
        if($data == "true" || $data == "false"){
            return ($data === "true"); 
        }
        if(is_numeric($data)){
            return floatval($data);
        }
    }
}
