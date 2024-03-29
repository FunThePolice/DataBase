<?php

namespace App\Database;

use mysqli;

class Database
{
    protected mysqli $db;
    public function __construct()
    {
        $config = new DatabaseConfig('localhost',3306,'root','users','');
        $this->connect($config);
    }

    public function connect(DatabaseConfig $config): void
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $this->db = new mysqli(
            $config->getHost(),
            $config->getUserName(),
            $config->getPassword(),
            $config->getDatabase(),
            $config->getPort()
        );
        $this->db->set_charset($config->getCharset());
        $this->db->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
    }

    public function getConnection(): mysqli
    {
        return $this->db;
    }


}