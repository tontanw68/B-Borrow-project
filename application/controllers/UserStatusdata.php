<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class UserStatusdata extends CI_Controller{

        public function __construct()
        {
            parent::__construct();
            $this->load->model('Book_models');
            $this->load->model('User_models');
            $this->load->model('Option_models');
            $this->load->model('Autocomplete_models');
        }

        public function index()
        {
            $data['userSt']=$this->Option_models->userStdata();
            // $this->load->view('css');
            // $this->load->view('officer/userStatus_view',$data);

            $brDate = array();
            $bName = array();
            $ofUstType = array();
            
            $result  = $this->Autocomplete_models->autousStatus1(); //collect all college name
            $result2  = $this->Autocomplete_models->autousStatus2();
            $result3  = $this->Autocomplete_models->autousStatus3();
            
            foreach($result as $key=>$value){
                array_push($brDate, $value["borrowDate"]);
            }
            foreach($result2 as $key=>$value){
                array_push($bName, $value["number"]);
            }
            foreach($result3 as $key=>$value){
                array_push($ofUstType, $value["userStatus_type"]);
            }

            $data['brDate'] = $brDate;
            $data['bName'] = $bName;
            $data['ofUstType'] = $ofUstType;
            
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            // exit;
            $this->load->view('css');
            // $this->load->view('officer/autocomplete2_view',$data);   
            $this->load->view('officer/userStatus_view',$data); 
            
        }

        public function index2()
        {
            $adbrDate = array();
            $adbrNum = array();
            $adUstType = array();
            
            $result  = $this->Autocomplete_models->autousStatus1(); //collect all college name
            $result2  = $this->Autocomplete_models->autousStatus2();
            $result3  = $this->Autocomplete_models->autousStatus3();
            
            foreach($result as $key=>$value){
                array_push($adbrDate, $value["borrowDate"]);
            }
            foreach($result2 as $key=>$value){
                array_push($adbrNum, $value["number"]);
            }
            foreach($result3 as $key=>$value){
                array_push($adUstType, $value["userStatus_type"]);
            }

            $data['adbrDate'] = $adbrDate;
            $data['adbrNum'] = $adbrNum;
            $data['adUstType'] = $adUstType;

            $data['userSt']=$this->Option_models->userStdata();
            $this->load->view('css');
            $this->load->view('admin/userStatus2_view',$data);
 
        }

        // เพิ่มข้อมูล
        public function addUserStatusdata()
        {
            // การตั้งกฎในการเช็คข้อมูล เช่น ตัดช่องว่าง บังคับกรอกข้อมูล กรอกข้อมูลมากสุดได้เท่าไหร่
            $this->form_validation->set_rules('userStatus_type','UserStatus_type', 'trim|required');
            $this->form_validation->set_rules('borrowDate','BorrowDate', 'trim|required');
            $this->form_validation->set_rules('number','Number', 'trim|required');
            // แบบที่1
            // หากมีข้อผิดพลาด
            // if($this->form_validation->run() == FALSE){
            //     $this->load->view('admin/book_view');

            // }else{

            //     $this->Book_models->addbook();
            //     redirect('Showdata/bookShow3','refresh');    
            // }
            
            // แบบที่2
            $type = $_SESSION['type'];
            if($type == 1){
                if($this->form_validation->run() == FALSE){
                    // echo 'bibi';

                    $adbrDate = array();
                    $adbrNum = array();
                    $adUstType = array();
                    
                    $result  = $this->Autocomplete_models->autousStatus1(); //collect all college name
                    $result2  = $this->Autocomplete_models->autousStatus2();
                    $result3  = $this->Autocomplete_models->autousStatus3();
                    
                    foreach($result as $key=>$value){
                        array_push($adbrDate, $value["borrowDate"]);
                    }
                    foreach($result2 as $key=>$value){
                        array_push($adbrNum, $value["number"]);
                    }
                    foreach($result3 as $key=>$value){
                        array_push($adUstType, $value["userStatus_type"]);
                    }

                    $data['adbrDate'] = $adbrDate;
                    $data['adbrNum'] = $adbrNum;
                    $data['adUstType'] = $adUstType;
                    
                    $data['userSt']=$this->Option_models->userStdata();
                    $this->load->view('css');
                    $this->load->view('admin/userStatus2_view',$data);
                   
                }
                else{
                    $this->User_models->addUserStatus();
                    redirect('Showdata/userStatusShow2','refresh');

                }
            }elseif($type == 2){
                if($this->form_validation->run() == FALSE){
                    // echo 'baba';
                    $data['userSt']=$this->Option_models->userStdata();
                    // $this->load->view('css');
                    // $this->load->view('officer/userStatus_view',$data);

                    $brDate = array();
                    $bName = array();
                    
                    $result  = $this->Autocomplete_models->autousStatus1(); //collect all college name
                    $result2  = $this->Autocomplete_models->autousStatus2();
                    
                    foreach($result as $key=>$value){
                        array_push($brDate, $value["borrowDate"]);
                    }
                    foreach($result2 as $key=>$value){
                        array_push($bName, $value["number"]);
                    }

                    $data['brDate'] = $brDate;
                    $data['bName'] = $bName;

                    $this->load->view('css');
                    $this->load->view('officer/userStatus_view',$data);

                }
                else{
                    // echo "<pre>";
                    // print_r($_POST);
                    // echo "</pre>";
                    // exit;
                    $this->User_models->addUserStatus();
                    redirect('Showdata/userStatusShow','refresh');
                }
            } 
        }

        public function editUserStatusdata()
	{
             // การตั้งกฎในการเช็คข้อมูล เช่น ตัดช่องว่าง บังคับกรอกข้อมูล กรอกข้อมูลมากสุดได้เท่าไหร่
             $this->form_validation->set_rules('userStatus_type','userStatus_type', 'trim|required');
             $this->form_validation->set_rules('borrowDate','borrowDate', 'trim|required');
             $this->form_validation->set_rules('number','number', 'trim|required');
            //หากมีข้อผิดพลาด
            // if($this->form_validation->run() == FALSE){
            //     // echo 'baba';
            //     // $this->load->view('user/uEdit_view');
            //     $userStatus_id = $this->input->post('userStatus_id');
            //     $data['query']=$this->User_models->readUserstatus( $userStatus_id);
            //     // echo '<pre>';
            //     // print_r($data);
            //     // echo '<pre>';
            //     // exit();  
            //     $this->load->view('css');
            //     $this->load->view('officer/userStatusEdit_view',$data);
            // }else{
                
            //     //  echo "<pre>";
            //     // print_r($_POST);
            //     // echo "</pre>";
            //     //  exit;
    
            //     //เรียกใช้ models
            //     $this->User_models->editUserStatus();
            //     //    redirect('Showdata/index','refresh');
            //     $this->load->view('css');
            //     redirect('Showdata/userStatusShow','refresh');
            // }	
            
            // แบบที่2
            $type = $_SESSION['type'];
            if($type == 1){
                if($this->form_validation->run() == FALSE){
                    // echo 'bibi';
                    $userStatus_id = $this->input->post('userStatus_id');
                    $data['query']=$this->User_models->readUserstatus($userStatus_id);
                    $data['adminus']=$this->Option_models->userStdata();

                    $this->load->view('css');
                    $this->load->view('admin/userStatusEdit2_view',$data);
                   
                }
                else{
                    //  echo "<pre>";
                    // print_r($_POST);
                    // echo "</pre>";
                    //  exit;
        
                    //เรียกใช้ models
                    $this->User_models->editUserStatus();
                    //    redirect('Showdata/index','refresh');
                    $this->load->view('css');
                    redirect('Showdata/userStatusShow2','refresh');

                }
            }elseif($type == 2){
                if($this->form_validation->run() == FALSE){
                    // echo 'baba';
                    // $this->load->view('user/uEdit_view');
                    $userStatus_id = $this->input->post('userStatus_id');
                    $data['query']=$this->User_models->readUserstatus( $userStatus_id);
                    $data['officerus']=$this->Option_models->userStdata();
                    // echo '<pre>';
                    // print_r($data);
                    // echo '<pre>';
                    // exit();  
                    $this->load->view('css');
                    $this->load->view('officer/userStatusEdit_view',$data);

                }
                else{
                    //  echo "<pre>";
                    // print_r($_POST);
                    // echo "</pre>";
                    //  exit;
        
                    //เรียกใช้ models
                    $this->User_models->editUserStatus();
                    //    redirect('Showdata/index','refresh');
                    $this->load->view('css');
                    redirect('Showdata/userStatusShow','refresh');
                }
            } 
	}

        public function editUserStatus($userStatus_id)
        {
            // เป็นการเรียกใช้ model
            // ในการรับข้อมูลจะต้องมีการส่ง user_id เพราะมีการส่งจาก Url
            $data['query']=$this->User_models->readUserstatus($userStatus_id);
            $data['officerus']=$this->Option_models->userStdata();

            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            // exit;

            // $this->load->view('css');
            // $this->load->view('officer/userStatusEdit_view',$data);
            // $this->load->view('user_view',$data);

            $brDate = array();
            $brNum = array();
            
            $result  = $this->Autocomplete_models->autousStatus1(); //collect all college name
            $result2  = $this->Autocomplete_models->autousStatus2();
            
            foreach($result as $key=>$value){
                array_push($brDate, $value["borrowDate"]);
            }

            foreach($result2 as $key=>$value){
                array_push($brNum, $value["number"]);
            }

            $data['brDate'] = $brDate;
            $data['brNum'] = $brNum;
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            // exit;
            $this->load->view('css');
            // $this->load->view('officer/autocomplete2_view',$data);   
            $this->load->view('officer/userStatusEdit_view',$data);  
            
        }

        public function editUserStatus2($userStatus_id)
        {
            // เป็นการเรียกใช้ model
            // ในการรับข้อมูลจะต้องมีการส่ง user_id เพราะมีการส่งจาก Url
            $data['query']=$this->User_models->readUserstatus($userStatus_id);
            $data['adminus']=$this->Option_models->userStdata();

            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            // exit;

            $this->load->view('css');
            $this->load->view('admin/userStatusEdit2_view',$data);
            // $this->load->view('user_view',$data);
            
        }

    }

?>