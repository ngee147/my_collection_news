<?php

class Dbh {

      private static $instance = NULL;

      private const DB_SERVER_NAME = "localhost";
      private const DB_USER = "root";
      private const DB_PASSWORD = "";
      private const DB_NAME = "news";
      private const DB_CHARSET = "utf8mb4";

    /**
     * the constructor is set to private so
     * so nobody can create a new instance using new
     */
    private function __construct() {
        /*** maybe set the db name here later ***/
    }

    /**
     * Return DB instance or create intitial connection
     * @return object (PDO)
     * @access public
     */
    public static function getInstance() {
        if (!self::$instance) {
              try{
                $dsn = "mysql:host=".self::DB_SERVER_NAME.";dbname=".self::DB_NAME.";charset=".self::DB_CHARSET; //data source name
                $pdo = new PDO($dsn, self::DB_USER,self::DB_PASSWORD);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ); 
                $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);           
                return $pdo;
            }catch(PDOException $e){
                echo "Connection failed: ".$e->getMessage();
            }
       
        }
        return self::$instance;
    }
    /**
     * Like the constructor, we make __clone private
     * so nobody can clone the instance
     */
    private function __clone() {

    }
     
}/*** end of class ***/
