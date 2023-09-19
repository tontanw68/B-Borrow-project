<?php
    class User_models extends CI_Model{

        public function adduser($user_id)
        {
            $user = $this->input->post('user');
            // $pass = $this->input->post('password');
            $name = $this->input->post('name');
            $surename = $this->input->post('surename');
            // เช็ครหัส ชื่อ นามสกุล ห้ามซ้ำ 
            $chackUserid = $this->User_models->checkaddUserid($user_id,$name,$surename);
            // เช็คชื่อผู้ใช้ห้ามซ้ำ
            $chackUserpass = $this->User_models->checkaddUserpass($user);
            // echo $chackUserpass;
            // exit;
            if($chackUserid > 0){
                echo "<script>";
                echo "alert('รหัสประจำตัวซ้ำ กรุณาทำรายการใหม่');";
                echo "</script>";
                redirect('insertdata','refresh');
            }else if($chackUserpass > 0){
                echo "<script>";
                echo "alert('ข้อมูลชื่อผู้ใช้ซ้ำ กรุณาทำรายการใหม่');";
                echo "</script>";
                redirect('insertdata','refresh');
            }else{
                // $num = $this->User_models->checkUserforId($user_id);
                // if($num > 0){
                //     echo "<script>";
                //     echo "alert(' รหัสผู้ใช้ซ้ำ กรุณาเพิ่มข้อมูลอีกครั้ง');";
                //     echo "</script>";
                //     redirect('Showdata/userShow1','refresh');
                // }else{
                    // print_r($_POST);
                    //เก็บข้อมูลลงในที่รับมาจาก form ลงใน array
                    $data = array(
                        'user_id' => $this->input->post('id'),
                        'id' => $this->input->post('id'),
                        'user' => $this->input->post('user'),
                        'password' => md5($this->input->post('password')),
                        'prename' => $this->input->post('prename'),
                        'name' => $this->input->post('name'),
                        'surename' => $this->input->post('surename'),
                        'email' => $this->input->post('email'),
                        'phoneNo' => $this->input->post('phoneNo'),
                        'bookType_id' => $this->input->post('bookType'),
                        'type_id' => $this->input->post('userType'),
                        'allow_id' => $this->input->post('allow'),
                        'userStatus_id' => $this->input->post('userStatus')
                    );
                    //สร้างตัวแปลในการรับข้อมูลเข้าไปในดาต้าเบส เอาข้อมูลมาใส่ในตาราง
                    $query=$this->db->insert('user',$data);
            
                    if($query){
                        echo "<script>";
                        echo "alert('เพิ่มข้อมูลเรียบร้อย');";
                        echo "</script>";
                    }else{
                        echo "<script>";
                        echo "alert(' เพิ่มข้อมูลไม่ถูกต้อง');";
                        echo "</script>";
                    }
                // }
            }
        }

        public function adduserfile($filename)
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
                            'user_id' => $emapData[0],
                            'id' => $emapData[0],
                            'user' => $emapData[1],
                            'password' => md5($emapData[2]),
                            'prename' => $emapData[3],
                            'name' => $emapData[4],
                            'surename' => $emapData[5],
                            'email' => $emapData[6],
                            'phoneNo' => $emapData[7],
                            'type_id' => $emapData[8],
                            'allow_id' => $emapData[9],
                            'userStatus_id' => $emapData[10],
                            'bookType_id' => 2
                        );
                        // foreach ($data as $key => $value) {
                        //     echo "$key: $value","<br>";
                        // }
                        // exit;
                        $query=$this->db->insert('user',$data);
                        if(! $query)
                        {
                            // echo "<script type=\"text/javascript\">
                            //         alert(\"Invalid File:Please Upload CSV File.\");
                            //         window.location = \"index2\"
                            //     </script>";

                            echo "<script>";
                            echo "alert('เพิ่มข้อมูลผู้ใช้ใหม่อีกรอบ');";
                            echo "</script>";
                            redirect('Insertdata/index2','refresh');
                        }
                        
                    }
                    echo "<script>";
                    echo "alert('เพิ่มข้อมูลผู้ใช้ใหม่อีกรอบ');";
                    echo "</script>";
                    fclose($file);
            }
            else
            {
                echo "No file Select";
            }
        }

        public function addUserStatus()
        {
            // print_r($_POST);
            $type = $_SESSION['type'];
            $userStatus_type = $this->input->post('userStatus_type');
            $checkUserst = $this->User_models->checkUserst($userStatus_type);
            if($checkUserst > 0){
                if($type == 1){
                    echo "<script>";
                    echo "alert('สถานภาพซ้ำ กรุณาทำรายการใหม่');";
                    echo "</script>";
                    redirect('Showdata/userStatusShow2','refresh');
                }else{
                    echo "<script>";
                    echo "alert('สถานภาพซ้ำ กรุณาทำรายการใหม่');";
                    echo "</script>";
                    redirect('UserStatusdata','refresh');
                }  
            }else{
                //เก็บข้อมูลลงในที่รับมาจาก form ลงใน array
                $data = array(
                    'userStatus_type' => $this->input->post('userStatus_type'),
                    'borrowDate' => $this->input->post('borrowDate'),
                    'number' => $this->input->post('number'),
                );
                //สร้างตัวแปลในการรับข้อมูลเข้าไปในดาต้าเบส เอาข้อมูลมาใส่ในตาราง
                $query=$this->db->insert('user_status',$data);
        
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

        public function user_file()
        {
           $config['allowed_types'] = "xls|xlsx|csv";
           $this->load->library('upload', $config);

        }

        public function edituserEncrypt()
        {
            // print_r($_POST);
            //เก็บข้อมูลลงในที่รับมาจาก form ลงใน array
            $data = array(
                'user_id' => $this->input->post('id'),
                'user' => $this->input->post('user'),
                'password' => md5($this->input->post('password')),
                'prename' => $this->input->post('prename'),
                'name' => $this->input->post('name'),
                'surename' => $this->input->post('surename'),
                'email' => $this->input->post('email'),
                'phoneNo' => $this->input->post('phoneNo'),
                'type_id' => $this->input->post('type'),
                'allow_id' => $this->input->post('allow'),
                'userStatus_id' => $this->input->post('userType')
            );
            
            // เอา user_id มาเทียบว่าส่งไอดีไหมมาแก้ไข
            $this->db->where('user_id',$this->input->post('id'));
    
            //สร้างตัวแปลในการรับข้อมูลเข้าไปในดาต้าเบส เอาข้อมูลมาใส่ในตาราง
            $query=$this->db->update('user',$data);
    
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

        public function edituser()
        {
            $pass = $this->input->post("password");
            $num = $this->User_models->checkpw($pass);
            if($num==0)   		
            {
                // print_r($_POST);
                //เก็บข้อมูลลงในที่รับมาจาก form ลงใน array
                $data = array(
                    'user_id' => $this->input->post('id'),
                    'user' => $this->input->post('user'),
                    'password' => md5($this->input->post('password')),
                    'prename' => $this->input->post('prename'),
                    'name' => $this->input->post('name'),
                    'surename' => $this->input->post('surename'),
                    'email' => $this->input->post('email'),
                    'phoneNo' => $this->input->post('phoneNo'),
                    'bookType_id' => $this->input->post('bookType'),
                    'type_id' => $this->input->post('type'),
                    'allow_id' => $this->input->post('allow'),
                    'userStatus_id' => $this->input->post('userType')
                );
                
                // เอา user_id มาเทียบว่าส่งไอดีไหมมาแก้ไข
                $this->db->where('user_id',$this->input->post('id'));
        
                //สร้างตัวแปลในการรับข้อมูลเข้าไปในดาต้าเบส เอาข้อมูลมาใส่ในตาราง
                $query=$this->db->update('user',$data);
        
                if($query){
                    echo "<script>";
                    echo "alert('แก้ไขข้อมูลเรียบร้อย');";
                    echo "</script>";
                }else{
                    echo "<script>";
                    echo "alert('แก้ไขข้อมูลไม่ถูกต้อง');";
                    echo "</script>";
                }
            }else{
                // print_r($_POST);
                //เก็บข้อมูลลงในที่รับมาจาก form ลงใน array
                $data = array(
                    'user_id' => $this->input->post('id'),
                    'user' => $this->input->post('user'),
                    'password' => $this->input->post('password'),
                    'prename' => $this->input->post('prename'),
                    'name' => $this->input->post('name'),
                    'surename' => $this->input->post('surename'),
                    'email' => $this->input->post('email'),
                    'phoneNo' => $this->input->post('phoneNo'),
                    'bookType_id' => $this->input->post('bookType'),
                    'type_id' => $this->input->post('type'),
                    'allow_id' => $this->input->post('allow'),
                    'userStatus_id' => $this->input->post('userType')
                );
                
                // เอา user_id มาเทียบว่าส่งไอดีไหมมาแก้ไข
                $this->db->where('user_id',$this->input->post('id'));
        
                //สร้างตัวแปลในการรับข้อมูลเข้าไปในดาต้าเบส เอาข้อมูลมาใส่ในตาราง
                $query=$this->db->update('user',$data);
        
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
        }

        public function edituser2()
        {
            // print_r($_POST);
            //เก็บข้อมูลลงในที่รับมาจาก form ลงใน array
            $data = array(
                'user_id' => $this->input->post('id'),
                'user' => $this->input->post('user'),
                'password' => $this->input->post('password'),
                'prename' => $this->input->post('prename'),
                'name' => $this->input->post('name'),
                'surename' => $this->input->post('surename'),
                'email' => $this->input->post('email'),
                'phoneNo' => $this->input->post('phoneNo'),
                'bookType_id' => $this->input->post('booktype'),
                'type_id' => $this->input->post('type'),
                'allow_id' => $this->input->post('allow'),
                'userStatus_id' => $this->input->post('userStatus')
            );
            
            // เอา user_id มาเทียบว่าส่งไอดีไหมมาแก้ไข
            $this->db->where('user_id',$this->input->post('id'));
    
            //สร้างตัวแปลในการรับข้อมูลเข้าไปในดาต้าเบส เอาข้อมูลมาใส่ในตาราง
            $query=$this->db->update('user',$data);
    
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

        public function editUserStatus()
        {
            // print_r($_POST);
            //เก็บข้อมูลลงในที่รับมาจาก form ลงใน array
            $data = array(
                'userStatus_type' => $this->input->post('userStatus_type'),
                'borrowDate' => $this->input->post('borrowDate'),
                'number' => $this->input->post('number'),
            );
            // เอา user_id มาเทียบว่าส่งไอดีไหมมาแก้ไข
            $this->db->where('userStatus_id',$this->input->post('userStatus_id'));
            //สร้างตัวแปลในการรับข้อมูลเข้าไปในดาต้าเบส เอาข้อมูลมาใส่ในตาราง
            $query=$this->db->update('user_status',$data);
    
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

        // function ที่ใช้ในการดึงข้อมูลออกมาแสดง
        public function showdata()
        {
            $query = $this->db->get('user');
            // $query ออกมาเป็น result ในกรณีที่มันมีข้อมูล
            return $query->result();

        }


        // function ที่ใช้ในการดึงข้อมูลออกมาแสดงในลักษณะของการ join table แล้ว
        public function showdata2()
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('u.*,t.*,a.*,ut.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('user as u');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('type as t','u.type_id=t.type_id');
            $this->db->join('allow as a','u.allow_id=a.allow_id');
            $this->db->join('user_status as ut','u.userStatus_id=ut.userStatus_id');
            $this->db->order_by('user_id','desc');
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // $query ออกมาเป็น result ในกรณีที่มันมีข้อมูล ให้แสดงผลจากตารางที่เราจะนำไปใช้
            return $query->result();

        }

        // function ที่ใช้ในการดึงข้อมูลออกมาแสดงในลักษณะของการ join table แล้ว
        public function showUserStatus()
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('ut.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('user_status as ut');
            $this->db->group_by('ut.userStatus_id');
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // $query ออกมาเป็น result ในกรณีที่มันมีข้อมูล ให้แสดงผลจากตารางที่เราจะนำไปใช้
            return $query->result();

        }

        //อ่านข้อมูลในการแก้ไขข้อมูล
        public function read($user_id)
        {
            // select ข้อมูลในตารางเฉพาะตาราง user ที่ไม่มี FK
            // $this->db->select('*');
            // $this->db->from('user');

            $this->db->select('u.*,t.*,a.*,ut.*,bt.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('user as u');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('type as t','u.type_id=t.type_id');
            $this->db->join('allow as a','u.allow_id=a.allow_id');
            $this->db->join('user_status as ut','u.userStatus_id=ut.userStatus_id');
            $this->db->join('book_type as bt','u.bookType_id=bt.bookType_id');
            $this->db->where('u.user_id',$user_id);
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // ใช้รูปแบบ num_rows มาใช้ในการเทียบข้อมูล
            if($query->num_rows() > 0){
                $data = $query->row();
                return $data;
            }
            return FALSE;

        }

        public function readUserstatus($userStatus_id)
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('ut.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('user_status as ut');
            $this->db->where('ut.userStatus_id',$userStatus_id);
            // $this->db->group_by('ut.userStatus_id');
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // ใช้รูปแบบ num_rows มาใช้ในการเทียบข้อมูล
            if($query->num_rows() > 0){
                $data = $query->row();
                return $data;
            }
            return FALSE;

        }

        public function search($search)
        {
            
            if($search != ''){
                $this->db->like('name',$search);
                $this->db->or_like('surename',$search);
            }

            // เรียกใช้ข้อมูลตารางที่มา join
            $this->db->select('u.*,t.*,a.*,ut.*');
            $this->db->from('user as u');
            $this->db->join('type as t','u.type_id=t.type_id');
            $this->db->join('allow as a','u.allow_id=a.allow_id');
            $this->db->join('user_status as ut','u.userStatus_id=ut.userStatus_id');


            // $this->db->like('name',$search);
            $query = $this->db->get();
            return $query->result();

        }

        public function searchUserBr($search)
        {
            // $user_id = $this->input->post('user_id');
            $num = $this->User_models->checkUserid($search);
            if($num == 0){
                //ตรวจสอบถ้าไม่มีสมาชิกนี้ในฐานข้อมูลจะเด้งไปหน้าเพิ่มข้อมูลสมาชิก (หน้านี้ทำเพิ่มเองนะครับ ลองดู workshop ก่อนหน้าครับ)   
                echo "<script>";
                echo "alert('ไม่มีข้อมูลสมาชิกในระบบ กรุณากรอกข้อมูลใหม่');";
                // echo "window.location='add_member.php';";
                echo "</script>";
                redirect('Borrowdata/fieldUs','refresh');
            }else{
                // เรียกใช้ข้อมูลตารางที่มา join
                $this->db->select('br.*,u.*,bs.*,b.*');
                // ใช้ข้อมูลจากตาราง user
                $this->db->from('borrow_return as br');
                // เทียบตารางหลักกับตารางที่มา join
                $this->db->join('user as u','br.user_id=u.user_id');
                $this->db->join('book as b','br.book_id=b.book_id');
                $this->db->join('borrowstatus as bs','br.borrowStatus_id=bs.borrowStatus_id');
                $this->db->group_by('borrow_id');
                $this->db->where('u.user_id',$search);

                // $this->db->like('name',$search);
                $query = $this->db->get();
                return $query->result();
            }
        }

        // public function searchUserBrDesc($search)
        // {

        //     // เรียกใช้ข้อมูลตารางที่มา join
        //     $this->db->select('br.*,u.*,bs.*,b.*');
        //     // ใช้ข้อมูลจากตาราง user
        //     $this->db->from('borrow_return as br');
        //     // เทียบตารางหลักกับตารางที่มา join
        //     $this->db->join('user as u','br.user_id=u.user_id');
        //     $this->db->join('book as b','br.book_id=b.book_id');
        //     $this->db->join('borrowstatus as bs','br.borrowStatus_id=bs.borrowStatus_id');
        //     // $this->db->group_by('borrow_id');
        //     $this->db->order_by('br.user_id', 'desc');
        //     $this->db->where('u.user_id',$search);
        //     $this->db->limit(1);

        //     // $this->db->like('name',$search);
        //     $query = $this->db->get();
        //     return $query->result();

        // }

        // รับค่า $user,$password จากฟอร์ม
        public function user_login($user,$password)
        {

            
            // ข้อมูลจากคอลัม user และ password
            $this->db->where('user',$user);
            $this->db->where('password',$password);
            $this->db->join('user_status as ut','u.userStatus_id=ut.userStatus_id');
            $this->db->join('type as t','u.type_id=t.type_id');
            // query จากฐานข้อมูลออกมา
            $query = $this->db->get('user as u');
            // return ค่า query เป็น row ไปใช้กับ controllers
            return $query->row();

        }

        public function user_login2($user,$password)
        {

            $where = array('user' => $user, 'password' => $password, 'userStatus' => 1, 'userStatus' => 2);
            // ข้อมูลจากคอลัม user และ password
            $this->db->where($where);
            $this->db->form('user as u');
            $this->db->join('user_status as ut','u.userStatus_id=ut.userStatus_id');
            $this->db->join('type as t','u.type_id=t.type_id');
            // query จากฐานข้อมูลออกมา
            $query = $this->db->get();
            // return ค่า query เป็น row ไปใช้กับ controllers
            return $query->row();

        }
        
        // รับค่า $user,$password จากฟอร์ม
        public function usStatus()
        {
            $userID = $this->input->post('user_id');
            if($userID != ''){
              $this->db->like('user_id',$userID);
            }
            $this->db->select('u.*,ut.*');
            // $this->db->select('br.borrowDay,COUNT(br.borrow_id) as brDaytotal');
            $this->db->from('user as u');
            $this->db->join('type as t','u.type_id=t.type_id');
            $this->db->join('allow as a','u.allow_id=a.allow_id');
            $this->db->join('user_status as ut','u.userStatus_id=ut.userStatus_id');
            // $this->db->group_by('u.user_id,DATE_FORMAT(rs.reserveDate,"%m/%Y")');
            $query = $this->db->get();
            $result = $query->result();
            return $result;

        }  

        // รับค่า $user,$password จากฟอร์ม
        public function usStatusforview2($userID)
        {
            if($userID != ''){
              $this->db->like('user_id',$userID);
            }
            $this->db->select('u.*,ut.*');
            // $this->db->select('br.borrowDay,COUNT(br.borrow_id) as brDaytotal');
            $this->db->from('user as u');
            $this->db->join('type as t','u.type_id=t.type_id');
            $this->db->join('allow as a','u.allow_id=a.allow_id');
            $this->db->join('user_status as ut','u.userStatus_id=ut.userStatus_id');
            // $this->db->group_by('u.user_id,DATE_FORMAT(rs.reserveDate,"%m/%Y")');
            $query = $this->db->get();
            $result = $query->result();
            return $result;

        } 

        // รับค่า $user,$password จากฟอร์ม
        public function brUStatus($search)
        {
            if($search != ''){
                $this->db->like('br.user_id',$search);
            }
            $this->db->select('COUNT(borrowStatus_id) as cb,br.user_id');
            $this->db->from('borrow_return as br');
            //$this->db->join('user as u', 'u.user_id=br.user_id');
            $this->db->group_by('br.user_id');
            $this->db->where_in('borrowStatus_id',2);
            //$this->db->order_by('DATE_FORMAT(br.borrowDay,"%m/%Y")');
            $query = $this->db->get();
            return $query->result();
        }

        public function checkpw($pass)
        {

            $this->db->select('u.*');
            $this->db->from('user as u');
            $this->db->where('u.password',$pass);
            //$this->db->order_by('DATE_FORMAT(br.borrowDay,"%m/%Y")');
            $query = $this->db->get();
            return $query->num_rows();
        }
        
        public function checkUserid($user_id)
        {

            $this->db->select('u.*');
            $this->db->from('user as u');
            $this->db->where('u.user_id',$user_id);
            //$this->db->order_by('DATE_FORMAT(br.borrowDay,"%m/%Y")');
            $query = $this->db->get();
            return $query->num_rows();
        }

        public function checkUserforId($user_id)
        {
            $this->db->select('u.user_id');
            $this->db->from('user as u');
            $this->db->where('u.user_id',$user_id);
            //$this->db->order_by('DATE_FORMAT(br.borrowDay,"%m/%Y")');
            $query = $this->db->get();
            return $query->num_rows();
        }

        public function checkaddUserid($user_id,$name,$surename)
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('u.user_id,u.id,u.name,u.surename');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('user as u');
            $where = array('user_id ' => $user_id , 'id ' => $user_id , 'name' => $name , 'surename' => $surename);
            $this->db->where($where);
           
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            return $query->num_rows();
        } 

        public function checkaddUserpass($user)
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('u.user');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('user as u');
            // $where = array('user ' => $user , 'password ' => md5($pass));
            $this->db->where('user',$user);
           
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            return $query->num_rows();
        } 

        public function userCanLogin()
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('u.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('user as u');
            $this->db->where_in('u.allow_id',1);
           
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            return $query->num_rows();
        } 

        public function userCanLogin2()
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('u.*,t.*,a.*,ut.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('user as u');
            $this->db->join('type as t','u.type_id=t.type_id');
            $this->db->join('allow as a','u.allow_id=a.allow_id');
            $this->db->join('user_status as ut','u.userStatus_id=ut.userStatus_id');
            
            $this->db->where_in('u.allow_id',1);
           
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            return $query->result();
        } 

        public function userUnLogin()
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('u.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('user as u');
            $this->db->where_in('u.allow_id',2);
           
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            return $query->num_rows();
        }

        public function userUnLogin2()
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('u.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('user as u');
            $this->db->where_in('u.allow_id',2);
           
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            return $query->result();
        }

        public function checkUserst($userStatus_type)
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('ut.userStatus_type');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('user_status as ut');
            $this->db->where('userStatus_type',$userStatus_type);
           
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            return $query->num_rows();
        }
              
    }

?>