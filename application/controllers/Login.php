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
class Login extends CI_Controller {

	 function __construct() {
        parent::__construct();
         $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Users_model','users_model');
         $this->load->model('Agency_model','agency_model');
    }

    function index()
    {
        remember_me();
        if($postInfo = $this->input->post())
        {
            $captcha = $this->session->userdata('captcha');
            if (isset($captcha['word']) && $captcha['word'] == $this->input->post('verification_code')) {

                unset($postInfo['verification_code']);
                $this->session->unset_userdata('captcha');

                $response = $this->users_model->login($postInfo);
                if($response == 'true'){
                        redirect('projects');
                }else{
                    $this->session->set_flashdata('error', 'Invalid Username or password.Please retry with correct credentials.');
                    redirect();
                }
            }
            else{
                $this->session->set_flashdata('error','Invalid captcha.Please check the word and retry.');
                redirect(); 
            }
        }
        $arrData['captcha'] = generate_captcha();
        $this->load->view('login',$arrData);
    }

    public function password_check($password_string)
    {
       if ((preg_match('#[0-9]#', $password_string) && preg_match('#[a-zA-Z]#', $password_string))) {
         return TRUE;
       }
       return FALSE;
    }

    function logout(){
        url_manupulation();
        $this->session->sess_destroy();
        redirect();
    }

    function agency_logout(){
        url_manupulation();
        $this->session->sess_destroy();
        redirect('agency');
    }

    function isValidMd5($md5 ='')
    {
        return preg_match('/^[a-f0-9]{32}$/', $md5);
    }

    function check_email_valid()
    {
        $this->form_validation->set_rules('email_val', 'Email', 'is_unique[mhada_users.email]');
        if ($this->form_validation->run() == TRUE)
        {
            echo 1;
        }
        else{
            echo 0;
        }
    }



    function agency_login()
    {
        remember_me_agency();
        if($postInfo = $this->input->post())
        {
            $captcha = $this->session->userdata('captcha');
            if (isset($captcha['word']) && $captcha['word'] == $this->input->post('verification_code')) {

                unset($postInfo['verification_code']);
                $this->session->unset_userdata('captcha');

                $response = $this->agency_model->login($postInfo);
                if($response == 'true'){
                    redirect('agency/projects');
                }else{
                    $this->session->set_flashdata('error', 'Invalid Username or password.Please retry with correct credentials.');
                    redirect('agency/');
                }
            }
            else{
                $this->session->set_flashdata('error','Invalid captcha.Please check the word and retry.');
                redirect('agency/');
            }
        }
        $arrData['captcha'] = generate_captcha();
        $this->load->view('agency_login',$arrData);
    }


}

