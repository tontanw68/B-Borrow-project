<!-- จัดการข้อมูลยืม คืน -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Borrowdata extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Borrow_models');
        $this->load->model('User_models');
        $this->load->model('Staff_models');
        $this->load->model('Reserve_models');
        $this->load->model('Autocomplete_models');
        $this->load->model('Fine_models');
        $this->load->model('Book_models');
        $this->load->library('pagination');
    }

	
    public function index()
	{
        //เป็นการเรียกใช้ model
        // $data['res']=$this->user_models->list_type();
        $user_id = $_SESSION['user_id'];
        $book_id = $this->input->post('book_id');
        // echo $user_id ;
        $data['query']=$this->User_models->read($user_id);
        $data['borrowdatenow']=$this->Reserve_models->thdatenow();

        $data['query1']=$this->User_models->searchUserBr($user_id);
        // $data['brDesc']=$this->User_models->searchUserBrDesc($user_id);
        $data['usStatus']=$this->User_models->usStatusforview2($user_id);
        $data['brStatus']=$this->User_models->brUStatus($user_id);

        // echo '<pre>';
        // print_r($data);
        // echo '<pre>';
        //  exit;
        // $this->load->view('css');
        // $this->load->view('userList_view',$data);
        // เรียกใช้ดาต้าเพื่อเอาข้อมูลจากดาตเาเบสไปแสดงที่ insertdata_view
		// $this->load->view('officer/borrow_view',$data);
        // $this->load->view('userList2_view',$data);

        $all_data = array();
        $bookID = array();
        $userN = array();
        $result  = $this->Autocomplete_models->autoUser1(); //collect all college name
        $result2  = $this->Autocomplete_models->bookUnreturn();
        $result3  = $this->Autocomplete_models->autoUser3();
        
        foreach($result as $key=>$value){
           array_push($all_data, $value["user_id"]);
        }
        foreach($result2 as $key=>$value){
            array_push($bookID, $value["book_id"]);
        }
        foreach($result3 as $key=>$value){
        array_push($userN, $value["name"]);
        }

        $data['userID'] = $all_data;
        $data['bookID'] = $bookID;
        $data['userN'] = $userN;
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
     
        $this->load->view('css');
        // $this->load->view('officer/autocomplete2_view',$data);   
        $this->load->view('officer/borrow_view',$data);  
		
	}
    public function index2()
	{
        //เป็นการเรียกใช้ model
        // $data['res']=$this->user_models->list_type();

        $this->load->view('css');
        // $this->load->view('userList_view',$data);

        // เรียกใช้ดาต้าเพื่อเอาข้อมูลจากดาตเาเบสไปแสดงที่ insertdata_view
		$this->load->view('user/borrowS_view',$data);
        // $this->load->view('userList2_view',$data);
		
	}

    public function fieldUs()
	{
        // $this->session->unset_userdata('user_id');

        $forUs = array();
        $result  = $this->Autocomplete_models->autoUser1(); //collect all college name
        
        foreach($result as $key=>$value){
           array_push($forUs, $value["user_id"]);
        }

        $data['forUs'] = $forUs;
        $this->load->view('css');
		$this->load->view('officer/borrowFieldUs_view',$data);
        // $this->load->view('userList2_view',$data);
		
	}

    public function selectUserBr()
	{
        
        // $u_sess = $_SESSION['user_id'];
        $userID = $this->input->post('user_id');
        //เป็นการเรียกใช้ model
        $data['query']=$this->User_models->searchUserBr($userID);
        $data['usStatus']=$this->User_models->usStatus($userID);
        $data['brStatus']=$this->User_models->brUStatus($userID);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        if (!empty($userID)) {
            //    สร้างตัวแปล u_sess ที่จะสร้างสร้าง session เพื่อใช้ในการเช็คสิทธ์ในการเข้าใช้ระบบ
            $this->session->set_userdata('user_id', $userID);
            //$this->session->set_userdata('id', 'id');
            // print_r($_SESSION);
            //exit;

            //สร้าง session 
            // $this->session->set_userdata($u_s);
            // print_r($_SESSION);
            // exit;
        }

        $forB = array();
        $result  = $this->Autocomplete_models->bookUnreturn(); //collect all college name
        
        foreach($result as $key=>$value){
           array_push($forB, $value["book_id"]);
        }

        $data['forB'] = $forB;

        $this->load->view('css');
		$this->load->view('officer/borrow2_view',$data);
        // $this->load->view('userList2_view',$data);
		
	}

    public function selectBookBr()
	{
        // $u_sess = $_SESSION['user_id'];
        $bookID = $this->input->post('book_id');
        // $data['readB']=$this->Book_models->read($bookID);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;


            // $this->Book_models->updateBookst($bookID);
            //เป็นการเรียกใช้ model
            // $data['query']=$this->User_models->searchUserBr($userID);
            // $data['usStatus']=$this->User_models->usStatus($userID);
            // $data['brStatus']=$this->User_models->brUStatus($userID);
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            // exit;

            $this->Borrow_models->addborrow();
            // $this->Borrow_models->addborrowTb();
            // $this->Borrow_models->addreturnTb();
            $this->Book_models->updateBookst($bookID);

            // $data['query']=$this->User_models->searchUserBr($u_sess);
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            // exit;
            $this->load->view('css');
            // $this->load->view('officer/borrow_view',$data);
            // $this->load->view('userList2_view',$data);
            redirect('borrowdata','refresh');

	}

	public function adddata()
	{ 
        $dt = $this->input->post('user_id');
        $bookID = $this->input->post('book_id');
        $borrowDay = $this->input->post('borrowDay');

        $this->db->select('user_id,book_id,borrowDay');
        $where = array('user_id ' => $dt , 'book_id ' => $bookID , 'borrowDay' => $borrowDay );
        $this->db->where($where);
        $query = $this->db->get('borrow_return');
        $num = $query->num_rows();
        if($num > 0){
            echo "<script>";
            echo "alert('รายการการยืมซ้ำ กรุณาทำรายการใหม่');";
            echo "</script>";
            redirect('borrowdata','refresh');
        }

        if($dt != ''){
       //การตั้งกฎในการเช็คข้อมูล เช่น ตัดช่องว่าง บังคับกรอกข้อมูล กรอกข้อมูลมากสุดได้เท่าไหร่
       $this->form_validation->set_rules('user_id','user_id', 'trim|required|max_length[7]');
       //$this->form_validation->set_rules('userType','userType', 'trim');
       $this->form_validation->set_rules('book_id','book_id', 'trim|required|max_length[5]');
       $this->form_validation->set_rules('borrowDay','borrowDay', 'trim|required');
       $this->form_validation->set_rules('officer_borrow','officer_borrow', 'trim|required');

       $this->form_validation->set_rules('borrowStatus','borrowStatus', 'trim|required');


       //หากมีข้อผิดพลาด
        if($this->form_validation->run() == FALSE){
            $data['query']=$this->Borrow_models->showdata();

            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            // exit;
            $this->load->view('officer/borrow_view',$data);
       }else{

            // $userT = $this->input->post('userType');
            // $userTD['datefinal'] = $this->Borrow_models->returnThaiDate($userT);

            // echo "<pre>";
            // print_r($dt);
            // echo "</pre>";
            // exit;

            //เรียกใช้ models
            $this->Borrow_models->addborrow();

            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";

            // $user_st = $this->input->post('userStatus');
            // $userTD['datefinal'] = $this->Borrow_models->returnThaiDate($user_st);
            // echo "<pre>";
            // print_r($userTD);
            // echo "</pre>";
            // exit;

            // $user_br_id = $this->input->post('user_id');
            // $data['dataST'] = $this->Borrow_models->returnDate($user_br_id);
            // $status = 0;
            // foreach ($data['dataST'] as $rw){
            //     $UStatus = $rw->userStatus_id;
            // }
            // $data['datefinal'] = $this->Borrow_models->returnThaiDate($UStatus);
            // echo $UStatus;

            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            // exit;

            // $userTD['datefinal'] = $this->Borrow_models->returnThaiDate($data);

            // echo "<pre>";
            // $testdata = $data
            // print_r($data);
            // print_r($data['dataST']);
            // $test = $data['dataST'];
            // print_r($test[0]);
            // $_SESSION["xxx"] = $test[0];
            // $userTD['datefinal'] = $this->Borrow_models->returnThaiDate($test[0]);
            // echo $test[0];
            // print_r($test.userStatus_id[0]);
            // echo $test.userStatus_id[0];
            // echo $test.userStatus_id[0];
            // echo "</pre>";

            // echo "<pre>";
            // print_r($userTD);
            // echo "</pre>";
            // exit;

            $data['query'] = $this->Borrow_models->uShow($dt);
            // $status = 0;
            // foreach ($data['query'] as $rw){
            //     $UStatus = $rw->userStatus_id;
            // }
            // $userTD['datefinal'] = $this->Borrow_models->returnThaiDate($UStatus);
            // echo $UStatus;

            // echo "<pre>";
            // $data['returnDay']=$data['datefinal'];
            // print_r($data);
            // echo "</pre>";
            // exit;

            $this->load->view('css');
            $this->load->view('officer/borrowList2_view',$data);
            // redirect('Showdata/borrowShow','refresh');
       }
       }
    
	}

    public function addList()
    {
        $this->form_validation->set_rules('user_id','ID', 'trim|required|max_length[7]');
        $this->form_validation->set_rules('book_id','book_ID', 'trim|required|max_length[5]');
        
        $this->form_validation->set_rules('borrowDay','borrowDay', 'trim|required');
        $this->form_validation->set_rules('returnDay','returnDay', 'trim');
        $this->form_validation->set_rules('officer_borrow','officer_borrow', 'trim|required');
     //    $this->form_validation->set_rules('officer_return','officer_return', 'trim|required');
        $this->form_validation->set_rules('borrowStatus','borrowStatus', 'trim|required');
        //หากมีข้อผิดพลาด
         if($this->form_validation->run() == FALSE){
             $data['query']=$this->Borrow_models->showdata();
 
             // echo "<pre>";
             // print_r($data);
             // echo "</pre>";
             // exit;
             $this->load->view('officer/borrow_view',$data);
        }else{

             //เรียกใช้ models
             $this->Borrow_models->addborrowList();
 
             // $data['query'] = $this->Borrow_models->uShow($dt);
             echo "<pre>";
             print_r($_POST);
             echo "</pre>";
             exit;
             // $this->load->view('css');
             // $this->load->view('officer/borrowList_view',$data);
             // redirect('Showdata/borrowShow','refresh');
        }
    }
    
    public function editdata()
	{ 
        $dt = $this->input->post('user_id');
        if($dt != ''){
        // //เรียกใช้ models
        // $this->user_models->adduser();
        // redirect('Showdata/userShow1','refresh');

        // การตั้งกฎในการเช็คข้อมูล เช่น ตัดช่องว่าง บังคับกรอกข้อมูล กรอกข้อมูลมากสุดได้เท่าไหร
       $this->form_validation->set_rules('borrowDay','borrowDay', 'trim|required');
       $this->form_validation->set_rules('user_id','user_id', 'trim|required');
       $this->form_validation->set_rules('returnDay','returnDay', 'trim|required');
       $this->form_validation->set_rules('officer_return','officer_return', 'trim|required');
       $this->form_validation->set_rules('borrowStatus','borrowStatus', 'trim|required');
       //หากมีข้อผิดพลาด
        if($this->form_validation->run() == FALSE){
            // $this->load->view('officer/borrowEdit_view');

            $borrow_id = $this->input->post('borrow_id');
            $data['query']=$this->Borrow_models->read($borrow_id);

            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            // exit;


            $this->load->view('css');
            $this->load->view('officer/borrowEdit_view',$data);
       }else{
            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";
            // exit;

            $rtdate = $this->input->post('returnDay');
            $realrtdate = $this->input->post('realreturnDay');
            // $data['fine'] = $this->Borrow_models->editborrowfine($realrtdate,$rtdate);
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            // exit;
            
            //เรียกใช้ models
            $this->Borrow_models->editborrow();
            
            $data['query'] = $this->Borrow_models->uShow($dt);
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            // exit;

            $this->load->view('css');
            // $this->load->view('officer/borrowList2_view',$data);
            redirect('Borrowdata/borrowpage','refresh');
       }
       }

	}

    public function edit($borrow_id)
	{

        // เป็นการเรียกใช้ model
        // ในการรับข้อมูลจะต้องมีการส่ง user_id เพราะมีการส่งจาก Url
        $data['query']=$this->Borrow_models->read($borrow_id);
        $data['q']=$this->Staff_models->showfine();
        $user_id = $_SESSION['user_id'];
        // echo $user_id;
        $data['usess']=$this->User_models->read($user_id);

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;

        $this->load->view('css');
        //ส่ง $data ไปแสดงที่หน้า list ด้วย
		$this->load->view('officer/borrowEdit_view',$data);

	}

    public function editRt($borrow_id)
	{

        // เป็นการเรียกใช้ model
        // ในการรับข้อมูลจะต้องมีการส่ง user_id เพราะมีการส่งจาก Url
        $data['query']=$this->Borrow_models->read($borrow_id);
        $data['q']=$this->Staff_models->showfine();
        $user_id = $_SESSION['user_id'];
        $data['usess']=$this->User_models->read($user_id);

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;

        $this->load->view('css');
        //ส่ง $data ไปแสดงที่หน้า list ด้วย
		$this->load->view('officer/borrowList2_view',$data);
	}

    public function Usearchdata($key)
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

        // $key = $this->input->post('key');
        // $key = $_SESSION['user_id'];
        $data['query'] = $this->Borrow_models->Usearch($key);
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        exit;
        $this->load->view('user/UborrowList_view' ,$data);
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

        $key = $this->input->post('key');
        $data['results'] = $this->Borrow_models->search($key);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('officer/borrowList_view' ,$data);
	}

    public function searchdatapage()
	{
        // $key = ($this->input->post("key"))? $this->input->post("key") : "NIL";
        $key = $this->input->post('key');
        // ที่ url แสดงคำค้นหาอยู่ที่ตำแหน่งที่ 4
        // $key = ($this->uri->segment(4)) ? $this->uri->segment(4) : $key;
        $config = array();
        // เรียกใช้งาน pagination ในฟังก์ชัน nextPage
        // $config['base_url'] = site_url("index.php/Borrowdata/searchdatapage/$key");
        $config['base_url'] = base_url('index.php/Borrowdata/searchdatapage/');
        $config['total_rows'] = $this->Borrow_models->search($key);
        $config['per_page'] = 10;
        // นับจาก controller -> fn ->ตำแหน่งแสดงตัวเลข
        $config['uri_segment'] = 3;
        // เพื่อให้แสดงว่า 1 หน้าแสดงกี่เรคคอด
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = round($choice);

        // $config['first_link'] = '<< First';
        // $config['last_link'] = 'Last >>';
        $config['next_link'] = 'Next ' . '&gt;';
        $config['prev_link'] = '&lt;' . ' Previous';
        // $config['num_tag_open'] = '<span class="number">';
        // $config['num_tag_close'] = '</span>';
        // $config['cur_tag_open'] = '<span class="current"><a href="#">';
        // $config['cur_tag_close'] = '</a></span>';

        $this->pagination->initialize($config);
        // 3
        $data['page'] = ($this->uri->segment(3))? $this->uri->segment(3):0;
        $data['results'] = $this->Borrow_models->limitSearch($config['per_page'],$data['page'],$key);
        $data['link'] = $this->pagination->create_links();
        $data['total_rows'] = $config['total_rows'];

        $this->load->view('css');
        $this->load->view('officer/borrowList_view' ,$data);
	}


    // ฟังก์ชันที่มีการทำ pagination
    public function nextPage()
	{
        $config = array();
        // เรียกใช้งาน pagination ในฟังก์ชัน nextPage
        $config['base_url'] = base_url('index.php/Borrowdata/nextPage/');
        $config['total_rows'] = $this->Borrow_models->showdatapage();
        // แสดงรายการต่อหน้า 10 รายการ
        $config['per_page'] = 10;
        // นับจาก controller -> fn ->ตำแหน่งแสดงตัวเลข
        $config['uri_segment'] = 3;
        // เพื่อให้แสดงว่า 1 หน้าแสดงกี่เรคคอด
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = round($choice);

        // $config['first_link'] = '<< First';
        // $config['last_link'] = 'Last >>';
        $config['next_link'] = 'Next ' . '&gt;';
        $config['prev_link'] = '&lt;' . ' Previous';
        // $config['num_tag_open'] = '<span class="number">';
        // $config['num_tag_close'] = '</span>';
        // $config['cur_tag_open'] = '<span class="current"><a href="#">';
        // $config['cur_tag_close'] = '</a></span>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3))? $this->uri->segment(3):0;
        $data['results'] = $this->Borrow_models->limitdatapage($config['per_page'],$data['page']);
        $data['link'] = $this->pagination->create_links();
        $data['total_rows'] = $config['total_rows'];

        $this->load->view('css');
        $this->load->view('officer/borrowList_view',$data);
	} 

    public function borrowpage()
	{
        $data['results'] = $this->Borrow_models->showdata();
        $data['fineType'] = $this->Fine_models->showfine();
        
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/borrowList_view' ,$data);
	}
    
    public function borrowpage2()
	{
        // $data['results'] = $this->Borrow_models->showdata();
        $data['fineType'] = $this->Fine_models->showfine();
        $data['results'] = $this->Borrow_models->checkreturnBook2();
        
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/borrowList_view' ,$data);
	}

    public function userBorrowpage()
	{
        $user_id = $_SESSION['user_id'];
        $data['results'] = $this->Borrow_models->ushow($user_id);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('user/user_borrowlist_view' ,$data);
	} 

    public function userBorrowpageS()
	{
        $user_id = $_SESSION['user_id'];
        $data['results'] = $this->Borrow_models->uShowSearch($user_id);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('user/user_borrowlist_view' ,$data);
	} 

    public function userCheckReturnpag()
	{
        $user_id = $_SESSION['user_id'];
        $data['results'] = $this->Borrow_models->checkUserReturnBook2($user_id);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('user/user_borrowlist_view' ,$data);
	} 
    
    
    
}
