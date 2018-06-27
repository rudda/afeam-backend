<?php
namespace afeam\database;

use PDO;
     class Connection {

        public static $DATABASE_NAME= "afeam";
        public static $DATABASE_PASS= "";
        public static $DATABASE_USER= "root";
        public static $DATABASE_PORT="80";
        public static $DATABASE_HOST= "localhost";


        function __construct(){

            $this->connect();

        }

        function connect(){

            try {
                $conn = new PDO('mysql:host='.self::$DATABASE_HOST.';dbname='.self::$DATABASE_NAME, self::$DATABASE_USER,self::$DATABASE_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $conn;
                
            }
            catch(PDOException $e)
            {
                return false;
            }

        }

    }
