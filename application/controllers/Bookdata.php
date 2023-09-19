<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Bookdata extends CI_Controller{

        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('Book_models');
            $this->load->model('Option_models');
            $this->load->model('Autocomplete_models');
        }
    
        
        public function index()
        {
            $this->load->view('css');
            // $this->load->view('user/searchb_view');
            $this->load->view('user/searchb_table_view');
            
            
        }
        public function index2()
        {
            $adbookName = array();
            $adauthor = array();
            $adyears = array();
            $adpublisher = array();
            $adkeyword = array();
            $adSection = array();
            $adbookNumber = array();
            $adbookbar = array();

            $result1  = $this->Autocomplete_models->Autobook2(); //collect all college name
            $result2  = $this->Autocomplete_models->Autobook3();
            $result3  = $this->Autocomplete_models->Autobook4();
            $result4  = $this->Autocomplete_models->Autobook5();
            $result5  = $this->Autocomplete_models->Autobook6();
            $result6  = $this->Autocomplete_models->Autobook7();
            $result7  = $this->Autocomplete_models->Autobook8();
            $result8  = $this->Autocomplete_models->Autobook9();
            
            foreach($result1 as $key=>$value){
                array_push($adbookName, $value["bookName"]);
            }
            foreach($result2 as $key=>$value){
                array_push($adauthor, $value["author"]);
            }
            foreach($result3 as $key=>$value){
                array_push($adyears, $value["years"]);
            }
            foreach($result4 as $key=>$value){
                array_push($adpublisher, $value["publisher"]);
            }
            foreach($result5 as $key=>$value){
                array_push($adkeyword, $value["keyword"]);
            }
            foreach($result6 as $key=>$value){
                array_push($adSection, $value["Section"]);
            }
            foreach($result7 as $key=>$value){
                array_push($adbookNumber, $value["bookNumber"]);
            }
            foreach($result8 as $key=>$value){
                array_push($adbookbar, $value["barcode"]);
            }

            $data['adbookName'] = $adbookName;
            $data['adauthor'] = $adauthor;
            $data['adyears'] = $adyears;
            $data['adpublisher'] = $adpublisher;
            $data['adkeyword'] = $adkeyword;
            $data['adSection'] = $adSection;
            $data['adbookNumber'] = $adbookNumber;
            $data['adbookbar'] = $adbookbar;
            // $data['query']=$this->Option_models->bookTypedata();
            $data['bstdata']=$this->Option_models->bookStdata();
            $data['btdata']=$this->Option_models->bookTypedata();

            $this->load->view('css');
            $this->load->view('admin/book_view',$data);
            
        }

        public function index5()
        {
            $data['qu'] = $this->Book_models->showBookdata2();
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            // exit;
            $this->load->view('css');
            // $this->load->view('user/searchb_view');
            //$this->load->view('user/searchb_table_view');
            $this->load->view('user/bookList_view', $data);
            
        }

        public function index3()
        {
            $data['query']=$this->Option_models->bookTypedata();
            $data['stdata']=$this->Option_models->bookStdata();
            $this->load->view('css');
            $this->load->view('officer/officerBook_view',$data);
            
        }

        public function index4()
        {
            
            $btypeName = array();
            
            $result  = $this->Autocomplete_models->AutobookType1(); //collect all college name
            
            foreach($result as $key=>$value){
                array_push($btypeName, $value["bookType_name"]);
            }

            $data['btypeName'] = $btypeName;
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            // exit;
            $this->load->view('css');
            $this->load->view('officer/bookType_view',$data); 
        }

        public function index6()
        {
            
            $btypeName = array();
            
            $result  = $this->Autocomplete_models->AutobookType1(); //collect all college name
            
            foreach($result as $key=>$value){
                array_push($btypeName, $value["bookType_name"]);
            }

            $data['btypeName'] = $btypeName;
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            // exit;
            $this->load->view('css');
            $this->load->view('admin/bookType2_view',$data); 
        }

        // เพิ่มข้อมูล
        public function addbookdata()
        {
            // การตั้งกฎในการเช็คข้อมูล เช่น ตัดช่องว่าง บังคับกรอกข้อมูล กรอกข้อมูลมากสุดได้เท่าไหร่
            $this->form_validation->set_rules('book_id','ID', 'trim');
            $this->form_validation->set_rules('bookName','Name', 'trim|required');
            $this->form_validation->set_rules('author','Author', 'trim|required');
            $this->form_validation->set_rules('years','Years', 'trim|required');
            $this->form_validation->set_rules('publisher','Publisher', 'trim|required');
            $this->form_validation->set_rules('keyword','Keyword', 'trim');
            $this->form_validation->set_rules('Section','Section', 'trim');
            $this->form_validation->set_rules('bookNumber','Number', 'trim|required');
            $this->form_validation->set_rules('bookStatus_id','Status', 'trim|required');
            $this->form_validation->set_rules('barcode','Barcode', 'trim|max_length[10]');
            $this->form_validation->set_rules('bookType_id','Type', 'trim|required');
            $this->form_validation->set_rules('image','image', 'trim');
            // แบบที่1
            //หากมีข้อผิดพลาด
            // if($this->form_validation->run() == FALSE){
            //     // echo 'baba';
            //     $this->load->view('admin/book_view');

            // }else{
                        
            //         // echo "<pre>";
            //         // print_r($_POST);
            //         // echo "</pre>";
            //         //  exit;

            //         //เรียกใช้ models
            //         $this->Book_models->addbook();
            //         redirect('Showdata/bookShow3','refresh');
                    
            // }
            
            // แบบที่2
            $type = $_SESSION['type'];
            if($type == 1){
                if($this->form_validation->run() == FALSE){
                    // echo 'bibi';
                    $adbookName = array();
                    $adauthor = array();
                    $adyears = array();
                    $adpublisher = array();
                    $adkeyword = array();
                    $adSection = array();
                    $adbookNumber = array();
                    $adbookbar = array();

                    $result1  = $this->Autocomplete_models->Autobook2(); //collect all college name
                    $result2  = $this->Autocomplete_models->Autobook3();
                    $result3  = $this->Autocomplete_models->Autobook4();
                    $result4  = $this->Autocomplete_models->Autobook5();
                    $result5  = $this->Autocomplete_models->Autobook6();
                    $result6  = $this->Autocomplete_models->Autobook7();
                    $result7  = $this->Autocomplete_models->Autobook8();
                    $result8  = $this->Autocomplete_models->Autobook9();
                    
                    foreach($result1 as $key=>$value){
                        array_push($adbookName, $value["bookName"]);
                    }
                    foreach($result2 as $key=>$value){
                        array_push($adauthor, $value["author"]);
                    }
                    foreach($result3 as $key=>$value){
                        array_push($adyears, $value["years"]);
                    }
                    foreach($result4 as $key=>$value){
                        array_push($adpublisher, $value["publisher"]);
                    }
                    foreach($result5 as $key=>$value){
                        array_push($adkeyword, $value["keyword"]);
                    }
                    foreach($result6 as $key=>$value){
                        array_push($adSection, $value["Section"]);
                    }
                    foreach($result7 as $key=>$value){
                        array_push($adbookNumber, $value["bookNumber"]);
                    }
                    foreach($result8 as $key=>$value){
                        array_push($adbookbar, $value["barcode"]);
                    }

                    $data['adbookName'] = $adbookName;
                    $data['adauthor'] = $adauthor;
                    $data['adyears'] = $adyears;
                    $data['adpublisher'] = $adpublisher;
                    $data['adkeyword'] = $adkeyword;
                    $data['adSection'] = $adSection;
                    $data['adbookNumber'] = $adbookNumber;
                    $data['adbookbar'] = $adbookbar;
                    // $data['query']=$this->Option_models->bookTypedata();
                    $data['bstdata']=$this->Option_models->bookStdata();
                    $data['btdata']=$this->Option_models->bookTypedata();

                    $this->load->view('css');
                    $this->load->view('admin/book_view',$data);

                }
                else{
                    $this->Book_models->addbook();
                    redirect('Showdata/bookShow3','refresh');
                }
            }elseif($type == 2){
                if($this->form_validation->run() == FALSE){
                    // echo 'baba';

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

                    $this->load->view('css');
                    $this->load->view('officer/officerBook_view',$data);

                }
                else{
                    $this->Book_models->addbook();
                    redirect('Showdata/bookShow4','refresh');
                }
            }
           
        }

        public function addBookFile()
        {
            $files = $_FILES["file"]['name'];
            $exp_files = explode('.', $files);
            $files_type = $_FILES["file"]['type'];
            echo $filename = $_FILES["file"]["tmp_name"], '<br>';
            echo $files, '<br>';
            echo $files_type, '<br>';
            echo $exp_files[0], '<br>';
            echo $exp_files[1], '<br>';
            if (strcmp($exp_files[1], "csv") !== 0) {
                echo "<script type=\"text/javascript\">
                                alert(\"Please Upload csv File.\");
                                window.location = \"index3\"
                            </script>";
            } else {
                $data['query'] = $this->Book_models->addbookfile($filename);
                echo "<script type=\"text/javascript\">
                                        alert(\"Add data Successfull!!!.\");

                                    </script>";
                                    // window.location = "userShow1"
                redirect('Showdata/bookShow3','refresh');
            }
        }

        public function addBookFile2()
        {
            $files = $_FILES["file"]['name'];
            $exp_files = explode('.', $files);
            $files_type = $_FILES["file"]['type'];
            $filename = $_FILES["file"]["tmp_name"];
            // echo $files, '<br>';
            // echo $files_type, '<br>';
            $exp_files[0];
            $exp_files[1];
            // exit;
            if (strcmp($exp_files[1], "csv") !== 0) {
                // echo "<script type=\"text/javascript\">
                //             alert(\"Please Upload csv File.\");
                //             window.location = \"index3\"
                //         </script>";
                echo "<script>";
                echo "alert('อัพโหลดไฟล์สกุล csv เท่านั้น');";
                echo "</script>";
                redirect('Insertdata/index4','refresh');
            } else {
                $data['query'] = $this->Book_models->addbookfile($filename);
                // echo "<script type=\"text/javascript\">
                //               alert(\"Add data Successfull!!!.\");
                //     </script>";
                // window.location = "userShow1"
                redirect('Showdata/bookShow3','refresh');
            }
        }

        // เพิ่มข้อมูล
        public function addbooktypedata()
        {
            // การตั้งกฎในการเช็คข้อมูล เช่น ตัดช่องว่าง บังคับกรอกข้อมูล กรอกข้อมูลมากสุดได้เท่าไหร่
            // $this->form_validation->set_rules('bookType_id','bookType_id', 'trim|required');
            $this->form_validation->set_rules('bookType_name','bookType_name', 'trim|required');
            // แบบที่1
            //หากมีข้อผิดพลาด
            // if($this->form_validation->run() == FALSE){
            //     // echo 'baba';
            //     $this->load->view('admin/book_view');

            // }else{
                        
            //         // echo "<pre>";
            //         // print_r($_POST);
            //         // echo "</pre>";
            //         //  exit;

            //         //เรียกใช้ models
            //         $this->Book_models->addbook();
            //         redirect('Showdata/bookShow3','refresh');
                    
            // }
            
            // แบบที่2
            $type = $_SESSION['type'];
            if($type == 1){
                if($this->form_validation->run() == FALSE){
                    // echo 'bibi';
                    $btypeName = array();
            
                    $result  = $this->Autocomplete_models->AutobookType1(); //collect all college name
                    
                    foreach($result as $key=>$value){
                        array_push($btypeName, $value["bookType_name"]);
                    }

                    $data['btypeName'] = $btypeName;

                    $this->load->view('css');
                    $this->load->view('admin/bookType2_view',$data);

                }
                else{
                    $this->Book_models->addbookType();
                    redirect('Showdata/booktypeShow2','refresh');
                }
            }elseif($type == 2){
                if($this->form_validation->run() == FALSE){
                    // echo 'baba';

                    $btypeName = array();
            
                    $result  = $this->Autocomplete_models->AutobookType1(); //collect all college name
                    
                    foreach($result as $key=>$value){
                        array_push($btypeName, $value["bookType_name"]);
                    }

                    $data['btypeName'] = $btypeName;
                    // echo "<pre>";
                    // print_r($data);
                    // echo "</pre>";
                    // exit;
                    $this->load->view('css');
                    $this->load->view('officer/bookType_view',$data); 

                    }
                    else{
                        $this->Book_models->addbookType();
                        redirect('Showdata/booktypeShow','refresh');
                    }
                }
           
        }

        public function edit($book_id)
        {
            // เป็นการเรียกใช้ model
            // ในการรับข้อมูลจะต้องมีการส่ง user_id เพราะมีการส่งจาก Url
            $data['query']=$this->Book_models->read($book_id);

            // แสดงข้อมูล data เพื่อดูว่าสามารถ query ข้อมูลออกมาได้หรือเปล่า
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            // exit;

            // แบบที่1
            // $this->load->view('css');
            // $this->load->view('admin/bookEdit_view',$data);

            // แบบที่2
            $type = $_SESSION['type'];

                if($type == 1){
                    $adeditauthor = array();
                    $adeditbookName = array();
                    $adedityears = array();
                    $adeditpublisher = array();
                    $adeditkeyword = array();
                    $adeditSection = array();
                    $adeditbookNumber = array();
                    $adeditbookbar = array();

                    $result   = $this->Autocomplete_models->Autobook2(); //collect all college name
                    $result3  = $this->Autocomplete_models->Autobook3();
                    $result4  = $this->Autocomplete_models->Autobook4();
                    $result5  = $this->Autocomplete_models->Autobook5();
                    $result6  = $this->Autocomplete_models->Autobook6();
                    $result7  = $this->Autocomplete_models->Autobook7();
                    $result8  = $this->Autocomplete_models->Autobook8();
                    $result9  = $this->Autocomplete_models->Autobook9();
                    
                    foreach($result as $key=>$value){
                        array_push($adeditbookName, $value["bookName"]);
                    }
                    foreach($result3 as $key=>$value){
                        array_push($adeditauthor, $value["author"]);
                    }
                    foreach($result4 as $key=>$value){
                        array_push($adedityears, $value["years"]);
                    }
                    foreach($result5 as $key=>$value){
                        array_push($adeditpublisher, $value["publisher"]);
                    }
                    foreach($result6 as $key=>$value){
                        array_push($adeditkeyword, $value["keyword"]);
                    }
                    foreach($result7 as $key=>$value){
                        array_push($adeditSection, $value["Section"]);
                    }
                    foreach($result8 as $key=>$value){
                        array_push($adeditbookNumber, $value["bookNumber"]);
                    }
                    foreach($result9 as $key=>$value){
                        array_push($adeditbookbar, $value["barcode"]);
                    }

                    $data['adeditauthor'] = $adeditauthor;
                    $data['adeditbookName'] = $adeditbookName;
                    $data['adedityears'] = $adedityears;
                    $data['adeditpublisher'] = $adeditpublisher;
                    $data['adeditkeyword'] = $adeditkeyword;
                    $data['adeditSection'] = $adeditSection;
                    $data['adeditbookNumber'] = $adeditbookNumber;
                    $data['adeditbookbar'] = $adeditbookbar;

                    $data['bookt']=$this->Option_models->bookTypedata();
                    // $data['query']=$this->Option_models->bookTypedata();
                    $data['stdata']=$this->Option_models->bookStdata();
                    $this->load->view('css');
                    $this->load->view('admin/bookEdit_view',$data);

                }elseif($type == 2){
            
                    // $data['stdata']=$this->Option_models->bookStdata();
                    // $data['bookt']=$this->Option_models->bookTypedata();
                    // $this->load->view('css');
                    // $this->load->view('officer/officerBEdit_view',$data);

                    $all_data = array();
                    $bookName = array();
                    $years = array();
                    $publisher = array();
                    $keyword = array();
                    $Section = array();
                    $bookNumber = array();
                    $bookbar = array();
                    $result   = $this->Autocomplete_models->Autobook2(); //collect all college name
                    $result3  = $this->Autocomplete_models->Autobook3();
                    $result4  = $this->Autocomplete_models->Autobook4();
                    $result5  = $this->Autocomplete_models->Autobook5();
                    $result6  = $this->Autocomplete_models->Autobook6();
                    $result7  = $this->Autocomplete_models->Autobook7();
                    $result8  = $this->Autocomplete_models->Autobook8();
                    $result9  = $this->Autocomplete_models->Autobook9();
                    
                    foreach($result as $key=>$value){
                        array_push($bookName, $value["bookName"]);
                    }
                    foreach($result3 as $key=>$value){
                        array_push($all_data, $value["author"]);
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

                    $data['eauthor'] = $all_data;
                    $data['ebookN'] = $bookName;
                    $data['ebookY'] = $years;
                    $data['ebookP'] = $publisher;
                    $data['ebookK'] = $keyword;
                    $data['sbookS'] = $Section;
                    $data['ebookNum'] = $bookNumber;
                    $data['ebookBar'] = $bookbar;
                    // echo "<pre>";
                    // print_r($data);
                    // echo "</pre>";
                    // exit;
                    $data['bookt']=$this->Option_models->bookTypedata();
                    // $data['query']=$this->Option_models->bookTypedata();
                    $data['stdata']=$this->Option_models->bookStdata();
                    // echo "<pre>";
                    // print_r($data);
                    // echo "</pre>";
                    // exit;
                    $this->load->view('css');
                    // $this->load->view('officer/autocomplete2_view',$data);   
                    $this->load->view('officer/officerBEdit_view',$data);  
                }
        }

        public function editbooktype($bookType_id)
        {
            // เป็นการเรียกใช้ model
            // ในการรับข้อมูลจะต้องมีการส่ง user_id เพราะมีการส่งจาก Url
            $data['query']=$this->Book_models->readbooktype($bookType_id);

            // แสดงข้อมูล data เพื่อดูว่าสามารถ query ข้อมูลออกมาได้หรือเปล่า
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            //  exit;

            // แบบที่1
            // $this->load->view('css');
            // $this->load->view('admin/bookEdit_view',$data);

            // แบบที่2
            $type = $_SESSION['type'];

                if($type == 1){

                    // $this->load->view('css');
                    // $this->load->view('officer/booktypeEdit_view',$data);

                    $adbookType = array();
                    
                    $result  = $this->Autocomplete_models->AutobookType1(); //collect all college name
                    
                    foreach($result as $key=>$value){
                        array_push($adbookType, $value["bookType_name"]);
                    }

                    $data['adbookType'] = $adbookType;
                    // echo "<pre>";
                    // print_r($data);
                    // echo "</pre>";
                    // exit;
                    $this->load->view('css');
                    // $this->load->view('officer/autocomplete2_view',$data);   
                    $this->load->view('admin/booktypeEdit2_view',$data); 

                }elseif($type == 2){
                    
                    // $this->load->view('css');
                    // $this->load->view('officer/booktypeEdit_view',$data);

                    $ofbookType = array();
                    
                    $result  = $this->Autocomplete_models->AutobookType1(); //collect all college name
                    
                    foreach($result as $key=>$value){
                        array_push($ofbookType, $value["bookType_name"]);
                    }

                    $data['ofbookType'] = $ofbookType;
                    // echo "<pre>";
                    // print_r($data);
                    // echo "</pre>";
                    // exit;
                    $this->load->view('css');
                    // $this->load->view('officer/autocomplete2_view',$data);   
                    $this->load->view('officer/booktypeEdit_view',$data); 
                }
            
        }

        public function editBookdata()
        {
            // การตั้งกฎในการเช็คข้อมูล เช่น ตัดช่องว่าง บังคับกรอกข้อมูล กรอกข้อมูลมากสุดได้เท่าไหร่
            $this->form_validation->set_rules('book_id','ID', 'trim');
            $this->form_validation->set_rules('bookName','Name', 'trim|required');
            $this->form_validation->set_rules('author','Author', 'trim|required');
            $this->form_validation->set_rules('years','Years', 'trim|required');
            $this->form_validation->set_rules('publisher','Publisher', 'trim|required');
            $this->form_validation->set_rules('keyword','Keyword', 'trim');
            $this->form_validation->set_rules('Section','Section', 'trim');
            $this->form_validation->set_rules('bookNumber','Number', 'trim|required');
            $this->form_validation->set_rules('bookStatus_id','Status', 'trim|required');
            $this->form_validation->set_rules('barcode','Barcode', 'trim|max_length[10]');
            $this->form_validation->set_rules('bookType_id','Type', 'trim|required');
            // $this->form_validation->set_rules('image','image', 'trim');
            // แบบที่1
           //หากมีข้อผิดพลาด
        //     if($this->form_validation->run() == FALSE){
        //         // echo 'baba';
        //         $this->load->view('admin/bookEdit_view');

        //    }else{
                    
        //         // echo "<pre>";
        //         // print_r($_POST);
        //         // echo "</pre>";
        //         //  exit;

        //         // //เรียกใช้ models
        //         // $this->Book_models->editBook();
        //         // redirect('Showdata/bookShow3','refresh');
                
        //    }

        // แบบที่2
           $type = $_SESSION['type'];
           if($type == 1){
                if($this->form_validation->run() == FALSE){
                    echo 'bibi';
                    // $this->load->view('admin/bookEdit_view');

                    // $book_id = $this->input->post('book_id');
                    // $data['query']=$this->Book_models->read($book_id);
                    // // echo "<pre>";
                    // // print_r($data);
                    // // echo "</pre>";
                    // // exit;

                    // $this->load->view('admin/bookEdit_view',$data);
                    $adeditauthor = array();
                    $adeditbookName = array();
                    $adedityears = array();
                    $adeditpublisher = array();
                    $adeditkeyword = array();
                    $adeditSection = array();
                    $adeditbookNumber = array();
                    $adeditbookbar = array();

                    $result   = $this->Autocomplete_models->Autobook2(); //collect all college name
                    $result3  = $this->Autocomplete_models->Autobook3();
                    $result4  = $this->Autocomplete_models->Autobook4();
                    $result5  = $this->Autocomplete_models->Autobook5();
                    $result6  = $this->Autocomplete_models->Autobook6();
                    $result7  = $this->Autocomplete_models->Autobook7();
                    $result8  = $this->Autocomplete_models->Autobook8();
                    $result9  = $this->Autocomplete_models->Autobook9();
                    
                    foreach($result as $key=>$value){
                        array_push($adeditbookName, $value["bookName"]);
                    }
                    foreach($result3 as $key=>$value){
                        array_push($adeditauthor, $value["author"]);
                    }
                    foreach($result4 as $key=>$value){
                        array_push($adedityears, $value["years"]);
                    }
                    foreach($result5 as $key=>$value){
                        array_push($adeditpublisher, $value["publisher"]);
                    }
                    foreach($result6 as $key=>$value){
                        array_push($adeditkeyword, $value["keyword"]);
                    }
                    foreach($result7 as $key=>$value){
                        array_push($adeditSection, $value["Section"]);
                    }
                    foreach($result8 as $key=>$value){
                        array_push($adeditbookNumber, $value["bookNumber"]);
                    }
                    foreach($result9 as $key=>$value){
                        array_push($adeditbookbar, $value["barcode"]);
                    }

                    $data['adeditauthor'] = $adeditauthor;
                    $data['adeditbookName'] = $adeditbookName;
                    $data['adedityears'] = $adedityears;
                    $data['adeditpublisher'] = $adeditpublisher;
                    $data['adeditkeyword'] = $adeditkeyword;
                    $data['adeditSection'] = $adeditSection;
                    $data['adeditbookNumber'] = $adeditbookNumber;
                    $data['adeditbookbar'] = $adeditbookbar;

                    $book_id = $this->input->post('book_id');
                    $data['query']=$this->Book_models->read($book_id);
                    $data['bookt']=$this->Option_models->bookTypedata();
                    // $data['query']=$this->Option_models->bookTypedata();
                    $data['stdata']=$this->Option_models->bookStdata();

                    $this->load->view('css');
                    $this->load->view('admin/bookEdit_view',$data);
                    

                 }
                 else{
                    // echo "<pre>";
                    // print_r($_POST);
                    // echo "</pre>";
                    // exit;

                    $this->Book_models->editBook();
                    redirect('Showdata/bookShow3','refresh');
                 }
           }elseif($type == 2){
                if($this->form_validation->run() == FALSE){
                    // echo 'baba';
                    // $this->load->view('officer/officerBEdit_view');

                    $book_id = $this->input->post('book_id');
                    $data['query']=$this->Book_models->read($book_id);
                    $data['bookt']=$this->Option_models->bookTypedata();
                    // $data['query']=$this->Option_models->bookTypedata();
                    $data['stdata']=$this->Option_models->bookStdata();
                    // echo "<pre>";
                    // print_r($data);
                    // echo "</pre>";
                    // exit;

                    $this->load->view('css');
                    $this->load->view('officer/officerBEdit_view',$data);

                }
                else{
                    // echo "<pre>";
                    // print_r($_POST);
                    // echo "</pre>";
                    // exit;
                    $this->Book_models->editBook();
                    redirect('Showdata/bookShow4','refresh');
                }
           }
        }

        public function editBooktypedata()
        {
            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";
            // exit;
            // การตั้งกฎในการเช็คข้อมูล เช่น ตัดช่องว่าง บังคับกรอกข้อมูล กรอกข้อมูลมากสุดได้เท่าไหร่
            $this->form_validation->set_rules('bookType_id','BookType_id', 'trim|required');
            $this->form_validation->set_rules('bookType_name','bookType_name', 'trim|required');

           $type = $_SESSION['type'];
           if($type == 1){
                if ($this->form_validation->run() == FALSE){
                    // echo "bibi";

                    $bookType_id = $this->input->post('bookType_id');
                    $data['query']=$this->Book_models->readbooktype($bookType_id);
                    $adbookType = array();
                    
                    $result  = $this->Autocomplete_models->AutobookType1(); //collect all college name
                    
                    foreach($result as $key=>$value){
                        array_push($adbookType, $value["bookType_name"]);
                    }

                    $data['adbookType'] = $adbookType;
                    // echo "<pre>";
                    // print_r($data);
                    // echo "</pre>";
                    // exit;
                    $this->load->view('css');
                    // $this->load->view('officer/autocomplete2_view',$data);   
                    $this->load->view('admin/booktypeEdit2_view',$data); 
                }else{
                    $this->Book_models->editbooktype();
                    redirect('Showdata/booktypeShow2','refresh');
                }
           }elseif($type == 2){
                if($this->form_validation->run() == FALSE){
                    echo "baba";
                    $bookType_id = $this->input->post('bookType_id');
                    $data['query']=$this->Book_models->readbooktype($bookType_id);
                    $ofbookType = array();
                                        
                    $result  = $this->Autocomplete_models->AutobookType1(); //collect all college name
                    
                    foreach($result as $key=>$value){
                        array_push($ofbookType, $value["bookType_name"]);
                    }

                    $data['ofbookType'] = $ofbookType;
                    // echo "<pre>";
                    // print_r($data);
                    // echo "</pre>";
                    // exit;
                    $this->load->view('css');
                    // $this->load->view('officer/autocomplete2_view',$data);   
                    $this->load->view('officer/booktypeEdit_view',$data); 
                    
                }else{
                    $this->Book_models->editbooktype();
                    redirect('Showdata/booktypeShow','refresh');
                }
           }
        }

        // ค้นหา
        public function book_search()
        {
           
            
            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";
            // exit;
            $keyword = $this->input->post('keyword');    
            $data['query'] = $this->Book_models->getlist($keyword);
            $data['count'] = $this->Book_models->countlist($keyword);
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            // exit;
            // $this->load->view('user/bookList_view' ,$data);
            $this->load->view('user/searchb_table_view' ,$data);

            // แสดงข้อมูลทั้งหมดในตาราง
            // redirect('Showdata/bookShow','refresh');
            
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
            // แบบที่1
            $key = $this->input->post('search');
            $data['query'] = $this->Book_models->getlist($key);
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            // exit;
            // $this->load->view('admin/bookList2_view' ,$data);

            // แบบที่2
            $type = $_SESSION['type'];

                if($type == 1){

                    $this->load->view('css');
                    $this->load->view('admin/bookList3_view',$data);

                }elseif($type == 2){
                    
                    $this->load->view('css');
                    $this->load->view('officer/bookList4_view',$data);
                }
        }

       
       

    }

?>