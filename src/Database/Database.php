<?php

namespace App\Database;

use mysqli;

class Database
{
    public static function connect(): mysqli
    {
        static $db;

        if (!$db) {
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $config = new DatabaseConfig();
            $db = new mysqli(
                $config->getHost(),
                $config->getUserName(),
                $config->getPassword(),
                $config->getDatabase(),
                $config->getPort()
            );
            $db->set_charset($config->getCharset());
            $db->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
        }

        return $db;
    }

}