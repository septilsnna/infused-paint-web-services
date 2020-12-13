<?php

namespace App\Controllers;

use App\Models\ImageStylesModel;
use CodeIgniter\RESTful\ResourceController;

class Imagestyles extends ResourceController
{
    protected $format = 'json';
    protected $modelName = 'App\Models\ImageStylesModel';

    public function __construct()
    {
        $this->imagestylesModel = new ImageStylesModel();
    }
    public function index()                 // GET
    {
        $imagestyles = $this->imagestylesModel->getImageStyles();

        return $this->respond($imagestyles, 200);
    }

    public function create()                // POST
    {
        $imagestyles = [
            'style_id' => $this->request->getPost('style_id'),
            'title' => $this->request->getPost('title'),
            'creator' => $this->request->getPost('creator'),
            'image_story' => $this->request->getPost('image_story'),
            'image_file' => $this->request->getPost('image_file'),
        ];

        $save = $this->imagestylesModel->insertImageStyles($imagestyles);

        if ($save == true) {
            $output = [
                'status' => 200,
                'message' => 'Berhasil menyimpan data',
                'data' => ''
            ];
            return $this->respond($output, 200);
        } else {
            $output = [
                'status' => 400,
                'message' => 'Gagal menyimpan data',
                'data' => ''
            ];
            return $this->respond($output, 400);
        }
    }

    public function show($id = null)        // Users/show method POST
    {
        $imagestyles = $this->imagestylesModel->getImageStyles($id);
        if (!empty($imagestyles)) {
            $output = [
                'style_id' => (int)$imagestyles['style_id'],
                'title' => $imagestyles['title'],
                'creator' => $imagestyles['creator'],
                'image_story' => $imagestyles['image_story'],
                'image_file' => $imagestyles['image_file'],
                'used_freq' => (int)$imagestyles['used_freq'],
                'created_at' => $imagestyles['created_at'],
            ];
            return $this->respond($output, 200);
        } else {
            $output = [
                'status' => 400,
                'message' => 'Gagal menemukan data',
                'data' => ''
            ];
            return $this->respond($output, 400);
        }
    }

    public function edit($id = null)    // Users/edit method POST
    {
        $imagestyles = $this->imagestylesModel->getImageStyles($id);
        if (!empty($imagestyles)) {
            $output = [
                'style_id' => (int)$imagestyles['style_id'],
                'title' => $imagestyles['title'],
                'creator' => $imagestyles['creator'],
                'image_story' => $imagestyles['image_story'],
                'image_Style' => $imagestyles['image_Style'],
                'used_freq' => (int)$imagestyles['used_freq'],
                'created_at' => $imagestyles['created_at'],
            ];
            return $this->respond($output, 200);
        } else {
            $output = [
                'status' => 400,
                'message' => 'Gagal menemukan data',
                'data' => ''
            ];
            return $this->respond($output, 400);
        }
    }

    public function update($id = null)  // PUT
    {
        $data = $this->request->getRawInput();
        $imagestyles = $this->imagestylesModel->getImageStyles($id);
        if (!empty($imagestyles)) {
            $updateimagestyles = $this->imagestylesModel->updateImageStyles($data, $id);
            $output = [
                'status' => 200,
                'message' => 'Berhasil mengupdate data',
                'data' => ''
            ];
            return $this->respond($output, 200);
        } else {
            $output = [
                'status' => 400,
                'message' => 'Gagal menemukan data',
                'data' => ''
            ];
            return $this->respond($output, 400);
        }
    }

    public function delete($id = null)  // DELETE
    {
        $imagestyles = $this->imagestylesModel->getImageStyles($id);
        if (!empty($imagestyles)) {
            $deleteimagestyles = $this->imagestylesModel->deleteImageStyles($id);
            $output = [
                'status' => 200,
                'message' => 'Berhasil menghapus data',
                'data' => ''
            ];
            return $this->respond($output, 200);
        } else {
            $output = [
                'status' => 400,
                'message' => 'Gagal menemukan data',
                'data' => ''
            ];
            return $this->respond($output, 400);
        }
    }

    //--------------------------------------------------------------------

}