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
                  <div class="bgc-white bdrs-3 mB-20" style="overflow-x:auto;">
                     <div class="mr-auto m-portlet__head">
                        <h3 class="main-title">
                           <?php echo $project_code;?>
                           <a href="<?php echo base_url('agency/projects');?>" class="btn m-btn--pill btn-dark float-right mb-3">Back</a>
                        </h3>
                     </div>
                     <div class="m-portlet__body">
                     <div class="row">
                        <div class="col-md-12">
                        </div>
                     </div>
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
                                          Photos / Videos
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
                                                     Stage
                                                 </th>
                                                <th>
                                                   Type of file
                                                </th>
                                                <th>
                                                   Uploaded On
                                                </th>
                                                <th>
                                                   Actions
                                                </th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                            <?php
                                              if(is_array($uploaded_photos_videos) && array_filter($uploaded_photos_videos))
                                              {
                                                foreach($uploaded_photos_videos as $key => $each_document){
                                            ?>
                                             <tr>
                                                <th scope="row">
                                                   <?php echo $key+1;?>
                                                </th>
                                                 <td>
                                                     <?php echo $each_document['stage_master_name'];?>
                                                 </td>
                                                <td>
                                                   <?php
                                                   if($each_document['upload_type']==0)
                                                   {
                                                       echo "Photo";
                                                   }
                                                   else
                                                   {
                                                       echo "Video";
                                                   }
                                                   ?>
                                                </td>

                                                <td>
                                                   <?php echo date('d-m-Y',strtotime($each_document['created_at']));?>
                                                </td>
                                                <td>
                                                  <a href="<?php echo base_url('agency/download_document/'.base64_encode($this->encryption->encrypt($each_document['upload_path'])));?>" target="_blank" class="btn m-btn--pill btn-primary" style="color: white">Download</a>
                                                  <a href="<?php echo base_url('agency/delete_photos/'.base64_encode($this->encryption->encrypt($each_document['id'].'|'.$project_code.'|'.$project_id)));?>"  class="btn m-btn--pill btn-secondary" style="color: white" onclick="return confirm('Are you sure you want to discard this photo?');">Delete</a>
                                                </td>
                                             </tr>
                                            <?php
                                                }
                                              }else{
                                            ?>
                                                <tr><td colspan="5">No Photos / videos are uploaded previously..</td></tr>
                                            <?php
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
