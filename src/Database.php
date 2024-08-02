<?php
namespace Levart;
class Database {
    private $pdo;

    public function __construct($config) {
        $dsn = "pgsql:host={$config['host']};dbname={$config['name']}";
        $this->pdo = new PDO($dsn, $config['user'], $config['pass']);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function insertEmail($to, $subject, $message, $status) {
        $stmt = $this->pdo->prepare("INSERT INTO emails (recipient, subject, message, status) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$to, $subject, $message, $status]);
    }
}
