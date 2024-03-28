<?php
require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$host = $_ENV["DB_HOST"];
$dbname = $_ENV["DB_NAME"];
$username = $_ENV["DB_USERNAME"];
$password = $_ENV["DB_PASSWORD"];

// Set DSN
$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

// Create a PDO instance
$pdo = new PDO($dsn, $username, $password);

//PDO Query
$stmt = $pdo->query('SELECT * FROM posts');

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo $row['title'] . '<br>';
}



// $koneksi = mysqli_connect($host, $user, $pass, $db);
