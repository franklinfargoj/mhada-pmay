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
            <div class="m-portlet">
               <div class="bgc-white bdrs-3 mB-20" style="overflow-x:auto;">
                     <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                           <h3 class="main-title">
                              Work Order Details
                              <a href="<?php echo base_url('schemes/update_stage/'.$encrypted_url);?>" class="btn m-btn--pill btn-outline-dark float-right">Back</a>
                           </h3>
                        </div>
                     </div>
                     <?php
                        if($work_order_details_submitted != 1){
                     ?>
                     <?php echo form_open_multipart('','class="class="m-form m-form--fit m-form--label-align-right" id="work_order_form"');?>
                     <div class="m-portlet__body" style="margin-top: -3%;">
                        <div class="row">
                           <div class="col-lg-6">
                              <p><strong>Work Name:</strong> <?php echo $work_details['work_name_details'];?></p>
                           </div>
                           <div class="col-lg-6">
                              <p><strong>Department Name:</strong> <?php echo $work_details['department_name'];?></p>
                           </div>
                        </div>
                        <div class="row" style="margin-top: 5%">
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="work_order_no" class="form-control-label">
                                 <strong>Work order no <span style="color: red">*</span></strong>
                                 </label>
                                 <input type="text" name="work_order_no" class="form-control" id="work_order_no">
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="work_order_date" class="form-control-label">
                                 <strong>Work order date <span style="color: red">*</span></strong>
                                 </label>
                                 <input type="date" name="work_order_date" class="form-control" id="work_order_date">
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="implementing_agency" class="form-control-label">
                                 <strong>Implementing agency <span style="color: red">*</span></strong>
                                 </label>
                                 <input type="text" name="implementing_agency" class="form-control" id="implementing_agency">
                              </div>
                           </div>                           
                        </div>
                        <div class="row">
                           <div class="col-lg-4">
                              <div class="form-group m-form__group">
                                 <label for="consultant_architect" class="form-control-label">
                                 <strong>Consultant/Architect <span style="color: red">*</span></strong>
                                 </label>
                                 <select name="consultant_architect" class="form-control" id="consultant_architect">
                                    <option value="">Select consultant/architect</option>
                                    <?php
                                       if(is_array($consultant_architect) && array_filter($consultant_architect))
                                       {
                                          foreach($consultant_architect as $each_cons){
                                       ?>
                                    <option value="<?php echo $each_cons['id'];?>"><?php echo $each_cons['name'];?></option>
                                    <?php
                                       }
                                       }
                                       ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="third_party_agency" class="form-control-label">
                                 <strong>Third party Inspection Agency <span style="color: red">*</span></strong>
                                 </label>
                                 <select name="third_party_agency" class="form-control" id="third_party_agency">
                                    <option value="">Select third party inspection agency</option>
                                    <?php
                                       if(is_array($third_party_inspection) && array_filter($third_party_inspection))
                                       {
                                          foreach($third_party_inspection as $each_third_party){
                                       ?>
                                    <option value="<?php echo $each_third_party['id'];?>"><?php echo $each_third_party['name'];?></option>
                                    <?php
                                       }
                                       }
                                       ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="gov_associated_agency" class="form-control-label">
                                 <strong>Gov associated Agency <span style="color: red">*</span></strong>
                                 </label>
                                 <select name="gov_associated_agency" class="form-control" id="gov_associated_agency">
                                    <option value="">Select gov. associated agency</option>
                                    <?php
                                       if(is_array($gov_associated_agency) && array_filter($gov_associated_agency))
                                       {
                                          foreach($gov_associated_agency as $each_agency){
                                       ?>
                                    <option value="<?php echo $each_agency['id'];?>"><?php echo $each_agency['name'];?></option>
                                    <?php
                                       }
                                       }
                                       ?>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="tender_submission_date" class="form-control-label">
                                 <strong>Tender Submission date <span style="color: red">*</span></strong>
                                 </label>
                                 <input type="date" name="tender_submission_date" class="form-control" id="tender_submission_date">
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="sd_current" class="form-control-label">
                                 <strong>SD Current <span style="color: red">*</span></strong>
                                 </label>
                                 <input type="text" name="sd_current" class="form-control" id="sd_current">
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="fdr_bank_name" class="form-control-label">
                                 <strong>FDR Bank Name <span style="color: red">*</span></strong>
                                 </label>
                                 <input type="text" name="fdr_bank_name" class="form-control" id="fdr_bank_name">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="agreement_seal_date" class="form-control-label">
                                 <strong>Agreement seal date <span style="color: red">*</span></strong>
                                 </label>
                                 <input type="date" name="agreement_seal_date" class="form-control" id="agreement_seal_date">
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="agreement_number" class="form-control-label">
                                 <strong>Agreement No <span style="color: red">*</span></strong>
                                 </label>
                                 <input type="text" name="agreement_number" class="form-control" id="agreement_number">
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="fdr_number" class="form-control-label">
                                 <strong>FDR Number <span style="color: red">*</span></strong>
                                 </label>
                                 <input type="text" name="fdr_number" class="form-control" id="fdr_number">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="fdr_amount" class="form-control-label">
                                 <strong>FDR Amount <span style="color: red">*</span></strong>
                                 </label>
                                 <input type="text" name="fdr_amount" class="form-control" id="fdr_amount">
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="fdr_date" class="form-control-label">
                                 <strong>FDR Date <span style="color: red">*</span></strong>
                                 </label>
                                 <input type="date" name="fdr_date" class="form-control" id="fdr_date">
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="emd_number" class="form-control-label">
                                 <strong>EMD Number <span style="color: red">*</span></strong>
                                 </label>
                                 <input type="text" name="emd_number" class="form-control" id="emd_number">
                              </div>
                           </div>
                        </div>  
                        <div class="row">
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="emd_amount" class="form-control-label">
                                 <strong>EMD Amount <span style="color: red">*</span></strong>
                                 </label>
                                 <input type="text" name="emd_amount" class="form-control" id="emd_amount">
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="emd_date" class="form-control-label">
                                 <strong>EMD Date <span style="color: red">*</span></strong>
                                 </label>
                                 <input type="date" name="emd_date" class="form-control" id="emd_date">
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="stamp_duty_amt" class="form-control-label">
                                 <strong>Stamp Duty Amt <span style="color: red">*</span></strong>
                                 </label>
                                 <input type="text" name="stamp_duty_amt" class="form-control" id="stamp_duty_amt">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="bank_solvency_amt" class="form-control-label">
                                 <strong>Bank Solvency Amt <span style="color: red">*</span></strong>
                                 </label>
                                 <input type="text" name="bank_solvency_amt" class="form-control" id="bank_solvency_amt">
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="bank_solvency_number" class="form-control-label">
                                 <strong>Bank Solvency No <span style="color: red">*</span></strong>
                                 </label>
                                 <input type="text" name="bank_solvency_number" class="form-control" id="bank_solvency_number">
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="bank_guarantee_amt" class="form-control-label">
                                 <strong>Bank Guanrantee Amt <span style="color: red">*</span></strong>
                                 </label>
                                 <input type="text" name="bank_guarantee_amt" class="form-control" id="bank_guarantee_amt">
                              </div>
                           </div>
                        </div> 
                        <div class="row">
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="bank_guarantee_number" class="form-control-label">
                                 <strong>Bank Guanrantee No <span style="color: red">*</span></strong>
                                 </label>
                                 <input type="text" name="bank_guarantee_number" class="form-control" id="bank_guarantee_number">
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="bank_guarantee_date" class="form-control-label">
                                 <strong>Bank Guanrantee date <span style="color: red">*</span></strong>
                                 </label>
                                 <input type="date" name="bank_guarantee_date" class="form-control" id="bank_guarantee_date">
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="stipulated_start_date" class="form-control-label">
                                 <strong>Stipulated Start date <span style="color: red">*</span></strong>
                                 </label>
                                 <input type="date" name="stipulated_start_date" class="form-control" id="stipulated_start_date">
                              </div>
                           </div>
                        </div> 
                        <div class="row">
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="stipulated_end_date" class="form-control-label">
                                 <strong>Stipulated End date <span style="color: red">*</span></strong>
                                 </label>
                                 <input type="date" name="stipulated_end_date" class="form-control" id="stipulated_end_date">
                              </div>
                           </div>
                        </div>  
                        <div class="row">
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="performance_security_number" class="form-control-label">
                                 <strong>Performance Security No <span style="color: red">*</span></strong>
                                 </label>
                                 <input type="text" name="performance_security_number" class="form-control" id="performance_security_number">
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="performance_security_amt" class="form-control-label">
                                 <strong>Performance Security amt <span style="color: red">*</span></strong>
                                 </label>
                                 <input type="text" name="performance_security_amt" class="form-control" id="performance_security_amt">
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="performance_security_date" class="form-control-label">
                                 <strong>Performance Security date<span style="color: red">*</span></strong>
                                 </label>
                                 <input type="date" name="performance_security_date" class="form-control" id="performance_security_date">
                              </div>
                           </div>
                        </div>  
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label for="remarks" class="form-control-label">
                                 <strong>Remark <span style="color: red">*</span></strong>
                                 </label>
                                 <textarea name="remarks" class="form-control" id="remarks" rows="6" style="resize:none"></textarea>
                              </div>
                           </div>
                        </div>  
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group">
                                  <label class="m-checkbox">
                                   <input type="checkbox" name="approved_by_de" id="approved_by_de" value="1">
                                      <strong>Approved by DE</strong>
                                    <span></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="m-checkbox">
                                   <input type="checkbox" name="approved_by_ee" id="approved_by_ee" value="1">
                                      <strong>Approved by EE</strong>
                                    <span></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="m-checkbox">
                                   <input type="checkbox" name="approved_by_approving_authority" id="approved_by_approving_authority" value="1">
                                      <strong>Approved by Approving Authority</strong>
                                    <span></span>
                                 </label>                
                              </div>
                           </div>
                        </div>                
                        <div class="m-form__actions" style="margin-bottom: 17%">
                           <br>
                           <button type="Submit" id="work_order_form_submit" class="btn m-btn--pill btn-primary">
                           Submit
                           </button>
                        </div>
                     </div>
                     <?php echo form_close();?>
                     <?php
                        }else{
                     ?>
                     <div class="m-portlet__body" style="margin-top: -3%;">
                        <div class="row">
                           <div class="col-lg-6">
                              <p><strong>Work Name:</strong> <?php echo $work_details['work_name_details'];?></p>
                           </div>
                           <div class="col-lg-6">
                              <p><strong>Department Name:</strong> <?php echo $work_details['department_name'];?></p>
                           </div>
                        </div>
                        <div class="row" style="margin-top: 5%">
                           <div class="col-lg-4">
                              <h5>Work order no:</h5>
                              <p><?php echo isset($work_order_details['work_order_no'])?$work_order_details['work_order_no']:null;?></p>
                           </div>
                           <div class="col-lg-4">
                              <h5>Work order date:</h5>
                              <p><?php echo isset($work_order_details['work_order_date'])?date('d-m-Y',strtotime($work_order_details['work_order_date'])):null;?></p>
                           </div>
                           <div class="col-lg-4">
                              <h5>Implementing agency:</h5>
                              <p><?php echo isset($work_order_details['implementing_agency'])?$work_order_details['implementing_agency']:null;?></p>
                           </div>
                        </div>   
                        <div class="row">
                           <div class="col-lg-4">
                              <h5>Consultant/Architect:</h5>
                              <p><?php echo isset($work_order_details['consultant_name'])?$work_order_details['consultant_name']:null;?></p>
                           </div>
                           <div class="col-lg-4">
                              <h5>Third party Inspection Agency:</h5>
                              <p><?php echo isset($work_order_details['third_party_name'])?$work_order_details['third_party_name']:null;?></p>
                           </div>
                           <div class="col-lg-4">
                              <h5>Gov associated Agency:</h5>
                              <p><?php echo isset($work_order_details['gov_ass_name'])?$work_order_details['gov_ass_name']:null;?></p>
                           </div>
                        </div>  
                        <div class="row">
                           <div class="col-lg-4">
                              <h5>Tender Submission date:</h5>
                              <p><?php echo isset($work_order_details['tender_submission_date'])?date('d-m-Y',strtotime($work_order_details['tender_submission_date'])):null;?></p>
                           </div>
                           <div class="col-lg-4">
                              <h5>SD Current:</h5>
                              <p><?php echo isset($work_order_details['sd_current'])?$work_order_details['sd_current']:null;?></p>
                           </div>
                           <div class="col-lg-4">
                              <h5>FDR Bank Name:</h5>
                              <p><?php echo isset($work_order_details['fdr_bank_name'])?$work_order_details['fdr_bank_name']:null;?></p>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-4">
                              <h5>Agreement seal date:</h5>
                              <p><?php echo isset($work_order_details['agreement_seal_date'])?date('d-m-Y',strtotime($work_order_details['agreement_seal_date'])):null;?></p>
                           </div>
                           <div class="col-lg-4">
                              <h5>Agreement No:</h5>
                              <p><?php echo isset($work_order_details['agreement_number'])?$work_order_details['agreement_number']:null;?></p>
                           </div>
                           <div class="col-lg-4">
                              <h5>FDR Number:</h5>
                              <p><?php echo isset($work_order_details['fdr_number'])?$work_order_details['fdr_number']:null;?></p>
                           </div>
                        </div> 
                        <div class="row">
                           <div class="col-lg-4">
                              <h5>FDR Amount:</h5>
                              <p><?php echo isset($work_order_details['fdr_amount'])?$work_order_details['fdr_amount']:null;?></p>
                           </div>
                           <div class="col-lg-4">
                              <h5>FDR Date:</h5>
                              <p><?php echo isset($work_order_details['fdr_date'])?date('d-m-Y',strtotime($work_order_details['fdr_date'])):null;?></p>
                           </div>
                           <div class="col-lg-4">
                              <h5>EMD Number:</h5>
                              <p><?php echo isset($work_order_details['emd_number'])?$work_order_details['emd_number']:null;?></p>
                           </div>
                        </div>   
                        <div class="row">
                           <div class="col-lg-4">
                              <h5>EMD Amount:</h5>
                              <p><?php echo isset($work_order_details['emd_amount'])?$work_order_details['emd_amount']:null;?></p>
                           </div>
                           <div class="col-lg-4">
                              <h5>EMD Date:</h5>
                              <p><?php echo isset($work_order_details['emd_date'])?date('d-m-Y',strtotime($work_order_details['emd_date'])):null;?></p>
                           </div>
                           <div class="col-lg-4">
                              <h5>EStamp Duty Amt :</h5>
                              <p><?php echo isset($work_order_details['stamp_duty_amt'])?$work_order_details['stamp_duty_amt']:null;?></p>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-4">
                              <h5>Bank Solvency Amt:</h5>
                              <p><?php echo isset($work_order_details['bank_solvency_amt'])?$work_order_details['bank_solvency_amt']:null;?></p>
                           </div>
                           <div class="col-lg-4">
                              <h5>Bank Solvency No:</h5>
                              <p><?php echo isset($work_order_details['bank_solvency_number'])?$work_order_details['bank_solvency_number']:null;?></p>
                           </div>
                           <div class="col-lg-4">
                              <h5>Bank Guanrantee Amt:</h5>
                              <p><?php echo isset($work_order_details['bank_guarantee_amt'])?$work_order_details['bank_guarantee_amt']:null;?></p>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-4">
                              <h5>Bank Guanrantee No:</h5>
                              <p><?php echo isset($work_order_details['bank_guarantee_number'])?$work_order_details['bank_guarantee_number']:null;?></p>
                           </div>
                           <div class="col-lg-4">
                              <h5>Bank Guanrantee date:</h5>
                              <p><?php echo isset($work_order_details['bank_guarantee_date'])?date('d-m-Y',strtotime($work_order_details['bank_guarantee_date'])):null;?></p>
                           </div>
                           <div class="col-lg-4">
                              <h5>Stipulated Start date :</h5>
                              <p><?php echo isset($work_order_details['stipulated_start_date'])?date('d-m-Y',strtotime($work_order_details['stipulated_start_date'])):null;?></p>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-4">
                              <h5>Stipulated End date:</h5>
                              <p><?php echo isset($work_order_details['stipulated_end_date'])?date('d-m-Y',strtotime($work_order_details['stipulated_end_date'])):null;?></p>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-4">
                              <h5>Performance Security No:</h5>
                              <p><?php echo isset($work_order_details['performance_security_number'])?$work_order_details['performance_security_number']:null;?></p>
                           </div>
                           <div class="col-lg-4">
                              <h5>Performance Security amt:</h5>
                              <p><?php echo isset($work_order_details['performance_security_amt'])?$work_order_details['performance_security_amt']:null;?></p>
                           </div>
                           <div class="col-lg-4">
                              <h5>Performance Security date:</h5>
                              <p><?php echo isset($work_order_details['performance_security_date'])?date('d-m-Y',strtotime($work_order_details['performance_security_date'])):null;?></p>
                           </div>
                        </div>     
                        <div class="row">
                           <div class="col-lg-12">
                              <h5>Remark:</h5>
                              <p><?php echo isset($work_order_details['remarks'])?$work_order_details['remarks']:null;?></p>
                           </div>
                           <div class="col-lg-12">
                              <h5>Approved by DE:</h5>
                              <p><?php echo $work_order_details['approved_by_de'] == 1?'Yes':'No';?></p>
                           </div>
                           <div class="col-lg-12">
                              <h5>Approved by EE:</h5>
                              <p><?php echo $work_order_details['approved_by_ee'] == 1?'Yes':'No';?></p>
                           </div>
                            <div class="col-lg-12">
                              <h5>Approved by Approving Authority:</h5>
                              <p><?php echo $work_order_details['approved_by_approving_authority'] == 1?'Yes':'No';?></p>
                           </div>
                        </div>                                                            
                     </div>
                     <?php
                        }
                     ?>
                  </div>
               </div>
               <?php
                  if($work_order_details_submitted == 1){
               ?>
                  <div class="m-portlet">
                     <div class="bgc-white bdrs-3 mB-20" style="overflow-x:auto;">
                        <div class="m-portlet__head">
                           <div class="m-portlet__head-caption">
                              <h3 class="main-title">
                                 Set Work Milestone for bill record
                              </h3>
                           </div>
                        </div>
                        <div class="m-portlet__body" style="margin-top: -3%;">
                           <?php echo form_open('schemes/upload_milestone/'.$encrypted_url,'method="POST"');?>
                           <div class="row">
                              <div class="col-lg-4">
                                 <div class="form-group">
                                    <label for="milestone" class="form-control-label">
                                    <strong>Select milestone stage</strong>
                                    </label>
                                    <select name="milestone[0]" class="form-control" id="milestone">
                                       <option value="">Select milestone stage</option>
                                       <optgroup label="Execution">
                                          <?php
                                             foreach($get_execution_master as $each_execution_master){
                                          ?>
                                             <option value="<?php echo $each_execution_master['name'];?>"><?php echo $each_execution_master['name'];?></option>
                                          <?php
                                             }
                                          ?>
                                       </optgroup>
                                    </select>
                                 </div>
                              </div>  
                              <div class="col-lg-4">
                                 <a style="margin-top: 8%" class="btn m-btn--pill btn-outline-dark float-left delete-row">Delete</a>
                              </div>                            
                           </div>
                           <div class="row">
                              <div class="col-lg-12">
                                 <a class="btn m-btn--pill btn-primary" id="add-more" style="color: white;margin-bottom: 3%">Add more</a>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-lg-12">
                                 <button type="Submit" class="btn m-btn--pill btn-primary">
                                    Submit
                                 </button>
                              </div>
                           </div>
                           <?php echo form_close();?>
                           <div class="row" style="overflow-x: auto;margin-top: 3%">
                              <div class="col-lg-12">
                              <h3>Previously added milestones:</h3>
                              <table class="table mb-0 table-hover">
                                 <thead class="thead-default">
                                    <tr>
                                       <th>#</th>
                                       <th>Milestone Stage</th>
                                       <th>Milestone added on</th>
                                       <th>Actions</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                       if(is_array($milestone_details) && array_filter($milestone_details)){
                                          foreach($milestone_details as $key_milestone => $each_milestone){
                                    ?>
                                    <tr>
                                       <td><?php echo $key_milestone+1;?></td>
                                       <td><?php echo $each_milestone['milestone_name'];?></td>
                                       <td><?php echo date('d-m-Y',strtotime($each_milestone['milestone_added_on']));?></td>
                                       <td>
                                          <a onclick="return confirm('Are you sure you want to discard this milestone?');" href="<?php echo base_url('schemes/delete_milestone/'.base64_encode($this->encryption->encrypt($each_milestone['id'].'|'.$encrypted_url)));?>" class="btn m-btn--pill btn-outline-dark float-left">Delete</a>
                                       </td>
                                    </tr>
                                    <?php
                                          }
                                       }else{
                                          echo "<tr><td colspan='4'>No Milestone has been added yet.</td></tr>";
                                       }
                                    ?>
                                 </tbody>
                              </table>
                           </div>
                           </div>
                        </div>
                     </div>
                  </div>
               <?php
                  }
               ?>
         </div>
      </div>
   </div>
</main>
<script src="<?php echo base_url();?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/snippets/pages/user/login.js" type="text/javascript"></script>
<script>
    $('#add-more').click(function(){
      var btn = $(this).closest('.row');
      // console.log(btn);
      var html = '<div class="row">'+btn.prev().html()+'</div>';
      var index = parseInt(html.match(/\[[0-9]+\]/g)[0].match(/\d+/)) + 1; 
      // console.log(index);
      btn.before(html.replace(/\[[0-9]+\]/g,'['+ index +']'));
   });
   
   $(document).on("click", ".delete-row", function () {
      count = $(this).closest(".m-portlet__body").find('.delete-row').length;
      if (count > 1) {
         if (confirm("Do you confirm?")) {
            $(this).closest('div').parent('div').remove();
         }
      }
   });
</script>