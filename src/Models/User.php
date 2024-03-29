<?php

namespace App\Models;

use App\Database\Database;

class User extends Model
{
    protected string $table = 'users';
    protected array $fillable = [];

    protected string $name;
    protected string $email;
    protected string $password;

    public function __construct()
    {
        parent::__construct();
    }

    public function formSingleInput($name,$email,$password): array
    {
        $this->fillable = [
            'name' => $name,
            'email' => $email,
            'password' => $password];

        return $this->fillable;
    }

    public function formMultiInput(): array
    {
        $this->fillable[] = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password];

        return $this->fillable;
    }
    public function save(): void
    {
        $this->addUser($this->fillable);
    }

    public function update($id): void
    {
        $this->updateUser($this->fillable,$id);
    }



}