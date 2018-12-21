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
            <div class="bd bgc-white">
               <div class="col-md-12">
                  <div class="bgc-white bdrs-3 p-20 mB-20">
                     <h3 class="main-title">
                        Photos Submitted For Work Memo <span style="color: #0f9aee;font-weight: bold;"><?php echo $memo_number;?></span>
                        <a href="<?php echo base_url('dashboard');?>" class="btn m-btn--pill btn-dark float-right">Back</a>
                     </h3>
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
                                             Before
                                          </span>
                                       </h2>
                                    </div>
                                 </div>
                              </div>
                              <div class="m-portlet__body" style="margin-top: -5%;">
                                 <?php
                                    if(isset($photos_submitted['before']) && is_array($photos_submitted['before']) && array_filter($photos_submitted['before']))
                                    {
                                       foreach($photos_submitted['before'] as $serial_photo => $photo_detail)
                                       {
                                 ?>
                                       <p>
                                          <h5 style="display: contents;"><?php echo $serial_photo + 1;?>.</h5> <h5 style="display: contents;">Uploaded on <?php echo date('F j,Y',strtotime($photo_detail['uploaded_on']));?></h5>
                                          <a target="_blank" href="<?php echo base_url('Services/download_attachment/'.base64_encode($this->encryption->encrypt($photo_detail['photo_file'])));?>" class="btn btn-outline-success m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill">
                                                <i class="fa fa-download"></i>
                                          </a>
                                       </p>
                                 <?php
                                       }
                                    }
                                    else{
                                       echo "<p><h2>No Photos found for this section.</h2></p>";
                                    }
                                 ?>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="m-portlet m-portlet--creative m-portlet--first m-portlet--bordered-semi">
                              <div class="m-portlet__head main-sub-title">
                                 <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                       <span class="m-portlet__head-icon m--hide">
                                       <i class="flaticon-statistics"></i>
                                       </span>
                                       <h2 class="m-portlet__head-label m-portlet__head-label--warning">
                                          <span>
                                             During
                                          </span>
                                       </h2>
                                    </div>
                                 </div>
                              </div>
                              <div class="m-portlet__body" style="margin-top: -5%;">
                                 <?php
                                    if(isset($photos_submitted['during']) && is_array($photos_submitted['during']) && array_filter($photos_submitted['during']))
                                    {
                                       foreach($photos_submitted['during'] as $serial_photo => $photo_detail)
                                       {
                                 ?>
                                       <p>
                                          <h5 style="display: contents;"><?php echo $serial_photo + 1;?>.</h5> <h5 style="display: contents;">Uploaded on <?php echo date('F j,Y',strtotime($photo_detail['uploaded_on']));?></h5>
                                          <a target="_blank" href="<?php echo base_url('Services/download_attachment/'.base64_encode($this->encryption->encrypt($photo_detail['photo_file'])));?>" class="btn btn-outline-success m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill">
                                                <i class="fa fa-download"></i>
                                          </a>
                                       </p>
                                 <?php
                                       }
                                    }
                                    else{
                                       echo "<p><h2>No Photos found for this section.</h2></p>";
                                    }
                                 ?>
                              </div>
                           </div>
                        </div>
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
                                             After
                                          </span>
                                       </h2>
                                    </div>
                                 </div>
                              </div>
                              <div class="m-portlet__body" style="margin-top: -5%;">
                                 <?php
                                    if(isset($photos_submitted['after']) && is_array($photos_submitted['after']) && array_filter($photos_submitted['after']))
                                    {
                                       foreach($photos_submitted['after'] as $serial_photo => $photo_detail)
                                       {
                                 ?>
                                       <p>
                                          <h5 style="display: contents;"><?php echo $serial_photo + 1;?>.</h5> <h5 style="display: contents;">Uploaded on <?php echo date('F j,Y',strtotime($photo_detail['uploaded_on']));?></h5>
                                          <a target="_blank" href="<?php echo base_url('Services/download_attachment/'.base64_encode($this->encryption->encrypt($photo_detail['photo_file'])));?>" class="btn btn-outline-success m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill">
                                                <i class="fa fa-download"></i>
                                          </a>
                                       </p>
                                 <?php
                                       }
                                    }
                                    else{
                                       echo "<p><h2>No Photos found for this section.</h2></p>";
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
</main>
