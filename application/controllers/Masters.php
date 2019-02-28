<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 * @package MUMBAI BOARD DIGITIZATION
 * @author  Sayan Pal
 * @copyright   Copyright (c) 2018
 * @since   Version 1.0
 */
class Masters extends CI_Controller {

	 function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        //load file helper
        $this->load->helper('file');
        $this->load->model('Users_model','users_model');
        check_login();
    }

    public function index()
    {
    	$arrData['middle'] = 'master_upload';
        $this->load->view('template_new/template',$arrData);
    }

    public function upload_file()
    {
    	$this->form_validation->set_rules('project_file', '', 'callback_file_check');
        if ($this->form_validation->run() == TRUE)
        {
        	$path = 'public/uploads/';
            $this->load->library('excel');

            $config['upload_path'] = $path;
            $config['allowed_types'] = 'xlsx|xls';
            $config['remove_spaces'] = TRUE;
            
            $this->load->library('upload', $config);
            $this->upload->initialize($config);   

            if (!$this->upload->do_upload('project_file')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('project_file' => $this->upload->data());
            }
            
            if(empty($error)){
              	if (!empty($data['project_file']['file_name'])) {
                	$import_xls_file = $data['project_file']['file_name'];
              	} else {
	                $import_xls_file = 0;
	            }

	            $inputFileName = $path . $import_xls_file;
	            
	            try {
	                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
	                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
	                $objPHPExcel = $objReader->load($inputFileName);
	                $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true, true);
	                $flag = true;
	                $i=0;
	                foreach ($allDataInSheet as $value) {
		                if($flag){
		                	$flag =false;
		                    continue;
		                }
	                  
	                  	# Project array
		                $inserdata[$i]['district_id'] = $this->users_model->get_id($value['B'], 'name', 'districts_master');
		                $inserdata[$i]['city_id'] = $this->users_model->get_id($value['C'], 'name', 'cities_master');
		                
		                $csmc_date = explode("/",$value['D']);
		                $var_day = $csmc_date[0]; //day seqment
						$var_month = $csmc_date[1]; //month segment
						$var_year = $csmc_date[2]; //year segment
						$new_date_format = date('Y-m-d', strtotime("$var_year-$var_month-$var_day")); 

						$inserdata[$i]['csmc_meeting_date'] = $new_date_format;
		                $inserdata[$i]['implementing_agency'] = $value['E'];
		                $inserdata[$i]['vertical'] = $value['F'];
		                $inserdata[$i]['dpr'] = $value['G'];
		                $inserdata[$i]['EWS'] = $value['H'];
		                $inserdata[$i]['LIG'] = $value['I'];
		                $inserdata[$i]['MIG'] = $value['J'];
		                $inserdata[$i]['HIG'] = $value['K'];
		                $inserdata[$i]['total_dus'] = $value['L'];
		                if(!empty($value['M']))
		                	$inserdata[$i]['probable_date_of_completion'] = $value['M'];
		                $inserdata[$i]['is_dpr_submitted'] = ($value['N'] == 'Yes')? 1 : 0;
		                $inserdata[$i]['is_plan_approved'] = ($value['O'] == 'Yes')? 1 : 0;
		                $inserdata[$i]['is_ec_obtained'] = ($value['P'] == 'Yes')? 1 : 0;
		                $inserdata[$i]['is_tendering_completed'] = ($value['Q'] == 'Yes')? 1 : 0;
		                $inserdata[$i]['current_status_id'] = $this->users_model->get_id($value['R'], 'status', 'project_statuses_master');

		                # Insert project details
		                $result = $this->users_model->upload_project_data($inserdata[$i]);

		                # Check values are not empty
		                if(!empty($value['S']) && !empty($value['T']) && !empty($value['U']) && !empty($value['V']) && !empty($value['W'])){
		                	# Project stages log array
			                $stages_data[$i]['project_id'] = $this->users_model->last_project_id();
			                $stages_data[$i]['EWS'] = $value['S'];
			                $stages_data[$i]['LIG'] = $value['T'];
			                $stages_data[$i]['MIG'] = $value['U'];
			                $stages_data[$i]['HIG'] = $value['V'];
			                $stages_data[$i]['total_dus_work_started'] = $value['W'];
			                $stages_data[$i]['created_at'] = date('Y-m-d H:i:s');

			                # Insert project stages log
							$this->users_model->add_project_status_log($stages_data[$i]);
						}
						$i++;
		            }  
		            
		            if($result){
	                  $this->session->set_flashdata('success','Project added successfully.');
	                }else{
	                  $this->session->set_flashdata('error', $this->db->error());
	                }             
	 
	          	} catch (Exception $e) {
	               	die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' .$e->getMessage());
	            }
	        }else{
	        	$this->session->set_flashdata('error', $error['error']);
	        }
        }else{
            $error_message = array_values($this->form_validation->error_array());
            $this->session->set_flashdata('error', $error_message);
        }
        redirect('masters');
    }

    public function file_check($str)
    {
    	// $allowed_mime_type_arr = ['xls','xlsx'];
     //    $extension = pathinfo($_FILES["project_file"]["name"], PATHINFO_EXTENSION);

    	$allowed_mime_type_arr = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
        
        if(!empty($_FILES['project_file']['name']))
        {
        	if(in_array($_FILES["project_file"]["type"],$allowed_mime_type_arr)){
            	return true;
            }else{
            	$this->form_validation->set_message('file_check', 'Please select only xlsx/xls file.');
                return false;
            }
        }else{
        	$this->form_validation->set_message('file_check', 'Please choose a file to upload.');
            return false;
        }
    }
}