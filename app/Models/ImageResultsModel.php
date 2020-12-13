<?php

namespace App\Models;

use CodeIgniter\Model;

class ImageResultsModel extends Model
{
    protected $table = 'image_results';

    public function getImageResults($user_email = null)
    {
        if ($user_email == null) {
            return $this->findAll();
        } else {
            return $this->where(['user_email' => $user_email])->findAll();
        }
    }
    
    public function getImageResult($photo_id)
    {
        return $this->getWhere(['photo_id' => $photo_id])->getRowArray();
    }

    public function insertImageResults($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function updateImageResults($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, ['photo_id' => $id]);
    }

    public function deleteImageResults($id)
    {
        $query = $this->db->table($this->table)->delete(['photo_id' => $id]);
    }
}