<?php

try {

    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "peer";
    $charset = "utf8mb4";

    $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

    $options = [
        PDO::ATTR_ERRMODE               =>  PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE    =>  PDO::FETCH_OBJ
    ];

    $pdo = new PDO($dsn, $user, $password, $options);

}catch(PDOException $ex) {
    echo $ex->getMessage();
}