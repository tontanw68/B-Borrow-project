<?php
    class Borrow_models extends CI_Model{

        public function addborrow()
        {
            $bookID = $this->input->post('book_ID');
            $book_id = $this->input->post('book_id');
            $borrowD = $this->input->post('borrowDay');
            $user_id = $_SESSION['user_id'];
            $id = $_SESSION['id'];
            // print_r($_POST);
            //เก็บข้อมูลลงในที่รับมาจาก form ลงใน array
            // $user_br_id = $this->input->post('user_id');
            $data['dataST'] = $this->Borrow_models->returnDate($user_id);
            $status = 0;
            $UStatus = 0;
            foreach ($data['dataST'] as $rw){
                $UStatus = $rw->userStatus_id;
            }
            $data['datefinal'] = $this->Borrow_models->returnThaiDate($UStatus);
            // echo $UStatus;

            // เช็คข้อมูลที่กรอกเข้ามาว่ามีในดาต้าเบส
            $num = $this->Borrow_models->checkBookid($book_id);
            $numbookBr = $this->Borrow_models->checkbrBookid($book_id);
            $numbookBr1 = $this->Borrow_models->checkbrBookid1($book_id);
            
            if($num == 0)   		
            {
            //ตรวจสอบถ้าไม่มีสมาชิกนี้ในฐานข้อมูลจะเด้งไปหน้าเพิ่มข้อมูลสมาชิก (หน้านี้ทำเพิ่มเองนะครับ ลองดู workshop ก่อนหน้าครับ)   
                echo "<script>";
                echo "alert('ไม่มีข้อมูลหนังสือในระบบ กรุณากรอกข้อมูลใหม่');";
                // echo "window.location='add_member.php';";
                echo "</script>";
                redirect('Borrowdata','refresh');
    
            }
            else if($numbookBr < 0){
                echo "<script>";
                echo "alert('หนังสือถูกยืมแล้ว กรุณากรอกข้อมูลใหม่');";
                // echo "window.location='add_member.php';";
                echo "</script>";
                redirect('Borrowdata','refresh');
            }
            else if($numbookBr1 > 0){
                echo "<script>";
                echo "alert('หนังสือถูกยืมแล้ว กรุณากรอกข้อมูลใหม่');";
                // echo "window.location='add_member.php';";
                echo "</script>";
                redirect('Borrowdata','refresh');
            }
            else{
                // echo "success";
                //Insert to db	
            
                $data = array(
                    'user_id' => $user_id,
                    'book_id' => $this->input->post('book_id'),
                    'borrowDay' => $this->input->post('borrowDay'),
                    'returnDay' => $data['datefinal'],
                    'officer_borrow' => $id,
                    'borrowStatus_id' => 2,
                    // 'officer_return' => $this->input->post('officer_return'),
                );
                //สร้างตัวแปลในการรับข้อมูลเข้าไปในดาต้าเบส เอาข้อมูลมาใส่ในตาราง
                $query=$this->db->insert('borrow_return',$data);
        
                if($query){
                    echo "<script>";
                    echo "alert('ยืมหนังสือแล้วเรียบร้อย');";
                    echo "</script>";
                }else{
                    echo "<script>";
                    echo "alert('ระบบเกิดข้อผิดพลาด');";
                    echo "</script>";
                }
            }
        }

        // public function addborrowTb()
        // {
        //     $user_id = $_SESSION['user_id'];
        //     $id = $_SESSION['id'];
            
        //     $data = array(
        //         'user_id' => $user_id,
        //         'book_id' => $this->input->post('book_id'),
        //         'borrowDay' => $this->input->post('borrowDay'),
        //         // 'returnDay' => $data['datefinal'],
        //         'officer_borrow' => $id,
        //         'borrowStatus_id' => 2,
        //         // 'officer_return' => $this->input->post('officer_return'),
        //     );
        //     //สร้างตัวแปลในการรับข้อมูลเข้าไปในดาต้าเบส เอาข้อมูลมาใส่ในตาราง
        //     $query=$this->db->insert('borrow_return',$data);
    
        //     if($query){
        //         echo "<script>";
        //         echo "alert('เพิ่มข้อมูลเรียบร้อย');";
        //         echo "</script>";
        //     }else{
        //         echo "<script>";
        //         echo "alert(' เพิ่มข้อมูลไม่ถูกต้อง');";
        //         echo "</script>";
        //     }
        // }

        // public function addreturnTb()
        // {
        //     $user_id = $_SESSION['user_id'];
        //     // print_r($_POST);
        //     //เก็บข้อมูลลงในที่รับมาจาก form ลงใน array
        //     // $user_br_id = $this->input->post('user_id');
        //     $data['dataST'] = $this->Borrow_models->returnDate($user_id);
        //     $status = 0;
        //     $UStatus = 0;
        //     foreach ($data['dataST'] as $rw){
        //         $UStatus = $rw->userStatus_id;
        //     }
        //     $data['datefinal'] = $this->Borrow_models->returnThaiDate($UStatus);
        //     echo $UStatus;
        //     $data = array(
        //         'returnDate' => $data['datefinal']
        //         // 'officer_return' => $this->input->post('officer_return'),
        //     );
        //     //สร้างตัวแปลในการรับข้อมูลเข้าไปในดาต้าเบส เอาข้อมูลมาใส่ในตาราง
        //     $query=$this->db->insert('return_details',$data);
    
        //     if($query){
        //         echo "<script>";
        //         echo "alert('เพิ่มข้อมูลเรียบร้อย');";
        //         echo "</script>";
        //     }else{
        //         echo "<script>";
        //         echo "alert(' เพิ่มข้อมูลไม่ถูกต้อง');";
        //         echo "</script>";
        //     }
        // }

        public function addborrowList()
        {
            // print_r($_POST);
            //เก็บข้อมูลลงในที่รับมาจาก form ลงใน array
            $data = array(
                'user_id' => $this->input->post('user_id'),
                'book_id' => $this->input->post('book_id'),
                'borrowDay' => $this->input->post('borrowDay'),
                'returnDay' => $this->input->post('returnDay'),
                'officer_borrow' => $this->input->post('officer_borrow'),
                // 'officer_return' => $this->input->post('officer_return'),
                'borrowStatus_id' => $this->input->post('borrowStatus')
            );
        }

        public function editborrow()
        {
            // print_r($_POST);
            //เก็บข้อมูลลงในที่รับมาจาก form ลงใน array
            $data = array(
                'borrowDay' => $this->input->post('borrowDay'),
                'user_id' => $this->input->post('user_id'),
                'returnDay' => $this->input->post('returnDay'),
                'officer_return' => $this->input->post('officer_return'),
                'borrowStatus_id' => $this->input->post('borrowStatus')
            );
            // เอา user_id มาเทียบว่าส่งไอดีไหมมาแก้ไข
            $this->db->where('borrow_id',$this->input->post('borrow_id'));

            //สร้างตัวแปลในการรับข้อมูลเข้าไปในดาต้าเบส เอาข้อมูลมาใส่ในตาราง
            $query=$this->db->update('borrow_return',$data);

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

        // public function editborrowfine($realrtdate,$rtdate)
        // {
        //     if ($rtdate < $realrtdate){
        //         // echo $date1->format("Y-m-d") . " is older than " 
        //         //         . $date2->format("Y-m-d")."<br>";

        //         $interval = $rtdate->diff($realrtdate);//ต่างกันเท่าไหร่
        //         $xx = $interval->format('%a');//จำนวนวันที่เกิน
        //         echo $xx."<br>";
        //         echo $xx*10;
        //     }
            
        // }

        public function read($borrow_id)
        {

            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('br.borrow_id,br.borrowDay,br.returnDay,u.name,u.surename,u.user_id,bs.*,b.bookName,br.officer_return,br.officer_borrow,br.realreturnDay');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('borrow_return as br');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('user as u','br.user_id=u.user_id');
            $this->db->join('book as b','br.book_id=b.book_id');
            $this->db->join('borrowstatus as bs','br.borrowStatus_id=bs.borrowStatus_id');
            $this->db->where('br.borrow_id',$borrow_id);

            // $this->db->select('*');
            // $this->db->from('borrow_return');
            // $this->db->where('borrow_id',$borrow_id);
           
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // ใช้รูปแบบ num_rows มาใช้ในการเทียบข้อมูล
            if($query->num_rows() > 0){
                $data = $query->row();
                return $data;
            }
            return FALSE;

        }

        // จะไม่ได้ใช้
        public function showdata()
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('br.*,u.*,bs.*,b.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('borrow_return as br');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('user as u','br.user_id=u.user_id');
            $this->db->join('book as b','br.book_id=b.book_id');
            $this->db->join('borrowstatus as bs','br.borrowStatus_id=bs.borrowStatus_id');
            // $this->db->group_by('borrow_id');
            $this->db->order_by('borrow_id','desc');
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // $query ออกมาเป็น result ในกรณีที่มันมีข้อมูล ให้แสดงผลจากตารางที่เราจะนำไปใช้
            return $query->result();

        }

        // แสดงจำนวน recode ทั้งหมดใน table
        public function showdatapage()
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('br.*,u.*,bs.*,b.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('borrow_return as br');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('user as u','br.user_id=u.user_id');
            $this->db->join('book as b','br.book_id=b.book_id');
            $this->db->join('borrowstatus as bs','br.borrowStatus_id=bs.borrowStatus_id');
            $this->db->group_by('borrow_id');
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // $query ออกมาเป็น result ในกรณีที่มันมีข้อมูล ให้แสดงผลจากตารางที่เราจะนำไปใช้
            return $query->num_rows();
        }

        // ฟังก์ชันที่แสดงจำนวนกี่ recode ในแต่ละหน้าและเริ่มต้นที่เท่าไหร่
        public function limitdatapage($limit,$start)
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('br.*,u.*,bs.*,b.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('borrow_return as br');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('user as u','br.user_id=u.user_id');
            $this->db->join('book as b','br.book_id=b.book_id');
            $this->db->join('borrowstatus as bs','br.borrowStatus_id=bs.borrowStatus_id');
            $this->db->group_by('borrow_id');
            // กำหนดว่าแต่ละหน้าจะให้แสดงเท่าไหร่ เริ่มที่เท่าไหร่
            $this->db->limit($limit,$start);
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // // $query ออกมาเป็น result ในกรณีที่มันมีข้อมูล ให้แสดงผลจากตารางที่เราจะนำไปใช้
            if($query->num_rows() > 0){
                foreach($query->result() as $row){
                    $limitdata[] = $row;
                }
                return $limitdata;
            }
            return FALSE;
        }

        public function search($search)
        {
            
            if($search != ''){
                $this->db->like('name',$search);
                $this->db->or_like('surename',$search);
                $this->db->or_like('u.user_id',$search);
            }

            $this->db->select('br.*,u.*,bs.*,b.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('borrow_return as br');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('user as u','br.user_id=u.user_id');
            $this->db->join('book as b','br.book_id=b.book_id');
            $this->db->join('borrowStatus as bs','br.borrowStatus_id=bs.borrowStatus_id');
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส


            // $this->db->like('name',$search);
            $query = $this->db->get();
            return $query->num_rows();

        }

        public function limitSearch($limit,$start,$search)
        {
            if($search != ''){
                $this->db->like('name',$search);
                $this->db->or_like('surename',$search);
                $this->db->or_like('u.user_id',$search);
            }
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('br.*,u.*,bs.*,b.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('borrow_return as br');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('user as u','br.user_id=u.user_id');
            $this->db->join('book as b','br.book_id=b.book_id');
            $this->db->join('borrowStatus as bs','br.borrowStatus_id=bs.borrowStatus_id');
            $this->db->group_by('borrow_id');
            // กำหนดว่าแต่ละหน้าจะให้แสดงเท่าไหร่ เริ่มที่เท่าไหร่
            $this->db->limit($limit,$start);
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // // $query ออกมาเป็น result ในกรณีที่มันมีข้อมูล ให้แสดงผลจากตารางที่เราจะนำไปใช้
            if($query->num_rows() > 0){
                foreach($query->result() as $row){
                    $dataSearch[] = $row;
                }
                return $dataSearch;
            }
            return FALSE;

        }

        public function Usearch($search)
        {
            if($search != ''){
                $this->db->or_like('u.user_id',$search);
            }

            $this->db->select('br.*,u.*,bs.*,b.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('borrow_return as br');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('user as u','br.user_id=u.user_id');
            $this->db->join('book as b','br.book_id=b.book_id');
            $this->db->join('borrowStatus as bs','br.borrowStatus_id=bs.borrowStatus_id');
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส


            // $this->db->like('name',$search);
            $query = $this->db->get();
            return $query->result();

        }

        public function uShow($dt)
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('br.borrow_id,br.borrowDay,br.returnDay,u.name,u.surename,u.user_id,bs.*,b.bookName,br.officer_return,br.officer_borrow');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('borrow_return as br');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('user as u','br.user_id=u.user_id');
            $this->db->join('book as b','br.book_id=b.book_id');
            $this->db->join('borrowstatus as bs','br.borrowStatus_id=bs.borrowStatus_id');
            $this->db->order_by('br.borrow_id', 'asc');
            $this->db->where('br.user_id',$dt);

            // $this->db->select('*');
            // $this->db->from('borrow_return');
            // $this->db->where('borrow_id',$borrow_id);
           
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            return $query->result();
        }

        public function uShowSearch($dt)
        {
            $brStart = $this->input->post('brStart');
            $brEnd = $this->input->post('brEnd');
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('br.borrow_id,br.borrowDay,br.returnDay,u.name,u.surename,u.user_id,bs.*,b.bookName,br.officer_return,br.officer_borrow');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('borrow_return as br');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('user as u','br.user_id=u.user_id');
            $this->db->join('book as b','br.book_id=b.book_id');
            $this->db->join('borrowstatus as bs','br.borrowStatus_id=bs.borrowStatus_id');
            $this->db->order_by('br.borrow_id', 'asc');
            $this->db->where('br.user_id',$dt);
            $this->db->where('br.borrowDay >=',$brStart);
            $this->db->where('br.borrowDay <=',$brEnd);

            // $this->db->select('*');
            // $this->db->from('borrow_return');
            // $this->db->where('borrow_id',$borrow_id);
           
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            return $query->result();
        }

        public function uShowPage($dt)
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('br.borrow_id,br.borrowDay,br.returnDay,u.name,u.surename,u.user_id,bs.*,b.bookName,br.officer_return,br.officer_borrow');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('borrow_return as br');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('user as u','br.user_id=u.user_id');
            $this->db->join('book as b','br.book_id=b.book_id');
            $this->db->join('borrowStatus as bs','br.borrowStatus_id=bs.borrowStatus_id');
            $this->db->order_by('br.borrow_id', 'asc');
            $this->db->where('br.user_id',$dt);

            // $this->db->select('*');
            // $this->db->from('borrow_return');
            // $this->db->where('borrow_id',$borrow_id);
           
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            return $query->num_rows();
        }

         // ฟังก์ชันที่แสดงจำนวนกี่ recode ในแต่ละหน้าและเริ่มต้นที่เท่าไหร่
         public function uShowlimitpage($limit,$start,$dt)
         {
             // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('br.borrow_id,br.borrowDay,br.returnDay,u.name,u.surename,u.user_id,bs.*,b.bookName,br.officer_return,br.officer_borrow');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('borrow_return as br');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('user as u','br.user_id=u.user_id');
            $this->db->join('book as b','br.book_id=b.book_id');
            $this->db->join('borrowStatus as bs','br.borrowStatus_id=bs.borrowStatus_id');
            $this->db->order_by('br.borrow_id', 'asc');
            $this->db->where('br.user_id',$dt);
             // กำหนดว่าแต่ละหน้าจะให้แสดงเท่าไหร่ เริ่มที่เท่าไหร่
             $this->db->limit($limit,$start);
             // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
             $query = $this->db->get();
             // // $query ออกมาเป็น result ในกรณีที่มันมีข้อมูล ให้แสดงผลจากตารางที่เราจะนำไปใช้
             if($query->num_rows() > 0){
                 foreach($query->result() as $row){
                     $limitdata[] = $row;
                 }
                 return $limitdata;
             }
             return FALSE;
         }

        public function thaiDate($date)
        {
            echo $date;
            // echo date ("d/m/Y", strtotime("+3 day", strtotime($date)));
        } 

        public function returnThaiDate($userT)
        {
            $data = $this->Borrow_models->selectUstatus($userT);
            $data[0]->borrowDate;
            $newday =  "+" .$data[0]->borrowDate." day";
            $datefinal = '';
            // if($userT == 1){
                $data[0]->userStatus_type;
                $myDate = date('Y-m-d H:i:s');
                $myYears = date('Y', strtotime($myDate));
                $myYearsBud = $myYears + 543;
    
                $datefinal = date('d/m/',strtotime($newday,strtotime($myDate))).$myYearsBud;
                $exp_thaidate = explode( '/', $datefinal);
                // echo $exp_thaidate[0],"<br>";
                // echo $exp_thaidate[1],"<br>";
                // echo $exp_thaidate[2]-543,"<br>";
                $dateNow = ($exp_thaidate[2]-543)."/".$exp_thaidate[1]."/".$exp_thaidate[0];
                // echo $dateNow;
                $time = strtotime($dateNow);
                $newformat = date('Y-m-d',$time);
            // }
            // else if($userT == 2){
            //     echo 'This is Student';
            //     $myDate = date('Y-m-d H:i:s');
            //     $myYears = date('Y', strtotime($myDate));
            //     $myYearsBud = $myYears + 543;
            //     $datefinal = date('d/m/',strtotime($newday,strtotime($myDate))).$myYearsBud;
            //     $exp_thaidate = explode( '/', $datefinal);
            //     // echo $exp_thaidate[0],"<br>";
            //     // echo $exp_thaidate[1],"<br>";
            //     // echo $exp_thaidate[2]-543,"<br>";
            //     $dateNow = ($exp_thaidate[2]-543)."/".$exp_thaidate[1]."/".$exp_thaidate[0];
            //     // echo $dateNow;
            //     $time = strtotime($dateNow);
            //     $newformat = date('Y-m-d',$time);
            // }
            // else{
            //     echo 'No Status';
            // }
            // return "$datefinal";
            return "$newformat";
        } 

        public function returnDate($user_br_id)
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('u.userStatus_id');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('user as u');
            $this->db->where('u.user_id',$user_br_id);

            // $this->db->select('*');
            // $this->db->from('borrow_return');
            // $this->db->where('borrow_id',$borrow_id);
           
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            return $query->result();
        } 

        public function selectUstatus($uStatus)
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('us.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('user_status as us');
            $this->db->where('us.userStatus_id',$uStatus);

            // $this->db->select('*');
            // $this->db->from('borrow_return');
            // $this->db->where('borrow_id',$borrow_id);
           
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            return $query->result();
        } 

        public function checkBookid($book_id)
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

        public function checkbrBookid($book_id)
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('br.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('borrow_return as br');
            $where = array('br.book_id' => $book_id ,'borrowStatus_id' => 1);
            // $this->db->where('br.book_id',$book_id);
            $this->db->where($where);
           
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            return $query->num_rows();
        }

        public function checkbrBookid1($book_id)
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('br.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('borrow_return as br');
            $where = array('br.book_id' => $book_id ,'borrowStatus_id' => 2);
            // $this->db->where('br.book_id',$book_id);
            $this->db->where($where);
           
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            return $query->num_rows();
        }

        
        public function checkreturnBook()
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('br.borrowStatus_id');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('borrow_return as br');
            $this->db->where_in('br.borrowStatus_id',2);
           
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            return $query->num_rows();
        } 

        public function checkreturnBook2()
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('br.*,u.*,b.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('borrow_return as br');
            $this->db->join('user as u','u.user_id=br.user_id');
            $this->db->join('book as b','b.book_id=br.book_id');
            $this->db->join('borrowstatus as brs','brs.borrowStatus_id=br.borrowStatus_id');
            $this->db->where_in('br.borrowStatus_id',2);
           
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            return $query->result();
        } 

        public function checkUserReturnBook($user_id)
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('br.borrowStatus_id');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('borrow_return as br');
            $where = array('borrowStatus_id' => 2, 'user_id' => $user_id);
            $this->db->where($where);
           
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            return $query->num_rows();
        } 

        public function checkUserReturnBook2($user_id)
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('br.*,u.*,b.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('borrow_return as br');
            $this->db->join('user as u','br.user_id=u.user_id');
            $this->db->join('book as b','br.book_id=b.book_id');
            $where = array('br.borrowStatus_id' => 2, 'u.user_id' => $user_id);
            $this->db->where($where);
           
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            return $query->result();
        } 
    }

?>