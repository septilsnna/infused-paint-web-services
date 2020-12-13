<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';

    public function getUsers($email = null)
    {
        if ($email == null) {
            return $this->findAll();
        } else {
            return $this->getWhere(['email' => $email])->getRowArray();
        }
    }

    public function insertUsers($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function updateUsers($data, $email)
    {
        $query = $this->db->table($this->table)->update($data, ['email' => $email]);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteUsers($email)
    {
        $query = $this->db->table($this->table)->delete(['email' => $email]);
    }
}