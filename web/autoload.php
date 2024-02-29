<?php
function mi_autocargador($clase) {
    $clase = str_replace('\\', DIRECTORY_SEPARATOR, $clase);

    $fichero = __DIR__ . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . $clase . '.php';

    if (file_exists($fichero)) {
        include $fichero;
    }
}

spl_autoload_register("mi_autocargador");