<style type="text/css">
   .m--font-primary{
   display: contents;
   }

   .category {font-weight: bold;font-size: 20px;}

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
                           <a href="<?php echo base_url('projects');?>" class="btn m-btn--pill btn-dark float-right mb-3">Back</a>
                        </h3>
                     </div>
                     <div class="m-portlet__body">
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
                                             <span>Upload Documents</span>
                                          </h4>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="m-portlet__body" style="margin-top: -5%;">
                                    <?php echo form_open_multipart('','class="class="m-form m-form--fit m-form--label-align-right"');?>
                                    <div>
                                       <div class="row">
                                          <div class="col-lg-4">
                                             <div class="form-group m-form__group">
                                                <label for="doc_name">
                                                   Select Document
                                                </label>
                                                <select class="form-control m-input m-input--square chzn-select" name="doc_for" id="project_documents" required>
                                                    <option value="">Select Document</option>
                                                   <?php
                                                   foreach ($documents as $document) {
                                                            ?>
                                                           <option value="<?php echo $document['id']; ?>"><?php echo $document['name']; ?></option>
                                                           <?php
                                                   }
                                                   ?>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-lg-4" >
                                             <div class="form-group m-form__group" id="document_name" style="display:none">
                                                <label for="doc_name">
                                                Document Name
                                                </label>
                                                <input type="text" class="form-control m-input m-input--square" id="doc_name" placeholder="Enter Document name" name="doc_name">
                                             </div>
                                          </div>
                                          <div class="col-lg-4">
                                             <div class="form-group m-form__group">
                                                <label for="doc_file">
                                                Attach Document
                                                </label>
                                                <input type="file" class="form-control m-input m-input--square" id="doc_file" name="doc_file">
                                             </div>
                                          </div>
                                       </div>
                                       <br>
                                       <div class="m-form__actions">
                                          <button type="Submit" class="btn btn-primary">
                                          Submit
                                          </button>
                                       </div>                                 
                                       <?php echo form_close();?>
                                    </div>
                                    
                                       
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="m-portlet">
                                 <div class="m-portlet__head ">
                                    <div class="m-portlet__head-caption">
                                       <div class="m-portlet__head-title">
                                          <span class="m-portlet__head-icon m--hide">
                                          <i class="flaticon-statistics"></i>
                                          </span>
                                          <h4 class="main-title">
                                             <span>Previously Uploaded Documents</span>
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
                                                      Document Name
                                                   </th>
                                                   <th>
                                                      Submitted On
                                                   </th>
                                                   <th>
                                                      Actions
                                                   </th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                               <?php
                                                 if(is_array($project_documents))
                                                 {
                                                   foreach($project_documents as $key_documents => $each_document){
                                               ?>
                                                <tr>
                                                   <th scope="row">
                                                      <?php echo $key_documents+1;?>
                                                   </th>
                                                   <td>
                                                      <?php
                                                      if($each_document['document_id']==9)
                                                      {
                                                          echo $each_document['document_master_name'] .' - '.$each_document['document_name'];
                                                      }
                                                      else
                                                      {
                                                          echo $each_document['document_master_name'];
                                                      }

                                                      ?>
                                                   </td>
                                                   <td>
                                                      <?php echo date('d-m-Y',strtotime($each_document['created_at']));?>
                                                   </td>
                                                   <td>
                                                     <a href="<?php echo base_url('projects/download_document/'.base64_encode($this->encryption->encrypt($each_document['document_path'])));?>" target="_blank" class="btn m-btn--pill btn-primary" style="color: white">Download</a>
                                                     <a href="<?php echo base_url('projects/delete_document/'.base64_encode($this->encryption->encrypt($each_document['id'].'|'.$project_code.'|'.$project_id)));?>"  class="btn m-btn--pill btn-secondary" style="color: white">Delete</a>
                                                   </td>
                                                </tr>
                                               <?php
                                                   }
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
<script>
    $(document).ready(function(){
        $('#project_documents').change(function(){
            if($(this).val() == 9){ // if document is other
                $('#document_name').show();
            }
            else
            {
                $('#document_name').hide();
            }
        });
    });

</script>