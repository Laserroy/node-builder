<?php

use App\SqliteConnection;

require __DIR__ . '/../vendor/autoload.php';

$pdo = (new SQLiteConnection())->connect();

if ($_POST['html']) {
    $content = $_POST['html'];
    $query = 'UPDATE nodes SET content=? WHERE id=?';
    $pdo->prepare($query)->execute([$content, 1]);
}

echo file_get_contents(__DIR__ . '/html/index.html');