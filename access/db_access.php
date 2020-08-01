<?php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'admin');
    define('DB_PASSWORD', 'makassar');
    define('DB_DATABASE', 'vsat_db');
    $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    $date = new DateTime("now", new DateTimeZone('Asia/Makassar') );
    $waktu = $date->format('Y-m-d H:i:s');
    $timestamp = date_timestamp_get($date);

    if(!$conn){
        echo 'Database Access Denied';
    }
?>