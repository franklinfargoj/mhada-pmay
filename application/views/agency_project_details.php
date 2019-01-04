<style type="text/css">
    .m--font-primary {
        display: contents;
    }
</style>
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
            <div class="masonry-item col-12">
                <div class="">
                    <div class="m-portlet">
                        <div class="bgc-white bdrs-3" style="overflow-x:auto;">
                            <div class="mr-auto m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <h3 class="main-title">List Of Assigned Projects</h3>
                                    </div>
                                </div>


                                <div class="m-portlet__head-tools">
                                    <ul class="m-portlet__nav">
                                        <li class="m-portlet__nav-item">
                                            <a class="btn m-btn--pill btn-primary mb-3" style="float: right;"
                                                data-toggle="modal" data-target="#assign_project">Assign New Project</a>


                                            <div class="modal fade" id="assign_project" tabindex="-1" role="dialog"
                                                aria-labelledby="assignProjectLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <?php echo form_open(base_url('agencies/assign_project_to_agency/'),'method="post" id="add_agency_form"');?>
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="adduserLabel"><strong>Assign
                                                                    Project To Agency</strong></h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body" style="overflow-y: scroll; height:200px;">
                                                            <div class="form-group row">
                                                                <div class="col-sm-4">
                                                                    <label for="agency_name" class="form-control-label">
                                                                        <strong>Agency Name</strong>
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <div class="form-group">
                                                                        <?php echo $agency_details[0]['name']; ?>
                                                                        <input type="hidden" name="agency_id" class="form-control"
                                                                            value="<?php echo $agency_details[0]['id']; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-sm-4">
                                                                    <label for="" class="form-control-label">
                                                                        <strong>Select Project</strong>
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <div class="form-group">
                                                                        <select id="project_ids" name="project_ids[]"
                                                                            multiple="multiple" style="width: 150px;">
                                                                            <?php  foreach($projects_to_assign as $project) {  ?>
                                                                            <option value="<?php echo $project['id']; ?>"
                                                                                <?php if($project['agency_id']==$agency_details[0]['id']){
                                                                                echo 'selected' ; } ?> >
                                                                                <?php echo $project['title']; ?>
                                                                            </option>
                                                                            <?php } ?>
                                                                        </select>
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


                                        </li>
                                        <li class="m-portlet__nav-item">

                                            <a href="<?php echo base_url('Agencies');?>" class="btn m-btn--pill btn-dark float-right mb-3">Back</a>

                                        </li>
                                    </ul>
                                </div>

                            </div>




                            <div class="m-portlet__body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="m-portlet" id="m_portlet_tools_3">
                                            <div class="m-portlet__body" style="margin-top: -5%;">

                                                <table class="table table-hover">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Project Code</th>
                                                            <th scope="col">Project Title</th>
                                                            <th scope="col">District</th>
                                                            <th scope="col">City</th>
                                                            <th scope="col">CSMC Meeting Date</th>
                                                            <th scope="col" style="width:35%">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                         if(is_array($agency_project_details) && array_filter($agency_project_details))
                                         {
                                             foreach($agency_project_details as $count_scheme_serial => $agency_project)
                                             {
                                                 $style_tr = null;
                                                 ?>
                                                        <tr <?php echo $style_tr;?>>
                                                            <th scope="row">
                                                                <?php echo $count_scheme_serial+1;?>
                                                            </th>
                                                            <td>
                                                                <?php echo $agency_project['code'];?>
                                                            </td>
                                                            <td>
                                                                <?php echo $agency_project['title'];?>
                                                            </td>
                                                            <td>
                                                                <?php echo $agency_project['district'];?>
                                                            </td>
                                                            <td>
                                                                <?php echo $agency_project['city'];?>
                                                            </td>
                                                            <td>
                                                                <?php echo date('F j, Y',strtotime($agency_project['csmc_meeting_date']));?>
                                                            </td>
                                                            <td style="width:35%">
                                                                <div class="button-group-custom">
                                                                    <a href="<?php echo base_url('agencies/delete_project/'.base64_encode($this->encryption->encrypt($agency_project['id'])));?>"
                                                                        class="mb-1 btn m-btn--pill btn-primary" style="color: white">Remove
                                                                        Project</a>

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
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url();?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/snippets/pages/user/login.js" type="text/javascript"></script>