<?php

namespace App;

class SqliteConnection
{

    private $pdo;

    public function connect()
    {
        if ($this->pdo == null) {
            try {
                $this->pdo = new \PDO("sqlite:" . DbConfig::PATH_TO_SQLITE_FILE);
            } catch (\PDOException $e) {
                echo $e;
            }
        }

        return $this->pdo;
    }
}
