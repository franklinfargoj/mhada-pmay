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
      <div class="row gap-20 masonry pos-r">
         <div class="masonry-sizer col-md-12"></div>
         <div class="masonry-item col-12">
            <div class="">
               <div class="bgc-white bdrs-3" style="overflow-x:auto;">
                  <div class="m-portlet">
                     <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                           <h3 class="main-title">
                              Add Work
                              <a href="<?php echo base_url('schemes');?>" class="btn m-btn--pill btn-outline-dark float-right">Back</a>
                           </h3>
                        </div>
                     </div>
                     <?php echo form_open_multipart('','class="class="m-form m-form--fit m-form--label-align-right" id="work_form"');?>
                     <div class="m-portlet__body" style="margin-top: -3%;">
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label for="work_type" class="form-control-label">
                                 <strong>Work Type <span style="color: red">*</span></strong>
                                 </label>
                                 <select name="work_type" class="form-control" id="work_type">
                                    <option value="Primary">Primary</option>
                                    <option value="Secondary">Secondary</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label for="parent_work_key" class="form-control-label">
                                 <strong>Parent work key <span style="color: red">*</span></strong>
                                 </label>
                                 <input type="text" name="parent_work_key" class="form-control" id="parent_work_key">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="budget_details" class="form-control-label">
                                 <strong>Budget pg ID/referance/ No 17-18 <span style="color: red">*</span></strong>
                                 </label>
                                 <input type="text" name="budget_details" class="form-control" id="budget_details">
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="budget_pg" class="form-control-label">
                                 <strong>Budget pg ID/referance/ No 17-18 <span style="color: red">*</span></strong>
                                 </label>
                                 <input type="text" name="budget_pg" class="form-control" id="budget_pg">
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="budget_sr_suffix" class="form-control-label">
                                 <strong>Budget sr no Suffix 17 -18 <span style="color: red">*</span></strong>
                                 </label>
                                 <input type="text" name="budget_sr_suffix" class="form-control" id="budget_sr_suffix">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-4">
                              <div class="form-group m-form__group">
                                 <label for="department" class="form-control-label">
                                 <strong>Department <span style="color: red">*</span></strong>
                                 </label>
                                 <select name="department" class="form-control" id="department">
                                    <option value="">Select Department</option>
                                    <?php
                                       if(is_array($department) && array_filter($department))
                                       {
                                          foreach($department as $each_department){
                                       ?>
                                    <option value="<?php echo $each_department['id'];?>"><?php echo $each_department['name'];?></option>
                                    <?php
                                       }
                                       }
                                       ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="budget_expenditure" class="form-control-label">
                                 <strong>Budget Expenditure <span style="color: red">*</span></strong>
                                 </label>
                                 <select name="budget_expenditure" class="form-control" id="budget_expenditure">
                                    <option value="">Select Budget Expenditure</option>
                                    <?php
                                       if(is_array($budget_expenditure) && array_filter($budget_expenditure))
                                       {
                                          foreach($budget_expenditure as $each_expenditure){
                                       ?>
                                    <option value="<?php echo $each_expenditure['id'];?>"><?php echo $each_expenditure['name'];?></option>
                                    <?php
                                       }
                                       }
                                       ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="approval_authority" class="form-control-label">
                                 <strong>Approving Authority <span style="color: red">*</span></strong>
                                 </label>
                                 <select name="approval_authority" class="form-control" id="approval_authority">
                                    <option value="">Select</option>
                                    <?php
                                       if(is_array($approval_authority) && array_filter($approval_authority))
                                       {
                                          foreach($approval_authority as $each_approval_authority){
                                       ?>
                                    <option value="<?php echo $each_approval_authority['id'];?>"><?php echo $each_approval_authority['name'];?></option>
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
                              <div class="form-group m-form__group">
                                 <label for="board" class="form-control-label">
                                 <strong>Board <span style="color: red">*</span></strong>
                                 </label>
                                 <select name="board" class="form-control" id="board">
                                    <option value="">Select board</option>
                                    <?php
                                       if(is_array($board_details) && array_filter($board_details))
                                       {
                                          foreach($board_details as $each_board){
                                       ?>
                                    <option value="<?php echo $each_board['id'];?>"><?php echo $each_board['name'];?></option>
                                    <?php
                                       }
                                       }
                                       ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="sub_board" class="form-control-label">
                                 <strong>Sub Board <span style="color: red">*</span></strong>
                                 </label>
                                 <select name="sub_board" class="form-control" id="sub_board">
                                    <option value="">Select Sub Board</option>
                                    <?php
                                       if(is_array($sub_board_details) && array_filter($sub_board_details))
                                       {
                                          foreach($sub_board_details as $each_sub_board_details){
                                       ?>
                                    <option value="<?php echo $each_sub_board_details['id'];?>"><?php echo $each_sub_board_details['name'];?></option>
                                    <?php
                                       }
                                       }
                                       ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="executive_engineer" class="form-control-label">
                                 <strong>Executive Engineer <span style="color: red">*</span></strong>
                                 </label>
                                 <select name="executive_engineer" class="form-control" id="executive_engineer">
                                    <option value="">Select</option>
                                    <?php
                                       if(is_array($executive_engineer) && array_filter($executive_engineer))
                                       {
                                          foreach($executive_engineer as $each_executive_details){
                                       ?>
                                    <option value="<?php echo $each_executive_details['id'];?>"><?php echo $each_executive_details['name'];?></option>
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
                              <div class="form-group m-form__group">
                                 <label for="major" class="form-control-label">
                                 <strong>Major <span style="color: red">*</span></strong>
                                 </label>
                                 <select name="major" class="form-control" id="major">
                                    <option value="">Major</option>
                                    <?php
                                       if(is_array($major_details) && array_filter($major_details))
                                       {
                                          foreach($major_details as $each_major){
                                       ?>
                                    <option value="<?php echo $each_major['id'];?>"><?php echo $each_major['name'];?></option>
                                    <?php
                                       }
                                       }
                                       ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="work_type_secondary" class="form-control-label">
                                 <strong>Work Type <span style="color: red">*</span></strong>
                                 </label>
                                 <select name="work_type_secondary" class="form-control" id="work_type_secondary">
                                    <option value="">Select work type</option>
                                    <?php
                                       if(is_array($work_type_details) && array_filter($work_type_details))
                                       {
                                          foreach($work_type_details as $each_work_type_details){
                                       ?>
                                    <option value="<?php echo $each_work_type_details['id'];?>"><?php echo $each_work_type_details['name'];?></option>
                                    <?php
                                       }
                                       }
                                       ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="deputy_engineer" class="form-control-label">
                                 <strong>Deputy Engineer <span style="color: red">*</span></strong>
                                 </label>
                                 <select name="deputy_engineer" class="form-control" id="deputy_engineer">
                                    <option value="">Select</option>
                                    <?php
                                       if(is_array($deputy_engineer_details) && array_filter($deputy_engineer_details))
                                       {
                                          foreach($deputy_engineer_details as $each_deputy_eng_details){
                                       ?>
                                    <option value="<?php echo $each_deputy_eng_details['id'];?>"><?php echo $each_deputy_eng_details['name'];?></option>
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
                              <div class="form-group m-form__group">
                                 <label for="sub_major" class="form-control-label">
                                 <strong>Sub Major <span style="color: red">*</span></strong>
                                 </label>
                                 <select name="sub_major" class="form-control" id="sub_major">
                                    <option value="">Select</option>
                                    <?php
                                       if(is_array($sub_major_details) && array_filter($sub_major_details))
                                       {
                                          foreach($sub_major_details as $each_sub_major){
                                       ?>
                                    <option value="<?php echo $each_sub_major['id'];?>"><?php echo $each_sub_major['name'];?></option>
                                    <?php
                                       }
                                       }
                                       ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="finantial_year" class="form-control-label">
                                 <strong>Finantial Year <span style="color: red">*</span></strong>
                                 </label>
                                 <select name="finantial_year" class="form-control" id="finantial_year">
                                    <option value="">Select Finantial Year</option>
                                    <?php
                                       $starting_year  =date('Y', strtotime('-10 year'));
                                       $ending_year = date('Y');
                                       $current_year = date('Y');
                                       
                                       for($starting_year; $starting_year <= $ending_year; $starting_year++) {
                                             echo '<option value="'.$starting_year.'"';
                                                if( $starting_year ==  $current_year ) {
                                                    echo ' selected="selected"';
                                                    }
                                              echo ' >'.$starting_year.'</option>';
                                       }     
                                       ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-group m-form__group">
                                 <label for="type_details" class="form-control-label">
                                 <strong>JE/AE/SE /Architect <span style="color: red">*</span></strong>
                                 </label>
                                 <select name="type_details" class="form-control" id="type_details">
                                    <option value="JE">JE</option>
                                    <option value="AE">AE</option>
                                    <option value="SE">SE</option>
                                    <option value="Architect">Architect</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-4">
                              <div class="form-group m-form__group">
                                 <label for="ledger_details" class="form-control-label">
                                 <strong>Ledger <span style="color: red">*</span></strong>
                                 </label>
                                 <select name="ledger_details" class="form-control" id="ledger_details">
                                    <option value="">Select Ledger</option>
                                    <?php
                                       if(is_array($ledger_details) && array_filter($ledger_details))
                                       {
                                          foreach($ledger_details as $each_ledger_details){
                                       ?>
                                    <option value="<?php echo $each_ledger_details['id'];?>"><?php echo $each_ledger_details['name'];?></option>
                                    <?php
                                       }
                                       }
                                       ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="work_code" class="form-control-label">
                                 <strong>Work Code <span style="color: red">*</span></strong>
                                 </label>
                                 <input type="text" name="work_code" class="form-control" id="work_code">
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-group m-form__group">
                                 <label for="chief_accounts_details" class="form-control-label">
                                 <strong>Chief Accounts Officer <span style="color: red">*</span></strong>
                                 </label>
                                 <select name="chief_accounts_details" class="form-control" id="chief_accounts_details">
                                    <option value="">Select</option>
                                    <?php
                                       if(is_array($chief_details) && array_filter($chief_details))
                                       {
                                          foreach($chief_details as $each_chief_details){
                                       ?>
                                    <option value="<?php echo $each_chief_details['id'];?>"><?php echo $each_chief_details['name'];?></option>
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
                              <div class="form-group m-form__group">
                                 <label for="sub_ledger_details" class="form-control-label">
                                 <strong>Sub Ledger <span style="color: red">*</span></strong>
                                 </label>
                                 <select name="sub_ledger_details" class="form-control" id="sub_ledger_details">
                                    <option value="">Select Ledger</option>
                                    <?php
                                       if(is_array($sub_ledger_details) && array_filter($sub_ledger_details))
                                       {
                                          foreach($sub_ledger_details as $each_ledger_details){
                                       ?>
                                    <option value="<?php echo $each_ledger_details['id'];?>"><?php echo $each_ledger_details['name'];?></option>
                                    <?php
                                       }
                                       }
                                       ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="estimated_cost_rs" class="form-control-label">
                                 <strong>Estimated cost Rs <span style="color: red">*</span></strong>
                                 </label>
                                 <input type="text" name="estimated_cost_rs" class="form-control" id="estimated_cost_rs">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="revised_budget" class="form-control-label">
                                 <strong>Revised Budget Provision 16-17 <span style="color: red">*</span></strong>
                                 </label>
                                 <input type="text" name="revised_budget" class="form-control" id="revised_budget">
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <label for="budget_provision" class="form-control-label">
                                 <strong>Budget Provision 17 -18 <span style="color: red">*</span></strong>
                                 </label>
                                 <input type="text" name="budget_provision" class="form-control" id="budget_provision">
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-group m-form__group">
                                 <label for="approval_status" class="form-control-label">
                                 <strong>Approval Status <span style="color: red">*</span></strong>
                                 </label>
                                 <select name="approval_status" class="form-control" id="approval_status">
                                    <option value="">Select status</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Pending at EE">Pending at EE</option>
                                    <option value="pending at DE">pending at DE</option>
                                    <option value="Pending at JE/AE/SE/Architect">Pending at JE/AE/SE/Architect</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label for="work_name_details" class="form-control-label">
                                 <strong>Work Name <span style="color: red">*</span></strong>
                                 </label>
                                 <textarea name="work_name_details" class="form-control" id="work_name_details" rows="6"></textarea>
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label for="work_description_details" class="form-control-label">
                                 <strong>Description <span style="color: red">*</span></strong>
                                 </label>
                                 <textarea name="work_description_details" class="form-control" id="work_description_details" rows="6"></textarea>
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label for="work_file" class="form-control-label">
                                 <strong>Upload File</strong>
                                 </label>
                                 <input class="form-control" type="file" name="work_file">
                              </div>
                           </div>
                        </div>
                        <div class="m-form__actions" style="margin-bottom: 17%">
                           <br>
                           <button type="Submit" id="work_form_submit" class="btn m-btn--pill btn-primary">
                           Submit
                           </button>
                        </div>
                     </div>
                     <?php echo form_close();?>
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