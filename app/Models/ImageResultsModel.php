<?php

namespace App\Models;

use CodeIgniter\Model;

class ImageResultsModel extends Model
{
    protected $table = 'image_results';

    public function getImageResults($id = null)
    {
        if ($id == null) {
            return $this->findAll();
        } else {
            return $this->getWhere(['photo_id' => $id])->getRowArray();
        }
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