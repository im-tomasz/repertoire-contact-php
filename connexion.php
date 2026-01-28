<?php

function dbconnect() {
    try{
        $dsn = 'mysql:dbname=contacts;host=host.docker.internal';
        $user = 'greg';
        $password = 'greg';

           $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        $dbh = new PDO($dsn, $user, $password);
        return $dbh;
    }catch(PDOException $e){
        echo $e->getMessage(); 
    }
}