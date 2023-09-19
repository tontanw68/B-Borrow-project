<?php 
    class Option_models extends CI_Model{

        function typedata()
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('t.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('type as t');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->order_by('t.type_id');
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // $query ออกมาเป็น result ในกรณีที่มันมีข้อมูล ให้แสดงผลจากตารางที่เราจะนำไปใช้
            return $query->result();
        }

        function userStdata()
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('us.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('user_status as us');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->order_by('us.userStatus_id');
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // $query ออกมาเป็น result ในกรณีที่มันมีข้อมูล ให้แสดงผลจากตารางที่เราจะนำไปใช้
            return $query->result();
        }

        function allowdata()
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('al.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('allow as al');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->order_by('al.allow_id');
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // $query ออกมาเป็น result ในกรณีที่มันมีข้อมูล ให้แสดงผลจากตารางที่เราจะนำไปใช้
            return $query->result();
        }

        function bookTypedata()
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('bt.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('book_type as bt');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->order_by('bt.bookType_id');
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // $query ออกมาเป็น result ในกรณีที่มันมีข้อมูล ให้แสดงผลจากตารางที่เราจะนำไปใช้
            return $query->result();
        }

        function bookStdata()
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('bst.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('bookstatus as bst');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->order_by('bst.bookStatus_id');
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // $query ออกมาเป็น result ในกรณีที่มันมีข้อมูล ให้แสดงผลจากตารางที่เราจะนำไปใช้
            return $query->result();
        }

        function reserveStatusdata()
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('rst.*');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('reservestatus as rst');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->order_by('rst.reserveStatus_id');
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // $query ออกมาเป็น result ในกรณีที่มันมีข้อมูล ให้แสดงผลจากตารางที่เราจะนำไปใช้
            return $query->result();
        }

        function workDetaildata()
        {
            // เรียกข้อมูลจากตารางหลักกับตารางที่มา join ทั้งหมด
            $this->db->select('wd.WorkDetails,wd.WorkDetails_id');
            // ใช้ข้อมูลจากตาราง user
            $this->db->from('work_details as wd');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->order_by('wd.WorkDetails_id');
            // ใช้ตัวแปล query ในการ get ข้อมูลจากดาต้าเบส
            $query = $this->db->get();
            // $query ออกมาเป็น result ในกรณีที่มันมีข้อมูล ให้แสดงผลจากตารางที่เราจะนำไปใช้
            return $query->result();
        }

    }
?>