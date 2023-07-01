<?php

class Database{

    public static $connection;

    public static function setUpConnect(){
        if(!isset(Database::$connection)){
            Database::$connection = new mysqli("localhost", "root", "=eO_#p-.dzY#Z2g" ,"eshop", "3306");
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