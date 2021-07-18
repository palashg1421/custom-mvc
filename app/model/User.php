<?php

defined('ABSPATH') OR exit('No direct script access allowed');

use Core\model\Model;
use App\Helper;

class User extends Model
{
    private $table;

    public function __construct()
    {
        parent::__construct();
        $this->table = 'user';
    }

    public function getUsers()
    {
    }

    public function getUser($uid)
    {
    }

    public function addUser($data)
    {
        unset($data['submit']);
        return $this->create($this->table, $data);
    }

    public function editUser($uid, $data)
    {
    }

    public function deleteUser($uid)
    {
    }

}
