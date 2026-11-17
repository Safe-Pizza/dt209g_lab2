<?php

class Database
{
    private PDO $pdo;

    public function __construct()
    {
        try { //create database connection
            $this->pdo = new PDO(
                'mysql:host=' . DBHOST . ';dbname=' . DBDATABASE . ';charset=utf8mb4',
                DBUSER,
                DBPASSWORD,
                [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]
            );
        } catch (PDOException $e) {
            throw new RuntimeException('Kunde inte ansluta till databasen' . $e->getMessage(), 0, $e);
        }
    }

    //return database connection
    public function getConnection(): PDO
    {
        return $this->pdo;
    }

    //function for prepared SQL-statement
    public function run(string $sql, array $params = []): PDOStatement
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function lastInsertId(): int
    {
        return (int)$this->pdo->lastInsertId();
    }
}