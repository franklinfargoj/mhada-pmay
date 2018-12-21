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
         <div class="masonry-item w-100">
            <div class="row gap-20">
               <div class="col-md-12">
               </div>
            </div>
         </div>
         <div class="masonry-item col-12">
            <div class="">
               <div class="m-portlet m_portlet_tools_project">
                     <div class="mr-auto m-portlet__head">
                        <div class="m-portlet__head-caption">
                           <div class="m-portlet__head-title">
                              <h3 class="main-title">List of projects</h3>
                           </div>
                        </div>
                         <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item">  <a href="<?php echo base_url('projects/add_project');?>" class="btn m-btn--pill btn-primary mb-3" style="float: right;">Add Projects</a></li>
                               <li class="m-portlet__nav-item">
                                  <a href="#" data-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon" title="" data-original-title="Collapse">
                                   <i class="la la-angle-down"></i>
                                   </a>
                               </li>
                            </ul>
                         </div>
                     </div>
                     <div class="m-portlet__body" style="overflow-x:auto;">
                        <?php echo form_open('','method="get"');?>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="m-input-icon m-input-icon--left">
                                 <label>
                                 <strong>Search by Project name / Address .:</strong>
                                 </label>
                                 <input type="text" class="form-control m-input m-input--solid" placeholder="Search..." id="m_form_search" name="search" value="<?php echo isset($_GET['search'])?$_GET['search']:NULL;?>">
                                 <span class="m-input-icon__icon m-input-icon__icon--left">
                                 <span style="margin-top: 37%;">
                                 <i class="la la-search"></i>
                                 </span>
                                 </span>
                              </div>
                              <br>
                           </div>
                        </div>
                        <br>
                     <?php echo form_close();?>



                     <table class="table table-hover">
                        <thead class="thead-light">
                           <tr>
                              <th scope="col">#</th>
                              <th scope="col">Code</th>
                              <th scope="col">Title</th>
                              <th scope="col">Address</th>
                              <th scope="col">Implementing Agency</th>
                              <th scope="col">Status</th>
                              <th scope="col">Submitted On</th>
                              <th scope="col" style="width:35%">Actions</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php
                           if(is_array($projects_data['projects']) && array_filter($projects_data['projects']))
                           {
                              foreach($projects_data['projects'] as $count_scheme_serial => $each_project)
                              {
                                 $style_tr = null;
                        ?>
                           <tr <?php echo $style_tr;?>>
                              <th scope="row"><?php echo $count_scheme_serial+1;?></th>
                              <td><?php echo $each_project['code'];?></td>
                              <td><?php echo $each_project['title'];?></td>
                              <td><?php echo $each_project['address'];?></td>
                              <td><?php echo $each_project['implementing_agency'];?></td>
                              <td><?php echo $each_project['current_status'];?></td>
                              <td><?php echo date('F j, Y',strtotime($each_project['created_at']));?></td>
                              <td style="width:35%">
                                 <div class="button-group-custom">
                                    <a href="<?php echo base_url('projects/view/'.base64_encode($this->encryption->encrypt($each_project['code'].'|'.$each_project['id'])));?>" target="_blank" class="mb-1 btn m-btn--pill btn-primary" style="color: white">View</a>
                                 <a href="<?php echo base_url('projects/documents/'.base64_encode($this->encryption->encrypt($each_project['code'].'|'.$each_project['id'])));?>" target="_blank" class="mb-1 btn m-btn--pill btn-primary" style="color: white">Documents</a>
                                 <a href="<?php echo base_url('projects/photos/'.base64_encode($this->encryption->encrypt($each_project['code'].'|'.$each_project['id'])));?>" target="_blank" class="mb-1 btn m-btn--pill btn-primary" style="color: white">Photos</a>
                                 <!--update_stage-->
                                 <a href="<?php echo base_url('projects/work_for_project/'.base64_encode($this->encryption->encrypt($each_project['code'].'|'.$each_project['id'])));?>" target="_blank" class="mb-1 btn m-btn--pill btn-primary" style="color: white">Update Stage</a>
                                 <button class="mb-1 btn m-btn--pill btn-primary" style="color: white" data-toggle="modal" data-target="#update_status_<?php echo $each_project['id'];?>">Update Status</button>
                                 <a href="<?php echo base_url('projects/change_status_log/'.base64_encode($this->encryption->encrypt($each_project['code'].'|'.$each_project['id'])));?>" target="_blank" class="mb-1 btn m-btn--pill btn-primary" style="color: white">Change Status log</a>
                                 <a href="<?php echo base_url('projects/add_work_details/'.base64_encode($this->encryption->encrypt($each_project['code'].'|'.$each_project['id'])));?>" target="_blank" class="mb-1 btn m-btn--pill btn-primary" style="color: white">Add Work</a>
                                 </div>
                                <!--  <a href="<?php //echo base_url('projects/add_building_details/'.base64_encode($this->encryption->encrypt($each_project['code'].'|'.$each_project['id'])));?>" target="_blank" class="btn m-btn--pill btn-primary" style="color: white">Add Details</a> -->

                                 <div class="modal fade" id="update_status_<?php echo $each_project['id'];?>" tabindex="-1" role="dialog" aria-labelledby="updateStatuslabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <?php echo form_open(base_url('projects/update_status/'.base64_encode($this->encryption->encrypt($each_project['code'].'|'.$each_project['id']))),'method="post" id="update_status_form"');?>
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <h5 class="modal-title" id="adduserLabel"><strong>Update Status</strong></h5>
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                          </div>
                                          <div class="modal-body" style="overflow-y: scroll; height:200px;">
                                             <div class="form-group">
                                                <label for="development_status" class="form-control-label">
                                                   <strong>Status</strong>
                                                </label>
                                                <div class="form-group">
                                                   <select name="development_status" class="form-control" id="development_status">
                                                      <option value="">Select Status</option>
                                                      <?php
                                                         if(is_array($development_status) && array_filter($development_status))
                                                         {
                                                            foreach($development_status as $each_val_status)
                                                            {
                                                               $selected_status = "";
                                                               if($each_val_status['id'] == $each_project['development_status']){
                                                                  $selected_status = "selected='selected'";
                                                               }
                                                      ?>
                                                            <option value="<?php echo $each_val_status['id'];?>" <?php echo $selected_status;?>><?php echo $each_val_status['name'];?></option>
                                                      <?php
                                                            }
                                                         }
                                                      ?>
                                                   </select>
                                                </div>
                                             </div>
                                             <div class="form-group">
                                                <label for="" class="form-control-label">
                                                   <strong>Actual Completion Date</strong>
                                                </label>
                                                <div class="form-group">
                                                   <input type="date" name="actual_completion_date" class="form-control" value="<?php echo date('Y-m-d');?>">
                                                </div>
                                             </div>
                                          </div>
                                          <div class="modal-footer">
                                             <button type="submit" id="submit_update_status_form" class="btn btn-primary m-btn--pill">Submit</button>
                                             <button type="button" class="btn btn-secondary m-btn--pill" data-dismiss="modal">Close</button>
                                          </div>
                                       </div>
                                       <?php echo form_close();?>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                        <?php
                              }
                           }else{
                              echo "<tr><td colspan='9'>No Projects found.</td></tr>";
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
</main>
<script src="<?php echo base_url();?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/snippets/pages/user/login.js" type="text/javascript"></script>
<script>
   $(document).on('change','#ownership',function(){
      var value = $(this).val();

      if(value == 'Government & Private Both')
      {
         $('#only_both').show();
         $('.app_both').val('');
      }
      else{
         $('#only_both').hide();
         $('.app_both').val('0');
      }
   });
</script>
