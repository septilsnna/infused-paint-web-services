<?php

namespace App\Models;

use CodeIgniter\Model;

class ImageStylesModel extends Model
{
    protected $table = 'image_styles';

    public function getImageStyles($id = null)
    {
        if ($id == null) {
            return $this->findAll();
        } else {
            return $this->getWhere(['style_id' => $id])->getRowArray();
        }
    }

    public function insertImageStyles($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function updateImageStyles($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, ['style_id' => $id]);
    }

    public function deleteImageStyles($id)
    {
        $query = $this->db->table($this->table)->delete(['style_id' => $id]);
    }
}