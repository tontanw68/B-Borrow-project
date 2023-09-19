<!-- จัดการข้อมูลผู้ใช้ -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insertdata extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // include('excel/PHPExcel.php');
        $this->load->model('User_models');
        $this->load->model('Option_models');
        $this->load->model('Book_models');
        $this->load->model('Autocomplete_models');
    }

	
    public function index()
	{
        $aduserid = array();
        $aduser = array();
        $adname = array();
        $adsername = array();
        $ademail = array();
        $adphone = array();
        $result  = $this->Autocomplete_models->autoUser1();
        $result2  = $this->Autocomplete_models->autoUser2();
        $result3  = $this->Autocomplete_models->autoUser3();   
        $result4  = $this->Autocomplete_models->autoUser4();
        $result5  = $this->Autocomplete_models->autoUser5();
        $result6  = $this->Autocomplete_models->autoUser6();

        foreach($result as $key=>$value){
           array_push($aduserid, $value["user_id"]);
        }
        foreach($result2 as $key=>$value){
            array_push($aduser, $value["user"]);
         }
         foreach($result3 as $key=>$value){
            array_push($adname, $value["name"]);
         }
         foreach($result4 as $key=>$value){
            array_push($adsername, $value["surename"]);
         }
         foreach($result5 as $key=>$value){
            array_push($ademail, $value["email"]);
         }
         foreach($result6 as $key=>$value){
            array_push($adphone, $value["phoneNo"]);
         }

        $data['aduserid'] = $aduserid;
        $data['aduser'] = $aduser;
        $data['adname'] = $adname;
        $data['adsername'] = $adsername;
        $data['ademail'] = $ademail;
        $data['adphone'] = $adphone;

        $data['typedt'] = $this->Option_models->typedata();
        $data['statusdt'] = $this->Option_models->userStdata();
        $data['allowdata'] = $this->Option_models->allowdata();

        $this->load->view('css');
        // $this->load->view('userList_view',$data);

        // เรียกใช้ดาต้าเพื่อเอาข้อมูลจากดาตเาเบสไปแสดงที่ insertdata_view
		$this->load->view('admin/insertdata_view',$data);
        // $this->load->view('userList2_view',$data);
		
	}

    public function index2()
	{
        $this->load->view('css');
		$this->load->view('admin/insert_file_view');
        // $this->load->view('userList2_view',$data);
		
	}

    public function index3()
	{
        $this->load->view('css');
		$this->load->view('officer/insertBook_file');
        // $this->load->view('userList2_view',$data);
		
	}

    public function index4()
	{
        $this->load->view('css');
		$this->load->view('admin/insertBook2_file');
        // $this->load->view('userList2_view',$data);
		
	}

    public function edit($user_id)
	{
        if($user_id == $_SESSION['user_id']){
            $adedituserid = array();
            $adedituser = array();
            $adeditname = array();
            $adeditsername = array();
            $adeditemail = array();
            $adeditphone = array();
            $result  = $this->Autocomplete_models->autoUser1();
            $result2  = $this->Autocomplete_models->autoUser2();
            $result3  = $this->Autocomplete_models->autoUser3();   
            $result4  = $this->Autocomplete_models->autoUser4();
            $result5  = $this->Autocomplete_models->autoUser5();
            $result6  = $this->Autocomplete_models->autoUser6();

            foreach($result as $key=>$value){
            array_push($adedituserid, $value["user_id"]);
            }
            foreach($result2 as $key=>$value){
                array_push($adedituser, $value["user"]);
            }
            foreach($result3 as $key=>$value){
                array_push($adeditname, $value["name"]);
            }
            foreach($result4 as $key=>$value){
                array_push($adeditsername, $value["surename"]);
            }
            foreach($result5 as $key=>$value){
                array_push($adeditemail, $value["email"]);
            }
            foreach($result6 as $key=>$value){
                array_push($adeditphone, $value["phoneNo"]);
            }

            $data['adedituserid'] = $adedituserid;
            $data['adedituser'] = $adedituser;
            $data['adeditname'] = $adeditname;
            $data['adeditsername'] = $adeditsername;
            $data['adeditemail'] = $adeditemail;
            $data['adeditphone'] = $adeditphone;
            
            // เป็นการเรียกใช้ model
            // ในการรับข้อมูลจะต้องมีการส่ง user_id เพราะมีการส่งจาก Url
            $data['query']=$this->User_models->read($user_id);
            $data['typedt'] = $this->Option_models->typedata();
            $data['statusdt'] = $this->Option_models->userStdata();
            $data['allowdata'] = $this->Option_models->allowdata();
            $data['booktype'] = $this->Book_models->booktypeNorderby();

            //  print_r($data);
            //  exit;

            $this->load->view('css');
            $this->load->view('admin/adminEdit_view',$data);
            // $this->load->view('user_view',$data);
        }else{
            $adedituserid2 = array();
            $adedituser2 = array();
            $adeditname2 = array();
            $adeditsername2 = array();
            $adeditemail2 = array();
            $adeditphone2 = array();
            $result  = $this->Autocomplete_models->autoUser1();
            $result2  = $this->Autocomplete_models->autoUser2();
            $result3  = $this->Autocomplete_models->autoUser3();   
            $result4  = $this->Autocomplete_models->autoUser4();
            $result5  = $this->Autocomplete_models->autoUser5();
            $result6  = $this->Autocomplete_models->autoUser6();

            foreach($result as $key=>$value){
                array_push($adedituserid2, $value["user_id"]);
            }
            foreach($result2 as $key=>$value){
                array_push($adedituser2, $value["user"]);
            }
            foreach($result3 as $key=>$value){
                array_push($adeditname2, $value["name"]);
            }
            foreach($result4 as $key=>$value){
                array_push($adeditsername2, $value["surename"]);
            }
            foreach($result5 as $key=>$value){
                array_push($adeditemail2, $value["email"]);
            }
            foreach($result6 as $key=>$value){
                array_push($adeditphone2, $value["phoneNo"]);
            }

            $data['adedituserid2'] = $adedituserid2;
            $data['adedituser2'] = $adedituser2;
            $data['adeditname2'] = $adeditname2;
            $data['adeditsername2'] = $adeditsername2;
            $data['adeditemail2'] = $adeditemail2;
            $data['adeditphone2'] = $adeditphone2;
            

            // เป็นการเรียกใช้ model
            // ในการรับข้อมูลจะต้องมีการส่ง user_id เพราะมีการส่งจาก Url
            $data['query']=$this->User_models->read($user_id);
            $data['typedt'] = $this->Option_models->typedata();
            $data['statusdt'] = $this->Option_models->userStdata();
            $data['allowdata'] = $this->Option_models->allowdata();
            $data['booktype'] = $this->Book_models->booktypeNorderby();

            //  print_r($data);
            //  exit;

            $this->load->view('css');
            $this->load->view('admin/userEdit_view',$data);
            // $this->load->view('user_view',$data);
        }
        
		
	}
	public function adddata()
	{ 
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //ป้องกันการเพิ่มข้อมูลซ้ำ
       $user_id = $this->input->post('id');
    //    $this->db->select('user_id');
    //    $this->db->where('user_id',$user_id);
    //    $query = $this->db->get('user');
    //    $num = $query->num_rows();
    //     //    echo $num;
    //     //    exit;
    //     if($num > 0){
    //         echo "<script>";
    //         echo "alert(' ข้อมูลซ้ำ กรุณาเพิ่มข้อมูลอีกครั้ง');";
    //         echo "</script>";
    //         redirect('Showdata/userShow1','refresh');
    //     }else{

        // การตั้งกฎในการเช็คข้อมูล เช่น ตัดช่องว่าง บังคับกรอกข้อมูล กรอกข้อมูลมากสุดได้เท่าไหร่
       $this->form_validation->set_rules('id','ID', 'trim|required|max_length[7]');
       $this->form_validation->set_rules('user','Username', 'trim|required');
       $this->form_validation->set_rules('password','Password', 'trim|required');
       $this->form_validation->set_rules('prename','Prename', 'trim|required');
       $this->form_validation->set_rules('name','Name', 'trim|required');
       $this->form_validation->set_rules('surename','Surename', 'trim|required');
    //    $this->form_validation->set_rules('email','Email', 'trim|required');
    //    $this->form_validation->set_rules('phoneNo','Tel', 'trim|required|max_length[10]');
       $this->form_validation->set_rules('userType','Type', 'trim|required');
       $this->form_validation->set_rules('allow','Allow', 'trim|required');
       $this->form_validation->set_rules('userStatus','UserStatus', 'trim|required');
       //หากมีข้อผิดพลาด
        if($this->form_validation->run() == FALSE){
            $aduserid = array();
            $aduser = array();
            $adname = array();
            $adsername = array();
            $ademail = array();
            $adphone = array();
            $result  = $this->Autocomplete_models->autoUser1();
            $result2  = $this->Autocomplete_models->autoUser2();
            $result3  = $this->Autocomplete_models->autoUser3();   
            $result4  = $this->Autocomplete_models->autoUser4();
            $result5  = $this->Autocomplete_models->autoUser5();
            $result6  = $this->Autocomplete_models->autoUser6();

            foreach($result as $key=>$value){
            array_push($aduserid, $value["user_id"]);
            }
            foreach($result2 as $key=>$value){
                array_push($aduser, $value["user"]);
            }
            foreach($result3 as $key=>$value){
                array_push($adname, $value["name"]);
            }
            foreach($result4 as $key=>$value){
                array_push($adsername, $value["surename"]);
            }
            foreach($result5 as $key=>$value){
                array_push($ademail, $value["email"]);
            }
            foreach($result6 as $key=>$value){
                array_push($adphone, $value["phoneNo"]);
            }

            $data['aduserid'] = $aduserid;
            $data['aduser'] = $aduser;
            $data['adname'] = $adname;
            $data['adsername'] = $adsername;
            $data['ademail'] = $ademail;
            $data['adphone'] = $adphone;

            $data['typedt'] = $this->Option_models->typedata();
            $data['statusdt'] = $this->Option_models->userStdata();
            $data['allowdata'] = $this->Option_models->allowdata();

            $this->load->view('css');
            $this->load->view('admin/insertdata_view',$data);
            // $this->load->view('admin/insertdata_view');
           
       }else{

            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";
            // exit;
            
            //เรียกใช้ models
            $this->User_models->adduser($user_id );
            redirect('Showdata/userShow1','refresh');
       }
    //    }

	}

    public function editdata()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        $user_id = $this->input->post('id');
        //เรียกใช้ models
        //เรียกไปที่ user_models ที่ฟังก์ชัน edituser
        // $this->User_models->edituserEncrypt();
        // redirect('Showdata/userShow1','refresh');

        // การตั้งกฎในการเช็คข้อมูล เช่น ตัดช่องว่าง บังคับกรอกข้อมูล กรอกข้อมูลมากสุดได้เท่าไหร่
       $this->form_validation->set_rules('user','User', 'trim|required');
       $this->form_validation->set_rules('password','Password', 'trim|required');
       $this->form_validation->set_rules('prename','Prename', 'trim');
       $this->form_validation->set_rules('name','Name', 'trim|required');
       $this->form_validation->set_rules('surename','Surename', 'trim|required');
    //    $this->form_validation->set_rules('email','Email', 'trim|required');
    //    $this->form_validation->set_rules('phoneNo','PhoneNo', 'trim|required|max_length[10]');
       $this->form_validation->set_rules('bookType','BookType', 'trim|required');
       $this->form_validation->set_rules('type','Type', 'trim|required');
       $this->form_validation->set_rules('allow','Allow', 'trim|required');
       $this->form_validation->set_rules('userType','UserType', 'trim|required');
       //หากมีข้อผิดพลาด
        if($this->form_validation->run() == FALSE){
            // echo 'baba';
            // // $this->load->view('userEdit_view');

            // $user_id = $this->input->post('user_id');
            // $data['query']=$this->User_models->read($user_id);
            // //  print_r($data);            
            // //  exit;
            // $this->load->view('css');
            // $this->load->view('admin/userEdit_view',$data);

            // เป็นการเรียกใช้ model
            // ในการรับข้อมูลจะต้องมีการส่ง user_id เพราะมีการส่งจาก Url
            $data['query']=$this->User_models->read($user_id);
            $data['typedt'] = $this->Option_models->typedata();
            $data['statusdt'] = $this->Option_models->userStdata();
            $data['allowdata'] = $this->Option_models->allowdata();
            $data['booktype'] = $this->Book_models->booktypeNorderby();

            //  print_r($data);
            //  exit;

            $this->load->view('css');
            $this->load->view('admin/userEdit_view',$data);
            // $this->load->view('user_view',$data);
       }else{
            
            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";
            // exit;

            //เรียกใช้ models
            $this->User_models->edituser();
            redirect('Showdata/userShow1','refresh');
       }

	}

    public function addUserFile()
    {
        $files=$_FILES["file"]['name'];
		$exp_files= explode( '.', $files ) ;
		$files_type=$_FILES["file"]['type'];
		$filename=$_FILES["file"]["tmp_name"];		
		// echo $files,'<br>';
		// echo $files_type,'<br>';
		// echo $exp_files[0],'<br>';
		// echo $exp_files[1],'<br>';
        // exit;
        $exp_files[0];
        $exp_files[1];
        if(strcmp($exp_files[1], "csv") !== 0){
			// echo $files,"not csv";
            echo "<script>";
            echo "alert('อัพโหลดไฟล์สกุล csv เท่านั้น');";
            echo "</script>";
            redirect('Insertdata/index2','refresh');
		}
		else{
            $data['query'] = $this->User_models->adduserfile($filename);
            redirect('Showdata/userShow1','refresh');
		}
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
        $data['query'] = $this->user_models->search($key);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('admin/userList_view' ,$data);
	}
}
