<main class="main-content bgc-grey-100">
   <div id="mainContent">
      <?php
         if($this->session->flashdata('success'))
         {
         ?>
         <div class="alert alert-success alert-dismissable" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
         <div class="masonry-sizer col-md-6"></div>
         <div class="masonry-item col-12">
            <div class="">
               <div class="m-portlet">
                  <div class="bgc-white bdrs-3 mB-10" style="overflow-x:auto;">
                     <div class="mr-auto m-portlet__head">
                        <h3 class="main-title">Stages Wise Completion Report
                           <a href="<?php echo base_url('schemes/dashboard');?>" class="btn m-btn--pill btn-dark float-right">Back</a>
                           <a href="<?php echo base_url('schemes/stage_consolidated_print');?>" style="margin-right: 10px" class="btn m-btn--pill btn-primary float-right">Download</a>
                        </h3>
                     </div>
                     <div class="m-portlet__body">
                        <table class="table mb-0 table-hover">
                           <thead class="thead-light">
                              <tr>
                                 <th scope="col">#</th>
                                 <th scope="col">Project Number</th>
                                 <th scope="col">Project Name</th>
                                 <th scope="col">Start Date</th>
                                 <th scope="col">Stage Name</th>
                                 <th scope="col">Expected Completion Date</th>
                                 <th scope="col">Actual Completion Date</th>
                                 <th scope="col">Delays (In Days)</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                                 if(is_array($get_consolidated_details) && array_filter($get_consolidated_details))
                                 {
                                    $count_serial = 0;
                                    foreach($get_consolidated_details as $project_number => $each_project_details)
                                    {
                                       $delay_time_total = 0;
                                       $count_details = count($each_project_details);
                                 ?>
                              <tr>
                                 <th scope="row" rowspan="<?php echo $count_details;?>"><?php echo $count_serial+1;?></th>
                                 <td rowspan="<?php echo $count_details;?>"><?php echo $project_number;?></td>
                                 <td rowspan="<?php echo $count_details;?>"><?php echo isset($each_project_details[0]['scheme_name'])?$each_project_details[0]['scheme_name']:null;?></td>
                                 <td rowspan="<?php echo $count_details;?>"><?php echo isset($each_project_details[0]['project_start_date'])?date('d-m-Y',strtotime($each_project_details[0]['project_start_date'])):'-';?></td>
                                 <td><?php echo isset($each_project_details[0]['stage_name_value'])?$each_project_details[0]['stage_name_value']:null;?></td>
                                 <td><?php echo empty($each_project_details[0]['expected_completion_date'])?'-':date('d-m-Y',strtotime($each_project_details[0]['expected_completion_date']));?></td>
                                 <td><?php echo empty($each_project_details[0]['actual_completion_date'])?'-':date('d-m-Y',strtotime($each_project_details[0]['actual_completion_date']));?></td>
                                 <td>
                                    <?php
                                       $diff = 0;
                                       if(!empty($each_project_details[0]['actual_completion_date']))
                                       {
                                          $date1 = new DateTime($each_project_details[0]['expected_completion_date']);
                                          $date2 = new DateTime($each_project_details[0]['actual_completion_date']);
                                       
                                          $diff = $date2->diff($date1)->format("%a");
                                       
                                          echo $diff;
                                       }
                                       else{
                                          echo '-';
                                       }
                                       
                                       $delay_time_total = $delay_time_total+$diff;
                                       ?>
                                 </td>
                              </tr>
                              <?php
                                 if($count_details > 1){
                                    foreach($each_project_details as $desc_count => $each_pro_descrip){
                                       if($desc_count == 0){continue;}
                                 ?>
                              <tr>
                                 <td><?php echo isset($each_pro_descrip['stage_name_value'])?$each_pro_descrip['stage_name_value']:null;?></td>
                                 <td><?php echo empty($each_pro_descrip['expected_completion_date'])?'-':date('d-m-Y',strtotime($each_pro_descrip['expected_completion_date']));?></td>
                                 <td><?php echo empty($each_pro_descrip['actual_completion_date'])?'-':date('d-m-Y',strtotime($each_pro_descrip['actual_completion_date']));?></td>
                                 <td>
                                    <?php
                                       $diff = 0;
                                       if(!empty($each_pro_descrip['actual_completion_date']))
                                       {
                                          $date1 = new DateTime($each_pro_descrip['expected_completion_date']);
                                          $date2 = new DateTime($each_pro_descrip['actual_completion_date']);
                                       
                                          $diff = $date2->diff($date1)->format("%a");
                                       
                                          echo $diff;
                                       }
                                       else{
                                          echo '-';
                                       }
                                       
                                       $delay_time_total = $delay_time_total+$diff;
                                       ?>
                                 </td>
                              </tr>
                              <?php
                                 }
                                 }
                                 ?>
                              <tr>
                                 <td colspan="7" align="center" style="background: #f5f5f5; font-weight: bold;">Total Delay (In Days)</td>
                                 <td style="background: #f5f5f5; font-weight: bold;">
                                    <h5><?php echo $delay_time_total;?></h5>
                                 </td>
                              </tr>
                              <?php
                                 $count_serial++;
                                 }
                                 }else{
                                 echo "<tr><td colspan='8'>No Survey Reports found.</td></tr>";
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
</main>
<script src="<?php echo base_url();?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/snippets/pages/user/login.js" type="text/javascript"></script>