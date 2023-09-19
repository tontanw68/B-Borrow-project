<?php 
    class Report_models extends CI_Model{

        function bookCount()
          {
            // $this->db->select('b.bookType_id,bt.bookType_name,b.author,b.bookName,b.publisher,b.years,bs.bookStatus_id,COUNT(b.bookType_id) as bttotal,bs.*');
            $this->db->select('bt.bookType_id,bt.bookType_name,COUNT(b.bookType_id) as bttotal');
            
            $this->db->from('book as b');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('book_type as bt','b.bookType_id=bt.bookType_id');
            $this->db->join('bookstatus as bs','b.bookStatus_id =bs.bookStatus_id ');    
            // $this->db->group_by('b.book_id');
            
            // $this->db->order_by('b.bookType_id asc, b.years asc'); 
            $this->db->group_by('b.bookType_id');
            $query = $this->db->get();
            $result = $query->result();
            return $result; 
          }

          function bookCount1()
          {
            // $this->db->select('b.bookType_id,bt.bookType_name,b.author,b.bookName,b.publisher,b.years,bs.bookStatus_id,COUNT(b.bookType_id) as bttotal,bs.*');
            $this->db->select('b.*,bt.*,bs.*');
            
            $this->db->from('book as b');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('book_type as bt','b.bookType_id=bt.bookType_id');
            $this->db->join('bookstatus as bs','b.bookStatus_id =bs.bookStatus_id ');    
            // $this->db->group_by('b.book_id');
            $this->db->order_by('b.book_id','desc'); 
            // $this->db->group_by('b.bookType_id');
            $query = $this->db->get();
            $result = $query->result();
            return $result; 
          }

          function bookCountType1($bookType_id)
          {
            $this->db->select('b.*,bt.*,bs.*');
            $this->db->from('book as b');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('book_type as bt','b.bookType_id=bt.bookType_id');
            $this->db->join('bookstatus as bs','b.bookStatus_id =bs.bookStatus_id ');    
            // $this->db->group_by('b.book_id');
            $this->db->where_in('b.bookType_id',$bookType_id);
            $this->db->order_by('b.bookType_id asc, b.years asc'); 
            // $this->db->group_by('b.bookType_id');
            $query = $this->db->get();
            $result = $query->result();
            return $result; 
          }

          function bookCountAuthor()
          {
            // $this->db->select('b.author,b.bookName,b.publisher,b.years,COUNT(b.bookName) as attotal');
            $this->db->select('b.author,b.bookName,b.publisher,b.years');
            $this->db->from('book as b');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('book_type as bt','b.bookType_id=bt.bookType_id');    
            $this->db->order_by('b.years');
            // $this->db->order_by('b.author asc, b.years asc'); 
            $query = $this->db->get();
            $result = $query->result();
            return $result; 
          }

          function bookCountAuthor1($author)
          {
            $this->db->select('b.*,bt.*,bs.*');
            // $this->db->select('b.author,COUNT(b.bookName) as attotal');
            $this->db->from('book as b');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('book_type as bt','b.bookType_id=bt.bookType_id');  
            $this->db->join('bookstatus as bs','b.bookStatus_id =bs.bookStatus_id ');  

            $this->db->where('b.author',$author);
            $this->db->order_by('b.bookType_id asc, b.years asc');  
            // $this->db->group_by('b.book_id');
            // $this->db->order_by('b.author asc, b.years asc'); 
            $query = $this->db->get();
            $result = $query->result();
            return $result; 
          }

          function bookCounttime()
          {
            $ds = $this->input->post('book_s');
            $de = $this->input->post('book_e');
            // $dsnew = (int)$ds + 543;
            // $denew = (int)$de + 543;
            $this->db->select('bt.bookType_name,b.author,b.bookName,b.publisher,b.years,COUNT(b.bookName) as attotal');
            $this->db->from('book as b');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('book_type as bt','b.bookType_id=bt.bookType_id');    
            $this->db->group_by('b.book_id');
            $this->db->where('b.years >=',$ds);
            $this->db->where('b.years <=',$de);
            $this->db->order_by('b.author asc, b.years asc'); 
            $query = $this->db->get();
            $result = $query->result();
            return $result; 
          }
          // function bookCounttimeExp1()
          // {
          //   $ds = $this->input->post('book_s');
          //   $dsnew = (int)$ds + 543;
            
          //   return $dsnew;
          // }
          // function bookCounttimeExp2()
          // {
          //   $de = $this->input->post('book_e');
          //   $denew = (int)$de + 543;
            
          //   return $denew;
          // }

          function userCountST()
          {
            // $this->db->select('ut.userStatus_id,ut.userStatus_type,u.name,u.surename,u.user_id,COUNT(ut.userStatus_id) as usttotal,t.*,a.*');
            $this->db->select('ut.userStatus_id,ut.userStatus_type,COUNT(ut.userStatus_id) as usttotal');
            
            $this->db->from('user as u');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('type as t','u.type_id=t.type_id');
            $this->db->join('allow as a','u.allow_id=a.allow_id');
            $this->db->join('user_status as ut','u.userStatus_id=ut.userStatus_id');
            // $this->db->group_by('u.userStatus_id,u.user_id');
            $this->db->group_by('ut.userStatus_id');
            $query = $this->db->get();
            $result = $query->result();
            return $result; 
          }

          function userCountST_ex()
          {
            // $this->db->select('ut.userStatus_id,ut.userStatus_type,u.name,u.surename,u.user_id,COUNT(ut.userStatus_id) as usttotal,t.*,a.*');
            $this->db->select('u.*,t.*,a.*,ut.*');
            
            $this->db->from('user as u');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('type as t','u.type_id=t.type_id');
            $this->db->join('allow as a','u.allow_id=a.allow_id');
            $this->db->join('user_status as ut','u.userStatus_id=ut.userStatus_id');
            // $this->db->group_by('u.userStatus_id,u.user_id');
            // $this->db->group_by('ut.userStatus_id');
            $query = $this->db->get();
            $result = $query->result();
            return $result; 
          }

          function userCountST1($userStatus_id)
          {
            // $this->db->select('ut.userStatus_type,u.name,u.surename,u.user_id,COUNT(ut.userStatus_id) as usttotal,t.*,a.*');
            $this->db->select('u.*,t.*,a.*,ut.*');
            
            $this->db->from('user as u');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('type as t','u.type_id=t.type_id');
            $this->db->join('allow as a','u.allow_id=a.allow_id');
            $this->db->join('user_status as ut','u.userStatus_id=ut.userStatus_id');

            $this->db->where_in('u.userStatus_id',$userStatus_id);
            // $this->db->group_by('u.userStatus_id,u.user_id');
            // $this->db->group_by('ut.userStatus_id');
            $query = $this->db->get();
            $result = $query->result();
            return $result; 
          }

          function userSTtotal()
          {
            // $this->db->select('ut.userStatus_type,u.name,u.surename,COUNT(u.userStatus_id) as usttotal');
            $this->db->select('ut.userStatus_type,u.userStatus_id');
            $this->db->from('user as u');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('type as t','u.type_id=t.type_id');
            $this->db->join('allow as a','u.allow_id=a.allow_id');
            $this->db->join('user_status as ut','u.userStatus_id=ut.userStatus_id');
            // $this->db->group_by('u.userStatus_id,u.user_id');
            $STid = array('1', '2');
            $this->db->where_in('u.userStatus_id',$STid);
            // $query = $this->db->get();
            // $result = $query->result();
            $result = $this->db->count_all_results();
            return $result; 
          }

          function userSTtotal1()
          {
            // $this->db->select('ut.userStatus_type,u.name,u.surename,COUNT(u.userStatus_id) as usttotal');
            $this->db->select('ut.userStatus_type,u.userStatus_id');
            $this->db->from('user as u');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('type as t','u.type_id=t.type_id');
            $this->db->join('allow as a','u.allow_id=a.allow_id');
            $this->db->join('user_status as ut','u.userStatus_id=ut.userStatus_id');
            // $this->db->group_by('u.userStatus_id,u.user_id');
            $this->db->where('u.userStatus_id','1');
            // $query = $this->db->get();
            // $result = $query->result();
            $result = $this->db->count_all_results();
            return $result; 
          }

          function userSTtotal2()
          {
            // $this->db->select('ut.userStatus_type,u.name,u.surename,COUNT(u.userStatus_id) as usttotal');
            $this->db->select('ut.userStatus_type,u.userStatus_id');
            $this->db->from('user as u');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('type as t','u.type_id=t.type_id');
            $this->db->join('allow as a','u.allow_id=a.allow_id');
            $this->db->join('user_status as ut','u.userStatus_id=ut.userStatus_id');
            // $this->db->group_by('u.userStatus_id,u.user_id');
            $this->db->where('u.userStatus_id','2');
            // $query = $this->db->get();
            // $result = $query->result();
            $result = $this->db->count_all_results();
            return $result; 
          }

          function userTtotal1()
          {
            // $this->db->select('ut.userStatus_type,u.name,u.surename,COUNT(u.userStatus_id) as usttotal');
            $this->db->select('t.type,t.type_id');
            $this->db->from('user as u');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('type as t','u.type_id=t.type_id');
            // $this->db->group_by('u.userStatus_id,u.user_id');
            $this->db->where('u.type_id','1');
            // $query = $this->db->get();
            // $result = $query->result();
            $result = $this->db->count_all_results();
            return $result; 
          }

          function userTtotal2()
          {
            // $this->db->select('ut.userStatus_type,u.name,u.surename,COUNT(u.userStatus_id) as usttotal');
            $this->db->select('t.type,t.type_id');
            $this->db->from('user as u');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('type as t','u.type_id=t.type_id');
            // $this->db->group_by('u.userStatus_id,u.user_id');
            $this->db->where('u.type_id','2');
            // $query = $this->db->get();
            // $result = $query->result();
            $result = $this->db->count_all_results();
            return $result; 
          }

          function userTtotal3()
          {
            // $this->db->select('ut.userStatus_type,u.name,u.surename,COUNT(u.userStatus_id) as usttotal');
            $this->db->select('t.type,t.type_id');
            $this->db->from('user as u');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('type as t','u.type_id=t.type_id');
            // $this->db->group_by('u.userStatus_id,u.user_id');
            $this->db->where('u.type_id','3');
            // $query = $this->db->get();
            // $result = $query->result();
            $result = $this->db->count_all_results();
            return $result; 
          }

          function allowdtotal1()
          {
            // $this->db->select('ut.userStatus_type,u.name,u.surename,COUNT(u.userStatus_id) as usttotal');
            $this->db->select('a.allowd,a.allow_id');
            $this->db->from('user as u');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('allow as a','u.allow_id=a.allow_id');
            // $this->db->group_by('u.userStatus_id,u.user_id');
            $this->db->where('u.allow_id','1');
            // $query = $this->db->get();
            // $result = $query->result();
            $result = $this->db->count_all_results();
            return $result; 
          }

          function allowdtotal2()
          {
            // $this->db->select('ut.userStatus_type,u.name,u.surename,COUNT(u.userStatus_id) as usttotal');
            $this->db->select('a.allowd,a.allow_id');
            $this->db->from('user as u');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('allow as a','u.allow_id=a.allow_id');
            // $this->db->group_by('u.userStatus_id,u.user_id');
            $this->db->where('u.allow_id','2');
            // $query = $this->db->get();
            // $result = $query->result();
            $result = $this->db->count_all_results();
            return $result; 
          }

          function userCountType()
          {
            // $this->db->select('t.type,u.name,u.surename,u.user_id,COUNT(u.type_id) as utypetotal');
            $this->db->select('t.type,t.type_id,COUNT(u.type_id) as utypetotal');
            
            $this->db->from('user as u');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('type as t','u.type_id=t.type_id');
            $this->db->group_by('t.type_id');
            $query = $this->db->get();
            $result = $query->result();
            return $result; 
          }

          function userCountType1($type_id)
          {
            // $this->db->select('t.type,u.name,u.surename,u.user_id,COUNT(u.type_id) as utypetotal');
            $this->db->select('u.*,t.*,a.*,ut.*');
            
            $this->db->from('user as u');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('type as t','u.type_id=t.type_id');
            $this->db->join('allow as a','u.allow_id=a.allow_id');
            $this->db->join('user_status as ut','u.userStatus_id=ut.userStatus_id');
            
            $this->db->where_in('u.type_id',$type_id);
            // $this->db->group_by('t.type_id');
            $query = $this->db->get();
            $result = $query->result();
            return $result; 
          }

          function userTypetotal()
          {
            $this->db->select('t.type,u.name,u.surename,u.user_id,COUNT(u.type_id) as utypetotal');
            $this->db->from('user as u');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('type as t','u.type_id=t.type_id');
            $this->db->join('allow as a','u.allow_id=a.allow_id');
            $this->db->join('user_status as ut','u.userStatus_id=ut.userStatus_id');
            // $this->db->group_by('u.type_id,u.user_id');
            // $query = $this->db->get();
            // $result = $query->result();
            $Tid = array('1', '2','3');
            $this->db->where_in('u.userStatus_id',$Tid);
            // $query = $this->db->get();
            // $result = $query->result();
            $result = $this->db->count_all_results();
            return $result; 
          }

          function borrowCountDay()
          {
            $this->db->select('u.name,u.surename,br.officer_borrow,DATE_FORMAT(br.borrowDay,"%d/%m/%Y") as brD,DATE_FORMAT(br.returnDay,"%d/%m/%Y") as rtD,COUNT(br.borrow_id) as brDaytotal');
            // $this->db->select('br.borrowDay,COUNT(br.borrow_id) as brDaytotal');
            $this->db->from('borrow_return as br');
            $this->db->join('user as u','br.user_id=u.user_id');
            $this->db->join('book as b','br.book_id=b.book_id');
            $this->db->join('borrowstatus as bs','br.borrowStatus_id=bs.borrowStatus_id');
            $this->db->group_by('u.name,u.surename,br.officer_borrow,DATE_FORMAT(br.borrowDay,"%d/%m/%Y"),DATE_FORMAT(br.returnDay,"%d/%m/%Y")');
            // $this->db->group_by('br.borrow_id');
            $query = $this->db->get();
            $result = $query->result();
            return $result; 
          }

          function borrowCountDay2()
          {
            $brDay = $this->input->post('brDay');
            if($brDay != ''){
              $this->db->like('br.borrowDay',$brDay);
            }
            $this->db->select('u.name,u.surename,br.officer_borrow,DATE_FORMAT(br.borrowDay,"%d/%m/%Y") as brD,DATE_FORMAT(br.returnDay,"%d/%m/%Y") as rtD,COUNT(br.borrow_id) as brDaytotal');
            // $this->db->select('br.borrowDay,COUNT(br.borrow_id) as brDaytotal');
            $this->db->from('borrow_return as br');
            $this->db->join('user as u','br.user_id=u.user_id');
            $this->db->join('book as b','br.book_id=b.book_id');
            $this->db->join('borrowstatus as bs','br.borrowStatus_id=bs.borrowStatus_id');
            $this->db->group_by('u.name,u.surename,br.officer_borrow,DATE_FORMAT(br.borrowDay,"%d/%m/%Y"),DATE_FORMAT(br.returnDay,"%d/%m/%Y")');
            // $this->db->where('DATE_FORMAT(br.borrowDay,"%d/%m/%Y") >=',$brDay);
            $query = $this->db->get();
            $result = $query->result();
            return $result; 
          }

          function borrowCountMount()
          {
            $this->db->select('DATE_FORMAT(br.borrowDay,"%m/%Y") as brM,COUNT(br.borrow_id) as brMonthtotal
            ,COUNT(CASE WHEN br.borrowStatus_id = 2 THEN DATE_FORMAT(br.borrowDay,"%m/%Y") END) AS exM2
            ,COUNT(CASE WHEN br.borrowStatus_id = 1 THEN DATE_FORMAT(br.borrowDay,"%m/%Y") END) AS exM1');
            // $this->db->select('br.borrowDay,COUNT(br.borrow_id) as brDaytotal');
            $this->db->from('borrow_return as br');
            $this->db->join('user as u','br.user_id=u.user_id');
            $this->db->join('book as b','br.book_id=b.book_id');
            $this->db->join('borrowstatus as bs','br.borrowStatus_id=bs.borrowStatus_id');
            $this->db->group_by('DATE_FORMAT(br.borrowDay,"%m/%Y")');
            $query = $this->db->get();
            $result = $query->result();
            return $result; 
          }

          // function borrowMounttotal1()
          // {
          //   $this->db->select('*');
          //   // $this->db->select('br.borrowDay,COUNT(br.borrow_id) as brDaytotal');
          //   $this->db->from('borrow_return as br');
          //   $this->db->join('user as u','br.user_id=u.user_id');
          //   $this->db->join('book as b','br.book_id=b.book_id');
          //   $this->db->join('borrowstatus as bs','br.borrowStatus_id=bs.borrowStatus_id');
          //   // $this->db->group_by('DATE_FORMAT(br.borrowDay,"%m/%Y")');
          //   // $query = $this->db->get();
          //   // $result = $query->result();
          //   // return $result; 
          //   // $Tid = array('1', '2','3');
          //   $this->db->where_in('br.borrowStatus_id','1');
          //   // $query = $this->db->get();
          //   // $result = $query->result();
          //   $result = $this->db->count_all_results();
          //   return $result; 
          // }

          // function borrowMounttotal2()
          // {
          //   $this->db->select('*');
          //   // $this->db->select('br.borrowDay,COUNT(br.borrow_id) as brDaytotal');
          //   $this->db->from('borrow_return as br');
          //   $this->db->join('user as u','br.user_id=u.user_id');
          //   $this->db->join('book as b','br.book_id=b.book_id');
          //   $this->db->join('borrowstatus as bs','br.borrowStatus_id=bs.borrowStatus_id');
          //   // $this->db->group_by('DATE_FORMAT(br.borrowDay,"%m/%Y")');
          //   // $query = $this->db->get();
          //   // $result = $query->result();
          //   // return $result; 
          //   // $Tid = array('1', '2','3');
          //   $this->db->where_in('br.borrowStatus_id','2');
          //   // $query = $this->db->get();
          //   // $result = $query->result();
          //   $result = $this->db->count_all_results();
          //   return $result; 
          // }

          function borrowCountMount2()
          {
            $brMonth = $this->input->post('brMonth');
            if($brMonth != ''){
              $this->db->like('br.borrowDay',$brMonth);
            }
            $this->db->select('DATE_FORMAT(br.borrowDay,"%m/%Y") as brM,COUNT(br.borrow_id) as brMonthtotal
            ,COUNT(CASE WHEN br.borrowStatus_id = 2 THEN DATE_FORMAT(br.borrowDay,"%m/%Y") END) AS exM2
            ,COUNT(CASE WHEN br.borrowStatus_id = 1 THEN DATE_FORMAT(br.borrowDay,"%m/%Y") END) AS exM1');
            // $this->db->select('br.borrowDay,COUNT(br.borrow_id) as brDaytotal');
            $this->db->from('borrow_return as br');
            $this->db->join('user as u','br.user_id=u.user_id');
            $this->db->join('book as b','br.book_id=b.book_id');
            $this->db->join('borrowstatus as bs','br.borrowStatus_id=bs.borrowStatus_id');
            $this->db->group_by('DATE_FORMAT(br.borrowDay,"%m/%Y")');
            // $this->db->where('DATE_FORMAT(br.borrowDay,"%m/%Y") >=',$brMonth);
            $query = $this->db->get();
            $result = $query->result();
            return $result; 
          }

          function borrowCountYear()
          {
            $this->db->select('DATE_FORMAT(br.borrowDay,"%Y") as brY,COUNT(br.borrow_id) as brYeartotal
            ,COUNT(CASE WHEN br.borrowStatus_id = 2 THEN DATE_FORMAT(br.borrowDay,"%Y") END) AS ex
            ,COUNT(CASE WHEN br.borrowStatus_id = 1 THEN DATE_FORMAT(br.borrowDay,"%Y") END) AS ex1');
            // $this->db->select('br.borrowDay,COUNT(br.borrow_id) as brDaytotal');
            $this->db->from('borrow_return as br');
            $this->db->join('user as u','br.user_id=u.user_id');
            $this->db->join('book as b','br.book_id=b.book_id');
            $this->db->join('borrowstatus as bs','br.borrowStatus_id=bs.borrowStatus_id');
            $this->db->group_by('DATE_FORMAT(br.borrowDay,"%Y")');
            $query = $this->db->get();
            $result = $query->result();
            return $result; 
          }

          // function borrowYeartotal1()
          // {
          //   $this->db->select('COUNT(br.borrowStatus_id) as brYTT1');
          //   // $this->db->select('br.borrowDay,COUNT(br.borrow_id) as brDaytotal');
          //   $this->db->from('borrow_return as br');
          //   $this->db->join('user as u','br.user_id=u.user_id');
          //   $this->db->join('book as b','br.book_id=b.book_id');
          //   $this->db->join('borrowstatus as bs','br.borrowStatus_id=bs.borrowStatus_id');
          //   // $this->db->group_by('DATE_FORMAT(br.borrowDay,"%Y")');
          //   // $query = $this->db->get();
          //   // $result = $query->result();
          //   // return $result; 
          //   // $Tid = array('1', '2','3');
          //   $this->db->where_in('br.borrowStatus_id','1');
          //   // $query = $this->db->get();
          //   // $result = $query->result();
          //   $result = $this->db->count_all_results();
          //   return $result; 
          // }

          // function borrowYeartotal2()
          // {
          //   $this->db->select('br.*');
          //   // $this->db->select('br.borrowDay,COUNT(br.borrow_id) as brDaytotal');
          //   $this->db->from('borrow_return as br');
          //   $this->db->join('user as u','br.user_id=u.user_id');
          //   $this->db->join('book as b','br.book_id=b.book_id');
          //   $this->db->join('borrowstatus as bs','br.borrowStatus_id=bs.borrowStatus_id');
          //   // $this->db->group_by('DATE_FORMAT(br.borrowDay,"%Y")');
          //   // $query = $this->db->get();
          //   // $result = $query->result();
          //   // return $result; 
          //   // $Tid = array('1', '2','3');
          //   $this->db->where_in('br.borrowStatus_id','2');
          //   // $query = $this->db->get();
          //   // $result = $query->result();
          //   $result = $this->db->count_all_results();
          //   return $result; 
          // }

          // //ทดสอบ สามารถลบได้
          // function borrowYeartotal3()
          // {
            
          //   $this->db->select('YEAR(br.borrowDay) as y1,count(br.borrowStatus_id) as totalbst1');
          //   $this->db->from('borrow_return as br');
          //   $this->db->join('user as u','br.user_id=u.user_id');
          //   $this->db->join('book as b','br.book_id=b.book_id');
          //   $this->db->join('borrowstatus as bs','br.borrowStatus_id=bs.borrowStatus_id');
          //   $this->db->where('br.borrowStatus_id', 2);
          //   $this->db->group_by('YEAR(br.borrowDay)');
          //   // $this->db->having('br.borrowStatus_id',1);
          //   // $this->db->having('COUNT(`br.borrowStatus_id`)', 1);
          //   $query = $this->db->get();
          //   $result = $query->result();

          //   // $result = $this->db->count_all_results();
          //   return $result; 
          // }

          // //ทดสอบ สามารถลบได้
          // function borrowYeartotal4()
          // {
            
          //   $this->db->select('YEAR(br.borrowDay) as y2,count(br.borrowStatus_id) as totalbst2');
          //   $this->db->from('borrow_return as br');
          //   $this->db->join('user as u','br.user_id=u.user_id');
          //   $this->db->join('book as b','br.book_id=b.book_id');
          //   $this->db->join('borrowstatus as bs','br.borrowStatus_id=bs.borrowStatus_id');
          //   $this->db->where('br.borrowStatus_id', 1);
          //   $this->db->group_by('YEAR(br.borrowDay)');
          //   // $this->db->having('br.borrowStatus_id',1);
          //   // $this->db->having('COUNT(`br.borrowStatus_id`)', 1);
          //   $query = $this->db->get();
          //   $result = $query->result();

          //   // $result = $this->db->count_all_results();
          //   return $result; 
          // }

          function borrowCountYear2()
          {
            $brYear = $this->input->post('brYear');
            if($brYear != ''){
              $this->db->like('br.borrowDay',$brYear);
            }
            $this->db->select('DATE_FORMAT(br.borrowDay,"%Y") as brY,COUNT(br.borrow_id) as brYeartotal
            ,COUNT(CASE WHEN br.borrowStatus_id = 2 THEN DATE_FORMAT(br.borrowDay,"%Y") END) AS ex
            ,COUNT(CASE WHEN br.borrowStatus_id = 1 THEN DATE_FORMAT(br.borrowDay,"%Y") END) AS ex1');
            // $this->db->select('br.borrowDay,COUNT(br.borrow_id) as brDaytotal');
            $this->db->from('borrow_return as br');
            $this->db->join('user as u','br.user_id=u.user_id');
            $this->db->join('book as b','br.book_id=b.book_id');
            $this->db->join('borrowstatus as bs','br.borrowStatus_id=bs.borrowStatus_id');

            // $this->db->where_in('u.userStatus_id','1');
            $this->db->group_by('DATE_FORMAT(br.borrowDay,"%Y")');
            $query = $this->db->get();
            $result = $query->result();

            // $result = $this->db->count_all_results();
            return $result; 
          }

          function borrowCounttime()
          {
            $ds = $this->input->post('br_ds');
            $de = $this->input->post('br_de');

            $this->db->select('u.name,u.surename,b.bookName,br.*,bs.*');
            $this->db->from('borrow_return as br');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('user as u','br.user_id=u.user_id');
            $this->db->join('book as b','br.book_id=b.book_id');
            $this->db->join('borrowstatus as bs','br.borrowStatus_id=bs.borrowStatus_id');
            $this->db->where('br.borrowDay >=',$ds);
            $this->db->where('br.borrowDay <=',$de);
            // $this->db->where('br.returnDay <=',$de);
            $query = $this->db->get();
            $result = $query->result();
            return $result; 
          }

          function reserveCountDay()
          {
            $this->db->select('u.name,u.surename,b.bookName,rst.reserveStatus,DATE_FORMAT(rs.reserveDate,"%d/%m/%Y") as rsD,DATE_FORMAT(rs.receiveDate,"%d/%m/%Y") as rcD,COUNT(rs.reserveDate) as rsDaytotal');
            // $this->db->select('DATE_FORMAT(rs.reserveDate,"%d/%m/%Y") as rsD,COUNT(rs.reserveDate) as rsDaytotal');
            // $this->db->select('br.borrowDay,COUNT(br.borrow_id) as brDaytotal');
            $this->db->from('reserve as rs');
            $this->db->join('user as u','rs.user_id=u.user_id');
            $this->db->join('book as b','rs.book_id=b.book_id');
            // $this->db->join('book_type as bt','b.bookType_id=b.bookType_id');
            $this->db->join('reservestatus as rst','rs.reserveStatus_id=rst.reserveStatus_id');
            // $this->db->group_by('u.name,u.surename,b.bookName,b.bookType_id,rst.reserveStatus,bt.bookType_name,DATE_FORMAT(rs.reserveDate,"%d/%m/%Y"),DATE_FORMAT(rs.receiveDate,"%d/%m/%Y")');
            $this->db->group_by('u.name,u.surename,b.book_id,rst.reserveStatus,DATE_FORMAT(rs.reserveDate,"%d/%m/%Y"),DATE_FORMAT(rs.receiveDate,"%d/%m/%Y")');
            $this->db->order_by('DATE_FORMAT(rs.reserveDate,"%d/%m/%Y")');
            $query = $this->db->get();
            $result = $query->result();
            return $result; 
          }

          function reserveCountDay2()
          {
            $rsDay = $this->input->post('rsDay');
            if($rsDay != ''){
              $this->db->like('rs.reserveDate',$rsDay);
            }
            // $this->db->select('u.name,u.surename,b.bookName,b.bookType_name,rs.reservStatus');
            $this->db->select('u.name,u.surename,b.bookName,b.bookType_id,rst.reserveStatus,DATE_FORMAT(rs.reserveDate,"%d/%m/%Y") as rsD,DATE_FORMAT(rs.receiveDate,"%d/%m/%Y") as rcD,COUNT(rs.reserveDate) as rsDaytotal');
            $this->db->from('reserve as rs');
            $this->db->join('user as u','rs.user_id=u.user_id');
            $this->db->join('book as b','rs.book_id=b.book_id');
            // $this->db->join('book_type as bt','b.bookType_id=b.bookType_id');
            $this->db->join('reservestatus as rst','rs.reserveStatus_id=rst.reserveStatus_id');
            $this->db->group_by('u.name,u.surename,b.bookName,b.bookType_id,rst.reserveStatus,DATE_FORMAT(rs.reserveDate,"%d/%m/%Y"),DATE_FORMAT(rs.receiveDate,"%d/%m/%Y")');
            $this->db->order_by('DATE_FORMAT(rs.reserveDate,"%d/%m/%Y")');
            $query = $this->db->get();
            $result = $query->result();
            return $result; 
          }

          function reserveCountMount()
          {
            $this->db->select('u.name,u.surename,DATE_FORMAT(rs.reserveDate,"%m/%Y") as rsM,COUNT(rs.reserveDate) as rsMonthtotal
            ,COUNT(CASE WHEN rs.reserveStatus_id = 1 THEN DATE_FORMAT(rs.reserveDate,"%m/%Y") END) AS ex1
            ,COUNT(CASE WHEN rs.reserveStatus_id = 2 THEN DATE_FORMAT(rs.reserveDate,"%m/%Y") END) AS ex2
            ,COUNT(CASE WHEN rs.reserveStatus_id = 3 THEN DATE_FORMAT(rs.reserveDate,"%m/%Y") END) AS ex3');
            // $this->db->select('br.borrowDay,COUNT(br.borrow_id) as brDaytotal');
            $this->db->from('reserve as rs');
            $this->db->join('user as u','rs.user_id=u.user_id');
            $this->db->join('book as b','rs.book_id=b.book_id');
            // $this->db->join('book_type as bt','b.bookType_id=b.bookType_id');
            $this->db->join('reservestatus as rst','rs.reserveStatus_id=rst.reserveStatus_id');
            $this->db->group_by('u.user_id,DATE_FORMAT(rs.reserveDate,"%m/%Y")');
            $query = $this->db->get();
            $result = $query->result();
            return $result;
          }

          function reserveCountMount2()
          {
            $rsMonth = $this->input->post('rsMonth');
            if($rsMonth != ''){
              $this->db->like('rs.reserveDate',$rsMonth);
            }
            $this->db->select('u.name,u.surename,DATE_FORMAT(rs.reserveDate,"%m/%Y") as rsM,COUNT(rs.reserveDate) as rsMonthtotal
            ,COUNT(CASE WHEN rs.reserveStatus_id = 1 THEN DATE_FORMAT(rs.reserveDate,"%m/%Y") END) AS ex1
            ,COUNT(CASE WHEN rs.reserveStatus_id = 2 THEN DATE_FORMAT(rs.reserveDate,"%m/%Y") END) AS ex2
            ,COUNT(CASE WHEN rs.reserveStatus_id = 3 THEN DATE_FORMAT(rs.reserveDate,"%m/%Y") END) AS ex3');
            // $this->db->select('br.borrowDay,COUNT(br.borrow_id) as brDaytotal');
            $this->db->from('reserve as rs');
            $this->db->join('user as u','rs.user_id=u.user_id');
            $this->db->join('book as b','rs.book_id=b.book_id');
            $this->db->join('reservestatus as rst','rs.reserveStatus_id=rst.reserveStatus_id');
            $this->db->group_by('u.user_id,DATE_FORMAT(rs.reserveDate,"%m/%Y")');
            $query = $this->db->get();
            $result = $query->result();
            return $result;
          }

          function reserveCountYears()
          {
            $this->db->select('DATE_FORMAT(rs.reserveDate,"%Y") as rsY,COUNT(rs.reserveDate) as rsYeartotal
            ,COUNT(CASE WHEN rs.reserveStatus_id = 1 THEN DATE_FORMAT(rs.reserveDate,"%Y") END) AS ex1
            ,COUNT(CASE WHEN rs.reserveStatus_id = 2 THEN DATE_FORMAT(rs.reserveDate,"%Y") END) AS ex2
            ,COUNT(CASE WHEN rs.reserveStatus_id = 3 THEN DATE_FORMAT(rs.reserveDate,"%Y") END) AS ex3');
            // $this->db->select('br.borrowDay,COUNT(br.borrow_id) as brDaytotal');
            $this->db->from('reserve as rs');
            $this->db->join('user as u','rs.user_id=u.user_id');
            $this->db->join('book as b','rs.book_id=b.book_id');
            $this->db->join('reservestatus as rst','rs.reserveStatus_id=rst.reserveStatus_id');
            $this->db->group_by('DATE_FORMAT(rs.reserveDate,"%Y")');
            $query = $this->db->get();
            $result = $query->result();
            return $result;
          }

          function reserveCountYears2()
          {
            $rsYears = $this->input->post('rsYears');
            if($rsYears != ''){
              $this->db->like('rs.reserveDate',$rsYears);
            }
            $this->db->select('DATE_FORMAT(rs.reserveDate,"%Y") as rsY,COUNT(rs.reserveDate) as rsYeartotal
            ,COUNT(CASE WHEN rs.reserveStatus_id = 1 THEN DATE_FORMAT(rs.reserveDate,"%Y") END) AS ex1
            ,COUNT(CASE WHEN rs.reserveStatus_id = 2 THEN DATE_FORMAT(rs.reserveDate,"%Y") END) AS ex2
            ,COUNT(CASE WHEN rs.reserveStatus_id = 3 THEN DATE_FORMAT(rs.reserveDate,"%Y") END) AS ex3');
            // $this->db->select('br.borrowDay,COUNT(br.borrow_id) as brDaytotal');
            $this->db->from('reserve as rs');
            $this->db->join('user as u','rs.user_id=u.user_id');
            $this->db->join('book as b','rs.book_id=b.book_id');
            $this->db->join('reservestatus as rst','rs.reserveStatus_id=rst.reserveStatus_id');
            $this->db->group_by('DATE_FORMAT(rs.reserveDate,"%Y")');
            $query = $this->db->get();
            $result = $query->result();
            return $result;
          }

          function reserveCounttime()
          {
            $ds = $this->input->post('rs_ds');
            $de = $this->input->post('rs_de');

            $this->db->select('u.*,b.*,rs.*,rst.*');
            $this->db->from('reserve as rs');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('user as u','rs.user_id=u.user_id');
            $this->db->join('book as b','rs.book_id=b.book_id');
            $this->db->join('reservestatus as rst','rs.reserveStatus_id=rst.reserveStatus_id');
            $this->db->where('rs.reserveDate >=',$ds);
            $this->db->where('rs.reserveDate <=',$de);
            $query = $this->db->get();
            $result = $query->result();
            return $result; 
            
          }

          function staffCountDay()
          {
            $this->db->select('wd.WorkDetails,u.name,ws.workStart_time,ws.workEnd_time,DATE_FORMAT(ws.workDate,"%d/%m/%Y") as wsD,COUNT(ws.work_id) as wsDaytotal');
            // $this->db->select('br.borrowDay,COUNT(br.borrow_id) as brDaytotal');
            $this->db->from('work_staff as ws');
            $this->db->join('user as u','ws.user_id=u.user_id');
            $this->db->join('work_details as wd','ws.WorkDetails_id=wd.workDetails_id');
            $this->db->group_by('wd.WorkDetails,u.name,ws.workStart_time,ws.workEnd_time,DATE_FORMAT(ws.workDate,"%d/%m/%Y")');
            $this->db->order_by('DATE_FORMAT(ws.workDate,"%d/%m/%Y")');
            $query = $this->db->get();
            $result = $query->result();
            return $result; 
          }

          function staffCountDay2()
          {
            $stDay = $this->input->post('stDay');
            if($stDay != ''){
              $this->db->like('ws.workDate',$stDay);
            }
            $this->db->select('wd.WorkDetails,u.name,ws.workStart_time,ws.workEnd_time,DATE_FORMAT(ws.workDate,"%d/%m/%Y") as wsD,COUNT(ws.work_id) as wsDaytotal');
            // $this->db->select('wd.WorkDetails,u.name,COUNT(ws.work_id) as wsDaytotal');
            $this->db->from('work_staff as ws');
            $this->db->join('user as u','ws.user_id=u.user_id');
            $this->db->join('work_details as wd','ws.WorkDetails_id=wd.workDetails_id');
            // $this->db->group_by('wd.WorkDetails,u.name');
            $this->db->group_by('wd.WorkDetails,u.name,ws.workStart_time,ws.workEnd_time,DATE_FORMAT(ws.workDate,"%d/%m/%Y")');
            $this->db->order_by('DATE_FORMAT(ws.workDate,"%d/%m/%Y")');
            $query = $this->db->get();
            $result = $query->result();
            return $result; 
          }

          function staffCounttime()
          {
            $ds = $this->input->post('st_ds');
            $de = $this->input->post('st_de');

            $this->db->select('wd.WorkDetails,ws.*,u.*');
            $this->db->from('work_staff as ws');
            // เทียบตารางหลักกับตารางที่มา join
            $this->db->join('user as u','ws.user_id=u.user_id');
            $this->db->join('work_details as wd','ws.WorkDetails_id=wd.workDetails_id');
            $this->db->where('ws.workDate >=',$ds);
            $this->db->where('ws.workDate <=',$de);
            $query = $this->db->get();
            $result = $query->result();
            return $result; 
            
          }

          function fineCountDay()
          {
            $this->db->select('br.user_id,ft.fineType,fs.fineStatus,f.fine,DATE_FORMAT(f.fineDate,"%d/%m/%Y") as fD,COUNT(f.fine_id) as brDaytotal');
            // $this->db->select('br.borrowDay,COUNT(br.borrow_id) as brDaytotal');
            $this->db->from('fine as f');
            $this->db->join('borrow_return as br','br.borrow_id=f.borrow_id');
            $this->db->join('finetype as ft','ft.fineType_id=f.fineType_id');
            $this->db->join('finestatus as fs','fs.fineStatus_id=f.fineStatus_id');
            $this->db->group_by('br.user_id,ft.fineType,fs.fineStatus,f.fine,DATE_FORMAT(f.fineDate,"%d/%m/%Y")');
            // $this->db->group_by('br.borrow_id');
            $query = $this->db->get();
            $result = $query->result();
            return $result; 
          }

          function fineCountDay2()
          {
            $fineDay = $this->input->post('fineDay');
            if($fineDay != ''){
              $this->db->like('f.fineDate',$fineDay);
            } 
            $this->db->select('br.user_id,ft.fineType,fs.fineStatus,f.fine,DATE_FORMAT(f.fineDate,"%d/%m/%Y") as fD,COUNT(f.fine_id) as brDaytotal');
            // $this->db->select('br.borrowDay,COUNT(br.borrow_id) as brDaytotal');
            $this->db->from('fine as f');
            $this->db->join('borrow_return as br','br.borrow_id=f.borrow_id');
            $this->db->join('finetype as ft','ft.fineType_id=f.fineType_id');
            $this->db->join('finestatus as fs','fs.fineStatus_id=f.fineStatus_id');
            $this->db->group_by('br.user_id,ft.fineType,fs.fineStatus,f.fine,DATE_FORMAT(f.fineDate,"%d/%m/%Y")');
            // $this->db->group_by('br.borrow_id');
            $query = $this->db->get();
            $result = $query->result();
            return $result; 
          }

          function fineCountMount()
          {
            $this->db->select('ft.fineType,f.fineType_id,DATE_FORMAT(f.fineDate,"%m/%Y") as fM,COUNT(f.fineDate) as fMonthtotal
            ,COUNT(CASE WHEN f.fineType_id = 1 THEN DATE_FORMAT(f.fineDate,"%m/%Y") END) AS ex1
            ,COUNT(CASE WHEN f.fineType_id = 2 THEN DATE_FORMAT(f.fineDate,"%m/%Y") END) AS ex2
            ,COUNT(CASE WHEN f.fineType_id = 3 THEN DATE_FORMAT(f.fineDate,"%m/%Y") END) AS ex3');
            // $this->db->select('br.borrowDay,COUNT(br.borrow_id) as brDaytotal');
            $this->db->from('fine as f');
            $this->db->join('borrow_return as br','br.borrow_id=f.borrow_id');
            $this->db->join('finetype as ft','ft.fineType_id=f.fineType_id');
            $this->db->join('finestatus as fs','fs.fineStatus_id=f.fineStatus_id');
            $this->db->group_by('ft.fineType,f.fineType_id,DATE_FORMAT(f.fineDate,"%m/%Y")');
            $query = $this->db->get();
            $result = $query->result();
            return $result;
          }

          function fineCountMount2()
          {
            $fineMonth = $this->input->post('fineMonth');
            if($fineMonth != ''){
              $this->db->like('f.fineDate',$fineMonth);
            }
            $this->db->select('ft.fineType,f.fineType_id,DATE_FORMAT(f.fineDate,"%m/%Y") as fM,COUNT(f.fineDate) as fMonthtotal
            ,COUNT(CASE WHEN f.fineType_id = 1 THEN DATE_FORMAT(f.fineDate,"%m/%Y") END) AS ex1
            ,COUNT(CASE WHEN f.fineType_id = 2 THEN DATE_FORMAT(f.fineDate,"%m/%Y") END) AS ex2
            ,COUNT(CASE WHEN f.fineType_id = 3 THEN DATE_FORMAT(f.fineDate,"%m/%Y") END) AS ex3');
            // $this->db->select('br.borrowDay,COUNT(br.borrow_id) as brDaytotal');
            $this->db->from('fine as f');
            $this->db->join('borrow_return as br','br.borrow_id=f.borrow_id');
            $this->db->join('finetype as ft','ft.fineType_id=f.fineType_id');
            $this->db->join('finestatus as fs','fs.fineStatus_id=f.fineStatus_id');
            $this->db->group_by('ft.fineType,f.fineType_id,DATE_FORMAT(f.fineDate,"%m/%Y")');
            $query = $this->db->get();
            $result = $query->result();
            return $result;
          }

          function fineCountYears()
          {
            $this->db->select('ft.fineType,f.fineType_id,DATE_FORMAT(f.fineDate,"%Y") as fY,COUNT(f.fineDate) as fYearstotal
            ,COUNT(CASE WHEN f.fineType_id = 1 THEN DATE_FORMAT(f.fineDate,"%Y") END) AS ex1
            ,COUNT(CASE WHEN f.fineType_id = 2 THEN DATE_FORMAT(f.fineDate,"%Y") END) AS ex2
            ,COUNT(CASE WHEN f.fineType_id = 3 THEN DATE_FORMAT(f.fineDate,"%Y") END) AS ex3');
            // $this->db->select('br.borrowDay,COUNT(br.borrow_id) as brDaytotal');
            $this->db->from('fine as f');
            $this->db->join('borrow_return as br','br.borrow_id=f.borrow_id');
            $this->db->join('finetype as ft','ft.fineType_id=f.fineType_id');
            $this->db->join('finestatus as fs','fs.fineStatus_id=f.fineStatus_id');
            $this->db->group_by('ft.fineType,f.fineType_id,DATE_FORMAT(f.fineDate,"%Y")');
            $query = $this->db->get();
            $result = $query->result();
            return $result;
          }

          function fineCountYears2()
          {
            $fineYears = $this->input->post('fineYear');
            if($fineYears != ''){
              $this->db->like('fineDate',$fineYears);
            }
            $this->db->select('ft.fineType,f.fineType_id,DATE_FORMAT(f.fineDate,"%Y") as fY,COUNT(f.fineDate) as fYearstotal
            ,COUNT(CASE WHEN f.fineType_id = 1 THEN DATE_FORMAT(f.fineDate,"%Y") END) AS ex1
            ,COUNT(CASE WHEN f.fineType_id = 2 THEN DATE_FORMAT(f.fineDate,"%Y") END) AS ex2
            ,COUNT(CASE WHEN f.fineType_id = 3 THEN DATE_FORMAT(f.fineDate,"%Y") END) AS ex3');
            // $this->db->select('br.borrowDay,COUNT(br.borrow_id) as brDaytotal');
            $this->db->from('fine as f');
            $this->db->join('borrow_return as br','br.borrow_id=f.borrow_id');
            $this->db->join('finetype as ft','ft.fineType_id=f.fineType_id');
            $this->db->join('finestatus as fs','fs.fineStatus_id=f.fineStatus_id');
            $this->db->group_by('ft.fineType,f.fineType_id,DATE_FORMAT(f.fineDate,"%Y")');
            $query = $this->db->get();
            $result = $query->result();
            return $result;
          }

          function fineCounttime()
          {
            $fine_ds = $this->input->post('fine_ds');
            $fine_de = $this->input->post('fine_de');

            $this->db->select('br.user_id,ft.fineType,fs.fineStatus,f.fine,f.fineDate');
            // $this->db->select('br.borrowDay,COUNT(br.borrow_id) as brDaytotal');
            $this->db->from('fine as f');
            $this->db->join('borrow_return as br','br.borrow_id=f.borrow_id');
            $this->db->join('finetype as ft','ft.fineType_id=f.fineType_id');
            $this->db->join('finestatus as fs','fs.fineStatus_id=f.fineStatus_id');
            $this->db->group_by('br.user_id,ft.fineType,fs.fineStatus,f.fine,f.fineDate');
            $this->db->where('f.fineDate >=',$fine_ds);
            $this->db->where('f.fineDate <=',$fine_de);
            $query = $this->db->get();
            $result = $query->result();
            return $result; 
            
          }
    }
?>