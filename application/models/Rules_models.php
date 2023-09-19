<?php
    class Rules_models extends CI_Model{

        public function addRules()
        {
            $data = array(
                'rulesSection' => $this->input->post('rulesSection'),
                'rulesDetails' => $this->input->post('rulesDetails'),
                'rulesActive' => $this->input->post('rulesActive')
            );

            $query = $this->db->insert('rules',$data);

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

        public function showRules()
        {
            $this->db->select('r.*');
            $this->db->from('rules as r');
            $this->db->order_by('rules_id','desc');
            $query = $this->db->get();
            return $query->result();
        }

        //เอาข้อมูลออกมาเป็น record
        public function read($rules_id)
        {
            // select ข้อมูลในตาราง
            $this->db->select('r.*');
            $this->db->from('rules as r');
            $this->db->where('r.rules_id',$rules_id);
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // ใช้รูปแบบ num_rows มาใช้ในการเทียบข้อมูล
            if($query->num_rows() > 0){
                $data = $query->row();
                return $data;
            }
            return FALSE;
        }

        public function editRules()
        {
            $data = array(
                'rulesSection' => $this->input->post('rulesSection'),
                'rulesDetails' => $this->input->post('rulesDetails'),
                'rulesActive' => $this->input->post('rulesActive')
            );

            // เอา announce_id มาเทียบว่าส่งไอดีไหมมาแก้ไข
            $this->db->where('rules_id',$this->input->post('rules_id'));
        
            //สร้างตัวแปลในการรับข้อมูลเข้าไปในดาต้าเบส เอาข้อมูลมาใส่ในตาราง
            $query=$this->db->update('rules',$data);
    
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

        public function showRulesMainpage()
        {
            $this->db->select('r.*');
            $this->db->from('rules as r');
            $this->db->order_by('rules_id','desc');
            $this->db->where_in('rulesActive',1);
            $query = $this->db->get();
            return $query->result();
        }

        public function ruleActive2()
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('r.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('rules as r');
            $this->db->where_in('r.rulesActive',1);
           
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            return $query->result();
        }
    }