<!-- จัดการข้อมูลผู้ใช้ -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservedata extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Reserve_models');
        $this->load->model('Option_models');
        $this->load->model('Autocomplete_models');
        $this->load->model('Book_models');
    }

	
    public function index()
	{
        //เป็นการเรียกใช้ model
        // $data['res']=$this->user_models->list_type();

        //  print_r($data);
        
        //  exit;

        $this->load->view('css');
        // $this->load->view('userList_view',$data);

        // เรียกใช้ดาต้าเพื่อเอาข้อมูลจากดาตเาเบสไปแสดงที่ insertdata_view
		$this->load->view('user/reserve_view');
        // $this->load->view('userList2_view',$data);
		
	}
    public function index2()
	{
        $user_id = $_SESSION['user_id'];
        $data['showrs'] = $this->Reserve_models->showreserve($user_id);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;

        $this->load->view('css');
		$this->load->view('user/UreserveList_view',$data);
	}

    public function reserveUserConfirm()
	{
        $user_id = $_SESSION['user_id'];
        $data['showrs'] = $this->Reserve_models->checkUserConfirmRs2($user_id);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;

        $this->load->view('css');
		$this->load->view('user/UreserveList_view',$data);
	}

    public function index3()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;

        $data['datenow']=$this->Reserve_models->thdatenow();

        $bookRs = array();
        $result  = $this->Autocomplete_models->Authorbook(); //collect all college name    
        foreach($result as $key=>$value){
           array_push($bookRs, $value["book_id"]);
        }
        $data['bookRs'] = $bookRs;

        $this->load->view('css');
		$this->load->view('user/user_reserve_view',$data);
        // $this->load->view('userList2_view',$data);
		
	}

	public function adddata()
	{ 
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        
        //เรียกใช้ models
        $this->Reserve_models->addreserve();
        // redirect('Showdata/userShow1','refresh');
        $user_id = $_SESSION['user_id'];
        $data['showrs'] = $this->Reserve_models->showreserve($user_id);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;

        $this->load->view('css');
		$this->load->view('user/UreserveList_view',$data);
        
       
	}

    public function adddataform()
	{ 
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;

        $this->form_validation->set_rules('book_id','book_id', 'trim|required');
        $this->form_validation->set_rules('user_id','user_id', 'trim|required');
        $this->form_validation->set_rules('reserveDate','reserveDate', 'trim|required');
        // $this->form_validation->set_rules('reserveStatus_id','reserveStatus_id', 'trim|required');
        if($this->form_validation->run() == FALSE){
            // echo 'bibi';
            $this->load->view('css');
            $this->load->view('user/user_reserve_view');

        }
        else{
            $this->Reserve_models->addreserve();
            redirect('Reservedata/index2','refresh');
        }
    

	}

    //testting
    public function addListdata()
	{ 
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        
        $user_id = $_SESSION['user_id'];
        $data['listD'] = $this->Reserve_models->showreserve($user_id);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;

        $this->load->view('css');
		$this->load->view('officer/TRTDate',$data);
        
       
	}

    public function editdata()
	{ 
        
        //ป้องกันการเพิ่มข้อมูลซ้ำ
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        $eRsdate = $this->input->post('receiveDate');
        $show = $this->input->post('reserveStatus_id');
        if($eRsdate != null){
            
            // echo $show;
            // exit;
            
            //เรียกใช้ models
            $this->Reserve_models->editreserve();
            // redirect('Showdata/reserveShow','refresh');
            $data['showrs'] = $this->Reserve_models->showreserveAll1($show);

            // $user_id = $_SESSION['user_id'];
            // $data['showrs'] = $this->Reserve_models->showreserve($user_id);
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            // exit;

            $this->load->view('css');
            $this->load->view('officer/officer_rsList_view',$data);
        }else{
            
            // echo $show;
            // exit;
             //เรียกใช้ models
             $this->Reserve_models->editRsUndate();
            //  redirect('Showdata/reserveShow','refresh');
             $data['showrs'] = $this->Reserve_models->showreserveAll1($show);

            // $user_id = $_SESSION['user_id'];
            // $data['showrs'] = $this->Reserve_models->showreserve($user_id);
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            // exit;

            $this->load->view('css');
            $this->load->view('officer/officer_rsList_view',$data);
            
        } 
	}


    public function edit($reserve_id)
	{

        // เป็นการเรียกใช้ model
        // ในการรับข้อมูลจะต้องมีการส่ง user_id เพราะมีการส่งจาก Url
        $data['rsedit']=$this->Reserve_models->read($reserve_id);
        $data['rst']=$this->Option_models->reserveStatusdata();

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;

        $this->load->view('css');
        //ส่ง $data ไปแสดงที่หน้า list ด้วย
		$this->load->view('officer/reserveEdit_view',$data);
		
	}

    public function cancle($reserve_id)
    {
        //ส่งค่าไอดีไปเพื่อยกเลิก
        $this->Reserve_models->canclereserve($reserve_id);

        //แสดงข้อมูลผู้ใช้ที่ user_id นั้นๆ
        $user_id = $_SESSION['user_id'];
        $data['showrs'] = $this->Reserve_models->showreserve($user_id);
        $this->load->view('css');
		$this->load->view('user/UreserveList_view',$data);
    }

    public function cancelRs($reserve_id)
    {
        //ส่งค่าไอดีไปเพื่อยกเลิก
        $this->Reserve_models->updateCancel($reserve_id);

        //แสดงข้อมูลผู้ใช้ที่ user_id นั้นๆ
        $user_id = $_SESSION['user_id'];
        $data['showrs'] = $this->Reserve_models->showreserve($user_id);
        $this->load->view('css');
		$this->load->view('user/UreserveList_view',$data);
    }
}
