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
class Agency extends CI_Controller {

	 function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
         $this->load->model('Agency_model','agency_model');
        check_agency_login();
    }


    function projects()
    {
        $user_id = $this->session->userdata('id_of_agency');

        $arrData['user_details'] = get_user_details($user_id);

        $search_param = null;
        if($this->input->get('search'))
        {
            $search_param = $this->input->get('search');
        }

        $arrData['statuses_master'] = $this->agency_model->get_statuses_master();
        $arrData['projects_data'] = $this->agency_model->get_agency_projects($search_param,$user_id);
        $arrData['middle'] = 'agency_projects';
        $this->load->view('template_new/template',$arrData);
    }


    function projects_view($encrypted_url = '')
    {
        url_manupulation();
        if($encrypted_url != NULL)
        {
            $decrypted_url = base64_decode($encrypted_url);
            $decrypted_url = $this->encryption->decrypt($decrypted_url);
            $decrypted_url = explode('|', $decrypted_url);

            $arrData['project_code'] = $project_code = $decrypted_url[0];
            $arrData['project_id'] = $project_id = $decrypted_url[1];

            $arrData['project_details'] = $this->agency_model->get_project_details($project_code,$project_id);
            $arrData['consultant_details'] = $this->agency_model->get_consultant_details($project_id);
            $arrData['encrypted_url'] =  $encrypted_url;
            $arrData['middle'] = 'projects_view';
            $this->load->view('template_new/template',$arrData);
        }
        else{
            show_error('No Information found.');
        }
    }


    function project_documents($encrypted_url = '')
    {
        url_manupulation();
        if($encrypted_url != NULL)
        {
            $decrypted_url = base64_decode($encrypted_url);
            $decrypted_url = $this->encryption->decrypt($decrypted_url);
            $decrypted_url = explode('|', $decrypted_url);

            $arrData['project_code'] = $project_code = $decrypted_url[0];
            $arrData['project_id'] = $project_id = $decrypted_url[1];

            $arrData['documents'] = $this->agency_model->get_documents_master();

            if($postData = $this->input->post())
            {
                $this->form_validation->set_rules('doc_for' , 'Document Name', 'required');


                if ($this->form_validation->run() == TRUE)
                {
                    $document_name = $this->input->post('doc_name');
                    $document_id = $this->input->post('doc_for');


                    $response = $this->agency_model->upload_document($project_id,$document_name,$document_id,$encrypted_url);
                    if($response == '1')
                    {
                        $this->session->set_flashdata('success','Document has been uploaded successfully.');
                        redirect('agency/project_documents/'.$encrypted_url);
                    }
                    else{
                        $this->session->set_flashdata('error','Some error has occured while uploading document.Please check');
                        redirect('agency/project_documents/'.$encrypted_url);
                    }
                }
                else{

                    $error_message = array_values($this->form_validation->error_array())[0];
                    $this->session->set_flashdata('error',$error_message);
                    redirect('agency/project_documents/'.$encrypted_url);
                }



            }

            $arrData['project_documents'] = $this->agency_model->get_documents($project_id);
            $arrData['middle'] = 'agency_project_documents';
            $this->load->view('template_new/template',$arrData);
        }
        else{
            show_error('No Information found.');
        }
    }

    function project_photos($encrypted_url = '')
    {
        url_manupulation();
        if($encrypted_url != NULL)
        {
            $decrypted_url = base64_decode($encrypted_url);
            $decrypted_url = $this->encryption->decrypt($decrypted_url);
            $decrypted_url = explode('|', $decrypted_url);

            $arrData['project_code'] = $project_code = $decrypted_url[0];
            $arrData['project_id'] = $project_id = $decrypted_url[1];

            $arrData['project_stages'] = $this->agency_model->get_stages_master();

            if($postData = $this->input->post())
            {
                $response = $this->agency_model->upload_project_photo_video($project_id,$postData,$encrypted_url);
                if($response == '1')
                {
                    $this->session->set_flashdata('success','Document uploaded successfully.');
                    redirect('agency/project_photos/'.$encrypted_url);
                }
                else{
                    $this->session->set_flashdata('error','Some error has occured while uploading photo.Please check');
                    redirect('agency/project_photos/'.$encrypted_url);
                }
            }

            $arrData['uploaded_photos_videos'] = $this->agency_model->get_uploaded_photos($project_id);
            $arrData['middle'] = 'agency_project_photos';
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

            $this->agency_model->delete_project_document($doc_id);

            $this->session->set_flashdata('success','Document has been discarded successfully.');
            redirect('agency/project_documents/'.base64_encode($this->encryption->encrypt($project_code.'|'.$project_id)));
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

            $this->agency_model->delete_photos_videos($photo_id);

            $this->session->set_flashdata('success','Document has been discarded successfully.');
            redirect('agency/project_photos/'.base64_encode($this->encryption->encrypt($project_code.'|'.$project_id)));
        }
        else{
            show_error('No Information found.');
        }
    }


    public function update_project_stage($encrypted_url='')
    {
        url_manupulation();
        if($encrypted_url != NULL)
        {
            $user_id = $this->session->userdata('id_of_agency');

            $decrypted_url = base64_decode($encrypted_url);
            $decrypted_url = $this->encryption->decrypt($decrypted_url);
            $decrypted_url = explode('|', $decrypted_url);

            $arrData['project_code'] = $project_code = $decrypted_url[0];
            $arrData['project_id'] = $project_id = $decrypted_url[1];

            $arrData['encrypted_url'] = $encrypted_url;
            $arrData['project_stages_master'] = $this->agency_model->get_stages_master();
            $arrData['project_details'] = $this->agency_model->get_project_details($project_code,$project_id);
            $stage_details_data = $this->agency_model->get_project_stages_dus_details($project_id);
            $arrData['dus_for_which_work_started'] =  $this->agency_model->get_dus_started_count($project_id);

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
                    $this->agency_model->add_stages_log($postData,$encrypted_url);
                    $this->session->set_flashdata('success','Dus added successfully.');
                    redirect('projects/update_project_stage/'.$encrypted_url);
                }
                else{

                    $error_message = array_values($this->form_validation->error_array())[0];
                    $this->session->set_flashdata('error',$error_message);
                    redirect('projects/update_project_stage/'.$encrypted_url);
                }

            }

            $arrData['goi_fund_details'] = $this->agency_model->get_fund_amount($project_id,1);
            $arrData['gom_fund_details'] = $this->agency_model->get_fund_amount($project_id,2);

            $arrData['started_work_dus'] = $this->agency_model->get_dus_started($project_id);
            $arrData['benificiary_list'] = $this->agency_model->get_beneficiary_list_name($project_id);

            $arrData['encrypted_url'] =  $encrypted_url;
            $arrData['middle'] = 'agency_project_stages';
            $this->load->view('template_new/template',$arrData);


        }
        else{
            show_error('No Information found.');
        }
    }


    public function save_stage_dus_details()
    {
        $postData = $this->input->post();
        $stages_master = $this->agency_model->get_stages_master();


        if(isset($postData["stage_dus"])){

            $stages_master = $this->agency_model->get_stages_master();
            $this->agency_model->save_stage_details($postData,$stages_master);

            $stage_details_data = $this->agency_model->get_project_stages_dus_details($postData['project_id']);

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
            $user_id = $this->session->userdata('id_of_agency');

            $decrypted_url = base64_decode($encrypted_url);
            $decrypted_url = $this->encryption->decrypt($decrypted_url);
            $decrypted_url = explode('|', $decrypted_url);

            $arrData['project_code'] = $project_code = $decrypted_url[0];
            $arrData['project_id'] = $project_id = $decrypted_url[1];

            $arrData['encrypted_url'] = $encrypted_url;
            $arrData['project_stages_master'] = $this->agency_model->get_stages_master();
            $arrData['project_details'] = $this->agency_model->get_project_details($project_code,$project_id);

            $stage_details_data = $this->agency_model->get_project_stages_dus_details($project_id);

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
                    $this->agency_model->add_financial_details($postData,$arrData['categories'],$encrypted_url);
                }
                elseif($postData['nodel_agency'] == 2)
                {
                    $this->agency_model->add_gom_financial_details($postData,$arrData['categories'],$encrypted_url);
                }


                $this->session->set_flashdata('success','Fund added successfully.');
                redirect('agency/financial_details/'.$encrypted_url);

            }

            $arrData['goi_details'] = $this->agency_model->get_financial_details($project_id,1);
            $arrData['gom_details'] = $this->agency_model->get_financial_details($project_id,2);

            $arrData['encrypted_url'] =  $encrypted_url;
            $arrData['middle'] = 'agency_financial_details';
            $this->load->view('template_new/template',$arrData);


        }
        else{
            show_error('No Information found.');
        }
    }



}