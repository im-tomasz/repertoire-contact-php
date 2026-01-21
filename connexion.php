<?php

function dbconnect() {
    try{
        $dsn = 'mysql:dbname=contacts;host=host.docker.internal';
        $user = 'greg';
        $password = 'greg';

        $dbh = new PDO($dsn, $user, $password);
        return $dbh;
    }catch(PDOException $e){
        echo $e->getMessage(); 
    }
}