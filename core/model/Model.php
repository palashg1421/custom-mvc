<?php

namespace Core\model;

defined('ABSPATH') OR exit('No direct script access allowed');

use App\Database;

class Model extends Database
{
    private $sql;

    public function __construct()
    {
        parent::__construct();
    }

    public function create($table, $data ) {

        $columns = implode(', ', array_keys($data));
        $placeholders = implode(',:', array_keys($data));
        $executeArr = [];
        foreach( $data as $key => $value )
        {
            $executeArr[':'.$key] = $value;
        }

        $this->sql = "INSERT INTO user ($columns) VALUES (:$placeholders)";
        $this->statement = $this->pdo->prepare($this->sql);
        $this->statement->execute($executeArr);
        return $this->statement->rowCount();
    }
}
