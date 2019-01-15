<?php 
class Database
{ 
    private static $bdd = null;

    const ERROR_LOG_FILE = "error_log_file.txt";

    private function __construct()
    {
        $host = 'localhost';
        $user = 'root';
        $pass = 'root';
        $db = 'blog';
        try
        {
            self::$bdd = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
        }

        catch (Exception $e)
        {
            echo "PDO ERROR: " . $e->getMessage() . " storage in " . ERROR_LOG_FILE . "\n";
            error_log($e->getMessage(), 3, ERROR_LOG_FILE);
        }
    }

    public static function getbdd(){
        if(is_null(self::$bdd)) {
            new Database();
        } 
        return self::$bdd;
    }
}
?>