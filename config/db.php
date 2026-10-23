<?php
$host = 'HOST_FROM_HOSTING';
$user = 'DATABASE_USERNAME';
$pass = 'DATABASE_PASSWORD';
$dbname = 'DATABASE_NAME';

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    exit('Database connection failed');
}

mysqli_set_charset($conn, 'utf8mb4');