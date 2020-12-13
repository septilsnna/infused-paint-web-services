<?php

namespace App\Controllers;

use App\Models\ImageResultsModel;
use CodeIgniter\RESTful\ResourceController;

class Imageresults extends ResourceController
{
    protected $format = 'json';
    protected $modelName = 'App\Models\ImageResultsModel';

    public function __construct()
    {
        $this->imageresultsModel = new ImageResultsModel();
    }
    public function index()                 // GET
    {
        $imageresults = $this->imageresultsModel->getImageResults();

        return $this->respond($imageresults, 200);
    }

    public function create()                // POST
    {
        $imageresults = [
            'user_email' => $this->request->getPost('user_email'),
            'style_id' => (int)$this->request->getPost('style_id'),
            'content_image' => $this->request->getPost('content_image'),
            'file_result' => $this->request->getPost('file_result'),
        ];

        $save = $this->imageresultsModel->insertImageResults($imageresults);

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

    public function show($user_email = null, $photo_id = null)        // Users/show method POST
    {
        if($photo_id == null) {
            $imageresults = $this->imageresultsModel->getImageResults($user_email);
            if (!empty($imageresults)) {
                // $output = [
                //     'photo_id' => (int)$imageresults['photo_id'],
                //     'user_email' => $imageresults['user_email'],
                //     'style_id' => (int)$imageresults['style_id'],
                //     'content_image' => $imageresults['content_image'],
                //     'file_result' => $imageresults['file_result'],
                //     'share_ig' => $imageresults['share_ig'],
                //     'share_twitter' => $imageresults['share_twitter'],
                //     'share_fb' => $imageresults['share_fb'],
                //     'created_at' => $imageresults['created_at'],
                // ];
                return $this->respond($imageresults, 200);
            } else {
                $output = [
                    'status' => 400,
                    'message' => 'Gagal menemukan data',
                    'data' => ''
                ];
                return $this->respond($output, 400);
            }
        } else {
            $imageresults = $this->imageresultsModel->getImageResult($photo_id);
            if (!empty($imageresults)) {
                $output = [
                    'photo_id' => (int)$imageresults['photo_id'],
                    'user_email' => $imageresults['user_email'],
                    'style_id' => (int)$imageresults['style_id'],
                    'content_image' => $imageresults['content_image'],
                    'file_result' => $imageresults['file_result'],
                    'share_ig' => $imageresults['share_ig'],
                    'share_twitter' => $imageresults['share_twitter'],
                    'share_fb' => $imageresults['share_fb'],
                    'created_at' => $imageresults['created_at'],
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
    }

    public function edit($id = null)    // Users/edit method POST
    {
        $imageresults = $this->imageresultsModel->getImageResults($id);
        if (!empty($imageresults)) {
            $output = [
                'photo_id' => (int)$imageresults['photo_id'],
                'user_email' => $imageresults['user_email'],
                'style_id' => (int)$imageresults['style_id'],
                'content_image' => $imageresults['content_image'],
                'file_result' => $imageresults['file_result'],
                'share_id' => $imageresults['share_id'],
                'share_twitter' => $imageresults['share_twitter'],
                'share_fb' => $imageresults['share_fb'],
                'created_at' => $imageresults['created_at'],
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
        $imageresults = $this->imageresultsModel->getImageResults($id);
        if (!empty($imageresults)) {
            $updateimageresults = $this->imageresultsModel->updateImageResults($data, $id);
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
        $imageresults = $this->imageresultsModel->getImageResults($id);
        if (!empty($imageresults)) {
            $deleteimageresults = $this->imageresultsModel->deleteImageResults($id);
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