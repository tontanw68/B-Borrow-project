<!-- จัดการข้อมูลผู้ใช้ -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Officerdata extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // ถ้าตัวแปล session ไม่เท่ากับ 1
        if($this->session->userdata('type') != 2){
            // ให้ดีดไปที่หน้า login
            redirect('login','refresh');
        }
        $this->load->model('User_models');
        $this->load->model('Option_models');
        $this->load->model('Autocomplete_models');
        $this->load->model('Staff_models');
        $this->load->model('Book_models');
        $this->load->model('Reserve_models');
        $this->load->model('Borrow_models');
        $this->load->model('Fine_models');
    }

	
	public function index()
	{
        $user_id = $_SESSION['user_id'];

        //$data['query']=$this->Staff_models->showStaffdata($user_id);
        $data['usStatus'] = $this->Staff_models->usStatus();
        $data['query']=$this->Staff_models->showStafftb();
        //โชว์ข้อมูลหน้าหลักของเจ้าหน้าที่
        $data['checkConfirm']=$this->Reserve_models->checkconfirmRs();
        $data['checkRtbook']=$this->Borrow_models->checkreturnBook();
        $data['checkfine']=$this->Fine_models->checkfine();
        //  echo '<pre>';
        // print_r($data);
        // echo '<pre>';
        //  exit;

        // print_r($_SESSION);
        $this->load->view('css');
        $this->load->view('officer/officer_view',$data);

        // print_r($_SESSION);
        // $this->load->view('css');
		// $this->load->view('officer/officer_view');
		
	}
    public function index2()
	{
        $this->load->view('css');
		$this->load->view('officer/officerEdit_view');
		
	}
    public function index3()
	{
        $this->load->view('css');
		$this->load->view('officer/TRTDate');
		
	}

    public function profile()
	{ 
        // print_r($_SESSION);
        // เอา id มาเทียบว่าสมาชิกคนไหม login เข้ามา
        // $user_id = $_SESSION['user_id'];
        $user_id = $_SESSION['id'];
        // echo $user_id;
        $data['query']=$this->User_models->read($user_id);
        $data['typeOption'] = $this->Option_models->typedata();
        $data['userOption'] = $this->Option_models->userStdata();
        $data['allowOption'] = $this->Option_models->allowdata();
        $data['uBook'] = $this->Book_models->booktype();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;

        $editUsf_Uname = array();
        $editUsf_name = array();
        $editUsf_Sname = array();
        $editUsf_email = array();
        $editUsf_phone = array();
        $result  = $this->Autocomplete_models->autoUser2(); //collect all college name
        $result2  = $this->Autocomplete_models->autoUser3();
        $result3  = $this->Autocomplete_models->autoUser4();
        $result4  = $this->Autocomplete_models->autoUser5();
        $result5  = $this->Autocomplete_models->autoUser6();
        
        foreach($result as $key=>$value){
           array_push($editUsf_Uname, $value["user"]);
        }
        foreach($result2 as $key=>$value){
            array_push($editUsf_name, $value["name"]);
        }
        foreach($result3 as $key=>$value){
            array_push($editUsf_Sname, $value["surename"]);
        }
        foreach($result4 as $key=>$value){
            array_push($editUsf_email, $value["email"]);
        }
        foreach($result5 as $key=>$value){
            array_push($editUsf_phone, $value["phoneNo"]);
        }

        $data['editUsf_Uname'] = $editUsf_Uname;
        $data['editUsf_name'] = $editUsf_name;
        $data['editUsf_Sname'] = $editUsf_Sname;
        $data['editUsf_email'] = $editUsf_email;
        $data['editUsf_phone'] = $editUsf_phone;
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
       
        $this->load->view('css');
        $this->load->view('officer/officerEdit_view',$data);

		
	}

    public function editdata()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
         // การตั้งกฎในการเช็คข้อมูล เช่น ตัดช่องว่าง บังคับกรอกข้อมูล กรอกข้อมูลมากสุดได้เท่าไหร่
         $this->form_validation->set_rules('user_id','User_id', 'trim');
         $this->form_validation->set_rules('id','Id', 'trim|required|max_length[7]');
         $this->form_validation->set_rules('user','User', 'trim|required');
         $this->form_validation->set_rules('password','Password', 'trim|required');
         $this->form_validation->set_rules('prename','Prename', 'trim|required');
         $this->form_validation->set_rules('name','Name', 'trim|required');
         $this->form_validation->set_rules('surename','Surename', 'trim|required');
        //  $this->form_validation->set_rules('email','Email', 'trim|required');
        //  $this->form_validation->set_rules('phoneNo','PhoneNo', 'trim|required|max_length[10]');
         $this->form_validation->set_rules('bookType','BookType', 'trim|required');
         $this->form_validation->set_rules('type','Type', 'trim|required');
         $this->form_validation->set_rules('allow','Allow', 'trim|required');
         $this->form_validation->set_rules('userType','UserType', 'trim|required');

        //หากมีข้อผิดพลาด
        if($this->form_validation->run() == FALSE){
            // echo 'baba';
            // $this->load->view('officer/officerEdit_view');

            $user_id = $this->input->post('user_id');
            $data['query']=$this->User_models->read($user_id);
            $data['uBook'] = $this->Book_models->booktype();

            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";
            // exit;

            $editUsf_Uname = array();
            $editUsf_name = array();
            $editUsf_Sname = array();
            $editUsf_email = array();
            $editUsf_phone = array();
            $result  = $this->Autocomplete_models->autoUser2(); //collect all college name
            $result2  = $this->Autocomplete_models->autoUser3();
            $result3  = $this->Autocomplete_models->autoUser4();
            $result4  = $this->Autocomplete_models->autoUser5();
            $result5  = $this->Autocomplete_models->autoUser6();
            
            foreach($result as $key=>$value){
            array_push($editUsf_Uname, $value["user"]);
            }
            foreach($result2 as $key=>$value){
                array_push($editUsf_name, $value["name"]);
            }
            foreach($result3 as $key=>$value){
                array_push($editUsf_Sname, $value["surename"]);
            }
            foreach($result4 as $key=>$value){
                array_push($editUsf_email, $value["email"]);
            }
            foreach($result5 as $key=>$value){
                array_push($editUsf_phone, $value["phoneNo"]);
            }

            $data['editUsf_Uname'] = $editUsf_Uname;
            $data['editUsf_name'] = $editUsf_name;
            $data['editUsf_Sname'] = $editUsf_Sname;
            $data['editUsf_email'] = $editUsf_email;
            $data['editUsf_phone'] = $editUsf_phone;

            $this->load->view('css');
            $this->load->view('officer/officerEdit_view',$data);

            // redirect('Officerdata/profile','refresh');
        }else{
            
            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";
            // exit;

            $this->User_models->edituser();
            redirect('Officerdata','refresh');
        }	

	}

    public function editdata1()
	{
            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";
            // exit;
            // การตั้งกฎในการเช็คข้อมูล เช่น ตัดช่องว่าง บังคับกรอกข้อมูล กรอกข้อมูลมากสุดได้เท่าไหร่
            $this->form_validation->set_rules('user_id','User_id', 'trim');
            $this->form_validation->set_rules('id','ID', 'trim|required|max_length[7]');
            $this->form_validation->set_rules('user','Username', 'trim|required');
            $this->form_validation->set_rules('password','Password', 'trim|required');
            $this->form_validation->set_rules('prename','Prename', 'trim|required');
            $this->form_validation->set_rules('name','Name', 'trim|required');
            $this->form_validation->set_rules('surename','Surename', 'trim|required');
            $this->form_validation->set_rules('email','Email', 'trim|required');
            $this->form_validation->set_rules('phoneNo','Tel', 'trim|required|max_length[10]');
            $this->form_validation->set_rules('type','Type', 'trim|required');
            $this->form_validation->set_rules('allow','Allow', 'trim|required');
            $this->form_validation->set_rules('userType','User type', 'trim|required');
            //หากมีข้อผิดพลาด
            if($this->form_validation->run() == FALSE){
                // echo 'baba';
                // $this->load->view('officer/officerEdit_view');
    
                $user_id = $this->input->post('user_id');
                $data['query']=$this->User_models->read($user_id);
    
                //  print_r($data);
                
                //  exit;
    
    
                $this->load->view('css');
                $this->load->view('officer/officerEdit_view',$data);
            }else{
                
                echo "<pre>";
                print_r($_POST);
                echo "</pre>";
                exit;
    
                //เรียกใช้ models
                $this->User_models->edituser();
                //    redirect('Showdata/index','refresh');
                $this->load->view('css');
                $this->load->view('officer/officer_view');
            }	
       	
	}
    public function edit($user_id)
	{
        // เป็นการเรียกใช้ model
        // ในการรับข้อมูลจะต้องมีการส่ง user_id เพราะมีการส่งจาก Url
        $data['query']=$this->user_models->read($user_id);

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;


        $this->load->view('css');
		$this->load->view('userEdit_view',$data);
        // $this->load->view('user_view',$data);
		
	}
   
}
