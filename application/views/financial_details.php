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
                                <h3 class="main-title">
                                    <?php echo $project_code;?>
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
                                                            <a href="#" data-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon"
                                                                title="" data-original-title="Collapse">
                                                                <i class="la la-angle-down"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="m-portlet__body" style="margin-top: -5%;">
                                                <div class="row">
                                                    <div class="col-lg-6">

                                                        <h5>Project Code</h5>
                                                        <p>
                                                            <?php echo isset($project_details['code'])?$project_details['code']:null;?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <h5>Project Title</h5>
                                                        <p>
                                                            <?php echo isset($project_details['title'])?$project_details['title']:null;?>
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <h5>Project Address</h5>
                                                        <p>
                                                            <?php echo isset($project_details['address'])?$project_details['address']:null;?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <h5>District</h5>
                                                        <p>
                                                            <?php echo isset($project_details['district_name'])?$project_details['district_name']:null;?>
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <h5>City</h5>
                                                        <p>
                                                            <?php echo isset($project_details['city_name'])?$project_details['city_name']:null;?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <h5>SLAC Meeting Date</h5>
                                                        <p>
                                                            <?php echo !empty($project_details['slac_meeting_date'])?date('F j, Y',strtotime($project_details['slac_meeting_date'])):null;?>
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <h5>SLAC Meeting No</h5>
                                                        <p>
                                                            <?php echo isset($project_details['slac_meeting_no'])?$project_details['slac_meeting_no']:null;?>
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <h5>SLSMC Meeting Date</h5>
                                                        <p>
                                                            <?php echo !empty($project_details['slsmc_meeting_date'])?date('F j, Y',strtotime($project_details['slsmc_meeting_date'])):null;?>
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <h5>SLSMC Meeting No</h5>
                                                        <p>
                                                            <?php echo isset($project_details['slsmc_meeting_no'])?$project_details['slsmc_meeting_no']:null;?>
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <h5>CSMC Meeting Date</h5>
                                                        <p>
                                                            <?php echo !empty($project_details['csmc_meeting_date'])?date('F j, Y',strtotime($project_details['csmc_meeting_date'])):null;?>
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <h5>CSMC Meeting No</h5>
                                                        <p>
                                                            <?php echo isset($project_details['csmc_meeting_no'])?$project_details['csmc_meeting_no']:null;?>
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <h5>Implementing Agency</h5>
                                                        <p>
                                                            <?php echo isset($project_details['implementing_agency'])?$project_details['implementing_agency']:null;?>
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <h5>Total DUs</h5>
                                                        <p>
                                                            <?php echo !empty($total_dus_under_construction)?$total_dus_under_construction:null;?>
                                                        </p>
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
                                                                Fund Details
                                                            </span>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="m-portlet__head-tools">
                                                    <ul class="m-portlet__nav">
                                                        <li class="m-portlet__nav-item">
                                                            <a href="#" data-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon"
                                                                title="" data-original-title="Collapse">
                                                                <i class="la la-angle-down"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="m-portlet__body" style="margin-top: -5%;">
                                                <?php echo form_open('','class="class="m-form m-form--fit m-form--label-align-right" id="save_stage_form"');?>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group m-form__group">
                                                            <label for="nodel_agency" class="form-control-label">
                                                                <strong>Select Noddel Agency <span style="color: red">*</span></strong>
                                                            </label>
                                                            <select required name="nodel_agency" class="form-control agency_installment"
                                                                id="nodel_agency">
                                                                <option value="">Select</option>
                                                                <option value="1">GOI</option>
                                                                <option value="2">GOM</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group m-form__group">
                                                            <label for="installment" class="form-control-label">
                                                                <strong>Select Installment <span style="color: red">*</span></strong>
                                                            </label>
                                                            <select required name="installment" class="form-control agency_installment"
                                                                id="installment">
                                                                <option value="">Select Installment</option>
                                                                <option value="1">First Installment (40%)</option>
                                                                <option value="2">Second Installment (40%)</option>
                                                                <option value="3">Third Installment (20%)</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="table-responsive">
                                                    <table class="table mb-0 table-hover" id="update_form_of_goi_fund">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th scope="col">installment</th>
                                                                <th scope="col"></th>
                                                                <th scope="col">GOI Order No</th>
                                                                <th scope="col">GOI Order Date</th>
                                                                <th scope="col">GOM Order No</th>
                                                                <th scope="col">GOM Order Date</th>
                                                                <th scope="col">MHADA Order No</th>
                                                                <th scope="col">MHADA Order Date</th>
                                                                <th scope="col">Utilized Amount</th>
                                                                <th scope="col">Utilization Certificate</th>
                                                            </tr>
                                                            <tr>
                                                                <th scope="col">Category</th>
                                                                <th scope="col">Amount (In Rs.) </th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                         foreach($categories as $category) {
                                             ?>
                                                            <tr>
                                                                <td>
                                                                    <h5>
                                                                        <?php echo strtoupper($category); ?>
                                                                    </h5>
                                                                </td>




                                                                <td><input type="text" class="form-control total_amount"
                                                                        name="financial_details[<?php echo $category; ?>][amount]"
                                                                        value="0" /> </td>
                                                                <td><input type="text" class="form-control" name="financial_details[<?php echo $category; ?>][goi_order_no]" />
                                                                </td>
                                                                <td><input class="form-control" type="date" max="<?php echo date("Y-m-d"); ?>" name="financial_details[<?php echo $category; ?>][goi_order_date]"
                                                                        value=""></td>
                                                                <td><input type="text" class="form-control" name="financial_details[<?php echo $category; ?>][gom_order_no]" />
                                                                </td>
                                                                <td><input type="date" class="form-control" max="<?php echo date("Y-m-d"); ?>" name="financial_details[<?php echo $category; ?>][gom_order_date]" />
                                                                </td>
                                                                <td><input type="text" class="form-control" name="financial_details[<?php echo $category; ?>][mhada_order_no]" />
                                                                </td>
                                                                <td><input type="date" class="form-control" max="<?php echo date("Y-m-d"); ?>" name="financial_details[<?php echo $category; ?>][mhada_order_date]" />
                                                                </td>
                                                                <td>- </td>
                                                                <td>-</td>

                                                            </tr>
                                                            <?php
                                         }
                                         ?>
                                                            <tr>
                                                                <td>
                                                                    <h5>Total Amount</h5>
                                                                </td>
                                                                <td><input readonly class="form-control" type="text"
                                                                        name="total_amount" id="total_amount" value="0" /></td>
                                                                <td> - </td>
                                                                <td> - </td>
                                                                <td> - </td>
                                                                <td> - </td>
                                                                <td> - </td>
                                                                <td> - </td>
                                                                <td>-</td>
                                                                <td> - </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>


                                                <div class="table-responsive">
                                                    <table class="table mb-0 table-hover" id="update_form_of_gom_fund"
                                                        style="display:none;">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th scope="col">installment Display</th>
                                                                <th scope="col"></th>
                                                                <th scope="col">GOM Order No</th>
                                                                <th scope="col">GOM Order Date</th>
                                                                <th scope="col">MHADA Order No</th>
                                                                <th scope="col">MHADA Order Date</th>
                                                                <th scope="col">Utilized Amount</th>
                                                                <th scope="col">Utilization Certificate</th>
                                                            </tr>
                                                            <tr>
                                                                <th scope="col">Category</th>
                                                                <th scope="col">Amount (In Rs.) </th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                         foreach($categories as $category) {
                                             ?>
                                                            <tr>
                                                                <td>
                                                                    <h5>
                                                                        <?php echo strtoupper($category); ?>
                                                                    </h5>
                                                                </td>

                                                                <td><input type="text" class="form-control gom_total_amount"
                                                                        name="gom_financial_details[<?php echo $category; ?>][amount]"
                                                                        value="0" /> </td>
                                                                <td><input type="text" class="form-control" name="gom_financial_details[<?php echo $category; ?>][gom_order_no]" />
                                                                </td>
                                                                <td><input type="date" class="form-control" name="gom_financial_details[<?php echo $category; ?>][gom_order_date]" />
                                                                </td>
                                                                <td><input type="text" class="form-control" name="gom_financial_details[<?php echo $category; ?>][mhada_order_no]" />
                                                                </td>
                                                                <td><input type="date" class="form-control" name="gom_financial_details[<?php echo $category; ?>][mhada_order_date]" />
                                                                </td>
                                                                <td> </td>
                                                                <td></td>

                                                            </tr>
                                                            <?php
                                         }
                                         ?>
                                                            <tr>
                                                                <td>
                                                                    <h5>Total Amount</h5>
                                                                </td>
                                                                <td><input readonly class="form-control" type="text"
                                                                        name="gom_total_amount" id="gom_total_amount"
                                                                        value="0" /></td>
                                                                <td> - </td>
                                                                <td> - </td>
                                                                <td> - </td>
                                                                <td> - </td>
                                                                <td>-</td>
                                                                <td> - </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="m-form__actions">
                                                    <br>
                                                    <button type="submit" id="save_stage" name="save_financial_details"
                                                        class="btn m-btn--pill btn-primary">
                                                        Save
                                                    </button>

                                                    <!-- <button type="button" id="cancel_stage" name="cancel_stage" class="btn m-btn--pill btn-dark">
                                             Cancel
                                         </button> -->
                                                </div>
                                                <?php echo form_close();?>

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
                                                                View Fund Details
                                                            </span>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="m-portlet__head-tools">
                                                    <ul class="m-portlet__nav">
                                                        <li class="m-portlet__nav-item">
                                                            <a href="#" data-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon"
                                                                title="" data-original-title="Collapse">
                                                                <i class="la la-angle-down"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="m-portlet__body" style="margin-top: -5%;">

                                                <div class="table-responsive">
                                                    <table class="table mb-0 table-hover" id="display_form_of_goi_fund">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th scope="col">1st installment (40%)</th>
                                                                <th scope="col"></th>
                                                                <th scope="col">GOI Order No</th>
                                                                <th scope="col">GOI Order Date</th>
                                                                <th scope="col">GOM Order No</th>
                                                                <th scope="col">GOM Order Date</th>
                                                                <th scope="col">MHADA Order No</th>
                                                                <th scope="col">MHADA Order Date</th>
                                                                <th scope="col">Utilized Amount</th>
                                                                <th scope="col">Utilization Certificate</th>
                                                                <th scope="col">2nd installment (40%)</th>
                                                                <th scope="col"></th>
                                                                <th scope="col">GOI Order No</th>
                                                                <th scope="col">GOI Order Date</th>
                                                                <th scope="col">GOM Order No</th>
                                                                <th scope="col">GOM Order Date</th>
                                                                <th scope="col">MHADA Order No</th>
                                                                <th scope="col">MHADA Order Date</th>
                                                                <th scope="col">Utilized Amount</th>
                                                                <th scope="col">Utilization Certificate</th>
                                                                <th scope="col">3rd installment (20%)</th>
                                                                <th scope="col"></th>
                                                                <th scope="col">GOI Order No</th>
                                                                <th scope="col">GOI Order Date</th>
                                                                <th scope="col">GOM Order No</th>
                                                                <th scope="col">GOM Order Date</th>
                                                                <th scope="col">MHADA Order No</th>
                                                                <th scope="col">MHADA Order Date</th>
                                                                <th scope="col">Utilized Amount</th>
                                                                <th scope="col">Utilization Certificate</th>
                                                            </tr>
                                                            <tr>
                                                                <th scope="col">Category</th>
                                                                <th scope="col">Amount (In Rs.) </th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col">Category</th>
                                                                <th scope="col">Amount (In Rs.) </th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col">Category</th>
                                                                <th scope="col">Amount (In Rs.) </th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                             foreach($categories as $category) {
                                             ?>
                                                            <tr>
                                                                <td>
                                                                    <h5>
                                                                        <?php echo $category; ?>
                                                                    </h5>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[0][$category.'_amount'])?$goi_details[0][$category.'_amount']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[0][$category.'_goi_order_no'])?$goi_details[0][$category.'_goi_order_no']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[0][$category.'_goi_order_date'])?date('d-m-Y',strtotime($goi_details[0][$category.'_goi_order_date'])):null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[0][$category.'_gom_order_no'])?$goi_details[0][$category.'_gom_order_no']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[0][$category.'_gom_order_date'])?date('d-m-Y',strtotime($goi_details[0][$category.'_gom_order_date'])):null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[0][$category.'_mhada_order_no'])?$goi_details[0][$category.'_mhada_order_no']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[0][$category.'_mhada_order_date'])?date('d-m-Y',strtotime($goi_details[0][$category.'_mhada_order_date'])):null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[0][$category.'_utilization_amount'])?$goi_details[0][$category.'_utilization_amount']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php  ?>
                                                                </td>

                                                                <td>
                                                                    <?php echo $category; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[1][$category.'_amount'])?$goi_details[1][$category.'_amount']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[1][$category.'_goi_order_no'])?$goi_details[1][$category.'_goi_order_no']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[1][$category.'_goi_order_date'])?date('d-m-Y',strtotime($goi_details[1][$category.'_goi_order_date'])):null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[1][$category.'_gom_order_no'])?$goi_details[1][$category.'_gom_order_no']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[1][$category.'_gom_order_date'])?date('d-m-Y',strtotime($goi_details[1][$category.'_gom_order_date'])):null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[1][$category.'_mhada_order_no'])?$goi_details[1][$category.'_mhada_order_no']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[1][$category.'_mhada_order_date'])?date('d-m-Y',strtotime($goi_details[1][$category.'_mhada_order_date'])):null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[1][$category.'_utilization_amount'])?$goi_details[1][$category.'_utilization_amount']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php  ?>
                                                                </td>

                                                                <td>
                                                                    <?php echo $category; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[2][$category.'_amount'])?$goi_details[2][$category.'_amount']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[2][$category.'_goi_order_no'])?$goi_details[2][$category.'_goi_order_no']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[2][$category.'_goi_order_date'])?date('d-m-Y',strtotime($goi_details[2][$category.'_goi_order_date'])):null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[2][$category.'_gom_order_no'])?$goi_details[2][$category.'_gom_order_no']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[2][$category.'_gom_order_date'])?date('d-m-Y',strtotime($goi_details[2][$category.'_gom_order_date'])):null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[2][$category.'_mhada_order_no'])?$goi_details[2][$category.'_mhada_order_no']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[2][$category.'_mhada_order_date'])?date('d-m-Y',strtotime($goi_details[2][$category.'_mhada_order_date'])):null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[2][$category.'_utilization_amount'])?$goi_details[2][$category.'_utilization_amount']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php  ?>
                                                                </td>

                                                            </tr>

                                                            <?php } ?>
                                                            <tr>
                                                                <td>
                                                                    <h5>Total Amount</h5>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[0]['total_amount'])?$goi_details[0]['total_amount']:null;   ?>
                                                                </td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>
                                                                    <?php echo isset($goi_details[0]['total_utilization_amount'])?$goi_details[0]['total_utilization_amount']:null;   ?>
                                                                </td>
                                                                <td>-</td>

                                                                <td>
                                                                    <h5>Total Amount</h5>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[1]['total_amount'])?$goi_details[1]['total_amount']:null;   ?>
                                                                </td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>
                                                                    <?php echo isset($goi_details[1]['total_utilization_amount'])?$goi_details[1]['total_utilization_amount']:null;   ?>
                                                                </td>
                                                                <td>-</td>

                                                                <td>
                                                                    <h5>Total Amount</h5>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[2]['total_amount'])?$goi_details[2]['total_amount']:null;   ?>
                                                                </td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>
                                                                    <?php echo isset($goi_details[2]['total_utilization_amount'])?$goi_details[2]['total_utilization_amount']:null;   ?>
                                                                </td>
                                                                <td>-</td>

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="table-responsive">
                                                    <table class="table mb-0 table-hover" id="display_form_of_gom_fund"
                                                        style="display:none;">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th scope="col">1st installment (40%)</th>
                                                                <th scope="col"></th>
                                                                <th scope="col">GOM Order No</th>
                                                                <th scope="col">GOM Order Date</th>
                                                                <th scope="col">MHADA Order No</th>
                                                                <th scope="col">MHADA Order Date</th>
                                                                <th scope="col">Utilized Amount</th>
                                                                <th scope="col">Utilization Certificate</th>
                                                                <th scope="col">2nd installment (40%)</th>
                                                                <th scope="col"></th>
                                                                <th scope="col">GOM Order No</th>
                                                                <th scope="col">GOM Order Date</th>
                                                                <th scope="col">MHADA Order No</th>
                                                                <th scope="col">MHADA Order Date</th>
                                                                <th scope="col">Utilized Amount</th>
                                                                <th scope="col">Utilization Certificate</th>
                                                                <th scope="col">3rd installment (20%)</th>
                                                                <th scope="col"></th>
                                                                <th scope="col">GOM Order No</th>
                                                                <th scope="col">GOM Order Date</th>
                                                                <th scope="col">MHADA Order No</th>
                                                                <th scope="col">MHADA Order Date</th>
                                                                <th scope="col">Utilized Amount</th>
                                                                <th scope="col">Utilization Certificate</th>
                                                            </tr>
                                                            <tr>
                                                                <th scope="col">Category</th>
                                                                <th scope="col">Amount (In Rs.) </th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col">Category</th>
                                                                <th scope="col">Amount (In Rs.) </th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col">Category</th>
                                                                <th scope="col">Amount (In Rs.) </th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                             foreach($categories as $category) {
                                                 ?>
                                                            <tr>
                                                                <td>
                                                                    <h5>
                                                                        <?php echo $category; ?>
                                                                    </h5>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[0][$category.'_amount'])?$gom_details[0][$category.'_amount']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[0][$category.'_gom_order_no'])?$gom_details[0][$category.'_gom_order_no']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[0][$category.'_gom_order_date'])?date('d-m-Y',strtotime($gom_details[0][$category.'_gom_order_date'])):null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[0][$category.'_mhada_order_no'])?$gom_details[0][$category.'_mhada_order_no']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[0][$category.'_mhada_order_date'])?date('d-m-Y',strtotime($gom_details[0][$category.'_mhada_order_date'])):null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[0][$category.'_utilization_amount'])?$gom_details[0][$category.'_utilization_amount']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php  ?>
                                                                </td>

                                                                <td>
                                                                    <?php echo $category; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[1][$category.'_amount'])?$gom_details[1][$category.'_amount']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[1][$category.'_gom_order_no'])?$gom_details[1][$category.'_gom_order_no']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[1][$category.'_gom_order_date'])?date('d-m-Y',strtotime($gom_details[1][$category.'_gom_order_date'])):null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[1][$category.'_mhada_order_no'])?$gom_details[1][$category.'_mhada_order_no']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[1][$category.'_mhada_order_date'])?date('d-m-Y',strtotime($gom_details[1][$category.'_mhada_order_date'])):null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[1][$category.'_utilization_amount'])?$gom_details[1][$category.'_utilization_amount']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php  ?>
                                                                </td>

                                                                <td>
                                                                    <?php echo $category; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[2][$category.'_amount'])?$gom_details[2][$category.'_amount']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[2][$category.'_gom_order_no'])?$gom_details[2][$category.'_gom_order_no']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[2][$category.'_gom_order_date'])?date('d-m-Y',strtotime($gom_details[2][$category.'_gom_order_date'])):null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[2][$category.'_mhada_order_no'])?$gom_details[2][$category.'_mhada_order_no']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[2][$category.'_mhada_order_date'])?date('d-m-Y',strtotime($gom_details[2][$category.'_mhada_order_date'])):null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[2][$category.'_utilization_amount'])?$gom_details[2][$category.'_utilization_amount']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php  ?>
                                                                </td>

                                                            </tr>

                                                            <?php } ?>
                                                            <tr>
                                                                <td>
                                                                    <h5>Total Amount</h5>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[0]['total_amount'])?$gom_details[0]['total_amount']:null;   ?>
                                                                </td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>
                                                                    <?php echo isset($gom_details[0]['total_utilization_amount'])?$gom_details[0]['total_utilization_amount']:null;   ?>
                                                                </td>
                                                                <td>-</td>

                                                                <td>
                                                                    <h5>Total Amount</h5>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[1]['total_amount'])?$gom_details[1]['total_amount']:null;   ?>
                                                                </td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>
                                                                    <?php echo isset($gom_details[1]['total_utilization_amount'])?$gom_details[1]['total_utilization_amount']:null;   ?>
                                                                </td>
                                                                <td>-</td>

                                                                <td>
                                                                    <h5>Total Amount</h5>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[2]['total_amount'])?$gom_details[2]['total_amount']:null;   ?>
                                                                </td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>
                                                                    <?php echo isset($gom_details[2]['total_utilization_amount'])?$gom_details[2]['total_utilization_amount']:null;   ?>
                                                                </td>
                                                                <td>-</td>

                                                            </tr>
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
</main>
<script src="<?php echo base_url();?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/snippets/pages/user/login.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {

        $('#nodel_agency').change(function () {

            var nodel_agency = $('#nodel_agency').val();

            if (nodel_agency != '') {
                if (nodel_agency == 1) {
                    $('#update_form_of_goi_fund').show();
                    $('#display_form_of_goi_fund').show();


                    $('#update_form_of_gom_fund').hide();
                    $('#display_form_of_gom_fund').hide();
                } else {
                    $('#update_form_of_goi_fund').hide();
                    $('#display_form_of_goi_fund').hide();

                    $('#update_form_of_gom_fund').show();
                    $('#display_form_of_gom_fund').show();
                }
            }


        });


        $('#installment').change(function () {

            var nodel_agency = $('#nodel_agency').val();
            var installment = $('#installment').val();

            if (nodel_agency == '') {
                alert('Please select nodel agency');
                return false;
            }


        });

        $(document).on("keyup", ".total_amount", function () {

            var sum = 0;
            $(".total_amount").each(function () {
                sum += parseInt($(this).val());
            });

            $('#total_amount').attr('value', sum);


        });

        $(document).on("keyup", ".total_utilization_amount", function () {

            var sum = 0;
            $(".total_utilization_amount").each(function () {
                sum += parseInt($(this).val());
            });

            $('#total_utilization_amount').attr('value', sum);


        });


        $(document).on("keyup", ".gom_total_amount", function () {

            var sum = 0;
            $(".gom_total_amount").each(function () {
                sum += parseInt($(this).val());
            });

            $('#gom_total_amount').attr('value', sum);


        });

        $(document).on("keyup", ".gom_total_utilization_amount", function () {

            var sum = 0;
            $(".gom_total_utilization_amount").each(function () {
                sum += parseInt($(this).val());
            });

            $('#gom_total_utilization_amount').attr('value', sum);


        });


    });
</script>