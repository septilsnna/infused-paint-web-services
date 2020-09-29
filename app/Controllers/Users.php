<?php

namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\RESTful\ResourceController;

class Users extends ResourceController
{
    protected $format = 'json';
    protected $modelName = 'App\Models\UsersModel';

    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }
    public function index()                 // GET
    {
        $users = $this->usersModel->getUsers();

        return $this->respond($users, 200);
    }

    public function create()                // POST
    {
        $users = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ];

        $save = $this->usersModel->insertUsers($users);

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
        $users = $this->usersModel->getUsers($id);
        if (!empty($users)) {
            $output = [
                'username' => $users['username'],
                'password' => $users['password'],
                'name' => $users['name'],
                'email' => $users['email'],
                'edit_freq' => (int)$users['edit_freq'],
                'share_freq' => (int)$users['share_freq'],
                'created_at' => $users['created_at'],
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

    public function edit($id = null)        // Users/edit method POST
    {
        $users = $this->usersModel->getUsers($id);
        if (!empty($users)) {
            $output = [
                'username' => $users['username'],
                'password' => $users['password'],
                'name' => $users['name'],
                'email' => $users['email'],
                'edit_freq' => (int)$users['edit_freq'],
                'share_freq' => (int)$users['share_freq'],
                'created_at' => $users['created_at'],
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

    public function update($id = null)      // PUT
    {
        $data = $this->request->getRawInput();
        $users = $this->usersModel->getUsers($id);
        if (!empty($users)) {
            $updateUsers = $this->usersModel->updateUsers($data, $id);
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

    public function delete($id = null)      // DELETE
    {
        $users = $this->usersModel->getUsers($id);
        if (!empty($users)) {
            $deleteUsers = $this->usersModel->deleteUsers($id);
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