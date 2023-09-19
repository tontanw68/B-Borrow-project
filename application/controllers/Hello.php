<!-- เทส image -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hello extends CI_Controller {

	
	public function index()
	{
        $this->load->view('css');
		$this->load->view('hello_view',array('error' => ' '));
		
	}
	public function img_up()
	{
        if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
            $upload_path="img/";
			$config['encrypt_name'] = TRUE;
            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = 'gif|jpg|png|jpeg'; 
            $this->load->library('upload', $config);
        
            if ($this->upload->do_upload('image')) 
            { 
            //Image Resizing 
            $config1['source_image'] = $this->upload->upload_path.$this->upload->file_name;
            $config1['new_image'] =  'img/';
            // ปรับภาพให้มันได้สัดส่วน
            $config1['maintain_ratio'] = TRUE;
            $config1['width'] = 300;
            $config1['height'] = 300; 
            $this->load->library('image_lib', $config1); 
            if ( ! $this->image_lib->resize()){ 
            $this->session->set_flashdata('message', $this->image_lib->display_errors('', ''));
        
            }
            // $post_data['image'] = $filename;
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('success_view',$data);
            }
            else
            { 
            // $this->session->set_flashdata('msg',$this->upload->display_errors());
            $error = array('error' => $this->upload->display_error());
            $this->load->view('hello_view',array('error' => ' '));
            }
        }
	}
}
