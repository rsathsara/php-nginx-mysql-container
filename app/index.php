<?php
$host = 'mysql';
$dbname = 'mydb';
$user = 'user';
$password = 'password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT * FROM users");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<h1>Users</h1>";
    echo "<ul>";
    foreach ($users as $user) {
        echo "<li>{$user['name']} - {$user['email']}</li>";
    }
    echo "</ul>";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>