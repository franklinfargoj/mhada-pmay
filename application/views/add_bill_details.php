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
      <div class="row gap-20">
         <div class="masonry-sizer col-md-12"></div>
         <div class="masonry-item col-12">
            <div class="">
               <div class="m-portlet">
                  <div class="bgc-white bdrs-3" style="overflow-x:auto;">
                     <div class="">
                        <div class="">
                           <div class="">
                              <div class="m-portlet__head">
                                 <div class="m-portlet__head-caption">
                                    <h3 class="main-title">
                                       Bill Details
                                       <a href="<?php echo base_url('schemes/update_stage/'.$revert_url);?>" class="btn m-btn--pill btn-outline-dark float-right">Back</a>
                                    </h3>
                                 </div>
                              </div>
                              <?php
                                 if($get_log_status['bill_generated'] != 1){
                              ?>
                              <?php echo form_open('','class="class="m-form m-form--fit m-form--label-align-right" id="bill_form"');?>
                              <div class="m-portlet__body" style="margin-top: -3%;">
                                 <div class="row">
                                    <div class="col-lg-6">
                                       <label for="project_type" class="form-control-label">
                                       <strong>Project Type:</strong>
                                       </label>
                                       <?php echo $project_stage_name;?>
                                    </div>
                                 </div>
                                 <div class="row" style="margin-top: 2%">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="bill_raised" class="form-control-label">
                                          <strong>Bill Raised <span style="color: red">*</span></strong>
                                          </label>
                                          <select class="form-control" id="bill_raised" name="bill_raised">
                                             <option value="">Select</option>
                                             <option value="Yes">Yes</option>
                                             <option value="No">No</option>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                  <div class="row bill_raised_yes" style="display: none;">
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                          <label for="bill_raised_amount" class="form-control-label">
                                          <strong>Current year Project Budget:</strong>
                                          </label>
                                          <?php echo $current_year_project_cost;?>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row bill_raised_yes" style="display: none;">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="bill_raised_amount" class="form-control-label">
                                          <strong>Bill raised for amount: <span style="color: red">*</span></strong>
                                          </label>
                                          <input class="form-control" id="bill_raised_amount" type="number" name="bill_raised_amount">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row bill_raised_yes" style="display: none;">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="invoice_number_bill" class="form-control-label">
                                          <strong>Invoice number: <span style="color: red">*</span></strong>
                                          </label>
                                          <input class="form-control" id="invoice_number_bill" name="invoice_number_bill">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row bill_raised_yes" style="display: none;">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="bill_status" class="form-control-label">
                                          <strong>Bill Status: <span style="color: red">*</span></strong>
                                          </label>
                                          <select class="form-control" id="bill_status" name="bill_status">
                                             <option value="">Select</option>
                                             <option value="Approved">Approved</option>
                                             <option value="Not Approved">Not Approved</option>
                                             <option value="Pending">Pending</option>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="m-form__actions">
                                    <br>
                                    <button type="Submit" id="bill_form_submit" class="btn m-btn--pill btn-primary">
                                    Submit
                                    </button>
                                 </div>
                                 <?php echo form_close();?>
                                 <?php
                                    }else{
                                 ?>
                                 <div class="m-portlet__body" style="margin-top: -3%;">
                                    <div class="row">
                                       <div class="col-lg-6">
                                          <label for="project_type" class="form-control-label">
                                          <strong>Project Type:</strong>
                                          </label>
                                          <?php echo $project_stage_name;?>
                                       </div>
                                    </div>
                                 <div class="row" style="margin-top: 2%">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="bill_raised" class="form-control-label">
                                          <strong>Bill Raised: </strong>
                                          </label>
                                          <?php echo $get_log_status['bill_raised'];?>
                                       </div>
                                    </div>
                                 </div>
                                 <?php
                                    if($get_log_status['bill_raised'] == 'Yes'){
                                 ?>
                                 <div class="row" style="margin-top: 2%">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="bill_raised" class="form-control-label">
                                          <strong>Current year Project Budget: </strong>
                                          </label>
                                          <?php echo $current_year_project_cost;?>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row" style="margin-top: 2%">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="bill_raised" class="form-control-label">
                                          <strong>Bill raised for amount: </strong>
                                          </label>
                                          <?php echo $get_log_status['bill_raised_amount'];?>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row" style="margin-top: 2%">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="bill_raised" class="form-control-label">
                                          <strong>Invoice number: </strong>
                                          </label>
                                          <?php echo $get_log_status['invoice_number_bill'];?>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row" style="margin-top: 2%">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="bill_raised" class="form-control-label">
                                          <strong>Bill Status: </strong>
                                          </label>
                                          <?php echo $get_log_status['bill_status'];?>
                                       </div>
                                    </div>
                                 </div>
                                 <?php
                                    }
                                 ?>
                                 <?php
                                    }
                                 ?>
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
   $(document).on('change','#bill_raised',function(){
     var bill_raised_val = $(this).val();
   
     if(bill_raised_val == 'Yes')
     {
      $('.bill_raised_yes').show();
     }else{
      $('.bill_raised_yes').hide();
     }
   });
</script>