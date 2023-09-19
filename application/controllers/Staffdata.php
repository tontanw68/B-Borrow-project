<!-- จัดการข้อมูลยืม คืน -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staffdata extends CI_Controller {

    public function __construct()
        {
            parent::__construct();
            $this->load->model('Staff_models');
            $this->load->model('Option_models');
            $this->load->model('Autocomplete_models');
        }
    public function index1()
	{
        $data['query']=$this->Option_models->workDetaildata();

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;

        $adstaff = array();
        
        $result  = $this->Autocomplete_models->autoUser1(); //collect all college name
        
        foreach($result as $key=>$value){
        array_push($adstaff, $value["user_id"]);
        }

        $data['adstaff'] = $adstaff;

        $this->load->view('css');
		$this->load->view('admin/staff_view',$data);
        // $this->load->view('user_view',$data);
		
	}
    public function index2()
	{
        // echo 'nini';
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Option_models->workDetaildata();

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;

        $userID = array();
        
        $result  = $this->Autocomplete_models->autoUser1(); //collect all college name
        
        foreach($result as $key=>$value){
        array_push($userID, $value["user_id"]);
        }

        $data['userID'] = $userID;
        

        $this->load->view('css');
		$this->load->view('officer/staff2_view',$data);
        // $this->load->view('user_view',$data);
		
	}

    public function index3()
	{
        // echo 'nini';
        // exit;
        //เป็นการเรียกใช้ model
        // $data['query']=$this->user_models->showdata();

        //  print_r($data);
        
        //  exit;

        $this->load->view('css');
		$this->load->view('officer/TRTDate');
        // $this->load->view('user_view',$data);
		
	}

    public function wdInsert()
    {

        $wd_data = array();
        $wd  = $this->Autocomplete_models->autoWorkdetails();
        foreach ($wd as $key => $value) {
            array_push($wd_data, $value["WorkDetails"]);
        }
        $data['s_wd'] = $wd_data;

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;

        $this->load->view('css');
        $this->load->view('admin/staffDetails_view',$data);
    }
    
    public function addstaff()
    {
        // การตั้งกฎในการเช็คข้อมูล เช่น ตัดช่องว่าง บังคับกรอกข้อมูล กรอกข้อมูลมากสุดได้เท่าไหร่
        // $this->form_validation->set_rules('work_id','work_id', 'trim|required|max_length[5]');
        $this->form_validation->set_rules('workDetails_id','workDetails_id', 'trim|required|max_length[5]');
        $this->form_validation->set_rules('user_id','user ID', 'trim|required|max_length[7]');
        $this->form_validation->set_rules('workDetails_id','workDetails_id', 'trim|required|max_length[5]');
        $this->form_validation->set_rules('workDate','workDate', 'trim|required');
        $this->form_validation->set_rules('workStart_time','workStart_time', 'trim|required');
       $this->form_validation->set_rules('workEnd_time','workEnd_time', 'trim|required');
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
        if($type == 1){
            if($this->form_validation->run() == FALSE){
                // echo 'bibi';
                $data['query']=$this->Option_models->workDetaildata();

                // echo "<pre>";
                // print_r($data);
                // echo "</pre>";
                // exit;

                $adstaff = array();
                
                $result  = $this->Autocomplete_models->autoUser1(); //collect all college name
                
                foreach($result as $key=>$value){
                array_push($adstaff, $value["user_id"]);
                }

                $data['adstaff'] = $adstaff;

                $this->load->view('css');
                $this->load->view('admin/staff_view',$data);

            }
            else{
                $this->Staff_models->addstaff();
                redirect('Showdata/staffShow','refresh');
            }
        }elseif($type == 2){
            if($this->form_validation->run() == FALSE){
                echo 'baba';
                $this->load->view('officer/staff2_view');

            }
            else{
                $this->Staff_models->addstaff();
                redirect('Showdata/staffShow2','refresh');
            }
        }
    }

    public function addstaffDetails()
    {
        // การตั้งกฎในการเช็คข้อมูล เช่น ตัดช่องว่าง บังคับกรอกข้อมูล กรอกข้อมูลมากสุดได้เท่าไหร่
        $this->form_validation->set_rules('workDetails', 'WorkDetails', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            // echo 'bibi';
            $wd_data = array();
            $wd  = $this->Autocomplete_models->autoWorkdetails();
            foreach ($wd as $key => $value) {
                array_push($wd_data, $value["WorkDetails"]);
            }
            $data['s_wd'] = $wd_data;
            $this->load->view('css');
            $this->load->view('admin/staffDetails_view',$data);
            // $this->Staff_models->addstaffDetails();
            // redirect('Showdata/staffDetail','refresh');

        } else {
            $this->Staff_models->addstaffDetails();
            redirect('Showdata/staffDetail', 'refresh');
        }

        
    }

    public function editstaffdata()
    {
        // การตั้งกฎในการเช็คข้อมูล เช่น ตัดช่องว่าง บังคับกรอกข้อมูล กรอกข้อมูลมากสุดได้เท่าไหร่
        $this->form_validation->set_rules('workDetails_id','workDetails_id', 'trim|required|max_length[5]');
        $this->form_validation->set_rules('user_id','user ID', 'trim|required|max_length[7]');
        $this->form_validation->set_rules('workDetails_id','workDetails_id', 'trim|required|max_length[5]');
        $this->form_validation->set_rules('workDate','workDate', 'trim|required');
        $this->form_validation->set_rules('workStart_time','workStart_time', 'trim|required');
       $this->form_validation->set_rules('workEnd_time','workEnd_time', 'trim|required');
        //    $this->form_validation->set_rules('image','image', 'trim');
        // แบบที่1
       //หากมีข้อผิดพลาด
    //     if($this->form_validation->run() == FALSE){
    //         echo 'baba';
    //         // $this->load->view('admin/staffEdit_view');

    //         $work_id=$this->input->post('work_id');
    //         $data['query']=$this->Staff_models->read($work_id);

    //         // แสดงข้อมูล data เพื่อดูว่าสามารถ query ข้อมูลออกมาได้หรือเปล่า
    //         // echo "<pre>";
    //         // print_r($data);
    //         // echo "</pre>";
    //         //  exit;
    
    //         // แบบที่1
    //         $this->load->view('css');
    //         $this->load->view('admin/staffEdit_view',$data);

    //    }else{
                
    //         // echo "<pre>";
    //         // print_r($_POST);
    //         // echo "</pre>";
    //         //  exit;

    //         //เรียกใช้ models
    //         $this->Staff_models->editstaff();
    //         redirect('Showdata/staffShow','refresh');
            
    //    }

        // แบบที่2
        $type = $_SESSION['type'];
        if($type == 1){
            if($this->form_validation->run() == FALSE){
                echo 'bibi';
                // $this->load->view('admin/staff_view');

                $work_id=$this->input->post('work_id');
                $data['query']=$this->Staff_models->read($work_id);

                // แสดงข้อมูล data เพื่อดูว่าสามารถ query ข้อมูลออกมาได้หรือเปล่า
                // echo "<pre>";
                // print_r($data);
                // echo "</pre>";
                //  exit;
        
                // แบบที่1
                $this->load->view('css');
                $this->load->view('admin/staffEdit_view',$data);

            }
            else{
                //เรียกใช้ models
                $this->Staff_models->editstaff();
                redirect('Showdata/staffShow','refresh');
            }
        }elseif($type == 2){
            if($this->form_validation->run() == FALSE){
                echo 'baba';
                // $this->load->view('officer/staff2_view');

                $work_id=$this->input->post('work_id');
                $data['query']=$this->Staff_models->read($work_id);

                // แสดงข้อมูล data เพื่อดูว่าสามารถ query ข้อมูลออกมาได้หรือเปล่า
                // echo "<pre>";
                // print_r($data);
                // echo "</pre>";
                //  exit;
        
                // แบบที่1
                $this->load->view('css');
                $this->load->view('officer/staffEdit2_view',$data);

            }
            else{
                $this->Staff_models->editstaff();
                redirect('Showdata/staffShow2','refresh');
            }
        }
    }

    public function editstaffDetail()
    {
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        // การตั้งกฎในการเช็คข้อมูล เช่น ตัดช่องว่าง บังคับกรอกข้อมูล กรอกข้อมูลมากสุดได้เท่าไหร่
        //$this->form_validation->set_rules('workDetails_id','workDetails_id', 'trim|required|max_length[5]');
        $this->form_validation->set_rules('workDetails', 'WorkDetails', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            // echo 'bibi';
            // $this->load->view('admin/staff_view');

            $workDetails_id = $this->input->post('workDetails_id');
            $data['query'] = $this->Staff_models->showwdEdit($workDetails_id);

            $eWorkdt = array();
            $wd = $this->Autocomplete_models->autoWorkdetails();
            foreach ($wd as $key => $value) {
                array_push($eWorkdt, $value["WorkDetails"]);
            }
            $data['eWorkdt'] = $eWorkdt;
            // แสดงข้อมูล data เพื่อดูว่าสามารถ query ข้อมูลออกมาได้หรือเปล่า
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            // exit;

            // แบบที่1
            $this->load->view('css');
            $this->load->view('admin/staffDetailsEdit_view', $data);
        } else {
            //เรียกใช้ models
            $this->Staff_models->editstaffDetail();
            redirect('Showdata/staffDetail', 'refresh');
        }
    }


    public function edit($work_id)
    {
        // เป็นการเรียกใช้ model
        // ในการรับข้อมูลจะต้องมีการส่ง user_id เพราะมีการส่งจาก Url
        $data['query']=$this->Staff_models->read($work_id);
        $data['workDetails']=$this->Autocomplete_models->autoWorkdetails2();

        // แสดงข้อมูล data เพื่อดูว่าสามารถ query ข้อมูลออกมาได้หรือเปล่า
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;

        // แบบที่1
        // $this->load->view('css');
        // $this->load->view('admin/staffEdit_view',$data);

         // แบบที่2
         $type = $_SESSION['type'];

         if($type == 1){

             $this->load->view('css');
             $this->load->view('admin/staffEdit_view',$data);

         }elseif($type == 2){
             
             $this->load->view('css');
             $this->load->view('officer/staffEdit2_view',$data);
         }   
    }

    public function wdEdit($WorkDetails_id)
    {
        // เป็นการเรียกใช้ model
        // ในการรับข้อมูลจะต้องมีการส่ง user_id เพราะมีการส่งจาก Url
        $data['query'] = $this->Staff_models->showwdEdit($WorkDetails_id);

        $eWorkdt = array();
        $wd = $this->Autocomplete_models->autoWorkdetails();
        foreach ($wd as $key => $value) {
            array_push($eWorkdt, $value["WorkDetails"]);
        }
        $data['eWorkdt'] = $eWorkdt;

        // แสดงข้อมูล data เพื่อดูว่าสามารถ query ข้อมูลออกมาได้หรือเปล่า
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        //  exit;

        // แบบที่1
        // $this->load->view('css');
        // $this->load->view('admin/staffEdit_view',$data);


        $this->load->view('css');
        $this->load->view('admin/staffDetailsEdit_view', $data);
    }

    public function searchdata()
    {
    //    $query = '';
    //    $this->user_models->search();
    //    if($this->input->post('search'))
    //    {
    //        $query = $this->input->post('search');
    //    }
    //    $data = this->user_models->fetch_data($query);
    //    print_r($data);
    //    exit;
        
        $key = $this->input->post('search');
        $data['query'] = $this->Staff_models->getlist($key);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        // แบบที่1
        // $this->load->view('css');
        // $this->load->view('admin/staffList_view',$data);

        // แบบที่2
        $type = $_SESSION['type'];

        if($type == 1){

            $this->load->view('css');
            $this->load->view('admin/staffList_view',$data);

        }elseif($type == 2){
            
            $this->load->view('css');
            $this->load->view('officer/staffList2_view',$data);
        }

    }

    
}
