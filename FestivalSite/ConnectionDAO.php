<?php
define('DB_HOST', "localhost");
define('DB_USER', "root");
define('DB_PASSWORD', "");
define('DB_DATABASE', "festivalsite");
$conn = "";


class databaseManager{
    public static $conn;

    function __destruct() {
        $this->close();
    }
    static function getConnection(){
        //Connectie maken
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
        if($conn->connect_error){
            die("Couldn't connect to database: " . $conn->connect_error);
        } else {
            self::$conn = $conn;
        }
        return self::$conn;
    }

    function close(){
        mysqli_close(self::$conn);
    }
}


?>