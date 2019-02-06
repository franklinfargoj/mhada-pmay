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
class Projects extends CI_Controller {

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

        $search_param = $status_param = null;
        if($this->input->get('search'))
        {
            $search_param = $this->input->get('search');
        }

        if($this->input->get('status'))
        {
            $status_param = $this->input->get('status');
        }

        $arrData['statuses_master'] = $this->users_model->get_statuses_master();
        $arrData['projects_data'] = $this->users_model->get_all_projects($search_param,$status_param);
    	$arrData['middle'] = 'projects';
        $this->load->view('template_new/template',$arrData);
    }

    function dashboard()
    {
        $user_id = $this->session->userdata('id_of_user');

        $arrData['user_details'] = get_user_details($user_id);

        $arrData['project_count'] = $this->users_model->get_total_project_count();

        $arrData['status_abstract'] = $status_abstract = $this->users_model->get_status_abstract_details();

        //echo "<pre>";print_r($arrData['status_abstract']);exit;

        array_unshift($arrData['status_abstract'], array('status'=>'Total Projects','status_count'=>$arrData['project_count'][0]['project_count']));

        $arrData['status_abstract_json'] = json_encode($status_abstract);


        $arrData['middle'] = 'dashboard';
        $this->load->view('template_new/template',$arrData);
    }

    function add_project()
    {
        if($postData = $this->input->post())
        {
            //print_r($postData);exit;

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
        $arrData['regions'] = $this->users_model->get_all_regions();
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

            $arrData['project_code'] = $project_code = $decrypted_url[0];
            $arrData['project_id'] = $project_id = $decrypted_url[1];

            $arrData['project_details'] = $this->users_model->get_project_details($project_code,$project_id);
            $arrData['consultant_details'] = $this->users_model->get_consultant_details($project_id);
            $arrData['encrypted_url'] =  $encrypted_url;
            $arrData['middle'] = 'project_details';
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



    public function get_district()
    {
        if(isset($_POST["region"])){

            $region = $_POST["region"];

            if($region !== ''){

                $districtArr = $this->users_model->get_districts($region);

                    $option='  <option value="">Select District</option>';
                    foreach($districtArr as $district)
                    {
                        $option .= "<option value='".$district['id']."' >".$district['name']."</option>";
                    }
                    echo $option;
            }
            else
            {
                $option='  <option value="">Select District</option>';
                echo $option;
            }
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

            $arrData['started_work_dus'] = $this->users_model->get_dus_started($project_id);

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