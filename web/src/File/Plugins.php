<?php

namespace File;

use File\File;
use Utils\ParseDataProperties;

class Plugins implements File {
    use ParseDataProperties;

    const PLUGINS_FOLDER = 'plugins';

    public function __construct(){
        if(self::checkFolderExist(self::DATA_FOLDER.DIRECTORY_SEPARATOR.self::PLUGINS_FOLDER)){
            echo "Function";
        }
    } 
}