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
class Agents extends CI_Controller {

	 function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Users_model','users_model');
        check_login();
    }

    function index()
    {
    	$user_id = $this->session->userdata('id_of_user');

        $arrData['user_details'] = get_user_details($user_id);

        $search_param = null;
        if($this->input->get('search'))
        {
            $search_param = $this->input->get('search');
        }

        $arrData['agents_data'] = $this->users_model->get_all_agents($search_param,$user_id);
    	$arrData['middle'] = 'agents';
        $this->load->view('template_new/template',$arrData);
    }

    function dashboard()
    {
        $user_id = $this->session->userdata('id_of_user');

        $arrData['user_details'] = get_user_details($user_id);

        $arrData['status_abstract'] = $this->users_model->get_status_abstract();
        $arrData['status_abstract_json'] = $this->users_model->get_status_abstract_json($arrData['status_abstract']);
        $arrData['stage_abstract'] = $this->users_model->get_stage_abstract();
        $arrData['stage_abstract_json'] = $this->users_model->get_stage_abstract_json($arrData['stage_abstract']);
        $arrData['get_probity_data'] = $this->users_model->get_probity_data();

        $probilty_array_final = array();
        if(is_array($arrData['get_probity_data']['data']) && array_filter($arrData['get_probity_data']['data']))
        {
            $probilty_array_final = $this->get_formatted_probity_data($arrData['get_probity_data']['data']);
        }

        $arrData['final_probity_data'] = $probilty_array_final;        
        $arrData['demand_and_collection'] = array();
        $arrData['expenditure_budget'] = array();
        $arrData['work_blocks'] = array();
        $arrData['board_wise_employee'] = array();

        if(is_array($probilty_array_final['finantial_accounting']['Demand and Collection']) && array_filter($probilty_array_final['finantial_accounting']['Demand and Collection']))
        {
            foreach($probilty_array_final['finantial_accounting']['Demand and Collection'] as $each_array_check){
                foreach($each_array_check as $each_array_dup){
                    $arrData['demand_and_collection'][] = $each_array_dup;
                }
            }
        }

        if(is_array($probilty_array_final['finantial_accounting']['Expenditure and Budget']) && array_filter($probilty_array_final['finantial_accounting']['Expenditure and Budget']))
        {
            foreach($probilty_array_final['finantial_accounting']['Expenditure and Budget'] as $each_array_check){
                foreach($each_array_check as $each_array_dup){
                    $arrData['expenditure_budget'][] = $each_array_dup;
                }
            }
        }

        if(is_array($probilty_array_final['work']['Blocks']) && array_filter($probilty_array_final['work']['Blocks']))
        {
            foreach($probilty_array_final['work']['Blocks'] as $each_array_check){
                foreach($each_array_check as $key_dup =>  $each_array_dup){
                    $arrData['work_blocks'][$key_dup] = $each_array_dup;
                }
            }
        }

        if(is_array($probilty_array_final['payroll']['Board Wise Employee']) && array_filter($probilty_array_final['payroll']['Board Wise Employee']))
        {
            foreach($probilty_array_final['payroll']['Board Wise Employee'] as $each_array_check){
                    $arrData['board_wise_employee'][] = $each_array_check;
            }
        }

        $arrData['middle'] = 'dashboard';
        $this->load->view('template_new/template',$arrData);
    }

    function add_project()
    {
        if($postData = $this->input->post())
        {
            //print_r($postData);exit;

            $this->form_validation->set_rules('code' , 'Code', 'required');
            $this->form_validation->set_rules('title' , 'Title', 'required');
            $this->form_validation->set_rules('address' , 'Address', 'required');

            if ($this->form_validation->run() == TRUE)
            {

                $this->users_model->add_project($postData);
                $this->session->set_flashdata('success','Project added successfully.');
                redirect('projects');
            }
            else{

                $error_message = array_values($this->form_validation->error_array())[0];
                $this->session->set_flashdata('error',$error_message);
                redirect('projects/add_project');
            }
        }

        $arrData['districts'] = $this->users_model->get_all_districts();
        $arrData['middle'] = 'add_project';
        $this->load->view('template_new/template',$arrData);
    }

    function view($encrypted_url = '')
    {
        url_manupulation();
        if($encrypted_url != NULL)
        {
            $decrypted_url = base64_decode($encrypted_url);
            $decrypted_url = $this->encryption->decrypt($decrypted_url);
            $decrypted_url = explode('|', $decrypted_url);

            $arrData['agent_id'] = $agent_id = $decrypted_url[0];

            $arrData['agent_project_details'] = $this->users_model->get_agent_project_details($agent_id);

            $arrData['encrypted_url'] =  $encrypted_url;
            $arrData['middle'] = 'agent_project_details';
            $this->load->view('template_new/template',$arrData);
        }
        else{
            show_error('No Information found.');
        }
    }

    function documents($encrypted_url = '')
    {
        url_manupulation();
        if($encrypted_url != NULL)
        {
            $decrypted_url = base64_decode($encrypted_url);
            $decrypted_url = $this->encryption->decrypt($decrypted_url);
            $decrypted_url = explode('|', $decrypted_url);

            $arrData['project_code'] = $project_code = $decrypted_url[0];
            $arrData['project_id'] = $project_id = $decrypted_url[1];

            $arrData['documents'] = $this->users_model->get_documents_master();

            if($postData = $this->input->post())
            {
                $document_name = $this->input->post('doc_name');
                $document_id = $this->input->post('doc_for');


                $response = $this->users_model->upload_document($project_id,$document_name,$document_id,$encrypted_url);
                if($response == '1')
                {
                    $this->session->set_flashdata('success','Document has been uploaded successfully.');
                    redirect('projects/documents/'.$encrypted_url);
                }
                else{
                    $this->session->set_flashdata('error','Some error has occured while uploading document.Please check');
                    redirect('projects/documents/'.$encrypted_url);
                }
            }

            $arrData['project_documents'] = $this->users_model->get_documents($project_id);
            $arrData['middle'] = 'project_documents';
            $this->load->view('template_new/template',$arrData);
        }
        else{
            show_error('No Information found.');
        }
    }

    function photos($encrypted_url = '')
    {
        url_manupulation();
        if($encrypted_url != NULL)
        {
            $decrypted_url = base64_decode($encrypted_url);
            $decrypted_url = $this->encryption->decrypt($decrypted_url);
            $decrypted_url = explode('|', $decrypted_url);

            $arrData['project_code'] = $project_code = $decrypted_url[0];
            $arrData['project_id'] = $project_id = $decrypted_url[1];

           $arrData['project_stages'] = $this->users_model->get_stages_master();

            if($postData = $this->input->post())
            {
                $response = $this->users_model->upload_project_photo_video($project_id,$postData,$encrypted_url);
                if($response == '1')
                {
                    $this->session->set_flashdata('success','Document uploaded successfully.');
                    redirect('projects/photos/'.$encrypted_url);
                }
                else{
                    $this->session->set_flashdata('error','Some error has occured while uploading photo.Please check');
                    redirect('projects/photos/'.$encrypted_url);
                }
            }

            $arrData['uploaded_photos_videos'] = $this->users_model->get_uploaded_photos($project_id);
            $arrData['middle'] = 'project_photos';
            $this->load->view('template_new/template',$arrData);
        }
        else{
            show_error('No Information found.');
        }
    }

    function download_document($encrypted_url = '')
    {
        url_manupulation();
        if($encrypted_url != NULL)
        {
            $file_name = base64_decode($encrypted_url);
            $file_name = $this->encryption->decrypt($file_name);

            if (!empty($file_name)) {
                $filename = FCPATH.'/public/uploads/'.$file_name;
                if (file_exists($filename)) {
                    $file_info = pathinfo($filename);

                    $handle = fopen($filename, "r");
                    $data = fread($handle, filesize($filename));
                    fclose($handle);
                    ob_clean();
                    $name = $file_name;
                    $this->load->helper('download');
                    force_download($name, $data);
                } else {
                    show_error("Document does not exists");
                }
            } else {
                show_404();
            }
        }
        else{
            show_404();
        }
    }

    function delete_document($encrypted_url = '')
    {
        url_manupulation();
        if($encrypted_url != NULL)
        {
            $decrypted_url = base64_decode($encrypted_url);
            $decrypted_url = $this->encryption->decrypt($decrypted_url);
            $decrypted_url = explode('|', $decrypted_url);

            $arrData['doc_id'] = $doc_id = $decrypted_url[0];
            $arrData['project_code'] = $project_code = $decrypted_url[1];
            $arrData['project_id'] = $project_id = $decrypted_url[2];

            $this->users_model->delete_project_document($doc_id);

            $this->session->set_flashdata('success','Document has been discarded successfully.');
            redirect('projects/documents/'.base64_encode($this->encryption->encrypt($project_code.'|'.$project_id)));
        }
        else{
            show_error('No Information found.');
        }
    }

    function delete_photos($encrypted_url = '')
    {
        url_manupulation();
        if($encrypted_url != NULL)
        {
            $decrypted_url = base64_decode($encrypted_url);
            $decrypted_url = $this->encryption->decrypt($decrypted_url);
            $decrypted_url = explode('|', $decrypted_url);

            $arrData['photo_id'] = $photo_id = $decrypted_url[0];
            $arrData['project_code'] = $project_code = $decrypted_url[1];
            $arrData['project_id'] = $project_id = $decrypted_url[2];

            $this->users_model->delete_photos_videos($photo_id);

            $this->session->set_flashdata('success','Document has been discarded successfully.');
            redirect('projects/photos/'.base64_encode($this->encryption->encrypt($project_code.'|'.$project_id)));
        }
        else{
            show_error('No Information found.');
        }
    }

    function update_status($encrypted_url = '')
    {
        url_manupulation();
        if($encrypted_url != NULL)
        {
            $user_id = $this->session->userdata('id_of_user');

            $decrypted_url = base64_decode($encrypted_url);
            $decrypted_url = $this->encryption->decrypt($decrypted_url);
            $decrypted_url = explode('|', $decrypted_url);

            $arrData['project_code'] = $project_code = $decrypted_url[0];
            $arrData['project_id'] = $project_id = $decrypted_url[1];

            $development_status = $this->input->post('development_status');
            $start_date_of_project = $this->input->post('start_date_of_project');
            $tentative_completion_date_of_project = $this->input->post('tentative_completion_date_of_project');

            if($development_status == '' || $start_date_of_project == '' || $tentative_completion_date_of_project == '')
            {
                $this->session->set_flashdata('error','Please select all fields.');
                redirect('projects');
            }

            $response = $this->users_model->update_project_status($project_id,$development_status,$start_date_of_project,$tentative_completion_date_of_project,$user_id);

            if($response)
            {
                $this->session->set_flashdata('success','Status has been updated successfully for '.$project_code);
            }
            else{
               $this->session->set_flashdata('error','Status cant be the same as the current status.Please select different status and retry.'); 
            }
            redirect('projects');
        }
        else{
            show_error('No Information found.');
        }
    }

    function change_status_log($encrypted_url = '')
    {
        url_manupulation();
        if($encrypted_url != NULL)
        {
            $user_id = $this->session->userdata('id_of_user');

            $decrypted_url = base64_decode($encrypted_url);
            $decrypted_url = $this->encryption->decrypt($decrypted_url);
            $decrypted_url = explode('|', $decrypted_url);

            $arrData['survey_numer'] = $survey_numer = $decrypted_url[0];
            $arrData['ref_id'] = $ref_id = $decrypted_url[1];

            $arrData['get_status_logs'] = $this->users_model->get_status_logs($survey_numer);
            $arrData['middle'] = 'status_log';
            $this->load->view('template_new/template',$arrData);
        }
        else{
            show_error('No Information found.');
        }
    }

    function update_stage($encrypted_url = '')
    {
        url_manupulation();
        if($encrypted_url != NULL)
        {
            $user_id = $this->session->userdata('id_of_user');

            $decrypted_url = base64_decode($encrypted_url);
            $decrypted_url = $this->encryption->decrypt($decrypted_url);
            $decrypted_url = explode('|', $decrypted_url);

            $arrData['encrypted_url'] = $encrypted_url;

            $arrData['survey_numer'] = $survey_numer = $decrypted_url[0];
            $arrData['ref_id'] = $ref_id = $decrypted_url[1];
            $arrData['work_number'] = $work_number = $decrypted_url[2];

            $arrData['work_order_details_submitted'] = 0;
            $arrData['work_order_details'] = $this->users_model->get_work_order_details($survey_numer,$ref_id,$work_number);
            if(is_array($arrData['work_order_details']) && array_filter($arrData['work_order_details']))
            {
                $arrData['work_order_details_submitted'] = 1;
            }

            if($postData = $this->input->post())
            {
                $this->form_validation->set_rules('stage_type' , 'Stage Type', 'required');
                $this->form_validation->set_rules('stage_name' , 'Stage Name', 'required');
                $this->form_validation->set_rules('expected_completion_date' , 'Expected completion Date', 'required');

                if ($this->form_validation->run() == TRUE)
                {
                    $response = $this->users_model->add_applicable_stages($postData,$survey_numer,$user_id,$work_number);
                    if($response)
                    {
                        $this->session->set_flashdata('success','Applicable stage details has been added successfully.');
                        redirect('schemes/update_stage/'.$encrypted_url);
                    }
                    else{
                        $this->session->set_flashdata('error','Mentioned stage has been already added previously.');
                        redirect('schemes/update_stage/'.$encrypted_url);
                    }
                }
                else{

                    $error_message = array_values($this->form_validation->error_array())[0];
                    $this->session->set_flashdata('error',$error_message);
                    redirect('schemes/update_stage/'.$encrypted_url);
                }
            }

            $arrData['get_update_stages'] = $this->users_model->get_update_stages($survey_numer,$work_number);
            $arrData['get_milestones'] = $this->users_model->get_milestones($survey_numer,$work_number);
            if(is_array($arrData['get_milestones']) && array_filter($arrData['get_milestones']))
            {
                $arrData['get_milestones'] = array_column($arrData['get_milestones'], 'milestone_name');
            }
            else{
                $arrData['get_milestones'] = array();
            }

            $arrData['get_applicable_stages'] = $this->users_model->get_applicable_stages($survey_numer,$work_number);
            $arrData['get_stage_logs'] = $this->users_model->get_stage_logs($survey_numer,$work_number);
            $arrData['get_stage_type'] = $this->users_model->get_stage_type_master();

            $arrData['allow_stage_submission'] = 1;

            foreach($arrData['get_stage_logs'] as $each_log_stage){
                if($each_log_stage['bill_generated'] == 0 && in_array($each_log_stage['new_status_name'], $arrData['get_milestones'])){
                    $arrData['allow_stage_submission'] = 0;
                    $arrData['stage_for_bill'] = $each_log_stage['new_status_name'];
                    break;
                }
            }

            $arrData['middle'] = 'stage_details';
            $this->load->view('template_new/template',$arrData);
        }
        else{
            show_error('No Information Found');
        }
    }

    function stage_consolidated()
    {
        $arrData['get_consolidated_details'] = $this->users_model->get_applicable_stages_consolidated();
        $arrData['middle'] = 'stage_details_consolidated';
        $this->load->view('template_new/template',$arrData);
    }

    function stage_consolidated_print()
    {
        $arrData['get_consolidated_details'] = $this->users_model->get_applicable_stages_consolidated();
        include(FCPATH . 'application/libraries/mpdf/mpdf.php');

        $saibaba_reg = $this->load->view('stage_details_consolidated_download',$arrData,true);

        $mpdf = new mPDF('', 'A4',8,'','15','15','15','30');
        $mpdf->SetHTMLFooter('
            <table width="100%" height="20px" style="vertical-align: bottom; font-family: serif; font-size: 8pt; color: red; font-weight: bold; font-style: italic;">
            <tr><td width="10%" style="text-align: right; color:blue;">Page {PAGENO} of {nb}</td></tr></table>'
        );
        $mpdf->SetWatermarkText($unique_number);
        $mpdf->showWatermarkText = true;
        $mpdf->AddPage('','NEXT-ODD','1','1','off');
        $mpdf->use_kwt = true;
        $mpdf->shrink_tables_to_fit=1;
        $mpdf->useDefaultCSS3 = true;
        $mpdf->WriteHTML($saibaba_reg);
        $mpdf->Output('Stages_Wise_Completion_Report.pdf','D');
    }

    function update_stage_status($encrypted_url = '')
    {
        url_manupulation();
        if($encrypted_url != NULL)
        {
            $user_id = $this->session->userdata('id_of_user');

            $decrypted_url = base64_decode($encrypted_url);
            $decrypted_url = $this->encryption->decrypt($decrypted_url);
            $decrypted_url = explode('|', $decrypted_url);

            $arrData['encrypted_url'] = $encrypted_url;

            $arrData['survey_numer'] = $survey_numer = $decrypted_url[0];
            $arrData['ref_id'] = $ref_id = $decrypted_url[1];
            $arrData['work_number'] = $work_number = $decrypted_url[2];

            if($postData = $this->input->post())
            {
                $this->form_validation->set_rules('stage' , 'Stage', 'required');
                $this->form_validation->set_rules('actual_completion_date' , 'Actual completion Date', 'required');

                if ($this->form_validation->run() == TRUE)
                {
                    $response = $this->users_model->update_stage_status($postData,$survey_numer,$user_id,$work_number);
                    if($response)
                    {
                        $this->session->set_flashdata('success','Stage has been updated successfully.');
                        redirect('schemes/update_stage/'.$encrypted_url);
                    }
                    else{
                        $this->session->set_flashdata('error','Mentioned stage has been already marked as completed previously and so cant be updated.');
                        redirect('schemes/update_stage/'.$encrypted_url);
                    }
                }
                else{

                    $error_message = array_values($this->form_validation->error_array())[0];
                    $this->session->set_flashdata('error',$error_message);
                    redirect('schemes/update_stage/'.$encrypted_url);
                }
            }
        }
        else{
            show_error('No Information Found');
        }
    }

    function add_building_details($encrypted_url)
    {
        url_manupulation();
        if($encrypted_url != NULL)
        {
            $decrypted_url = base64_decode($encrypted_url);
            $decrypted_url = $this->encryption->decrypt($decrypted_url);
            $decrypted_url = explode('|', $decrypted_url);

            $arrData['survey_numer'] = $survey_numer = $decrypted_url[0];
            $arrData['ref_id'] = $ref_id = $decrypted_url[1];

            if($postData = $this->input->post())
            {
                $this->form_validation->set_rules('type_of_cons' , 'Type', 'required');
                $this->form_validation->set_rules('name' , 'Name', 'required');
                
                if($postData['type_of_cons'] == 'Wings')
                {
                    $this->form_validation->set_rules('building_number' , 'Building', 'required');
                }
                elseif($postData['type_of_cons'] == 'Flats')
                {
                    $this->form_validation->set_rules('building_number' , 'Building', 'required');
                    $this->form_validation->set_rules('ward_number' , 'Wing', 'required');
                }

                if ($this->form_validation->run() == TRUE)
                {
                    $this->users_model->submit_cons_detail($postData,$survey_numer,$ref_id);
                    $this->session->set_flashdata('success','Details of '.$postData['type_of_cons'].' has been submitted successfully.');
                    redirect('schemes/add_building_details/'.$encrypted_url);
                }
                else{

                    $error_message = array_values($this->form_validation->error_array())[0];
                    $this->session->set_flashdata('error',$error_message);
                    redirect('schemes/add_building_details/'.$encrypted_url);
                }
            }

            $arrData['building_master'] = $this->users_model->get_buildings($survey_numer,$ref_id);
            $arrData['get_cons_details'] = $this->users_model->get_cons_details($survey_numer,$ref_id);
            $arrData['middle'] = 'scheme_bildings';
            $this->load->view('template_new/template',$arrData);
        }
        else{
            show_error('No Information found.');
        }
    }

    function change_handover_status($encrypted_url)
    {
        url_manupulation();
        if($encrypted_url != NULL)
        {
            $decrypted_url = base64_decode($encrypted_url);
            $decrypted_url = $this->encryption->decrypt($decrypted_url);
            $decrypted_url = explode('|', $decrypted_url);

            $cons_id = $decrypted_url[0];
            $cons_type = $decrypted_url[1];
            $survey_number = $decrypted_url[2];
            $ref_id = $decrypted_url[3];
            $current_status = $decrypted_url[4];


            $this->users_model->update_handover_status($cons_id,$cons_type,$survey_number,$ref_id,$current_status);
            $this->session->set_flashdata('success','Handover status has been successfully updated.');
            redirect('schemes/add_building_details/'.base64_encode($this->encryption->encrypt($survey_number.'|'.$ref_id)));
        }
        else{
            show_error('No Information found.');
        }
    }

    function get_formatted_probity_data($probity_data)
    {
        $arrData['get_probity_data'] = $probity_data;
        $probilty_array_filter = array();

        foreach($arrData['get_probity_data'] as $value_module)
        {
            foreach($value_module as $sub_module_name => $sub_module_value)
            {
                $probilty_array_filter[$sub_module_name] = $sub_module_value;
            }
        }

        $probilty_array_final = array();
        foreach($probilty_array_filter as $filter_tech => $filter_value)
        {
            foreach($filter_value as $key_tech => $each_filter_rep_value)
            {
                foreach($each_filter_rep_value as $sub_module_rep_name => $sub_module_rep_value){
                    $probilty_array_final[$filter_tech][$sub_module_rep_name] = $sub_module_rep_value;
                }
            }
        }

        return $probilty_array_final;
    }

    function get_wings()
    {
        if($postInfo = $this->input->post())
        {
            $refernce_id = $postInfo['ref_val'];
            $arrData['get_wings'] = $get_wings = $this->users_model->get_wings($refernce_id);

            echo $this->load->view('get_dependent_option',$arrData,true);
            die;
        }
    }

    function get_stages_for_type()
    {
        if($postInfo = $this->input->post())
        {
            $refernce_id = $postInfo['ref_val'];
            $arrData['stages_names'] = $stages_names = $this->users_model->get_stages_for_type($refernce_id);

            echo $this->load->view('get_dependent_option_stages',$arrData,true);
            die;
        }
    }

    function get_probity_report()
    {
        ini_set('max_execution_time', 0);
        $this->users_model->update_response_probity();
        $this->session->set_flashdata('success','Statistics has been updated as per latest records.');
        redirect('schemes/dashboard');
    }

    function add_work_details($encrypted_url = '')
    {
        url_manupulation();
        if($encrypted_url != NULL)
        {
            $decrypted_url = base64_decode($encrypted_url);
            $decrypted_url = $this->encryption->decrypt($decrypted_url);
            $decrypted_url = explode('|', $decrypted_url);

            $user_id = $this->session->userdata('id_of_user');

            $arrData['survey_numer'] = $survey_numer = $decrypted_url[0];
            $arrData['ref_id'] = $ref_id = $decrypted_url[1];


            $arrData['board_details'] = $this->users_model->get_board_masters();
            $arrData['department'] = $this->users_model->get_department();
            $arrData['budget_expenditure'] = $this->users_model->get_active_master_info('budget_expense_master');
            $arrData['approval_authority'] = $this->users_model->get_active_master_info('approving_authority_master');
            $arrData['sub_board_details'] = $this->users_model->get_active_master_info('sub_board_master');
            $arrData['executive_engineer'] = $this->users_model->get_active_master_info('executive_eng_master');
            $arrData['major_details'] = $this->users_model->get_active_master_info('major_master');
            $arrData['work_type_details'] = $this->users_model->get_active_master_info('work_type_master');
            $arrData['deputy_engineer_details'] = $this->users_model->get_active_master_info('deputy_engineer_master');
            $arrData['sub_major_details'] = $this->users_model->get_active_master_info('sub_major_master');
            $arrData['ledger_details'] = $this->users_model->get_active_master_info('ledger_master');
            $arrData['chief_details'] = $this->users_model->get_active_master_info('chief_accounts_master');
            $arrData['sub_ledger_details'] = $this->users_model->get_active_master_info('sub_ledger_master');

            if($postData = $this->input->post()){
                $this->form_validation->set_rules('work_type' , 'Work Type', 'required');
                $this->form_validation->set_rules('parent_work_key' , 'Parent work key', 'required');
                $this->form_validation->set_rules('budget_details' , 'Budget pg ID/referance/ No 17-18', 'required');
                $this->form_validation->set_rules('budget_pg' , 'Budget pg ID/referance/ No 17-18', 'required');
                $this->form_validation->set_rules('budget_sr_suffix' , 'Budget sr no Suffix 17 -18', 'required');
                $this->form_validation->set_rules('department' , 'Department', 'required');
                $this->form_validation->set_rules('board' , 'Board', 'required');
                $this->form_validation->set_rules('finantial_year' , 'Finantial Year', 'required');
                $this->form_validation->set_rules('work_code' , 'Work code', 'required');
                $this->form_validation->set_rules('approval_status' , 'Approval Status', 'required');
                $this->form_validation->set_rules('work_name_details' , 'Work name', 'required');
                $this->form_validation->set_rules('work_description_details' , 'Work description', 'required');

                if ($this->form_validation->run() == TRUE)
                {
                    $this->users_model->submit_work_done_project($postData,$survey_numer,$ref_id,$user_id);
                    $this->session->set_flashdata('success','Work has been successfully added for project '.$survey_numer);
                    redirect('schemes');
                }
                else{
                    $error_message = array_values($this->form_validation->error_array())[0];
                    $this->session->set_flashdata('error',$error_message);
                    redirect('schemes/add_work_details/'.$encrypted_url);
                }
            }

            $arrData['middle'] = 'add_work';
            $this->load->view('template_new/template',$arrData);

        }else{
            show_error('No Information found.');
        }
    }

    function view_work_details($encrypted_url = '')
    {
        if($encrypted_url != NULL)
        {
            $decrypted_url = base64_decode($encrypted_url);
            $decrypted_url = $this->encryption->decrypt($decrypted_url);
            $decrypted_url = explode('|', $decrypted_url);

            $user_id = $this->session->userdata('id_of_user');

            $arrData['work_number'] = $work_number = $decrypted_url[0];
            $arrData['ref_id'] = $ref_id = $decrypted_url[1];
            $arrData['redirect_url'] = $decrypted_url[2];

            $arrData['work_details_project'] = $this->users_model->get_work_for_projects_part($work_number,$ref_id);
            $arrData['middle'] = 'view_work';
            $this->load->view('template_new/template',$arrData);

        }else{
            show_error('No Information found.');
        }
    }

    function work_for_project($encrypted_url = '')
    {
        url_manupulation();
        if($encrypted_url != NULL)
        {
            $decrypted_url = base64_decode($encrypted_url);
            $decrypted_url = $this->encryption->decrypt($decrypted_url);
            $decrypted_url = explode('|', $decrypted_url);

            $user_id = $this->session->userdata('id_of_user');

            $arrData['survey_numer'] = $survey_numer = $decrypted_url[0];
            $arrData['ref_id'] = $ref_id = $decrypted_url[1];

            $arrData['work_details_project'] = $this->users_model->get_work_for_projects($survey_numer,$ref_id);

            $arrData['middle'] = 'work_for_project';
            $this->load->view('template_new/template',$arrData);

        }
        else{
            show_error('No Information found.');
        }
    }

    function add_work_order_details($encrypted_url = '')
    {
        url_manupulation();
        if($encrypted_url != NULL)
        {
            $decrypted_url = base64_decode($encrypted_url);
            $decrypted_url = $this->encryption->decrypt($decrypted_url);
            $decrypted_url = explode('|', $decrypted_url);

            $user_id = $this->session->userdata('id_of_user');

            $arrData['survey_numer'] = $survey_numer = $decrypted_url[0];
            $arrData['ref_id'] = $ref_id = $decrypted_url[1];
            $arrData['work_number'] = $work_number = $decrypted_url[2];

            $arrData['work_details'] = $this->users_model->get_work_name_and_details($work_number);

            $arrData['milestone_details'] = $this->users_model->get_milestones($survey_numer,$work_number);

            $arrData['work_order_details_submitted'] = 0;

            $arrData['work_order_details'] = $this->users_model->get_work_order_details($survey_numer,$ref_id,$work_number);

            $arrData['get_execution_master'] = $this->users_model->get_execution_master();

            if(is_array($arrData['work_order_details']) && array_filter($arrData['work_order_details']))
            {
                $arrData['work_order_details_submitted'] = 1;
            }


            $arrData['encrypted_url'] = $encrypted_url;

            if($postData = $this->input->post())
            {
                $this->users_model->submit_work_order_details($postData,$survey_numer,$ref_id,$work_number,$user_id);
                $this->session->set_flashdata('success','Work order details has been successfully submitted.');
                redirect('schemes/add_work_order_details/'.$encrypted_url);
            }

            $arrData['consultant_architect'] = $this->users_model->get_active_master_info('consultant_architect');
            $arrData['third_party_inspection'] = $this->users_model->get_active_master_info('third_party_inspection');
            $arrData['gov_associated_agency'] = $this->users_model->get_active_master_info('gov_associated_agency');

            $arrData['middle'] = 'add_work_order_details';
            $this->load->view('template_new/template',$arrData);

        }
        else{
           show_error('No Information found.'); 
       }
    }

    function upload_milestone($encrypted_url = '')
    {
        url_manupulation();
        if($encrypted_url != NULL)
        {
            $decrypted_url = base64_decode($encrypted_url);
            $decrypted_url = $this->encryption->decrypt($decrypted_url);
            $decrypted_url = explode('|', $decrypted_url);

            $user_id = $this->session->userdata('id_of_user');

            $arrData['survey_numer'] = $survey_numer = $decrypted_url[0];
            $arrData['ref_id'] = $ref_id = $decrypted_url[1];
            $arrData['work_number'] = $work_number = $decrypted_url[2];

            if($postData = $this->input->post())
            {
                if(is_array($postData['milestone']) && array_filter($postData['milestone']))
                {
                    $this->users_model->submit_milestone($survey_numer,$ref_id,$work_number,$postData['milestone']);
                    $this->session->set_flashdata('success','Milestones has been added successfully.');
                    redirect('schemes/add_work_order_details/'.$encrypted_url);
                }
                else{
                    $this->session->set_flashdata('error','You must select atleast one stage.');
                    redirect('schemes/add_work_order_details/'.$encrypted_url);
                }
            }
        }
        else{
            show_error('No Information found.'); 
        }
    }

    function delete_milestone($encrypted_url = '')
    {
        url_manupulation();
        if($encrypted_url != NULL)
        {
            $decrypted_url = base64_decode($encrypted_url);
            $decrypted_url = $this->encryption->decrypt($decrypted_url);
            $decrypted_url = explode('|', $decrypted_url);

            $arrData['ref_id'] = $ref_id = $decrypted_url[0];
            $redirect_url = $decrypted_url[1];

            $this->users_model->delete_milestone($ref_id);
            $this->session->set_flashdata('success','Milestones has been discarded successfully.');
            redirect('schemes/add_work_order_details/'.$redirect_url);
        }
        else{
            show_error('No Information found.'); 
        }
    }

    function add_bill_details($encrypted_url = '')
    {
        url_manupulation();
        if($encrypted_url != NULL)
        {
            $decrypted_url = base64_decode($encrypted_url);
            $decrypted_url = $this->encryption->decrypt($decrypted_url);
            $decrypted_url = explode('|', $decrypted_url);

            $arrData['survey_numer'] = $survey_numer = $decrypted_url[0];
            $arrData['work_number'] = $work_number = $decrypted_url[1];
            $arrData['ref_id'] = $ref_id_stage_log = $decrypted_url[2];
            $arrData['project_stage_name'] = $project_stage_name = $decrypted_url[3];
            $arrData['revert_url'] = $revert_url = $decrypted_url[4];

            $arrData['current_year_project_cost'] = $this->users_model->get_current_year_project_cost($work_number);

            $arrData['get_log_status'] = $this->users_model->get_log_status_bill($ref_id_stage_log);


            if($postData = $this->input->post())
            {
                $this->users_model->submit_bill_details($survey_numer,$work_number,$ref_id_stage_log,$postData);
                $this->session->set_flashdata('success','Bill details has been submitted successfully.');
                redirect('schemes/update_stage/'.$revert_url);
            }

            $arrData['encrypted_url'] = $encrypted_url;
            $arrData['middle'] = 'add_bill_details';
            $this->load->view('template_new/template',$arrData);
        }
        else{
            show_error('No Information found.'); 
        }
    }

    public function get_cities()
    {
        if(isset($_POST["district"])){

            $district = $_POST["district"];

            if($district !== ''){

                $citiesArr = $this->users_model->get_cities($district);

                    $option='  <option value="">Select City</option>';
                    foreach($citiesArr as $city)
                    {
                        $option .= "<option value='".$city['id']."' >".$city['name']."</option>";
                    }
                    echo $option;
            }
            else
            {
                $option='  <option value="">Select City</option>';
                echo $option;
            }
        }
    }

    public function update_project_stage($encrypted_url='')
    {
        url_manupulation();
        if($encrypted_url != NULL)
        {
            $user_id = $this->session->userdata('id_of_user');

            $decrypted_url = base64_decode($encrypted_url);
            $decrypted_url = $this->encryption->decrypt($decrypted_url);
            $decrypted_url = explode('|', $decrypted_url);

            $arrData['project_code'] = $project_code = $decrypted_url[0];
            $arrData['project_id'] = $project_id = $decrypted_url[1];

            $arrData['encrypted_url'] = $encrypted_url;
            $arrData['project_stages_master'] = $this->users_model->get_stages_master();
            $arrData['project_details'] = $this->users_model->get_project_details($project_code,$project_id);
            $stage_details_data = $this->users_model->get_project_stages_dus_details($project_id);
            $arrData['dus_for_which_work_started'] =  $this->users_model->get_dus_started_count($project_id);

            $stage_dus_details =[];
            $total_dus_under_construction = 0;
            $last_updated_date ='';
            foreach($stage_details_data as $stage_detail)
            {
                $stage_dus_details[$stage_detail['stage_id']] = $stage_detail;
                $total_dus_under_construction += $stage_detail['no_of_dus'];
                $last_updated_date = $stage_detail['created_at'];
            }
            $arrData['project_stages_dus_details'] = $stage_dus_details;
            $arrData['total_dus_under_construction'] = $total_dus_under_construction;
            $arrData['last_updated_date'] = $last_updated_date;


            if($postData = $this->input->post())
            {

                $this->form_validation->set_rules('total_dus_work_started' , 'Total Dus', 'required|is_natural_no_zero');

                if ($this->form_validation->run() == TRUE)
                {
                    $postData['project_id'] = $project_id;
                    $postData['updated_by_user_id'] = $this->session->userdata('id_of_user');
                    $this->users_model->add_stages_log($postData,$encrypted_url);
                    $this->session->set_flashdata('success','Dus added successfully.');
                    redirect('projects/update_project_stage/'.$encrypted_url);
                }
                else{

                    $error_message = array_values($this->form_validation->error_array())[0];
                    $this->session->set_flashdata('error',$error_message);
                    redirect('projects/update_project_stage/'.$encrypted_url);
                }

            }

            $arrData['goi_fund_details'] = $this->users_model->get_fund_amount($project_id,1);
            $arrData['gom_fund_details'] = $this->users_model->get_fund_amount($project_id,2);

            $arrData['encrypted_url'] =  $encrypted_url;
            $arrData['middle'] = 'project_stages';
            $this->load->view('template_new/template',$arrData);


        }
        else{
            show_error('No Information found.');
        }
    }


    public function save_stage_dus_details()
    {
            $postData = $this->input->post();
            $stages_master = $this->users_model->get_stages_master();


        if(isset($postData["stage_dus"])){

            $stages_master = $this->users_model->get_stages_master();
            $this->users_model->save_stage_details($postData,$stages_master);

            $stage_details_data = $this->users_model->get_project_stages_dus_details($postData['project_id']);

            $stage_dus_details =[];
            $total_dus_under_construction = 0;
            foreach($stage_details_data as $stage_detail)
            {
                $stage_dus_details[$stage_detail['stage_id']] = $stage_detail;
                $total_dus_under_construction += $stage_detail['no_of_dus'];
            }

            echo json_encode($stage_dus_details);
        }

    }

    public function financial_details($encrypted_url='')
    {
        url_manupulation();
        if($encrypted_url != NULL)
        {
            $user_id = $this->session->userdata('id_of_user');

            $decrypted_url = base64_decode($encrypted_url);
            $decrypted_url = $this->encryption->decrypt($decrypted_url);
            $decrypted_url = explode('|', $decrypted_url);

            $arrData['project_code'] = $project_code = $decrypted_url[0];
            $arrData['project_id'] = $project_id = $decrypted_url[1];

            $arrData['encrypted_url'] = $encrypted_url;
            $arrData['project_stages_master'] = $this->users_model->get_stages_master();
            $arrData['project_details'] = $this->users_model->get_project_details($project_code,$project_id);

            $stage_details_data = $this->users_model->get_project_stages_dus_details($project_id);

            $stage_dus_details =[];
            $total_dus_under_construction = 0;
            foreach($stage_details_data as $stage_detail)
            {
                $stage_dus_details[$stage_detail['stage_id']] = $stage_detail;
                $total_dus_under_construction += $stage_detail['no_of_dus'];
            }
            $arrData['project_stages_dus_details'] = $stage_dus_details;
            $arrData['total_dus_under_construction'] = $total_dus_under_construction;
            $arrData['categories'] = ['sc','st','other'];


            if($postData = $this->input->post())
            {


                    $postData['project_id'] = $project_id;

                    if($postData['nodel_agency'] == 1)
                    {
                        $this->users_model->add_financial_details($postData,$arrData['categories'],$encrypted_url);
                    }
                    elseif($postData['nodel_agency'] == 2)
                    {
                        $this->users_model->add_gom_financial_details($postData,$arrData['categories'],$encrypted_url);
                    }


                    $this->session->set_flashdata('success','Fund added successfully.');
                    redirect('projects/financial_details/'.$encrypted_url);

            }

            $arrData['goi_details'] = $this->users_model->get_financial_details($project_id,1);
            $arrData['gom_details'] = $this->users_model->get_financial_details($project_id,2);

            /* $arrData['gom_financial_details'] = $this->users_model->get_financial_details($project_id,2);

             echo "<pre>";print_r($arrData['goi_financial_details']);

             foreach($arrData['goi_financial_details'] as $goi)
             {
                 $goi_details[$goi->installment] = $goi->installment;
                 $goi_details[$goi->installment] = $goi->installment;
             }

             exit;*/

            $arrData['encrypted_url'] =  $encrypted_url;
            $arrData['middle'] = 'financial_details';
            $this->load->view('template_new/template',$arrData);


        }
        else{
            show_error('No Information found.');
        }
    }




}