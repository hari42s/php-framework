<?php

class BaseModel
{

    private static $db_conn;

    public function __construct()
    { 
            try {
                $db_conn = new PDO("mysql:host=localhost;dbname=wishes", 'root', '');
                $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $db_conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                self::$db_conn = $db_conn;
            } catch (PDOException $e) {
                die($e->getMessage());
            }
    }

    public static function connect()
    {
        if (!self::$db_conn) {
            new BaseModel();
        }
        return self::$db_conn;
    }

 }