<?php 

namespace File;

use File\File;
use Utils\ParseDataProperties;

class Mods implements File {
    use ParseDataProperties;
    const MODS_FOLDER = 'mods';

    private $modsFilesArray = array();

    public function __construct(){
        if(self::checkFolderExist(self::DATA_FOLDER.DIRECTORY_SEPARATOR.self::MODS_FOLDER)){
            $modsFiles = scandir(self::DATA_FOLDER.DIRECTORY_SEPARATOR.self::MODS_FOLDER);

            $modsFiles = array_filter($modsFiles, function($mod) {
                $rutaCompleta = self::DATA_FOLDER.DIRECTORY_SEPARATOR.self::MODS_FOLDER.DIRECTORY_SEPARATOR.$mod;
                return is_file($rutaCompleta) && pathinfo($rutaCompleta, PATHINFO_EXTENSION) === 'jar';
            });

            $this->modsFilesArray = $modsFiles;

        }
    }

    public function getModsList(){
        return $this->modsFilesArray;
    }

    public function deleteMod($modName){
        $modFile = self::DATA_FOLDER.DIRECTORY_SEPARATOR.self::MODS_FOLDER.DIRECTORY_SEPARATOR.$modName;

        if (file_exists($modFile) && pathinfo($modFile, PATHINFO_EXTENSION) === 'jar') {
            unlink($modFile);
            $this->loadMods(); 
            return true;
        } else {
            return false;
        }
    }

    private function loadMods(){
        $modsFiles = scandir(self::DATA_FOLDER.DIRECTORY_SEPARATOR.self::MODS_FOLDER);

        $modsFiles = array_filter($modsFiles, function($mod) {
            $rutaCompleta = self::DATA_FOLDER.DIRECTORY_SEPARATOR.self::MODS_FOLDER.DIRECTORY_SEPARATOR.$mod;
            return is_file($rutaCompleta) && pathinfo($rutaCompleta, PATHINFO_EXTENSION) === 'jar';
        });

        $this->modsFilesArray = $modsFiles;
    }
}