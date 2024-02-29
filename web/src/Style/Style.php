<?php

namespace Style;

class Style {

    const TAILWIND_LINK = 'https://cdn.tailwindcss.com';
    static $totalStyleImports = 0;
    
    private function __construct() { } // ! It is not allowed to create methods of this class


    static function insertStyleFragment() {
        self::$totalStyleImports ++;
        return '<script src="' . self::TAILWIND_LINK . '"></script>';
    }

    static function getTotalImports() {
        return self::$totalStyleImports;
    }

    static function getTailwindLink() {
        return self::TAILWIND_LINK;
    }
}