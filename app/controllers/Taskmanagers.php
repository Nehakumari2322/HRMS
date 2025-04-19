<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of User
 *
 * @author Software Development Wing <Penta Head Private Ltd.>
 */
class taskmanagers extends Controller{
    public function __construct() {
       // echo 'Agents construct';
        $this->taskmanagermodel = $this->model('taskmanager');
        $this->CommonModel = $this->model('common');
        $todaysDate = null;
    }
 

    public function sidebar(){
        if(isset($_POST['dashboard'])){
            $data = $this->getDashboardUnit();
            $currentDate = date('Y-m-d');

            // Last week's date range (from 7 days ago to today)
            $lastWeekStartDate = date('Y-m-d', strtotime('-7 days'));
            $lastWeekEndDate = $currentDate;

            // Last month's date range (from 1 month ago to today)
            $lastMonthStartDate = date('Y-m-d', strtotime('-1 month'));
            $lastMonthEndDate = $currentDate;

            $graphData = $this->taskmanagermodel->getLeadsDataLastWeek();
               // Make sure to pass the data to the view
            $adata = [
                'graphData' => $graphData, // Send data to view
                'lastWeekStartDate' => $lastWeekStartDate,
                'lastWeekEndDate' => $lastWeekEndDate,
                // Other data you need
            ];

            $LastMonthgraphData = $this->taskmanagermodel->getGraphDataOfLastMonth();
            $allLeads = $this->taskmanagermodel->getOverallLeadsData();
            $ndata = $this->getAllClientRecord();
         
            $mdata = [
                'lastmonthgraphData' => $LastMonthgraphData, // Send data to view
                'overAllData' => $allLeads,
                'lastMonthStartDate' => $lastMonthStartDate,
                'lastMonthEndDate' => $lastMonthEndDate,
                // Other data you need
            ];

           
            $this->view('cmr_all_page/main', $data, $adata, $mdata,$ndata);
        
         
        }
        else if(isset($_POST['users'])){
            $data = $this->taskmanagermodel->getAllUserDetails();
            $this->view('cmr_all_page/user',$data);
        }
        else if(isset($_POST['project'])){
            $data = $this->taskmanagermodel->getAllProjectDetails();
            $adata = $this->taskmanagermodel->getAllClientDetails();            
            $this->view('cmr_all_page/project',$data,$adata);
        }
        else if(isset($_POST['client'])){
            $data = $this->taskmanagermodel->getAllClientDetails();
            $this->view('cmr_all_page/client',$data);
        }
        else if(isset($_POST['lead'])){
            $data = $this->taskmanagermodel->getprojectandclient();
            $adata = $this->taskmanagermodel->getLeadDetails();
            $ndata = $this->taskmanagermodel->getAllClientDetails();
            $rdata = $this->taskmanagermodel->getUserDetails();
            $this->view('cmr_all_page/lead',$data,$adata,$mdata,$ndata,$rdata);
        }
        else if(isset($_POST['leadrule'])){
            $data = $this->taskmanagermodel->getProjectDetails();
            $adata = $this->taskmanagermodel->getAssignmentRule();
            $this->view('cmr_all_page/leadrule',$data,$adata);
        }
        else if(isset($_POST['whatsapprule'])){
            $data = $this->taskmanagermodel->getWhatsappRule();
            $mdata = $this->taskmanagermodel->getProjectDetails();
            $adata['message'] = null;
            if($data == null){
                $adata['message'] = " No WhatsApp Rule Found ";
            }
            $this->view('cmr_all_page/whastsapprule',$data,$adata,$mdata);
        }
        else if(isset($_POST['audit'])){
            $this->view('cmr_all_page/audit');
        }
        else if(isset($_POST['call'])){
            $this->view('cmr_all_page/callreport');
        }
        else if(isset($_POST['leadreport'])){
            $this->view('cmr_all_page/leadreport');
        }
    }

    public function getAllClientRecord(){
        $data1 = $this->taskmanagermodel->clientRecordOfWeekly();
        $data2 = $this->taskmanagermodel->clientRecordOfMonthly();
        $data3 = $this->taskmanagermodel->clientTotalRecord();
        $ndata['weekly'] = $data1->count;
        $ndata['monthly'] = $data2->count; 
        $ndata['total'] = $data3->count;
        return $ndata; 
    }

    public function getDashboardUnit(){
        $data1 = $this->taskmanagermodel->getAllUserDetails();
        $data2 = $this->taskmanagermodel->getprojectandclient();
        $data3 = $this->taskmanagermodel->getAllClientDetails();
        $data4 = $this->taskmanagermodel->getAllLeadDetails();
        $data['user'] = count($data1);
        $data['project'] = count($data2);
        $data['client'] = count($data3);
        $data['lead'] = count($data4);
        return $data;
    }

    public function navform(){
        if(isset($_POST['homebtn'])){
            $data = $this->getDashboardUnit();
            $this->view('cmr_all_page/main',$data);
        }
        else if(isset($_POST['logout'])){
           $this->logout();
            $this->view('commons/main');
        }   
    }

    public function createUser(){
        if(isset($_POST['submit'])){
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $membertype = trim($_POST['membertype']);
            $assign = trim($_POST['assign']);
            $admin = trim($_POST['admin']);
            $member_of = trim($_POST['member_of']);
            $creates_ts =  $this->getCurrentTs();
            $created_by = $_SESSION['userid'];
            $lastUpdatedBy = $_SESSION['userid'];
            $lastUpdatedTs = $this->getCurrentTs();
            $adata['message']= null;
            $id = $this->taskmanagermodel->insertUserDetails($name,$email,$membertype,$assign,$admin,$member_of,$creates_ts,$created_by,$lastUpdatedBy,$lastUpdatedTs);
            if($id != null){
                $adata['message'] = "User has been created !!";
            }
           $data = $this->taskmanagermodel->getAllUserDetails();
           $this->view('cmr_all_page/user',$data,$adata);
        }
    }

    public function addClientDetails(){
        if(isset($_POST['submit'])){
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $phone = trim($_POST['number']);
            $creates_ts =  $this->getCurrentTs();
            $created_by = $_SESSION['userid'];
            $lastUpdatedBy = $_SESSION['userid'];
            $lastUpdatedTs = $this->getCurrentTs();
            $adata['message']= null;
            $id = $this->taskmanagermodel->insertClientDetails($name,$creates_ts,$created_by,$lastUpdatedBy,$lastUpdatedTs);
            $ID = $this->taskmanagermodel->insertClientPersonal($id,$email,$phone, $creates_ts, $created_by, $lastUpdatedBy, $lastUpdatedTs);
            if($id != null && $ID != null){
                $adata['message'] = "Client has been created !!";
            }
           $data = $this->taskmanagermodel->getAllClientDetails();
           $this->view('cmr_all_page/client',$data,$adata);
        }
    }

    public function createProject(){
        if(isset($_POST['submit'])){
            $cid = trim($_POST['cid']);
            $p_name = trim($_POST['pname']);
            $status = trim($_POST['status']);
            $creates_ts =  $this->getCurrentTs();
            $created_by = $_SESSION['userid'];
            $lastUpdatedBy =$_SESSION['userid'];
            $lastUpdatedTs = $this->getCurrentTs();
            $url =  trim($_POST['url']);
            $mdata['message']= null;
          
            $Id = $this->taskmanagermodel->insertProjectDetails($cid, $p_name, $status,$url, $created_by, $creates_ts, $lastUpdatedBy, $lastUpdatedTs);
            if($Id != null){
                $mdata['message'] = "Project has been created !!";
            }          
           
            $data = $this->taskmanagermodel->getAllProjectDetails();
            $adata = $this->taskmanagermodel->getAllClientDetails();            
            $this->view('cmr_all_page/project',$data,$adata,$mdata);
        }
    }

    public function createLead(){
        if(isset($_POST['submit'])){
            $pid = trim($_POST['pid']);
            $l_name = trim($_POST['lname']);
            $email = trim($_POST['email']);
            $phone = trim($_POST['phone']);
            $status = trim($_POST['status']);
            $source = trim($_POST['source']); 
            $vendor_remark = trim($_POST['vendor']); 
            $client_remark = trim($_POST['client']);
            $vendor_name = trim($_POST['vendor_name']);
            $requirement = trim($_POST['requi']);
            $created_ts =  $this->getCurrentTs();
            $created_by = $_SESSION['userid'];
            $lastUpdatedBy = $_SESSION['userid'];
            $lastUpdatedTs = $this->getCurrentTs();
            $mdata['message']= null;
            $id = $this->taskmanagermodel->insertLeadDetails($pid,$l_name,$email,$phone,$status,$source,$vendor_remark,$client_remark,$vendor_name,$requirement,$created_ts,$created_by,$lastUpdatedBy,$lastUpdatedTs);
            if($id != null){
                $mdata['message'] = "Lead has been created !!";
            }
            $data = $this->taskmanagermodel->getprojectandclient();
            $adata = $this->taskmanagermodel->getLeadDetails();
            $this->view('cmr_all_page/lead',$data,$adata,$mdata);
        }
    }

    public function leadfilter(){
        if(isset($_POST['search'])){
            $client_id = trim($_POST['cid']);
            
            $project_id = trim($_POST['pid']);
          
            $status = trim($_POST['status']);
          
            $vendor = trim($_POST['vendor']);
            echo $vendor;
            $mdata['message']= null;
            if($client_id && $project_id=="" && $status=="" && $vendor=="" ){
                // echo"in client";
                $adata = $this->taskmanagermodel->getLeadDetailsWithClient($client_id);
                if($adata == null){
                    $mdata['message'] = "Lead not exist !!";
                }
            }
            else if($client_id=="" && $project_id && $status=="" && $vendor==""){
                // echo"in project";
                $adata = $this->taskmanagermodel->getLeadDetailsWithProject($project_id);
                if($adata == null){
                    $mdata['message'] = "Lead not exist !!";
                }
            }
            else if($client_id=="" && $project_id=="" && $status && $vendor==""){
                // echo"in status";
                $adata = $this->taskmanagermodel->getLeadDetailsWithStatus($status);
                if($adata == null){
                    $mdata['message'] = "Lead not exist !!";
                }
            }
            else if($vendor && $client_id=="" && $project_id=="" && $status=="" ){
                // echo"in vendor";
                $sdata ="Assigned to ".$vendor;
                $adata = $this->taskmanagermodel->getLeadDetailsWithVendor($vendor);
                $sdata ="Assigned to ".$vendor;
                if($adata == null){
                    $mdata['message'] = "Lead not exist !!";
                }
            }
            else if($client_id && $project_id && $status == "" && $vendor ==""){
                // echo"in CLIENT AND PROJECT";
                $adata = $this->taskmanagermodel->getLeadDetailsWithClientAndProject($client_id,$project_id);
                if($adata == null){
                    $mdata['message'] = "Lead not exist !!";
                }
            }

            else if($client_id && $project_id && $status && $vendor ==""){
                // echo"in CLIENT AND PROJECT with status";
                $adata = $this->taskmanagermodel->getLeadDetailsWithClientAndProjectAndStatus($client_id,$project_id,$status);
                if($adata == null){
                    $mdata['message'] = "Lead not exist !!";
                }
            }

            else if($client_id && $project_id && $status && $vendor){
                // echo"in CLIENT AND PROJECT with status and vendor";
                $adata = $this->taskmanagermodel->getLeadDetailsWithClientAndProjectAndStatusAndVendor($client_id,$project_id,$status,$vendor);
                if($adata == null){
                    $mdata['message'] = "Lead not exist !!";
                }
            }

            else{
                echo"else";
            }

           
        }
        $data = $this->taskmanagermodel->getprojectandclient();
        $ndata = $this->taskmanagermodel->getAllClientDetails();
        $rdata = $this->taskmanagermodel->getUserDetails();
        $this->view('cmr_all_page/lead',$data,$adata,$mdata,$ndata,$rdata,$sdata);

    }

    public function takeMeToProjectList(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);    
            $totalcount = trim($_POST['totalcount']);
            for ($count = 0; $count < $totalcount; $count++) {
                if (isset($_POST['projectCount'.$count])) {
                    $client_id = trim($_POST['client_id'.$count]);
                    $data = $this->taskmanagermodel->getprojectlist($client_id);
                    $this->view('cmr_all_page/projectlist', $data);
                  
                }
                else if(isset($_POST['projectName'.$count])){
                    $client_id = trim($_POST['client_id'.$count]);
                    $data = $this->taskmanagermodel->getprojectlistAndLeadCounte2($client_id);
                    $this->view('cmr_all_page/projectDetailsList', $data);
                }
            }
        }
    }

    public function leadDetails(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);    
            $totalcount = trim($_POST['totalcount']);
            for ($count = 0; $count < $totalcount; $count++) {
                if (isset($_POST['lead_name'.$count])) {
                    $lead_id = trim($_POST['lead_id'.$count]);
                    $data = $this->taskmanagermodel->getLeadDetailsOfId($lead_id);
                    $mdata = $this->taskmanagermodel->getUserDetails();
                    $this->view('cmr_all_page/leadDetails', $data,$adata,$mdata);
                    return; 
                }
                if (isset($_POST['update'.$count])) {
                    $lead_id = trim($_POST['lead_id'.$count]);
                    $status = trim($_POST['status'.$count]);
                    $lastUpdatedBy = $_SESSION['userid'];
                    $lastUpdatedTs = $this->getCurrentTs(); 
                    $mdata['message'] = null;
                    $Id = $this->taskmanagermodel->updateStatusOfLead($lead_id, $status, $lastUpdatedTs, $lastUpdatedBy);
                    if ($Id) {
                        $mdata['message'] = "Status Updated Successfully !!";
                    }
                    $data = $this->taskmanagermodel->getprojectandclient();
                    $adata = $this->taskmanagermodel->getLeadDetails();
                    $ndata = $this->taskmanagermodel->getAllClientDetails();
                    $this->view('cmr_all_page/lead', $data, $adata, $mdata, $ndata);
                    return; 
                }
                // Handle edit and delete similarly
                if (isset($_POST['edit'.$count])) {
                    // Handle edit functionality here
                    $lead_id = trim($_POST['lead_id'.$count]);
                    $client_remark = trim($_POST['client_remark'.$count]);
                    $lastUpdatedBy = $_SESSION['userid'];
                    $lastUpdatedTs = $this->getCurrentTs(); 
                    $mdata['message'] = null;
                    $id = $this->taskmanagermodel->updateClientRemark($lead_id,$client_remark,$lastUpdatedBy,$lastUpdatedTs);
                    if ($id) {
                        $mdata['message'] = "Client Remark Updated Successfully !!";
                    }
                    $data = $this->taskmanagermodel->getprojectandclient();
                    $adata = $this->taskmanagermodel->getLeadDetails();
                    $ndata = $this->taskmanagermodel->getAllClientDetails();
                    $this->view('cmr_all_page/lead', $data, $adata, $mdata, $ndata);
                    return; 
                }
    
                if (isset($_POST['delete'.$count])) {
                    // Handle delete functionality here
                }
            }
        }
    }
    
    public function createLeadRule(){
        if(isset($_POST['login'])){
            $rule = trim($_POST['rule']);
            $p_id = trim($_POST['pid']);
            $created_ts =  $this->getCurrentTs();
            $created_by = $_SESSION['userid'];
            $id = $this->taskmanagermodel->getStatus($p_id);
            $lastUpdatedTs = $this->getCurrentTs();
            $lastUpdatedBy =$_SESSION['userid'];
            $mdata['message'] = null;
            $data = $this->taskmanagermodel->insertAssignmentRule($p_id,$rule,$id->status,$created_ts,$created_by,$lastUpdatedTs,$lastUpdatedBy);
            if($data != null){
                $mdata['message'] = "Assignment Rule Created for the Project ".$id->name;
            }
            $data = $this->taskmanagermodel->getProjectDetails();
            $adata = $this->taskmanagermodel->getAssignmentRule();
            $this->view('cmr_all_page/leadrule',$data,$adata,$mdata);

        }
    }
    
    public function createMessage(){
        if(isset($_POST['submit'])){
            $message = trim($_POST['message']);
            $p_id = trim($_POST['pid']);
            $created_ts =  $this->getCurrentTs();
            $created_by = $_SESSION['userid'];
            $lastUpdatedTs = $this->getCurrentTs();
            $lastUpdatedBy = $_SESSION['userid'];
            $adata['message'] = null;
            $data1 = $this->taskmanagermodel->insertWhatsappRule($p_id,$message,$created_ts,$created_by,$lastUpdatedTs,$lastUpdatedBy);
            if($data1 != null){
                $adata['message'] = "Whatsapp Rule Created Successfully !!";
            }
            $data = $this->taskmanagermodel->getWhatsappRule();
            $mdata = $this->taskmanagermodel->getProjectDetails();
            $this->view('cmr_all_page/whastsapprule',$data,$adata,$mdata);

        }
    }


    public function updateLeadAssignedTo(){
        if(isset($_POST['submit'])){
            $l_id = trim($_POST['leadId']);
            $assignto = trim($_POST['vendor_name']);
            $lastUpdatedTs = $this->getCurrentTs();
            $lastUpdatedBy = $_SESSION['userid'];
            $adata['message'] = null;
            $data = $this->taskmanagermodel->updateVendorName($l_id,$assignto,$lastUpdatedTs,$lastUpdatedBy);
            if($data != null){
                $adata['message'] =" updated Succesfully !!";
            }
            $data = $this->taskmanagermodel->getLeadDetailsOfId($l_id);
            $mdata = $this->taskmanagermodel->getUserDetails();
            $this->view('cmr_all_page/leadDetails', $data,$adata,$mdata);
          
        }
    }



    public function uploadLeads() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit']) ) {
            $file = $_FILES['file']['tmp_name'];
    
            if (($handle = fopen($file, "r")) !== FALSE) {
                fgetcsv($handle); // Skip header row
    
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $pid = trim($_POST['pid']);
                    $l_name = trim($data[1]);
                    $email = trim($data[2]);
                    $phone = trim($data[3]);
                    $status = trim($data[4]);
                    $source = trim($data[5]);
                    $requirement = trim($data[6]);
                    $vendor_remark = trim($data[7]);
                    $client_remark = 'null';
                    $vendor_name = trim($_POST['vendor_name']);
                    $created_ts = $this->getCurrentTs();
                    $created_by = $_SESSION['userid'];
                    $lastUpdatedBy = $_SESSION['userid'];
                    $lastUpdatedTs = $this->getCurrentTs();
    
                    $id = $this->taskmanagermodel->insertLeadDetails($pid, $l_name, $email, $phone, $status, $source, $vendor_remark, $client_remark, $vendor_name, $requirement, $created_ts, $created_by, $lastUpdatedBy, $lastUpdatedTs );
    
                    if ($id) {
                        $mdata['message'] = "Lead has been created successfully!";
                    } else {
                        $mdata['message'] = "Error: Unable to create lead.";
                    }
                }
    
                $data = $this->taskmanagermodel->getprojectandclient();
                $adata = $this->taskmanagermodel->getLeadDetails();
                $this->view('cmr_all_page/lead', $data, $adata, $mdata);
            } else {
                $mdata['message'] = "Error: File could not be opened.";
                $data = $this->taskmanagermodel->getprojectandclient();
                $adata = $this->taskmanagermodel->getLeadDetails();
                $this->view('cmr_all_page/lead', $data, $adata, $mdata);
            }
        }
    }
    

    public function logout(){

        unset($_SESSION['userid']);
        unset($_SESSION['username']);
        unset($_SESSION['loggedin']);
        session_destroy();
        // redirect('users/login');
    }
    // end
 
}
