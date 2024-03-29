<?php

namespace App\Database;

class DatabaseConfig
{
    private string $host;
    private int $port;
    private string $database;
    private string $userName;
    private string $password;

    public function __construct($host, $port, $userName, $database, $password)
    {
        $this->host = $host;
        $this->port = $port;
        $this->userName = $userName;
        $this->database = $database;
        $this->password = $password;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function getPort(): int
    {
        return $this->port;
    }

    public function getDatabase(): string
    {
        return $this->database;
    }

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getCharset()
    {
        return $this->charset ?? 'utf8mb4';
    }
}