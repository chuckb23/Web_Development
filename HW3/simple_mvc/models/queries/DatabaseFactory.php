<?php
class DatabaseFactory
{
    /**
     * 
     * @return \PDO
     */
    public static function getDefaultPdoObject()
    {
        //echo "Opening db";
        $connection_string = sprintf('%s:host=%s;dbname=%s', 
                                     'mysql',
                                     'localhost',
                                     'sakila'
                                     );
        //echo $connection_string;
        $db = new PDO($connection_string, 'root', 'Mchuckb23');
      //  echo "DB is loaded \r\n";
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
?>
