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
// $sql = 'SELECT * FROM posts WHERE id = :id';
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['id' => $id]);
// $post = $stmt->fetch();

// echo $post->body;

//GET ROW COUNT - positional params
// $stmt = $pdo->prepare('SELECT * FROM posts WHERE author = ?');
// $stmt->execute([$author]);
// $postCount = $stmt->rowCount();

// echo $postCount;

// INSERT DATA
// $title = 'The Science of Positive Thinking';
// $body = 'Incorporating positive thinking into daily life can yield remarkable benefits. By maintaining an optimistic outlook, individuals can enhance resilience, boost mood, and improve overall well-being. Practicing gratitude, visualization, and affirmations fosters a positive mindset, empowering individuals to overcome challenges and achieve their goals with confidence and enthusiasm.';
// $author = 'Jessica Williams';

// $sql = 'INSERT INTO  posts (title, body, author) VALUES(:title, :body, :author)';
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['title' => $title, 'body' => $body, 'author' => $author]);
// echo 'Post Added';

// UPDATE DATA
// $id = 1;
// $body = 'This is an updated post.';

// $sql = 'UPDATE posts SET body = :body WHERE id=:id';
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['body' => $body,  'id' => $id]);
// echo 'Post Updated';

//DELETE DATA
$id = 5;

$sql = 'DELETE FROM posts WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);
echo 'Post Deleted';
