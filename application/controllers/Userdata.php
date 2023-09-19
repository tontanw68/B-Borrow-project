<!-- จัดการข้อมูลผู้ใช้ -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userdata extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // ถ้าตัวแปล session ไม่เท่ากับ 1
        if($this->session->userdata('type') != 3){
            // ให้ดีดไปที่หน้า login
            redirect('login','refresh');
        }
        $this->load->model('User_models');
        $this->load->model('Book_models');
        $this->load->model('Reserve_models');
        $this->load->model('Option_models');
        $this->load->model('Fine_models');
        $this->load->model('Announce_models');
        $this->load->model('Autocomplete_models');
        $this->load->model('Borrow_models');
    }

	
	public function index()
	{

        // print_r($_SESSION);
        $usSess = $_SESSION['user_id'];

        $data['query']=$this->Announce_models->showdata3();
        $data['showNbook']=$this->Book_models->showBookIndex();

        // $data['showBlike']=$this->Book_models->userSelectBt($usSess);
        $data['showBlike']=$this->Book_models->showBooklike();

        //โชว์ข้อมูลหน้าหลักของผู้ใช้
        $data['checkUserRs']=$this->Reserve_models->checkUserConfirmRs($usSess);
        $data['checkUserRt']=$this->Borrow_models->checkUserReturnBook($usSess);
        $data['checkUserfine']=$this->Fine_models->checkUserfine($usSess);
        // echo '<pre>';
        // print_r($data);
        // echo '<pre>';
        // exit;

        $this->load->view('css');
		$this->load->view('user/user_view',$data);
		
	}
    public function index2()
	{
        $this->load->view('css');
		$this->load->view('user/uEdit_view');
		
	}

    public function profile()
	{
        $ueditUser = array();
        $ueditName = array();
        $ueditSurename = array();
        $ueditEmail = array();
        $ueditPhone = array();

        $result2  = $this->Autocomplete_models->autoUser2(); //collect all college name
        $result3  = $this->Autocomplete_models->autoUser3();  
        $result4  = $this->Autocomplete_models->autoUser4();  
        $result5  = $this->Autocomplete_models->autoUser5();
        $result6  = $this->Autocomplete_models->autoUser6();

        foreach($result2 as $key=>$value){
           array_push($ueditUser, $value["user"]);
        }
        foreach($result3 as $key=>$value){
            array_push($ueditName, $value["name"]);
         }
         foreach($result4 as $key=>$value){
            array_push($ueditSurename, $value["surename"]);
         }
         foreach($result5 as $key=>$value){
            array_push($ueditEmail, $value["email"]);
         }
         foreach($result6 as $key=>$value){
            array_push($ueditPhone, $value["phoneNo"]);
         }

        $data['ueditUser'] = $ueditUser;
        $data['ueditName'] = $ueditName;
        $data['ueditSurename'] = $ueditSurename;
        $data['ueditEmail'] = $ueditEmail;
        $data['ueditPhone'] = $ueditPhone;
        
        // print_r($_SESSION);
        // เอา id มาเทียบว่าสมาชิกคนไหม login เข้ามา
        $user_id = $_SESSION['user_id'];
        // echo $user_id;
        $data['query']=$this->User_models->read($user_id);
        $data['book']=$this->Option_models->typedata();
        $data['allow']=$this->Option_models->allowdata();
        $data['ust']=$this->Option_models->userStdata();
        $data['btype']=$this->Book_models->booktype();
        // echo '<pre>';
        // print_r($data);
        // echo '<pre>';
        // exit;

        $this->load->view('css');
        $this->load->view('user/uEdit_view',$data);

		
	}

    public function editdata()
	{
        // echo '<pre>';
        // print_r($_POST);
        // echo '<pre>';
        // exit;
            // การตั้งกฎในการเช็คข้อมูล เช่น ตัดช่องว่าง บังคับกรอกข้อมูล กรอกข้อมูลมากสุดได้เท่าไหร่
            $this->form_validation->set_rules('user_id','User_id', 'trim');
            $this->form_validation->set_rules('id','ID', 'trim|required|max_length[7]');
            $this->form_validation->set_rules('user','Username', 'trim|required');
            $this->form_validation->set_rules('password','Password', 'trim|required');
            $this->form_validation->set_rules('prename','Prename', 'trim|required');
            $this->form_validation->set_rules('name','Name', 'trim|required');
            $this->form_validation->set_rules('surename','Surename', 'trim|required');
            // $this->form_validation->set_rules('email','Email', 'trim|required');
            // $this->form_validation->set_rules('phoneNo','Tel', 'trim|required|max_length[10]');
            $this->form_validation->set_rules('bookType','booktype', 'trim|required');
            $this->form_validation->set_rules('type','Type', 'trim|required');
            $this->form_validation->set_rules('allow','allow', 'trim|required');
            $this->form_validation->set_rules('userType','userType', 'trim|required');
            //หากมีข้อผิดพลาด
            if($this->form_validation->run() == FALSE){
                // echo 'baba';
                // $this->load->view('user/uEdit_view');
    
                $user_id = $this->input->post('user_id');
                $data['query']=$this->User_models->read($user_id);
                $data['book']=$this->Option_models->typedata();
                $data['allow']=$this->Option_models->allowdata();
                $data['ust']=$this->Option_models->userStdata();
                $data['btype']=$this->Book_models->booktype();
                // echo '<pre>';
                // print_r($data);
                // echo '<pre>';
                // exit();  
                $this->load->view('css');
                $this->load->view('user/uEdit_view',$data);
            }else{
                
                // echo "<pre>";
                // print_r($_POST);
                // echo "</pre>";
                // exit;
                // $pass = $this->input->post("password");
                // $data['checkpass'] = $this->User_models->checkpw($pass);
                // echo "<pre>";
                // print_r($data);
                // echo "</pre>";
                // exit;
                
                //เรียกใช้ models
                $this->User_models->edituser();

                // print_r($_SESSION);
                $usSess = $_SESSION['user_id'];

                $data['query']=$this->Announce_models->showdata3();
                $data['showNbook']=$this->Book_models->showBookIndex();

                // $data['showBlike']=$this->Book_models->userSelectBt($usSess);
                $data['showBlike']=$this->Book_models->showBooklike();

                //โชว์ข้อมูลหน้าหลักของผู้ใช้
                $data['checkUserRs']=$this->Reserve_models->checkUserConfirmRs($usSess);
                $data['checkUserRt']=$this->Borrow_models->checkUserReturnBook($usSess);
                $data['checkUserfine']=$this->Fine_models->checkUserfine($usSess);
                //    redirect('Showdata/index','refresh');
                $this->load->view('css');
                $this->load->view('user/user_view',$data);
            
            }		
	}

    public function edit($user_id)
	{
        // เป็นการเรียกใช้ model
        // ในการรับข้อมูลจะต้องมีการส่ง user_id เพราะมีการส่งจาก Url
        $data['query']=$this->user_models->read($user_id);

        //  print_r($data);
        
        //  exit;


        $this->load->view('css');
		$this->load->view('userEdit_view',$data);
        // $this->load->view('user_view',$data);
		
	}

    public function reserve($book_id)
	{

        // ใช้ user_id ของคนที่ login เข้ามาเพื่อที่จะดึงข้อมูลของคนๆนั้นมาแสดงในฟอร์ม
        $user_id = $_SESSION['user_id'];

        // เป็นการเรียกใช้ model
        // ในการรับข้อมูลจะต้องมีการส่ง user_id เพราะมีการส่งจาก Url
        $data['user']=$this->User_models->read($user_id);
        $data['query']=$this->Book_models->read($book_id);
        $data['datenow']=$this->Reserve_models->thdatenow();

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;

        $this->load->view('css');
		$this->load->view('user/reserve_view',$data);
        // $this->load->view('user/reserve_list_view',$data);
        // $this->load->view('user_view',$data);
		
	}

    //ฟังก์ชันใหม่สำหรับเพิ่มข้อมูลให้เป็น list แล้วบันทึกทีเดียว
    public function reserveList($book_id)
	{
        // $result = $this->Reserve_models->reserveCard($book_id);
        $result = $this->Book_models->bookcard($book_id);
        // print_r($result);
        // exit;

        if(!empty($result)){
            // $reserve_sess = array(
            //     'reserve_id' => $result->reserve_id
            // );
            // print_r($reserve_sess);
            // exit;

            $book_sess = array(
                'book_id' => $result->book_id,
                'bookName' => $result->bookName,
                'author' => $result->author
            );
            // print_r($book_sess);
            // exit;

            //สร้าง session 
            // $this->session->set_userdata($reserve_sess);
            // print_r($_SESSION);
            // exit;

            $this->session->set_userdata($book_sess);
            // print_r($_SESSION);
            // exit;

            //สร้าง session 
            // $reserveID = $_SESSION['reserve_id'];
            // print_r($reserveID);

            //เช็กว่ามีค่าข้อมูลนั้นอยู่ไหม
            // if(isset($reserveID)){
            //     echo "Have Variable Message";
            // }else{
            //     echo "Don't have Variable Message";
            // }
            // exit;
        }
        // echo "Don't have Variable Message";
        // exit;

        // ใช้ user_id ของคนที่ login เข้ามาเพื่อที่จะดึงข้อมูลของคนๆนั้นมาแสดงในฟอร์ม
        $user_id = $_SESSION['user_id'];
        $book_id = $_SESSION['book_id'];

        // เป็นการเรียกใช้ model
        // ในการรับข้อมูลจะต้องมีการส่ง user_id เพราะมีการส่งจาก Url
        $data['user']=$this->User_models->read($user_id);
        $data['query']=$this->Book_models->read($book_id);
        $data['datenow']=$this->Reserve_models->thdatenow();

        // $reserveID=1;

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;

        $this->load->view('css');
		$this->load->view('user/reserve_view',$data);
        // $this->load->view('user_view',$data);
	}

    public function book_details($book_id)
	{

        $user_id = $_SESSION['user_id'];
        // เป็นการเรียกใช้ model
        // ในการรับข้อมูลจะต้องมีการส่ง user_id เพราะมีการส่งจาก Url
        $data['user']=$this->User_models->read($user_id);
        $data['query']=$this->Book_models->read($book_id);
        // $data['datenow']=$this->Reserve_models->thdatenow();

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;

        $this->load->view('css');
		$this->load->view('user/search_table_view',$data);
        // $this->load->view('user_view',$data);
		
	}

    public function fineSearch()
	{

        $user_id = $_SESSION['user_id'];

        // เป็นการเรียกใช้ model
        // ในการรับข้อมูลจะต้องมีการส่ง user_id เพราะมีการส่งจาก Url
        $data['query']=$this->Fine_models->usSearchfine($user_id);
        // $data['datenow']=$this->Reserve_models->thdatenow();

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;

        $this->load->view('css');
		$this->load->view('user/UfineList_view',$data);
        // $this->load->view('user_view',$data);
		
	}


}
