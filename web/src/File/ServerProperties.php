<?php

namespace File;

use Utils\ParseDataProperties;

use File\File;




class ServerProperties implements File {
    use ParseDataProperties;

    const FILE_PATH = self::DATA_FOLDER . DIRECTORY_SEPARATOR . 'server.properties';

    public static function getData() {
        if (self::checkExistFile()) {
            $configContent = file_get_contents(self::FILE_PATH);
            $lines = explode("\n", $configContent);
            $configArray = array();

            foreach ($lines as $line) {
                if (!empty($line) && $line[0] !== '#') {
                    if (strpos($line, '=') !== false) {
                        list($key, $value) = explode('=', $line, 2);
                        //$configArray[trim($key)] = trim($value);
                        $configArray[trim($key)] = self::parseDataProperties($value);
                    }
                }
            }
            return $configArray;
        }
        
        return null;
    }

    public static function checkExistFile() {
        return file_exists(self::FILE_PATH);
    }
}