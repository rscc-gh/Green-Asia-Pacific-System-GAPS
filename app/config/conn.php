<?php

    $hostname = "localhost";
    $user = "root";
    $password = "";
    $database = "gaps_db";
    
    try {
        $conn = mysqli_connect($hostname, $user, $password, $database);
    } catch (mysqli_sql_exception $e) {
        http_response_code(500);
        require __DIR__ . '/../views/errors/500.php';
        exit;
    }

?>