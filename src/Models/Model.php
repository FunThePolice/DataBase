<?php

namespace App\Models;

use App\Database\Database;
use App\Helpers\Message;
use mysqli;

abstract class Model
{

    protected mysqli $db;
    protected string $table;
    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function addUser(array $params): void
    {
        $stmt = $this->db->prepare("INSERT INTO users (name,password,email) VALUES (?,?,?)");
        $password_hash = password_hash($params['password'], PASSWORD_DEFAULT);
        $stmt->bind_param("sss", $params['name'], $password_hash, $params['email']);
        $stmt->execute();
    }

    public function checkIfExist(string $table, string $column,string $param): bool
    {
        $stmt = $this->db->prepare("SELECT * FROM $table WHERE $column = ?");
        $stmt->bind_param('s',$param);
        $stmt->execute();
        $record = $stmt->get_result();
       if ($record->num_rows > 0) {
           Message::flash($param .' Уже используется');
            return true;
        } else {
            return false;
        }
    }

    public function updateUser(array $params, int $id): void
    {
        $sql = "UPDATE users SET name=?, password=?, email=? WHERE id=?";
        $stmt= $this->db->prepare($sql);
        $stmt->bind_param("sssi", $params['name'], $params['password'], $params['email'], $id);
        $stmt->execute();
    }

    public function getById(int $id): bool|array|null
    {
        $stmt = $this->db->prepare("SELECT * FROM $this->table WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $record = $stmt->get_result();
        return $record->fetch_assoc();
    }

    public function getByName(string $name): bool|array|null
    {
        $stmt = $this->db->prepare("SELECT * FROM $this->table WHERE name = ?");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $record = $stmt->get_result();
        return $record->fetch_assoc();
    }

    public function all(): array
    {
        $items = [];
        $stmt = $this->db->prepare("SELECT * FROM $this->table");
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $items[] = $row;
        }
        return $items;
    }

    public function addUsers(array $params): void
    {
        foreach ($params as $param) {
            $stmt = $this->db->prepare("INSERT INTO users (name,password,email) VALUES (?,?,?)");
            $stmt->bind_param("sss", $param['name'], $param['password'], $param['email']);
            $stmt->execute();
        }
    }

    public function delete(int $id): void
    {
        $sql = "DELETE FROM $this->table WHERE id=?";
        $stmt= $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

    public function deleteAll(): void
    {
        $sql = "DELETE FROM $this->table";
        $stmt= $this->db->prepare($sql);
        $stmt->execute();
    }

    public function getTable(): string
    {
        return $this->table;
    }

}