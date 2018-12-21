<style type="text/css">
   .m--font-primary{
   display: contents;
   }
</style>
<main class="main-content bgc-grey-100">
   <div id="mainContent">
      <?php
         if($this->session->flashdata('success'))
         {
         ?><div class="alert alert-success alert-dismissable" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  </button><?php echo $this->session->flashdata('success');?></div>
      <?php
         }
         ?>
      <?php
         if($this->session->flashdata('error'))
         {
         ?>
      <div class="alert alert-danger alert-dismissable" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  </button><?php echo $this->session->flashdata('error');?></div>
      <?php
         }
         ?>
      <div class="row gap-20 masonry pos-r">
         <div class="masonry-sizer col-md-12"></div>
         <div class="masonry-item col-12">
            <div class="">
               <div class="m-portlet">
                  <div class="bgc-white bdrs-3 mB-20" style="overflow-x:auto;">
                     <div class="mr-auto m-portlet__head">
                        <h3 class="main-title">
                           <?php echo $survey_numer;?>
                           <a href="<?php echo base_url('schemes/work_for_project/'.$encrypted_url);?>" class="btn m-btn--pill btn-dark float-right mb-3">Back</a>
                        </h3>
                     </div>
                     <div class="m-portlet__body">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="m-portlet">
                                 <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                       <div class="m-portlet__head-title">
                                          <span class="m-portlet__head-icon m--hide">
                                          <i class="flaticon-statistics"></i>
                                          </span>
                                          <h4 class="main-title">
                                             <span>
                                                Add Applicable Stages
                                             </span>
                                          </h4>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="m-portlet__body" style="margin-top: -5%;">
                                    <?php echo form_open('','class="class="m-form m-form--fit m-form--label-align-right" id="stage_select_form"');?>
                                    <div>  
                                    <div class="row">                               
                                       <div class="col-lg-4">
                                          <div class="form-group m-form__group">
                                             <label for="stage_type">
                                                <strong>Stage Type: <span style="color: red">*</span></strong>
                                             </label>
                                             <select class="form-control" name="stage_type" id="stage_type">
                                                <option value="">Select Stage type</option>
                                                <?php
                                                   if(is_array($get_stage_type) && array_filter($get_stage_type))
                                                   {
                                                      foreach($get_stage_type as $each_stage_type){
                                                ?>
                                                         <option value="<?php echo $each_stage_type['id'];?>"><?php echo $each_stage_type['name'];?></option>
                                                <?php
                                                      }
                                                   }
                                                ?>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-lg-4">
                                          <div class="form-group m-form__group">
                                             <label for="stage_name">
                                                <strong>Stage Name: <span style="color: red">*</span></strong>
                                             </label>
                                             <select class="form-control" name="stage_name" id="stage_name">
                                                <option value="">Select Stage Name</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-lg-4">
                                       <div class="form-group m-form__group">
                                           <label for="expected_completion_date">
                                             <strong>Expected completion date: <span style="color: red">*</span></strong>
                                          </label>
                                          <input type="date" name="expected_completion_date" class="form-control" value="<?php echo date('Y-m-d');?>">
                                       </div>
                                    </div>
                                    </div>                                                                  
                                    <br>
                                    <div class="m-form__actions">
                                       <button type="Submit" id="stage_select_form_submit" class="btn btn-primary">
                                       Submit
                                       </button>
                                    </div>                                 
                                    <?php echo form_close();?>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="m-portlet">
                                 <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                       <div class="m-portlet__head-title">
                                          <span class="m-portlet__head-icon m--hide">
                                          <i class="flaticon-statistics"></i>
                                          </span>
                                          <h4 class="main-title">
                                             <span>
                                                Applicable Stages &amp; Delays (If any)
                                             </span>
                                          </h4>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="m-portlet__body" style="margin-top: -5%;">
                                    <div class="m-section mb-0">
                                       <div class="m-section__content mb-0">
                                          <table class="table mb-0 table-hover">
                                             <thead class="thead-default">
                                                <tr>
                                                   <th>
                                                      #
                                                   </th>
                                                   <th>
                                                      Stage Type
                                                   </th>
                                                   <th>
                                                      Stage Name
                                                   </th>
                                                   <th>
                                                      Expected Completion Date
                                                   </th>
                                                   <th>
                                                      Actual Completion Date
                                                   </th>
                                                   <th>
                                                      Delay (In days)
                                                   </th>
                                                   <th>
                                                      Actions
                                                   </th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                               <?php
                                                 if(is_array($get_applicable_stages) && array_filter($get_applicable_stages))
                                                 {
                                                   foreach($get_applicable_stages as $each_app_stage_count => $each_app_stage){
                                               ?>
                                                <tr>
                                                   <th scope="row">
                                                      <?php echo $each_app_stage_count+1;?>
                                                   </th>
                                                   <td>
                                                      <?php echo $each_app_stage['stage_type_name'];?>
                                                   </td>
                                                   <td>
                                                      <?php echo $each_app_stage['stage_name_value'];?>
                                                   </td>
                                                   <td>
                                                      <?php echo date('d-m-Y',strtotime($each_app_stage['expected_completion_date']));?>
                                                   </td>
                                                   <td>
                                                      <?php echo empty($each_app_stage['actual_completion_date'])?'-':date('d-m-Y',strtotime($each_app_stage['actual_completion_date']));?>
                                                   </td>
                                                   <td>
                                                      <?php 
                                                         if(!empty($each_app_stage['actual_completion_date']))
                                                         {
                                                            $date1 = new DateTime($each_app_stage['expected_completion_date']);
                                                            $date2 = new DateTime($each_app_stage['actual_completion_date']);

                                                            $diff = $date2->diff($date1)->format("%a");

                                                            echo $diff;
                                                         }
                                                         else{
                                                            echo '-';
                                                         }
                                                      ?>
                                                   </td>
                                                   <td>
                                                      <?php
                                                         if($each_app_stage['stage_type_name'] == 'Approval' && $each_app_stage['stage_name_value'] == 'Work Order'){
                                                      ?>
                                                         <a href="<?php echo base_url('schemes/add_work_order_details/'.base64_encode($this->encryption->encrypt($survey_numer.'|'.$ref_id.'|'.$work_number)));?>" class="mb-1 btn m-btn--pill btn-primary" target="_blank"><?php echo ($work_order_details_submitted == 1)?'View Work order details':'Add Work Order Details';?></a>
                                                      <?php
                                                         }else{
                                                            echo "-";
                                                         }
                                                      ?>
                                                   </td>
                                                </tr>
                                               <?php
                                                   }
                                                 }
                                                 else{
                                                   echo "<tr><td colspan='7'>No applicable stages present.</td></tr>";
                                                 }
                                               ?>
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="m-portlet">
                                 <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                       <div class="m-portlet__head-title">
                                          <span class="m-portlet__head-icon m--hide">
                                          <i class="flaticon-statistics"></i>
                                          </span>
                                          <h4 class="main-title">
                                             <span>
                                                Update Stage
                                             </span>
                                          </h4>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="m-portlet__body" style="margin-top: -5%;">
                                 <?php
                                    if($allow_stage_submission == 1){
                                  ?>
                                    <?php echo form_open(base_url('schemes/update_stage_status/'.$encrypted_url),'class="class="m-form m-form--fit m-form--label-align-right" id="update_stage_form"');?>
                                    <div>
                                       <div class="row">
                                          <div class="col-lg-6">
                                             <div class="form-group m-form__group">
                                                <label for="stage">
                                                   <strong>Select Stage: <span style="color: red">*</span></strong>
                                                </label>
                                                <select class="form-control" name="stage" id="stage">
                                                   <option value="">Select Stage</option>
                                                   <?php
                                                      if(is_array($get_update_stages) && array_filter($get_update_stages))
                                                      {
                                                         foreach($get_update_stages as $stage_type_name_group => $stage_type_details){
                                                   ?>
                                                         <optgroup label="<?php echo $stage_type_name_group?>">
                                                            <?php
                                                               foreach($stage_type_details as $each_stage_details){
                                                                  $disabled = null;
                                                                  if($each_stage_details['stage_name_value'] == 'Work Order' && $work_order_details_submitted != 1)
                                                                  {
                                                                     $disabled = 'disabled';
                                                                  }
                                                            ?>
                                                               <option <?php echo $disabled;?> value="<?php echo $each_stage_details['stage_name'];?>"><?php echo $each_stage_details['stage_name_value'];?></option>
                                                            <?php
                                                               }
                                                            ?>
                                                         </optgroup>
                                                   <?php
                                                         }
                                                      }
                                                   ?>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-lg-6">
                                             <div class="form-group m-form__group">
                                                 <label for="actual_completion_date">
                                                   <strong>Actual completion date: <span style="color: red">*</span></strong>
                                                </label>
                                                <input type="date" name="actual_completion_date" class="form-control" value="<?php echo date('Y-m-d');?>">
                                             </div>
                                          </div>
                                       </div>
                                       <br>
                                       <div class="m-form__actions">
                                          <button type="Submit" id="update_stage_form_submit" class="btn btn-primary">
                                          Submit
                                          </button>
                                       </div>                                 
                                       <?php echo form_close();?>
                                       <?php
                                          }else{
                                       ?>
                                          <h4>You can access this section only after you have added bill details for stage <strong><?php echo $stage_for_bill;?></strong>.</h4>
                                       <?php
                                          }
                                       ?>
                                    </div>                                    
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="m-portlet">
                                 <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                       <div class="m-portlet__head-title">
                                          <span class="m-portlet__head-icon m--hide">
                                          <i class="flaticon-statistics"></i>
                                          </span>
                                          <h4 class="main-title">
                                             <span>
                                                Change Stage Logs
                                             </span>
                                          </h4>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="m-portlet__body" style="margin-top: -5%; margin-bottom: 0 !important;">
                                    <div class="m-section mb-0">
                                       <div class="m-section__content mb-0">
                                          <table class="table mb-0 table-hover">
                                             <thead class="thead-default">
                                                <tr>
                                                   <th>
                                                      #
                                                   </th>
                                                   <th>
                                                      From Stage
                                                   </th>
                                                   <th>
                                                      To Stage
                                                   </th>
                                                   <th>
                                                      Actual completion Date
                                                   </th>
                                                   <th>
                                                      Stage changed on
                                                   </th>
                                                   <th>
                                                      Stage changed by
                                                   </th>
                                                   <th>
                                                      Bill details
                                                   </th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                               <?php
                                                 if(is_array($get_stage_logs) && array_filter($get_stage_logs))
                                                 {
                                                   foreach($get_stage_logs as $key_status => $each_status_details){
                                               ?>
                                                <tr>
                                                   <th scope="row">
                                                      <?php echo $key_status+1;?>
                                                   </th>
                                                   <td>
                                                      <?php echo $each_status_details['current_status_name'].'('.$each_status_details['current_stage_type'].')';?>
                                                   </td>
                                                   <td>
                                                      <?php echo $each_status_details['new_status_name'].'('.$each_status_details['new_stage_type'].')';?>
                                                   </td>
                                                   <td>
                                                     <?php echo date('d-m-Y',strtotime($each_status_details['actual_completion_date']));?>
                                                   </td>
                                                   <td>
                                                     <?php echo date('d-m-Y',strtotime($each_status_details['submitted_on']));?>
                                                   </td>
                                                   <td>
                                                      <?php echo $each_status_details['submitted_by_name'];?>
                                                   </td>
                                                   <td>
                                                      <?php
                                                         if($each_status_details['bill_generated'] != 1 && in_array($each_status_details['new_status_name'], $get_milestones))
                                                         {
                                                      ?>
                                                         <a class="btn btn-primary" href="<?php echo base_url('schemes/add_bill_details/'.base64_encode($this->encryption->encrypt($survey_numer.'|'.$work_number.'|'.$each_status_details['id'].'|'.$each_status_details['new_status_name'].'|'.$encrypted_url)));?>">Add Bill Details</a>
                                                      <?php
                                                         }elseif($each_status_details['bill_generated'] == 1 && in_array($each_status_details['new_status_name'], $get_milestones)){
                                                      ?>
                                                         <a class="btn btn-primary" href="<?php echo base_url('schemes/view_bill_details/'.base64_encode($this->encryption->encrypt($survey_numer.'|'.$work_number.'|'.$each_status_details['id'].'|'.$each_status_details['new_status_name'].'|'.$encrypted_url)));?>">View Bill Details</a>
                                                      <?php
                                                         }else{
                                                      ?>
                                                         -
                                                      <?php
                                                         }
                                                      ?>
                                                   </td>
                                                </tr>
                                               <?php
                                                   }
                                                 }else{
                                                   echo "<tr><td colspan='6'>No logs found.</td></tr>";
                                                 }
                                               ?>
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</main>
<script src="<?php echo base_url();?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/snippets/pages/user/login.js" type="text/javascript"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script type="text/javascript">
   $(document).on('change','#stage_type',function(){
      var ref_val = $(this).val();
      var csrf = $.cookie('csrf_cookie_name');
      $.ajax({
          url : "<?php echo base_url();?>schemes/get_stages_for_type",
          type: 'post',
          data: {ref_val: ref_val , csrf_test_name: csrf},
          success: function(response){
            $('#stage_name').html(response);
         }
      });
   });
</script>
