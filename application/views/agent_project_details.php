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
               <div class="m-portlet">
                  <div class="bgc-white bdrs-3" style="overflow-x:auto;">
                     <div class="mr-auto m-portlet__head">
                        <h3 class="main-title">List Of Assigned Projects
                           <a href="<?php echo base_url('agents');?>" class="btn m-btn--pill btn-dark float-right mb-3">Back</a>
                        </h3>
                     </div>
                     <div class="m-portlet__body">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="m-portlet" id="m_portlet_tools_3">
                                 <div class="m-portlet__body" style="margin-top: -5%;">

                                     <table class="table table-hover">
                                         <thead class="thead-light">
                                         <tr>
                                             <th scope="col">#</th>
                                             <th scope="col">Project Code</th>
                                             <th scope="col">Project Title</th>
                                             <th scope="col">District</th>
                                             <th scope="col">City</th>
                                             <th scope="col">CSMC Meeting Date</th>
                                             <th scope="col" style="width:35%">Actions</th>
                                         </tr>
                                         </thead>
                                         <tbody>
                                         <?php
                                         if(is_array($agent_project_details) && array_filter($agent_project_details))
                                         {
                                             foreach($agent_project_details as $count_scheme_serial => $agent_project)
                                             {
                                                 $style_tr = null;
                                                 ?>
                                                 <tr <?php echo $style_tr;?>>
                                                     <th scope="row"><?php echo $count_scheme_serial+1;?></th>
                                                     <td><?php echo $agent_project['code'];?></td>
                                                     <td><?php echo $agent_project['title'];?></td>
                                                     <td><?php echo $agent_project['district'];?></td>
                                                     <td><?php echo $agent_project['city'];?></td>
                                                     <td><?php echo date('F j, Y',strtotime($agent_project['csmc_meeting_date']));?></td>
                                                     <td style="width:35%">
                                                         <div class="button-group-custom">
                                                             <a href="<?php echo base_url('agents/delete_project/'.base64_encode($this->encryption->encrypt($agent_project['id'])));?>"  class="mb-1 btn m-btn--pill btn-primary" style="color: white">Remove Project</a>

                                                         </div>
                                                         <!--  <a href="<?php //echo base_url('agents/add_building_details/'.base64_encode($this->encryption->encrypt($each_agent['code'].'|'.$each_agent['id'])));?>" target="_blank" class="btn m-btn--pill btn-primary" style="color: white">Add Details</a> -->

                                                        </td>
                                                 </tr>
                                                 <?php
                                             }
                                         }else{
                                             echo "<tr><td colspan='9'>No Agents found.</td></tr>";
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
</main>
<script src="<?php echo base_url();?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/snippets/pages/user/login.js" type="text/javascript"></script>