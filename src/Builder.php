<?php

namespace App;

use App\Database\Database;
use App\Helpers\Message;
use App\Models\User;
use JetBrains\PhpStorm\NoReturn;
use mysqli;

class Builder
{
    protected mysqli $db;
    protected User $user;

    public function __construct()
    {
        $this->db = Database::connect();
        $this->user = new User();
    }

    public function registerUser(): void
    {

        if (!$this->user->checkIfExist($this->user->getTable(),'name',$_POST['name'])) {
            $this->user->formInput($_POST['name'],$_POST['email'],$_POST['password']);
            $this->user->save();
            $_SESSION['is_authorised'] = true;
            header('Location: /profile');
        } else {
            header('Location: /registration');
            die;
        }

    }

     public function loginUser(): void
     {
         $user = $this->verifyLogin();
         $this->verifyPassword($user);
     }

    public function verifyLogin(): bool|array|null
    {
        if ($this->user->checkIfExist($this->user->getTable(),'name',$_POST['name'])) {
            $result = $this->user->getByName($_POST['name']);

        } else {
            Message::flash('Неверный логин');
            header('Location: /signIn');
            die;

        }
        return $result;
    }

    public function verifyPassword($user): void
    {
        if (password_verify($_POST['password'], $user['Password'])) {
            $_SESSION['is_authorised'] = true;
            header('Location: /profile');
        } else {

            Message::flash('Неверный пароль');
            header('Location: /signIn');
            die;

        }
    }
    #[NoReturn] public function logOutUser(): void
    {
         unset($_SESSION['is_authorised']);
         Message::flash('Вы вышли из профиля');
         header('Location: /');
         die;
    }

}