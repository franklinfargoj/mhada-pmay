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
                $document_name = $this->input->post('doc_name');
                $document_id = $this->input->post('doc_for');


                $response = $this->agency_model->upload_document($project_id,$document_name,$document_id,$encrypted_url);
                if($response == '1')
                {
                    $this->session->set_flashdata('success','Document has been uploaded successfully.');
                    redirect('project_documents/'.$encrypted_url);
                }
                else{
                    $this->session->set_flashdata('error','Some error has occured while uploading document.Please check');
                    redirect('project_documents/'.$encrypted_url);
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


}