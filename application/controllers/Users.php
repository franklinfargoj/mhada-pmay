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
class Users extends CI_Controller {

	 function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Users_model','users_model');
        check_login();
    }

    function index()
    {
        $arrData['get_board'] = $this->users_model->get_board_masters();
        $arrData['get_designation'] = $this->users_model->get_designation();
        $arrData['get_department'] = $this->users_model->get_department();
    	$arrData['get_user_details'] = $this->users_model->get_user_lsit();
    	$arrData['middle'] = 'user_list';
        $this->load->view('template_new/template',$arrData);
    }

    function add_user()
    {
    	if($postData = $this->input->post())
    	{
    		$this->form_validation->set_rules('name' , 'Name', 'required');
            $this->form_validation->set_rules('email' , 'Email', 'required|valid_email');
            $this->form_validation->set_rules('mobilenumber', 'Mobile Number', 'required|max_length[10]|min_length[10]');
            $this->form_validation->set_rules('designation' , 'Designation', 'required');
            $this->form_validation->set_rules('username' , 'Username', 'required|is_unique[mbd_users.username]');
            $this->form_validation->set_rules('password' , 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('department' , 'Department', 'required');
            $this->form_validation->set_rules('board' , 'Board', 'required');

            if ($this->form_validation->run() == TRUE)
            {
            	$this->users_model->add_users($postData);
            	$this->session->set_flashdata('success','User has been successfully added.');
    			redirect('users');
            }
            else{
            	$error_message = array_values($this->form_validation->error_array())[0];
            	$this->session->set_flashdata('error',$error_message);
    			redirect('users');
            }
    	}
    	else{
    		$this->session->set_flashdata('error','No Information Submitted.');
    		redirect('users');
    	}
    }
}