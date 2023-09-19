<!-- จัดการข้อมูลผู้ใช้ -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admindata extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // ถ้าตัวแปล session ไม่เท่ากับ 1
        if($this->session->userdata('type') != 1){
            // ให้ดีดไปที่หน้า login
            redirect('login','refresh');
        }
        $this->load->model('Announce_models');
        $this->load->model('User_models');
    }

	
	public function index()
	{
        $data['rulesActive'] = $this->Announce_models->ruleActive();
        $data['allow'] = $this->User_models->userCanLogin();
        $data['unallow'] = $this->User_models->userUnLogin();
        // echo '<pre>';
        // print_r($data);
        // echo '<pre>';
        // exit;

        // print_r($_SESSION);
        $this->load->view('css');
		$this->load->view('admin/admin',$data);
		
	}
   
}
