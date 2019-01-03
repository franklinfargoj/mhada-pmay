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
                    <div class="m-alert m-alert--outline alert alert-success alert-dismissible fade show">
                        <div class="layer w-100">
                            <label class="mb-0"><strong>Total Projects Submitted</strong></label>
                            <span class="m-badge m-badge--brand m-badge--wide d-ib va-m fw-600 br-rd bg-color mr-1 float-right"><?php echo isset($projects_data['project_count'])?$projects_data['project_count']:0;?></span>

                        </div>
                    </div>
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
                                        <a href="<?php echo base_url('agency/projects_view/'.base64_encode($this->encryption->encrypt($each_project['code'].'|'.$each_project['id'])));?>"  class="mb-1 btn m-btn--pill btn-primary" style="color: white">View</a>
                                     <a href="<?php echo base_url('agency/project_documents/'.base64_encode($this->encryption->encrypt($each_project['code'].'|'.$each_project['id'])));?>" class="mb-1 btn m-btn--pill btn-primary" style="color: white">Documents</a>
                                     <a href="<?php echo base_url('agency/project_photos/'.base64_encode($this->encryption->encrypt($each_project['code'].'|'.$each_project['id'])));?>" class="mb-1 btn m-btn--pill btn-primary" style="color: white">Photos</a>

                                         <!--update_stage-->
                                     <a href="<?php echo base_url('agency/update_project_stage/'.base64_encode($this->encryption->encrypt($each_project['code'].'|'.$each_project['id'])));?>"  class="mb-1 btn m-btn--pill btn-primary" style="color: white">Update Stage</a>

                                     <a href="<?php echo base_url('agency/projects/financial_details/'.base64_encode($this->encryption->encrypt($each_project['code'].'|'.$each_project['id'])));?>" class="mb-1 btn m-btn--pill btn-primary" style="color: white">Financial Details</a>
                                     </div>
                                <!--  <a href="<?php //echo base_url('projects/add_building_details/'.base64_encode($this->encryption->encrypt($each_project['code'].'|'.$each_project['id'])));?>" target="_blank" class="btn m-btn--pill btn-primary" style="color: white">Add Details</a> -->


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
