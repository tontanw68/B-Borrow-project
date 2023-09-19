<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    
    }
	public function index()
	{
        // $this->load->view('css');
		$this->load->view('sweet_view');
		
	}

    public function upload_img()
	{
		if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
            $upload_path="./img/";
            $newFileName = explode(".",$_FILES['image']['name']);
            $filename = time()."-".rand(00,99).".".end($newFileName);
            $filename_new = time()."-".rand(00,99)."_new.".end($filename);
            $config['file_name'] = $filename;
            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = 'gif|jpg|png|jpeg'; 
            $this->load->library('upload', $config);
        
            if ($this->upload->do_upload('image')) 
            { 
            //Image Resizing 
            $config1['source_image'] = $this->upload->upload_path.$this->upload->file_name;
            $config1['new_image'] =  './img/';
            // ปรับภาพให้มันได้สัดส่วน
            $config1['maintain_ratio'] = FALSE;
            $config1['width'] = 181;
            $config1['height'] = 181; 
            $this->load->library('image_lib', $config1); 
            if ( ! $this->image_lib->resize()){ 
            $this->session->set_flashdata('message', $this->image_lib->display_errors('', ''));
        
            }
            // $post_data['image'] = $filename;
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('',$data);
            }
            else
            { 
            // $this->session->set_flashdata('msg',$this->upload->display_errors());
            $error = array('error' => $this->upload->display_error());
            $this->load->view('',array('error' => ''));
            }
        }
		
	}



}
