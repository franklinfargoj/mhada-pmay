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
                  <div class="bgc-white bdrs-3mB-20" style="overflow-x:auto;">
                     <div class="mr-auto m-portlet__head">
                        <h3 class="main-title">
                           <?php echo $survey_numer;?>
                           <a href="<?php echo base_url('schemes');?>" class="btn m-btn--pill btn-dark float-right mb-3">Back</a>
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
                                                Change Status Logs
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
                                                      From Status
                                                   </th>
                                                   <th>
                                                      To Status
                                                   </th>
                                                   <th>
                                                      Actual completion Date
                                                   </th>
                                                   <th>
                                                      Status changed on
                                                   </th>
                                                   <th>
                                                      Status changed by
                                                   </th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                               <?php
                                                 if(is_array($get_status_logs) && array_filter($get_status_logs))
                                                 {
                                                   foreach($get_status_logs as $key_status => $each_status_details){
                                               ?>
                                                <tr>
                                                   <th scope="row">
                                                      <?php echo $key_status+1;?>
                                                   </th>
                                                   <td>
                                                      <?php echo $each_status_details['current_status_name'];?>
                                                   </td>
                                                   <td>
                                                      <?php echo $each_status_details['new_status_name'];?>
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
