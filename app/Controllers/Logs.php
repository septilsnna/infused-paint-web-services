<?php

namespace App\Controllers;

use App\Models\LogsModel;
use CodeIgniter\RESTful\ResourceController;

class Logs extends ResourceController
{
    protected $format = 'json';
    protected $modelName = 'App\Models\LogsModel';

    public function __construct()
    {
        $this->logsModel = new LogsModel();
    }
    public function index()                 // GET
    {
        $logs = $this->logsModel->getLogs();

        return $this->respond($logs, 200);
    }

    public function create()                // POST
    {
        $logs = [
            'user_id' => $this->request->getPost('user_id'),
            'action' => $this->request->getPost('action'),
        ];

        $save = $this->logsModel->insertLogs($logs);

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

    public function show($user_id = null)        // Logs/show method POST
    {
        $logs = $this->logsModel->getLogs($user_id);
        if (!empty($logs)) {
            $output = [
                'id' => $logs['id'],
                'user_id' => $logs['user_id'],
                'action' => $logs['action'],
                'timestamp' => $logs['timestamp'],
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