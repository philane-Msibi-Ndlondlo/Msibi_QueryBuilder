<?php

$configs = require_once 'configs/config.php';

//namespace MsibiQueryBuilder;

class DBConnection {

    private static $DBconnection = null;
    private static $connection = null;

    private function __construct($configs) {
    
        self::$connection = new PDO(
            "mysql:host={$configs['SERVER']};port={$configs['PORT']};dbname={$configs['DBNAME']}", 
            $configs['USERNAME'], 
            $configs['PASSWORD']
        );
        self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getConnection() {
        
        global $configs;

        if (self::$connection === null)
            self::$DBconnection = new DBConnection($configs['DATABASE']);

        return self::$connection;
    }

    public static function closeConnection(&$conn) {

        if ($conn !== null) $conn = null;
    }
}
