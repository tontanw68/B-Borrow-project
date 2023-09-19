<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Announcedata extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Announce_models');
        $this->load->model('Autocomplete_models');
    }

	
	public function index()
	{
        $aduser_id = array();
        $adanDetails = array();
        $adanSection = array();
        $result  = $this->Autocomplete_models->autoUser1(); //collect all college name
        $result2  = $this->Autocomplete_models->autoAnnounce2();
        $result3  = $this->Autocomplete_models->autoAnnounce1();
        
        foreach($result as $key=>$value){
           array_push($aduser_id, $value["user_id"]);
        }
        foreach($result2 as $key=>$value){
            array_push($adanDetails, $value["announceDetails"]);
         }
         foreach($result3 as $key=>$value){
            array_push($adanSection, $value["announceSection"]);
         }

        $data['aduser_id'] = $aduser_id;
        $data['adanDetails'] = $adanDetails;
        $data['adanSection'] = $adanSection;

        $this->load->view('css');
		$this->load->view('admin/announce_view',$data);
        // $this->load->view('user_view',$data);
		
	}
    public function index2()
	{
        //เป็นการเรียกใช้ model
        // $data['query']=$this->user_models->showdata();

        //  print_r($data);
        
        //  exit;

        $anU_id = array();
        $ofanDetails = array();
        $ofanSection = array();
        $result  = $this->Autocomplete_models->autoUser1(); //collect all college name
        $result2  = $this->Autocomplete_models->autoAnnounce2();
        $result3  = $this->Autocomplete_models->autoAnnounce1();

        foreach($result as $key=>$value){
           array_push($anU_id, $value["user_id"]);
        }
        foreach($result2 as $key=>$value){
            array_push($ofanDetails, $value["announceDetails"]);
         }
         foreach($result3 as $key=>$value){
            array_push($ofanSection, $value["announceSection"]);
         }

        $data['anU_id'] = $anU_id;
        $data['ofanDetails'] = $ofanDetails;
        $data['ofanSection'] = $ofanSection;
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;

        $this->load->view('css');
		$this->load->view('officer/officerAnnounce_view',$data);
        // $this->load->view('user_view',$data);
		
	}
    public function edit($announce_id)
	{
        // เป็นการเรียกใช้ model
        // ในการรับข้อมูลจะต้องมีการส่ง user_id เพราะมีการส่งจาก Url
        $data['query']=$this->Announce_models->read($announce_id);

        //  print_r($data);
        
        //  exit;

        // แบบที่1
        // $this->load->view('css');
		// $this->load->view('announceEdit_view',$data);

        // แบบที่2
        $type = $_SESSION['type'];

        if($type == 1){
            // echo 'bibi';
            $adedituser_id = array();
            $adeditAndetails = array();
            $adeditSection = array();
            $result  = $this->Autocomplete_models->autoUser1(); //collect all college name
            $result2  = $this->Autocomplete_models->autoAnnounce2();
            $result3  = $this->Autocomplete_models->autoAnnounce1();
            
            foreach($result as $key=>$value){
            array_push($adedituser_id, $value["user_id"]);
            }
            foreach($result2 as $key=>$value){
                array_push($adeditAndetails, $value["announceDetails"]);
             }
             foreach($result3 as $key=>$value){
                array_push($adeditSection, $value["announceSection"]);
             }

            $data['adedituser_id'] = $adedituser_id;
            $data['adeditAndetails'] = $adeditAndetails;
            $data['adeditSection'] = $adeditSection;

            $this->load->view('css');
            $this->load->view('admin/announceEdit_view',$data);

        }elseif($type == 2){
            $eAnUser_id = array();
            $ofeditAndetails = array();
            $ofeditSection = array();
            $result  = $this->Autocomplete_models->autoUser1(); //collect all college name
            $result2  = $this->Autocomplete_models->autoAnnounce2();
            $result3  = $this->Autocomplete_models->autoAnnounce1();
            
            foreach($result as $key=>$value){
            array_push($eAnUser_id, $value["user_id"]);
            }
            foreach($result2 as $key=>$value){
                array_push($ofeditAndetails, $value["announceDetails"]);
             }
             foreach($result3 as $key=>$value){
                array_push($ofeditSection, $value["announceSection"]);
             }

            $data['eAnUser_id'] = $eAnUser_id;
            $data['ofeditAndetails'] = $ofeditAndetails;
            $data['ofeditSection'] = $ofeditSection;
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            // exit;
            
            $this->load->view('css');
            $this->load->view('officer/announceEdit1_view',$data);
        }	
	}
    public function addimgdata()
    {
        // $date = $this->input->post('announceDate');
        // if($date != ''){
        //     //ส่งค่าวันที่ไปแปลงเป็นวันที่ภาษาไทยแต่บันทึกเป็นสากลยุดีนะ
        //     $data['th'] = $this->Announce_models->thdate($date);
        //     // echo "<pre>";
        //     // print_r($data);
        //     // echo "</pre>";
        //     // exit;
        // }
        
        // การตั้งกฎในการเช็คข้อมูล เช่น ตัดช่องว่าง บังคับกรอกข้อมูล กรอกข้อมูลมากสุดได้เท่าไหร่
        $this->form_validation->set_rules('user_id','user ID', 'trim|required');
        $this->form_validation->set_rules('announceSection','Announce Section', 'trim|required');
        $this->form_validation->set_rules('announceDetails','Announce Details', 'trim|required');
        $this->form_validation->set_rules('announceDate','Announce Date', 'trim|required');
        //    $this->form_validation->set_rules('image','image', 'trim');
        // แบบที่1
        //หากมีข้อผิดพลาด
    //     if($this->form_validation->run() == FALSE){
    //         // echo 'baba';
    //         $this->load->view('announce_view');

    //    }else{
                
    //         // echo "<pre>";
    //         // print_r($_POST);
    //         // echo "</pre>";
    //         //  exit;

    //         //เรียกใช้ models
    //         $this->Announce_models->addimg();
    //         redirect('Showdata/announceShow','refresh');
            
    //    }

        // แบบที่2
        $type = $_SESSION['type'];
        if($type == 1){
             if($this->form_validation->run() == FALSE){
                //  echo 'bibi';
                $aduser_id = array();
                $adanDetails = array();
                $adanSection = array();
                $result  = $this->Autocomplete_models->autoUser1(); //collect all college name
                $result2  = $this->Autocomplete_models->autoAnnounce2();
                $result3  = $this->Autocomplete_models->autoAnnounce1();
                
                foreach($result as $key=>$value){
                array_push($aduser_id, $value["user_id"]);
                }
                foreach($result2 as $key=>$value){
                    array_push($adanDetails, $value["announceDetails"]);
                }
                foreach($result3 as $key=>$value){
                    array_push($adanSection, $value["announceSection"]);
                }

                $data['aduser_id'] = $aduser_id;
                $data['adanDetails'] = $adanDetails;
                $data['adanSection'] = $adanSection;

                 $this->load->view('css');
                 $this->load->view('admin/announce_view',$data);

              }
              else{
                //  echo "<pre>";
                //  print_r($_POST);
                //  echo "</pre>";
                //  exit;
                 $this->Announce_models->addimg();
                 redirect('Showdata/announceShow','refresh');
              }
        }elseif($type == 2){
             if($this->form_validation->run() == FALSE){
                //  echo 'baba';
                $anU_id = array();
                $ofanDetails = array();
                $ofanSection = array();
                $result  = $this->Autocomplete_models->autoUser1(); //collect all college name
                $result2  = $this->Autocomplete_models->autoAnnounce2();
                $result3  = $this->Autocomplete_models->autoAnnounce1();

                foreach($result as $key=>$value){
                array_push($anU_id, $value["user_id"]);
                }
                foreach($result2 as $key=>$value){
                    array_push($ofanDetails, $value["announceDetails"]);
                }
                foreach($result3 as $key=>$value){
                    array_push($ofanSection, $value["announceSection"]);
                }

                $data['anU_id'] = $anU_id;
                $data['ofanDetails'] = $ofanDetails;
                $data['ofanSection'] = $ofanSection;

                $this->load->view('css');
                $this->load->view('officer/officerAnnounce_view',$data);

             }
             else{
                $this->Announce_models->addimg();
                 redirect('Showdata/announceShow1','refresh');
             }
        }
    }

    public function editAnnouncedata()
	{
         // การตั้งกฎในการเช็คข้อมูล เช่น ตัดช่องว่าง บังคับกรอกข้อมูล กรอกข้อมูลมากสุดได้เท่าไหร่
         $this->form_validation->set_rules('announce_id','announce ID', 'trim');
         $this->form_validation->set_rules('user_id','user ID', 'trim|required');
         $this->form_validation->set_rules('announceSection','Announce Section', 'trim|required');
         $this->form_validation->set_rules('announceDetails','Announce Details', 'trim|required');
         $this->form_validation->set_rules('announceDate','Announce Date', 'trim|required');
         $this->form_validation->set_rules('active','active', 'trim|required');
        // $this->form_validation->set_rules('announceImage','image', 'trim');
        //  แบบที่1
        //  หากมีข้อผิดพลาด
        //  if($this->form_validation->run() == FALSE){
        //      // echo 'baba';
        //      $this->load->view('announceEdit_view');
 
        // }else{
                 
        //     //  echo "<pre>";
        //     //  print_r($_POST);
        //     //  echo "</pre>";
        //     //   exit;
 
             
        //     //เรียกใช้ models
        //     $this->Announce_models->editAnnounce();
        //     redirect('Showdata/announceShow','refresh');
             
        // }

         // แบบที่2
         $type = $_SESSION['type'];
         if($type == 1){
              if($this->form_validation->run() == FALSE){
                    //   echo 'bibi';
                    //   $this->load->view('announceEdit_view');
                    $adedituser_id = array();
                    $adeditAndetails = array();
                    $adeditSection = array();
                    $result  = $this->Autocomplete_models->autoUser1(); //collect all college name
                    $result2  = $this->Autocomplete_models->autoAnnounce2();
                    $result3  = $this->Autocomplete_models->autoAnnounce1();
                    
                    foreach($result as $key=>$value){
                    array_push($adedituser_id, $value["user_id"]);
                    }
                    foreach($result2 as $key=>$value){
                        array_push($adeditAndetails, $value["announceDetails"]);
                    }
                    foreach($result3 as $key=>$value){
                        array_push($adeditSection, $value["announceSection"]);
                    }

                    $data['adedituser_id'] = $adedituser_id;
                    $data['adeditAndetails'] = $adeditAndetails;
                    $data['adeditSection'] = $adeditSection;

                    $announce_id = $this->input->post('announce_id');
                    $data['query']=$this->Announce_models->read($announce_id);
                //   echo "<pre>";
                //   print_r($data);
                //   echo "</pre>";
                //   exit;
                  $this->load->view('css');
                  $this->load->view('admin/announceEdit_view',$data);
 
               }
               else{
                  // echo "<pre>";
                  // print_r($_POST);
                  // echo "</pre>";
                  //     exit;
                  $this->Announce_models->editAnnounce();
                  redirect('Showdata/announceShow','refresh');
               }
         }elseif($type == 2){
              if($this->form_validation->run() == FALSE){
                    //   echo 'baba';
                    //   $this->load->view('officer/announceEdit1_view');
                    $eAnUser_id = array();
                    $ofeditAndetails = array();
                    $ofeditSection = array();
                    $result  = $this->Autocomplete_models->autoUser1(); //collect all college name
                    $result2  = $this->Autocomplete_models->autoAnnounce2();
                    $result3  = $this->Autocomplete_models->autoAnnounce1();
                    
                    foreach($result as $key=>$value){
                    array_push($eAnUser_id, $value["user_id"]);
                    }
                    foreach($result2 as $key=>$value){
                        array_push($ofeditAndetails, $value["announceDetails"]);
                    }
                    foreach($result3 as $key=>$value){
                        array_push($ofeditSection, $value["announceSection"]);
                    }

                    $data['eAnUser_id'] = $eAnUser_id;
                    $data['ofeditAndetails'] = $ofeditAndetails;
                    $data['ofeditSection'] = $ofeditSection;

                  $announce_id = $this->input->post('announce_id');
                  $data['query']=$this->Announce_models->read($announce_id);
                //   echo "<pre>";
                //   print_r($data);
                //   echo "</pre>";
                //   exit;
                  $this->load->view('css');
                  $this->load->view('officer/announceEdit1_view',$data);
 
              }
              else{
                $this->Announce_models->editAnnounce();
                  redirect('Showdata/announceShow1','refresh');
              }
         }
	}

    public function an_searchdata()
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

        // แบบที่1
        $key = $this->input->post('search');
        $data['query'] = $this->Announce_models->an_search($key);
        // $this->load->view('admin/announceList_view' ,$data);

        // แบบที่2
        $type = $_SESSION['type'];

        if($type == 1){

            $this->load->view('css');
            $this->load->view('admin/announceList_view',$data);

        }elseif($type == 2){
            
            $this->load->view('css');
            $this->load->view('officer/announceList1_view',$data);
        }
	}
}
