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
               <div class="m-portlet" id="m_portlet_tools_2">
                  <div class="bgc-white bdrs-3" style="overflow-x:auto;">
                     <div class="mr-auto m-portlet__head">
                        <h3 class="main-title"><?php echo $survey_numer;?>
                           <a href="<?php echo base_url('schemes');?>" class="btn m-btn--pill btn-dark float-right mb-3">Back</a>
                        </h3>
                     </div>
                     <div class="m-portlet__body">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="m-portlet" id="m_portlet_tools_3">
                                 <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                       <div class="m-portlet__head-title">
                                          <span class="m-portlet__head-icon m--hide">
                                          <i class="flaticon-statistics"></i>
                                          </span>
                                          <h4 class="main-title">
                                             <span>
                                                Work Details
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
                                    <div style="overflow-x: auto">
                                    <table class="table table-hover">
                                        <thead class="thead-light">
                                           <tr>
                                              <th scope="col">#</th>
                                              <th scope="col">Work Key</th>
                                              <th scope="col">Work type</th>
                                              <th scope="col">Work name</th>
                                              <th scope="col">Current Stage</th>
                                              <th scope="col">Completion Date</th>
                                              <th scope="col">Actions</th>
                                           </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                              if(is_array($work_details_project) && array_filter($work_details_project)){
                                                foreach($work_details_project as $key_work => $each_work_details){
                                            ?>
                                            <tr>
                                              <td><?php echo $key_work+1;?></td>
                                              <td><?php echo $each_work_details['work_number'];?></td>
                                              <td><?php echo $each_work_details['work_type'];?></td>
                                              <td><?php echo $each_work_details['work_name_details'];?></td>
                                              <td><?php echo $each_work_details['stage_selected_name'];?></td>
                                              <td><?php echo empty($each_work_details['actual_completion_time'])?'-':date('d-m-Y',strtotime($each_work_details['actual_completion_time']));?></td>
                                              <td>
                                                <a href="<?php echo base_url('schemes/update_stage/'.base64_encode($this->encryption->encrypt($survey_numer.'|'.$ref_id.'|'.$each_work_details['work_number'])));?>" class="mb-1 btn m-btn--pill btn-primary" style="color: white">Update</a>
                                              </td>
                                            </tr>
                                            <?php
                                                }
                                              }else{
                                                echo "<tr><td colspan='7'>No Work found for this project..</td></tr>";
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
</main>
<script src="<?php echo base_url();?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/snippets/pages/user/login.js" type="text/javascript"></script>