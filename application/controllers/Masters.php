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

	                foreach ($allDataInSheet as $key => $value) {
                        if ($key > 3) {
                            if(strlen($value['C']) == 0)
                            {
                                continue;
                            }

                        # Project array
                        $inserdata[$i]['district_id'] = $this->users_model->get_id_district_city(preg_replace('/\s+/', ' ',$value['C']), 'name', 'districts_master');
                        $inserdata[$i]['district_id'] =  $inserdata[$i]['district_id'] ? $inserdata[$i]['district_id']->id: '';

		                $inserdata[$i]['city_id'] = $this->users_model->get_id_district_city(preg_replace('/\s+/', ' ',$value['D']), 'name', 'cities_master');
                        $inserdata[$i]['city_id'] =  $inserdata[$i]['city_id'] ? $inserdata[$i]['city_id']->id: '';


//                        $csmc_dt =    preg_split('/\s+/',$value['G']);
//                        echo "<pre>"; print_r($csmc_dt);die;
//                        $csmc_date = explode(",", $csmc_dt[1]);
//                        $var_day = $csmc_date[0]; //day seqment
//                        $var_month = $csmc_date[1]; //month segment
//                        $var_year = $csmc_date[2]; //year segment
//                        $new_date_format = date('Y-m-d', strtotime("$var_year-$var_month-$var_day"));
//                        $inserdata[$i]['csmc_meeting_date'] = $new_date_format;
//                        $inserdata[$i]['csmc_meeting_no'] = $csmc_dt[0];

                        if(!empty($value['G'])){
                            $csmc_no_dt =    explode('/',$value['G']);
                            $inserdata[$i]['csmc_meeting_no'] = isset($csmc_no_dt[0])? explode(",",$csmc_no_dt[0]):'--';
                            $inserdata[$i]['csmc_meeting_date'] =  isset($csmc_no_dt[1]) ?explode(",",$csmc_no_dt[1]) :'0000-00-00';
                        }

                        if(!empty($value['E'])){
                                $slac_no_dt = explode('/', $value['E']);
                                $inserdata[$i]['slac_meeting_no'] = isset($slac_no_dt[0]) ?  explode(",", $slac_no_dt[0]):'---';
                                $inserdata[$i]['slac_meeting_date'] = isset($slac_no_dt[1]) ? explode(",", $slac_no_dt[1]):'0000-00-00';
                        }

                        if(!empty($value['F'])) {
                                $slsmc_no_dt = explode('/', $value['F']);
                                $inserdata[$i]['slsmc_meeting_no'] = isset($slsmc_no_dt[0]) ? explode(",", $slsmc_no_dt[0]):'---';
                                $inserdata[$i]['slsmc_meeting_date'] =isset($slsmc_no_dt[1]) ? explode(",", $slsmc_no_dt[1]):'0000-00-00';
                        }

                        /*                        $slac_dt = preg_split('/\s+/',$value['E']);
                        $slac_date = explode("-", $slac_dt[1]);
                        $slac_day = $slac_date[0]; //day seqment
                        $slac_month = $slac_date[1]; //month segment
                        $slac_year = $slac_date[2]; //year segment
                        $slac_date_format = date('Y-m-d', strtotime("$slac_year-$slac_month-$slac_day"));
                        $inserdata[$i]['slac_meeting_date'] = $slac_date_format;
                        $inserdata[$i]['slac_meeting_no'] = $slac_dt[0];

                        $slsmc_dt = preg_split('/\s+/',$value['F']);
                        $slsmc_date = explode("-", $slsmc_dt[1]);
                        $slsmc_day = $slsmc_date[0]; //day seqment
                        $slsmc_month = $slsmc_date[1]; //month segment
                        $slsmc_year = $slsmc_date[2]; //year segment
                        $slsmc_date_format = date('Y-m-d', strtotime("$slsmc_year-$slsmc_month-$slsmc_day"));
                        $inserdata[$i]['slsmc_meeting_date'] = $slsmc_date_format;
                        $inserdata[$i]['slsmc_meeting_no'] = $slsmc_dt[0];*/

                        //$inserdata[$i]['implementing_agency'] = $value['E'];
                        $inserdata[$i]['implementing_agency'] =  preg_replace('/\s+/', ' ', $value['H']);

/*                      $inserdata[$i]['vertical'] = $value['F'];
                        $inserdata[$i]['dpr'] = $value['G'];
                        $inserdata[$i]['EWS'] = $value['H'];
                        $inserdata[$i]['LIG'] = $value['I'];
                        $inserdata[$i]['MIG'] = $value['J'];
                        $inserdata[$i]['HIG'] = $value['K'];
                        $inserdata[$i]['total_dus'] = $value['L'];*/

                            $inserdata[$i]['vertical'] = preg_replace('/\s+/', ' ',$value['I'] );
                            $inserdata[$i]['dpr'] =  preg_replace('/\s+/', ' ',$value['J'] );
                            $inserdata[$i]['EWS'] = preg_replace('/\s+/', ' ',$value['K'] );
                            $inserdata[$i]['LIG'] = preg_replace('/\s+/', ' ',$value['L'] );
                            $inserdata[$i]['MIG'] = preg_replace('/\s+/', ' ',$value['M'] );
                            $inserdata[$i]['HIG'] = preg_replace('/\s+/', ' ',$value['N'] );
                            $inserdata[$i]['total_dus'] = preg_replace('/\s+/', ' ',$value['O'] );
                            $inserdata[$i]['project_cost_total'] = preg_replace('/\s+/', ' ',$value['P'] );

                        //if (!empty($value['M']))
//                        $inserdata[$i]['probable_date_of_completion'] = $value['M'];
//                        $inserdata[$i]['is_dpr_submitted'] = ($value['N'] == 'Yes') ? 1 : 0;
//                        $inserdata[$i]['is_plan_approved'] = ($value['O'] == 'Yes') ? 1 : 0;
//                        $inserdata[$i]['is_ec_obtained'] = ($value['P'] == 'Yes') ? 1 : 0;
//                        $inserdata[$i]['is_tendering_completed'] = ($value['Q'] == 'Yes') ? 1 : 0;
//                        $inserdata[$i]['current_status_id'] = $this->users_model->get_id($value['R'], 'status', 'project_statuses_master');

                            $inserdata[$i]['probable_date_of_completion'] = $value['Q'] !="" ? $value['Q'] : '0000-00-00';
                            $inserdata[$i]['is_dpr_submitted'] = ($value['R'] == 'Yes') ? 1 : 0;
                            $inserdata[$i]['is_plan_approved'] = ($value['S'] == 'Yes') ? 1 : 0;
                            $inserdata[$i]['is_ec_obtained'] = ($value['T'] == 'Yes') ? 1 : 0;
                            $inserdata[$i]['is_tendering_completed'] = ($value['U'] == 'Yes') ? 1 : 0;
                            //$inserdata[$i]['current_status_id'] =   $value['V']!="" ? $this->users_model->get_id($value['V'], 'status', 'project_statuses_master'): '0';
                            $inserdata[$i]['current_status_id'] =   $value['V']!="" ? $this->users_model->get_id_district_city(preg_replace('/\s+/', ' ', $value['V']), 'status', 'project_statuses_master'): '0';
                            $inserdata[$i]['current_status_id'] =  $inserdata[$i]['current_status_id'] ? $inserdata[$i]['current_status_id']->id: '';

                            # Insert project details
                           // echo "<pre>";print_r($inserdata[$i]);die;
                            $inserdata[$i]['plint_level'] = $value['AB'];
                            $inserdata[$i]['floor_level'] = $value['AC'];
                            $inserdata[$i]['project_completion'] = $value['AD'];

                            $result = $this->users_model->upload_project_data($inserdata[$i]);

                        # Check values are not empty
                      /*  if (!empty($value['S']) && !empty($value['T']) && !empty($value['U']) && !empty($value['V']) && !empty($value['W'])) {
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
                        }*/

                            if (!empty($value['W']) || !empty($value['X']) || !empty($value['Y']) || !empty($value['Z']) || !empty($value['AA'])) {

                                # Project stages log array
                                $stages_data[$i]['project_id'] = $this->users_model->last_project_id();
                                $stages_data[$i]['EWS'] = preg_replace('/\s+/', ' ',$value['W'] );
                                $stages_data[$i]['LIG'] = preg_replace('/\s+/', ' ',$value['X'] );
                                $stages_data[$i]['MIG'] = preg_replace('/\s+/', ' ',$value['Y'] );
                                $stages_data[$i]['HIG'] = preg_replace('/\s+/', ' ',$value['Z'] );
                                $stages_data[$i]['total_dus_work_started'] = preg_replace('/\s+/', ' ',$value['AA'] );

                                $stages_data[$i]['created_at'] = date('Y-m-d H:i:s');

                                # Insert project stages log
                                $this->users_model->add_project_status_log($stages_data[$i]);
                            }

                            if( !empty($value['AG']) || !empty($value['AH']) || !empty($value['AI'])|| !empty($value['AJ']) || !empty($value['BI']) ){
                                $goifirst[$i]['nodel_agency'] = 1;
                                $goifirst[$i]['installment'] = 1;
                                $goifirst[$i]['project_id'] = $this->users_model->last_project_id();
                                $goifirst[$i]['sc_amount '] = $value['AG'];
                                $goifirst[$i]['st_amount'] = $value['AH'];
                                $goifirst[$i]['other_amount'] = $value['AI'];
                                $goifirst[$i]['total_amount'] = $value['AJ'];
                                $goifirst[$i]['sc_utilization_certificate'] = $value['BC'];
                                $goifirst[$i]['other_remark'] = $value['BI'];
                                $this->users_model->insert_excel_goi_fund($goifirst[$i]);
                            }
                            if( !empty($value['AL']) || !empty($value['AM']) || !empty($value['AN'])|| !empty($value['AO']) ) {
                                $goisecond[$i]['nodel_agency'] = 1;
                                $goisecond[$i]['installment'] = 2;
                                $goisecond[$i]['project_id'] = $this->users_model->last_project_id();
                                $goisecond[$i]['sc_amount '] = $value['AL'];
                                $goisecond[$i]['st_amount'] = $value['AM'];
                                $goisecond[$i]['other_amount'] = $value['AN'];
                                $goisecond[$i]['total_amount'] = $value['AO'];
                                $goisecond[$i]['st_utilization_certificate'] = $value['BD'];
                                $this->users_model->insert_excel_goi_fund($goisecond[$i]);
                            }
                            if( !empty($value['AQ']) || !empty($value['AR']) || !empty($value['AS'])|| !empty($value['AT']) ) {
                                $goithird[$i]['nodel_agency'] = 1;
                                $goithird[$i]['installment'] = 3;
                                $goithird[$i]['project_id'] = $this->users_model->last_project_id();
                                $goithird[$i]['sc_amount '] = $value['AQ'];
                                $goithird[$i]['st_amount'] = $value['AR'];
                                $goithird[$i]['other_amount'] = $value['AS'];
                                $goithird[$i]['total_amount'] = $value['AT'];

                                $goithird[$i]['obc_utilization_certificate'] = $value['BE'];
                                $this->users_model->insert_excel_goi_fund($goithird[$i]);
                            }
                            if( !empty($value['AV']) ||  !empty($value['BF']) ){
                                $gomfirst[$i]['nodel_agency'] = 2;
                                $gomfirst[$i]['installment'] = 1;
                                $gomfirst[$i]['project_id'] = $this->users_model->last_project_id();
                                $gomfirst[$i]['total_gom_amount'] = $value['AV'];
                                $gomfirst[$i]['sc_utilization_certificate'] = $value['BF'];
                                $this->users_model->insert_excel_goi_fund($gomfirst[$i]);
                            }
                            if( !empty($value['AX']) || !empty($value['BG']) ) {
                                $gomsecond[$i]['nodel_agency'] = 2;
                                $gomsecond[$i]['installment'] = 2;
                                $gomsecond[$i]['project_id'] = $this->users_model->last_project_id();
                                $gomsecond[$i]['total_gom_amount'] = $value['AX'];
                                $gomsecond[$i]['st_utilization_certificate'] = $value['BG'];
                                $this->users_model->insert_excel_goi_fund($gomsecond[$i]);
                            }
                            if( !empty($value['AZ']) || !empty($value['BH']) ){
                                $gomthird[$i]['nodel_agency'] = 2;
                                $gomthird[$i]['installment'] = 3;
                                $gomthird[$i]['project_id'] = $this->users_model->last_project_id();
                                $gomthird[$i]['total_gom_amount'] = $value['AZ'];
                                $gomthird[$i]['obc_utilization_certificate'] = $value['BH'];
                                $this->users_model->insert_excel_goi_fund($gomthird[$i]);
                            }

                        $i++;
                    }
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