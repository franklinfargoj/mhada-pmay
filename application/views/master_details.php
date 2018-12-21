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
                  <div class="bgc-white bdrs-3 mB-20">
                     <div class="mr-auto m-portlet__head">
                        <h3 class="main-title">
                           Manage Masters
                           <a href="<?php echo base_url('dashboard');?>" class="btn m-btn--pill btn-outline-dark float-right">Back</a>
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
                                             Select Master
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
                                 <div class="form-group m-form__group">
                                    <label for="master_select">
                                       <h4>Master List:</h4>
                                    </label>
                                    <?php echo form_open('','method="get"');?>
                                    <select class="form-control m-input m-input--air" id="master_select" name="master_type" onchange="this.form.submit()">
                                       <option value="">Select Master..</option>
                                       <?php

                                          $get_param = isset($_GET['master_type'])?$_GET['master_type']:null;
                                          foreach ($masters_array as $master_name => $master_value) {
                                             $selected = null;
                                             if($get_param == $master_value){
                                                $selected = "selected = 'selected'";
                                             }
                                       ?>
                                          <option value="<?php echo $master_value;?>" <?php echo $selected;?>><?php echo $master_name;?></option>
                                       <?php
                                          }
                                       ?>
                                    </select>
                                    <?php echo form_close();?>
                                 </div>
                              </div>
                           </div>
                        </div>
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
                                             Master Details
                                          </span>
                                       </h4>
                                    </div>
                                 </div>
                                  <div class="m-portlet__head-tools">
                                     <ul class="m-portlet__nav">
                                        <li class="m-portlet__nav-item"> <button class="btn m-btn--pill btn-primary mb-3 float-right position-relative"  data-toggle="modal" data-target="#add_master_value_<?php echo $master_select;?>">Add Value</button></li>

                                        <li class="m-portlet__nav-item">
                                           <a href="#" data-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon" title="" data-original-title="Collapse">
                                            <i class="la la-angle-down"></i>
                                            </a>
                                        </li>
                                     </ul>
                                  </div>
                              </div>
                              <div class="m-portlet__body" style="margin-top: -5%;">
                                 <?php
                                    if($master_select == null)
                                    {
                                 ?>
                                    <p>No masters has been selected..Select master from list to view details.</p>
                                 <?php
                                    }
                                    else{
                                 ?>
                                    <h5 style="display: contents;">Master Name: </h5><h5 style="display: contents;"><?php echo array_search ($master_select, $masters_array);?></h5>

                                    <div class="modal fade" id="add_master_value_<?php echo $master_select;?>" tabindex="-1" role="dialog" aria-labelledby="addmasterLabel" aria-hidden="true">
                                       <div class="modal-dialog" role="document">
                                       <?php echo form_open(base_url('masters/add_details/'.base64_encode($this->encryption->encrypt($master_select))),'method="post"');?>
                                          <div class="modal-content">
                                             <div class="modal-header">
                                                <h5 class="modal-title" id="addmasterLabel">Add entry in master <strong><?php echo array_search ($master_select, $masters_array);?></strong></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                             </div>
                                             <div class="modal-body" style="overflow-y: scroll; height:140px;">
                                                <div class="form-group">
                                                   <label for="master_value" class="form-control-label">
                                                      Enter Details:
                                                   </label>
                                                   <input type="text" name="master_value" class="form-control" id="master_value">
                                                </div>
                                                <?php
                                                   if($master_select == 'stage_master'){
                                                ?>
                                                     <div class="form-group">
                                                      <label for="stage_type" class="form-control-label">
                                                         Select Stage Type
                                                      </label>
                                                      <select class="form-control" name="stage_type">
                                                         <option value="">Select stage type</option>
                                                         <?php
                                                            if(is_array($stage_type_master) && array_filter($stage_type_master))
                                                            {
                                                               foreach($stage_type_master as $each_stage_type){
                                                         ?>
                                                               <option value="<?php echo $each_stage_type['id'];?>"><?php echo $each_stage_type['name'];?></option>
                                                         <?php
                                                               }
                                                            }
                                                         ?>
                                                      </select>
                                                   </div>
                                                <?php
                                                   }
                                                ?>
                                             </div>
                                             <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary m-btn--pill">Submit</button>
                                                <button type="button" class="btn btn-secondary m-btn--pill" data-dismiss="modal">Close</button>
                                             </div>
                                          </div>
                                       <?php echo form_close();?>
                                       </div>
                                    </div>

                                    <table class="table table-hover" style="margin-top: 1%;">
                                       <thead class="thead-light">
                                          <tr>
                                             <th scope="col">#</th>
                                             <th scope="col">Name</th>
                                             <?php
                                                if($master_select == 'stage_master'){
                                             ?>
                                                <th scope="col">Stage Type</th>
                                             <?php
                                                }
                                             ?>
                                             <th scope="col">Status</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?php
                                             if(is_array($master_details) && array_filter($master_details))
                                             {
                                                foreach($master_details as $serial_master => $master_value)
                                                {
                                          ?>
                                                <tr>
                                                   <th scope="row"><?php echo $serial_master+1;?></th>
                                                   <td><?php echo $master_value['name'];?></td>
                                                   <?php
                                                      if($master_select == 'stage_master'){
                                                   ?>
                                                      <td><?php echo $master_value['stage_type_name'];?></th>
                                                   <?php
                                                      }
                                                   ?>
                                                   <td>
                                                      <?php
                                                         if($master_value['status'] == '1'){
                                                      ?>
                                                         <a href="<?php echo base_url('masters/change_status/'.base64_encode($this->encryption->encrypt($master_select.'|'.$master_value['id'].'|0')));?>" class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="" data-original-title="Click to De-activate this master entry">Active</a>
                                                      <?php
                                                         }else{
                                                      ?>
                                                         <a href="<?php echo base_url('masters/change_status/'.base64_encode($this->encryption->encrypt($master_select.'|'.$master_value['id'].'|1')));?>" class="btn btn-secondary" data-toggle="tooltip" data-placement="right" title="" data-original-title="Click to Activate this master entry">Deactive</a>
                                                      <?php
                                                         }
                                                      ?>
                                                   </td>
                                                </tr>
                                          <?php
                                                }
                                             }
                                          ?>
                                       </tbody>
                                    </table>
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