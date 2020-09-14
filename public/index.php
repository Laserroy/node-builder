<?php

use App\SqliteConnection;

require __DIR__ . '/../vendor/autoload.php';

$pdo = (new SQLiteConnection())->connect();

if ($_POST['html']) {
    $query = ""
}

echo file_get_contents(__DIR__ . '/html/index.html');