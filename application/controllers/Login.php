<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Announce_models');
        $this->load->model('User_models');
        $this->load->model('Book_models');
        $this->load->model('Rules_models');
    }

	public function index()
	{
        //เป็นการเรียกใช้ model
        // $data['query']=$this->user_models->showdata();

        //  print_r($data);
        
        //  exit;
        // print_r($_SESSION);
        $this->load->view('css');
		$this->load->view('login_view');
        // $this->load->view('user_view',$data);
		
	}

    public function new_Index()
	{
        //เป็นการเรียกใช้ model
        // $data['query']=$this->user_models->showdata();
        $data['query']=$this->Announce_models->showdata3();
        $data['showNbook']=$this->Book_models->showBookIndex();

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        //  exit;
        // print_r($_SESSION);
        $this->load->view('css');
		$this->load->view('newIndex',$data);
        // $this->load->view('user_view',$data);
		
	}

    public function new_locao()
	{
        //เป็นการเรียกใช้ model
        // $data['query']=$this->user_models->showdata();
        $data['query']=$this->Announce_models->showdata3();

        //  print_r($data);
        
        //  exit;
        // print_r($_SESSION);
        $this->load->view('css');
		$this->load->view('template/loco',$data);
        // $this->load->view('user_view',$data);
		
	}

    public function new_rules()
	{
        //เป็นการเรียกใช้ model
        // $data['query']=$this->user_models->showdata();
        // $data['query']=$this->Announce_models->showdata3();
        $data['query']=$this->Rules_models->showRulesMainpage();

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        // print_r($_SESSION);
        $this->load->view('css');
		$this->load->view('template/rules_view',$data);
        // $this->load->view('user_view',$data);
		
	}

    public function check()
    {
        $user=$this->input->post('inputuser');
        $password=$this->input->post('inputpassword');

        // echo 'user ='.$user;
        // echo '<br>';
        // echo 'password ='.$password;

        // print_r($_POST);
        
        // $user=$this->input->post('user');
        // 	$password=$this->input->post('password');
                if($user=='admin' && $password=='admin'){
                    // echo 'login ok';
                    // สร้างตัวแปร session ชื่อ level ค่าที่อยู่ใน level คือ admin 
                    $this->session->set_userdata('level','admin');
                    // print_r($_SESSION);
                    redirect('admindata','refresh');
                }else{
                    echo'can not login';
                    redirect('login','refresh');
                }
                
    }

    public function logout()
    {
        // เมื่อออกจากระบบแล้วให้ล้าง session ออกให้หมด
        $this->session->unset_userdata(array('user_id','type','name','surename'));
        redirect('login/new_Index','refresh');
    }

    public function check2()
	{
        // ถ้าค่าที่รับเข้ามาเป็นค่าว่าง
       if($this->input->post('inputuser')==''){
            // ให้กลับไปที่หน้า login อีกครั้ง
            redirect('login','refresh');
       }else{
           $pass = md5($this->input->post('inputpassword'));
        //    print_r($this->input->post());
        //    print_r($pass);
        //    exit;
           echo '</pre>';

            // สร้างตัวแปลรับค่าข้อมูลจาก inputuser และ inputpassword ไปเทียบกับตาราง
            // เรียกใช้งาน User_models ที่ฟังก์ชัน user_login
           $result = $this->User_models->user_login(
               $this->input->post('inputuser'),
               $pass
           );
            //print_r($result);
            // exit;

            
            // ถ้าข้อมูลที่เราเอาไปเทียบแล้วไม่ใช่ค่าว่าง   
            if(!empty($result)){
                // echo $result->allow_id;
                // exit;
                if($result->userStatus_id == 3 || $result->allow_id == 2){
                    // $this->session->unset_userdata(array('user_id','type','name','surename','typename','userStatus_type'));
                    echo "<script>";
                    echo "alert('ไม่สามารถเข้าใช้งานได้');";
                    echo "</script>";
                    redirect('login','refresh');
                }
            //    สร้างตัวแปล u_sess ที่จะสร้างสร้าง session เพื่อใช้ในการเช็คสิทธ์ในการเข้าใช้ระบบ
                $u_sess=array(
                    // ส่ง id เข้าเมื่อเราต้องการเพิ่มข้อมูล
                    'user_id' => $result->user_id,
                    'type' => $result->type_id,
                    'id' => $result->user_id,
                    'name' => $result->name,
                    'surename' => $result->surename,
                    'userStatus_id' => $result->userStatus_id,
                    'typename' => $result->type,
                    'userStatus_type' => $result->userStatus_type
                );
                // print_r($u_sess);
                // exit;

                //สร้าง session 
                $this->session->set_userdata($u_sess);
                print_r($_SESSION);
                // exit;
                $type = $_SESSION['type'];
                // echo 'type'.$type;
                
                if($type == 1){
                    redirect('admindata','refrech');
                }elseif($type == 2){
                    // echo 'are you officer';
                    redirect('officerdata','refrech');
                }elseif($type == 3){
                    // echo 'are you user';
                    redirect('userdata','refrech');
                }

           }
        //    else if($result->userStatus_id == 3){
        //         $this->session->unset_userdata(array('user_id','type','name','surename','typename','userStatus_type'));
        //         echo "<script>";
        //         echo "alert('ไม่สามารถเข้าใช้งานได้');";
        //         echo "</script>";
        //         redirect('login','refresh');
        //    }
           else{
            //    ล้าง session ออกเมื่อไม่มี user password ในฐานข้อมูล
                $this->session->unset_userdata(array('user_id','type','name','surename','typename','userStatus_type'));
                echo "<script>";
                echo "alert('ข้อมูลไม่ถูกต้อง');";
                echo "</script>";
                redirect('login','refresh');
           }
       }
    
    
    //    redirect('Login','refresh');
		
	}

    // ทดสอบ form_validation 
    // public function index2()
	// {
    //     // ถ้าช่อง username ไม่มีการกรอกข้อมูลมันจะแสดง Username required
    //     $this->form_validation->set_rules('username', 'Username', 'required');
    //     $this->form_validation->set_rules('password', 'Password', 'required',
    //             array('required' => 'You must provide a %s.')
    //     );
    //     $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
    //     $this->form_validation->set_rules('email', 'Email', 'required');

    //     // form_validation เป็นตัวกรองข้อมูลเมื่อเรากรอกข้อมูลเว้นว่าง
    //     if ($this->form_validation->run() == FALSE)
    //     {
    //             $this->load->view('form_view');
    //     }
    //     else
    //     {
    //             $this->load->view('sweet_view');
    //     }
		
	// }

    public function index2()
	{

        

        // ถ้าช่อง username ไม่มีการกรอกข้อมูลมันจะแสดง Username required
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        // form_validation เป็นตัวกรองข้อมูลเมื่อเรากรอกข้อมูลเว้นว่าง
        if ($this->form_validation->run() == FALSE)
        {
                $this->load->view('form_view');
        }
        else
        {
                $this->load->view('sweet_view');
        }
		
	}

    public function BookDetails($book_id)
    {

        $user_id = $_SESSION['user_id'];
        // เป็นการเรียกใช้ model
        // ในการรับข้อมูลจะต้องมีการส่ง user_id เพราะมีการส่งจาก Url
        //$data['user']=$this->User_models->read($user_id);
        $data['query']=$this->Book_models->read($book_id);
        // $data['datenow']=$this->Reserve_models->thdatenow();

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;

        $this->load->view('css');
        $this->load->view('newIndex',$data);
        // $this->load->view('user_view',$data);

    }
  
}
