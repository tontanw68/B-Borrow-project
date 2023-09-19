<!-- จัดการข้อมูลผู้ใช้ -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Report_models');
    }
    public function index()
	{
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/bookRptime');	
	}
    public function bookReporttimeAdmin()
	{
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('admin/bookRptimeAdmin');	
	}
    public function index2()
	{
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/bookReport');	
	}
    public function bookRpadmin()
	{
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('admin/bookRpadmin');	
	}
    public function stReport()
	{
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/staffReport');	
	}
    public function stReportAdmin()
	{
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('admin/staffRpAdmin');	
	}

    public function fineReport()
	{
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/fineReport');	
	}

    public function borrowTime()
	{
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/borrowRpTime');	
	}
    public function borrowTimeAdmin()
	{
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('admin/borrowRpTimeAdmin');	
	}

    public function reserveTime()
	{
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/reserveRpTime');	
	}
    public function staffTime()
	{
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/staffRpTime');	
	}
    public function staffTimeAdmin()
	{
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('admin/staffRpTimeAdmin');	
	}
    public function userRp()
	{
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/userReport');	
	}
    public function userRp2()
	{
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('admin/userReport2');	
	}
    public function borrowRp()
	{
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/borrowReport');	
	}
    public function borrowReportAdmin()
	{
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('admin/borrowRpAdmin');	
	}
    public function reserveRp()
	{
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/reserveReport');	
	}
    public function reportBtype()
	{
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->bookCount();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/bookRptype',$data);	
	}

    public function reportBtype1($bookType_id)
	{
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->bookCountType1($bookType_id);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/bookRptype1',$data);	
	}

    public function reportBtypeEx()
	{
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->bookCount();
        $data['result']=$this->Report_models->bookCount1();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/bookRptype_export',$data);	
	}
    public function reportBtypeAdmin()
	{
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->bookCount();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('admin/bookRptypeAdmin',$data);	
	}

    public function reportBtypeAdmin1($bookType_id)
	{
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->bookCountType1($bookType_id);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('admin/bookRptypeAdmin1',$data);	
	}

    public function reportUst()
	{
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->userCountST();
        $data['STtotal']=$this->Report_models->userSTtotal();
        $data['STtotal1']=$this->Report_models->userSTtotal1();
        $data['STtotal2']=$this->Report_models->userSTtotal2();
        $data['Ttotal1']=$this->Report_models->userTtotal1();
        $data['Ttotal2']=$this->Report_models->userTtotal2();
        $data['Ttotal3']=$this->Report_models->userTtotal3();
        $data['allowtotal1']=$this->Report_models->allowdtotal1();
        $data['allowtotal2']=$this->Report_models->allowdtotal2();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/userRpSt',$data);	
	}

    public function reportUst1($userStatus_id)
	{
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->userCountST1($userStatus_id);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/userRpSt1',$data);	
	}

    public function reportUst_ex()
	{
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->userCountST();
        $data['result']=$this->Report_models->userCountST_ex();

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/userRpSt_export',$data);	
	}

    public function reportUstadmin()
	{
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->userCountST();
        $data['STtotal']=$this->Report_models->userSTtotal();
        $data['STtotal1']=$this->Report_models->userSTtotal1();
        $data['STtotal2']=$this->Report_models->userSTtotal2();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('admin/userRpStadmin',$data);	
	}

    public function reportUstadmin1($userStatus_id)
	{
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->userCountST1($userStatus_id);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('admin/userRpStadmin1',$data);	
	}
    
    public function reportUstadmin_ex()
	{
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->userCountST();
        $data['result']=$this->Report_models->userCountST_ex();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('admin/userRpStadmin_exp',$data);	
	}

    public function reportUtype()
	{
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->userCountType();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/userRptype',$data);	
	}

    public function reportUtype1($type_id)
	{
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->userCountType1($type_id);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/userRptype1',$data);	
	}

    public function reportUtype_ex()
	{
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->userCountType();
        $data['result']=$this->Report_models->userCountST_ex();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/userRpType_export',$data);	
	}

    public function reportUtypeadmin()
	{
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->userCountType();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('admin/userRptypeadmin',$data);	
	}

    public function reportUtypeadmin1($type_id)
	{
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->userCountType1($type_id);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('admin/userRptypeadmin1',$data);	
	}

    public function reportUtypeadmin_ex()
	{
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->userCountType();
        $data['result']=$this->Report_models->userCountST_ex();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('admin/userRptypeadmin_exp',$data);	
	}

    public function reportBauthor()
	{
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->bookCountAuthor();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/bookRpAuthor',$data);	
	}

    public function reportBauthor1($author)
	{
        //เป็นการเรียกใช้ model
        echo $author;
        exit;
        $data['query']=$this->Report_models->bookCountAuthor1($author);
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        exit;
        $this->load->view('css');
        $this->load->view('officer/bookRpAuthor1',$data);	
	}

    public function reportBauthorEx()
	{
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->bookCountAuthor();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/bookRpAuthor_exp',$data);	
	}
    public function reportBauthorAdmin()
	{
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->bookCountAuthor();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('admin/bookRpAuthorAdmin',$data);	
	}

    public function reportBtime()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->bookCounttime();
        // $data['exp1']=$this->Report_models->bookCounttimeExp1();
        // $data['exp2']=$this->Report_models->bookCounttimeExp2();
        
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/bookRptimeList',$data);	
	}
    public function reportBtimeAdmin()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->bookCounttime();        
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('admin/bookRptimeListAdmin',$data);	
	}

    public function reportBrDay()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->borrowCountDay();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/borrowRpDay',$data);	
	}
    public function reportBrDayAdmin()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->borrowCountDay();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('admin/borrowRpDayAdmin',$data);	
	}
    public function reportBrDayExp()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->borrowCountDay();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/borrowRpDay_exp',$data);	
	}

    public function reportBrDay2()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->borrowCountDay2();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/borrowRpDay',$data);	
	}
    public function reportBrDayAdmin2()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->borrowCountDay2();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('admin/borrowRpDayAdmin',$data);	
	}
    

    public function reportBrMonth()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->borrowCountMount();
        // $data['brsTT']=$this->Report_models->borrowMounttotal1();
        // $data['brsTT2']=$this->Report_models->borrowMounttotal2();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/borrowRpMonth',$data);	
	}
    public function reportBrMonthAdmin()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->borrowCountMount();
        // $data['brsTT']=$this->Report_models->borrowMounttotal1();
        // $data['brsTT2']=$this->Report_models->borrowMounttotal2();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('admin/borrowRpMonthAdmin',$data);	
	}
    public function reportBrMonthExp()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->borrowCountMount();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/borrowRpMonth_exp',$data);	
	}

    public function reportBrMonth2()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->borrowCountMount2();
        // $data['brsTT']=$this->Report_models->borrowMounttotal1();
        // $data['brsTT2']=$this->Report_models->borrowMounttotal2();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/borrowRpMonth',$data);	
	}
    public function reportBrMonthAdmin2()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->borrowCountMount2();
        // $data['brsTT']=$this->Report_models->borrowMounttotal1();
        // $data['brsTT2']=$this->Report_models->borrowMounttotal2();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('admin/borrowRpMonthAdmin',$data);	
	}

    public function reportBrYear()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->borrowCountYear();
        // $data['brYTT1']=$this->Report_models->borrowYeartotal1();
        // $data['brYTT2']=$this->Report_models->borrowYeartotal2();
        // $data['brYTT3']=$this->Report_models->borrowYeartotal3();
        // $data['brYTT4']=$this->Report_models->borrowYeartotal4();
        // $data['combined'] = array_merge($data['query'],$data['brYTT3'],$data['brYTT4']);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/borrowRpYear',$data);	
	}
    public function reportBrYearExp()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->borrowCountYear();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/borrowRpYear_exp',$data);	
	}

    public function reportBrYear2()
	{
        $bryear = $this->input->post('brYear');
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->borrowCountYear2();
        // $data['brYTT1']=$this->Report_models->borrowYeartotal1();
        // $data['brYTT2']=$this->Report_models->borrowYeartotal2();
        // $data['brYTT3']=$this->Report_models->borrowYeartotal3();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/borrowRpYear',$data);	
	}

    public function reportBrTime()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->borrowCounttime();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/borrowRpTimeList',$data);	
	}
    public function reportBrTimeAdmin()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->borrowCounttime();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('admin/borrowRpTListAdmin',$data);	
	}

    public function reportRsDay()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->reserveCountDay();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/reserveRpDay',$data);	
	}
    public function reportRsDayExp()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->reserveCountDay();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/reserveRpDay_exp',$data);	
	}

    public function reportRsDay2()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->reserveCountDay2();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/reserveRpDay',$data);	
	}

    public function reportRsMonth()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->reserveCountMount();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/reserveRpMonth',$data);	
	}
    public function reportRsMonthExp()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->reserveCountMount();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/reserveRpMonth_exp',$data);	
	}

    public function reportRsMonth2()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->reserveCountMount2();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/reserveRpMonth',$data);	
	}

    public function reportRsYears()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->reserveCountYears();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/reserveRpYears',$data);	
	}
    public function reportRsYearsExp()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->reserveCountYears();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/reserveRpYears_exp',$data);	
	}

    public function reportRsYears2()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->reserveCountYears2();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/reserveRpYears',$data);	
	}

    public function reportRsTime()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->reserveCounttime();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/reserveRpTimeList',$data);	
	}

    public function reportStDay()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->staffCountDay();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/staffRpDay',$data);	
	}
    public function reportStDayAdmin()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->staffCountDay();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('admin/staffRpDayAdmin',$data);	
	}
    public function reportStDayExp()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->staffCountDay();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/staffRpDay_exp',$data);	
	}

    public function reportStDay2()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->staffCountDay2();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/staffRpDay',$data);	
	}
    public function reportStDayAdmin2()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->staffCountDay2();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('admin/staffRpDayAdmin',$data);	
	}

    public function reportStTime()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->staffCounttime();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/staffRpTimeList',$data);	
	}
    public function reportStTimeAdmin()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->staffCounttime();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('admin/staffRpTListAdmin',$data);	
	}

    public function reportfineDay()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->fineCountDay();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/fineRpDay',$data);	
	}
    public function reportfineDayExp()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->fineCountDay();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/fineRpDay_exp',$data);	
	}

    public function reportfineDay2()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->fineCountDay2();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/fineRpDay',$data);	
	}

    public function reportfineMonth()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->fineCountMount();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/fineRpMonth',$data);	
	}
    public function reportfineMonthExp()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->fineCountMount();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/fineRpMonth_exp',$data);	
	}

    public function reportfineMonth2()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->fineCountMount2();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/fineRpMonth',$data);	
	}

    public function reportfineYears()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->fineCountYears();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/fineRpYear',$data);	
	}
    public function reportfineYearsExp()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->fineCountYears();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/fineRpYear_exp',$data);	
	}

    public function reportfineYears2()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->fineCountYears2();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/fineRpYear',$data);	
	}

    public function reportfineTime()
	{
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/fineRptime');	
	}

    public function reportfineTimelist()
	{
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit;
        //เป็นการเรียกใช้ model
        $data['query']=$this->Report_models->fineCounttime();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        $this->load->view('css');
        $this->load->view('officer/fineRptimeList',$data);	
	}


}
?>