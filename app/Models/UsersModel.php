<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';

    public function getUsers($id = null)
    {
        if ($id == null) {
            return $this->findAll();
        } else {
            return $this->getWhere(['username' => $id])->getRowArray();
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

    public function updateUsers($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, ['username' => $id]);
    }

    public function deleteUsers($id)
    {
        $query = $this->db->table($this->table)->delete(['username' => $id]);
    }
}