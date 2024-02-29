<?php

namespace File;

use File\File;
use Utils\ParseDataProperties;

class Plugins implements File {
    use ParseDataProperties;

    const PLUGINS_FOLDER = 'plugins';
    private $pluginsFilesArray = array();

    public function __construct(){
        if(self::checkFolderExist(self::DATA_FOLDER.DIRECTORY_SEPARATOR.self::PLUGINS_FOLDER)){
            $pluginsFiles = scandir(self::DATA_FOLDER.DIRECTORY_SEPARATOR.self::PLUGINS_FOLDER);

            $pluginsFiles = array_filter($pluginsFiles, function($plugin) {
                $rutaCompleta = self::DATA_FOLDER.DIRECTORY_SEPARATOR.self::PLUGINS_FOLDER.DIRECTORY_SEPARATOR.$plugin;
                return is_file($rutaCompleta) && pathinfo($rutaCompleta, PATHINFO_EXTENSION) === 'jar';
            });

            $this->pluginsFilesArray = $pluginsFiles;

        }
    } 

    public function getPluginsList(){
        return $this->pluginsFilesArray;
    }

    public function deletePlugin($pluginName){
        $pluginFile = self::DATA_FOLDER.DIRECTORY_SEPARATOR.self::PLUGINS_FOLDER.DIRECTORY_SEPARATOR.$pluginName;

        if (file_exists($pluginFile) && pathinfo($pluginFile, PATHINFO_EXTENSION) === 'jar') {
            unlink($pluginFile);
            $this->loadPlugins(); 
            return true;
        } else {
            return false;
        }
    }

    private function loadPlugins(){
        $pluginsFiles = scandir(self::DATA_FOLDER.DIRECTORY_SEPARATOR.self::PLUGINS_FOLDER);

        $pluginsFiles = array_filter($pluginsFiles, function($plugin) {
            $rutaCompleta = self::DATA_FOLDER.DIRECTORY_SEPARATOR.self::PLUGINS_FOLDER.DIRECTORY_SEPARATOR.$plugin;
            return is_file($rutaCompleta) && pathinfo($rutaCompleta, PATHINFO_EXTENSION) === 'jar';
        });

        $this->pluginsFilesArray = $pluginsFiles;
    }
}