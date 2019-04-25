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
                                    <a href="<?php echo base_url('agency/projects');?>" class="btn m-btn--pill btn-dark float-right mb-3">Back</a>
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
                                                        <p> <input type="hidden" name="project_id" id="project_id" value="<?php echo $project_details['id']; ?>" />
                                                            <?php echo isset($project_details['code'])?$project_details['code']:null;?>
                                                        </p>
                                                    </div>
                                                        <div class="col-lg-6" >
                                                             <h5>DPR Title</h5>
                                                             <p><?php echo isset($project_details['dpr'])?$project_details['dpr']:null;?></p>
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
                                                    <?php foreach($slac_details as $slac){ ?>
                                                    <div class="col-lg-6">
                                                        <h5>SLAC Meeting Date</h5>
                                                        <p>
                                                            <?php echo !empty($slac['slac_meeting_date'])?date('F j, Y',strtotime($slac['slac_meeting_date'])):null;?>
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <h5>SLAC Meeting No</h5>
                                                        <p>
                                                            <?php echo isset($slac['slac_meeting_no'])?$slac['slac_meeting_no']:null;?>
                                                        </p>
                                                    </div>
                                                    <?php } ?>
                                                </div>

                                                <div class="row">
                                                    <?php foreach($slsmc_details as $slsmc){ ?>
                                                    <div class="col-lg-6">
                                                        <h5>SLSMC Meeting Date</h5>
                                                        <p>
                                                            <?php echo !empty($slsmc['slsmc_meeting_date'])?date('F j, Y',strtotime($slsmc['slsmc_meeting_date'])):null;?>
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <h5>SLSMC Meeting No</h5>
                                                        <p>
                                                            <?php echo isset($slsmc['slsmc_meeting_no'])?$slsmc['slsmc_meeting_no']:null;?>
                                                        </p>
                                                    </div>
                                                    <?php } ?>
                                                </div>

                                                <div class="row">
                                                    <?php foreach($csmc_details as $csmc){ ?>
                                                    <div class="col-lg-6">
                                                        <h5>CSMC Meeting Date</h5>
                                                        <p>
                                                            <?php echo !empty($csmc['csmc_meeting_date'])?date('F j, Y',strtotime($csmc['csmc_meeting_date'])):null;?>
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <h5>CSMC Meeting No</h5>
                                                        <p>
                                                            <?php echo isset($csmc['csmc_meeting_no'])?$csmc['csmc_meeting_no']:null;?>
                                                        </p>
                                                    </div>
                                                    <?php } ?>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <h5>Implementing Agency</h5>
                                                        <p>
                                                            <?php echo isset($project_details['implementing_agency'])?$project_details['implementing_agency']:null;?>
                                                        </p>
                                                    </div>
                                                </div>

                                               <!-- <div class="row">
                                                    <div class="col-lg-6">
                                                        <h5>Total DUs</h5>
                                                        <p>
                                                            <?php /*echo !empty($total_dus_under_construction)?$total_dus_under_construction:null;*/?>
                                                        </p>
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
                                                <?php echo form_open_multipart('','class="class="m-form m-form--fit m-form--label-align-right" id="save_stage_form"');?>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group m-form__group">
                                                            <label for="nodel_agency" class="form-control-label">
                                                                <strong>Select Nodel Agency <span style="color: red">*</span></strong>
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
                                                            <th scope="col" colspan="4" style="text-align: center">GOI</th>
                                                            <th scope="col" colspan="4" style="text-align: center">GOM</th>
                                                            <th scope="col" colspan="6" style="text-align: center">MHADA</th>
                                                            <th scope="col" colspan="3" style="text-align: center">Agency Utilization</th>
                                                            <th scope="col">Remark</th>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">Category</th>

                                                            <th scope="col">Amount (In Rs.) </th>
                                                            <th scope="col">Order No</th>
                                                            <th scope="col">Order Date</th>
                                                            <th scope="col">Upload Doc</th>

                                                            <th scope="col">Amount (In Rs.) </th>
                                                            <th scope="col">Order No</th>
                                                            <th scope="col">Order Date</th>
                                                            <th scope="col">Upload Doc</th>

                                                            <th scope="col">Received Amount </th>
                                                            <th scope="col">Received Date</th>
                                                            <th scope="col">Released Amount</th>
                                                            <th scope="col">Released Oder No</th>
                                                            <th scope="col">Released Order Date</th>
                                                            <th scope="col">Upload Doc</th>


                                                            <th scope="col">No Of Transactions</th>
                                                            <th scope="col">Expenditure - GOI</th>
                                                            <th scope="col">Utilization Certificate</th>
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

                                                                <td id="<?php echo $category.'_amount'; ?>"></td>
                                                                <td id="<?php echo $category.'_goi_order_no'; ?>"></td>
                                                                <td id="<?php echo $category.'_goi_order_date'; ?>"></td>
                                                                <td id="<?php echo $category.'_goi_upload_doc'; ?>"></td>

                                                                <td id="<?php echo $category.'_gom_amount'; ?>"></td>
                                                                <td id="<?php echo $category.'_gom_order_no'; ?>"></td>
                                                                <td id="<?php echo $category.'_gom_order_date'; ?>"></td>
                                                                <td id="<?php echo $category.'_gom_upload_doc'; ?>"></td>

                                                                <td id="<?php echo $category.'_mhada_received_amount'; ?>"></td>
                                                                <td id="<?php echo $category.'_mhada_received_date'; ?>"></td>
                                                                <td id="<?php echo $category.'_mhada_released_amount'; ?>"></td>
                                                                <td id="<?php echo $category.'_mhada_order_no'; ?>"></td>
                                                                <td id="<?php echo $category.'_mhada_order_date'; ?>"></td>
                                                                <td id="<?php echo $category.'_mhada_upload_doc'; ?>"></td>

                                                                <td><input type="text" class="form-control"
                                                                           name="financial_details[<?php echo $category; ?>][transactions]"
                                                                           id="<?php echo $category.'_transactions'; ?>" /> </td>
                                                                <td><input type="text" class="form-control total_utilization_amount"
                                                                        name="financial_details[<?php echo $category; ?>][utilization_amount]"
                                                                           id="<?php echo $category.'_utilization_amount'; ?>" value="0" /> </td>
                                                                <td><input type="file" name="<?php echo $category; ?>_utilization_certificate"  class="form-control" /></td>
                                                                <td id="<?php echo $category.'_remark'; ?>"></td>
                                                            </tr>
                                                            <?php
                                         }
                                         ?>
                                                            <tr>
                                                                <td>
                                                                    <h5>Total Amount</h5>
                                                                </td>
                                                                <td id="<?php echo 'total_amount'; ?>"></td>
                                                                <td> - </td>
                                                                <td> - </td>
                                                                <td> - </td>

                                                                <td id="<?php echo 'total_gom_amount'; ?>"></td>
                                                                <td> - </td>
                                                                <td> - </td>
                                                                <td> - </td>


                                                                <td id="<?php echo 'total_mhada_received_amount'; ?>"></td>
                                                                <td> - </td>
                                                                <td id="<?php echo 'total_mhada_released_amount'; ?>"></td>
                                                                <td> - </td>
                                                                <td> - </td>
                                                                <td> - </td>

                                                                <td> - </td>

                                                                <td><input readonly class="form-control" type="text"
                                                                        name="total_utilization_amount" id="total_utilization_amount"
                                                                        value="0" /></td>
                                                                <td> - </td>
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
                                                            <th scope="col">installment</th>
                                                            <th scope="col" colspan="4" style="text-align: center">GOM</th>
                                                            <th scope="col" colspan="6" style="text-align: center">MHADA</th>
                                                            <th scope="col" colspan="3" style="text-align: center">Agency Utilization</th>
                                                            <th scope="col">Remark</th>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">Category</th>

                                                            <th scope="col">Amount (In Rs.) </th>
                                                            <th scope="col">Order No</th>
                                                            <th scope="col">Order Date</th>
                                                            <th scope="col">Upload Doc</th>

                                                            <th scope="col">Received Amount </th>
                                                            <th scope="col">Received Date</th>
                                                            <th scope="col">Released Amount</th>
                                                            <th scope="col">Released Oder No</th>
                                                            <th scope="col">Released Order Date</th>
                                                            <th scope="col">Upload Doc</th>


                                                            <th scope="col">No Of Transactions</th>
                                                            <th scope="col">Expenditure - GOI</th>
                                                            <th scope="col">Utilization Certificate</th>
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


                                                 <td id="<?php echo $category.'_gom_amount'; ?>"></td>
                                                 <td id="<?php echo $category.'_gom_order_no'; ?>"></td>
                                                 <td id="<?php echo $category.'_gom_order_date'; ?>"></td>
                                                 <td id="<?php echo $category.'_gom_upload_doc'; ?>"></td>

                                                 <td id="<?php echo $category.'_mhada_received_amount'; ?>"></td>
                                                 <td id="<?php echo $category.'_mhada_received_date'; ?>"></td>
                                                 <td id="<?php echo $category.'_mhada_released_amount'; ?>"></td>
                                                 <td id="<?php echo $category.'_mhada_order_no'; ?>"></td>
                                                 <td id="<?php echo $category.'_mhada_order_date'; ?>"></td>
                                                 <td id="<?php echo $category.'_mhada_upload_doc'; ?>"></td>

                                                 <td><input type="text" class="form-control"
                                                            name="gom_financial_details[<?php echo $category; ?>][transactions]"
                                                            id="<?php echo $category.'_transactions'; ?>" /> </td>
                                                 <td><input type="text" class="form-control gom_total_utilization_amount"
                                                            name="gom_financial_details[<?php echo $category; ?>][utilization_amount]"
                                                            id="<?php echo $category.'_utilization_amount'; ?>" value="0" /> </td>
                                                 <td><input type="file" name="<?php echo $category; ?>_utilization_certificate_gom"  class="form-control" /></td>
                                                 <td id="<?php echo $category.'_remark'; ?>"></td>
                                             </tr>



                                                            <?php
                                         }
                                         ?>

                                                            <tr>
                                                                <td>
                                                                    <h5>Total Amount</h5>
                                                                </td>

                                                                <td id="<?php echo 'total_gom_amount'; ?>"></td>
                                                                <td> - </td>
                                                                <td> - </td>
                                                                <td> - </td>


                                                                <td id="<?php echo 'total_mhada_received_amount'; ?>"></td>
                                                                <td> - </td>
                                                                <td id="<?php echo 'total_mhada_released_amount'; ?>"></td>
                                                                <td> - </td>
                                                                <td> - </td>
                                                                <td> - </td>

                                                                <td> - </td>

                                                                <td><input readonly class="form-control" type="text"
                                                                           name="gom_total_utilization_amount" id="gom_total_utilization_amount"
                                                                           value="0" /></td>
                                                                <td> - </td>
                                                                <td> - </td>
                                                            </tr>


                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="m-form__actions">
                                                    <div class="form-group has-danger">

                                                        <div id="save_note" class="form-control-feedback"></div>
                                                    </div>
                                                    <br>
                                                    <button type="submit" id="save_financial_details" name="save_financial_details"
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
                                                            <th scope="col" colspan="4" style="text-align: center">GOI</th>
                                                            <th scope="col" colspan="4" style="text-align: center">GOM</th>
                                                            <th scope="col" colspan="6" style="text-align: center">MHADA</th>
                                                            <th scope="col" colspan="3" style="text-align: center">Agency Utilization</th>
                                                            <th scope="col">Remark</th>


                                                            <th scope="col">2nd installment (40%)</th>
                                                            <th scope="col" colspan="4" style="text-align: center">GOI</th>
                                                            <th scope="col" colspan="4" style="text-align: center">GOM</th>
                                                            <th scope="col" colspan="6" style="text-align: center">MHADA</th>
                                                            <th scope="col" colspan="3" style="text-align: center">Agency Utilization</th>
                                                            <th scope="col">Remark</th>

                                                            <th scope="col">3rd installment (20%)</th>
                                                            <th scope="col" colspan="4" style="text-align: center">GOI</th>
                                                            <th scope="col" colspan="4" style="text-align: center">GOM</th>
                                                            <th scope="col" colspan="6" style="text-align: center">MHADA</th>
                                                            <th scope="col" colspan="3" style="text-align: center">Agency Utilization</th>
                                                            <th scope="col">Remark</th>

                                                        </tr>
                                                        <tr>
                                                            <th scope="col">Category</th>

                                                            <th scope="col">Amount (In Rs.) </th>
                                                            <th scope="col">Order No</th>
                                                            <th scope="col">Order Date</th>
                                                            <th scope="col">Upload Doc</th>


                                                            <th scope="col">Amount (In Rs.) </th>
                                                            <th scope="col">Order No</th>
                                                            <th scope="col">Order Date</th>
                                                            <th scope="col">Upload Doc</th>

                                                            <th scope="col">Received Amount</th>
                                                            <th scope="col">Received Date</th>
                                                            <th scope="col">Released Amount</th>
                                                            <th scope="col">Released Order No</th>
                                                            <th scope="col">Released Order Date</th>
                                                            <th scope="col">Upload Doc</th>

                                                            <th scope="col">No Of Transactions</th>
                                                            <th scope="col">Expenditure</th>
                                                            <th scope="col">Utilization Certificate</th>

                                                            <th scope="col"></th>



                                                            <th scope="col">Category</th>

                                                            <th scope="col">Amount (In Rs.) </th>
                                                            <th scope="col">Order No</th>
                                                            <th scope="col">Order Date</th>
                                                            <th scope="col">Upload Doc</th>


                                                            <th scope="col">Amount (In Rs.) </th>
                                                            <th scope="col">Order No</th>
                                                            <th scope="col">Order Date</th>
                                                            <th scope="col">Upload Doc</th>

                                                            <th scope="col">Received Amount</th>
                                                            <th scope="col">Received Date</th>
                                                            <th scope="col">Released Amount</th>
                                                            <th scope="col">Released Order No</th>
                                                            <th scope="col">Released Order Date</th>
                                                            <th scope="col">Upload Doc</th>

                                                            <th scope="col">No Of Transactions</th>
                                                            <th scope="col">Expenditure</th>
                                                            <th scope="col">Utilization Certificate</th>

                                                            <th scope="col"></th>




                                                            <th scope="col">Category</th>

                                                            <th scope="col">Amount (In Rs.) </th>
                                                            <th scope="col">Order No</th>
                                                            <th scope="col">Order Date</th>
                                                            <th scope="col">Upload Doc</th>


                                                            <th scope="col">Amount (In Rs.) </th>
                                                            <th scope="col">Order No</th>
                                                            <th scope="col">Order Date</th>
                                                            <th scope="col">Upload Doc</th>

                                                            <th scope="col">Received Amount</th>
                                                            <th scope="col">Received Date</th>
                                                            <th scope="col">Released Amount</th>
                                                            <th scope="col">Released Order No</th>
                                                            <th scope="col">Released Order Date</th>
                                                            <th scope="col">Upload Doc</th>

                                                            <th scope="col">No Of Transactions</th>
                                                            <th scope="col">Expenditure</th>
                                                            <th scope="col">Utilization Certificate</th>

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
                                                                <td>  <?php if(isset($goi_details[0][$category.'_goi_upload_doc']))
                                                                    {
                                                                        ?>
                                                                        <a href="<?php echo base_url('public/uploads/'.$goi_details[0][$category.'_goi_upload_doc']); ?>" target="_blank">Download Doc</a>
                                                                    <?php      } else { echo '-'; } ?></td>
                                                                <td>
                                                                    <?php echo isset($goi_details[0][$category.'_gom_amount'])?$goi_details[0][$category.'_gom_amount']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[0][$category.'_gom_order_no'])?$goi_details[0][$category.'_gom_order_no']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[0][$category.'_gom_order_date'])?date('d-m-Y',strtotime($goi_details[0][$category.'_gom_order_date'])):null;   ?>
                                                                </td>
                                                                <td><?php if(isset($goi_details[0][$category.'_gom_upload_doc']))
                                                                    {
                                                                        ?>
                                                                        <a href="<?php echo base_url('public/uploads/'.$goi_details[0][$category.'_gom_upload_doc']); ?>" target="_blank">Download Doc</a>
                                                                    <?php      } else { echo '-'; } ?></td>
                                                                <td>
                                                                    <?php echo isset($goi_details[0][$category.'_mhada_received_amount'])?$goi_details[0][$category.'_mhada_received_amount']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[0][$category.'_mhada_received_date'])?date('d-m-Y',strtotime($goi_details[0][$category.'_mhada_received_date'])):null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[0][$category.'_mhada_released_amount'])?$goi_details[0][$category.'_mhada_released_amount']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[0][$category.'_mhada_order_no'])?$goi_details[0][$category.'_mhada_order_no']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[0][$category.'_mhada_order_date'])?date('d-m-Y',strtotime($goi_details[0][$category.'_mhada_order_date'])):null;   ?>
                                                                </td>
                                                                <td><?php if(isset($goi_details[0][$category.'_mhada_upload_doc']))
                                                                    {
                                                                        ?>
                                                                        <a href="<?php echo base_url('public/uploads/'.$goi_details[0][$category.'_mhada_upload_doc']); ?>" target="_blank">Download Doc</a>
                                                                    <?php      } else { echo '-'; } ?></td>
                                                                <td>
                                                                    <?php echo isset($goi_details[0][$category.'_transactions'])?$goi_details[0][$category.'_transactions']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[0][$category.'_utilization_amount'])?$goi_details[0][$category.'_utilization_amount']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php if(isset($goi_details[0][$category.'_utilization_certificate']))
                                                                    {
                                                                        ?>
                                                                        <a href="<?php echo base_url('agency/download_document/'.base64_encode($this->encryption->encrypt($goi_details[0][$category.'_utilization_certificate']))); ?>" target="_blank">Download Certificate</a>
                                                                    <?php      } else { echo '-'; } ?>
                                                                </td>
                                                                <td> <?php echo isset($goi_details[0][$category.'_remark'])?$goi_details[0][$category.'_remark']:null;   ?>
                                                                </td>

                                                                <td>
                                                                    <h5>
                                                                        <?php echo $category; ?>
                                                                    </h5>
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
                                                                <td>  <?php if(isset($goi_details[1][$category.'_goi_upload_doc']))
                                                                    {
                                                                        ?>
                                                                        <a href="<?php echo base_url('/public/uploads/'.$goi_details[1][$category.'_goi_upload_doc']); ?>" target="_blank" target="_blank">Download Doc</a>
                                                                    <?php      } else { echo '-'; } ?></td>
                                                                <td>
                                                                    <?php echo isset($goi_details[1][$category.'_gom_amount'])?$goi_details[1][$category.'_gom_amount']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[1][$category.'_gom_order_no'])?$goi_details[1][$category.'_gom_order_no']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[1][$category.'_gom_order_date'])?date('d-m-Y',strtotime($goi_details[1][$category.'_gom_order_date'])):null;   ?>
                                                                </td>
                                                                <td><?php if(isset($goi_details[1][$category.'_gom_upload_doc']))
                                                                    {
                                                                        ?>
                                                                        <a href="<?php echo base_url('public/uploads/'.$goi_details[1][$category.'_gom_upload_doc']); ?>" target="_blank" target="_blank">Download Doc</a>
                                                                    <?php      } else { echo '-'; } ?></td>
                                                                <td>
                                                                    <?php echo isset($goi_details[1][$category.'_mhada_received_amount'])?$goi_details[1][$category.'_mhada_received_amount']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[1][$category.'_mhada_received_date'])?date('d-m-Y',strtotime($goi_details[1][$category.'_mhada_received_date'])):null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[1][$category.'_mhada_released_amount'])?$goi_details[1][$category.'_mhada_released_amount']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[1][$category.'_mhada_order_no'])?$goi_details[1][$category.'_mhada_order_no']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[1][$category.'_mhada_order_date'])?date('d-m-Y',strtotime($goi_details[1][$category.'_mhada_order_date'])):null;   ?>
                                                                </td>
                                                                <td><?php if(isset($goi_details[1][$category.'_mhada_upload_doc']))
                                                                    {
                                                                        ?>
                                                                        <a href="<?php echo base_url('public/uploads/'.$goi_details[1][$category.'_mhada_upload_doc']); ?>" target="_blank">Download Doc</a>
                                                                    <?php      } else { echo '-'; } ?></td>
                                                                <td>
                                                                    <?php echo isset($goi_details[1][$category.'_transactions'])?$goi_details[1][$category.'_transactions']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[1][$category.'_utilization_amount'])?$goi_details[1][$category.'_utilization_amount']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php if(isset($goi_details[1][$category.'_utilization_certificate']))
                                                                    {
                                                                        ?>
                                                                        <a href="<?php echo base_url('agency/download_document/'.base64_encode($this->encryption->encrypt($goi_details[1][$category.'_utilization_certificate']))); ?>" target="_blank">Download Certificate</a>
                                                                    <?php      } else { echo '-'; } ?>
                                                                </td>
                                                                <td>  <?php echo isset($goi_details[1][$category.'_remark'])?$goi_details[1][$category.'_remark']:null;   ?>
                                                                </td>


                                                                <td>
                                                                    <h5>
                                                                        <?php echo $category; ?>
                                                                    </h5>
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
                                                                <td>  <?php if(isset($goi_details[2][$category.'_goi_upload_doc']))
                                                                    {
                                                                        ?>
                                                                        <a href="<?php echo base_url('/public/uploads/'.$goi_details[2][$category.'_goi_upload_doc']); ?>" target="_blank" target="_blank">Download Doc</a>
                                                                    <?php      } else { echo '-'; } ?></td>
                                                                <td>
                                                                    <?php echo isset($goi_details[2][$category.'_gom_amount'])?$goi_details[2][$category.'_gom_amount']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[2][$category.'_gom_order_no'])?$goi_details[2][$category.'_gom_order_no']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[2][$category.'_gom_order_date'])?date('d-m-Y',strtotime($goi_details[2][$category.'_gom_order_date'])):null;   ?>
                                                                </td>
                                                                <td><?php if(isset($goi_details[2][$category.'_gom_upload_doc']))
                                                                    {
                                                                        ?>
                                                                        <a href="<?php echo base_url('public/uploads/'.$goi_details[2][$category.'_gom_upload_doc']); ?>" target="_blank" target="_blank">Download Doc</a>
                                                                    <?php      } else { echo '-'; } ?></td>
                                                                <td>
                                                                    <?php echo isset($goi_details[2][$category.'_mhada_received_amount'])?$goi_details[2][$category.'_mhada_received_amount']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[2][$category.'_mhada_received_date'])?date('d-m-Y',strtotime($goi_details[2][$category.'_mhada_received_date'])):null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[2][$category.'_mhada_released_amount'])?$goi_details[2][$category.'_mhada_released_amount']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[2][$category.'_mhada_order_no'])?$goi_details[2][$category.'_mhada_order_no']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[2][$category.'_mhada_order_date'])?date('d-m-Y',strtotime($goi_details[2][$category.'_mhada_order_date'])):null;   ?>
                                                                </td>
                                                                <td><?php if(isset($goi_details[2][$category.'_mhada_upload_doc']))
                                                                    {
                                                                        ?>
                                                                        <a href="<?php echo base_url('public/uploads/'.$goi_details[2][$category.'_mhada_upload_doc']); ?>" target="_blank">Download Doc</a>
                                                                    <?php      } else { echo '-'; } ?></td>
                                                                <td>
                                                                    <?php echo isset($goi_details[2][$category.'_transactions'])?$goi_details[2][$category.'_transactions']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($goi_details[2][$category.'_utilization_amount'])?$goi_details[2][$category.'_utilization_amount']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php if(isset($goi_details[2][$category.'_utilization_certificate']))
                                                                    {
                                                                        ?>
                                                                        <a href="<?php echo base_url('agency/download_document/'.base64_encode($this->encryption->encrypt($goi_details[2][$category.'_utilization_certificate']))); ?>" target="_blank">Download Certificate</a>
                                                                    <?php      } else { echo '-'; } ?>
                                                                </td>
                                                                <td>  <?php echo isset($goi_details[2][$category.'_remark'])?$goi_details[2][$category.'_remark']:null;   ?>
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
                                                            <td>
                                                                <?php echo isset($goi_details[0]['total_gom_amount'])?$goi_details[0]['total_gom_amount']:null;   ?>
                                                            </td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>


                                                            <td>
                                                                <?php echo isset($goi_details[0]['total_mhada_received_amount'])?$goi_details[0]['total_mhada_received_amount']:null;   ?>
                                                            </td>
                                                            <td>-</td>
                                                            <td>
                                                                <?php echo isset($goi_details[0]['total_mhada_released_amount'])?$goi_details[0]['total_mhada_released_amount']:null;   ?>
                                                            </td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>

                                                            <td>
                                                                <?php echo isset($goi_details[0]['total_utilization_amount'])?$goi_details[0]['total_utilization_amount']:null;   ?>
                                                            </td>
                                                            <td>-</td>
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
                                                            <td>
                                                                <?php echo isset($goi_details[1]['total_gom_amount'])?$goi_details[1]['total_gom_amount']:null;   ?>
                                                            </td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>


                                                            <td>
                                                                <?php echo isset($goi_details[1]['total_mhada_received_amount'])?$goi_details[1]['total_mhada_received_amount']:null;   ?>
                                                            </td>
                                                            <td>-</td>
                                                            <td>
                                                                <?php echo isset($goi_details[1]['total_mhada_released_amount'])?$goi_details[1]['total_mhada_released_amount']:null;   ?>
                                                            </td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>

                                                            <td>
                                                                <?php echo isset($goi_details[1]['total_utilization_amount'])?$goi_details[1]['total_utilization_amount']:null;   ?>
                                                            </td>
                                                            <td>-</td>
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
                                                            <td>
                                                                <?php echo isset($goi_details[2]['total_gom_amount'])?$goi_details[2]['total_gom_amount']:null;   ?>
                                                            </td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>


                                                            <td>
                                                                <?php echo isset($goi_details[2]['total_mhada_received_amount'])?$goi_details[2]['total_mhada_received_amount']:null;   ?>
                                                            </td>
                                                            <td>-</td>
                                                            <td>
                                                                <?php echo isset($goi_details[2]['total_mhada_released_amount'])?$goi_details[2]['total_mhada_released_amount']:null;   ?>
                                                            </td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>

                                                            <td>
                                                                <?php echo isset($goi_details[2]['total_utilization_amount'])?$goi_details[2]['total_utilization_amount']:null;   ?>
                                                            </td>
                                                            <td>-</td>
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
                                                            <th scope="col" colspan="4" style="text-align: center">GOM</th>
                                                            <th scope="col" colspan="6" style="text-align: center">MHADA</th>
                                                            <th scope="col" colspan="3" style="text-align: center">Agency Utilization</th>
                                                            <th scope="col">Remark</th>


                                                            <th scope="col">2nd installment (40%)</th>
                                                            <th scope="col" colspan="4" style="text-align: center">GOM</th>
                                                            <th scope="col" colspan="6" style="text-align: center">MHADA</th>
                                                            <th scope="col" colspan="3" style="text-align: center">Agency Utilization</th>
                                                            <th scope="col">Remark</th>

                                                            <th scope="col">3rd installment (20%)</th>
                                                            <th scope="col" colspan="4" style="text-align: center">GOM</th>
                                                            <th scope="col" colspan="6" style="text-align: center">MHADA</th>
                                                            <th scope="col" colspan="3" style="text-align: center">Agency Utilization</th>
                                                            <th scope="col">Remark</th>

                                                        </tr>
                                                        <tr>
                                                            <th scope="col">Category</th>



                                                            <th scope="col">Amount (In Rs.) </th>
                                                            <th scope="col">Order No</th>
                                                            <th scope="col">Order Date</th>
                                                            <th scope="col">Upload Doc</th>

                                                            <th scope="col">Received Amount</th>
                                                            <th scope="col">Received Date</th>
                                                            <th scope="col">Released Amount</th>
                                                            <th scope="col">Released Order No</th>
                                                            <th scope="col">Released Order Date</th>
                                                            <th scope="col">Upload Doc</th>

                                                            <th scope="col">No Of Transactions</th>
                                                            <th scope="col">Expenditure</th>
                                                            <th scope="col">Utilization Certificate</th>

                                                            <th scope="col"></th>



                                                            <th scope="col">Category</th>



                                                            <th scope="col">Amount (In Rs.) </th>
                                                            <th scope="col">Order No</th>
                                                            <th scope="col">Order Date</th>
                                                            <th scope="col">Upload Doc</th>

                                                            <th scope="col">Received Amount</th>
                                                            <th scope="col">Received Date</th>
                                                            <th scope="col">Released Amount</th>
                                                            <th scope="col">Released Order No</th>
                                                            <th scope="col">Released Order Date</th>
                                                            <th scope="col">Upload Doc</th>

                                                            <th scope="col">No Of Transactions</th>
                                                            <th scope="col">Expenditure</th>
                                                            <th scope="col">Utilization Certificate</th>

                                                            <th scope="col"></th>




                                                            <th scope="col">Category</th>



                                                            <th scope="col">Amount (In Rs.) </th>
                                                            <th scope="col">Order No</th>
                                                            <th scope="col">Order Date</th>
                                                            <th scope="col">Upload Doc</th>

                                                            <th scope="col">Received Amount</th>
                                                            <th scope="col">Received Date</th>
                                                            <th scope="col">Released Amount</th>
                                                            <th scope="col">Released Order No</th>
                                                            <th scope="col">Released Order Date</th>
                                                            <th scope="col">Upload Doc</th>

                                                            <th scope="col">No Of Transactions</th>
                                                            <th scope="col">Expenditure</th>
                                                            <th scope="col">Utilization Certificate</th>

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
                                                                    <?php echo isset($gom_details[0][$category.'_gom_amount'])?$gom_details[0][$category.'_gom_amount']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[0][$category.'_gom_order_no'])?$gom_details[0][$category.'_gom_order_no']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[0][$category.'_gom_order_date'])?date('d-m-Y',strtotime($gom_details[0][$category.'_gom_order_date'])):null;   ?>
                                                                </td>
                                                                <td><?php if(isset($gom_details[0][$category.'_gom_upload_doc']))
                                                                    {
                                                                        ?>
                                                                        <a href="<?php echo base_url('public/uploads/'.$gom_details[0][$category.'_gom_upload_doc']); ?>" target="_blank">Download Doc</a>
                                                                    <?php      } else { echo '-'; } ?></td>
                                                                <td>
                                                                    <?php echo isset($gom_details[0][$category.'_mhada_received_amount'])?$gom_details[0][$category.'_mhada_received_amount']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[0][$category.'_mhada_received_date'])?date('d-m-Y',strtotime($gom_details[0][$category.'_mhada_received_date'])):null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[0][$category.'_mhada_released_amount'])?$gom_details[0][$category.'_mhada_released_amount']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[0][$category.'_mhada_order_no'])?$gom_details[0][$category.'_mhada_order_no']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[0][$category.'_mhada_order_date'])?date('d-m-Y',strtotime($gom_details[0][$category.'_mhada_order_date'])):null;   ?>
                                                                </td>
                                                                <td><?php if(isset($gom_details[0][$category.'_mhada_upload_doc']))
                                                                    {
                                                                        ?>
                                                                        <a href="<?php echo base_url('public/uploads/'.$gom_details[0][$category.'_mhada_upload_doc']); ?>" target="_blank">Download Doc</a>
                                                                    <?php      } else { echo '-'; } ?></td>
                                                                <td>
                                                                    <?php echo isset($gom_details[0][$category.'_transactions'])?$gom_details[0][$category.'_transactions']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[0][$category.'_utilization_amount'])?$gom_details[0][$category.'_utilization_amount']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php if(isset($gom_details[0][$category.'_utilization_certificate']))
                                                                    {
                                                                        ?>
                                                                        <a href="<?php echo base_url('agency/download_document/'.base64_encode($this->encryption->encrypt($gom_details[0][$category.'_utilization_certificate']))); ?>" target="_blank">Download Certificate</a>
                                                                    <?php      } else { echo '-'; } ?>
                                                                </td>
                                                                <td> <?php echo isset($gom_details[0][$category.'_remark'])?$gom_details[0][$category.'_remark']:null;   ?>
                                                                </td>

                                                                <td>
                                                                    <h5>
                                                                        <?php echo $category; ?>
                                                                    </h5>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[1][$category.'_gom_amount'])?$gom_details[1][$category.'_gom_amount']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[1][$category.'_gom_order_no'])?$gom_details[1][$category.'_gom_order_no']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[1][$category.'_gom_order_date'])?date('d-m-Y',strtotime($gom_details[1][$category.'_gom_order_date'])):null;   ?>
                                                                </td>
                                                                <td><?php if(isset($gom_details[1][$category.'_gom_upload_doc']))
                                                                    {
                                                                        ?>
                                                                        <a href="<?php echo base_url('public/uploads/'.$gom_details[1][$category.'_gom_upload_doc']); ?>" target="_blank" target="_blank">Download Doc</a>
                                                                    <?php      } else { echo '-'; } ?></td>
                                                                <td>
                                                                    <?php echo isset($gom_details[1][$category.'_mhada_received_amount'])?$gom_details[1][$category.'_mhada_received_amount']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[1][$category.'_mhada_received_date'])?date('d-m-Y',strtotime($gom_details[1][$category.'_mhada_received_date'])):null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[1][$category.'_mhada_released_amount'])?$gom_details[1][$category.'_mhada_released_amount']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[1][$category.'_mhada_order_no'])?$gom_details[1][$category.'_mhada_order_no']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[1][$category.'_mhada_order_date'])?date('d-m-Y',strtotime($gom_details[1][$category.'_mhada_order_date'])):null;   ?>
                                                                </td>
                                                                <td><?php if(isset($gom_details[1][$category.'_mhada_upload_doc']))
                                                                    {
                                                                        ?>
                                                                        <a href="<?php echo base_url('public/uploads/'.$gom_details[1][$category.'_mhada_upload_doc']); ?>" target="_blank">Download Doc</a>
                                                                    <?php      } else { echo '-'; } ?></td>
                                                                <td>
                                                                    <?php echo isset($gom_details[1][$category.'_transactions'])?$gom_details[1][$category.'_transactions']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[1][$category.'_utilization_amount'])?$gom_details[1][$category.'_utilization_amount']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php if(isset($gom_details[1][$category.'_utilization_certificate']))
                                                                    {
                                                                        ?>
                                                                        <a href="<?php echo base_url('agency/download_document/'.base64_encode($this->encryption->encrypt($gom_details[1][$category.'_utilization_certificate']))); ?>" target="_blank">Download Certificate</a>
                                                                    <?php      } else { echo '-'; } ?>
                                                                </td>
                                                                <td>  <?php echo isset($gom_details[1][$category.'_remark'])?$gom_details[1][$category.'_remark']:null;   ?>
                                                                </td>


                                                                <td>
                                                                    <h5>
                                                                        <?php echo $category; ?>
                                                                    </h5>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[2][$category.'_gom_amount'])?$gom_details[2][$category.'_gom_amount']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[2][$category.'_gom_order_no'])?$gom_details[2][$category.'_gom_order_no']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[2][$category.'_gom_order_date'])?date('d-m-Y',strtotime($gom_details[2][$category.'_gom_order_date'])):null;   ?>
                                                                </td>
                                                                <td><?php if(isset($gom_details[2][$category.'_gom_upload_doc']))
                                                                    {
                                                                        ?>
                                                                        <a href="<?php echo base_url('public/uploads/'.$gom_details[2][$category.'_gom_upload_doc']); ?>" target="_blank" target="_blank">Download Doc</a>
                                                                    <?php      } else { echo '-'; } ?></td>
                                                                <td>
                                                                    <?php echo isset($gom_details[2][$category.'_mhada_received_amount'])?$gom_details[2][$category.'_mhada_received_amount']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[2][$category.'_mhada_received_date'])?date('d-m-Y',strtotime($gom_details[2][$category.'_mhada_received_date'])):null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[2][$category.'_mhada_released_amount'])?$gom_details[2][$category.'_mhada_released_amount']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[2][$category.'_mhada_order_no'])?$gom_details[2][$category.'_mhada_order_no']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[2][$category.'_mhada_order_date'])?date('d-m-Y',strtotime($gom_details[2][$category.'_mhada_order_date'])):null;   ?>
                                                                </td>
                                                                <td><?php if(isset($gom_details[2][$category.'_mhada_upload_doc']))
                                                                    {
                                                                        ?>
                                                                        <a href="<?php echo base_url('public/uploads/'.$gom_details[2][$category.'_mhada_upload_doc']); ?>" target="_blank">Download Doc</a>
                                                                    <?php      } else { echo '-'; } ?></td>
                                                                <td>
                                                                    <?php echo isset($gom_details[2][$category.'_transactions'])?$gom_details[2][$category.'_transactions']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo isset($gom_details[2][$category.'_utilization_amount'])?$gom_details[2][$category.'_utilization_amount']:null;   ?>
                                                                </td>
                                                                <td>
                                                                    <?php if(isset($gom_details[2][$category.'_utilization_certificate']))
                                                                    {
                                                                        ?>
                                                                        <a href="<?php echo base_url('agency/download_document/'.base64_encode($this->encryption->encrypt($gom_details[2][$category.'_utilization_certificate']))); ?>" target="_blank">Download Certificate</a>
                                                                    <?php      } else { echo '-'; } ?>
                                                                </td>
                                                                <td>  <?php echo isset($gom_details[2][$category.'_remark'])?$gom_details[2][$category.'_remark']:null;   ?>
                                                                </td>

                                                            </tr>

                                                        <?php } ?>
                                                        <tr>
                                                            <td>
                                                                <h5>Total Amount</h5>
                                                            </td>
                                                            <td>
                                                                <?php echo isset($gom_details[0]['total_gom_amount'])?$gom_details[0]['total_gom_amount']:null;   ?>
                                                            </td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>


                                                            <td>
                                                                <?php echo isset($gom_details[0]['total_mhada_received_amount'])?$gom_details[0]['total_mhada_received_amount']:null;   ?>
                                                            </td>
                                                            <td>-</td>
                                                            <td>
                                                                <?php echo isset($gom_details[0]['total_mhada_released_amount'])?$gom_details[0]['total_mhada_released_amount']:null;   ?>
                                                            </td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>

                                                            <td>
                                                                <?php echo isset($gom_details[0]['total_utilization_amount'])?$gom_details[0]['total_utilization_amount']:null;   ?>
                                                            </td>
                                                            <td>-</td>
                                                            <td>-</td>

                                                            <td>
                                                                <h5>Total Amount</h5>
                                                            </td>
                                                            <td>
                                                                <?php echo isset($gom_details[1]['total_gom_amount'])?$gom_details[1]['total_gom_amount']:null;   ?>
                                                            </td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>


                                                            <td>
                                                                <?php echo isset($gom_details[1]['total_mhada_received_amount'])?$gom_details[1]['total_mhada_received_amount']:null;   ?>
                                                            </td>
                                                            <td>-</td>
                                                            <td>
                                                                <?php echo isset($gom_details[1]['total_mhada_released_amount'])?$gom_details[1]['total_mhada_released_amount']:null;   ?>
                                                            </td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>

                                                            <td>
                                                                <?php echo isset($gom_details[1]['total_utilization_amount'])?$gom_details[1]['total_utilization_amount']:null;   ?>
                                                            </td>
                                                            <td>-</td>
                                                            <td>-</td>



                                                            <td>
                                                                <h5>Total Amount</h5>
                                                            </td>
                                                            <td>
                                                                <?php echo isset($gom_details[2]['total_gom_amount'])?$gom_details[2]['total_gom_amount']:null;   ?>
                                                            </td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>


                                                            <td>
                                                                <?php echo isset($gom_details[2]['total_mhada_received_amount'])?$gom_details[2]['total_mhada_received_amount']:null;   ?>
                                                            </td>
                                                            <td>-</td>
                                                            <td>
                                                                <?php echo isset($gom_details[2]['total_mhada_released_amount'])?$gom_details[2]['total_mhada_released_amount']:null;   ?>
                                                            </td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>

                                                            <td>
                                                                <?php echo isset($gom_details[2]['total_utilization_amount'])?$gom_details[2]['total_utilization_amount']:null;   ?>
                                                            </td>
                                                            <td>-</td>
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
            var installment = $('#installment').val();


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

            if(nodel_agency!='' && installment!='')
            {
                $.ajax({
                    type: "POST",
                    url: "agency/get_financial_details_data",
                    data: {'nodel_agency': nodel_agency, 'installment': installment , 'project_id': $('#project_id').val() },
                    dataType: "html",
                    success: function(data){
                        console.log(data);

                        var data = JSON.parse(data);

                        if ($.trim(data)) {
                            if (data[0].nodel_agency == 1) {

                                $('#update_form_of_goi_fund #sc_amount').html(data[0].sc_amount);
                                $('#update_form_of_goi_fund #st_amount').html(data[0].st_amount);
                                $('#update_form_of_goi_fund #obc_amount').html(data[0].obc_amount);
                                $('#update_form_of_goi_fund #other_amount').html(data[0].other_amount);

                                $('#update_form_of_goi_fund #sc_goi_order_no').html(data[0].sc_goi_order_no);
                                $('#update_form_of_goi_fund #sc_goi_order_date').html(data[0].sc_goi_order_date);
                                $('#update_form_of_goi_fund #st_goi_order_no').html(data[0].st_goi_order_no);
                                $('#update_form_of_goi_fund #st_goi_order_date').html(data[0].st_goi_order_date);
                                $('#update_form_of_goi_fund #obc_goi_order_no').html(data[0].obc_goi_order_no);
                                $('#update_form_of_goi_fund #obc_goi_order_date').html(data[0].obc_goi_order_date);
                                $('#update_form_of_goi_fund #other_goi_order_no').html(data[0].other_goi_order_no);
                                $('#update_form_of_goi_fund #other_goi_order_date').html(data[0].other_goi_order_date);

                                if(data[0].sc_goi_upload_doc!=''){ $('#update_form_of_goi_fund #sc_goi_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].sc_goi_upload_doc+'" target="_blank">Download Doc</a>'); }
                                if(data[0].st_goi_upload_doc!=''){ $('#update_form_of_goi_fund #st_goi_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].st_goi_upload_doc+'" target="_blank">Download Doc</a>'); }
                                if(data[0].obc_goi_upload_doc!=''){ $('#update_form_of_goi_fund #obc_goi_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].obc_goi_upload_doc+'" target="_blank">Download Doc</a>'); }
                                if(data[0].other_goi_upload_doc!=''){ $('#update_form_of_goi_fund #other_goi_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].other_goi_upload_doc+'" target="_blank">Download Doc</a>'); }

                                $('#update_form_of_goi_fund #sc_gom_amount').html(data[0].sc_gom_amount);
                                $('#update_form_of_goi_fund #st_gom_amount').html(data[0].st_gom_amount);
                                $('#update_form_of_goi_fund #obc_gom_amount').html(data[0].obc_gom_amount);
                                $('#update_form_of_goi_fund #other_gom_amount').html(data[0].other_gom_amount);


                                $('#update_form_of_goi_fund #sc_gom_order_no').html(data[0].sc_gom_order_no);
                                $('#update_form_of_goi_fund #sc_gom_order_date').html(data[0].sc_gom_order_date);
                                $('#update_form_of_goi_fund #st_gom_order_no').html(data[0].st_gom_order_no);
                                $('#update_form_of_goi_fund #st_gom_order_date').html(data[0].st_gom_order_date);
                                $('#update_form_of_goi_fund #obc_gom_order_no').html(data[0].obc_gom_order_no);
                                $('#update_form_of_goi_fund #obc_gom_order_date').html(data[0].obc_gom_order_date);
                                $('#update_form_of_goi_fund #other_gom_order_no').html(data[0].other_gom_order_no);
                                $('#update_form_of_goi_fund #other_gom_order_date').html(data[0].other_gom_order_date);

                                if(data[0].sc_gom_upload_doc!=''){ $('#update_form_of_goi_fund #sc_gom_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].sc_gom_upload_doc+'" target="_blank">Download Doc</a>'); }
                                if(data[0].st_gom_upload_doc!=''){ $('#update_form_of_goi_fund #st_gom_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].st_gom_upload_doc+'" target="_blank">Download Doc</a>'); }
                                if(data[0].obc_gom_upload_doc!=''){ $('#update_form_of_goi_fund #obc_gom_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].obc_gom_upload_doc+'" target="_blank">Download Doc</a>'); }
                                if(data[0].other_gom_upload_doc!=''){ $('#update_form_of_goi_fund #other_gom_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].other_gom_upload_doc+'" target="_blank">Download Doc</a>'); }

                                $('#update_form_of_goi_fund #sc_mhada_received_amount').html(data[0].sc_mhada_received_amount);
                                $('#update_form_of_goi_fund #sc_mhada_received_date').html(data[0].sc_mhada_received_date);
                                $('#update_form_of_goi_fund #sc_mhada_released_amount').html(data[0].sc_mhada_released_amount);
                                $('#update_form_of_goi_fund #sc_mhada_order_no').html(data[0].sc_mhada_order_no);
                                $('#update_form_of_goi_fund #sc_mhada_order_date').html(data[0].sc_mhada_order_date);

                                $('#update_form_of_goi_fund #st_mhada_received_amount').html(data[0].st_mhada_received_amount);
                                $('#update_form_of_goi_fund #st_mhada_received_date').html(data[0].st_mhada_received_date);
                                $('#update_form_of_goi_fund #st_mhada_released_amount').html(data[0].st_mhada_released_amount);
                                $('#update_form_of_goi_fund #st_mhada_order_no').html(data[0].st_mhada_order_no);
                                $('#update_form_of_goi_fund #st_mhada_order_date').html(data[0].st_mhada_order_date);

                                $('#update_form_of_goi_fund #obc_mhada_received_amount').html(data[0].obc_mhada_received_amount);
                                $('#update_form_of_goi_fund #obc_mhada_received_date').html(data[0].obc_mhada_received_date);
                                $('#update_form_of_goi_fund #obc_mhada_released_amount').html(data[0].obc_mhada_released_amount);
                                $('#update_form_of_goi_fund #obc_mhada_order_no').html(data[0].obc_mhada_order_no);
                                $('#update_form_of_goi_fund #obc_mhada_order_date').html(data[0].obc_mhada_order_date);

                                $('#update_form_of_goi_fund #other_mhada_received_amount').html(data[0].other_mhada_received_amount);
                                $('#update_form_of_goi_fund #other_mhada_received_date').html(data[0].other_mhada_received_date);
                                $('#update_form_of_goi_fund #other_mhada_released_amount').html(data[0].other_mhada_released_amount);
                                $('#update_form_of_goi_fund #other_mhada_order_no').html(data[0].other_mhada_order_no);
                                $('#update_form_of_goi_fund #other_mhada_order_date').html(data[0].other_mhada_order_date);

                                if(data[0].sc_mhada_upload_doc!=''){ $('#update_form_of_goi_fund #sc_mhada_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].sc_mhada_upload_doc+'" target="_blank">Download Doc</a>'); }
                                if(data[0].st_mhada_upload_doc!=''){ $('#update_form_of_goi_fund #st_mhada_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].st_mhada_upload_doc+'" target="_blank">Download Doc</a>'); }
                                if(data[0].obc_mhada_upload_doc!=''){ $('#update_form_of_goi_fund #obc_mhada_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].obc_mhada_upload_doc+'" target="_blank">Download Doc</a>'); }
                                if(data[0].other_mhada_upload_doc!=''){ $('#update_form_of_goi_fund #other_mhada_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].other_mhada_upload_doc+'" target="_blank">Download Doc</a>'); }

                                $('#update_form_of_goi_fund #sc_remark').html(data[0].sc_remark);
                                $('#update_form_of_goi_fund #st_remark').html(data[0].st_remark);
                                $('#update_form_of_goi_fund #obc_remark').html(data[0].obc_remark);
                                $('#update_form_of_goi_fund #other_remark').html(data[0].other_remark);


                                $('#update_form_of_goi_fund #sc_transactions').attr('value', data[0].sc_transactions);
                                $('#update_form_of_goi_fund #st_transactions').attr('value', data[0].st_transactions);
                                $('#update_form_of_goi_fund #obc_transactions').attr('value', data[0].obc_transactions);
                                $('#update_form_of_goi_fund #other_transactions').attr('value', data[0].other_transactions);

                                $('#update_form_of_goi_fund #sc_utilization_amount').attr('value', data[0].sc_utilization_amount);
                                $('#update_form_of_goi_fund #st_utilization_amount').attr('value', data[0].st_utilization_amount);
                                $('#update_form_of_goi_fund #obc_utilization_amount').attr('value', data[0].obc_utilization_amount);
                                $('#update_form_of_goi_fund #other_utilization_amount').attr('value', data[0].other_utilization_amount);



                                $('#update_form_of_goi_fund #total_amount').html(data[0].total_amount);
                                $('#update_form_of_goi_fund #total_gom_amount').html(data[0].total_gom_amount);
                                $('#update_form_of_goi_fund #total_mhada_received_amount').html(data[0].total_mhada_received_amount);
                                $('#update_form_of_goi_fund #total_mhada_released_amount').html(data[0].total_mhada_released_amount);
                                $('#update_form_of_goi_fund #total_utilization_amount').attr('value', data[0].total_utilization_amount);


                                if(data[0].sc_amount=='' || data[0].sc_amount==0)
                                {
                                    $('#update_form_of_goi_fund #sc_utilization_amount').attr('readonly', true);

                                }

                                if(data[0].st_amount=='' || data[0].st_amount==0)
                                {
                                    $('#update_form_of_goi_fund #st_utilization_amount').attr('readonly', true);

                                }
                                if(data[0].obc_amount=='' || data[0].obc_amount==0)
                                {
                                    $('#update_form_of_goi_fund #obc_utilization_amount').attr('readonly', true);

                                }

                                if(data[0].other_amount=='' || data[0].other_amount==0)
                                {
                                    $('#update_form_of_goi_fund #other_utilization_amount').attr('readonly', true);

                                }
                            }
                            else if (data[0].nodel_agency == 2) {

                                $('#update_form_of_gom_fund #sc_gom_amount').html(data[0].sc_gom_amount);
                                $('#update_form_of_gom_fund #st_gom_amount').html(data[0].st_gom_amount);
                                $('#update_form_of_gom_fund #obc_gom_amount').html(data[0].obc_gom_amount);
                                $('#update_form_of_gom_fund #other_gom_amount').html(data[0].other_gom_amount);


                                $('#update_form_of_gom_fund #sc_gom_order_no').html(data[0].sc_gom_order_no);
                                $('#update_form_of_gom_fund #sc_gom_order_date').html(data[0].sc_gom_order_date);
                                $('#update_form_of_gom_fund #st_gom_order_no').html(data[0].st_gom_order_no);
                                $('#update_form_of_gom_fund #st_gom_order_date').html(data[0].st_gom_order_date);
                                $('#update_form_of_gom_fund #obc_gom_order_no').html(data[0].obc_gom_order_no);
                                $('#update_form_of_gom_fund #obc_gom_order_date').html(data[0].obc_gom_order_date);
                                $('#update_form_of_gom_fund #other_gom_order_no').html(data[0].other_gom_order_no);
                                $('#update_form_of_gom_fund #other_gom_order_date').html(data[0].other_gom_order_date);

                                if(data[0].sc_gom_upload_doc!=''){ $('#update_form_of_gom_fund #sc_gom_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].sc_gom_upload_doc+'" target="_blank">Download Doc</a>'); }
                                if(data[0].st_gom_upload_doc!=''){ $('#update_form_of_gom_fund #st_gom_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].st_gom_upload_doc+'" target="_blank">Download Doc</a>'); }
                                if(data[0].obc_gom_upload_doc!=''){ $('#update_form_of_gom_fund #obc_gom_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].obc_gom_upload_doc+'" target="_blank">Download Doc</a>'); }
                                if(data[0].other_gom_upload_doc!=''){ $('#update_form_of_gom_fund #other_gom_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].other_gom_upload_doc+'" target="_blank">Download Doc</a>'); }

                                $('#update_form_of_gom_fund #sc_mhada_received_amount').html(data[0].sc_mhada_received_amount);
                                $('#update_form_of_gom_fund #sc_mhada_received_date').html(data[0].sc_mhada_received_date);
                                $('#update_form_of_gom_fund #sc_mhada_released_amount').html(data[0].sc_mhada_released_amount);
                                $('#update_form_of_gom_fund #sc_mhada_order_no').html(data[0].sc_mhada_order_no);
                                $('#update_form_of_gom_fund #sc_mhada_order_date').html(data[0].sc_mhada_order_date);

                                $('#update_form_of_gom_fund #st_mhada_received_amount').html(data[0].st_mhada_received_amount);
                                $('#update_form_of_gom_fund #st_mhada_received_date').html(data[0].st_mhada_received_date);
                                $('#update_form_of_gom_fund #st_mhada_released_amount').html(data[0].st_mhada_released_amount);
                                $('#update_form_of_gom_fund #st_mhada_order_no').html(data[0].st_mhada_order_no);
                                $('#update_form_of_gom_fund #st_mhada_order_date').html(data[0].st_mhada_order_date);

                                $('#update_form_of_gom_fund #obc_mhada_received_amount').html(data[0].obc_mhada_received_amount);
                                $('#update_form_of_gom_fund #obc_mhada_received_date').html(data[0].obc_mhada_received_date);
                                $('#update_form_of_gom_fund #obc_mhada_released_amount').html(data[0].obc_mhada_released_amount);
                                $('#update_form_of_gom_fund #obc_mhada_order_no').html(data[0].obc_mhada_order_no);
                                $('#update_form_of_gom_fund #obc_mhada_order_date').html(data[0].obc_mhada_order_date);

                                $('#update_form_of_gom_fund #other_mhada_received_amount').html(data[0].other_mhada_received_amount);
                                $('#update_form_of_gom_fund #other_mhada_received_date').html(data[0].other_mhada_received_date);
                                $('#update_form_of_gom_fund #other_mhada_released_amount').html(data[0].other_mhada_released_amount);
                                $('#update_form_of_gom_fund #other_mhada_order_no').html(data[0].other_mhada_order_no);
                                $('#update_form_of_gom_fund #other_mhada_order_date').html(data[0].other_mhada_order_date);

                                if(data[0].sc_mhada_upload_doc!=''){ $('#update_form_of_gom_fund #sc_mhada_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].sc_mhada_upload_doc+'" target="_blank">Download Doc</a>'); }
                                if(data[0].st_mhada_upload_doc!=''){ $('#update_form_of_gom_fund #st_mhada_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].st_mhada_upload_doc+'" target="_blank">Download Doc</a>'); }
                                if(data[0].obc_mhada_upload_doc!=''){ $('#update_form_of_gom_fund #obc_mhada_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].obc_mhada_upload_doc+'" target="_blank">Download Doc</a>'); }
                                if(data[0].other_mhada_upload_doc!=''){ $('#update_form_of_gom_fund #other_mhada_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].other_mhada_upload_doc+'" target="_blank">Download Doc</a>'); }

                                $('#update_form_of_gom_fund #sc_remark').html(data[0].sc_remark);
                                $('#update_form_of_gom_fund #st_remark').html(data[0].st_remark);
                                $('#update_form_of_gom_fund #obc_remark').html(data[0].obc_remark);
                                $('#update_form_of_gom_fund #other_remark').html(data[0].other_remark);


                                $('#update_form_of_gom_fund #sc_transactions').attr('value', data[0].sc_transactions);
                                $('#update_form_of_gom_fund #st_transactions').attr('value', data[0].st_transactions);
                                $('#update_form_of_gom_fund #obc_transactions').attr('value', data[0].obc_transactions);
                                $('#update_form_of_gom_fund #other_transactions').attr('value', data[0].other_transactions);

                                $('#update_form_of_gom_fund #sc_utilization_amount').attr('value', data[0].sc_utilization_amount);
                                $('#update_form_of_gom_fund #st_utilization_amount').attr('value', data[0].st_utilization_amount);
                                $('#update_form_of_gom_fund #obc_utilization_amount').attr('value', data[0].obc_utilization_amount);
                                $('#update_form_of_gom_fund #other_utilization_amount').attr('value', data[0].other_utilization_amount);



                                $('#update_form_of_gom_fund #total_amount').html(data[0].total_amount);
                                $('#update_form_of_gom_fund #total_gom_amount').html(data[0].total_gom_amount);
                                $('#update_form_of_gom_fund #total_mhada_received_amount').html(data[0].total_mhada_received_amount);
                                $('#update_form_of_gom_fund #total_mhada_released_amount').html(data[0].total_mhada_released_amount);

                                $('#update_form_of_gom_fund #gom_total_utilization_amount').attr('value', data[0].total_utilization_amount);

                            }

                            if(data[0].sc_gom_amount=='' || data[0].sc_gom_amount==0)
                            {
                                $('#update_form_of_gom_fund #sc_utilization_amount').attr('readonly', true);

                            }

                            if(data[0].st_gom_amount=='' || data[0].st_gom_amount==0)
                            {
                                $('#update_form_of_gom_fund #st_utilization_amount').attr('readonly', true);

                            }

                            if(data[0].obc_gom_amount=='' || data[0].obc_gom_amount==0)
                            {
                                $('#update_form_of_gom_fund #obc_utilization_amount').attr('readonly', true);

                            }

                            if(data[0].other_gom_amount=='' || data[0].other_gom_amount==0)
                            {
                                $('#update_form_of_gom_fund #other_utilization_amount').attr('readonly', true);

                            }

                            $('#save_note').html('');

                        }
                        else
                        {
                            if (nodel_agency == 1) {


                                $('#update_form_of_goi_fund #sc_amount').html('');
                                $('#update_form_of_goi_fund #st_amount').html('');
                                $('#update_form_of_goi_fund #obc_amount').html('');
                                $('#update_form_of_goi_fund #other_amount').html('');

                                $('#update_form_of_goi_fund #sc_goi_order_no').html('');
                                $('#update_form_of_goi_fund #sc_goi_order_date').html('');
                                $('#update_form_of_goi_fund #st_goi_order_no').html('');
                                $('#update_form_of_goi_fund #st_goi_order_date').html('');
                                $('#update_form_of_goi_fund #obc_goi_order_no').html('');
                                $('#update_form_of_goi_fund #obc_goi_order_date').html('');
                                $('#update_form_of_goi_fund #other_goi_order_no').html('');
                                $('#update_form_of_goi_fund #other_goi_order_date').html('');

                                $('#update_form_of_goi_fund #sc_goi_upload_doc').html('');
                                 $('#update_form_of_goi_fund #st_goi_upload_doc').html('');
                                 $('#update_form_of_goi_fund #obc_goi_upload_doc').html('');
                                 $('#update_form_of_goi_fund #other_goi_upload_doc').html('');

                                $('#update_form_of_goi_fund #sc_gom_amount').html('');
                                $('#update_form_of_goi_fund #st_gom_amount').html('');
                                $('#update_form_of_goi_fund #obc_gom_amount').html('');
                                $('#update_form_of_goi_fund #other_gom_amount').html('');


                                $('#update_form_of_goi_fund #sc_gom_order_no').html('');
                                $('#update_form_of_goi_fund #sc_gom_order_date').html('');
                                $('#update_form_of_goi_fund #st_gom_order_no').html('');
                                $('#update_form_of_goi_fund #st_gom_order_date').html('');
                                $('#update_form_of_goi_fund #obc_gom_order_no').html('');
                                $('#update_form_of_goi_fund #obc_gom_order_date').html('');
                                $('#update_form_of_goi_fund #other_gom_order_no').html('');
                                $('#update_form_of_goi_fund #other_gom_order_date').html('');

                                $('#update_form_of_goi_fund #sc_gom_upload_doc').html('');
                                 $('#update_form_of_goi_fund #st_gom_upload_doc').html('');
                                 $('#update_form_of_goi_fund #obc_gom_upload_doc').html('');
                                $('#update_form_of_goi_fund #other_gom_upload_doc').html('');

                                $('#update_form_of_goi_fund #sc_mhada_received_amount').html('');
                                $('#update_form_of_goi_fund #sc_mhada_received_date').html('');
                                $('#update_form_of_goi_fund #sc_mhada_released_amount').html('');
                                $('#update_form_of_goi_fund #sc_mhada_order_no').html('');
                                $('#update_form_of_goi_fund #sc_mhada_order_date').html('');

                                $('#update_form_of_goi_fund #st_mhada_received_amount').html('');
                                $('#update_form_of_goi_fund #st_mhada_received_date').html('');
                                $('#update_form_of_goi_fund #st_mhada_released_amount').html('');
                                $('#update_form_of_goi_fund #st_mhada_order_no').html('');
                                $('#update_form_of_goi_fund #st_mhada_order_date').html('');

                                $('#update_form_of_goi_fund #obc_mhada_received_amount').html('');
                                $('#update_form_of_goi_fund #obc_mhada_received_date').html('');
                                $('#update_form_of_goi_fund #obc_mhada_released_amount').html('');
                                $('#update_form_of_goi_fund #obc_mhada_order_no').html('');
                                $('#update_form_of_goi_fund #obc_mhada_order_date').html('');

                                $('#update_form_of_goi_fund #other_mhada_received_amount').html('');
                                $('#update_form_of_goi_fund #other_mhada_received_date').html('');
                                $('#update_form_of_goi_fund #other_mhada_released_amount').html('');
                                $('#update_form_of_goi_fund #other_mhada_order_no').html('');
                                $('#update_form_of_goi_fund #other_mhada_order_date').html('');

                                $('#update_form_of_goi_fund #sc_mhada_upload_doc').html('');
                                 $('#update_form_of_goi_fund #st_mhada_upload_doc').html('');
                                $('#update_form_of_goi_fund #obc_mhada_upload_doc').html('');
                                 $('#update_form_of_goi_fund #other_mhada_upload_doc').html('');

                                $('#update_form_of_goi_fund #sc_remark').html('');
                                $('#update_form_of_goi_fund #st_remark').html('');
                                $('#update_form_of_goi_fund #obc_remark').html('');
                                $('#update_form_of_goi_fund #other_remark').html('');


                                $('#update_form_of_goi_fund #sc_transactions').html('');
                                $('#update_form_of_goi_fund #st_transactions').html('');
                                $('#update_form_of_goi_fund #obc_transactions').html('');
                                $('#update_form_of_goi_fund #other_transactions').html('');

                                $('#update_form_of_goi_fund #sc_utilization_amount').attr('value', 0);
                                $('#update_form_of_goi_fund #st_utilization_amount').attr('value', 0);
                                $('#update_form_of_goi_fund #obc_utilization_amount').attr('value', 0);
                                $('#update_form_of_goi_fund #other_utilization_amount').attr('value', 0);



                                $('#update_form_of_goi_fund #total_amount').html('');
                                $('#update_form_of_goi_fund #total_gom_amount').html('');
                                $('#update_form_of_goi_fund #total_mhada_received_amount').html('');
                                $('#update_form_of_goi_fund #total_mhada_released_amount').html('');
                                $('#update_form_of_goi_fund #total_utilization_amount').attr('value', 0);



                            }
                            else if (nodel_agency == 2) {


                                $('#update_form_of_gom_fund #sc_amount').html('');
                                $('#update_form_of_gom_fund #st_amount').html('');
                                $('#update_form_of_gom_fund #obc_amount').html('');
                                $('#update_form_of_gom_fund #other_amount').html('');

                                $('#update_form_of_gom_fund #sc_goi_order_no').html('');
                                $('#update_form_of_gom_fund #sc_goi_order_date').html('');
                                $('#update_form_of_gom_fund #st_goi_order_no').html('');
                                $('#update_form_of_gom_fund #st_goi_order_date').html('');
                                $('#update_form_of_gom_fund #obc_goi_order_no').html('');
                                $('#update_form_of_gom_fund #obc_goi_order_date').html('');
                                $('#update_form_of_gom_fund #other_goi_order_no').html('');
                                $('#update_form_of_gom_fund #other_goi_order_date').html('');

                                $('#update_form_of_gom_fund #sc_goi_upload_doc').html('');
                                $('#update_form_of_gom_fund #st_goi_upload_doc').html('');
                                $('#update_form_of_gom_fund #obc_goi_upload_doc').html('');
                                $('#update_form_of_gom_fund #other_goi_upload_doc').html('');

                                $('#update_form_of_gom_fund #sc_gom_amount').html('');
                                $('#update_form_of_gom_fund #st_gom_amount').html('');
                                $('#update_form_of_gom_fund #obc_gom_amount').html('');
                                $('#update_form_of_gom_fund #other_gom_amount').html('');


                                $('#update_form_of_gom_fund #sc_gom_order_no').html('');
                                $('#update_form_of_gom_fund #sc_gom_order_date').html('');
                                $('#update_form_of_gom_fund #st_gom_order_no').html('');
                                $('#update_form_of_gom_fund #st_gom_order_date').html('');
                                $('#update_form_of_gom_fund #obc_gom_order_no').html('');
                                $('#update_form_of_gom_fund #obc_gom_order_date').html('');
                                $('#update_form_of_gom_fund #other_gom_order_no').html('');
                                $('#update_form_of_gom_fund #other_gom_order_date').html('');

                                $('#update_form_of_gom_fund #sc_gom_upload_doc').html('');
                                $('#update_form_of_gom_fund #st_gom_upload_doc').html('');
                                $('#update_form_of_gom_fund #obc_gom_upload_doc').html('');
                                $('#update_form_of_gom_fund #other_gom_upload_doc').html('');

                                $('#update_form_of_gom_fund #sc_mhada_received_amount').html('');
                                $('#update_form_of_gom_fund #sc_mhada_received_date').html('');
                                $('#update_form_of_gom_fund #sc_mhada_released_amount').html('');
                                $('#update_form_of_gom_fund #sc_mhada_order_no').html('');
                                $('#update_form_of_gom_fund #sc_mhada_order_date').html('');

                                $('#update_form_of_gom_fund #st_mhada_received_amount').html('');
                                $('#update_form_of_gom_fund #st_mhada_received_date').html('');
                                $('#update_form_of_gom_fund #st_mhada_released_amount').html('');
                                $('#update_form_of_gom_fund #st_mhada_order_no').html('');
                                $('#update_form_of_gom_fund #st_mhada_order_date').html('');

                                $('#update_form_of_gom_fund #obc_mhada_received_amount').html('');
                                $('#update_form_of_gom_fund #obc_mhada_received_date').html('');
                                $('#update_form_of_gom_fund #obc_mhada_released_amount').html('');
                                $('#update_form_of_gom_fund #obc_mhada_order_no').html('');
                                $('#update_form_of_gom_fund #obc_mhada_order_date').html('');

                                $('#update_form_of_gom_fund #other_mhada_received_amount').html('');
                                $('#update_form_of_gom_fund #other_mhada_received_date').html('');
                                $('#update_form_of_gom_fund #other_mhada_released_amount').html('');
                                $('#update_form_of_gom_fund #other_mhada_order_no').html('');
                                $('#update_form_of_gom_fund #other_mhada_order_date').html('');

                                $('#update_form_of_gom_fund #sc_mhada_upload_doc').html('');
                                $('#update_form_of_gom_fund #st_mhada_upload_doc').html('');
                                $('#update_form_of_gom_fund #obc_mhada_upload_doc').html('');
                                $('#update_form_of_gom_fund #other_mhada_upload_doc').html('');

                                $('#update_form_of_gom_fund #sc_remark').html('');
                                $('#update_form_of_gom_fund #st_remark').html('');
                                $('#update_form_of_gom_fund #obc_remark').html('');
                                $('#update_form_of_gom_fund #other_remark').html('');


                                $('#update_form_of_gom_fund #sc_transactions').html('');
                                $('#update_form_of_gom_fund #st_transactions').html('');
                                $('#update_form_of_gom_fund #obc_transactions').html('');
                                $('#update_form_of_gom_fund #other_transactions').html('');

                                $('#update_form_of_gom_fund #sc_utilization_amount').attr('value', 0);
                                $('#update_form_of_gom_fund #st_utilization_amount').attr('value', 0);
                                $('#update_form_of_gom_fund #obc_utilization_amount').attr('value', 0);
                                $('#update_form_of_gom_fund #other_utilization_amount').attr('value', 0);



                                $('#update_form_of_gom_fund #total_amount').html('');
                                $('#update_form_of_gom_fund #total_gom_amount').html('');
                                $('#update_form_of_gom_fund #total_mhada_received_amount').html('');
                                $('#update_form_of_gom_fund #total_mhada_released_amount').html('');
                                $('#update_form_of_gom_fund #gom_total_utilization_amount').attr('value', 0);


                            }

                            $('#save_financial_details').attr('disabled','disabled');
                            $('#save_note').html('Note: As MHADA has not added fund details in the system, you are not allowed to add utilization amount');

                        }
                    },
                    error: function() { alert("Error posting form."); }
                });
            }



        });


        $('#installment').change(function () {

            var nodel_agency = $('#nodel_agency').val();
            var installment = $('#installment').val();

            if (nodel_agency == '') {
                alert('Please select nodel agency');
                return false;
            }

            if(nodel_agency!='' && installment!='')
            {
                $.ajax({
                    type: "POST",
                    url: "agency/get_financial_details_data",
                    data: {'nodel_agency': nodel_agency, 'installment': installment , 'project_id': $('#project_id').val() },
                    dataType: "html",
                    success: function(data){
                        console.log(data);

                        var data = JSON.parse(data);

                        if ($.trim(data)) {
                            if (data[0].nodel_agency == 1) {

                                $('#update_form_of_goi_fund #sc_amount').html(data[0].sc_amount);
                                $('#update_form_of_goi_fund #st_amount').html(data[0].st_amount);
                                $('#update_form_of_goi_fund #obc_amount').html(data[0].obc_amount);
                                $('#update_form_of_goi_fund #other_amount').html(data[0].other_amount);

                                $('#update_form_of_goi_fund #sc_goi_order_no').html(data[0].sc_goi_order_no);
                                $('#update_form_of_goi_fund #sc_goi_order_date').html(data[0].sc_goi_order_date);
                                $('#update_form_of_goi_fund #st_goi_order_no').html(data[0].st_goi_order_no);
                                $('#update_form_of_goi_fund #st_goi_order_date').html(data[0].st_goi_order_date);
                                $('#update_form_of_goi_fund #obc_goi_order_no').html(data[0].obc_goi_order_no);
                                $('#update_form_of_goi_fund #obc_goi_order_date').html(data[0].obc_goi_order_date);
                                $('#update_form_of_goi_fund #other_goi_order_no').html(data[0].other_goi_order_no);
                                $('#update_form_of_goi_fund #other_goi_order_date').html(data[0].other_goi_order_date);

                                if(data[0].sc_goi_upload_doc!=''){ $('#update_form_of_goi_fund #sc_goi_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].sc_goi_upload_doc+'" target="_blank">Download Doc</a>'); }
                                if(data[0].st_goi_upload_doc!=''){ $('#update_form_of_goi_fund #st_goi_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].st_goi_upload_doc+'" target="_blank">Download Doc</a>'); }
                                if(data[0].obc_goi_upload_doc!=''){ $('#update_form_of_goi_fund #obc_goi_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].obc_goi_upload_doc+'" target="_blank">Download Doc</a>'); }
                                if(data[0].other_goi_upload_doc!=''){ $('#update_form_of_goi_fund #other_goi_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].other_goi_upload_doc+'" target="_blank">Download Doc</a>'); }

                                $('#update_form_of_goi_fund #sc_gom_amount').html(data[0].sc_gom_amount);
                                $('#update_form_of_goi_fund #st_gom_amount').html(data[0].st_gom_amount);
                                $('#update_form_of_goi_fund #obc_gom_amount').html(data[0].obc_gom_amount);
                                $('#update_form_of_goi_fund #other_gom_amount').html(data[0].other_gom_amount);


                                $('#update_form_of_goi_fund #sc_gom_order_no').html(data[0].sc_gom_order_no);
                                $('#update_form_of_goi_fund #sc_gom_order_date').html(data[0].sc_gom_order_date);
                                $('#update_form_of_goi_fund #st_gom_order_no').html(data[0].st_gom_order_no);
                                $('#update_form_of_goi_fund #st_gom_order_date').html(data[0].st_gom_order_date);
                                $('#update_form_of_goi_fund #obc_gom_order_no').html(data[0].obc_gom_order_no);
                                $('#update_form_of_goi_fund #obc_gom_order_date').html(data[0].obc_gom_order_date);
                                $('#update_form_of_goi_fund #other_gom_order_no').html(data[0].other_gom_order_no);
                                $('#update_form_of_goi_fund #other_gom_order_date').html(data[0].other_gom_order_date);

                                if(data[0].sc_gom_upload_doc!=''){ $('#update_form_of_goi_fund #sc_gom_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].sc_gom_upload_doc+'" target="_blank">Download Doc</a>'); }
                                if(data[0].st_gom_upload_doc!=''){ $('#update_form_of_goi_fund #st_gom_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].st_gom_upload_doc+'" target="_blank">Download Doc</a>'); }
                                if(data[0].obc_gom_upload_doc!=''){ $('#update_form_of_goi_fund #obc_gom_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].obc_gom_upload_doc+'" target="_blank">Download Doc</a>'); }
                                if(data[0].other_gom_upload_doc!=''){ $('#update_form_of_goi_fund #other_gom_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].other_gom_upload_doc+'" target="_blank">Download Doc</a>'); }

                                $('#update_form_of_goi_fund #sc_mhada_received_amount').html(data[0].sc_mhada_received_amount);
                                $('#update_form_of_goi_fund #sc_mhada_received_date').html(data[0].sc_mhada_received_date);
                                $('#update_form_of_goi_fund #sc_mhada_released_amount').html(data[0].sc_mhada_released_amount);
                                $('#update_form_of_goi_fund #sc_mhada_order_no').html(data[0].sc_mhada_order_no);
                                $('#update_form_of_goi_fund #sc_mhada_order_date').html(data[0].sc_mhada_order_date);

                                $('#update_form_of_goi_fund #st_mhada_received_amount').html(data[0].st_mhada_received_amount);
                                $('#update_form_of_goi_fund #st_mhada_received_date').html(data[0].st_mhada_received_date);
                                $('#update_form_of_goi_fund #st_mhada_released_amount').html(data[0].st_mhada_released_amount);
                                $('#update_form_of_goi_fund #st_mhada_order_no').html(data[0].st_mhada_order_no);
                                $('#update_form_of_goi_fund #st_mhada_order_date').html(data[0].st_mhada_order_date);

                                $('#update_form_of_goi_fund #obc_mhada_received_amount').html(data[0].obc_mhada_received_amount);
                                $('#update_form_of_goi_fund #obc_mhada_received_date').html(data[0].obc_mhada_received_date);
                                $('#update_form_of_goi_fund #obc_mhada_released_amount').html(data[0].obc_mhada_released_amount);
                                $('#update_form_of_goi_fund #obc_mhada_order_no').html(data[0].obc_mhada_order_no);
                                $('#update_form_of_goi_fund #obc_mhada_order_date').html(data[0].obc_mhada_order_date);

                                $('#update_form_of_goi_fund #other_mhada_received_amount').html(data[0].other_mhada_received_amount);
                                $('#update_form_of_goi_fund #other_mhada_received_date').html(data[0].other_mhada_received_date);
                                $('#update_form_of_goi_fund #other_mhada_released_amount').html(data[0].other_mhada_released_amount);
                                $('#update_form_of_goi_fund #other_mhada_order_no').html(data[0].other_mhada_order_no);
                                $('#update_form_of_goi_fund #other_mhada_order_date').html(data[0].other_mhada_order_date);

                                if(data[0].sc_mhada_upload_doc!=''){ $('#update_form_of_goi_fund #sc_mhada_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].sc_mhada_upload_doc+'" target="_blank">Download Doc</a>'); }
                                if(data[0].st_mhada_upload_doc!=''){ $('#update_form_of_goi_fund #st_mhada_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].st_mhada_upload_doc+'" target="_blank">Download Doc</a>'); }
                                if(data[0].obc_mhada_upload_doc!=''){ $('#update_form_of_goi_fund #obc_mhada_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].obc_mhada_upload_doc+'" target="_blank">Download Doc</a>'); }
                                if(data[0].other_mhada_upload_doc!=''){ $('#update_form_of_goi_fund #other_mhada_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].other_mhada_upload_doc+'" target="_blank">Download Doc</a>'); }

                                $('#update_form_of_goi_fund #sc_remark').html(data[0].sc_remark);
                                $('#update_form_of_goi_fund #st_remark').html(data[0].st_remark);
                                $('#update_form_of_goi_fund #obc_remark').html(data[0].obc_remark);
                                $('#update_form_of_goi_fund #other_remark').html(data[0].other_remark);


                                $('#update_form_of_goi_fund #sc_transactions').attr('value', data[0].sc_transactions);
                                $('#update_form_of_goi_fund #st_transactions').attr('value', data[0].st_transactions);
                                $('#update_form_of_goi_fund #obc_transactions').attr('value', data[0].obc_transactions);
                                $('#update_form_of_goi_fund #other_transactions').attr('value', data[0].other_transactions);

                                $('#update_form_of_goi_fund #sc_utilization_amount').attr('value', data[0].sc_utilization_amount);
                                $('#update_form_of_goi_fund #st_utilization_amount').attr('value', data[0].st_utilization_amount);
                                $('#update_form_of_goi_fund #obc_utilization_amount').attr('value', data[0].obc_utilization_amount);
                                $('#update_form_of_goi_fund #other_utilization_amount').attr('value', data[0].other_utilization_amount);



                                $('#update_form_of_goi_fund #total_amount').html(data[0].total_amount);
                                $('#update_form_of_goi_fund #total_gom_amount').html(data[0].total_gom_amount);
                                $('#update_form_of_goi_fund #total_mhada_received_amount').html(data[0].total_mhada_received_amount);
                                $('#update_form_of_goi_fund #total_mhada_released_amount').html(data[0].total_mhada_released_amount);
                                $('#update_form_of_goi_fund #total_utilization_amount').attr('value', data[0].total_utilization_amount);


                                if(data[0].sc_amount=='' || data[0].sc_amount==0)
                                {
                                    $('#update_form_of_goi_fund #sc_utilization_amount').attr('readonly', true);

                                }

                                if(data[0].st_amount=='' || data[0].st_amount==0)
                                {
                                    $('#update_form_of_goi_fund #st_utilization_amount').attr('readonly', true);

                                }
                                if(data[0].obc_amount=='' || data[0].obc_amount==0)
                                {
                                    $('#update_form_of_goi_fund #obc_utilization_amount').attr('readonly', true);

                                }

                                if(data[0].other_amount=='' || data[0].other_amount==0)
                                {
                                    $('#update_form_of_goi_fund #other_utilization_amount').attr('readonly', true);

                                }
                            }
                            else if (data[0].nodel_agency == 2) {

                                $('#update_form_of_gom_fund #sc_gom_amount').html(data[0].sc_gom_amount);
                                $('#update_form_of_gom_fund #st_gom_amount').html(data[0].st_gom_amount);
                                $('#update_form_of_gom_fund #obc_gom_amount').html(data[0].obc_gom_amount);
                                $('#update_form_of_gom_fund #other_gom_amount').html(data[0].other_gom_amount);


                                $('#update_form_of_gom_fund #sc_gom_order_no').html(data[0].sc_gom_order_no);
                                $('#update_form_of_gom_fund #sc_gom_order_date').html(data[0].sc_gom_order_date);
                                $('#update_form_of_gom_fund #st_gom_order_no').html(data[0].st_gom_order_no);
                                $('#update_form_of_gom_fund #st_gom_order_date').html(data[0].st_gom_order_date);
                                $('#update_form_of_gom_fund #obc_gom_order_no').html(data[0].obc_gom_order_no);
                                $('#update_form_of_gom_fund #obc_gom_order_date').html(data[0].obc_gom_order_date);
                                $('#update_form_of_gom_fund #other_gom_order_no').html(data[0].other_gom_order_no);
                                $('#update_form_of_gom_fund #other_gom_order_date').html(data[0].other_gom_order_date);

                                if(data[0].sc_gom_upload_doc!=''){ $('#update_form_of_gom_fund #sc_gom_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].sc_gom_upload_doc+'" target="_blank">Download Doc</a>'); }
                                if(data[0].st_gom_upload_doc!=''){ $('#update_form_of_gom_fund #st_gom_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].st_gom_upload_doc+'" target="_blank">Download Doc</a>'); }
                                if(data[0].obc_gom_upload_doc!=''){ $('#update_form_of_gom_fund #obc_gom_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].obc_gom_upload_doc+'" target="_blank">Download Doc</a>'); }
                                if(data[0].other_gom_upload_doc!=''){ $('#update_form_of_gom_fund #other_gom_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].other_gom_upload_doc+'" target="_blank">Download Doc</a>'); }

                                $('#update_form_of_gom_fund #sc_mhada_received_amount').html(data[0].sc_mhada_received_amount);
                                $('#update_form_of_gom_fund #sc_mhada_received_date').html(data[0].sc_mhada_received_date);
                                $('#update_form_of_gom_fund #sc_mhada_released_amount').html(data[0].sc_mhada_released_amount);
                                $('#update_form_of_gom_fund #sc_mhada_order_no').html(data[0].sc_mhada_order_no);
                                $('#update_form_of_gom_fund #sc_mhada_order_date').html(data[0].sc_mhada_order_date);

                                $('#update_form_of_gom_fund #st_mhada_received_amount').html(data[0].st_mhada_received_amount);
                                $('#update_form_of_gom_fund #st_mhada_received_date').html(data[0].st_mhada_received_date);
                                $('#update_form_of_gom_fund #st_mhada_released_amount').html(data[0].st_mhada_released_amount);
                                $('#update_form_of_gom_fund #st_mhada_order_no').html(data[0].st_mhada_order_no);
                                $('#update_form_of_gom_fund #st_mhada_order_date').html(data[0].st_mhada_order_date);

                                $('#update_form_of_gom_fund #obc_mhada_received_amount').html(data[0].obc_mhada_received_amount);
                                $('#update_form_of_gom_fund #obc_mhada_received_date').html(data[0].obc_mhada_received_date);
                                $('#update_form_of_gom_fund #obc_mhada_released_amount').html(data[0].obc_mhada_released_amount);
                                $('#update_form_of_gom_fund #obc_mhada_order_no').html(data[0].obc_mhada_order_no);
                                $('#update_form_of_gom_fund #obc_mhada_order_date').html(data[0].obc_mhada_order_date);

                                $('#update_form_of_gom_fund #other_mhada_received_amount').html(data[0].other_mhada_received_amount);
                                $('#update_form_of_gom_fund #other_mhada_received_date').html(data[0].other_mhada_received_date);
                                $('#update_form_of_gom_fund #other_mhada_released_amount').html(data[0].other_mhada_released_amount);
                                $('#update_form_of_gom_fund #other_mhada_order_no').html(data[0].other_mhada_order_no);
                                $('#update_form_of_gom_fund #other_mhada_order_date').html(data[0].other_mhada_order_date);

                                if(data[0].sc_mhada_upload_doc!=''){ $('#update_form_of_gom_fund #sc_mhada_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].sc_mhada_upload_doc+'" target="_blank">Download Doc</a>'); }
                                if(data[0].st_mhada_upload_doc!=''){ $('#update_form_of_gom_fund #st_mhada_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].st_mhada_upload_doc+'" target="_blank">Download Doc</a>'); }
                                if(data[0].obc_mhada_upload_doc!=''){ $('#update_form_of_gom_fund #obc_mhada_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].obc_mhada_upload_doc+'" target="_blank">Download Doc</a>'); }
                                if(data[0].other_mhada_upload_doc!=''){ $('#update_form_of_gom_fund #other_mhada_upload_doc').html('<a href="<?php echo base_url();?>public/uploads/'+data[0].other_mhada_upload_doc+'" target="_blank">Download Doc</a>'); }

                                $('#update_form_of_gom_fund #sc_remark').html(data[0].sc_remark);
                                $('#update_form_of_gom_fund #st_remark').html(data[0].st_remark);
                                $('#update_form_of_gom_fund #obc_remark').html(data[0].obc_remark);
                                $('#update_form_of_gom_fund #other_remark').html(data[0].other_remark);


                                $('#update_form_of_gom_fund #sc_transactions').attr('value', data[0].sc_transactions);
                                $('#update_form_of_gom_fund #st_transactions').attr('value', data[0].st_transactions);
                                $('#update_form_of_gom_fund #obc_transactions').attr('value', data[0].obc_transactions);
                                $('#update_form_of_gom_fund #other_transactions').attr('value', data[0].other_transactions);

                                $('#update_form_of_gom_fund #sc_utilization_amount').attr('value', data[0].sc_utilization_amount);
                                $('#update_form_of_gom_fund #st_utilization_amount').attr('value', data[0].st_utilization_amount);
                                $('#update_form_of_gom_fund #obc_utilization_amount').attr('value', data[0].obc_utilization_amount);
                                $('#update_form_of_gom_fund #other_utilization_amount').attr('value', data[0].other_utilization_amount);



                                $('#update_form_of_gom_fund #total_amount').html(data[0].total_amount);
                                $('#update_form_of_gom_fund #total_gom_amount').html(data[0].total_gom_amount);
                                $('#update_form_of_gom_fund #total_mhada_received_amount').html(data[0].total_mhada_received_amount);
                                $('#update_form_of_gom_fund #total_mhada_released_amount').html(data[0].total_mhada_released_amount);

                                $('#update_form_of_gom_fund #gom_total_utilization_amount').attr('value', data[0].total_utilization_amount);

                            }

                            if(data[0].sc_gom_amount=='' || data[0].sc_gom_amount==0)
                            {
                                $('#update_form_of_gom_fund #sc_utilization_amount').attr('readonly', true);

                            }

                            if(data[0].st_gom_amount=='' || data[0].st_gom_amount==0)
                            {
                                $('#update_form_of_gom_fund #st_utilization_amount').attr('readonly', true);

                            }

                            if(data[0].obc_gom_amount=='' || data[0].obc_gom_amount==0)
                            {
                                $('#update_form_of_gom_fund #obc_utilization_amount').attr('readonly', true);

                            }

                            if(data[0].other_gom_amount=='' || data[0].other_gom_amount==0)
                            {
                                $('#update_form_of_gom_fund #other_utilization_amount').attr('readonly', true);

                            }

                            $('#save_note').html('');

                        }
                        else
                        {
                            if (nodel_agency == 1) {


                                $('#update_form_of_goi_fund #sc_amount').html('');
                                $('#update_form_of_goi_fund #st_amount').html('');
                                $('#update_form_of_goi_fund #obc_amount').html('');
                                $('#update_form_of_goi_fund #other_amount').html('');

                                $('#update_form_of_goi_fund #sc_goi_order_no').html('');
                                $('#update_form_of_goi_fund #sc_goi_order_date').html('');
                                $('#update_form_of_goi_fund #st_goi_order_no').html('');
                                $('#update_form_of_goi_fund #st_goi_order_date').html('');
                                $('#update_form_of_goi_fund #obc_goi_order_no').html('');
                                $('#update_form_of_goi_fund #obc_goi_order_date').html('');
                                $('#update_form_of_goi_fund #other_goi_order_no').html('');
                                $('#update_form_of_goi_fund #other_goi_order_date').html('');

                                $('#update_form_of_goi_fund #sc_goi_upload_doc').html('');
                                $('#update_form_of_goi_fund #st_goi_upload_doc').html('');
                                $('#update_form_of_goi_fund #obc_goi_upload_doc').html('');
                                $('#update_form_of_goi_fund #other_goi_upload_doc').html('');

                                $('#update_form_of_goi_fund #sc_gom_amount').html('');
                                $('#update_form_of_goi_fund #st_gom_amount').html('');
                                $('#update_form_of_goi_fund #obc_gom_amount').html('');
                                $('#update_form_of_goi_fund #other_gom_amount').html('');


                                $('#update_form_of_goi_fund #sc_gom_order_no').html('');
                                $('#update_form_of_goi_fund #sc_gom_order_date').html('');
                                $('#update_form_of_goi_fund #st_gom_order_no').html('');
                                $('#update_form_of_goi_fund #st_gom_order_date').html('');
                                $('#update_form_of_goi_fund #obc_gom_order_no').html('');
                                $('#update_form_of_goi_fund #obc_gom_order_date').html('');
                                $('#update_form_of_goi_fund #other_gom_order_no').html('');
                                $('#update_form_of_goi_fund #other_gom_order_date').html('');

                                $('#update_form_of_goi_fund #sc_gom_upload_doc').html('');
                                $('#update_form_of_goi_fund #st_gom_upload_doc').html('');
                                $('#update_form_of_goi_fund #obc_gom_upload_doc').html('');
                                $('#update_form_of_goi_fund #other_gom_upload_doc').html('');

                                $('#update_form_of_goi_fund #sc_mhada_received_amount').html('');
                                $('#update_form_of_goi_fund #sc_mhada_received_date').html('');
                                $('#update_form_of_goi_fund #sc_mhada_released_amount').html('');
                                $('#update_form_of_goi_fund #sc_mhada_order_no').html('');
                                $('#update_form_of_goi_fund #sc_mhada_order_date').html('');

                                $('#update_form_of_goi_fund #st_mhada_received_amount').html('');
                                $('#update_form_of_goi_fund #st_mhada_received_date').html('');
                                $('#update_form_of_goi_fund #st_mhada_released_amount').html('');
                                $('#update_form_of_goi_fund #st_mhada_order_no').html('');
                                $('#update_form_of_goi_fund #st_mhada_order_date').html('');

                                $('#update_form_of_goi_fund #obc_mhada_received_amount').html('');
                                $('#update_form_of_goi_fund #obc_mhada_received_date').html('');
                                $('#update_form_of_goi_fund #obc_mhada_released_amount').html('');
                                $('#update_form_of_goi_fund #obc_mhada_order_no').html('');
                                $('#update_form_of_goi_fund #obc_mhada_order_date').html('');

                                $('#update_form_of_goi_fund #other_mhada_received_amount').html('');
                                $('#update_form_of_goi_fund #other_mhada_received_date').html('');
                                $('#update_form_of_goi_fund #other_mhada_released_amount').html('');
                                $('#update_form_of_goi_fund #other_mhada_order_no').html('');
                                $('#update_form_of_goi_fund #other_mhada_order_date').html('');

                                $('#update_form_of_goi_fund #sc_mhada_upload_doc').html('');
                                $('#update_form_of_goi_fund #st_mhada_upload_doc').html('');
                                $('#update_form_of_goi_fund #obc_mhada_upload_doc').html('');
                                $('#update_form_of_goi_fund #other_mhada_upload_doc').html('');

                                $('#update_form_of_goi_fund #sc_remark').html('');
                                $('#update_form_of_goi_fund #st_remark').html('');
                                $('#update_form_of_goi_fund #obc_remark').html('');
                                $('#update_form_of_goi_fund #other_remark').html('');


                                $('#update_form_of_goi_fund #sc_transactions').html('');
                                $('#update_form_of_goi_fund #st_transactions').html('');
                                $('#update_form_of_goi_fund #obc_transactions').html('');
                                $('#update_form_of_goi_fund #other_transactions').html('');

                                $('#update_form_of_goi_fund #sc_utilization_amount').attr('value', 0);
                                $('#update_form_of_goi_fund #st_utilization_amount').attr('value', 0);
                                $('#update_form_of_goi_fund #obc_utilization_amount').attr('value', 0);
                                $('#update_form_of_goi_fund #other_utilization_amount').attr('value', 0);



                                $('#update_form_of_goi_fund #total_amount').html('');
                                $('#update_form_of_goi_fund #total_gom_amount').html('');
                                $('#update_form_of_goi_fund #total_mhada_received_amount').html('');
                                $('#update_form_of_goi_fund #total_mhada_released_amount').html('');
                                $('#update_form_of_goi_fund #total_utilization_amount').attr('value', 0);



                            }
                            else if (nodel_agency == 2) {


                                $('#update_form_of_gom_fund #sc_amount').html('');
                                $('#update_form_of_gom_fund #st_amount').html('');
                                $('#update_form_of_gom_fund #obc_amount').html('');
                                $('#update_form_of_gom_fund #other_amount').html('');

                                $('#update_form_of_gom_fund #sc_goi_order_no').html('');
                                $('#update_form_of_gom_fund #sc_goi_order_date').html('');
                                $('#update_form_of_gom_fund #st_goi_order_no').html('');
                                $('#update_form_of_gom_fund #st_goi_order_date').html('');
                                $('#update_form_of_gom_fund #obc_goi_order_no').html('');
                                $('#update_form_of_gom_fund #obc_goi_order_date').html('');
                                $('#update_form_of_gom_fund #other_goi_order_no').html('');
                                $('#update_form_of_gom_fund #other_goi_order_date').html('');

                                $('#update_form_of_gom_fund #sc_goi_upload_doc').html('');
                                $('#update_form_of_gom_fund #st_goi_upload_doc').html('');
                                $('#update_form_of_gom_fund #obc_goi_upload_doc').html('');
                                $('#update_form_of_gom_fund #other_goi_upload_doc').html('');

                                $('#update_form_of_gom_fund #sc_gom_amount').html('');
                                $('#update_form_of_gom_fund #st_gom_amount').html('');
                                $('#update_form_of_gom_fund #obc_gom_amount').html('');
                                $('#update_form_of_gom_fund #other_gom_amount').html('');


                                $('#update_form_of_gom_fund #sc_gom_order_no').html('');
                                $('#update_form_of_gom_fund #sc_gom_order_date').html('');
                                $('#update_form_of_gom_fund #st_gom_order_no').html('');
                                $('#update_form_of_gom_fund #st_gom_order_date').html('');
                                $('#update_form_of_gom_fund #obc_gom_order_no').html('');
                                $('#update_form_of_gom_fund #obc_gom_order_date').html('');
                                $('#update_form_of_gom_fund #other_gom_order_no').html('');
                                $('#update_form_of_gom_fund #other_gom_order_date').html('');

                                $('#update_form_of_gom_fund #sc_gom_upload_doc').html('');
                                $('#update_form_of_gom_fund #st_gom_upload_doc').html('');
                                $('#update_form_of_gom_fund #obc_gom_upload_doc').html('');
                                $('#update_form_of_gom_fund #other_gom_upload_doc').html('');

                                $('#update_form_of_gom_fund #sc_mhada_received_amount').html('');
                                $('#update_form_of_gom_fund #sc_mhada_received_date').html('');
                                $('#update_form_of_gom_fund #sc_mhada_released_amount').html('');
                                $('#update_form_of_gom_fund #sc_mhada_order_no').html('');
                                $('#update_form_of_gom_fund #sc_mhada_order_date').html('');

                                $('#update_form_of_gom_fund #st_mhada_received_amount').html('');
                                $('#update_form_of_gom_fund #st_mhada_received_date').html('');
                                $('#update_form_of_gom_fund #st_mhada_released_amount').html('');
                                $('#update_form_of_gom_fund #st_mhada_order_no').html('');
                                $('#update_form_of_gom_fund #st_mhada_order_date').html('');

                                $('#update_form_of_gom_fund #obc_mhada_received_amount').html('');
                                $('#update_form_of_gom_fund #obc_mhada_received_date').html('');
                                $('#update_form_of_gom_fund #obc_mhada_released_amount').html('');
                                $('#update_form_of_gom_fund #obc_mhada_order_no').html('');
                                $('#update_form_of_gom_fund #obc_mhada_order_date').html('');

                                $('#update_form_of_gom_fund #other_mhada_received_amount').html('');
                                $('#update_form_of_gom_fund #other_mhada_received_date').html('');
                                $('#update_form_of_gom_fund #other_mhada_released_amount').html('');
                                $('#update_form_of_gom_fund #other_mhada_order_no').html('');
                                $('#update_form_of_gom_fund #other_mhada_order_date').html('');

                                $('#update_form_of_gom_fund #sc_mhada_upload_doc').html('');
                                $('#update_form_of_gom_fund #st_mhada_upload_doc').html('');
                                $('#update_form_of_gom_fund #obc_mhada_upload_doc').html('');
                                $('#update_form_of_gom_fund #other_mhada_upload_doc').html('');

                                $('#update_form_of_gom_fund #sc_remark').html('');
                                $('#update_form_of_gom_fund #st_remark').html('');
                                $('#update_form_of_gom_fund #obc_remark').html('');
                                $('#update_form_of_gom_fund #other_remark').html('');


                                $('#update_form_of_gom_fund #sc_transactions').html('');
                                $('#update_form_of_gom_fund #st_transactions').html('');
                                $('#update_form_of_gom_fund #obc_transactions').html('');
                                $('#update_form_of_gom_fund #other_transactions').html('');

                                $('#update_form_of_gom_fund #sc_utilization_amount').attr('value', 0);
                                $('#update_form_of_gom_fund #st_utilization_amount').attr('value', 0);
                                $('#update_form_of_gom_fund #obc_utilization_amount').attr('value', 0);
                                $('#update_form_of_gom_fund #other_utilization_amount').attr('value', 0);



                                $('#update_form_of_gom_fund #total_amount').html('');
                                $('#update_form_of_gom_fund #total_gom_amount').html('');
                                $('#update_form_of_gom_fund #total_mhada_received_amount').html('');
                                $('#update_form_of_gom_fund #total_mhada_released_amount').html('');
                                $('#update_form_of_gom_fund #gom_total_utilization_amount').attr('value', 0);


                            }

                            $('#save_financial_details').attr('disabled','disabled');
                            $('#save_note').html('Note: As MHADA has not added fund details in the system, you are not allowed to add utilization amount');

                        }
                    },
                    error: function() { alert("Error posting form."); }
                });
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