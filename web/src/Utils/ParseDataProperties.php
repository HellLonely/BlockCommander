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

    public static function checkFolderExist($path) {
        return file_exists($path) && is_dir($path);
    }
}
