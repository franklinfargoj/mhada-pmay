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
                                    <h3 class="main-title">List of agents</h3>
                                </div>
                            </div>
                            <div class="m-portlet__head-tools">
                                <ul class="m-portlet__nav">
                                    <li class="m-portlet__nav-item">

                                        <a data-toggle="modal" data-target="#add_agency" class="btn m-btn--pill btn-primary mb-3"
                                            style="float: right;">Add Agency</a></li>

                                    <div class="modal fade" id="add_agency" tabindex="-1" role="dialog" aria-labelledby="addAgencyLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <?php echo form_open(base_url('agencies/add_agency/'),'method="post" id="add_agency_form"');?>
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="adduserLabel"><strong>Add Agency</strong></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                            aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body" style="overflow-y: scroll; height:200px;">
                                                    <div class="form-group row">
                                                        <div class="col-sm-4">
                                                            <label for="development_status" class="form-control-label">
                                                                <strong>Name Of Agency</strong>
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="form-group">
                                                                <input type="text" name="name" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-4">
                                                            <label for="" class="form-control-label">
                                                                <strong>Email</strong>
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="form-group">
                                                                <input type="text" name="email_address" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-4">
                                                            <label for="" class="form-control-label">
                                                                <strong>Mobile No</strong>
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="form-group">
                                                                <input type="text" name="mobile_no" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-4">
                                                            <label for="" class="form-control-label">
                                                                <strong>Username</strong>
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="form-group">
                                                                <input type="text" name="username" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-4">
                                                            <label for="" class="form-control-label">
                                                                <strong>Password</strong>
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="form-group">
                                                                <input type="password" name="password" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-4">
                                                            <label for="" class="form-control-label">
                                                                <strong>Confirm Password</strong>
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="form-group">
                                                                <input type="password" name="confirm_password" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" id="submit_add_agency_form" class="btn btn-primary m-btn--pill">Submit</button>
                                                    <button type="button" class="btn btn-secondary m-btn--pill"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                            <?php echo form_close();?>
                                        </div>
                                    </div>



                                    <li class="m-portlet__nav-item">
                                        <a href="<?php echo base_url('agencies');?>" class="btn m-btn--pill btn-dark float-right mb-3">Back</a>

                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="m-portlet__body" style="overflow-x:auto;">

                            <table class="table table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name Of Agency</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Mobile No</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col" style="width:35%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                           if(is_array($agents_data['Agencies']) && array_filter($agents_data['Agencies']))
                           {
                              foreach($agents_data['Agencies'] as $count_scheme_serial => $each_agent)
                              {
                                 $style_tr = null;
                        ?>
                                    <tr <?php echo $style_tr;?>>
                                        <th scope="row">
                                            <?php echo $count_scheme_serial+1;?>
                                        </th>
                                        <td>
                                            <?php echo $each_agent['name'];?>
                                        </td>
                                        <td>
                                            <?php echo $each_agent['email_address'];?>
                                        </td>
                                        <td>
                                            <?php echo $each_agent['mobile_no'];?>
                                        </td>
                                        <td>
                                            <?php echo $each_agent['username'];?>
                                        </td>
                                        <td>
                                            <?php echo date('F j, Y',strtotime($each_agent['created_at']));?>
                                        </td>
                                        <td style="width:35%">
                                            <div class="button-group-custom">
                                                <a href="<?php echo base_url('agencies/view/'.base64_encode($this->encryption->encrypt($each_agent['id'])));?>"
                                                    class="mb-1 btn m-btn--pill btn-primary" style="color: white">View</a>

                                            </div>
                                            <!--  <a href="<?php //echo base_url('agents/add_building_details/'.base64_encode($this->encryption->encrypt($each_agent['code'].'|'.$each_agent['id'])));?>" target="_blank" class="btn m-btn--pill btn-primary" style="color: white">Add Details</a> -->

                                        </td>
                                    </tr>
                                    <?php
                              }
                           }else{
                              echo "<tr><td colspan='9'>No Agencies found.</td></tr>";
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
    $(document).on('change', '#ownership', function () {});
</script>