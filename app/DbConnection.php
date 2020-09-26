<?php

namespace App;

use Dotenv\Dotenv;
use PDO;

class DbConnection
{
    public static function make()
    {
        if (file_exists(__DIR__ . '/../.env')) {
            $dotenv = Dotenv::createUnsafeImmutable(__DIR__ . '/..');
            $dotenv->load();
        }
        $db = parse_url(getenv("DATABASE_URL"));

        try {
            $connection = new PDO("pgsql:" . sprintf(
                "host=%s;port=%s;user=%s;password=%s;dbname=%s",
                $db["host"],
                $db["port"],
                $db["user"],
                $db["pass"],
                ltrim($db["path"], "/")
            ));
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $connection;
    }
}
