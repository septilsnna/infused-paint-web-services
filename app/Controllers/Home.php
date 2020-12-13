<?php

namespace App\Controllers;
use App\Models\UsersModel;
use App\Models\ImageResultsModel;
use App\Models\ImageStylesModel;
use App\Models\LogsModel;

class Home extends BaseController
{
    protected $usersModel;
    protected $imageResultsModel;
    protected $imageStylesModel;
    protected $logsModel;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->usersModel = new UsersModel();
        $this->imageResultsModel = new ImageResultsModel();
        $this->imageStylesModel = new ImageStylesModel();
        $this->logsModel = new LogsModel();
    }
    
	public function index()
	{
	    if(isset($_SESSION['admin'])){
	        $users = count($this->usersModel->getUsers());
	        $users_list = $this->usersModel->getUsers();
	        $artworks = count($this->imageResultsModel->getImageResults());
	        $styles = $this->imageStylesModel->getImageStyles();
	        
	        foreach ($users_list as $key => $part) {
                $sort[$key] = strtotime($part['created_at']);
            }
            array_multisort($sort, SORT_DESC, $users_list);
            
	        $data = [
	            'users' => $users,
	            'users_list' => $users_list,
	            'artworks' => $artworks,
	            'styles' => $styles
	        ];
	        
	        return view('pages/dashboard', $data);
	    } else {
	        return view('pages/login');
	    }
	}
	
	public function login()
	{
	    $username = $this->request->getVar('username');
	    $password = $this->request->getVar('password');
	    
	    if($username == 'bismillahlulusmobcom'){
	        if($password == 'semogalulusmobcom') {
    	        $_SESSION['admin'] = true;
    	        return redirect()->to('/home/index');
	        }
	    }
	}
	
	public function logout()
	{
	    $this->session->remove('admin');
        $this->session->destroy();
        return redirect()->to('/home/index');
	}
	
	public function endpoints()
	{
	    return view('pages/endpoints');
	}
	
	public function detail($email)
	{
	   $users = $this->usersModel->getUsers($email);
	   $user_id = $users['username'];
	   $logs = $this->logsModel->where('user_id', $user_id)->findAll();
	   
	   if($logs) {
    	   foreach ($logs as $key => $part) {
              $sort[$key] = strtotime($part['timestamp']);
           }
           array_multisort($sort, SORT_DESC, $logs);
	   }
            
	   $data = [
	    'username' => $user_id,
	    'users' => $users,
	    'logs' => $logs
	   ];
	        
	   return view('pages/detail', $data);
	}

	//--------------------------------------------------------------------

}