<?php

     $hostname = "localhost";
     $username = "id10307640_root	";
     $password = "123123";
     $dbname = "id10307640_news";
     $charset = "utf8mb4";

try{
    $dsn = "mysql:host=".$hostname.";dbname=". $dbname.";charset=". $charset; //data source name
     $pdo = new PDO($dsn,  $username, $password);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ); 
     $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);           

}catch(Exception $e){
    echo "Connection err: ".$e->getMessage();
}

?>