<?php

namespace SQLite;
use PDO;
use PDOException;

class DBManager {

    private $dbConnection;

    public function __construct($dbConnection) {

        // Check the database connection.

        if($this->testDBConnection($dbConnection)){
            $this->dbConnection = $dbConnection;
        }else{
            $this->dbConnection = null;
            echo "Database connection failed: " . $this->dbConnection;
        }
        
    }

    public function makeNewAdmin($name,$hashedPassword){
        try{

            $currentAdminList = $this->getAllAdmins();

            foreach ($currentAdminList as $admin) {
                if ($admin['name'] === $name) {
                    echo "Admin already exists";
                    return false;
                }
            }

            $query = "INSERT INTO admins (name, password) VALUES (:name, :password)";
            $statement = $this->dbConnection->prepare($query);

            $statement->bindParam(':name',$name);
            $statement->bindParam(':password',$hashedPassword);
            $statement->execute();

            return true;
        }catch(PDOException $e){
            return $e;
        }
    }

    public function makeMinecraftServerTable(){
        try {
            $createQuery = "CREATE TABLE servers (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                name TEXT NOT NULL,
                ip TEXT NOT NULL,
                port INTEGER NOT NULL,
                webpage TEXT
            )";

            if(!$this->tableExists('servers')){
                $this->dbConnection->exec($createQuery);
                return true;   
            }

        }catch(PDOException $e){
            return $e;
        }
    }

    public function tableExists($tableName) {
        try {
            // Consulta para verificar si la tabla existe
            $query = "SELECT name FROM sqlite_master WHERE type='table' AND name=:tableName";
            $statement = $this->dbConnection->prepare($query);
            $statement->bindParam(':tableName', $tableName);
            $statement->execute();

            // Comprobar si la tabla existe
            $result = $statement->fetch(PDO::FETCH_ASSOC);

            return !empty($result);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getAllAdmins(){
        try {
            $statement = $this->dbConnection->query("SELECT name FROM admins");
            // Fetch all admins as associative arrays
            $admins = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $admins;
        }catch(PDOException $e){
            return $e;
        }
    }

    private function testDBConnection($dbConnection){
        try {
            $result = $dbConnection->query("SELECT name FROM sqlitde_master WHERE type='table'");
            $resultFetch = $result->fetchAll(PDO::FETCH_COLUMN);

            if(!empty($resultFetch)){
                return true;
            }
        }catch(PDOException $e){
            return $e;
        }   

    }   

}