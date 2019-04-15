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
         ?>
      <div class="alert alert-success alert-dismissable" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
         </button><?php echo $this->session->flashdata('success');?>
      </div>
      <?php
         }
         ?>
      <?php
         if($this->session->flashdata('error'))
         {
         ?>
      <div class="alert alert-danger alert-dismissable" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
         </button><?php echo $this->session->flashdata('error');?>
      </div>
      <?php
         }
         ?>
      <div class="row gap-20 pos-r">
         <div class="col-12">
            <div class="">
               <div class="m-portlet">
                  <div class="bgc-white bdrs-3">
                     <div class="mr-auto m-portlet__head">
                        <h3 class="main-title"><?php echo $project_code;?>
                           <a href="<?php echo base_url('projects');?>" class="btn m-btn--pill btn-dark float-right mb-3">Back</a>
                        </h3>
                     </div>
                     <div class="m-portlet__body">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="m-portlet m_portlet_tools_project">
                                 <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                       <div class="m-portlet__head-title">
                                          <span class="m-portlet__head-icon m--hide">
                                          <i class="flaticon-statistics"></i>
                                          </span>
                                          <h4 class="main-title">
                                             <span>
                                                Approved DUs
                                             </span>
                                          </h4>
                                       </div>
                                    </div>
                                    <div class="m-portlet__head-tools">
                                       <ul class="m-portlet__nav">
                                          <li class="m-portlet__nav-item">
                                             <a href="#" data-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon" title="" data-original-title="Collapse">
                                             <i class="la la-angle-down"></i>
                                             </a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div class="m-portlet__body" style="margin-top: -5%;">

                                     <div class="row">
                                         <div class="col-lg-6">
                                             <h5>EWS</h5>
                                             <p><?php echo isset($project_details['EWS'])?$project_details['EWS']:null;?></p>
                                         </div>
                                         <div class="col-lg-6">
                                             <h5>LIG</h5>
                                             <p><?php echo isset($project_details['LIG'])?$project_details['LIG']:null;?></p>
                                         </div>
                                     </div>

                                     <div class="row">
                                         <div class="col-lg-6">
                                             <h5>MIG</h5>
                                             <p><?php echo isset($project_details['MIG'])?$project_details['MIG']:null;?></p>
                                         </div>
                                         <div class="col-lg-6">
                                             <h5>HIG</h5>
                                             <p><?php echo isset($project_details['HIG'])?$project_details['HIG']:null;?></p>
                                         </div>
                                     </div>

                                     <div class="row">
                                         <div class="col-lg-6">
                                             <h5>Total DUs</h5>
                                             <p><?php echo isset($project_details['total_dus'])?$project_details['total_dus']:null;?></p>
                                             <input type="hidden" name="approved_total_dus" id="approved_total_dus" value="<?php echo isset($project_details['total_dus'])?$project_details['total_dus']:0;?>" />
                                             <input type="hidden" name="work_started" id="work_started" value="<?php echo isset($started_work_dus[0]['total_dus_work_started'])?$started_work_dus[0]['total_dus_work_started']:0;?>" />

                                             <input type="hidden" name="approved_EWS_dus" id="approved_EWS_dus" value="<?php echo isset($project_details['EWS'])?$project_details['EWS']:0;?>" />
                                             <input type="hidden" name="EWS_work_started" id="EWS_work_started" value="<?php echo isset($started_work_dus[0]['EWS'])?$started_work_dus[0]['EWS']:0;?>" />

                                             <input type="hidden" name="approved_LIG_dus" id="approved_LIG_dus" value="<?php echo isset($project_details['LIG'])?$project_details['LIG']:0;?>" />
                                             <input type="hidden" name="LIG_work_started" id="LIG_work_started" value="<?php echo isset($started_work_dus[0]['LIG'])?$started_work_dus[0]['LIG']:0;?>" />

                                             <input type="hidden" name="approved_MIG_dus" id="approved_MIG_dus" value="<?php echo isset($project_details['MIG'])?$project_details['MIG']:0;?>" />
                                             <input type="hidden" name="MIG_work_started" id="MIG_work_started" value="<?php echo isset($started_work_dus[0]['MIG'])?$started_work_dus[0]['MIG']:0;?>" />

                                             <input type="hidden" name="approved_HIG_dus" id="approved_HIG_dus" value="<?php echo isset($project_details['HIG'])?$project_details['HIG']:0;?>" />
                                             <input type="hidden" name="HIG_work_started" id="HIG_work_started" value="<?php echo isset($started_work_dus[0]['HIG'])?$started_work_dus[0]['HIG']:0;?>" />
                                         </div>
                                         <div class="col-lg-6">
                                             <h5>Project cost EWS</h5>
                                             <p><?php echo isset($project_details['project_cost_ews'])?$project_details['project_cost_ews']:null;?></p>
                                         </div>
                                     </div>

                                     <div class="row">
                                         <div class="col-lg-6">
                                             <h5>Project cost total</h5>
                                             <p><?php echo isset($project_details['project_cost_total'])?$project_details['project_cost_total']:null;?> (Rs. in Cr.)</p>
                                         </div>

                                         <div class="col-lg-6">
                                             <h5>DRP Submitted</h5>
                                             <p><?php echo ($project_details['is_dpr_submitted']==1)?'Yes':'No';?></p>
                                         </div>
                                     </div>
                                 </div>
                            </div>
                          </div>
                        </div>


                         <div class="row">
                             <div class="col-md-12">
                                 <div class="m-portlet m_portlet_tools_project">
                                     <div class="m-portlet__head">
                                         <div class="m-portlet__head-caption">
                                             <div class="m-portlet__head-title">
                                          <span class="m-portlet__head-icon m--hide">
                                          <i class="flaticon-statistics"></i>
                                          </span>
                                                 <h4 class="main-title">
                                             <span>
                                                DUs For Which Work Is Started
                                             </span>
                                                 </h4>
                                             </div>
                                         </div>
                                         <div class="m-portlet__head-tools">
                                             <ul class="m-portlet__nav">
                                                 <li class="m-portlet__nav-item">
                                                     <a href="#" data-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon" title="" data-original-title="Collapse">
                                                         <i class="la la-angle-down"></i>
                                                     </a>
                                                 </li>
                                             </ul>
                                         </div>
                                     </div>
                                     <div class="m-portlet__body" style="margin-top: -5%;">
                                         <?php echo form_open_multipart('','class="class="m-form m-form--fit m-form--label-align-right" id="scheme_form"');?>

                                         <div class="row" style="margin-top: 2%">
                                             <div class="col-lg-6">
                                                 <div class="form-group">
                                                     <label for="EWS" class="form-control-label">
                                                         <strong>EWS<span style="color: red">*</span></strong>
                                                     </label>
                                                     <input type="text" name="EWS" class="form-control total_dus" id="EWS" value="<?php echo $started_work_dus[0]['EWS']; ?>">
                                                 </div>
                                             </div>
                                             <div class="col-lg-6">
                                                 <div class="form-group">
                                                     <label for="LIG" class="form-control-label">
                                                         <strong>LIG <span style="color: red">*</span></strong>
                                                     </label>
                                                     <input  type="text" name="LIG" class="form-control total_dus" id="LIG" value="<?php echo $started_work_dus[0]['LIG']; ?>">
                                                 </div>
                                             </div>
                                         </div>

                                         <div class="row" style="margin-top: 2%">
                                             <div class="col-lg-6">
                                                 <div class="form-group">
                                                     <label for="MIG" class="form-control-label">
                                                         <strong>MIG <span style="color: red">*</span></strong>
                                                     </label>
                                                     <input type="text" name="MIG" class="form-control total_dus" id="MIG" value="<?php echo $started_work_dus[0]['MIG']; ?>">
                                                 </div>
                                             </div>
                                             <div class="col-lg-6">
                                                 <div class="form-group">
                                                     <label for="HIG" class="form-control-label">
                                                         <strong>HIG <span style="color: red">*</span></strong>
                                                     </label>
                                                     <input type="text" name="HIG" class="form-control total_dus" id="HIG" value="<?php echo $started_work_dus[0]['HIG']; ?>">
                                                 </div>
                                             </div>
                                         </div>


                                         <div class="row" style="margin-top: 2%">
                                             <div class="col-lg-6">
                                                 <div class="form-group">
                                                     <label for="total_dus" class="form-control-label">
                                                         <strong>Total Dus <span style="color: red">*</span></strong>
                                                     </label>
                                                     <input readonly type="text" name="total_dus_work_started" class="form-control" id="total_dus" value="<?php echo $started_work_dus[0]['total_dus_work_started']; ?>">
                                                 </div>
                                             </div>
                                             <div class="col-lg-6">

                                                 <div class="form-group">
                                                     <label for="probable_start_date_of_project" class="form-control-label">
                                                         <strong>Upload Beneficiary List</strong>
                                                     </label>
                                                     <input type="file" class="form-control " id="beneficiary_list_path" name="beneficiary_list_path">
                                                 </div>

                                             </div>
                                         </div>
                                         <div class="row" style="margin-top: 2%">
                                             <div class="col-lg-6">

                                         <div class="m-form__actions">
                                             <br>
                                             <button type="Submit" id="submit_scheme_form" class="btn m-btn--pill btn-primary">
                                                 Save
                                             </button>
                                         </div>
                                             </div>
                                         </div>

                                         <?php echo form_close();?>
                                     </div>

                                 </div>
                             </div>


                         </div>

                         <div class="row" id="form_to_display_stage">
                             <div class="col-md-12">
                                 <div class="m-portlet m_portlet_tools_project">
                                     <div class="m-portlet__head">
                                         <div class="m-portlet__head-caption">
                                             <div class="m-portlet__head-title">
                                          <span class="m-portlet__head-icon m--hide">
                                          <i class="flaticon-statistics"></i>
                                          </span>
                                                 <h4 class="main-title">
                                             <span>
                                                Update Stage of a Project
                                             </span>
                                                 </h4>
                                             </div>
                                         </div>
                                         <div class="m-portlet__head-tools">
                                             <ul class="m-portlet__nav">
                                                 <li class="m-portlet__nav-item">
                                                     <a href="#" data-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon" title="" data-original-title="Collapse">
                                                         <i class="la la-angle-down"></i>
                                                     </a>
                                                 </li>
                                             </ul>
                                         </div>
                                     </div>
                                     <div class="m-portlet__body" style="margin-top: -5%;">
                                         <div class="row">
                                             <div class="col-lg-6">
                                                 <h5>No Of DUs Under Construction</h5> <input type="hidden" name="dus_for_which_work_started" id="dus_for_which_work_started" value="<?php echo $dus_for_which_work_started; ?>"/>
                                                 <p><?php echo isset($dus_for_which_work_started)?$dus_for_which_work_started:'-';?></p>
                                             </div>
                                             <div class="col-lg-6">
                                                 <h5>Last Update Date</h5>
                                                 <p><?php echo isset($last_updated_date) && $last_updated_date!='' ?date('d-m-Y',strtotime($last_updated_date)):' - ';?></p>
                                             </div>
                                         </div>

                                        <div class="table-responsive">
                                         <table class="table mb-0 table-hover" id="display_table">
                                             <thead class="thead-light">
                                             <tr>
                                                 <th scope="col">Stage</th>
                                                 <th scope="col">No Of DUs</th>
                                                 <th scope="col">Additional Information</th>
                                                 <th scope="col">Files</th>
                                             </tr>
                                             </thead>
                                             <tbody>

                                             <?php
                                             foreach($project_stages_master as $key=>$stage) {
                                             ?>
                                                 <tr>
                                                     <td>
                                                         <h5><?php echo $stage['stage']; ?></h5>
                                                     </td>

                                                     <td>
                                                        <!-- --><?php /*if(isset($project_stages_dus_details[$stage['id']]['no_of_dus'])) { echo $project_stages_dus_details[$stage['id']]['no_of_dus']; } else { echo '0';} */?>
                                                         <?php
                                                         if($key == 1){
                                                             echo $project_details['plint_level'];
                                                         }elseif($key == 2){
                                                             echo $project_details['floor_level'];
                                                         }elseif($key == 3){
                                                             echo $project_details['project_completion'];
                                                         }?>
                                                     </td>

                                                     <td>
                                                         <?php if(isset($project_stages_dus_details[$stage['id']]['additional_information'])) { echo $project_stages_dus_details[$stage['id']]['additional_information']; }  else { echo '-';}  ?>
                                                     </td>

                                                     <?php  if($key==0) { ?>
                                                         <td rowspan="4"><a href="<?php echo base_url('projects/documents/'.$encrypted_url);?>" target="_blank" >Documents </a> | <a href="<?php echo base_url('projects/photos/'.$encrypted_url);?>" target="_blank">Photos-videos</a></td>
                                                     <?php } ?>
                                                 </tr>
                                             <?php
                                                }
                                             ?>

                                                 <!--<tr>
                                                     <td><?php if(isset($total_dus_under_construction)) { echo $total_dus_under_construction; } ?></td>
                                                    <td colspan="9"></td>
                                                 </tr>-->
                                             </tbody>
                                         </table>
                                        </div>

                                         <div class="m-form__actions">
                                             <br>
                                             <button type="Submit" id="update_stage" name="update_stage" class="btn m-btn--pill btn-primary">
                                                 Update
                                             </button>
                                         </div>

                                     </div>
                                 </div>
                             </div>
                         </div>


                         <div class="row" id="form_to_update_stage" style="display:none">
                             <div class="col-md-12">
                                 <div class="m-portlet m_portlet_tools_project">
                                     <div class="m-portlet__head">
                                         <div class="m-portlet__head-caption">
                                             <div class="m-portlet__head-title">
                                          <span class="m-portlet__head-icon m--hide">
                                          <i class="flaticon-statistics"></i>
                                          </span>
                                                 <h4 class="main-title">
                                             <span>
                                                Update Stage of a Project
                                             </span>
                                                 </h4>
                                             </div>
                                         </div>
                                         <div class="m-portlet__head-tools">
                                             <ul class="m-portlet__nav">
                                                 <li class="m-portlet__nav-item">
                                                     <a href="#" data-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon" title="" data-original-title="Collapse">
                                                         <i class="la la-angle-down"></i>
                                                     </a>
                                                 </li>
                                             </ul>
                                         </div>
                                     </div>
                                     <div class="m-portlet__body" style="margin-top: -5%;">
                                         <?php echo form_open('','class="class="m-form m-form--fit m-form--label-align-right" id="save_stage_form"');?>
                                         <div class="row">
                                             <div class="col-lg-6">
                                                 <h5>No Of DUs Under Construction</h5> <input type="hidden" name="dus_for_which_work_started" id="dus_for_which_work_started" value="<?php echo $dus_for_which_work_started; ?>"/>
                                                 <p><?php echo isset($dus_for_which_work_started)?$dus_for_which_work_started:'-';?></p>
                                             </div>
                                             <div class="col-lg-6">
                                                 <h5>Last Update Date</h5>
                                                 <p><?php echo isset($last_updated_date) && $last_updated_date!='' ?date('d-m-Y',strtotime($last_updated_date)):' - ';?></p>
                                             </div>
                                         </div>

                                         <table class="table mb-0 table-hover">
                                             <thead class="thead-light">
                                             <tr>
                                                 <th scope="col">Stage</th>
                                                 <th scope="col">No Of DUs</th>
                                                 <th scope="col">Additional Information</th>
                                                 <th scope="col">Files</th>
                                             </tr>
                                             </thead>
                                             <tbody>
                                             <?php
                                             foreach($project_stages_master as $key=>$stage) {
                                                 ?>
                                                 <tr>

                                                     <td>
                                                         <h5><?php echo $stage['stage']; ?></h5>
                                                     </td>

                                                     <td><input type="text" class="total_dus_to_update form-control" name="stage_dus[<?php echo $stage['id']; ?>][no_of_dus]" value="<?php if(isset($project_stages_dus_details[$stage['id']]['no_of_dus'])) { echo $project_stages_dus_details[$stage['id']]['no_of_dus']; } else { echo '0';} ?>" /> </td>
                                                     <td><input type="text" class="form-control" name="stage_dus[<?php echo $stage['id']; ?>][additional_information]" value="<?php if(isset($project_stages_dus_details[$stage['id']]['additional_information'])) { echo $project_stages_dus_details[$stage['id']]['additional_information']; } ?>" /> </td>
                                                     <!-- <?php if($stage['id']!=3) {
                                                         $offset = $stage['id']-1;
                                                         if($stage['id']==4) { $offset = 2; }

                                                         if(!isset($goi_fund_details[$offset]['total_amount'])) { $goi_amount = 0; } else { $goi_amount = $goi_fund_details[$offset]['total_amount']; }
                                                         if(!isset($gom_fund_details[$offset]['total_amount'])) { $gom_amount = 0; } else { $gom_amount = $gom_fund_details[$offset]['total_amount']; }

                                                         ?>
                                                         <td><?php if(isset($goi_fund_details[$offset]['total_amount'])) { echo $goi_fund_details[$offset]['total_amount']; } else { echo '-'; } ?></td>
                                                         <td><?php if(isset($gom_fund_details[$offset]['total_amount'])) { echo $gom_fund_details[$offset]['total_amount']; } else { echo '-'; } ?></td>
                                                         <td><?php echo ($goi_amount + $gom_amount); ?></td>
                                                         <td><?php echo ($goi_amount + $gom_amount); ?></td>
                                                     <?php } else { ?>
                                                         <td>-</td>
                                                     <?php } ?>
                                                     <td><?php if(isset($project_stages_dus_details[$stage['id']]['expense_by_implementing_agency'])) { echo $project_stages_dus_details[$stage['id']]['expense_by_implementing_agency']; } else { echo '0';} ?></td> -->
                                                     <?php
                                                     if($key==0)
                                                     {
                                                         ?>
                                                         <td rowspan="4"><a href="<?php echo base_url('projects/documents/'.$encrypted_url);?>" target="_blank" >Documents </a> | <a href="<?php echo base_url('projects/photos/'.$encrypted_url);?>" target="_blank">Photos-videos</a></td>
                                                     <?php } ?>
                                                 </tr>
                                                 <?php
                                             }
                                             ?>

                                             <!--<tr>
                                                 <td><h5>Total</h5></td>
                                                 <td><input readonly class="form-control" type="text" name="total_dus_to_update" id="total_dus_to_update" value="<?php if(isset($total_dus_under_construction)) { echo $total_dus_under_construction; } ?>" /></td>
                                                 <td colspan="9"></td>
                                             </tr>-->
                                             </tbody>
                                         </table>

                                         <div class="m-form__actions">
                                             <br>
                                             <button type="button" id="save_stage" name="save_stage" class="btn m-btn--pill btn-primary">
                                                 Save
                                             </button>

                                             <button type="button" id="cancel_stage" name="cancel_stage" class="btn m-btn--pill btn-dark">
                                                 Cancel
                                             </button>
                                         </div>

                                         <?php echo form_close();?>

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
<script>
    $(document).ready(function(){

        $('.total_dus').keypress(function(event) {
            var $this = $(this);
            if ((event.which != 46 || $this.val().indexOf('.') != -1) &&
                ((event.which < 48 || event.which > 57) &&
                    (event.which != 0 && event.which != 8))) {
                event.preventDefault();
            }

            var text = $(this).val();
            if ((event.which == 46) && (text.indexOf('.') == -1)) {
                setTimeout(function() {
                    if ($this.val().substring($this.val().indexOf('.')).length > 3) {
                        $this.val($this.val().substring(0, $this.val().indexOf('.') + 3));
                    }
                }, 1);
            }

            if ((text.indexOf('.') != -1) &&
                (text.substring(text.indexOf('.')).length > 2) &&
                (event.which != 0 && event.which != 8) &&
                ($(this)[0].selectionStart >= text.length - 2)) {
                event.preventDefault();
            }

            // skip for arrow keys
            if(event.which >= 37 && event.which <= 40) return;

        });

        $(document).on("focus", ".total_dus", function () {
        });


        $(document).on("keyup", ".total_dus", function () {


            var type_of_du = $(this).attr('id');

            if($(this).val() !=0 && $(this).val() !='') {

                var approved_type_du = $('#approved_' + type_of_du + '_dus').val();
                var type_work_started = $('#'+type_of_du +'_work_started').val();

                var type_work_can_start = approved_type_du - type_work_started;

                if ($(this).val() > type_work_can_start) {
                    alert(type_of_du + ' dus can not be greater than approved '+type_of_du + ' Dus.');
                    $(this).val('0');
                    $('#total_dus').attr('value', '0');
                    return false;
                }
            }else if($(this).val() == '')
            {
             //   $(this).val('0');
            }




            var sum = 0;
            $(".total_dus").each(function() {
             //   sum += parseInt($(this).val());
                var dusVal = (!$(this).val() || isNaN($(this).val())) ? 0 : $(this).val();
                sum += +parseFloat(dusVal);
            });

            $('#total_dus').attr('value',sum);


          var approved_total_dus = $('#approved_total_dus').val();

            var work_started = $('#work_started').val();

            var work_can_start =  approved_total_dus - work_started;

          if(sum > work_can_start)
          {
              alert('Total Dus can not be greater than approved Dus.');
              $('.total_dus').val('0');
              $('#total_dus').attr('value','0');
              return false;
          }

        });

        $('#update_stage').click(function(){

            $('#form_to_display_stage').hide();
            $('#form_to_update_stage').show();
        });

        $('#cancel_stage').click(function(){

            $('#form_to_update_stage').hide();
            $('#form_to_display_stage').show();
        });



        $("#save_stage").click(function(){

            var sum = 0;
            $(".total_dus_to_update").each(function() {
                sum += parseInt($(this).val());
            });

            var dus_for_which_work_started = $('#dus_for_which_work_started').val();
            var approved_total_dus = $('#approved_total_dus').val();

            if(sum < dus_for_which_work_started)
            {
                alert('Total DUs can not be less than DUs for which work has started.');
                $(this).val('0');
                return false;
            }else if(sum > approved_total_dus)
            {
                alert('Total DUs can not be greater than approved DUs.');
                $(this).val('0');
                return false;
            }





            $.ajax({
                type: "POST",
                url: "projects/save_stage_dus_details",
                data: $('#save_stage_form').serialize(),
                dataType: "html",
                success: function(data){
                    console.log(data);
                    location.reload();
                },
                error: function() { alert("Error posting form."); }
            });

        });


        $('.total_dus').keypress(function(event) {
            var $this = $(this);
            if ((event.which != 46 || $this.val().indexOf('.') != -1) &&
                ((event.which < 48 || event.which > 57) &&
                    (event.which != 0 && event.which != 8))) {
                event.preventDefault();
            }

            var text = $(this).val();
            if ((event.which == 46) && (text.indexOf('.') == -1)) {
                setTimeout(function() {
                    if ($this.val().substring($this.val().indexOf('.')).length > 3) {
                        $this.val($this.val().substring(0, $this.val().indexOf('.') + 3));
                    }
                }, 1);
            }

            if ((text.indexOf('.') != -1) &&
                (text.substring(text.indexOf('.')).length > 2) &&
                (event.which != 0 && event.which != 8) &&
                ($(this)[0].selectionStart >= text.length - 2)) {
                event.preventDefault();
            }
        });


         /*   $(document).on("blur", ".total_dus_to_update", function () {

                 var sum = 0;
                 $(".total_dus_to_update").each(function() {
                     sum += parseInt($(this).val());
                 });

              //   $('#total_dus_to_update').attr('value',sum);

                 var dus_for_which_work_started = $('#dus_for_which_work_started').val();
                 var approved_total_dus = $('#approved_total_dus').val();

                 if(sum < dus_for_which_work_started)
                 {
                     alert('Total DUs can not be less than DUs for which work has started.');
                     $(this).val('0');
                    // $('#total_dus_to_update').attr('value','0');
                     return false;
                 }else if(sum > approved_total_dus)
                 {
                     alert('Total DUs can not be greater than approved DUs.');
                     $(this).val('0');
                     //$('#total_dus_to_update').attr('value','0');
                     return false;
                 }



        });*/




    });
</script>
