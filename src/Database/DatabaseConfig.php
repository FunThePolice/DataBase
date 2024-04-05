<?php

namespace App\Database;

const CONFIG =
['host'=>'localhost',
    'port' => 3306,
    'userName' => 'root',
    'database' => 'users',
    'password'=> ''];

class DatabaseConfig
{
    private string $host;
    private int $port;
    private string $database;
    private string $userName;
    private string $password;

    public function __construct()
    {
        $this->setHost(CONFIG['host']);
        $this->setPort(CONFIG['port']);
        $this->setUserName(CONFIG['userName']);
        $this->setDatabase(CONFIG['database']);
        $this->setPassword(CONFIG['password']);
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function setHost(string $host): void
    {
        $this->host = $host;
    }

    public function getPort(): int
    {
        return $this->port;
    }

    public function setPort(int $port): void
    {
        $this->port = $port;
    }

    public function getDatabase(): string
    {
        return $this->database;
    }

    public function setDatabase(string $database): void
    {
        $this->database = $database;
    }

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getCharset()
    {
        return $this->charset ?? 'utf8mb4';
    }
}