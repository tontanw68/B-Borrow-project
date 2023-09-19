<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Showdata extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Announce_models');
        $this->load->model('Book_models');
        $this->load->model('Borrow_models');
        $this->load->model('Staff_models');
        $this->load->model('Reserve_models');
        $this->load->model('User_models');
        $this->load->model('Fine_models');
        $this->load->model('Rules_models');
    }

	
	public function index()
	{
        //เป็นการเรียกใช้ model
        $data['query']=$this->User_models->showdata2();
        //  print_r($data);
        //  exit;
        $this->load->view('css');
        $this->load->view('sweet_view');
        $this->load->view('admin/userList_view',$data);
		
	}
    public function index2()
	{
        //เป็นการเรียกใช้ model

        //  print_r($data);
        //  exit;
        $this->load->view('css');
        $this->load->view('officer/date');
		
	}
    public function announceShow()
	{
        //เป็นการเรียกใช้ model
        $data['query']=$this->Announce_models->showdata2();
        //  print_r($data);
        //  exit;
        $this->load->view('css');
        $this->load->view('admin/announceList_view',$data);
		
	}

    public function announceShow1()
	{
        //เป็นการเรียกใช้ model
        $data['query']=$this->Announce_models->showdata2();
        //  print_r($data);
        //  exit;
        $this->load->view('css');
        $this->load->view('officer/announceList1_view',$data);
		
	}

    public function announceShow2()
	{
        //เป็นการเรียกใช้ model
        $data['query']=$this->Announce_models->showdata3();
        //  print_r($data);
        //  exit;
        $this->load->view('css');
        $this->load->view('user/announceList2_view',$data);
		
	}

    public function userShow1()
	{
        //เป็นการเรียกใช้ model
        $data['query']=$this->User_models->showdata2();
        //  print_r($data);
        //  exit;
        $this->load->view('css');
        $this->load->view('admin/userList2_view',$data);
		
	}

    public function userShow2()
	{
        //เป็นการเรียกใช้ model
        $data['query']=$this->User_models->userCanLogin2();
        //  print_r($data);
        //  exit;
        $this->load->view('css');
        $this->load->view('admin/userList2_view',$data);
		
	}

    public function userShow3()
	{
        //เป็นการเรียกใช้ model
        $data['query']=$this->User_models->userUnLogin2();
        //  print_r($data);
        //  exit;
        $this->load->view('css');
        $this->load->view('admin/userList2_view',$data);
		
	}

    public function bookShow()
	{
        //เป็นการเรียกใช้ model
        $data['query']=$this->Book_models->showBookdata2();
        //  print_r($data);
        //  exit;
        $this->load->view('css');
        $this->load->view('admin/bookList2_view',$data);
		
	}

    public function bookShow2()
	{
        //เป็นการเรียกใช้ model
        $data['query']=$this->Book_models->showBookdata2();
        //  print_r($data);
        //  exit;
        $this->load->view('css');
        $this->load->view('user/bookList_view',$data);
		
	}

    public function bookShow3()
	{
        //เป็นการเรียกใช้ model
        $data['query']=$this->Book_models->showBookdata2();
        //  print_r($data);
        //  exit;
        $this->load->view('css');
        $this->load->view('admin/bookList3_view',$data);
		
	}
    public function bookShow4()
	{
        //เป็นการเรียกใช้ model
        $data['query']=$this->Book_models->showBookdata2();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/bookList4_view',$data);
		
	}

    public function booktypeShow()
    {   
        $data['query'] = $this->Book_models->booktype();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/booktypeList_view' ,$data);
        
    }

    public function booktypeShow2()
    {   
        $data['query'] = $this->Book_models->booktype();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('admin/booktypeList2_view' ,$data);
        
    }

    public function borrowShow()
	{
        //เป็นการเรียกใช้ model
        $data['query']=$this->Borrow_models->showdata();
        // echo '<pre>';
        // print_r($data);
        // echo '<pre>';
        // exit;
        $this->load->view('css');
        $this->load->view('officer/borrowList2_view',$data);
		
	}
    public function staffShow()
	{
        //เป็นการเรียกใช้ model
        $data['query']=$this->Staff_models->showStaffdata();
        //  print_r($data);
        //  exit;
        $this->load->view('css');
        $this->load->view('admin/staffList_view',$data);
	}
    public function staffShow2()
	{
        $user_id = $_SESSION['id'];
        //เป็นการเรียกใช้ model
        $data['query']=$this->Staff_models->showStaff($user_id);
        //  print_r($data);
        //  exit;
        $this->load->view('css');
        $this->load->view('officer/staffList2_view',$data);
		
	}

    public function staffDetail()
    {
        //เป็นการเรียกใช้ model
        $data['query']=$this->Staff_models->showStaffDetail();
        //  print_r($data);
        //  exit;
        $this->load->view('css');
        $this->load->view('admin/staffDetailsList_view',$data);
    }

    public function reserveShow()
	{
        //เป็นการเรียกใช้ model
        $data['showrs']=$this->Reserve_models->showreserveAll();
        // echo '<pre>';
        // print_r($data);
        // echo '<pre>';
        // exit;
        $this->load->view('css');
        $this->load->view('officer/officer_rsList_view',$data);
		
	}

    public function reserveShow2()
	{
        //เป็นการเรียกใช้ model
        $data['showrs']=$this->Reserve_models->checkconfirmRs2();
        //  print_r($data);
        //  exit;
        $this->load->view('css');
        $this->load->view('officer/officer_rsList_view',$data);
		
	}

    public function userStatusShow()
    {
        $data['query']=$this->User_models->showUserStatus();
        $this->load->view('css');
        $this->load->view('officer/userStatusList_view',$data);
        
    }

    public function userStatusShow2()
    {
        $data['query']=$this->User_models->showUserStatus();
        $this->load->view('css');
        $this->load->view('admin/userStatusList2_view',$data);
        
    }

    public function fineShow()
    {
        $data['query']=$this->Fine_models->finedata();

        $this->load->view('css');
        $this->load->view('admin/fineList_view',$data);
        
    }

    public function offineShow()
    {
        $data['query']=$this->Fine_models->finedata();
        // echo '<pre>';
        // print_r($data);
        // echo '<pre>';
        // exit;
        $this->load->view('css');
        $this->load->view('officer/offineList_view',$data);
        
    }

    public function rulesShow()
    {
        $data['query'] = $this->Rules_models->showRules();

        $this->load->view('css');
        $this->load->view('admin/rulesList_view',$data);
    }

    public function rulesShow2()
    {
        $data['query'] = $this->Rules_models->ruleActive2();

        $this->load->view('css');
        $this->load->view('admin/rulesList_view',$data);
    }

    public function fineUserShow()
    {
        $data['query'] = $this->Fine_models->checkfine2();
        // echo '<pre>';
        // print_r($data);
        // echo '<pre>';
        // exit;

        $this->load->view('css');
        $this->load->view('officer/fineuserList_view',$data);
    }
   
}
