<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FineTypedata extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Fine_models');
        $this->load->model('Book_models');
        $this->load->model('Staff_models');
        $this->load->model('Autocomplete_models');


    }
	public function index()
	{
        $adfineType = array();
        $adfineRate = array();
        $result1  = $this->Autocomplete_models->autofinetype1(); //collect all college name   
        $result2 = $this->Autocomplete_models->autofinetype2(); 
        foreach($result1 as $key=>$value){
           array_push($adfineType, $value["fineType"]);
        }
        foreach($result2 as $key=>$value){
            array_push($adfineRate, $value["fineRate"]);
         }
        $data['adfineType'] = $adfineType;
        $data['adfineRate'] = $adfineRate;

        $this->load->view('css');
		$this->load->view('admin/fine_view',$data);
		
	}

    public function fineView()
	{
        $offineType = array();
        $offineRate = array();
        $result1  = $this->Autocomplete_models->autofinetype1(); //collect all college name   
        $result2 = $this->Autocomplete_models->autofinetype2(); 
        foreach($result1 as $key=>$value){
           array_push($offineType, $value["fineType"]);
        }
        foreach($result2 as $key=>$value){
            array_push($offineRate, $value["fineRate"]);
         }
        $data['offineType'] = $offineType;
        $data['offineRate'] = $offineRate;

        $this->load->view('css');
		$this->load->view('officer/officerFine_view',$data);
		
	}

    public function addfine()
    {
        // การตั้งกฎในการเช็คข้อมูล เช่น ตัดช่องว่าง บังคับกรอกข้อมูล กรอกข้อมูลมากสุดได้เท่าไหร่
        //$this->form_validation->set_rules('fineType_id', 'fineType_id', 'trim|required|max_length[5]');
        $this->form_validation->set_rules('fineType', 'FineType', 'trim|required');
        $this->form_validation->set_rules('fineRate', 'FineRate', 'trim|required');
        $this->form_validation->set_rules('fineType_Status', 'FineType_Status', 'trim|required');
        //    $this->form_validation->set_rules('image','image', 'trim');
        // แบบที่1
        //หากมีข้อผิดพลาด
        //    แบบที่1
        //     if($this->form_validation->run() == FALSE){
        //         echo 'baba';
        //         $this->load->view('admin/staff_view');

        //    }else{

        //         // echo "<pre>";
        //         // print_r($_POST);
        //         // echo "</pre>";
        //         //  exit;

        //         //เรียกใช้ models
        //         $this->Staff_models->addstaff();
        //         redirect('Showdata/staffShow','refresh');

        //    }

        // แบบที่2
        $type = $_SESSION['type'];
        if ($type == 1) {
            if ($this->form_validation->run() == FALSE) {
                // echo 'bibi';
                $adfineType = array();
                $adfineRate = array();
                $result1  = $this->Autocomplete_models->autofinetype1(); //collect all college name   
                $result2 = $this->Autocomplete_models->autofinetype2(); 
                foreach($result1 as $key=>$value){
                array_push($adfineType, $value["fineType"]);
                }
                foreach($result2 as $key=>$value){
                    array_push($adfineRate, $value["fineRate"]);
                }
                $data['adfineType'] = $adfineType;
                $data['adfineRate'] = $adfineRate;

                $this->load->view('css');
                $this->load->view('admin/fine_view',$data);
            } else {
                $this->Fine_models->addfine();
                redirect('Showdata/fineShow', 'refresh');
            }
        } elseif ($type == 2) {
            if ($this->form_validation->run() == FALSE) {
                // echo 'baba';
                $offineType = array();
                $offineRate = array();
                $result1  = $this->Autocomplete_models->autofinetype1(); //collect all college name   
                $result2 = $this->Autocomplete_models->autofinetype2(); 
                foreach($result1 as $key=>$value){
                array_push($offineType, $value["fineType"]);
                }
                foreach($result2 as $key=>$value){
                    array_push($offineRate, $value["fineRate"]);
                }
                $data['offineType'] = $offineType;
                $data['offineRate'] = $offineRate;

                $this->load->view('css');
                $this->load->view('officer/officerFine_view',$data);
            } else {
                $this->Fine_models->addfine();
                redirect('Showdata/offineShow', 'refresh');
            }
        }
    }

    public function edit($fineType_id)
    {
        // เป็นการเรียกใช้ model
        // ในการรับข้อมูลจะต้องมีการส่ง user_id เพราะมีการส่งจาก Url
        $data['query'] = $this->Fine_models->read($fineType_id);

        // แบบที่2
        $type = $_SESSION['type'];

        if ($type == 1) {

            $this->load->view('css');
            $this->load->view('admin/fineEdit_view', $data);
        } elseif ($type == 2) {
            $offineTedit = array();
            $offineRedit = array();
            $result1  = $this->Autocomplete_models->autofinetype1(); //collect all college name   
            $result2 = $this->Autocomplete_models->autofinetype2(); 
            foreach($result1 as $key=>$value){
            array_push($offineTedit, $value["fineType"]);
            }
            foreach($result2 as $key=>$value){
                array_push($offineRedit, $value["fineRate"]);
            }
            $data['offineTedit'] = $offineTedit;
            $data['offineRedit'] = $offineRedit;

            $this->load->view('css');
            $this->load->view('officer/offineEdit_view', $data);
        }
    }

    public function editfine($fine_id)
    {
        // เป็นการเรียกใช้ model
        // ในการรับข้อมูลจะต้องมีการส่ง user_id เพราะมีการส่งจาก Url
        $data['query'] = $this->Fine_models->readfine($fine_id);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;

        $this->load->view('css');
        $this->load->view('officer/fineuserEdit_view', $data);

    }

    public function editfinedata()
    {
        // การตั้งกฎในการเช็คข้อมูล เช่น ตัดช่องว่าง บังคับกรอกข้อมูล กรอกข้อมูลมากสุดได้เท่าไหร่
        //$this->form_validation->set_rules('workDetails_id', 'workDetails_id', 'trim|required|max_length[5]');
        $this->form_validation->set_rules('fineType', 'fineType', 'trim|required');
        $this->form_validation->set_rules('fineRate', 'fineRate', 'trim|required');
        $this->form_validation->set_rules('fineType_Status', 'fineType_Status', 'trim|required');
        //    $this->form_validation->set_rules('image','image', 'trim');

        // แบบที่2
        $type = $_SESSION['type'];
        if ($type == 1) {
            if ($this->form_validation->run() == FALSE) {
                // echo 'bibi';
                // $this->load->view('admin/staff_view');

                $fineType_id = $this->input->post('fineType_id');
                $data['query'] = $this->Fine_models->read($fineType_id);

                // แสดงข้อมูล data เพื่อดูว่าสามารถ query ข้อมูลออกมาได้หรือเปล่า
                // echo "<pre>";
                // print_r($data);
                // echo "</pre>";
                //  exit;

                // แบบที่1
                $this->load->view('css');
                $this->load->view('admin/fineEdit_view', $data);
            } else {
                //เรียกใช้ models
                $this->Fine_models->editfine();
                redirect('Showdata/fineShow', 'refresh');
            }
        } elseif ($type == 2) {
            if ($this->form_validation->run() == FALSE) {
                // echo 'baba';
                // $this->load->view('officer/staff2_view');

                // $work_id = $this->input->post('work_id');
                // $data['query'] = $this->Staff_models->read($work_id);
                $fineType_id = $this->input->post('fineType_id');
                $data['query'] = $this->Fine_models->read($fineType_id);

                // แสดงข้อมูล data เพื่อดูว่าสามารถ query ข้อมูลออกมาได้หรือเปล่า
                // echo "<pre>";
                // print_r($data);
                // echo "</pre>";
                //  exit;

                // แบบที่1
                $this->load->view('css');
                $this->load->view('officer/offineEdit_view', $data);
            } else {
                $this->Fine_models->editfine();
                redirect('Showdata/offineShow', 'refresh');
            }
        }
  
    }
    public function editfineUserdata()
    {
        $this->form_validation->set_rules('fineType', 'fineType', 'trim|required');
        $this->form_validation->set_rules('fineRate', 'fineRate', 'trim|required');
        $this->form_validation->set_rules('pay', 'Pay', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            // echo 'baba';
            // $this->load->view('officer/staff2_view');

            // $work_id = $this->input->post('work_id');
            // $data['query'] = $this->Staff_models->read($work_id);
            $fine_id = $this->input->post('fine_id');
            $data['query'] = $this->Fine_models->readfine($fine_id);
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            // exit;

            $this->load->view('css');
            $this->load->view('officer/fineuserEdit_view', $data);
        } else {
            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";
            // exit;
            $this->Fine_models->editfineuser();
            redirect('Showdata/fineUserShow', 'refresh');
        }
    }

    public function fineCount()
    {
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        $input = $this->input->post('fineType');
        $book_id = $this->input->post('book_id');
        if($input != ''){

        $data['ftcount'] = $this->Fine_models->fineTypeCheck();
        $data['username'] = $this->Fine_models->selectNameuser();

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;

        $type = $_SESSION['type'];

        if ($type == 1) {

            $this->load->view('css');
            $this->load->view('admin/fineEdit_view', $data);
        } elseif ($type == 2) {
            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";
            // exit;
            $this->Book_models->updateBookreturn($book_id);
            $this->Fine_models->updateBrstatus();
            $this->Fine_models->addfineCount();
            redirect('Borrowdata/borrowpage', 'refresh');
        }
    }else{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        $type = $_SESSION['type'];

        if ($type == 1) {

            $this->load->view('css');
            $this->load->view('admin/fineEdit_view', $data);
        } elseif ($type == 2) {
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            // exit;
            
            $this->Fine_models->updateBrstatus();
            $this->Book_models->updateBookreturn($book_id);
            redirect('Borrowdata/borrowpage', 'refresh');
        }
    }
    }

    // public function fineCountNew()
    // {
    //     // echo "<pre>";
    //     // print_r($_POST);
    //     // echo "</pre>";
    //     // exit;
    //     $input = $this->input->post('fineType');
    //     $book_id = $this->input->post('book_id');
    //     if($input != ''){

    //         $data['ftcount'] = $this->Fine_models->fineTypeCheck();
    //         $data['username'] = $this->Fine_models->selectNameuser();

    //         // echo "<pre>";
    //         // print_r($data);
    //         // echo "</pre>";
    //         // exit;
        
    //         // echo "<pre>";
    //         // print_r($_POST);
    //         // echo "</pre>";
    //         // exit;
    //         $this->Book_models->updateBookreturn($book_id);
    //         $this->Fine_models->updateBrstatus();
    //         // $this->Fine_models->addfineCount();
    //         $this->Fine_models->addreturnDetails();
    //         redirect('Borrowdata/borrowpage', 'refresh');
    //     }else{
    //         // echo "<pre>";
    //         // print_r($_POST);
    //         // echo "</pre>";
    //         // exit;

    //         // echo "<pre>";
    //         // print_r($data);
    //         // echo "</pre>";
    //         // exit;
            
    //         $this->Fine_models->updateBrstatus();
    //         $this->Book_models->updateBookreturn($book_id);
    //         redirect('Borrowdata/borrowpage', 'refresh');
        
    //     }
    // }


    
}
