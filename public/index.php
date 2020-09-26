<?php

require __DIR__ . '/../vendor/autoload.php';

use App\DbConnection;
use Jenssegers\Blade\Blade;

$pdo = DbConnection::make();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $query = 'SELECT content FROM nodes WHERE id=1';
    $html = $pdo->query($query)->fetch();

    $blade = new Blade(__DIR__ . '/../views', __DIR__ . '/../cache');

    echo $blade->make('app', ['nodes' => htmlspecialchars_decode($html[0])])->render();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = $_POST['html'];
    $query = 'UPDATE nodes SET content=? WHERE id=?';
    $pdo->prepare($query)->execute([htmlspecialchars($content), 1]);
}
