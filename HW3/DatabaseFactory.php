<?php
class DatabaseConfig
{
    public $dbType;
    public $dbHost;
    public $dbName;
    public $dbUser;
    public $dbPass;
}

class DatabaseFactory
{
    public static function getDefaultPdoObject()
    {
        $connection_string = sprintf('%s:host=%s;dbname=%s', 
                                     'mysql',
                                     'localhost',
                                     'sakila'
                                     );
        $db = new PDO($connection_string, 'USER', 'PASSWORD');
        
        //Turns on debug exceptions.  Comment out for production
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }
    
    public static function getPdoObjectForDatabase($db_name)
    {
        $connection_string = sprintf('%s:host=%s;dbname=%s', 
                                     'mysql',
                                     'localhost',
                                     $db_name
                                     );
        $db = new PDO($connection_string, 'USER', 'PASSWORD');
        
        //Turns on debug exceptions.  Comment out for production
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }
    
    public static function getPdoObject($db_config)
    {
         $connection_string = sprintf('%s:host=%s;dbname=%s', 
                                     $db_config->dbType,
                                     $db_config->dbHost,
                                     $db_config->dbName
                                     );
        $db = new PDO($connection_string, $db_config->dbUser, $db_config->dbPass);
        return $db;
    }
}