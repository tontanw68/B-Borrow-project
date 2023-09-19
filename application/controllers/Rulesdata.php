<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rulesdata extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rules_models');
        $this->load->model('Autocomplete_models');
    }

	
	public function index()
	{
        $adrulesSection = array();
        $adrulesDetails = array();
        $result1  = $this->Autocomplete_models->autoRules1(); //collect all college name
        $result2  = $this->Autocomplete_models->autoRules2();    
        foreach($result1 as $key=>$value){
           array_push($adrulesSection, $value["rulesSection"]);
        }
        foreach($result2 as $key=>$value){
            array_push($adrulesDetails, $value["rulesDetails"]);
         }
        $data['adrulesSection'] = $adrulesSection;
        $data['adrulesDetails'] = $adrulesDetails;

        $this->load->view('css');
		$this->load->view('admin/rules_view',$data);
		
	}

    public function addRulesdata()
	{
        $this->form_validation->set_rules('rulesSection','RulesSection', 'trim|required');
        $this->form_validation->set_rules('rulesDetails','RulesDetails', 'trim|required');
        $this->form_validation->set_rules('rulesActive','RulesActive', 'trim|required');
        //  แบบที่1
        //  หากมีข้อผิดพลาด
         if($this->form_validation->run() == FALSE){
             // echo 'baba';
            $adrulesSection = array();
            $adrulesDetails = array();
            $result1  = $this->Autocomplete_models->autoRules1(); //collect all college name
            $result2  = $this->Autocomplete_models->autoRules2();    
            foreach($result1 as $key=>$value){
            array_push($adrulesSection, $value["rulesSection"]);
            }
            foreach($result2 as $key=>$value){
                array_push($adrulesDetails, $value["rulesDetails"]);
            }
            $data['adrulesSection'] = $adrulesSection;
            $data['adrulesDetails'] = $adrulesDetails;
            
             $this->load->view('css');
		     $this->load->view('admin/rules_view',$data);
 
        }else{
                 
            //  echo "<pre>";
            //  print_r($_POST);
            //  echo "</pre>";
            //   exit;
            $this->Rules_models->addRules();
            redirect('Showdata/rulesShow','refresh');
        }
		
	}

    public function edit($rules_id)
    {
        $editrulesSection = array();
        $editrulesDetails = array();
        $result1  = $this->Autocomplete_models->autoRules1(); //collect all college name
        $result2  = $this->Autocomplete_models->autoRules2();    
        foreach($result1 as $key=>$value){
           array_push($editrulesSection, $value["rulesSection"]);
        }
        foreach($result2 as $key=>$value){
            array_push($editrulesDetails, $value["rulesDetails"]);
         }
        $data['editrulesSection'] = $editrulesSection;
        $data['editrulesDetails'] = $editrulesDetails;

        $data['query'] = $this->Rules_models->read($rules_id);

        $this->load->view('css');
        $this->load->view('admin/rulesEdit_view',$data);
    }

    public function editRulesdata()
    {
        $this->form_validation->set_rules('rulesSection','RulesSection', 'trim|required');
        $this->form_validation->set_rules('rulesDetails','RulesDetails', 'trim|required');
        $this->form_validation->set_rules('rulesActive','RulesActive', 'trim|required');
        //  แบบที่1
        //  หากมีข้อผิดพลาด
         if($this->form_validation->run() == FALSE){
             // echo 'baba';
            $editrulesSection = array();
            $editrulesDetails = array();
            $result1  = $this->Autocomplete_models->autoRules1(); //collect all college name
            $result2  = $this->Autocomplete_models->autoRules2();    
            foreach($result1 as $key=>$value){
            array_push($editrulesSection, $value["rulesSection"]);
            }
            foreach($result2 as $key=>$value){
                array_push($editrulesDetails, $value["rulesDetails"]);
            }
            $data['editrulesSection'] = $editrulesSection;
            $data['editrulesDetails'] = $editrulesDetails;
            
             $rules_id = $this->input->post('rules_id');
             $data['query'] = $this->Rules_models->read($rules_id);
             $this->load->view('css');
		     $this->load->view('admin/rulesEdit_view',$data);
 
        }else{
                 
            //  echo "<pre>";
            //  print_r($_POST);
            //  echo "</pre>";
            //   exit;
            $this->Rules_models->editRules();
            redirect('Showdata/rulesShow','refresh');
        }
    }

   
}
