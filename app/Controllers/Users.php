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
            'quota_today' => $this->request->getPost('quota_today'),
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

    public function show($email = null)        // Users/show method POST
    {
        $users = $this->usersModel->getUsers($email);
        if (!empty($users)) {
            $output = [
                'username' => $users['username'],
                'password' => $users['password'],
                'name' => $users['name'],
                'email' => $users['email'],
                'photo' => $users['photo'],
                'quota_today' => $users['quota_today'],
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

    public function edit($email = null)        // Users/edit method POST
    {
        $users = $this->usersModel->getUsers($email);
        if (!empty($users)) {
            $output = [
                'username' => $users['username'],
                'password' => $users['password'],
                'name' => $users['name'],
                'email' => $users['email'],
                'quota_today' => $users['quota_today'],
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

    public function update($email = null)      // PUT
    {
        $data = $this->request->getRawInput();
        $users = $this->usersModel->getUsers($email);
        if (!empty($users)) {
            $updateUsers = $this->usersModel->updateUsers($data, $email);
            $output = [
                'status' => 200,
                'message' => 'Berhasil mengupdate data',
                'data' => $data
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

    public function delete($email = null)      // DELETE
    {
        $users = $this->usersModel->getUsers($email);
        if (!empty($users)) {
            $deleteUsers = $this->usersModel->deleteUsers($email);
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