<?php

class Database{

    public static $connection;

    private static function setUpConnect(){
        if(!isset(Database::$connection)){
            Database::$connection = new mysqli("localhost", "root", "PCBEY1dXkPswmUa" ,"eshop", "3306");
        }
        if(self::$connection == false){
            return false;
        }
        return Database::$connection;
    }


    public static function iud($q){
        Database::setUpConnect();
        Database::$connection->query($q);
    }

    public static function search($q){
        Database::setUpConnect();
        $resulset = Database::$connection->query($q);
        return  $resulset;
    }

}


?>