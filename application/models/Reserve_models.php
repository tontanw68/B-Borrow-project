<?php 
    class Reserve_models extends CI_Model{

        public function addreserve()
        {
            // เช็คข้อมูลที่กรอกเข้ามาว่ามีในดาต้าเบส
            $user_id = $_SESSION['user_id'];
            $book_id = $this->input->post('book_id');
            $reserveDate = $this->input->post('reserveDate');
            $reserveCheck = $this->Reserve_models->checkBookrs2($user_id,$book_id);
            // echo $reserveCheck;
            // exit;
            if($reserveCheck > 0){
                echo "<script>";
                echo "alert('จองหนังสือซ้ำ กรุณาทำรายการใหม่');";
                echo "</script>";
                redirect('Reservedata/index3','refresh');
            }else{

            
                $num = $this->Reserve_models->checkBookrs($book_id);
                if($num == 0)   		
                {
                //ตรวจสอบถ้าไม่มีสมาชิกนี้ในฐานข้อมูลจะเด้งไปหน้าเพิ่มข้อมูลสมาชิก (หน้านี้ทำเพิ่มเองนะครับ ลองดู workshop ก่อนหน้าครับ)   
                    echo "<script>";
                    echo "alert('ไม่มีข้อมูลหนังสือในระบบ กรุณากรอกข้อมูลใหม่');";
                    // echo "window.location='add_member.php';";
                    echo "</script>";
                    redirect('Reservedata/index3','refresh');
        
                }else{
                    // print_r($_POST);
                    //เก็บข้อมูลลงในที่รับมาจาก form ลงใน array
                    $data = array(
                        'user_id' => $this->input->post('user_id'),
                        'book_id' => $this->input->post('book_id'),
                        'reserveDate' => $this->input->post('reserveDate'),
                        'reserveStatus_id' => $this->input->post('reserveStatus_id')
                    );
                    //สร้างตัวแปลในการรับข้อมูลเข้าไปในดาต้าเบส เอาข้อมูลมาใส่ในตาราง
                    $query=$this->db->insert('reserve',$data);
            
                    if($query){
                        echo "<script>";
                        echo "alert('จองหนังสือเรียบร้อย');";
                        echo "</script>";
                    }else{
                        echo "<script>";
                        echo "alert('จองหนังสือไม่ถูกต้อง');";
                        echo "</script>";
                    }
                }
            }
        }
        public function editreserve()
        {
            // $dateSW = date("d-m-Y",$workD,strtotime(date('Y-m-d')));
            // print_r($_POST);
            //เก็บข้อมูลลงในที่รับมาจาก form ลงใน array
            $data = array(
                'user_id' => $this->input->post('user_id'),
                'book_id' => $this->input->post('book_id'),
                'reserveDate' => $this->input->post('reserveDate'),
                'reserveStatus_id' => $this->input->post('reserveStatus_id'),
                'receiveDate' => $this->input->post('receiveDate'),
            );
            // เอา user_id มาเทียบว่าส่งไอดีไหมมาแก้ไข
            $this->db->where('reserve_id',$this->input->post('reserve_id'));

            //สร้างตัวแปลในการรับข้อมูลเข้าไปในดาต้าเบส เอาข้อมูลมาใส่ในตาราง
            $query=$this->db->update('reserve',$data);

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

        public function editRsUndate()
        {
            // $dateSW = date("d-m-Y",$workD,strtotime(date('Y-m-d')));
            // print_r($_POST);
            //เก็บข้อมูลลงในที่รับมาจาก form ลงใน array
            $data = array(
                'user_id' => $this->input->post('user_id'),
                'book_id' => $this->input->post('book_id'),
                'reserveDate' => $this->input->post('reserveDate'),
                'reserveStatus_id' => $this->input->post('reserveStatus_id')
            );
            // เอา user_id มาเทียบว่าส่งไอดีไหมมาแก้ไข
            $this->db->where('reserve_id',$this->input->post('reserve_id'));

            //สร้างตัวแปลในการรับข้อมูลเข้าไปในดาต้าเบส เอาข้อมูลมาใส่ในตาราง
            $query=$this->db->update('reserve',$data);

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

        public function read($reserve_id)
        {
            // select ข้อมูลในตารางเฉพาะตาราง user ที่ไม่มี FK
            // $this->db->select('*');
            // $this->db->from('work_staff');

            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('rs.*,u.*,b.*,rst.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('reserve as rs');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('user as u','rs.user_id=u.user_id');
            $this->db->join('book as b','rs.book_id=b.book_id');
            $this->db->join('reservestatus as rst','rs.reserveStatus_id=rst.reserveStatus_id');
            $this->db->where('rs.reserve_id',$reserve_id);
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // ใช้รูปแบบ num_rows มาใช้ในการเทียบข้อมูล
            if($query->num_rows() > 0){
                $data = $query->row();
                return $data;
            }
            return FALSE;

        }

        // เลือกแสดงข้อมูลเฉพาะ user_id นั้นๆ
        public function showreserve($user_id)
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('rs.*,u.*,b.*,rst.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('reserve as rs');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('user as u','rs.user_id=u.user_id');
            $this->db->join('book as b','rs.book_id=b.book_id');
            $this->db->join('reservestatus as rst','rs.reserveStatus_id=rst.reserveStatus_id');
            $this->db->order_by('reserve_id','desc');
            // ที่ user_id นั้นที่ส่งค่ามา
            $this->db->where('rs.user_id',$user_id);
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // $query ออกมาเป็น result ในกรณีที่มันมีข้อมูล ให้แสดงผลจากตารางที่เราจะนำไปใช้
            return $query->result();

        }

        // แสดงข้อมูลทั้งหมดที่มีในตาราง reserve
        public function showreserveAll()
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('rs.*,u.*,b.*,rst.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('reserve as rs');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('user as u','rs.user_id=u.user_id');
            $this->db->join('book as b','rs.book_id=b.book_id');
            $this->db->join('reservestatus as rst','rs.reserveStatus_id=rst.reserveStatus_id');
            $this->db->order_by('reserve_id','desc');
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // $query ออกมาเป็น result ในกรณีที่มันมีข้อมูล ให้แสดงผลจากตารางที่เราจะนำไปใช้
            return $query->result();

        }

        public function showreserveAll1($show)
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('rs.*,u.*,b.*,rst.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('reserve as rs');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('user as u','rs.user_id=u.user_id');
            $this->db->join('book as b','rs.book_id=b.book_id');
            $this->db->join('reservestatus as rst','rs.reserveStatus_id=rst.reserveStatus_id');
            $this->db->where_in('rs.reserveStatus_id',$show);
            $this->db->order_by('reserve_id','desc');
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // $query ออกมาเป็น result ในกรณีที่มันมีข้อมูล ให้แสดงผลจากตารางที่เราจะนำไปใช้
            return $query->result();

        }

         //วัน เดือน ปี ปัจจุบันแบบไทย
         public function thdatenow()
         {
             // $strYear = date("Y",strtotime($strDate))+543;
             // $strMonth= date("n",strtotime($strDate));
             // $strDay= date("j",strtotime($strDate));
             // $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
             // $strMonthThai=$strMonthCut[$strMonth];
             // return "$strDay $strMonthThai $strYear";
 
             //วันภาษาไทย
             $ThDay = array ( "อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัส", "ศุกร์", "เสาร์" );
             //เดือนภาษาไทย
             $ThMonth = array ( "มกรามก", "กุมภาพันธ์", "มีนาคม", "เมษายน","พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม","กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม" );
             $NumMonth = array ( "01", "02", "03", "04","05", "06", "07", "08","09", "10", "11", "12" );
             
             //กำหนดคุณสมบัติ
             $week = date( "w" ); // ค่าวันในสัปดาห์ (0-6)
             $months = date( "m" )-1; // ค่าเดือน (1-12)
             $day = date( "d" ); // ค่าวันที่(1-31)
             $years = date( "Y" )+543; // ค่า ค.ศ.บวก 543 ทำให้เป็น ค.ศ.
             
            //  return "วัน$ThDay[$week] ที่ $day เดือน $ThMonth[$months] พ.ศ. $years";
             return "$day/$NumMonth[$months]/$years";
         }

         public function canclereserve($reserve_id){
            //ส่งค่าไอดีไปเทียบว่าจะลบที่ไอดีที่เท่าไหร่
            $this->db->delete('reserve',array('reserve_id'=>$reserve_id));
         }

         public function updateCancel($reserve_id){
            $data = array(
                'reserveStatus_id' => 2
            );
            // เอา user_id มาเทียบว่าส่งไอดีไหมมาแก้ไข
            $this->db->where('reserve_id',$reserve_id);
            //สร้างตัวแปลในการรับข้อมูลเข้าไปในดาต้าเบส เอาข้อมูลมาใส่ในตาราง
            $query=$this->db->update('reserve',$data);

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

         // รับค่า $book_id จากฟอร์ม
        public function reserveCard($book_id)
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('rs.*,u.*,b.*,rst.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('reserve as rs');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('user as u','rs.user_id=u.user_id');
            $this->db->join('book as b','rs.book_id=b.book_id');
            $this->db->join('reservestatus as rst','rs.reserveStatus_id=rst.reserveStatus_id');
            $this->db->group_by('reserve_id');
            // ข้อมูลจากคอลัม book_id
            $this->db->where('rs.book_id',$book_id);

            // query จากฐานข้อมูลออกมา
            $query = $this->db->get('reserve');
            // return ค่า query เป็น row ไปใช้กับ controllers
            return $query->row();

        } 

        public function checkBookrs($book_id)
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

        public function checkBookrs2($user_id,$book_id)
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('rs.user_id,rs.book_id,rs.reserveDate');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('reserve as rs');
            $where = array('user_id ' => $user_id , 'book_id ' => $book_id , 'reserveStatus_id' => 3 );
            $this->db->where($where);
           
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            return $query->num_rows();
        }   

        public function checkconfirmRs()
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('rs.reserveStatus_id');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('reserve as rs');
            $this->db->where_in('reserveStatus_id', 3);
           
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            return $query->num_rows();
        } 
        
        public function checkconfirmRs2()
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('rs.*,u.*,b.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('reserve as rs');
            $this->db->join('user as u','rs.user_id=u.user_id');
            $this->db->join('book as b','rs.book_id=b.book_id');
            $this->db->join('reservestatus as rst','rs.reserveStatus_id=rst.reserveStatus_id');
            $this->db->where_in('rs.reserveStatus_id', 3);
           
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            return $query->result();
        } 

        public function checkUserConfirmRs($user_id)
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('rs.reserveStatus_id');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('reserve as rs');
            $where = array('user_id' => $user_id, 'reserveStatus_id' => 1);
            $this->db->where($where);
           
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            return $query->num_rows();
        }

        public function checkUserConfirmRs2($user_id)
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('rs.*,u.*,b.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('reserve as rs');
            $this->db->join('user as u','rs.user_id=u.user_id');
            $this->db->join('book as b','rs.book_id=b.book_id');
            $this->db->join('reservestatus as rst','rs.reserveStatus_id=rst.reserveStatus_id');
            
            $where = array('u.user_id' => $user_id, 'rs.reserveStatus_id' => 1);
            $this->db->where($where);
           
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            return $query->result();
        }
        
    }
?>