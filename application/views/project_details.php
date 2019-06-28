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
                        <h3 class="main-title"><?php echo $project_code;?>
                           <a href="<?php echo base_url('projects');?>" class="btn m-btn--pill btn-dark float-right mb-3">Back</a>
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
                                                Project Details
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


                                           <a href="<?php echo base_url('projects/edit_project/'.base64_encode($this->encryption->encrypt($project_details['code'].'|'.$project_details['id'])));?>"  class="mb-1 btn m-btn--pill btn-primary" style="color: white">Edit</a>

                                       </ul>
                                    </div>
                                 </div>
                                 <div class="m-portlet__body" style="margin-top: -5%;">
                                     <div class="row">
                                         <div class="col-lg-6" >
                                             <h5>Project Code</h5>
                                             <p><?php echo isset($project_details['code'])?$project_details['code']:null;?></p>
                                         </div>
                                         <div class="col-lg-6" >
                                             <h5>DPR Title</h5>

                                             <p><?php echo isset($project_details['dpr'])?$project_details['dpr']:null;?></p>

                                         </div>
                                     </div>
                                    <div class="row">
                                       <div class="col-lg-6">
                                          <h5>Project Address</h5>
                                          <p><?php echo isset($project_details['address'])?$project_details['address']:null;?></p>
                                       </div>
                                        <div class="col-lg-6">
                                            <h5>Region</h5>
                                            <p><?php echo isset($project_details['region_name'])?$project_details['region_name']:null;?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-lg-6">
                                          <h5>District</h5>
                                          <p><?php echo isset($project_details['district_name'])?$project_details['district_name']:null;?></p>
                                       </div>
                                        <div class="col-lg-6">
                                            <h5>City</h5>
                                            <p><?php echo isset($project_details['city_name'])?$project_details['city_name']:null;?></p>
                                        </div>
                                    </div>

                                    <div class="row">
                                      <?php foreach($slac_details as $slac){  ?>
                                        <div class="col-lg-6">
                                          <h5>SLAC Meeting Date</h5>
                                          <p>
                                          <?php if($slac['slac_meeting_date'] != '0000-00-00'){
                                          echo !empty($slac['slac_meeting_date'])?date('F j, Y',strtotime($slac['slac_meeting_date'])):null;
                                          }
                                          ?>
                                          </p>
                                        </div>
                                        <div class="col-lg-6">
                                          <h5>SLAC Meeting No</h5>
                                          <p><?php echo isset($slac['slac_meeting_no'])?$slac['slac_meeting_no']:null;?></p>
                                        </div>
                                      <?php } ?>
                                    </div>

                                     <div class="row">
                                      <?php foreach($slsmc_details as $slsmc){ ?>
                                         <div class="col-lg-6">
                                             <h5>SLSMC Meeting Date</h5>
                                             <p><?php if($slsmc['slsmc_meeting_date'] != '0000-00-00'){
                                                 echo !empty($slsmc['slsmc_meeting_date']) ? date('F j, Y', strtotime($slsmc['slsmc_meeting_date'])) : null;
                                                 }?>
                                             </p>
                                         </div>
                                         <div class="col-lg-6">
                                             <h5>SLSMC Meeting No</h5>
                                             <p><?php echo isset($slsmc['slsmc_meeting_no'])?$slsmc['slsmc_meeting_no']:null;?></p>
                                         </div>
                                        <?php } ?>
                                     </div>



                                     <div class="row">
                                      <?php foreach($csmc_details as $csmc){ ?>
                                         <div class="col-lg-6">
                                             <h5>CSMC Meeting Date</h5>
                                             <p><?php if($csmc['csmc_meeting_date'] != '0000-00-00'){
                                                 echo !empty($csmc['csmc_meeting_date']) ? date('F j, Y', strtotime($csmc['csmc_meeting_date'])) : null;
                                                 }?></p>
                                         </div>
                                         <div class="col-lg-6">
                                             <h5>CSMC Meeting No</h5>
                                             <p><?php echo isset($csmc['csmc_meeting_no'])?$csmc['csmc_meeting_no']:null;?></p>
                                         </div>
                                      <?php } ?>
                                     </div>

                                     <div class="row">
                                         <div class="col-lg-6">
                                             <h5>Vertical</h5>
                                             <p><?php echo !empty($project_details['vertical'])?$project_details['vertical']:null;?></p>
                                         </div>
                                         <div class="col-lg-6">
                                             <h5>Implementing Agency</h5>
                                             <p><?php echo isset($project_details['implementing_agency'])?$project_details['implementing_agency']:null;?></p>
                                         </div>
                                     </div>

                                    <!-- <div class="row">
                                         <div class="col-lg-6">
                                             <h5>DPR</h5>
                                         </div>
                                         <div class="col-lg-6">
                                             <p><?php /*echo !empty($project_details['dpr'])?$project_details['dpr']:'N';*/?></p>
                                         </div>
                                     </div>-->


                                 </div>
                              </div>
                           </div>
                        </div>
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
                                                Approved DUs
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

                                     <div class="row">
                                         <div class="col-lg-6">
                                             <h5>EWS</h5>
                                             <p><?php echo isset($project_details['EWS'])?$project_details['EWS']:null;?></p>
                                         </div>
                                         <div class="col-lg-6">
                                             <h5>LIG</h5>
                                             <p><?php echo isset($project_details['LIG'])?$project_details['LIG']:null;?></p>
                                         </div>
                                     </div>

                                     <div class="row">
                                         <div class="col-lg-6">
                                             <h5>MIG</h5>
                                             <p><?php echo isset($project_details['MIG'])?$project_details['MIG']:null;?></p>
                                         </div>
                                         <div class="col-lg-6">
                                             <h5>HIG</h5>
                                             <p><?php echo isset($project_details['HIG'])?$project_details['HIG']:null;?></p>
                                         </div>
                                     </div>

                                     <div class="row">
                                         <div class="col-lg-6">
                                             <h5>Total DUs</h5>
                                             <p><?php echo isset($project_details['total_dus'])?$project_details['total_dus']:null;?></p>
                                         </div>
                                         <!--<div class="col-lg-6">
                                             <h5>Probable Start Date Of Project</h5>
                                             <p><?php /*echo isset($project_details['probable_start_date_of_project'])?date('F j, Y',strtotime($project_details['probable_start_date_of_project'])):null;*/?></p>
                                         </div>-->
                                         <div class="col-lg-6">
                                             <h5>Project cost EWS</h5>
                                             <p><?php echo isset($project_details['project_cost_ews'])?$project_details['project_cost_ews']:null;?></p>
                                         </div>
                                     </div>

                                     <div class="row">
                                         <!--<div class="col-lg-6">
                                             <h5>Probable Date Of Completion</h5>
                                             <p><?php /*echo isset($project_details['probable_date_of_completion'])?date('F j, Y',strtotime($project_details['probable_date_of_completion'])):null;*/?></p>
                                         </div>-->
                                         <div class="col-lg-6">
                                             <h5>Project cost total</h5>
                                             <p><?php echo isset($project_details['project_cost_total'])?$project_details['project_cost_total']:null;?> (Rs. in Cr.)</p>


                                         </div>

                                         <div class="col-lg-6">
                                             <h5>DRP Submitted</h5>
                                             <p><?php echo ($project_details['is_dpr_submitted']==1)?'Yes':'No';?></p>
                                         </div>
                                     </div>






                                 </div>
                            </div>
                          </div>
                        </div>

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
                                               Contact Details
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
                                     <div class="m-portlet__head">
                                     <div class="m-portlet__head-caption">
                                         <div class="m-portlet__head-title">
                                          <span class="m-portlet__head-icon m--hide">
                                          <i class="flaticon-statistics"></i>
                                          </span>
                                             <h5 class="main-title">
                                             <span>
                                               Implementing Agency Contact Details
                                             </span>
                                             </h5>
                                         </div>
                                     </div>
                                     </div>
                                     <div class="m-portlet__body" style="margin-top: -5%;">

                                         <div class="row">
                                             <div class="col-lg-6">
                                                 <h5>Agency Email</h5>
                                                 <p><?php echo isset($project_details['agency_email'])?$project_details['agency_email']:null;?></p>
                                             </div>
                                             <div class="col-lg-6">
                                                 <h5>Agency Mobile No</h5>
                                                 <p><?php echo isset($project_details['agency_mobile_no'])?$project_details['agency_mobile_no']:null;?></p>
                                             </div>
                                         </div>

                                         <div class="row">
                                             <div class="col-lg-6">
                                                 <h5>Agency Landline</h5>
                                                 <p><?php echo isset($project_details['agency_landline'])?$project_details['agency_landline']:null;?></p>
                                             </div>
                                         </div>

                                     </div>


                                     <div class="m-portlet__head">
                                         <div class="m-portlet__head-caption">
                                             <div class="m-portlet__head-title">
                                          <span class="m-portlet__head-icon m--hide">
                                          <i class="flaticon-statistics"></i>
                                          </span>
                                                 <h5 class="main-title">
                                             <span>
                                               Consultant Contact Details
                                             </span>
                                                 </h5>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="m-portlet__body" style="margin-top: -5%;">

                                         <?php
                                         foreach($consultant_details as $consultant) {
                                         ?>
                                         <div class="row">
                                             <div class="col-lg-6">
                                                 <h5>Consultant Name</h5>
                                                 <p><?php echo isset($consultant['consultant_name'])?$consultant['consultant_name']:null;?></p>
                                             </div>
                                             <div class="col-lg-6">
                                                 <h5>Consultant Mobile No</h5>
                                                 <p><?php echo isset($consultant['consultant_mobile_no'])?$consultant['consultant_mobile_no']:null;?></p>
                                             </div>
                                         </div>

                                         <div class="row">
                                             <div class="col-lg-6">
                                                 <h5>Consultant Landline</h5>
                                                 <p><?php echo isset($consultant['consultant_landline'])?$consultant['consultant_landline']:null;?></p>
                                             </div>
                                         </div>
<?php } ?>


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