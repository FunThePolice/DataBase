<?php

namespace App\Helpers;

class CheckBox
{
    public static function AuthCheck(): void
    {
        if (!isset($_SESSION['is_authorised']) && !$_SESSION['is_authorised']){
            Message::flash('Вы не авторизованы');
            header('Location: /login');
        }
    }

}