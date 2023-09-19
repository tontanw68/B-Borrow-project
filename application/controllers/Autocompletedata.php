<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autocompletedata extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Autocomplete_models');
        $this->load->model('Book_models');
        $this->load->model('Option_models');
    }

    public function index(){

        // load view
        $this->load->view('css');
        $this->load->view('officer/autocomplete_view');
      }

      public function index2(){

        // load view
        $this->load->view('css');
        $this->load->view('officer/autocomplete2_view');
      }

      public function index3(){

        // load view
        $this->load->view('css');
        $this->load->view('officer/autocomplete3_view');
      }

    public function bookList(){
        // POST data
        $postData = $this->input->get('book');
        // $postData = $this->input->post('book');

        // $data = $this->Book_models->getlist($postData);
        // Get data
        $data['author'] = $this->Autocomplete_models->Author($postData);
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        exit;
        echo json_encode($data);
    }

    public function authorList(){
        $response = array();

        if (isset($_GET['author'])){
            $result = $this->Autocomplete_models->Author($_GET['author']);
            if(count ($result)> 0){
                foreach($qeury as $row )
                $response[] = array(
                    "lable" => $row->author,
                    "bookName" => $row->bookName,
                    "years" => $row->years,
                    "publisher" => $row->publisher,
                );
            }
            echo json_encode($response);
        }
    }

    public function userList(){
        // POST data
        $postData = $this->input->post();
    
        // Get data
        $data = $this->Autocomplete_models->getbook($postData);
    
        echo json_encode($data);
    }

    public function search(){
 
        $term = $this->input->get('term');
 
        $this->db->like('author', $term);
 
        $data = $this->db->get("book")->result();
 
        echo json_encode( $data);
    }

    public function booknow()
    {
        $all_data = array();
        $bookName = array();
        $years = array();
        $publisher = array();
        $keyword = array();
        $Section = array();
        $bookNumber = array();
        $bookbar = array();

        $result  = $this->Autocomplete_models->Autobook3(); //collect all college name
        $result2  = $this->Autocomplete_models->Autobook2();
        $result4  = $this->Autocomplete_models->Autobook4();
        $result5  = $this->Autocomplete_models->Autobook5();
        $result6  = $this->Autocomplete_models->Autobook6();
        $result7  = $this->Autocomplete_models->Autobook7();
        $result8  = $this->Autocomplete_models->Autobook8();
        $result9  = $this->Autocomplete_models->Autobook9();
        
        foreach($result as $key=>$value){
           array_push($all_data, $value["author"]);
        }
        foreach($result2 as $key=>$value){
            array_push($bookName, $value["bookName"]);
         }
         foreach($result4 as $key=>$value){
            array_push($years, $value["years"]);
         }
         foreach($result5 as $key=>$value){
            array_push($publisher, $value["publisher"]);
         }
         foreach($result6 as $key=>$value){
            array_push($keyword, $value["keyword"]);
         }
         foreach($result7 as $key=>$value){
            array_push($Section, $value["Section"]);
         }
         foreach($result8 as $key=>$value){
            array_push($bookNumber, $value["bookNumber"]);
         }
         foreach($result9 as $key=>$value){
            array_push($bookbar, $value["barcode"]);
         }

        $data['search'] = $all_data;
        $data['bookN'] = $bookName;
        $data['bookY'] = $years;
        $data['bookp'] = $publisher;
        $data['bookk'] = $keyword;
        $data['books'] = $Section;
        $data['booknum'] = $bookNumber;
        $data['bookbar'] = $bookbar;
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $data['query']=$this->Option_models->bookTypedata();
        $data['stdata']=$this->Option_models->bookStdata();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        // $this->load->view('officer/autocomplete2_view',$data);   
        $this->load->view('officer/officerBook_view',$data);        
    }

    public function booknowEdit()
    {
        $all_data = array();
        $bookName = array();
        $years = array();
        $publisher = array();
        $keyword = array();
        $Section = array();
        $bookNumber = array();
        $bookbar = array();
        $result  = $this->Autocomplete_models->Authorbook(); //collect all college name
        
        foreach($result as $key=>$value){
           array_push($all_data, $value["author"]);
           array_push($bookName, $value["bookName"]);
           array_push($years, $value["years"]);
           array_push($publisher, $value["publisher"]);
           array_push($keyword, $value["keyword"]);
           array_push($Section, $value["Section"]);
           array_push($bookNumber, $value["bookNumber"]);
           array_push($bookbar, $value["barcode"]);
        }

        $data['search'] = $all_data;
        $data['bookN'] = $bookName;
        $data['bookY'] = $years;
        $data['bookp'] = $publisher;
        $data['bookk'] = $keyword;
        $data['books'] = $Section;
        $data['booknum'] = $bookNumber;
        $data['bookbar'] = $bookbar;
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $data['query']=$this->Option_models->bookTypedata();
        $data['stdata']=$this->Option_models->bookStdata();
        $this->load->view('css');
        // $this->load->view('officer/autocomplete2_view',$data);   
        $this->load->view('officer/officerBEdit_view',$data);        
    }


}
?>