<?php 
    class Book_models extends CI_Model{

        public function addbook()
        {
            $type = $_SESSION['type'];
            $bookName = $this->input->post('bookName');
            $data['bookname'] = $this->Book_models->forbookName();
            $book = 0;
            foreach ($data['bookname'] as $rw){
                $book = $rw->book_id;  
            }
            $bnum = $book + 1;
            $bnameStr = (string)$bnum;
            $num = $this->Book_models->checkBookname($bookName);
            if($num > 0){
                if($type == 1){
                    echo "<script>";
                    echo "alert('ชื่อหนังสือซ้ำ กรุณากรอกข้อมูลใหม่');";
                    // echo "window.location='add_member.php';";
                    echo "</script>";
                    redirect('Bookdata/index2','refresh');
                }else{
                    echo "<script>";
                    echo "alert('ชื่อหนังสือซ้ำ กรุณากรอกข้อมูลใหม่');";
                    // echo "window.location='add_member.php';";
                    echo "</script>";
                    redirect('Autocompletedata/booknow','refresh');
                }
                
            }else{

            
                // กำหนดโฟรเดอร์ที่จะเก็บรูปภาพ
                $config['upload_path'] = './img/book';
                // อนูญาตให้อัพโหลดไฟล์อะไรได้บ้าง
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2000';
                $config['max_width'] = '3000';
                $config['max_height'] = '3000'; 
                // ให้มีการเข้ารหัสชื่อไฟล์เพื่อป้องกันการตั้งชื่อเป็นภาษาไทยหรือเว้นวรรค
                $config['file_name'] = $bnameStr;
                
                $this->load->library('upload',$config);
                //  ถ้าไม่มีรูปภาพอัพโหลดเข้ามา
                if( ! $this->upload->do_upload('image')){
                    //  ให้แสดง error ออกมา
                    //  echo $this->upload->display_errors();

                    $data = array(
                        'bookName' => $this->input->post('bookName'),
                        'author' => $this->input->post('author'),
                        'years' => $this->input->post('years'),
                        'publisher' => $this->input->post('publisher'),
                        'keyword' => $this->input->post('keyword'),
                        'Section' => $this->input->post('Section'),
                        'bookNumber' => $this->input->post('bookNumber'),
                        'bookStatus_id' => $this->input->post('bookStatus_id'),
                        'barcode' => $this->input->post('barcode'),
                        'bookType_id' => $this->input->post('bookType_id'),
        
                    );
                }
                else{
                    // สร้างตัวแปลรับค่าที่อัพโหลดเข้ามา
                    $data = $this->upload->data();
                    $filename = $data['file_name'];
                    $data = array(
                        'bookName' => $this->input->post('bookName'),
                        'author' => $this->input->post('author'),
                        'years' => $this->input->post('years'),
                        'publisher' => $this->input->post('publisher'),
                        'keyword' => $this->input->post('keyword'),
                        'Section' => $this->input->post('Section'),
                        'bookNumber' => $this->input->post('bookNumber'),
                        'bookStatus_id' => $this->input->post('bookStatus_id'),
                        'barcode' => $this->input->post('barcode'),
                        'bookType_id' => $this->input->post('bookType_id'),
                        'image' => $filename

                    );
                }
            }
             // print_r($_POST);
             //เก็บข้อมูลลงในที่รับมาจาก form ลงใน array
            //  $filename = $data['file_name'];
            //  $data = array(
            //     'bookName' => $this->input->post('bookName'),
            //     'author' => $this->input->post('author'),
            //     'years' => $this->input->post('years'),
            //     'publisher' => $this->input->post('publisher'),
            //     'keyword' => $this->input->post('keyword'),
            //     'Section' => $this->input->post('Section'),
            //     'bookNumber' => $this->input->post('bookNumber'),
            //     'bookStatus_id' => $this->input->post('bookStatus_id'),
            //     'barcode' => $this->input->post('barcode'),
            //     'bookType_id' => $this->input->post('bookType_id'),
            //     'image' => $filename
 
            //  );
     
             //สร้างตัวแปลในการรับข้อมูลเข้าไปในดาต้าเบส เอาข้อมูลมาใส่ในตาราง
             $query=$this->db->insert('book',$data);
     
             if($query){
                echo "<script>";
                echo "alert(' เพิ่มข้อมูลเรียบร้อย');";
                echo "</script>";
             }else{
                echo "<script>";
                echo "alert(' เพิ่มข้อมูลไม่ถูกต้อง');";
                echo "</script>";
             }
        }

        public function addbookfile($filename)
        {
                if($_FILES["file"]["size"] > 0)
            {
                    $file = fopen($filename, "r");
                    // $file = fopen($files, "r");
                    //while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
                    while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
                    {
                        // echo sizeof($emapData),"---";
                        // echo $emapData[0],"---";
                        // echo $emapData[1],"---";
                        // echo $emapData[2]; 	

                        // for($i=0;$i<sizeof($emapData);$i++){
                        // 	echo $emapData[$i],"---";
                        // }	
                        // echo '<br>';
                        // $sql = "INSERT into student (`std_code`,`std_fname`,`std_lname`) 
                        // values('$emapData[0]','$emapData[1]','$emapData[2]')";
                        // values('1','jennie','soo')";
                        // $result = mysqli_query( $conn, $sql );
                        // if(! $result )
                        // {
                        // 	echo "Error insert database";
                        
                        // }
                        $data = array(
                            'bookName' => $emapData[0],
                            'author' => $emapData[1],
                            'years' => $emapData[2],
                            'publisher' => $emapData[3],
                            'keyword' => $emapData[4],
                            'Section' => $emapData[5],
                            'bookNumber' => $emapData[6],
                            'barcode' => $emapData[7],
                            'bookType_id' => $emapData[8],
                            'bookStatus_id' => 1,
                        );
                        // foreach ($data as $key => $value) {
                        //     echo "$key: $value","<br>";
                        // }
                        // // exit;
                        $query=$this->db->insert('book',$data);
                        if(! $query )
                        {
                            // echo "<script type=\"text/javascript\">
                            //         alert(\"Invalid File:Please Upload CSV File.\");
                            //         window.location = \"Showdata/bookShow3\"
                            //     </script>";
                            echo "<script>";
                            echo "alert(' เพิ่มข้อมูลหนังสือเรียบร้อย');";
                            echo "</script>";
                            redirect('Showdata/bookShow3','refresh');
                        }
                    }

                    fclose($file);
            }
            else
            {
                echo "No file Select";
            }
        }

        public function addbookType()
        {
            // print_r($_POST);
            $type = $_SESSION['type'];
            $bookType_name = $this->input->post('bookType_name');
            $checkbookType = $this->Book_models->checkbookType($bookType_name);
            if($checkbookType > 0){
                if($type == 1){
                    echo "<script>";
                    echo "alert('ประเภทหนังสือซ้ำ กรุณาทำรายการใหม่');";
                    echo "</script>";
                    redirect('Bookdata/index6','refresh');
                }else{
                    echo "<script>";
                    echo "alert('ประเภทหนังสือซ้ำ กรุณาทำรายการใหม่');";
                    echo "</script>";
                    redirect('Bookdata/index4','refresh');
                }
                
            }else{
                //เก็บข้อมูลลงในที่รับมาจาก form ลงใน array
                $data = array(
                    // 'bookType_id' => $this->input->post('bookType_id'),
                    'bookType_name' => $this->input->post('bookType_name'),
                    'booktypeStatus_id' => $this->input->post('booktypeStatus_id'),
                );
                //สร้างตัวแปลในการรับข้อมูลเข้าไปในดาต้าเบส เอาข้อมูลมาใส่ในตาราง
                $query=$this->db->insert('book_type',$data);
        
                if($query){
                    echo "<script>";
                    echo "alert('เพิ่มข้อมูลเรียบร้อย');";
                    echo "</script>";
                }else{
                    echo "<script>";
                    echo "alert(' เพิ่มข้อมูลไม่ถูกต้อง');";
                    echo "</script>";
                }
            }
        }

        public function editBook()
        {
            $book_id = $this->input->post('book_id');
            // $data['delete'] = $this->Book_models->deletebookImg($book_id);
            $data['bookname'] = $this->Book_models->forbookeditName($book_id);
            $book = 0;
            // $delete = '';
            foreach ($data['bookname'] as $rw){
                $book = $rw->book_id;
                
            }
            // foreach ($data['delete'] as $img){
            //     $deleteimg = $img->image;
                
            // }
            $bookedit = (string)$book;
            $bookimg = $bookedit."_";
            // echo $bookedit.'<br>';
            // echo $deleteimg;
            // exit;
            // $this->db->delete('book',array('image'=>$deleteimg));
            $config['upload_path'] = './img/book/';
            // อนูญาตให้อัพโหลดไฟล์อะไรได้บ้าง
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2000';
            $config['max_width'] = '3000';
            $config['max_height'] = '3000'; 
            // ให้มีการเข้ารหัสชื่อไฟล์เพื่อป้องกันการตั้งชื่อเป็นภาษาไทยหรือเว้นวรรค
            $config['file_name'] = $bookimg;
            
            $this->load->library('upload',$config);
            // ถ้าไม่มีการอัพโหลดไฟล์ หรือไฟล์ว่าง
            if( ! $this->upload->do_upload('image')){
                // @unlink("img/book/".$data['delete']);
                // echo $this->upload->display_errors();
                $data = array(
                    'bookName' => $this->input->post('bookName'),
                    'author' => $this->input->post('author'),
                    'years' => $this->input->post('years'),
                    'publisher' => $this->input->post('publisher'),
                    'keyword' => $this->input->post('keyword'),
                    'Section' => $this->input->post('Section'),
                    'bookNumber' => $this->input->post('bookNumber'),
                    'bookStatus_id' => $this->input->post('bookStatus_id'),
                    'barcode' => $this->input->post('barcode'),
                    'bookType_id' => $this->input->post('bookType_id')
                );
                // เอา announce_id มาเทียบว่าส่งไอดีไหมมาแก้ไข
                $this->db->where('book_id',$this->input->post('book_id'));
        
                //สร้างตัวแปลในการรับข้อมูลเข้าไปในดาต้าเบส เอาข้อมูลมาใส่ในตาราง
                $query=$this->db->update('book',$data);
        
                if($query){
                    echo "<script>";
                    echo "alert(' แก้ไขข้อมูลเรียบร้อย');";
                    echo "</script>";
                }else{
                    echo "<script>";
                    echo "alert(' แก้ไขข้อมูลไม่ถูกต้อง');";
                    echo "</script>";
                }
            }
            else{
                // สร้างตัวแปลรับค่าที่อัพโหลดเข้ามา
                $data = $this->upload->data();
            
                
                    // print_r($_POST);
                    //เก็บข้อมูลลงในที่รับมาจาก form ลงใน array
                    $filename = $data['file_name'];
                    $data = array(
                        'bookName' => $this->input->post('bookName'),
                        'author' => $this->input->post('author'),
                        'years' => $this->input->post('years'),
                        'publisher' => $this->input->post('publisher'),
                        'keyword' => $this->input->post('keyword'),
                        'Section' => $this->input->post('Section'),
                        'bookNumber' => $this->input->post('bookNumber'),
                        'bookStatus_id' => $this->input->post('bookStatus_id'),
                        'barcode' => $this->input->post('barcode'),
                        'bookType_id' => $this->input->post('bookType_id'),
                        'image' => $filename
                    );
                    
                    // เอา user_id มาเทียบว่าส่งไอดีไหมมาแก้ไข
                    $this->db->where('book_id',$this->input->post('book_id'));
            
                    //สร้างตัวแปลในการรับข้อมูลเข้าไปในดาต้าเบส เอาข้อมูลมาใส่ในตาราง
                    $query=$this->db->update('book',$data);
            
                    if($query){
                        echo "<script>";
                        echo "alert('แก้ไขข้อมููลเรียบร้อย');";
                        echo "</script>";
                        // echo 'edit ok yoo!';
                    }else{
                        echo "<script>";
                        echo "alert(' แก้ไขข้อมูลไม่ถูกต้อง');";
                        echo "</script>";
                        // echo 'fail';
                    }
                }
        }

        public function updateBookst($bookID)
        {
            // print_r($_POST);
            //เก็บข้อมูลลงในที่รับมาจาก form ลงใน array
            $data = array(
                'bookStatus_id' => 2
            );
            $this->db->where('book_id',$bookID);
            //สร้างตัวแปลในการรับข้อมูลเข้าไปในดาต้าเบส เอาข้อมูลมาใส่ในตาราง
            $query=$this->db->update('book',$data);
        }

        public function updateBookreturn($bookID)
        {
            // print_r($_POST);
            //เก็บข้อมูลลงในที่รับมาจาก form ลงใน array
            $data = array(
                'bookStatus_id' => 1
            );
            $this->db->where('book_id',$bookID);
            //สร้างตัวแปลในการรับข้อมูลเข้าไปในดาต้าเบส เอาข้อมูลมาใส่ในตาราง
            $query=$this->db->update('book',$data);
        }

        public function editbooktype()
        {
            // print_r($_POST);
            //เก็บข้อมูลลงในที่รับมาจาก form ลงใน array
            $data = array(
                'bookType_id' => $this->input->post('bookType_id'),
                'bookType_name' => $this->input->post('bookType_name'),
                'booktypeStatus_id' => $this->input->post('booktypeStatus_id')
            );
            
            // เอา user_id มาเทียบว่าส่งไอดีไหมมาแก้ไข
            $this->db->where('bookType_id',$this->input->post('bookType_id'));
    
            //สร้างตัวแปลในการรับข้อมูลเข้าไปในดาต้าเบส เอาข้อมูลมาใส่ในตาราง
            $query=$this->db->update('book_type',$data);
    
            if($query){
                echo "<script>";
                echo "alert('แก้ไขข้อมูลเรียบร้อย');";
                echo "</script>";
            }else{
                echo "<script>";
                echo "alert('แก้ไขข้อมูลไม่ถูกต้อง');";
                echo "</script>";
            }
        }

        public function getlist($search){

            // $thie->db->select('*');
            if($search != ''){
 
                $this->db->like('bookName',$search);
                $this->db->or_like('booktype_name',$search);
            }
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('b.*,bs.*,bt.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('book as b');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('bookstatus as bs','b.bookStatus_id=bs.bookStatus_id');
            $this->db->join('book_type as bt','b.bookType_id=bt.bookType_id');    

            $query = $this->db->get();
            // return $query->result(); 
            return $query->result();     
        } 

        public function countlist($search){

            // $thie->db->select('*');
            $this->db->select('b.*,bs.*,bt.*');
            if($search != ''){
                $this->db->like('bookName',$search);
                $this->db->or_like('booktype_name',$search);
            }
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            // $this->db->select('b.*,bs.*,bt.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('book as b');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('bookstatus as bs','b.bookStatus_id=bs.bookStatus_id');
            $this->db->join('book_type as bt','b.bookType_id=bt.bookType_id');    

            $query = $this->db->get();
            return $query->num_rows();      
        } 

        public function showBookdata2()
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('b.*,bs.*,bt.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('book as b');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('bookstatus as bs','b.bookStatus_id=bs.bookStatus_id');
            $this->db->join('book_type as bt','b.bookType_id=bt.bookType_id');
            $this->db->order_by('book_id','DESC');
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // $query ออกมาเป็น result ในกรณีที่มันมีข้อมูล ให้แสดงผลจากตารางที่เราจะนำไปใช้
            return $query->result();

        }

        public function showBookIndex()
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('b.*,bs.*,bt.*,bt.bookType_name');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('book as b');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('bookstatus as bs','b.bookStatus_id=bs.bookStatus_id');
            $this->db->join('book_type as bt','b.bookType_id=bt.bookType_id');
            $this->db->order_by('b.book_id','DESC');
            $this->db->limit(10);
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // $query ออกมาเป็น result ในกรณีที่มันมีข้อมูล ให้แสดงผลจากตารางที่เราจะนำไปใช้
            return $query->result();
        }

        public function userSelectBt($user_id)
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('u.bookType_id');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('user as u');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('book_type as bt','bt.bookType_id=u.bookType_id');
            $this->db->where('u.user_id',$user_id);
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // $query ออกมาเป็น result ในกรณีที่มันมีข้อมูล ให้แสดงผลจากตารางที่เราจะนำไปใช้
            return $query->result();
        }

        public function showBooklike()
        {
            $user_id = $_SESSION['user_id'];
            $data['showB'] = $this->Book_models->userSelectBt($user_id);
            
            $Btype = 0;
            foreach ($data['showB'] as $rw){
                $Btype = $rw->bookType_id;
            }
            // echo $Btype;
            // exit;
            // echo $data['showBooklike'];
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('b.*,bt.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('book as b');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('bookstatus as bs','b.bookStatus_id=bs.bookStatus_id');
            $this->db->join('book_type as bt','b.bookType_id=bt.bookType_id');
            $this->db->where_in('b.bookType_id',$Btype);
            $this->db->order_by('b.book_id','DESC');
            $this->db->limit(10);

            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // $query ออกมาเป็น result ในกรณีที่มันมีข้อมูล ให้แสดงผลจากตารางที่เราจะนำไปใช้
            return $query->result();
        }

        public function read($book_id)
        {
            // select ข้อมูลในตารางเฉพาะตาราง user ที่ไม่มี FK
            // $this->db->select('*');
            // $this->db->from('book');

            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('b.*,bs.*,bt.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('book as b');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('bookstatus as bs','b.bookStatus_id=bs.bookStatus_id');
            $this->db->join('book_type as bt','b.bookType_id=bt.bookType_id');
            $this->db->where('b.book_id',$book_id);
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // ใช้รูปแบบ num_rows มาใช้ในการเทียบข้อมูล
            if($query->num_rows() > 0){
                $data = $query->row();
                return $data;
            }
            return FALSE;

        }

        public function readbooktype($bookType_id)
        {
            // select ข้อมูลในตารางเฉพาะตาราง user ที่ไม่มี FK
            // $this->db->select('*');
            // $this->db->from('book');

            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('bt.*,bts.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('book_type as bt');
            $this->db->join('booktype_Status as bts','bts.booktypeStatus_id=bt.booktypeStatus_id ');
            $this->db->where('bt.bookType_id',$bookType_id);
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // ใช้รูปแบบ num_rows มาใช้ในการเทียบข้อมูล
            if($query->num_rows() > 0){
                $data = $query->row();
                return $data;
            }
            return FALSE;

        }

        public function read_alert($book_id)
        {
            // select ข้อมูลในตารางเฉพาะตาราง user ที่ไม่มี FK
            // $this->db->select('*');
            // $this->db->from('book');

            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('b.*,bs.*,bt.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('book as b');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('bookstatus as bs','b.bookStatus_id=bs.bookStatus_id');
            $this->db->join('book_type as bt','b.bookType_id=bt.bookType_id');
            $this->db->where('b.book_id',$book_id);
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // ใช้รูปแบบ num_rows มาใช้ในการเทียบข้อมูล
            return FALSE;

        }

        public function bookcard($book_id)
        {
            // select ข้อมูลในตารางเฉพาะตาราง user ที่ไม่มี FK
            // $this->db->select('*');
            // $this->db->from('book');

            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('b.*,bs.*,bt.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('book as b');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('bookstatus as bs','b.bookStatus_id=bs.bookStatus_id');
            $this->db->join('book_type as bt','b.bookType_id=bt.bookType_id');
            $this->db->where('b.book_id',$book_id);
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // ใช้รูปแบบ num_rows มาใช้ในการเทียบข้อมูล
            return $query->row();

        }

        public function booktype()
        {
            
            $this->db->select('bt.*,bts.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('book_type as bt');
            $this->db->join('booktype_Status as bts','bts.booktypeStatus_id=bt.booktypeStatus_id');
            $this->db->order_by('bookType_id','desc');
            $query = $this->db->get();
            // ใช้รูปแบบ num_rows มาใช้ในการเทียบข้อมูล
            return $query->result();

        }

        public function booktypeNorderby()
        {
            
            $this->db->select('bt.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('book_type as bt');
            $this->db->order_by('bookType_id');
            $query = $this->db->get();
            // ใช้รูปแบบ num_rows มาใช้ในการเทียบข้อมูล
            return $query->result();

        }

        public function checkBStatus($book_id)
        {
            $this->db->select('bookStatus_id');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('book as b');
            $this->db->where('book_id',$book_id);
            $query = $this->db->get();
            // ใช้รูปแบบ num_rows มาใช้ในการเทียบข้อมูล
            return $query->result();
        }

        public function checkBid()
        {
            $this->db->select('b.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('book as b');
            $this->db->join('bookstatus as bs','b.bookStatus_id=bs.bookStatus_id');
            $this->db->join('book_type as bt','b.bookType_id=bt.bookType_id');
            $query = $this->db->get();
            // ใช้รูปแบบ num_rows มาใช้ในการเทียบข้อมูล
            return $query->result();
        }

        public function checkBookupdate($book_id)
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('b.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('book as b');
            $this->db->where('b.book_id',$book_id);
           
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            return $query->num_rows();
        } 

        public function checkBookname($bookName)
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('b.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('book as b');
            $this->db->where('b.bookName',$bookName);
           
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            return $query->num_rows();
        } 

        public function forbookName()
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('b.book_id');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('book as b');
            $this->db->order_by('b.book_id','desc');
            $this->db->limit(1);
           
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            return $query->result();
        } 

        public function forbookeditName($book_id)
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('b.book_id');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('book as b');
            $this->db->where('b.book_id',$book_id);
           
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            return $query->result();
        } 

        public function checkbookType($bookType_name)
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('bt.bookType_name');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('book_type as bt');
            $this->db->where('bt.bookType_name',$bookType_name);
           
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            return $query->num_rows();
        } 

        // public function deletebookImg($book_id)
        // {
        //     // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
        //     $this->db->select('b.image');
        //     // ใช้ข้อมูลจากตาราง user
        //     $this->db->from('book as b');
        //     $this->db->where('b.book_id',$book_id);
           
        //     // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
        //     $query = $this->db->get();
        //     return $query->result();
        // } 

    }
?>