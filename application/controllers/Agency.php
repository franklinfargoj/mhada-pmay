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
        $arrData['projects_data'] = $this->agency_model->get_all_projects($search_param,$user_id);
        $arrData['middle'] = 'projects';
        $this->load->view('template_new/template',$arrData);
    }



}