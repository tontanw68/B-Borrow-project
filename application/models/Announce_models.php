<?php
    class Announce_models extends CI_Model{

        public function addimg()
        {
            $announceImgname['announcerimag'] = $this->Announce_models->forannounceImg();
            $img = 0;
            foreach ($announceImgname['announcerimag'] as $rw){
                $img = $rw->announce_id;  
            }
            $annum = $img + 1;
            $annameStr = (string)$annum;
            // กำหนดโฟรเดอร์ที่จะเก็บรูปภาพ
            $config['upload_path'] = './img/announce/';
            // อนูญาตให้อัพโหลดไฟล์อะไรได้บ้าง
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2000';
            $config['max_width'] = '3000';
            $config['max_height'] = '3000'; 
            // ให้มีการเข้ารหัสชื่อไฟล์เพื่อป้องกันการตั้งชื่อเป็นภาษาไทยหรือเว้นวรรค
            $config['file_name'] = $annameStr;
            
            $this->load->library('upload',$config);
            if( ! $this->upload->do_upload('announceImage')){
                // echo $this->upload->display_errors();
                $data = array(
                    'user_id' => $this->input->post('user_id'),
                    'announceSection' => $this->input->post('announceSection'),
                    'announceDetails' => $this->input->post('announceDetails'),
                    'announceDate' => $this->input->post('announceDate'),
                    'active' => $this->input->post('active'),
    
                );
        
                //สร้างตัวแปลในการรับข้อมูลเข้าไปในดาต้าเบส เอาข้อมูลมาใส่ในตาราง
                $query=$this->db->insert('announce',$data);
        
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
            else{
                // สร้างตัวแปลรับค่าที่อัพโหลดเข้ามา
                $data = $this->upload->data();

                // print_r($_POST);
                //เก็บข้อมูลลงในที่รับมาจาก form ลงใน array
                $filename = $data['file_name'];
                $data = array(
                    'user_id' => $this->input->post('user_id'),
                    'announceSection' => $this->input->post('announceSection'),
                    'announceDetails' => $this->input->post('announceDetails'),
                    'announceDate' => $this->input->post('announceDate'),
                    'active' => $this->input->post('active'),
                    'announceImage' => $filename

                );
        
                //สร้างตัวแปลในการรับข้อมูลเข้าไปในดาต้าเบส เอาข้อมูลมาใส่ในตาราง
                $query=$this->db->insert('announce',$data);
        
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
        }

        public function editAnnounce()
        {
            $announce_id = $this->input->post('announce_id');
            $announceEditImg['announceEditImg'] = $this->Announce_models->forannounceeditImg($announce_id);
            
            $img = 0;
            foreach ($announceEditImg['announceEditImg'] as $rw){
                $img = $rw->announce_id;  
            }
            $annameStr = (string)$img;
            $imgStr = $annameStr."_";
            $config['upload_path'] = './img/announce/';
            // อนูญาตให้อัพโหลดไฟล์อะไรได้บ้าง
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2000';
            $config['max_width'] = '3000';
            $config['max_height'] = '3000'; 
            // ให้มีการเข้ารหัสชื่อไฟล์เพื่อป้องกันการตั้งชื่อเป็นภาษาไทยหรือเว้นวรรค
            $config['file_name'] = $imgStr;
            
            $this->load->library('upload',$config);
            // ถ้าไม่มีการอัพโหลดไฟล์ หรือไฟล์ว่าง
            if( ! $this->upload->do_upload('announceImage')){
                // echo $this->upload->display_errors();
                //ให้อัพเดทคอลัมตามนี้
                $data = array(
                    'user_id' => $this->input->post('user_id'),
                    'announceSection' => $this->input->post('announceSection'),
                    'announceDetails' => $this->input->post('announceDetails'),
                    'announceDate' => $this->input->post('announceDate'),
                    'active' => $this->input->post('active')

                );
                
                // เอา announce_id มาเทียบว่าส่งไอดีไหมมาแก้ไข
                $this->db->where('announce_id',$this->input->post('announce_id'));
        
                //สร้างตัวแปลในการรับข้อมูลเข้าไปในดาต้าเบส เอาข้อมูลมาใส่ในตาราง
                $query=$this->db->update('announce',$data);
        
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
                        'user_id' => $this->input->post('user_id'),
                        'announceSection' => $this->input->post('announceSection'),
                        'announceDetails' => $this->input->post('announceDetails'),
                        'announceDate' => $this->input->post('announceDate'),
                        'active' => $this->input->post('active'),
                        'announceImage' => $filename
                    );
                    
                    // เอา user_id มาเทียบว่าส่งไอดีไหมมาแก้ไข
                    $this->db->where('announce_id',$this->input->post('announce_id'));
            
                    //สร้างตัวแปลในการรับข้อมูลเข้าไปในดาต้าเบส เอาข้อมูลมาใส่ในตาราง
                    $query=$this->db->update('announce',$data);
            
                    if($query){
                        echo "<script>";
                        echo "alert('แก้ไขข้อมูลเรียบร้อย');";
                        echo "</script>";
                    }else{
                        echo "<script>";
                        echo "alert(' Error');";
                        echo "</script>";
                    }
                }
        }

        // function ที่ใช้ในการดึงข้อมูลออกมาแสดง
        public function showdata()
        {
            $query = $this->db->get('announce');
            // $query ออกมาเป็น result ในกรณีที่มันมีข้อมูล
            return $query->result();

        }

        public function showdata2()
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('an.*,u.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('announce as an');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('user as u','an.user_id=u.user_id');
            // $this->db->where_in('active',1);
            $this->db->order_by('announce_id','desc');
            // $this->db->where_in('an.active','1');
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // $query ออกมาเป็น result ในกรณีที่มันมีข้อมูล ให้แสดงผลจากตารางที่เราจะนำไปใช้
            return $query->result();
        }

        public function showdata3()
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('an.*,u.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('announce as an');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('user as u','an.user_id=u.user_id');
            $this->db->order_by('announce_id','desc');
            $this->db->where_in('an.active','1');
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // $query ออกมาเป็น result ในกรณีที่มันมีข้อมูล ให้แสดงผลจากตารางที่เราจะนำไปใช้
            return $query->result();

        }

        //เอาข้อมูลออกมาเป็น record
        public function read($announce_id)
        {
            // select ข้อมูลในตาราง
            $this->db->select('*');
            $this->db->from('announce');
            $this->db->where('announce_id',$announce_id);
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // ใช้รูปแบบ num_rows มาใช้ในการเทียบข้อมูล
            if($query->num_rows() > 0){
                $data = $query->row();
                return $data;
            }
            return FALSE;
        }

        // รับค่าข้อมูลมาจากฟอร์ม
        public function an_search($search)
        {
            // $this->db->select('*');
            // $this->db->from('user');
            // if($name != ''){
            //     $this->db->like('name',$name);
            //     $this->db->or_like('surename',$name);
            // }
            // // เรียงลำดับข้อมูลจากมากไปน้อย
            // $this->db->order_by('user_id','DESC');
            // return $this->db->get();
            
            if($search != ''){
                $this->db->like('announceSection',$search);
            }
            $this->db->select('an.*,u.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('announce as an');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('user as u','an.user_id=u.user_id');
            // $this->db->like('name',$search);
            $query = $this->db->get();
            return $query->result();

        }
        //ส่งค่าวันที่สากลมาแปลงเป็นวันที่แบบไทย
        public function thdate($date)
        {
            // $this->db->select('announceDate');
            // $this->db->where('announceDate',$date);
            // $query = $this->db->get();

            // $date = "2008-08-14";
            $strYear = date("Y",strtotime($date))+543;
            $strMonth= date("n",strtotime($date));
            $strDay= date("j",strtotime($date));
            $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
            $strMonthThai=$strMonthCut[$strMonth];
            return "$strDay $strMonthThai $strYear";

        }
        //วัน เดือน ปี ปัจจุบันแบบไทย
        public function thdatenow($date)
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
            
            //กำหนดคุณสมบัติ
            $week = date( "w" ); // ค่าวันในสัปดาห์ (0-6)
            $months = date( "m" )-1; // ค่าเดือน (1-12)
            $day = date( "d" ); // ค่าวันที่(1-31)
            $years = date( "Y" )+543; // ค่า ค.ศ.บวก 543 ทำให้เป็น ค.ศ.
            
            return "วัน$ThDay[$week] ที่ $day   เดือน $ThMonth[$months] พ.ศ. $years";
        }

        public function forannounceImg()
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('an.announce_id');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('announce as an');
            $this->db->order_by('an.announce_id','desc');
            $this->db->limit(1);
           
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            return $query->result();
        } 

        public function forannounceeditImg($announce_id)
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('an.announce_id');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('announce as an');
            $this->db->where('an.announce_id',$announce_id);
           
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            return $query->result();
        } 

        public function ruleActive()
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('r.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('rules as r');
            $this->db->where_in('r.rulesActive',1);
           
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            return $query->num_rows();
        }
  
    }

?>