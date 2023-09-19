<?php 
    class Staff_models extends CI_Model{

        public function addstaff()
        {
            $workD = $this-> input->post('workDate');
            // $dateSW = date("d-m-Y",$workD,strtotime(date('Y-m-d')));
            // print_r($_POST);
            //เก็บข้อมูลลงในที่รับมาจาก form ลงใน array
            $data = array(
                // 'work_id' => $this->input->post('work_id'),
                'user_id' => $this->input->post('user_id'),
                'workDetails_id' => $this->input->post('workDetails_id'),
                'workDate' => $this-> input->post('workDate'),
                'workStart_time' => $this->input->post('workStart_time'),
                'workEnd_time' => $this->input->post('workEnd_time')
            );
            //สร้างตัวแปลในการรับข้อมูลเข้าไปในดาต้าเบส เอาข้อมูลมาใส่ในตาราง
            $query=$this->db->insert('work_staff',$data);
    
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

        public function addstaffDetails()
        {
            // print_r($_POST);
            $WorkDetails = $this->input->post('workDetails');
            $check = $this->Staff_models->checkWorkdetails($WorkDetails);
            if($check > 0){
                echo "<script>";
                echo "alert('รายละเอียดงานซ้ำ กรุณาทำรายการใหม่');";
                echo "</script>";
                redirect('Staffdata/wdInsert','refresh');
            }else{
                //เก็บข้อมูลลงในที่รับมาจาก form ลงใน array
                $data = array(
                    'workDetails' => $this->input->post('workDetails'),
                    'workStatus_id' => $this->input->post('workStatus_id')
                );
                //สร้างตัวแปลในการรับข้อมูลเข้าไปในดาต้าเบส เอาข้อมูลมาใส่ในตาราง
                $query=$this->db->insert('work_details',$data);

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

        public function editstaff()
        {
            // print_r($_POST);
            //เก็บข้อมูลลงในที่รับมาจาก form ลงใน array
            $data = array(
                'work_id' => $this->input->post('work_id'),
                'user_id' => $this->input->post('user_id'),
                'workDetails_id' => $this->input->post('workDetails_id'),
                'workDate' => $this->input->post('workDate'),
                'workStart_time' => $this->input->post('workStart_time'),
                'workEnd_time' => $this->input->post('workEnd_time')
            );
            // เอา user_id มาเทียบว่าส่งไอดีไหมมาแก้ไข
            $this->db->where('work_id',$this->input->post('work_id'));

            //สร้างตัวแปลในการรับข้อมูลเข้าไปในดาต้าเบส เอาข้อมูลมาใส่ในตาราง
            $query=$this->db->update('work_staff',$data);
    
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

        public function editstaffDetail()
        {
            // print_r($_POST);
            //เก็บข้อมูลลงในที่รับมาจาก form ลงใน array
            $data = array(
                'workDetails_id' => $this->input->post('workDetails_id'),
                'workDetails' => $this->input->post('workDetails'),
                'workStatus_id' => $this->input->post('workStatus_id')
            );
            // เอา user_id มาเทียบว่าส่งไอดีไหมมาแก้ไข
            $this->db->where('workDetails_id',$this->input->post('workDetails_id'));

            //สร้างตัวแปลในการรับข้อมูลเข้าไปในดาต้าเบส เอาข้อมูลมาใส่ในตาราง
            $query=$this->db->update('work_details',$data);

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

        public function showStaffdata()
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('w.*,u.*,wd.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('work_staff as w');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('user as u','w.user_id=u.user_id');
            $this->db->join('work_details as wd','w.workDetails_id=wd.workDetails_id');
            $this->db->order_by('w.work_id','desc');
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // $query ออกมาเป็น result ในกรณีที่มันมีข้อมูล ให้แสดงผลจากตารางที่เราจะนำไปใช้

            return $query->result();

        }

        public function showStaff($user_id)
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('w.*,u.*,wd.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('work_staff as w');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('user as u','w.user_id=u.user_id');
            $this->db->join('work_details as wd','w.workDetails_id=wd.workDetails_id');
            $this->db->where('w.user_id',$user_id);
            $this->db->order_by('w.work_id','desc');
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // $query ออกมาเป็น result ในกรณีที่มันมีข้อมูล ให้แสดงผลจากตารางที่เราจะนำไปใช้

            return $query->result();

        }

        public function showStaffDetail()
        {

            $this->db->select('wd.*,ws.*');

            $this->db->from('work_details as wd');
            $this->db->join('work_status as ws','wd.workStatus_id=ws.workStatus_id ');
            $this->db->order_by('wd.WorkDetails_id');

            $query = $this->db->get();

            return $query->result();

        }

        public function showwdEdit($WorkDetails_id)
        {

            $this->db->select('wd.*,ws.*');

            $this->db->from('work_details as wd');
            $this->db->join('work_status as ws','wd.workStatus_id=ws.workStatus_id ');
            
            $this->db->where('wd.WorkDetails_id',$WorkDetails_id);

            $query = $this->db->get();

            // ใช้รูปแบบ num_rows มาใช้ในการเทียบข้อมูล
            if($query->num_rows() > 0){
                $data = $query->row();
                return $data;
            }
            return FALSE;

        }


        public function read($work_id)
        {
            // select ข้อมูลในตารางเฉพาะตาราง user ที่ไม่มี FK
            // $this->db->select('*');
            // $this->db->from('work_staff');

            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('w.*,u.*,wd.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('work_staff as w');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('user as u','w.user_id=u.user_id');
            $this->db->join('work_details as wd','w.workDetails_id=wd.workDetails_id');
            $this->db->where('w.work_id',$work_id);
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // ใช้รูปแบบ num_rows มาใช้ในการเทียบข้อมูล
            if($query->num_rows() > 0){
                $data = $query->row();
                return $data;
            }
            return FALSE;

        }
        public function getlist($search){

            // $thie->db->select('*');
            if($search != ''){
                $this->db->like('name',$search);
                $this->db->or_like('WorkDetails',$search);
            }
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('w.*,u.*,wd.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('work_staff as w');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('user as u','w.user_id=u.user_id');
            $this->db->join('work_details as wd','w.workDetails_id=wd.workDetails_id');

            $query = $this->db->get();
            return $query->result();

            
        } 

        public function showfine()
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('finetype');
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // $query ออกมาเป็น result ในกรณีที่มันมีข้อมูล ให้แสดงผลจากตารางที่เราจะนำไปใช้

            return $query->result();

        }

        public function usStatus()
        {
            $userID = $_SESSION['id'];
            if($userID != ''){
              $this->db->like('u.user_id',$userID);
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

        public function showStafftb()
        {
            $userID = $_SESSION['id'];
            if($userID != ''){
              $this->db->like('w.user_id',$userID);
            }
            // $this->db->select('br.borrowDay,COUNT(br.borrow_id) as brDaytotal');
            $this->db->select('w.*,u.*,wd.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('work_staff as w');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->order_by('w.work_id');
            $this->db->join('user as u','w.user_id=u.user_id');
            $this->db->join('work_details as wd','w.workDetails_id=wd.workDetails_id');


            $query = $this->db->get();
            $result = $query->result();
            return $result;

        }
        public function checkWorkdetails($WorkDetails)
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('wd.WorkDetails');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('work_details as wd');
            $this->db->where('WorkDetails',$WorkDetails);
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // $query ออกมาเป็น result ในกรณีที่มันมีข้อมูล ให้แสดงผลจากตารางที่เราจะนำไปใช้

            return $query->num_rows();

        }


    }
?>