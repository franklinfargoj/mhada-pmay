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
                        <h3 class="main-title"><?php echo $work_number;?>
                           <a href="<?php echo base_url('schemes/view/'.$redirect_url);?>" class="btn m-btn--pill btn-dark float-right mb-3">Back</a>
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
                                    <div class="row">
                                       <div class="col-lg-4">
                                          <h5>Work Number:</h5>
                                          <p><?php echo isset($work_details_project['work_number'])?$work_details_project['work_number']:null;?></p>
                                       </div>
                                       <div class="col-lg-4">
                                          <h5>Work Type:</h5>
                                          <p><?php echo isset($work_details_project['work_type'])?$work_details_project['work_type']:null;?></p>
                                       </div>
                                       <div class="col-lg-4">
                                          <h5>Parent work key:</h5>
                                          <p><?php echo isset($work_details_project['parent_work_key'])?$work_details_project['parent_work_key']:null;?></p>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-lg-4">
                                          <h5>Budget pg ID/referance/ No 17-18:</h5>
                                          <p><?php echo isset($work_details_project['budget_details'])?$work_details_project['budget_details']:null;?></p>
                                       </div>
                                       <div class="col-lg-4">
                                          <h5>Budget pg ID/referance/ No 17-18:</h5>
                                          <p><?php echo isset($work_details_project['budget_pg'])?$work_details_project['budget_pg']:null;?></p>
                                       </div>
                                       <div class="col-lg-4">
                                          <h5>Budget sr no Suffix 17 -18:</h5>
                                          <p><?php echo isset($work_details_project['budget_sr_suffix'])?$work_details_project['budget_sr_suffix']:null;?></p>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-lg-4">
                                          <h5>Department :</h5>
                                          <p><?php echo isset($work_details_project['department_name'])?$work_details_project['department_name']:null;?></p>
                                       </div>
                                       <div class="col-lg-4">
                                          <h5>Budget Expenditure:</h5>
                                          <p><?php echo isset($work_details_project['budget_name'])?$work_details_project['budget_name']:null;?></p>
                                       </div>
                                       <div class="col-lg-4">
                                          <h5>Approving Authority:</h5>
                                          <p><?php echo isset($work_details_project['approval_authority_name'])?$work_details_project['approval_authority_name']:null;?></p>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-lg-4">
                                          <h5>Board  :</h5>
                                          <p><?php echo isset($work_details_project['board_name'])?$work_details_project['board_name']:null;?></p>
                                       </div>
                                       <div class="col-lg-4">
                                          <h5>Sub Board:</h5>
                                          <p><?php echo isset($work_details_project['subboard_name'])?$work_details_project['subboard_name']:null;?></p>
                                       </div>
                                       <div class="col-lg-4">
                                          <h5>Executive Engineer:</h5>
                                          <p><?php echo isset($work_details_project['executive_name'])?$work_details_project['executive_name']:null;?></p>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-lg-4">
                                          <h5>Major :</h5>
                                          <p><?php echo isset($work_details_project['major_name'])?$work_details_project['major_name']:null;?></p>
                                       </div>
                                       <div class="col-lg-4">
                                          <h5>Work Type:</h5>
                                          <p><?php echo isset($work_details_project['work_type_secondary_name'])?$work_details_project['work_type_secondary_name']:null;?></p>
                                       </div>
                                       <div class="col-lg-4">
                                          <h5>Deputy Engineer:</h5>
                                          <p><?php echo isset($work_details_project['deputy_name'])?$work_details_project['deputy_name']:null;?></p>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-lg-4">
                                          <h5>Sub Major :</h5>
                                          <p><?php echo isset($work_details_project['sub_major_name'])?$work_details_project['sub_major_name']:null;?></p>
                                       </div>
                                       <div class="col-lg-4">
                                          <h5>Finantial Year:</h5>
                                          <p><?php echo isset($work_details_project['finantial_year'])?$work_details_project['finantial_year']:null;?></p>
                                       </div>
                                       <div class="col-lg-4">
                                          <h5>JE/AE/SE /Architect:</h5>
                                          <p><?php echo isset($work_details_project['type_details'])?$work_details_project['type_details']:null;?></p>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-lg-4">
                                          <h5>Ledger  :</h5>
                                          <p><?php echo isset($work_details_project['ledger_name'])?$work_details_project['ledger_name']:null;?></p>
                                       </div>
                                       <div class="col-lg-4">
                                          <h5>Work Code:</h5>
                                          <p><?php echo isset($work_details_project['work_code'])?$work_details_project['work_code']:null;?></p>
                                       </div>
                                       <div class="col-lg-4">
                                          <h5>Chief Accounts Officer:</h5>
                                          <p><?php echo isset($work_details_project['chief_name'])?$work_details_project['chief_name']:null;?></p>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-lg-4">
                                          <h5>Sub Ledger  :</h5>
                                          <p><?php echo isset($work_details_project['sub_ledger_name'])?$work_details_project['sub_ledger_name']:null;?></p>
                                       </div>
                                       <div class="col-lg-4">
                                          <h5>Estimated cost Rs:</h5>
                                          <p><?php echo isset($work_details_project['estimated_cost_rs'])?$work_details_project['estimated_cost_rs']:null;?></p>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-lg-4">
                                          <h5>Revised Budget Provision 16-17 :</h5>
                                          <p><?php echo isset($work_details_project['revised_budget'])?$work_details_project['revised_budget']:null;?></p>
                                       </div>
                                       <div class="col-lg-4">
                                          <h5>Budget Provision 17 -18:</h5>
                                          <p><?php echo isset($work_details_project['budget_provision'])?$work_details_project['budget_provision']:null;?></p>
                                       </div>
                                       <div class="col-lg-4">
                                          <h5>Approval Status :</h5>
                                          <p><?php echo isset($work_details_project['approval_status'])?$work_details_project['approval_status']:null;?></p>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-lg-12">
                                          <h5>Work Name :</h5>
                                          <p><?php echo isset($work_details_project['work_name_details'])?$work_details_project['work_name_details']:null;?></p>
                                       </div>
                                       <div class="col-lg-12">
                                          <h5>Work Description :</h5>
                                          <p><?php echo isset($work_details_project['work_description_details'])?$work_details_project['work_description_details']:null;?></p>
                                       </div>
                                       <div class="col-lg-12">
                                          <h5>Attachments :</h5>
                                          <p>
                                             <?php
                                                if(!empty(($work_details_project['work_file']))){
                                             ?>
                                                <a href="<?php echo base_url('schemes/download_document/'.base64_encode($this->encryption->encrypt($each_documents['work_file'])));?>" target="_blank" class="btn m-btn--pill btn-primary" style="color: white">Download</a>
                                             <?php
                                                }else{
                                                   echo "No Attachments";
                                                }
                                             ?>
                                          </p>
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