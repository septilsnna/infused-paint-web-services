<?php

namespace App\Models;

use CodeIgniter\Model;

class LogsModel extends Model
{
    protected $table = 'log';

    public function getLogs($user_id = null)
    {
        if ($user_id == null) {
            return $this->findAll();
        } else {
            return $this->getWhere(['user_id' => $user_id])->getRowArray();
        }
    }

    public function insertLogs($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}