<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 * @package MUMBAI SLUM IMPROVEMENT BOARD (MHADA) MUMBAI
 * @author  Sayan Pal
 * @copyright   Copyright (c) 2018
 * @since   Version 1.0
 */
class Masters extends CI_Controller {

	 function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Users_model','users_model');
        check_admin_login();
    }

    function index()
    {
    	$arrData['masters_array'] = array(
    		'Status Master' => 'development_status',
            'Board Master' => 'board_master',
            'Stage Type Master' => 'stage_type_master',
            'Sub-Stages Master' => 'stage_master',
            'Designation Master' => 'designation',
            'Department Master' => 'department',
            'Budget Expense' => 'budget_expense_master',
            'Approving authority' => 'approving_authority_master',
            'Sub board master' => 'sub_board_master',
            'Executive engineer' => 'executive_eng_master',
            'Major' => 'major_master',
            'Work Type' => 'work_type_master',
            'Deputy Engineer' => 'deputy_engineer_master',
            'Sub major' => 'sub_major_master',
            'Ledger' => 'ledger_master',
            'Chief accounts' => 'chief_accounts_master',
            'Sub ledger' => 'sub_ledger_master',
            'Consultant or Architect' => 'consultant_architect',
            'Third party Inspection' => 'third_party_inspection',
            'Government Associated Agency' => 'gov_associated_agency',
    	);

    	$arrData['master_select'] = $master_select = null;

    	if($this->input->get('master_type'))
    	{
    		$arrData['master_select'] = $master_select = $this->input->get('master_type');
    		if(!in_array($master_select, $arrData['masters_array']))
    		{
    			$this->session->set_flashdata('error','Invalid master type.Please select master from available list..');
    			redirect('masters');
    		}

    		$arrData['master_details'] = $this->users_model->get_master_info($master_select);
            if($master_select == 'stage_master')
            {
                $arrData['stage_type_master'] = $this->users_model->get_stage_type_master();
            }
    	}

    	$arrData['middle'] = 'master_details';
        $this->load->view('template_new/template',$arrData);
    }

    function add_details($encrypted_url = '')
    {
    	url_manupulation();
        if($encrypted_url != NULL)
        {
        	$decrypted_url = base64_decode($encrypted_url);
            $table_name = $this->encryption->decrypt($decrypted_url);

            $master_entry = $this->input->post('master_value');
            $stage_type = $this->input->post('stage_type')?$this->input->post('stage_type'):null;

            $table_master = array(
	    		'Status Master' => 'development_status',
                'Board Master' => 'board_master',
                'Stage Type Master' => 'stage_type_master',
                'Sub-Stages Master' => 'stage_master',
                'Designation Master' => 'designation',
                'Department Master' => 'department',
                'Budget Expense' => 'budget_expense_master',
                'Approving authority' => 'approving_authority_master',
                'Sub board master' => 'sub_board_master',
                'Executive engineer' => 'executive_eng_master',
                'Major' => 'major_master',
                'Work Type' => 'work_type_master',
                'Deputy Engineer' => 'deputy_engineer_master',
                'Sub major' => 'sub_major_master',
                'Ledger' => 'ledger_master',
                'Chief accounts' => 'chief_accounts_master',
                'Sub ledger' => 'sub_ledger_master',
                'Consultant or Architect' => 'consultant_architect',
                'Third party Inspection' => 'third_party_inspection',
                'Government Associated Agency' => 'gov_associated_agency',
	    	);

	    	if(!in_array($table_name, $table_master))
	    	{
	    		$this->session->set_flashdata('error','Invalid Master Details.');
        		redirect('masters');
	    	}

	    	if(empty(trim($master_entry)))
	    	{
	    		$this->session->set_flashdata('error','Entry cant be blank.Please enter value and submit to add in master.');
        		redirect('masters?master_type='.$table_name);
	    	}

            if($table_name == 'stage_master' && empty($this->input->post('stage_type')))
            {
                $this->session->set_flashdata('error','Stage Type cant be blank.Please select stage type and submit to add in master.');
                redirect('masters?master_type='.$table_name);
            }

	    	$this->users_model->add_master_entry($table_name,$master_entry,$stage_type);
	    	$this->session->set_flashdata('success','Entry has been successfully added in '.array_search ($table_name, $table_master) . '.');
        	redirect('masters?master_type='.$table_name);
        }
        else{
        	$this->session->set_flashdata('error','Some error has occured.Please retry');
        	redirect('masters');
        }
    }

    function change_status($encrypted_url = '')
    {
    	url_manupulation();
        if($encrypted_url != NULL)
        {
			$decrypted_url = base64_decode($encrypted_url);
            $decrypted_url = $this->encryption->decrypt($decrypted_url);
            $decrypted_url = explode('|', $decrypted_url);

            $table_name = $decrypted_url[0];
            $ref_id = $decrypted_url[1];
            $status = $decrypted_url[2];

            $this->users_model->update_status_master($table_name,$ref_id,$status);

            $this->session->set_flashdata('success','Status has been successfully updated for master entry.');
        	redirect('masters?master_type='.$table_name);
        }
        else{
        	$this->session->set_flashdata('error','Some error has occured.Please retry');
        	redirect('masters');
        }
    }
}