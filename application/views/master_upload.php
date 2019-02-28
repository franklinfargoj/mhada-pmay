<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <?php
         if($this->session->flashdata('success'))
         {
      ?>
        <div class="alert alert-success alert-dismissable" role="alert"><button type="button" class="close"
                data-dismiss="alert" aria-label="Close">
            </button>
            <?php echo $this->session->flashdata('success');?>
        </div>
        <?php
         }
      ?>
        <?php
         if($this->session->flashdata('error'))
         {
      ?>
        <div class="alert alert-danger alert-dismissable" role="alert"><button type="button" class="close" data-dismiss="alert"
                aria-label="Close">
            </button>
            <?php echo $this->session->flashdata('error');?>
        </div>
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
                                    <h3 class="main-title">Upload Project Details</h3>
                                </div>
                            </div>
                            <div class="m-portlet__head-tools">
                                <ul class="m-portlet__nav">
                                    <li class="m-portlet__nav-item">
                                    <li class="m-portlet__nav-item">
                                        <a href="<?php echo base_url('projects/dashboard');?>" class="btn m-btn--pill btn-dark float-right mb-3">Back</a>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="m-portlet__body" style="overflow-x:auto;">
                            <?php echo form_open_multipart(base_url('masters/upload_file'),'method="post" id="upload_project"');?>

                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label for="development_status" class="form-control-label">
                                            <strong>Select File to be upload</strong>
                                        </label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="file" name="project_file" id="project_file" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group pull-right row">
                                    <button type="submit" id="submit_add_agency_form" class="btn btn-primary m-btn--pill">Submit</button> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <button type="button" class="btn btn-secondary m-btn--pill"
                                        data-dismiss="modal">Close</button>
                                </div>
                            <?php echo form_close();?>
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