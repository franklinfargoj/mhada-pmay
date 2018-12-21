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
            <div class="bd bgc-white">
               <div class="col-md-12">
                  <div class="bgc-white bdrs-3 p-20 mB-20" style="overflow-x:auto;">
                     <h3 class="main-title">
                     <?php echo $survey_numer;?>
                     <a href="<?php echo base_url('schemes');?>" class="btn m-btn--pill btn-dark float-right mb-3">Back</a>
                     </h4>
                     <br>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="m-portlet m-portlet--creative m-portlet--first m-portlet--bordered-semi">
                              <div class="m-portlet__head main-sub-title">
                                 <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                       <span class="m-portlet__head-icon m--hide">
                                       <i class="flaticon-statistics"></i>
                                       </span>
                                       <h2 class="m-portlet__head-label m-portlet__head-label--danger">
                                          <span>
                                          Add Building / Wings / Flats
                                          </span>
                                       </h2>
                                    </div>
                                 </div>
                              </div>
                              <div class="m-portlet__body" style="margin-top: -5%;">
                                 <?php echo form_open('','class="class="m-form m-form--fit m-form--label-align-right"');?>
                                 <div class="m-portlet__body">
                                    <div class="form-group m-form__group">
                                       <label for="type_of_cons" class="form-control-label">
                                       <strong>Type</strong>
                                       </label>
                                       <select name="type_of_cons" class="form-control" id="type_of_cons">
                                          <option value="Building">Building</option>
                                          <option value="Wings">Wings</option>
                                          <option value="Flats">Flats</option>
                                       </select>
                                    </div>
                                    <div class="form-group">
                                       <label for="name" class="form-control-label">
                                       <strong>Name</strong>
                                       </label>
                                       <input type="text" name="name" class="form-control" id="name">
                                    </div>
                                    <div class="form-group m-form__group for_wings" style="display: none">
                                       <label for="building_number" class="form-control-label">
                                       <strong>Building</strong>
                                       </label>
                                       <select name="building_number" class="form-control" id="building_number">
                                          <option value="">Select Building</option>
                                          <?php
                                             if(is_array($building_master) && array_filter($building_master))
                                             {
                                                foreach($building_master as $each_building)
                                                {
                                             ?>
                                          <option value="<?php echo $each_building['value'];?>"><?php echo $each_building['building_name'];?></option>
                                          <?php
                                             }
                                             }
                                             ?>
                                       </select>
                                    </div>
                                    <div class="form-group m-form__group for_flats" style="display: none">
                                       <label for="ward_number" class="form-control-label">
                                       <strong>Wing</strong>
                                       </label>
                                       <select name="ward_number" class="form-control" id="ward_number">
                                          <option value="">Select Ward</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="m-portlet__foot m-portlet__foot--fit">
                                    <br>
                                    <div class="m-form__actions">
                                       <button type="Submit" class="btn btn-metal">
                                       Submit
                                       </button>
                                    </div>
                                 </div>
                                 <?php echo form_close();?>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="m-portlet m-portlet--creative m-portlet--first m-portlet--bordered-semi">
                              <div class="m-portlet__head main-sub-title">
                                 <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                       <span class="m-portlet__head-icon m--hide">
                                       <i class="flaticon-statistics"></i>
                                       </span>
                                       <h2 class="m-portlet__head-label m-portlet__head-label--success">
                                          <span>
                                          Submitted Details
                                          </span>
                                       </h2>
                                    </div>
                                 </div>
                              </div>
                              <div class="m-portlet__body" style="margin-top: -5%;">
                                 <table class="table table-bordered m-table m-table--border-warning m-table--head-bg-warning">
                                    <thead>
                                       <tr>
                                          <th>#</th>
                                          <th>Building Name</th>
                                          <th>Handover Status</th>
                                          <th>Actions</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                          if(is_array($get_cons_details) && array_filter($get_cons_details))
                                          {
                                             foreach($get_cons_details as $build_count => $each_building)
                                             {
                                          ?>
                                       <?php
                                          if($build_count > 0)
                                          {
                                       ?>
                                       <tr>
                                          <th style="background: #ffb822;">#</th>
                                          <th style="background: #ffb822;">Building Name</th>
                                          <th style="background: #ffb822;">Handover Status</th>
                                          <th style="background: #ffb822;">Actions</th>
                                       </tr>
                                       <?php
                                          }
                                       ?>
                                       <tr>
                                          <td><?php echo $build_count + 1;?></td>
                                          <td><?php echo $each_building['building_name'];?></td>
                                          <td>
                                             <?php
                                                if($each_building['hand_over_status'] == '1')
                                                {
                                                ?>
                                             <span class="m-badge m-badge--success m-badge--wide">Yes</span>
                                             <?php
                                                }else{
                                                ?>
                                             <span class="m-badge m-badge--danger m-badge--wide">No</span>
                                             <?php
                                                }
                                                ?>
                                          </td>
                                          <td>
                                             <a class="btn m-btn--pill btn-primary" href="<?php echo base_url('schemes/change_handover_status/'.base64_encode($this->encryption->encrypt($each_building['id'].'|BUILDING|'.$survey_numer.'|'.$ref_id.'|'.$each_building['hand_over_status'])));?>">Change Handover Status</a>
                                          </td>
                                       </tr>
                                       <?php
                                          if(is_array($each_building['wing_details']) && array_filter($each_building['wing_details']))
                                          {
                                          ?>
                                       <?php
                                          foreach($each_building['wing_details'] as $wing_count => $each_wing_details)
                                          {
                                          ?>
                                       <tr class="m-table__row--brand">
                                          <td colspan="4" align="center"><?php echo ($wing_count+1).ordinal_suffix($wing_count+1);?> Wing for building <strong><?php echo $each_building['building_name'];?></strong></td>
                                       </tr>
                                       <tr>
                                          <td colspan="2" align="center"><?php echo $each_wing_details['wing_name'];?></td>
                                          <td>
                                             <?php
                                                if($each_wing_details['hand_over_status'] == '1')
                                                {
                                                ?>
                                             <span class="m-badge m-badge--success m-badge--wide">Yes</span>
                                             <?php
                                                }else{
                                                ?>
                                             <span class="m-badge m-badge--danger m-badge--wide">No</span>
                                             <?php
                                                }
                                                ?>
                                          </td>
                                          <td>
                                             <a class="btn m-btn--pill btn-primary" href="<?php echo base_url('schemes/change_handover_status/'.base64_encode($this->encryption->encrypt($each_wing_details['id'].'|WINGS|'.$survey_numer.'|'.$ref_id.'|'.$each_wing_details['hand_over_status'])));?>">Change Handover Status</a>
                                          </td>
                                       </tr>
                                       <?php
                                          if(is_array($each_wing_details['flat_details']) && array_filter($each_wing_details['flat_details']))
                                          {
                                          ?>
                                       <?php
                                          foreach($each_wing_details['flat_details'] as $flat_count => $each_flat_details)
                                          {
                                          ?>
                                       <tr class="m-table__row--success">
                                          <td colspan="4" align="center">Flats for wing <strong><?php echo $each_wing_details['wing_name'];?></strong></td>
                                       </tr>
                                       <tr>
                                          <td colspan="2" align="center"><?php echo $each_flat_details['flat_name'];?></td>
                                          <td>
                                             <?php
                                                if($each_flat_details['hand_over_status'] == '1')
                                                {
                                                ?>
                                             <span class="m-badge m-badge--success m-badge--wide">Yes</span>
                                             <?php
                                                }else{
                                                ?>
                                             <span class="m-badge m-badge--danger m-badge--wide">No</span>
                                             <?php
                                                }
                                                ?>
                                          </td>
                                          <td>
                                             <a class="btn m-btn--pill btn-primary" href="<?php echo base_url('schemes/change_handover_status/'.base64_encode($this->encryption->encrypt($each_flat_details['id'].'|FLAT|'.$survey_numer.'|'.$ref_id.'|'.$each_flat_details['hand_over_status'])));?>">Change Handover Status</a>
                                          </td>
                                       </tr>
                                       <?php
                                          }
                                          }
                                          ?>
                                       <?php
                                          }
                                          }
                                          ?>
                                       <?php
                                          }
                                          }
                                          else{
                                          echo "<tr><td colspan='3'>No Buidings are added under this scheme.</td></tr>";
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
</main>
<script src="<?php echo base_url();?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/snippets/pages/user/login.js" type="text/javascript"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script>
   $(document).on('change','#type_of_cons',function(){
      var value = $(this).val();

      if(value == 'Wings')
      {
         $('.for_wings').show();
         $('.for_flats').hide();
      }
      else if(value == 'Flats')
      {
         $('.for_wings').show();
         $('.for_flats').show();
      }
      else{
         $('.for_wings').hide();
         $('.for_flats').hide();
      }
   });

   $(document).on('change','#building_number',function(){
      var ref_val = $(this).val();
      var csrf = $.cookie('csrf_cookie_name');
      $.ajax({
          url : "<?php echo base_url();?>schemes/get_wings",
          type: 'post',
          data: {ref_val: ref_val , csrf_test_name: csrf},
          success: function(response){
            $('#ward_number').html(response);
         }
      });
   });
</script>
