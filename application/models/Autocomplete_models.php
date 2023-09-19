<?php 
    class Autocomplete_models extends CI_Model{

          function Authorbook()
          {
            $this->db->select('book_id');
            $this->db->DISTINCT('book_id');
            $this->db->from('book');
            $this->db->order_by('book_id');
            $query = $this->db->get();
            $result = $query->result_array();
            return $result; 
          }

          function bookUnreturn()
          {
            $this->db->select('book_id');
            $this->db->DISTINCT('book_id');
            $this->db->from('book');
            $this->db->where_in('bookStatus_id',1);
            $this->db->order_by('book_id');
            $query = $this->db->get();
            $result = $query->result_array();
            return $result; 
          }

          function Autobook2()
          {
            $this->db->select('bookName');
            $this->db->DISTINCT('bookName');
            $this->db->from('book');
            // $this->db->order_by('book_id');
            $query = $this->db->get();
            $result = $query->result_array();
            return $result; 
          }

          function Autobook3()
          {
            $this->db->select('author');
            $this->db->DISTINCT('author');
            $this->db->from('book');
            // $this->db->order_by('book_id');
            $query = $this->db->get();
            $result = $query->result_array();
            return $result; 
          }

          function Autobook4()
          {
            $this->db->select('years');
            $this->db->DISTINCT('years');
            $this->db->from('book');
            // $this->db->order_by('book_id');
            $query = $this->db->get();
            $result = $query->result_array();
            return $result; 
          }

          function Autobook5()
          {
            $this->db->select('publisher');
            $this->db->DISTINCT('publisher');
            $this->db->from('book');
            // $this->db->order_by('book_id');
            $query = $this->db->get();
            $result = $query->result_array();
            return $result; 
          }

          function Autobook6()
          {
            $this->db->select('keyword');
            $this->db->DISTINCT('keyword');
            $this->db->from('book');
            // $this->db->order_by('book_id');
            $query = $this->db->get();
            $result = $query->result_array();
            return $result; 
          }

          function Autobook7()
          {
            $this->db->select('Section');
            $this->db->DISTINCT('Section');
            $this->db->from('book');
            // $this->db->order_by('book_id');
            $query = $this->db->get();
            $result = $query->result_array();
            return $result; 
          }

          function Autobook8()
          {
            $this->db->select('bookNumber');
            $this->db->DISTINCT('bookNumber');
            $this->db->from('book');
            // $this->db->order_by('book_id');
            $query = $this->db->get();
            $result = $query->result_array();
            return $result; 
          }

          function Autobook9()
          {
            $this->db->select('barcode');
            $this->db->DISTINCT('barcode');
            $this->db->from('book');
            // $this->db->order_by('book_id');
            $query = $this->db->get();
            $result = $query->result_array();
            return $result; 
          }

          function AutobookType1()
          {
            $this->db->select('bookType_name');
            $this->db->DISTINCT('bookType_name');
            $this->db->from('book_type');
            // $this->db->order_by('book_id');
            $query = $this->db->get();
            $result = $query->result_array();
            return $result; 
          }

          function autoBorrow1()
          {
            $this->db->select('	user_id');
            $this->db->DISTINCT('user_id');
            $this->db->from('borrow_return');
            // $this->db->order_by('borrow_id');
            $query = $this->db->get();
            $result = $query->result_array();
            return $result; 
          }

          function autoBorrow2()
          {
            $this->db->select('book_id');
            $this->db->DISTINCT('book_id');
            $this->db->from('borrow_return');
            // $this->db->order_by('borrow_id');
            $query = $this->db->get();
            $result = $query->result_array();
            return $result; 
          }

          function autoUser1()
          {
            $this->db->select('	user_id');
            $this->db->DISTINCT('user_id');
            $this->db->from('user');
            $this->db->order_by('user_id');
            $query = $this->db->get();
            $result = $query->result_array();
            return $result; 
          }

          function autoUser2()
          {
            $this->db->select('user');
            $this->db->DISTINCT('user');
            $this->db->from('user');
            // $this->db->order_by('u.user_id');
            $query = $this->db->get();
            $result = $query->result_array();
            return $result; 
          }

          function autoUser3()
          {
            $this->db->select('name');
            $this->db->DISTINCT('name');
            $this->db->from('user');
            // $this->db->order_by('user_id');
            $query = $this->db->get();
            $result = $query->result_array();
            return $result; 
          }

          function autoUser4()
          {
            $this->db->select('surename');
            $this->db->DISTINCT('surename');
            $this->db->from('user');
            // $this->db->order_by('user_id');
            $query = $this->db->get();
            $result = $query->result_array();
            return $result; 
          }

          function autoUser5()
          {
            $this->db->select('email');
            $this->db->DISTINCT('email');
            $this->db->from('user');
            // $this->db->order_by('user_id');
            $query = $this->db->get();
            $result = $query->result_array();
            return $result; 
          }

          function autoUser6()
          {
            $this->db->select('phoneNo');
            $this->db->DISTINCT('phoneNo');
            $this->db->from('user');
            // $this->db->order_by('user_id');
            $query = $this->db->get();
            $result = $query->result_array();
            return $result; 
          }

          function autousStatus1()
          {
            $this->db->select('borrowDate');
            $this->db->DISTINCT('borrowDate');
            $this->db->from('user_status');
            // $this->db->order_by('borrow_id');
            $query = $this->db->get();
            $result = $query->result_array();
            return $result; 
          }

          function autousStatus2()
          {
            $this->db->select('number');
            $this->db->DISTINCT('number');
            $this->db->from('user_status');
            // $this->db->order_by('borrow_id');
            $query = $this->db->get();
            $result = $query->result_array();
            return $result; 
          }

          function autousStatus3()
          {
            $this->db->select('userStatus_type');
            $this->db->DISTINCT('userStatus_type');
            $this->db->from('user_status');
            // $this->db->order_by('borrow_id');
            $query = $this->db->get();
            $result = $query->result_array();
            return $result; 
          }

          public function autoWorkdetails()
          {
            $this->db->select('WorkDetails');
            $this->db->DISTINCT('WorkDetails');
            $this->db->from('work_details');
            // $this->db->order_by('WorkDetails');
            $query = $this->db->get();
            $result = $query->result_array();
            return $result;
          }

          public function autoWorkdetails2()
          {
            $this->db->select('wd.*');
            $this->db->DISTINCT('wd.WorkDetails');
            $this->db->from('work_details as wd');
            // $this->db->order_by('WorkDetails');
            $query = $this->db->get();
            $result = $query->result();
            return $result;
          }

          public function autoAnnounce1()
          {
            $this->db->select('announceSection');
            $this->db->DISTINCT('announceSection');
            $this->db->from('announce');
            // $this->db->order_by('WorkDetails');
            $query = $this->db->get();
            $result = $query->result_array();
            return $result;
          }

          public function autoAnnounce2()
          {
            $this->db->select('announceDetails');
            $this->db->DISTINCT('announceDetails');
            $this->db->from('announce');
            // $this->db->order_by('WorkDetails');
            $query = $this->db->get();
            $result = $query->result_array();
            return $result;
          }

          public function autoRules1()
          {
            $this->db->select('rulesSection');
            $this->db->DISTINCT('rulesSection');
            $this->db->from('rules');
            // $this->db->order_by('WorkDetails');
            $query = $this->db->get();
            $result = $query->result_array();
            return $result;
          }

          public function autoRules2()
          {
            $this->db->select('rulesDetails');
            $this->db->DISTINCT('rulesDetails');
            $this->db->from('rules');
            // $this->db->order_by('WorkDetails');
            $query = $this->db->get();
            $result = $query->result_array();
            return $result;
          }

          public function autofinetype1()
          {
            $this->db->select('fineType');
            $this->db->DISTINCT('fineType');
            $this->db->from('finetype');
            // $this->db->order_by('WorkDetails');
            $query = $this->db->get();
            $result = $query->result_array();
            return $result;
          }

          public function autofinetype2()
          {
            $this->db->select('fineRate');
            $this->db->DISTINCT('fineRate');
            $this->db->from('finetype');
            // $this->db->order_by('WorkDetails');
            $query = $this->db->get();
            $result = $query->result_array();
            return $result;
          }

    }
?>