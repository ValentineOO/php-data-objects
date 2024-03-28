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

// set the default query to fetch obj
$pdo->setAttribute(pdo::ATTR_DEFAULT_FETCH_MODE, pdo::FETCH_OBJ);

//PDO Query
// $stmt = $pdo->query('SELECT * FROM posts');

// as an array
// while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//     echo $row['title'] . '<br>';
// }

// as object
// while ($row = $stmt->fetch()) {
//     echo $row->title . '<br>';
// }


// PREPARED STATEMENTS
# PREPARED STATEMENTS ( prepare & execute)

// UNSAFE
// $sql = "SELECT * FROM posts WHERE author = '$author'";

// FETCH MULTIPLE POSTS
// Positional Params (?)

$author = 'Sarah Johnson';
$is_published = true;
$id = 1;

// $sql = 'SELECT * FROM posts WHERE author = ?';
// $stmt = $pdo->prepare($sql);
// $stmt->execute([$author]);
// $posts = $stmt->fetchAll();

//Named Params
// $sql = 'SELECT * FROM posts WHERE author = :author && is_published = :is_published';
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['author' => $author, 'is_published' => $is_published]);
// $posts = $stmt->fetchAll();


// foreach ($posts as $post) {
//     echo $post->title . '<br>';
// }

//FETCH SINGLE POST
$sql = 'SELECT * FROM posts WHERE id = :id';
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);
$post = $stmt->fetch();

echo $post->body;
