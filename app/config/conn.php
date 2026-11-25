<?php

    // Set timezone
    date_default_timezone_set('Asia/Kuala_Lumpur');

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

    // Set SQL timezone
    mysqli_query($conn, "SET time_zone = '+08:00'");

?>