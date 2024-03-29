<?php

namespace App;

use App\Database\Database;
use App\Models\Model;
use App\Models\User;
use mysqli;

class Builder
{
    protected mysqli $db;
    protected Database $connection;

    public function __construct()
    {
        $this->connection = new Database();
        $this->db = $this->connection->getConnection();
    }

    public function createUser($name,$email,$password): void
    {
        $user = new User();
        $params = $user->formSingleInput($name,$email,$password);
        $user->save($params);
    }

    public function all(string $table): array
    {
        return $this->connection->all($table);
    }

    public function updateUserById(array $params, int $id)
    {
        $user = new User();
        $user->updateUser($params,$id);
    }

}