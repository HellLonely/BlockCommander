<?php 

namespace SQLite;

use PDO;
use PDOException;

class Connection {
    const DB_FILE = 'src'.DIRECTORY_SEPARATOR.'SQLite'.DIRECTORY_SEPARATOR.'database.db';
    private static $instance;
    private $connection;

    private function __construct(){
        try {
            $this->connection = new PDO('sqlite:'.self::DB_FILE);

            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Error en la conexión: " . $e->getMessage();
        }
    }

    public static function getSQLiteInstance() {
        if (!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}