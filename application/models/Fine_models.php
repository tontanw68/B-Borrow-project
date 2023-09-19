<?php 
    class Fine_models extends CI_Model{

        public function addfine()
        {
            $type = $_SESSION['type'];
            $fineType = $this->input->post('fineType');
            // เช็ครายละเอียดค่าปรับ ห้ามซ้ำ
            $checkfineType = $this->Fine_models->checkfineType($fineType);
            if($checkfineType > 0){
                if($type == 1){
                    echo "<script>";
                    echo "alert('รายละเอียดค่าปรับซ้ำ กรุณาทำรายการใหม่');";
                    echo "</script>";
                    redirect('FineTypedata','refresh');
                }else{
                    echo "<script>";
                    echo "alert('รายละเอียดค่าปรับซ้ำ กรุณาทำรายการใหม่');";
                    echo "</script>";
                    redirect('FineTypedata/fineView','refresh');
                }
                
            }else{
                // print_r($_POST);
                //เก็บข้อมูลลงในที่รับมาจาก form ลงใน array
                $data = array(
                    'fineType' => $this->input->post('fineType'),
                    'fineRate' => $this->input->post('fineRate'),
                    'fineType_Status' => $this->input->post('fineType_Status')
                );
                //สร้างตัวแปลในการรับข้อมูลเข้าไปในดาต้าเบส เอาข้อมูลมาใส่ในตาราง
                $query=$this->db->insert('finetype',$data);
        
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

        public function addfineCount()
        {
            $data['ftcheck'] = $this->Fine_models->fineTypeCheck();
            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";
            // exit;
            // print_r($_POST);
            //เก็บข้อมูลลงในที่รับมาจาก form ลงใน array
            $data = array(
                'borrow_id' => $this->input->post('borrow_id'),
                'fine' => $data['ftcheck'],
                'fineType_id' => $this->input->post('fineType'),
                'fineDate' => $this->input->post('realreturnDay'),
                'fineStatus_id' => 2
            );
            //สร้างตัวแปลในการรับข้อมูลเข้าไปในดาต้าเบส เอาข้อมูลมาใส่ในตาราง
            $query=$this->db->insert('fine',$data);
    
            if($query){
                $data = $this->Fine_models->fineTypeCheck();
                // echo "<script >";
                // // echo "alert('เพิ่มข้อมูลเรียบร้อย');"
                // echo "alert('.$error.');";
                // // echo "มีค่าปรับ ".$data['ftcheck']." บาท";
                // echo "</script>";
                echo '<script type="text/javascript">alert("มีค่าปรับ '.$data.' บาท");</script>';
            }else{
                echo "<script>";
                echo "alert(' เพิ่มข้อมูลไม่ถูกต้อง');";
                echo "</script>";
            }
        }

        // public function addreturnDetails()
        // {
        //     $data['ftcheck'] = $this->Fine_models->fineTypeCheck();
        //     // echo "<pre>";
        //     // print_r($_POST);
        //     // echo "</pre>";
        //     // exit;
        //     // print_r($_POST);
        //     //เก็บข้อมูลลงในที่รับมาจาก form ลงใน array
        //     $data = array(
        //         'borrow_id' => $this->input->post('borrow_id'),
        //         'fine' => $data['ftcheck'],
        //         'fineType_id' => $this->input->post('fineType'),
        //         'returnDate' => $this->input->post('returnDate'),
        //         'realReturnDate' => $this->input->post('realReturnDay'),
        //         'officer_return' => $this->input->post('officer_return'),
        //     );
        //     //สร้างตัวแปลในการรับข้อมูลเข้าไปในดาต้าเบส เอาข้อมูลมาใส่ในตาราง
        //     $query=$this->db->insert('return_details',$data);
    
        //     if($query){
        //         $data = $this->Fine_models->fineTypeCheck();
        //         echo '<script type="text/javascript">alert("มีค่าปรับ '.$data.' บาท");</script>';
        //     }else{
        //         echo "<script>";
        //         echo "alert(' เพิ่มข้อมูลไม่ถูกต้อง');";
        //         echo "</script>";
        //     }
        // }

        public function updateBrstatus()
        {
            // print_r($_POST);
            //เก็บข้อมูลลงในที่รับมาจาก form ลงใน array
            $data = array(
    
                'borrowStatus_id' => 1,
                'officer_return' => $this->input->post('officer_return'),
                'realreturnDay' => $this->input->post('realreturnDay')
            );
            // เอา user_id มาเทียบว่าส่งไอดีไหมมาแก้ไข
            $this->db->where('borrow_id',$this->input->post('borrow_id'));

            //สร้างตัวแปลในการรับข้อมูลเข้าไปในดาต้าเบส เอาข้อมูลมาใส่ในตาราง
            $query=$this->db->update('borrow_return',$data);

            if($query){
                echo "<script>";
                echo "alert(' คืนหนังสือเรียบร้อย');";
                echo "</script>";
            }else{
                echo "<script>";
                echo "alert(' แก้ไขข้อมูลไม่ถูกต้อง');";
                echo "</script>";
            }
        }

        public function fineTypeCheck(){
            $input = $this->input->post('fineType');
            $fine['fine'] = $this->Fine_models->showfine1($input);
            $f = 0;
            $rate = 0;
            foreach ($fine['fine'] as $rw){
                $f = $rw->fineType_id;  
                $rate = $rw->fineRate; 
            }

            $fine = 0;
            if($input != ''){
                if($f == 1){
                    $rt_day1 = $this->input->post('returnDay');
                    $rt_day2 = $this->input->post('realreturnDay');
                    if ($rt_day1 < $rt_day2){
                        // echo "eiei";
                        // echo $date1->format("Y-m-d") . " is latest than "
                        //         . $date2->format("Y-m-d");
                        // echo $rt_day1->format("Y-m-d") . " is older than " 
                        //         . $rt_day2->format("Y-m-d")."<br>";
    
                        // $leave1 = DateTime::createFromFormat('Y-m-d', $rt_day1);
                        // $leave2 = DateTime::createFromFormat('Y-m-d', $rt_day2);
    
                        // $dateString1 = date('Y-m-d', strtotime($rt_day1));
                        // $dateString2 = date('Y-m-d', strtotime($rt_day2));
                        
                        $start1 = strtotime($rt_day1);
                        $start2 = strtotime($rt_day2);
                        // $origin = new DateTime('2020-03-15');
                        // $target = new DateTime('2020-03-08');
                        // $interval = strtotime($rt_day1)->diff(strtotime($rt_day2));//ต่างกันเท่าไหร่
                        // $interval = abs(strtotime($rt_day2) - strtotime($rt_day1));
                        // $interval = $leave2->diff($leave1);
    
                        // $interval = abs($leave2 - $leave1);
                        // echo $interval.'<br>';
                        // $xx = $interval->format('%a');//จำนวนวันที่เกิน
                        // echo $xx."<br>";
                        // echo $xx*10;
    
                        // echo $interval."<br>";
                        $countDay = ($start2 - $start1)/60/60/24;
                        // $datenow = date_diff($date1,$date2);
                        $fine = $countDay*$rate;
                        
                    }
                    // exit;
                }else if($f == 2){
                    $fine = $rate;
                }else if($f == 3){
                    $fine = $rate;
                }
                
            }
            return $fine;
        }

        public function editfine()
        {
            // print_r($_POST);
            //เก็บข้อมูลลงในที่รับมาจาก form ลงใน array
            $data = array(
                'fineType_id' => $this->input->post('fineType_id'),
                'fineType' => $this->input->post('fineType'),
                'fineRate' => $this->input->post('fineRate'),
                'fineType_Status' => $this->input->post('fineType_Status'),
            );
            // เอา user_id มาเทียบว่าส่งไอดีไหมมาแก้ไข
            $this->db->where('finetype_id',$this->input->post('fineType_id'));

            //สร้างตัวแปลในการรับข้อมูลเข้าไปในดาต้าเบส เอาข้อมูลมาใส่ในตาราง
            $query=$this->db->update('finetype',$data);
    
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

        public function editfineuser()
        {
            // print_r($_POST);
            //เก็บข้อมูลลงในที่รับมาจาก form ลงใน array
            $data = array(
                'fineStatus_id' => $this->input->post('pay'),
            );
            // เอา user_id มาเทียบว่าส่งไอดีไหมมาแก้ไข
            $this->db->where('fine_id',$this->input->post('fine_id'));

            //สร้างตัวแปลในการรับข้อมูลเข้าไปในดาต้าเบส เอาข้อมูลมาใส่ในตาราง
            $query=$this->db->update('fine',$data);
    
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

        public function finedata()
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('ft.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('finetype as ft');
            $this->db->order_by('fineType_id','desc');
            // เทียบตารางหลักกับตารางที่มา join
            //$this->db->join('finestatus as fs','fs.fineType_id =ft.fineType_id ');
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // $query ออกมาเป็น result ในกรณีที่มันมีข้อมูล ให้แสดงผลจากตารางที่เราจะนำไปใช้
            return $query->result();

        }

        public function selectNameuser()
        {
            $name = $this->input->post('name');
            if($name != ''){
                $this->db->like('name',$name,'after');
            }
            $this->db->select('u.user_id');
            $this->db->from('user as u');
            $this->db->where('u.name',$name);
            $query = $this->db->get();
            return $query->result();
            
        }

        public function read($fineType_id)
        {
            // select ข้อมูลในตารางเฉพาะตาราง user ที่ไม่มี FK
            // $this->db->select('');
            // $this->db->from('work_staff');

            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('ft.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('finetype as ft');
            // เทียบตารางหลักกับตารางที่มา join
            // $this->db->join('user as u','w.user_id=u.user_id');
            // $this->db->join('work_details as wd','w.workDetails_id=wd.workDetails_id');
            $this->db->where('ft.fineType_id',$fineType_id);
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // ใช้รูปแบบ num_rows มาใช้ในการเทียบข้อมูล
            if($query->num_rows() > 0){
                $data = $query->row();
                return $data;
            }
            return FALSE;

        }

        public function readfine($fine_id)
        {
            $this->db->select('f.*,br.*,ft.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('fine as f');
            $this->db->join('borrow_return as br','br.borrow_id=f.borrow_id');
            $this->db->join('finetype as ft','ft.fineType_id=f.fineType_id');
            $this->db->where('f.fine_id',$fine_id);
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // ใช้รูปแบบ num_rows มาใช้ในการเทียบข้อมูล
            if($query->num_rows() > 0){
                $data = $query->row();
                return $data;
            }
            return FALSE;

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

        public function showfine1($input)
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('finetype');
            $this->db->where_in('fineType_id',$input);
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // $query ออกมาเป็น result ในกรณีที่มันมีข้อมูล ให้แสดงผลจากตารางที่เราจะนำไปใช้

            return $query->result();

        }

        public function usSearchfine($user_id)
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('f.*,br.*,ft.*,fs.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('fine as f');
            $this->db->join('borrow_return as br','f.borrow_id=br.borrow_id');
            $this->db->join('finetype as ft','f.fineType_id=ft.fineType_id');
            $this->db->join('finestatus as fs','f.fineStatus_id=fs.fineStatus_id');
            $where = array('br.user_id' => $user_id, 'f.fineStatus_id' => 2);
            $this->db->where($where);
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // $query ออกมาเป็น result ในกรณีที่มันมีข้อมูล ให้แสดงผลจากตารางที่เราจะนำไปใช้

            return $query->result();

        }

        public function checkfine()
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('f.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('fine as f');
            $this->db->where_in('fineStatus_id',2);
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // $query ออกมาเป็น result ในกรณีที่มันมีข้อมูล ให้แสดงผลจากตารางที่เราจะนำไปใช้
            return $query->num_rows();

        }

        public function checkfine2()
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('f.*,br.*,ft.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('fine as f');
            $this->db->join('borrow_return as br','br.borrow_id=f.borrow_id');
            $this->db->join('finetype as ft','ft.fineType_id=f.fineType_id');
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // $query ออกมาเป็น result ในกรณีที่มันมีข้อมูล ให้แสดงผลจากตารางที่เราจะนำไปใช้
            return $query->result();
        }

        public function checkUserfine($user_id)
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('f.*,br.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('fine as f');
            $this->db->join('borrow_return as br','br.borrow_id=f.borrow_id');
            $where = array('br.user_id' => $user_id, 'f.fineStatus_id' => 2);
            $this->db->where($where);
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // $query ออกมาเป็น result ในกรณีที่มันมีข้อมูล ให้แสดงผลจากตารางที่เราจะนำไปใช้
            return $query->num_rows();

        }

        public function checkfineType($fineType)
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('ft.fineType');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('finetype as ft');
            $this->db->where('ft.fineType',$fineType);
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // $query ออกมาเป็น result ในกรณีที่มันมีข้อมูล ให้แสดงผลจากตารางที่เราจะนำไปใช้
            return $query->num_rows();

        }
    }
?>