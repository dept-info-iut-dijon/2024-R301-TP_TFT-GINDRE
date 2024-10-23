<?php

namespace Models;

use PDO;
use PDOStatement;

abstract class BasePDODAO
{
    private PDO $pdo;

    protected function execRequest(string $sql, array $params = null) : PDOStatement|false {
        $stmt = $this->getDB()->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    private function getDB() : PDO
    {
        if (!isset($this->pdo)) {
            $this->pdo = new PDO(\Config\Config::get('dsn'), \Config\Config::get('user'), \Config\Config::get('pass'));
        }
        return $this->pdo;
    }
}
