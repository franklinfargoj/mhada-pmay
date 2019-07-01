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
                                                        <p><input type="hidden" name="project_id" id="project_id" value="<?php echo $project_details['id']; ?>" />
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
                                                        <h5>Project Address</h5>
                                                        <p>
                                                            <?php echo isset($project_details['address'])?$project_details['address']:null;?>
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <h5>Region</h5>
                                                        <p>
                                                            <?php echo isset($project_details['region_name'])?$project_details['region_name']:null;?>
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
                                               <div class="row"><?php foreach($slac_details as $slac){ ?>
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
                                                                <th scope="col">Installment</th>
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
                                                                <th scope="col">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Upload Doc</th>

                                                                <th scope="col">Amount (In Rs.) </th>
                                                                <th scope="col">Order No</th>
                                                                <th scope="col">Order Date</th>
                                                                <th scope="col">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Upload Doc</th>

                                                                <th scope="col">Received Amount </th>
                                                                <th scope="col">Received Date</th>
                                                                <th scope="col">Released Amount</th>
                                                                <th scope="col">Released Oder No</th>
                                                                <th scope="col">Released Order Date</th>
                                                                <th scope="col">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Upload Doc</th>


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




                                                                <td><input type="text" class="form-control total_amount"
                                                                        name="financial_details[<?php echo $category; ?>][amount]"
                                                                        value="0" id="<?php echo $category; ?>_goi_total_amount"/> </td>
                                                                <td><input type="text" class="form-control" name="financial_details[<?php echo $category; ?>][goi_order_no]" id="<?php echo $category; ?>_goi_order_no"/>
                                                                </td>
                                                                <td><input class="form-control" type="date" max="<?php echo date("Y-m-d"); ?>" name="financial_details[<?php echo $category; ?>][goi_order_date]"
                                                                        value="" id="<?php echo $category; ?>_goi_order_date"></td>
                                                                <td>
                                                                    <input type="file" name="<?php echo $category; ?>_goi_upload_doc"  class="form-control" id="<?php echo $category; ?>_goi_upload_doc"/>
                                                                </td>

                                                                <td><input type="text" class="form-control total_gom_amount"
                                                                           name="financial_details[<?php echo $category; ?>][gom_amount]"
                                                                           value="0" id="<?php echo $category; ?>_gom_amount"/> </td>
                                                                <td><input type="text" class="form-control" name="financial_details[<?php echo $category; ?>][gom_order_no]" id="<?php echo $category; ?>_gom_order_no"/>
                                                                </td>
                                                                <td><input type="date" class="form-control" max="<?php echo date("Y-m-d"); ?>" name="financial_details[<?php echo $category; ?>][gom_order_date]" id="<?php echo $category; ?>_gom_order_date" />
                                                                </td>
                                                                <td>
                                                                    <input type="file" name="<?php echo $category; ?>_gom_upload_doc"  class="form-control" id="<?php echo $category; ?>_gom_upload_doc"/>
                                                                </td>

                                                                <td><input type="text" class="form-control total_mhada_received_amount" name="financial_details[<?php echo $category; ?>][mhada_received_amount]" value="0" id="<?php echo $category; ?>_mhada_received_amount" />
                                                                </td>

                                                                <td><input type="date" class="form-control" name="financial_details[<?php echo $category; ?>][mhada_received_date]" id="<?php echo $category; ?>_mhada_received_date"/>
                                                                </td>
                                                                <td><input type="text" class="form-control total_mhada_released_amount" name="financial_details[<?php echo $category; ?>][mhada_released_amount]" value="0" id="<?php echo $category; ?>_mhada_released_amount"/>
                                                                </td>
                                                                <td><input type="text" class="form-control" name="financial_details[<?php echo $category; ?>][mhada_order_no]"id="<?php echo $category; ?>_mhada_release_no" />
                                                                </td>
                                                                <td><input type="date" class="form-control" max="<?php echo date("Y-m-d"); ?>" name="financial_details[<?php echo $category; ?>][mhada_order_date]" id="<?php echo $category; ?>_mhada_release_date"/>
                                                                </td>
                                                                <td><input type="file" name="<?php echo $category; ?>_mhada_upload_doc"  class="form-control" id="<?php echo $category; ?>_mhada_upload_doc" /></td>

                                                                <td><input readonly type="text" class="form-control" id="goi_<?php echo $category; ?>_transactions"</td>

                                                                <td><input readonly type="text" class="form-control" id="goi_<?php echo $category; ?>_utilization_amount"</td>

                                                                <td><textarea readonly class="form-control" id="<?php echo strtolower($category); ?>_utilization_certificate"  name="financial_details[<?php echo $category; ?>][utilization_certificate]"/></textarea></td>

                                                                <td><textarea class="form-control" name="financial_details[<?php echo $category; ?>][remark]" id="<?php echo $category; ?>_remark"></textarea></td>

                                                            </tr>
                                                            <?php
                                         }
                                         ?>
                                                            <tr>
                                                                <td>
                                                                    <h5>Total Amount</h5>
                                                                </td>
                                                                <td><input readonly class="form-control" type="text"
                                                                        name="financial_details[total_amount]" id="total_amount" value="0" /></td>
                                                                <td> - </td>
                                                                <td> - </td>
                                                                <td> - </td>
                                                                <td><input readonly class="form-control" type="text"
                                                                           name="financial_details[total_gom_amount]" id="total_gom_amount" value="0" /></td>


                                                                <td> - </td>
                                                                <td> - </td>
                                                                <td> - </td>

                                                                <td><input readonly class="form-control" type="text"
                                                                           name="financial_details[total_mhada_received_amount]" id="total_mhada_received_amount" value="0" /></td>


                                                                <td>-</td>
                                                                <td><input readonly class="form-control" type="text"
                                                                           name="financial_details[total_mhada_released_amount]" id="total_mhada_released_amount" value="0" /></td>

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
                                                            <th scope="col">Installment</th>
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
                                                            <th scope="col">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Upload Doc</th>

                                                            <th scope="col">Received Amount </th>
                                                            <th scope="col">Received Date</th>
                                                            <th scope="col">Released Amount</th>
                                                            <th scope="col">Released Oder No</th>
                                                            <th scope="col">Released Order Date</th>
                                                            <th scope="col">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Upload Doc</th>


                                                            <th scope="col">No Of Transactions</th>
                                                            <th scope="col">Expenditure - GOM</th>
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

                                                <td><input type="text" class="form-control gom_total_gom_amount"
                                                           name="gom_financial_details[<?php echo $category; ?>][gom_amount]"
                                                           value="0" id="<?php echo $category; ?>_gom_amount" />
                                                </td>

                                                 <td><input type="text" class="form-control" name="gom_financial_details[<?php echo $category; ?>][gom_order_no]" id="<?php echo $category; ?>_gom_order_no"/>
                                                 </td>
                                                 <td><input type="date" class="form-control" name="gom_financial_details[<?php echo $category; ?>][gom_order_date]" id="<?php echo $category; ?>_gom_order_date"/>
                                                 </td>
                                                 <td>
                                                     <input type="file" name="<?php echo $category; ?>_gom_upload_doc_gom"  class="form-control" id="<?php echo $category; ?>_gom_upload_doc"/>
                                                 </td>

                                                 <td><input type="text" class="form-control gom_total_mhada_received_amount" name="gom_financial_details[<?php echo $category; ?>][mhada_received_amount]" value="0" id="<?php echo $category; ?>_mhada_received_amount"/>
                                                 </td>

                                                 <td><input type="date" class="form-control" name="gom_financial_details[<?php echo $category; ?>][mhada_received_date]" />
                                                 </td>
                                                 <td><input type="text" class="form-control gom_total_mhada_released_amount" name="gom_financial_details[<?php echo $category; ?>][mhada_released_amount]" value="0" id="<?php echo $category; ?>_mhada_released_amount"/>
                                                 </td>
                                                 <td><input type="text" class="form-control" name="gom_financial_details[<?php echo $category; ?>][mhada_order_no]" id="<?php echo $category; ?>_mhada_released_no"/>
                                                 </td>
                                                 <td><input type="date" class="form-control" name="gom_financial_details[<?php echo $category; ?>][mhada_order_date]" id="<?php echo $category; ?>_mhada_released_date"/>
                                                 </td>
                                                 <td><input type="file" name="<?php echo $category; ?>_mhada_upload_doc_gom"  class="form-control" id="<?php echo $category; ?>_mhada_upload_doc"/></td>

                                                 <td>-</td>
                                                 <td><input readonly type="text" class="form-control" id="<?php echo strtolower($category); ?>_utilization" name="gom_financial_details[<?php echo $category; ?>][utilization]"></td>


                                                 <td>-</td>

                                                 <td><textarea class="form-control" name="gom_financial_details[<?php echo $category; ?>][remark]" id="<?php echo $category; ?>_remark"></textarea></td>


                                             </tr>
                                                            <?php
                                         }
                                         ?>
                                                            <tr>
                                                                <td>
                                                                    <h5>Total Amount</h5>
                                                                </td>
                                                                <td><input readonly class="form-control" type="text"
                                                                           name="gom_financial_details[total_gom_amount]" id="gom_total_gom_amount" value="0" /></td>


                                                                <td> - </td>
                                                                <td> - </td>
                                                                <td> - </td>

                                                                <td><input readonly class="form-control" type="text"
                                                                           name="gom_financial_details[total_mhada_received_amount]" id="gom_total_mhada_received_amount" value="0" /></td>


                                                                <td>-</td>
                                                                <td><input readonly class="form-control" type="text"
                                                                           name="gom_financial_details[total_mhada_released_amount]" id="gom_total_mhada_released_amount" value="0" /></td>

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
                                                                        <?php echo $category; 
                                                                            $category = strtolower($category);
                                                                        ?>
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
                                                                    <?php  ?>
                                                                </td>
                                                                <td> <?php echo isset($goi_details[0][$category.'_remark'])?$goi_details[0][$category.'_remark']:null;   ?>
                                                                </td>

                                                                <td>
                                                                    <h5>
                                                                        <?php
                                                                        $category = strtoupper($category);
                                                                         echo $category;
                                                                         $category = strtolower($category);   
                                                                          ?>
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
                                                                    <?php  ?>
                                                                </td>
                                                                <td>  <?php echo isset($goi_details[1][$category.'_remark'])?$goi_details[1][$category.'_remark']:null;   ?>
                                                                </td>


                                                                <td>
                                                                    <h5>
                                                                        <?php
                                                                        $category = strtoupper($category);
                                                                         echo $category;
                                                                         $category = strtolower($category);
                                                                          ?>
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
                                                                    <?php  ?>
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
                                                                    <?php  ?>
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
                                                                    <?php  ?>
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
                                                                    <?php  ?>
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
                    url: "Projects/get_financial_details_data",
                    data: {'nodel_agency': nodel_agency, 'installment': installment , 'project_id': $('#project_id').val() },
                    dataType: "html",
                    success: function(data){
                        console.log(data);
                        var data = JSON.parse(data);

                        if ($.trim(data)) {
                            if (data[0].nodel_agency == 1) {

                                $('#update_form_of_goi_fund #SC_goi_total_amount').val(data[0].sc_amount);
                                $('#update_form_of_goi_fund #ST_goi_total_amount').val(data[0].st_amount);
                                $('#update_form_of_goi_fund #OBC_goi_total_amount').val(data[0].obc_amount);
                                $('#update_form_of_goi_fund #OTHER_goi_total_amount').val(data[0].other_amount);

                                $('#update_form_of_goi_fund #SC_goi_order_no').val(data[0].sc_goi_order_no);
                                $('#update_form_of_goi_fund #SC_goi_order_date').val(data[0].sc_goi_order_date);
                                $('#update_form_of_goi_fund #ST_goi_order_no').val(data[0].st_goi_order_no);
                                $('#update_form_of_goi_fund #ST_goi_order_date').val(data[0].st_goi_order_date);
                                $('#update_form_of_goi_fund #OBC_goi_order_no').val(data[0].obc_goi_order_no);
                                $('#update_form_of_goi_fund #OBC_goi_order_date').val(data[0].obc_goi_order_date);
                                $('#update_form_of_goi_fund #OTHER_goi_order_no').val(data[0].other_goi_order_no);
                                $('#update_form_of_goi_fund #OHTER_goi_order_date').val(data[0].other_goi_order_date);

                                $('#update_form_of_goi_fund #SC_gom_amount').val(data[0].sc_gom_amount);
                                $('#update_form_of_goi_fund #ST_gom_amount').val(data[0].st_gom_amount);
                                $('#update_form_of_goi_fund #OBC_gom_amount').val(data[0].obc_gom_amount);
                                $('#update_form_of_goi_fund #OTHER_gom_amount').val(data[0].other_gom_amount);


                                $('#update_form_of_goi_fund #SC_gom_order_no').val(data[0].sc_gom_order_no);
                                $('#update_form_of_goi_fund #SC_gom_order_date').val(data[0].sc_gom_order_date);
                                $('#update_form_of_goi_fund #ST_gom_order_no').val(data[0].st_gom_order_no);
                                $('#update_form_of_goi_fund #ST_gom_order_date').val(data[0].st_gom_order_date);
                                $('#update_form_of_goi_fund #OBC_gom_order_no').val(data[0].obc_gom_order_no);
                                $('#update_form_of_goi_fund #OBC_gom_order_date').val(data[0].obc_gom_order_date);
                                $('#update_form_of_goi_fund #OTHER_gom_order_no').val(data[0].other_gom_order_no);
                                $('#update_form_of_goi_fund #OTHER_gom_order_date').val(data[0].other_gom_order_date);

                                $('#update_form_of_goi_fund #SC_mhada_received_amount').val(data[0].sc_mhada_received_amount);
                                $('#update_form_of_goi_fund #SC_mhada_received_date').val(data[0].sc_mhada_received_date);
                                $('#update_form_of_goi_fund #SC_mhada_released_amount').val(data[0].sc_mhada_released_amount);
                                $('#update_form_of_goi_fund #SC_mhada_released_no').val(data[0].sc_mhada_order_no);
                                $('#update_form_of_goi_fund #SC_mhada_released_date').val(data[0].sc_mhada_order_date);

                                $('#update_form_of_goi_fund #ST_mhada_received_amount').val(data[0].st_mhada_received_amount);
                                $('#update_form_of_goi_fund #ST_mhada_received_date').val(data[0].st_mhada_received_date);
                                $('#update_form_of_goi_fund #ST_mhada_released_amount').val(data[0].st_mhada_released_amount);
                                $('#update_form_of_goi_fund #ST_mhada_released_no').val(data[0].st_mhada_order_no);
                                $('#update_form_of_goi_fund #ST_mhada_released_date').val(data[0].st_mhada_order_date);

                                $('#update_form_of_goi_fund #OBC_mhada_received_amount').val(data[0].obc_mhada_received_amount);
                                $('#update_form_of_goi_fund #OBC_mhada_received_date').val(data[0].obc_mhada_received_date);
                                $('#update_form_of_goi_fund #OBC_mhada_released_amount').val(data[0].obc_mhada_released_amount);
                                $('#update_form_of_goi_fund #OBC_mhada_released_no').val(data[0].obc_mhada_order_no);
                                $('#update_form_of_goi_fund #OBC_mhada_released_date').val(data[0].obc_mhada_order_date);

                                $('#update_form_of_goi_fund #OTHER_mhada_received_amount').val(data[0].other_mhada_received_amount);
                                $('#update_form_of_goi_fund #OTHER_mhada_received_date').val(data[0].other_mhada_received_date);
                                $('#update_form_of_goi_fund #OTHER_mhada_released_amount').val(data[0].other_mhada_released_amount);
                                $('#update_form_of_goi_fund #OTHER_mhada_released_no').val(data[0].other_mhada_order_no);
                                $('#update_form_of_goi_fund #OTHER_mhada_released_date').val(data[0].other_mhada_order_date);

                                $('#update_form_of_goi_fund #SC_remark').val(data[0].sc_remark);
                                $('#update_form_of_goi_fund #ST_remark').val(data[0].st_remark);
                                $('#update_form_of_goi_fund #OBC_remark').val(data[0].obc_remark);
                                $('#update_form_of_goi_fund #OTHER_remark').val(data[0].other_remark);


                                $('#update_form_of_goi_fund #total_amount').val(data[0].total_amount);
                                $('#update_form_of_goi_fund #total_gom_amount').val(data[0].total_gom_amount);
                                $('#update_form_of_goi_fund #total_mhada_received_amount').val(data[0].total_mhada_received_amount);
                                $('#update_form_of_goi_fund #total_mhada_released_amount').val(data[0].total_mhada_released_amount);
                            }
                            else if (data[0].nodel_agency == 2) {

                                $('#update_form_of_gom_fund #SC_gom_amount').val(data[0].sc_gom_amount);
                                $('#update_form_of_gom_fund #ST_gom_amount').val(data[0].st_gom_amount);
                                $('#update_form_of_gom_fund #OBC_gom_amount').val(data[0].obc_gom_amount);
                                $('#update_form_of_gom_fund #OTHER_gom_amount').val(data[0].other_gom_amount);


                                $('#update_form_of_gom_fund #SC_gom_order_no').val(data[0].sc_gom_order_no);
                                $('#update_form_of_gom_fund #SC_gom_order_date').val(data[0].sc_gom_order_date);
                                $('#update_form_of_gom_fund #ST_gom_order_no').val(data[0].st_gom_order_no);
                                $('#update_form_of_gom_fund #ST_gom_order_date').val(data[0].st_gom_order_date);
                                $('#update_form_of_gom_fund #OBC_gom_order_no').val(data[0].obc_gom_order_no);
                                $('#update_form_of_gom_fund #OBC_gom_order_date').val(data[0].obc_gom_order_date);
                                $('#update_form_of_gom_fund #OTHER_gom_order_no').val(data[0].other_gom_order_no);
                                $('#update_form_of_gom_fund #OTHER_gom_order_date').val(data[0].other_gom_order_date);

                                $('#update_form_of_gom_fund #SC_mhada_received_amount').val(data[0].sc_mhada_received_amount);
                                $('#update_form_of_gom_fund #SC_mhada_received_date').val(data[0].sc_mhada_received_date);
                                $('#update_form_of_gom_fund #SC_mhada_released_amount').val(data[0].sc_mhada_released_amount);
                                $('#update_form_of_gom_fund #SC_mhada_released_no').val(data[0].sc_mhada_order_no);
                                $('#update_form_of_gom_fund #SC_mhada_released_date').val(data[0].sc_mhada_order_date);

                                $('#update_form_of_gom_fund #ST_mhada_received_amount').val(data[0].st_mhada_received_amount);
                                $('#update_form_of_gom_fund #ST_mhada_received_date').val(data[0].st_mhada_received_date);
                                $('#update_form_of_gom_fund #ST_mhada_released_amount').val(data[0].st_mhada_released_amount);
                                $('#update_form_of_gom_fund #ST_mhada_released_no').val(data[0].st_mhada_order_no);
                                $('#update_form_of_gom_fund #ST_mhada_released_date').val(data[0].st_mhada_order_date);

                                $('#update_form_of_gom_fund #OBC_mhada_received_amount').val(data[0].obc_mhada_received_amount);
                                $('#update_form_of_gom_fund #OBC_mhada_received_date').val(data[0].obc_mhada_received_date);
                                $('#update_form_of_gom_fund #OBC_mhada_released_amount').val(data[0].obc_mhada_released_amount);
                                $('#update_form_of_gom_fund #OBC_mhada_released_no').val(data[0].obc_mhada_order_no);
                                $('#update_form_of_gom_fund #OBC_mhada_released_date').val(data[0].obc_mhada_order_date);

                                $('#update_form_of_gom_fund #OTHER_mhada_received_amount').val(data[0].other_mhada_received_amount);
                                $('#update_form_of_gom_fund #OTHER_mhada_received_date').val(data[0].other_mhada_received_date);
                                $('#update_form_of_gom_fund #OTHER_mhada_released_amount').val(data[0].other_mhada_released_amount);
                                $('#update_form_of_gom_fund #OTHER_mhada_released_no').val(data[0].other_mhada_order_no);
                                $('#update_form_of_gom_fund #OTHER_mhada_released_date').val(data[0].other_mhada_order_date);

                                $('#update_form_of_gom_fund #SC_remark').val(data[0].sc_remark);
                                $('#update_form_of_gom_fund #ST_remark').val(data[0].st_remark);
                                $('#update_form_of_gom_fund #OBC_remark').val(data[0].obc_remark);
                                $('#update_form_of_gom_fund #OTHER_remark').val(data[0].other_remark);

                                $('#update_form_of_gom_fund #total_amount').val(data[0].total_amount);
                                $('#update_form_of_gom_fund #total_gom_amount').val(data[0].total_gom_amount);
                                $('#update_form_of_gom_fund #total_mhada_received_amount').val(data[0].total_mhada_received_amount);
                                $('#update_form_of_gom_fund #total_mhada_released_amount').val(data[0].total_mhada_released_amount);
                            }

                            $('#save_note').val('');
                        }
                        else
                        {
                            if (nodel_agency == 1) {

                                $('#update_form_of_goi_fund #SC_goi_amount').val('');
                                $('#update_form_of_goi_fund #ST_goi_amount').val('');
                                $('#update_form_of_goi_fund #OBC_goi_amount').val('');
                                $('#update_form_of_goi_fund #OTHER_goi_amount').val('');

                                $('#update_form_of_goi_fund #SC_goi_order_no').val('');
                                $('#update_form_of_goi_fund #SC_goi_order_date').val('');
                                $('#update_form_of_goi_fund #ST_goi_order_no').val('');
                                $('#update_form_of_goi_fund #ST_goi_order_date').val('');
                                $('#update_form_of_goi_fund #OBC_goi_order_no').val('');
                                $('#update_form_of_goi_fund #OBC_goi_order_date').val('');
                                $('#update_form_of_goi_fund #OTHER_goi_order_no').val('');
                                $('#update_form_of_goi_fund #other_goi_order_date').val('');

                                $('#update_form_of_goi_fund #SC_goi_upload_doc').val('');
                                 $('#update_form_of_goi_fund #ST_goi_upload_doc').val('');
                                 $('#update_form_of_goi_fund #OBC_goi_upload_doc').val('');
                                 $('#update_form_of_goi_fund #OTHER_goi_upload_doc').val('');

                                $('#update_form_of_goi_fund #SC_gom_amount').val('');
                                $('#update_form_of_goi_fund #ST_gom_amount').val('');
                                $('#update_form_of_goi_fund #OBC_gom_amount').val('');
                                $('#update_form_of_goi_fund #OTHER_gom_amount').val('');


                                $('#update_form_of_goi_fund #SC_gom_order_no').val('');
                                $('#update_form_of_goi_fund #SC_gom_order_date').val('');
                                $('#update_form_of_goi_fund #ST_gom_order_no').val('');
                                $('#update_form_of_goi_fund #ST_gom_order_date').val('');
                                $('#update_form_of_goi_fund #OBC_gom_order_no').val('');
                                $('#update_form_of_goi_fund #OBC_gom_order_date').val('');
                                $('#update_form_of_goi_fund #OTHER_gom_order_no').val('');
                                $('#update_form_of_goi_fund #OTHER_gom_order_date').val('');

                                $('#update_form_of_goi_fund #SC_gom_upload_doc').val('');
                                 $('#update_form_of_goi_fund #ST_gom_upload_doc').val('');
                                 $('#update_form_of_goi_fund #OBC_gom_upload_doc').val('');
                                $('#update_form_of_goi_fund #OTHER_gom_upload_doc').val('');

                                $('#update_form_of_goi_fund #SC_mhada_received_amount').val('');
                                $('#update_form_of_goi_fund #SC_mhada_received_date').val('');
                                $('#update_form_of_goi_fund #SC_mhada_released_amount').val('');
                                $('#update_form_of_goi_fund #SC_mhada_released_no').val('');
                                $('#update_form_of_goi_fund #SC_mhada_released_date').val('');

                                $('#update_form_of_goi_fund #ST_mhada_received_amount').val('');
                                $('#update_form_of_goi_fund #ST_mhada_received_date').val('');
                                $('#update_form_of_goi_fund #ST_mhada_released_amount').val('');
                                $('#update_form_of_goi_fund #ST_mhada_released_no').val('');
                                $('#update_form_of_goi_fund #ST_mhada_released_date').val('');

                                $('#update_form_of_goi_fund #OBC_mhada_received_amount').val('');
                                $('#update_form_of_goi_fund #OBC_mhada_received_date').val('');
                                $('#update_form_of_goi_fund #OBC_mhada_released_amount').val('');
                                $('#update_form_of_goi_fund #OBC_mhada_released_no').val('');
                                $('#update_form_of_goi_fund #OBC_mhada_released_date').val('');

                                $('#update_form_of_goi_fund #OTHER_mhada_received_amount').val('');
                                $('#update_form_of_goi_fund #OTHER_mhada_received_date').val('');
                                $('#update_form_of_goi_fund #OTHER_mhada_released_amount').val('');
                                $('#update_form_of_goi_fund #OTHER_mhada_released_no').val('');
                                $('#update_form_of_goi_fund #OTHER_mhada_released_date').val('');

                                $('#update_form_of_goi_fund #SC_mhada_upload_doc').val('');
                                 $('#update_form_of_goi_fund #ST_mhada_upload_doc').val('');
                                $('#update_form_of_goi_fund #OBC_mhada_upload_doc').val('');
                                 $('#update_form_of_goi_fund #OTHER_mhada_upload_doc').val('');

                                $('#update_form_of_goi_fund #SC_remark').val('');
                                $('#update_form_of_goi_fund #ST_remark').val('');
                                $('#update_form_of_goi_fund #OBC_remark').val('');
                                $('#update_form_of_goi_fund #OTHER_remark').val('');


                                $('#update_form_of_goi_fund #total_amount').val('');
                                $('#update_form_of_goi_fund #total_gom_amount').val('');
                                $('#update_form_of_goi_fund #total_mhada_received_amount').val('');
                                $('#update_form_of_goi_fund #total_mhada_released_amount').val('');
                                $('#update_form_of_goi_fund #total_utilization_amount').attr('value', 0);



                            }
                            else if (nodel_agency == 2) {


                                $('#update_form_of_gom_fund #SC_goi_amount').val('');
                                $('#update_form_of_gom_fund #ST_goi_amount').val('');
                                $('#update_form_of_gom_fund #OBC_goi_amount').val('');
                                $('#update_form_of_gom_fund #OTHER_goi_amount').val('');

                                $('#update_form_of_gom_fund #SC_goi_order_no').val('');
                                $('#update_form_of_gom_fund #SC_goi_order_date').val('');
                                $('#update_form_of_gom_fund #ST_goi_order_no').val('');
                                $('#update_form_of_gom_fund #ST_goi_order_date').val('');
                                $('#update_form_of_gom_fund #OBC_goi_order_no').val('');
                                $('#update_form_of_gom_fund #OBC_goi_order_date').val('');
                                $('#update_form_of_gom_fund #OTHER_goi_order_no').val('');
                                $('#update_form_of_gom_fund #OTHER_goi_order_date').val('');

                                $('#update_form_of_gom_fund #SC_goi_upload_doc').val('');
                                $('#update_form_of_gom_fund #ST_goi_upload_doc').val('');
                                $('#update_form_of_gom_fund #OBC_goi_upload_doc').val('');
                                $('#update_form_of_gom_fund #OTHER_goi_upload_doc').val('');

                                $('#update_form_of_gom_fund #SC_gom_amount').val('');
                                $('#update_form_of_gom_fund #ST_gom_amount').val('');
                                $('#update_form_of_gom_fund #OBC_gom_amount').val('');
                                $('#update_form_of_gom_fund #OTHER_gom_amount').val('');


                                $('#update_form_of_gom_fund #SC_gom_order_no').val('');
                                $('#update_form_of_gom_fund #SC_gom_order_date').val('');
                                $('#update_form_of_gom_fund #ST_gom_order_no').val('');
                                $('#update_form_of_gom_fund #ST_gom_order_date').val('');
                                $('#update_form_of_gom_fund #OBC_gom_order_no').val('');
                                $('#update_form_of_gom_fund #OBC_gom_order_date').val('');
                                $('#update_form_of_gom_fund #OTHER_gom_order_no').val('');
                                $('#update_form_of_gom_fund #OTHER_gom_order_date').val('');

                                $('#update_form_of_gom_fund #SC_gom_upload_doc').val('');
                                $('#update_form_of_gom_fund #ST_gom_upload_doc').val('');
                                $('#update_form_of_gom_fund #OBC_gom_upload_doc').val('');
                                $('#update_form_of_gom_fund #OTHER_gom_upload_doc').val('');

                                $('#update_form_of_gom_fund #SC_mhada_received_amount').val('');
                                $('#update_form_of_gom_fund #SC_mhada_received_date').val('');
                                $('#update_form_of_gom_fund #SC_mhada_released_amount').val('');
                                $('#update_form_of_gom_fund #SC_mhada_released_no').val('');
                                $('#update_form_of_gom_fund #SC_mhada_released_date').val('');

                                $('#update_form_of_gom_fund #ST_mhada_received_amount').val('');
                                $('#update_form_of_gom_fund #ST_mhada_received_date').val('');
                                $('#update_form_of_gom_fund #ST_mhada_released_amount').val('');
                                $('#update_form_of_gom_fund #ST_mhada_released_no').val('');
                                $('#update_form_of_gom_fund #ST_mhada_released_date').val('');

                                $('#update_form_of_gom_fund #OBC_mhada_received_amount').val('');
                                $('#update_form_of_gom_fund #OBC_mhada_received_date').val('');
                                $('#update_form_of_gom_fund #OBC_mhada_released_amount').val('');
                                $('#update_form_of_gom_fund #OBC_mhada_released_no').val('');
                                $('#update_form_of_gom_fund #OBC_mhada_released_date').val('');

                                $('#update_form_of_gom_fund #OTHER_mhada_received_amount').val('');
                                $('#update_form_of_gom_fund #OTHER_mhada_received_date').val('');
                                $('#update_form_of_gom_fund #OTHER_mhada_released_amount').val('');
                                $('#update_form_of_gom_fund #OTHER_mhada_released_no').val('');
                                $('#update_form_of_gom_fund #OTHER_mhada_released_date').val('');

                                $('#update_form_of_gom_fund #SC_mhada_upload_doc').val('');
                                $('#update_form_of_gom_fund #ST_mhada_upload_doc').val('');
                                $('#update_form_of_gom_fund #OBC_mhada_upload_doc').val('');
                                $('#update_form_of_gom_fund #OTHER_mhada_upload_doc').val('');

                                $('#update_form_of_gom_fund #SC_remark').val('');
                                $('#update_form_of_gom_fund #ST_remark').val('');
                                $('#update_form_of_gom_fund #OBC_remark').val('');
                                $('#update_form_of_gom_fund #OTHER_remark').val('');


                                $('#update_form_of_gom_fund #total_amount').val('');
                                $('#update_form_of_gom_fund #total_gom_amount').val('');
                                $('#update_form_of_gom_fund #total_mhada_received_amount').val('');
                                $('#update_form_of_gom_fund #total_mhada_released_amount').html('');
                                $('#update_form_of_gom_fund #gom_total_utilization_amount').attr('value', 0);


                            }
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
                    url: "Projects/get_financial_details_data",
                    data: {'nodel_agency': nodel_agency, 'installment': installment , 'project_id': $('#project_id').val() },
                    dataType: "html",
                    success: function(data){
                        console.log(data);

                        var data = JSON.parse(data);

                        if ($.trim(data)) {
                            if (data[0].nodel_agency == 1) {

                                $('#update_form_of_goi_fund #SC_goi_total_amount').val(data[0].sc_amount);
                                $('#update_form_of_goi_fund #ST_goi_total_amount').val(data[0].st_amount);
                                $('#update_form_of_goi_fund #OBC_goi_total_amount').val(data[0].obc_amount);
                                $('#update_form_of_goi_fund #OTHER_goi_total_amount').val(data[0].other_amount);

                                $('#update_form_of_goi_fund #SC_goi_order_no').val(data[0].sc_goi_order_no);
                                $('#update_form_of_goi_fund #SC_goi_order_date').val(data[0].sc_goi_order_date);
                                $('#update_form_of_goi_fund #ST_goi_order_no').val(data[0].st_goi_order_no);
                                $('#update_form_of_goi_fund #ST_goi_order_date').val(data[0].st_goi_order_date);
                                $('#update_form_of_goi_fund #OBC_goi_order_no').val(data[0].obc_goi_order_no);
                                $('#update_form_of_goi_fund #OBC_goi_order_date').val(data[0].obc_goi_order_date);
                                $('#update_form_of_goi_fund #OTHER_goi_order_no').val(data[0].other_goi_order_no);
                                $('#update_form_of_goi_fund #OHTER_goi_order_date').val(data[0].other_goi_order_date);

                                $('#update_form_of_goi_fund #SC_gom_amount').val(data[0].sc_gom_amount);
                                $('#update_form_of_goi_fund #ST_gom_amount').val(data[0].st_gom_amount);
                                $('#update_form_of_goi_fund #OBC_gom_amount').val(data[0].obc_gom_amount);
                                $('#update_form_of_goi_fund #OTHER_gom_amount').val(data[0].other_gom_amount);


                                $('#update_form_of_goi_fund #SC_gom_order_no').val(data[0].sc_gom_order_no);
                                $('#update_form_of_goi_fund #SC_gom_order_date').val(data[0].sc_gom_order_date);
                                $('#update_form_of_goi_fund #ST_gom_order_no').val(data[0].st_gom_order_no);
                                $('#update_form_of_goi_fund #ST_gom_order_date').val(data[0].st_gom_order_date);
                                $('#update_form_of_goi_fund #OBC_gom_order_no').val(data[0].obc_gom_order_no);
                                $('#update_form_of_goi_fund #OBC_gom_order_date').val(data[0].obc_gom_order_date);
                                $('#update_form_of_goi_fund #OTHER_gom_order_no').val(data[0].other_gom_order_no);
                                $('#update_form_of_goi_fund #OTHER_gom_order_date').val(data[0].other_gom_order_date);

                                $('#update_form_of_goi_fund #SC_mhada_received_amount').val(data[0].sc_mhada_received_amount);
                                $('#update_form_of_goi_fund #SC_mhada_received_date').val(data[0].sc_mhada_received_date);
                                $('#update_form_of_goi_fund #SC_mhada_released_amount').val(data[0].sc_mhada_released_amount);
                                $('#update_form_of_goi_fund #SC_mhada_released_no').val(data[0].sc_mhada_order_no);
                                $('#update_form_of_goi_fund #SC_mhada_released_date').val(data[0].sc_mhada_order_date);

                                $('#update_form_of_goi_fund #ST_mhada_received_amount').val(data[0].st_mhada_received_amount);
                                $('#update_form_of_goi_fund #ST_mhada_received_date').val(data[0].st_mhada_received_date);
                                $('#update_form_of_goi_fund #ST_mhada_released_amount').val(data[0].st_mhada_released_amount);
                                $('#update_form_of_goi_fund #ST_mhada_released_no').val(data[0].st_mhada_order_no);
                                $('#update_form_of_goi_fund #ST_mhada_released_date').val(data[0].st_mhada_order_date);

                                $('#update_form_of_goi_fund #OBC_mhada_received_amount').val(data[0].obc_mhada_received_amount);
                                $('#update_form_of_goi_fund #OBC_mhada_received_date').val(data[0].obc_mhada_received_date);
                                $('#update_form_of_goi_fund #OBC_mhada_released_amount').val(data[0].obc_mhada_released_amount);
                                $('#update_form_of_goi_fund #OBC_mhada_released_no').val(data[0].obc_mhada_order_no);
                                $('#update_form_of_goi_fund #OBC_mhada_released_date').val(data[0].obc_mhada_order_date);

                                $('#update_form_of_goi_fund #OTHER_mhada_received_amount').val(data[0].other_mhada_received_amount);
                                $('#update_form_of_goi_fund #OTHER_mhada_received_date').val(data[0].other_mhada_received_date);
                                $('#update_form_of_goi_fund #OTHER_mhada_released_amount').val(data[0].other_mhada_released_amount);
                                $('#update_form_of_goi_fund #OTHER_mhada_released_no').val(data[0].other_mhada_order_no);
                                $('#update_form_of_goi_fund #OTHER_mhada_released_date').val(data[0].other_mhada_order_date);

                                /*$('#update_form_of_goi_fund #OTHER_remark').val(data[0].sc_remark);*/
                                $('#update_form_of_goi_fund #ST_remark').val(data[0].st_remark);
                                $('#update_form_of_goi_fund #OBC_remark').val(data[0].obc_remark);
                                $('#update_form_of_goi_fund #SC_remark').val(data[0].other_remark);

                                $('#update_form_of_goi_fund #total_amount').val(data[0].total_amount);  //displaying total amount
                                $('#update_form_of_goi_fund #total_gom_amount').val(data[0].total_gom_amount);
                                $('#update_form_of_goi_fund #total_mhada_received_amount').val(data[0].total_mhada_received_amount);
                                $('#update_form_of_goi_fund #total_mhada_released_amount').val(data[0].total_mhada_released_amount);


                                $('#update_form_of_goi_fund #sc_utilization_certificate').val(data[0].sc_utilization_certificate);
                                $('#update_form_of_goi_fund #st_utilization_certificate').val(data[0].st_utilization_certificate);
                                $('#update_form_of_goi_fund #obc_utilization_certificate').val(data[0].obc_utilization_certificate);

                                $('#update_form_of_goi_fund #goi_SC_transactions').val(data[0].sc_transactions);
                                $('#update_form_of_goi_fund #goi_ST_transactions').val(data[0].st_transactions);
                                $('#update_form_of_goi_fund #goi_OBC_transactions').val(data[0].obc_transactions);
                                $('#update_form_of_goi_fund #goi_OTHER_transactions').val(data[0].other_transactions);

                                $('#update_form_of_goi_fund #goi_SC_utilization_amount').val(data[0].sc_utilization_amount);
                                $('#update_form_of_goi_fund #goi_ST_utilization_amount').val(data[0].st_utilization_amount);
                                $('#update_form_of_goi_fund #goi_OBC_utilization_amount').val(data[0].obc_utilization_amount);
                                $('#update_form_of_goi_fund #goi_OTHER_utilization_amount').val(data[0]. other_utilization_amount);

                            }
                            else if (data[0].nodel_agency == 2) {

                                $('#update_form_of_gom_fund #SC_gom_amount').val(data[0].sc_gom_amount);
                                $('#update_form_of_gom_fund #ST_gom_amount').val(data[0].st_gom_amount);
                                $('#update_form_of_gom_fund #OBC_gom_amount').val(data[0].obc_gom_amount);
                                $('#update_form_of_gom_fund #OTHER_gom_amount').val(data[0].other_gom_amount);


                                $('#update_form_of_gom_fund #SC_gom_order_no').val(data[0].sc_gom_order_no);
                                $('#update_form_of_gom_fund #SC_gom_order_date').val(data[0].sc_gom_order_date);
                                $('#update_form_of_gom_fund #ST_gom_order_no').val(data[0].st_gom_order_no);
                                $('#update_form_of_gom_fund #ST_gom_order_date').val(data[0].st_gom_order_date);
                                $('#update_form_of_gom_fund #OBC_gom_order_no').val(data[0].obc_gom_order_no);
                                $('#update_form_of_gom_fund #OBC_gom_order_date').val(data[0].obc_gom_order_date);
                                $('#update_form_of_gom_fund #OTHER_gom_order_no').val(data[0].other_gom_order_no);
                                $('#update_form_of_gom_fund #OTHER_gom_order_date').val(data[0].other_gom_order_date);

                                $('#update_form_of_gom_fund #SC_mhada_received_amount').val(data[0].sc_mhada_received_amount);
                                $('#update_form_of_gom_fund #SC_mhada_received_date').val(data[0].sc_mhada_received_date);
                                $('#update_form_of_gom_fund #SC_mhada_released_amount').val(data[0].sc_mhada_released_amount);
                                $('#update_form_of_gom_fund #SC_mhada_released_no').val(data[0].sc_mhada_order_no);
                                $('#update_form_of_gom_fund #SC_mhada_released_date').val(data[0].sc_mhada_order_date);

                                $('#update_form_of_gom_fund #ST_mhada_received_amount').val(data[0].st_mhada_received_amount);
                                $('#update_form_of_gom_fund #ST_mhada_received_date').val(data[0].st_mhada_received_date);
                                $('#update_form_of_gom_fund #ST_mhada_released_amount').val(data[0].st_mhada_released_amount);
                                $('#update_form_of_gom_fund #ST_mhada_released_no').val(data[0].st_mhada_order_no);
                                $('#update_form_of_gom_fund #ST_mhada_released_date').val(data[0].st_mhada_order_date);

                                $('#update_form_of_gom_fund #OBC_mhada_received_amount').val(data[0].obc_mhada_received_amount);
                                $('#update_form_of_gom_fund #OBC_mhada_received_date').val(data[0].obc_mhada_received_date);
                                $('#update_form_of_gom_fund #OBC_mhada_released_amount').val(data[0].obc_mhada_released_amount);
                                $('#update_form_of_gom_fund #OBC_mhada_released_no').val(data[0].obc_mhada_order_no);
                                $('#update_form_of_gom_fund #OBC_mhada_released_date').val(data[0].obc_mhada_order_date);

                                $('#update_form_of_gom_fund #OTHER_mhada_received_amount').val(data[0].other_mhada_received_amount);
                                $('#update_form_of_gom_fund #OTHER_mhada_received_date').val(data[0].other_mhada_received_date);
                                $('#update_form_of_gom_fund #OTHER_mhada_released_amount').val(data[0].other_mhada_released_amount);
                                $('#update_form_of_gom_fund #OTHER_mhada_released_no').val(data[0].other_mhada_order_no);
                                $('#update_form_of_gom_fund #OTHER_mhada_released_date').val(data[0].other_mhada_order_date);

                                $('#update_form_of_gom_fund #SC_remark').val(data[0].sc_remark);
                                $('#update_form_of_gom_fund #ST_remark').val(data[0].st_remark);
                                $('#update_form_of_gom_fund #OBC_remark').val(data[0].obc_remark);
                                $('#update_form_of_gom_fund #OTHER_remark').val(data[0].other_remark);

                                $('#update_form_of_gom_fund #total_amount').val(data[0].total_amount);
                            /*    $('#update_form_of_gom_fund #total_gom_amount').val(data[0].total_gom_amount);*/
                                $('#update_form_of_gom_fund #total_gom_amount').val(data[0].total_gom_amount);
                                $('#update_form_of_gom_fund #total_mhada_received_amount').val(data[0].total_mhada_received_amount);
                                $('#update_form_of_gom_fund #total_mhada_released_amount').val(data[0].total_mhada_released_amount);

                                $('#update_form_of_gom_fund #sc_utilization').val(data[0].sc_utilization_certificate);
                                $('#update_form_of_gom_fund #st_utilization').val(data[0].st_utilization_certificate);
                                $('#update_form_of_gom_fund #obc_utilization').val(data[0].obc_utilization_certificate);
                                $('#update_form_of_gom_fund #gom_total_gom_amount').val(data[0].total_gom_amount);

                            }

                            $('#save_note').val('');
                        }
                        else
                        {
                            if (nodel_agency == 1) {

                                $('#update_form_of_goi_fund #SC_goi_amount').val('');
                                $('#update_form_of_goi_fund #ST_goi_amount').val('');
                                $('#update_form_of_goi_fund #OBC_goi_amount').val('');
                                $('#update_form_of_goi_fund #OTHER_goi_amount').val('');

                                $('#update_form_of_goi_fund #SC_goi_order_no').val('');
                                $('#update_form_of_goi_fund #SC_goi_order_date').val('');
                                $('#update_form_of_goi_fund #ST_goi_order_no').val('');
                                $('#update_form_of_goi_fund #ST_goi_order_date').val('');
                                $('#update_form_of_goi_fund #OBC_goi_order_no').val('');
                                $('#update_form_of_goi_fund #OBC_goi_order_date').val('');
                                $('#update_form_of_goi_fund #OTHER_goi_order_no').val('');
                                $('#update_form_of_goi_fund #other_goi_order_date').val('');

                                $('#update_form_of_goi_fund #SC_goi_upload_doc').val('');
                                 $('#update_form_of_goi_fund #ST_goi_upload_doc').val('');
                                 $('#update_form_of_goi_fund #OBC_goi_upload_doc').val('');
                                 $('#update_form_of_goi_fund #OTHER_goi_upload_doc').val('');

                                $('#update_form_of_goi_fund #SC_gom_amount').val('');
                                $('#update_form_of_goi_fund #ST_gom_amount').val('');
                                $('#update_form_of_goi_fund #OBC_gom_amount').val('');
                                $('#update_form_of_goi_fund #OTHER_gom_amount').val('');


                                $('#update_form_of_goi_fund #SC_gom_order_no').val('');
                                $('#update_form_of_goi_fund #SC_gom_order_date').val('');
                                $('#update_form_of_goi_fund #ST_gom_order_no').val('');
                                $('#update_form_of_goi_fund #ST_gom_order_date').val('');
                                $('#update_form_of_goi_fund #OBC_gom_order_no').val('');
                                $('#update_form_of_goi_fund #OBC_gom_order_date').val('');
                                $('#update_form_of_goi_fund #OTHER_gom_order_no').val('');
                                $('#update_form_of_goi_fund #OTHER_gom_order_date').val('');

                                $('#update_form_of_goi_fund #SC_gom_upload_doc').val('');
                                 $('#update_form_of_goi_fund #ST_gom_upload_doc').val('');
                                 $('#update_form_of_goi_fund #OBC_gom_upload_doc').val('');
                                $('#update_form_of_goi_fund #OTHER_gom_upload_doc').val('');

                                $('#update_form_of_goi_fund #SC_mhada_received_amount').val('');
                                $('#update_form_of_goi_fund #SC_mhada_received_date').val('');
                                $('#update_form_of_goi_fund #SC_mhada_released_amount').val('');
                                $('#update_form_of_goi_fund #SC_mhada_released_no').val('');
                                $('#update_form_of_goi_fund #SC_mhada_released_date').val('');

                                $('#update_form_of_goi_fund #ST_mhada_received_amount').val('');
                                $('#update_form_of_goi_fund #ST_mhada_received_date').val('');
                                $('#update_form_of_goi_fund #ST_mhada_released_amount').val('');
                                $('#update_form_of_goi_fund #ST_mhada_released_no').val('');
                                $('#update_form_of_goi_fund #ST_mhada_released_date').val('');

                                $('#update_form_of_goi_fund #OBC_mhada_received_amount').val('');
                                $('#update_form_of_goi_fund #OBC_mhada_received_date').val('');
                                $('#update_form_of_goi_fund #OBC_mhada_released_amount').val('');
                                $('#update_form_of_goi_fund #OBC_mhada_released_no').val('');
                                $('#update_form_of_goi_fund #OBC_mhada_released_date').val('');

                                $('#update_form_of_goi_fund #OTHER_mhada_received_amount').val('');
                                $('#update_form_of_goi_fund #OTHER_mhada_received_date').val('');
                                $('#update_form_of_goi_fund #OTHER_mhada_released_amount').val('');
                                $('#update_form_of_goi_fund #OTHER_mhada_released_no').val('');
                                $('#update_form_of_goi_fund #OTHER_mhada_released_date').val('');

                                $('#update_form_of_goi_fund #SC_mhada_upload_doc').val('');
                                 $('#update_form_of_goi_fund #ST_mhada_upload_doc').val('');
                                $('#update_form_of_goi_fund #OBC_mhada_upload_doc').val('');
                                 $('#update_form_of_goi_fund #OTHER_mhada_upload_doc').val('');

                                $('#update_form_of_goi_fund #SC_remark').val('');
                                $('#update_form_of_goi_fund #ST_remark').val('');
                                $('#update_form_of_goi_fund #OBC_remark').val('');
                                $('#update_form_of_goi_fund #OTHER_remark').val('');


                                $('#update_form_of_goi_fund #total_amount').val('');
                                $('#update_form_of_goi_fund #total_gom_amount').val('');
                                $('#update_form_of_goi_fund #total_mhada_received_amount').val('');
                                $('#update_form_of_goi_fund #total_mhada_released_amount').val('');
                                $('#update_form_of_goi_fund #total_utilization_amount').attr('value', 0);

                            }
                            else if (nodel_agency == 2) {


                                $('#update_form_of_gom_fund #SC_goi_amount').val('');
                                $('#update_form_of_gom_fund #ST_goi_amount').val('');
                                $('#update_form_of_gom_fund #OBC_goi_amount').val('');
                                $('#update_form_of_gom_fund #OTHER_goi_amount').val('');

                                $('#update_form_of_gom_fund #SC_goi_order_no').val('');
                                $('#update_form_of_gom_fund #SC_goi_order_date').val('');
                                $('#update_form_of_gom_fund #ST_goi_order_no').val('');
                                $('#update_form_of_gom_fund #ST_goi_order_date').val('');
                                $('#update_form_of_gom_fund #OBC_goi_order_no').val('');
                                $('#update_form_of_gom_fund #OBC_goi_order_date').val('');
                                $('#update_form_of_gom_fund #OTHER_goi_order_no').val('');
                                $('#update_form_of_gom_fund #OTHER_goi_order_date').val('');

                                $('#update_form_of_gom_fund #SC_goi_upload_doc').val('');
                                $('#update_form_of_gom_fund #ST_goi_upload_doc').val('');
                                $('#update_form_of_gom_fund #OBC_goi_upload_doc').val('');
                                $('#update_form_of_gom_fund #OTHER_goi_upload_doc').val('');

                                $('#update_form_of_gom_fund #SC_gom_amount').val('');
                                $('#update_form_of_gom_fund #ST_gom_amount').val('');
                                $('#update_form_of_gom_fund #OBC_gom_amount').val('');
                                $('#update_form_of_gom_fund #OTHER_gom_amount').val('');


                                $('#update_form_of_gom_fund #SC_gom_order_no').val('');
                                $('#update_form_of_gom_fund #SC_gom_order_date').val('');
                                $('#update_form_of_gom_fund #ST_gom_order_no').val('');
                                $('#update_form_of_gom_fund #ST_gom_order_date').val('');
                                $('#update_form_of_gom_fund #OBC_gom_order_no').val('');
                                $('#update_form_of_gom_fund #OBC_gom_order_date').val('');
                                $('#update_form_of_gom_fund #OTHER_gom_order_no').val('');
                                $('#update_form_of_gom_fund #OTHER_gom_order_date').val('');

                                $('#update_form_of_gom_fund #SC_gom_upload_doc').val('');
                                $('#update_form_of_gom_fund #ST_gom_upload_doc').val('');
                                $('#update_form_of_gom_fund #OBC_gom_upload_doc').val('');
                                $('#update_form_of_gom_fund #OTHER_gom_upload_doc').val('');

                                $('#update_form_of_gom_fund #SC_mhada_received_amount').val('');
                                $('#update_form_of_gom_fund #SC_mhada_received_date').val('');
                                $('#update_form_of_gom_fund #SC_mhada_released_amount').val('');
                                $('#update_form_of_gom_fund #SC_mhada_released_no').val('');
                                $('#update_form_of_gom_fund #SC_mhada_released_date').val('');

                                $('#update_form_of_gom_fund #ST_mhada_received_amount').val('');
                                $('#update_form_of_gom_fund #ST_mhada_received_date').val('');
                                $('#update_form_of_gom_fund #ST_mhada_released_amount').val('');
                                $('#update_form_of_gom_fund #ST_mhada_released_no').val('');
                                $('#update_form_of_gom_fund #ST_mhada_released_date').val('');

                                $('#update_form_of_gom_fund #OBC_mhada_received_amount').val('');
                                $('#update_form_of_gom_fund #OBC_mhada_received_date').val('');
                                $('#update_form_of_gom_fund #OBC_mhada_released_amount').val('');
                                $('#update_form_of_gom_fund #OBC_mhada_released_no').val('');
                                $('#update_form_of_gom_fund #OBC_mhada_released_date').val('');

                                $('#update_form_of_gom_fund #OTHER_mhada_received_amount').val('');
                                $('#update_form_of_gom_fund #OTHER_mhada_received_date').val('');
                                $('#update_form_of_gom_fund #OTHER_mhada_released_amount').val('');
                                $('#update_form_of_gom_fund #OTHER_mhada_released_no').val('');
                                $('#update_form_of_gom_fund #OTHER_mhada_released_date').val('');

                                $('#update_form_of_gom_fund #SC_mhada_upload_doc').val('');
                                $('#update_form_of_gom_fund #ST_mhada_upload_doc').val('');
                                $('#update_form_of_gom_fund #OBC_mhada_upload_doc').val('');
                                $('#update_form_of_gom_fund #OTHER_mhada_upload_doc').val('');

                                $('#update_form_of_gom_fund #SC_remark').val('');
                                $('#update_form_of_gom_fund #ST_remark').val('');
                                $('#update_form_of_gom_fund #OBC_remark').val('');
                                $('#update_form_of_gom_fund #OTHER_remark').val('');


                                $('#update_form_of_gom_fund #total_amount').val('');
                                $('#update_form_of_gom_fund #gom_total_gom_amount').val('');
                                $('#update_form_of_gom_fund #total_mhada_received_amount').val('');
                                $('#update_form_of_gom_fund #total_mhada_released_amount').html('');
                                $('#update_form_of_gom_fund #gom_total_utilization_amount').attr('value', 0);


                            }
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
            $('#total_amount').val(sum);
        });



        $(document).on("keyup", ".gom_total_gom_amount", function () {

            var sum = 0;
            $(".gom_total_gom_amount").each(function () {

                sum += parseInt($(this).val());
            });
            $('#gom_total_gom_amount').val(sum);
        });


        $(document).on("keyup", ".total_gom_amount", function () {
            var sum = 0;
            $(".total_gom_amount").each(function () {
                sum += parseInt($(this).val());
            });
            $('#total_gom_amount').val(sum);
        });

        $(document).on("keyup", ".total_mhada_received_amount", function () {

            var sum = 0;
            $(".total_mhada_received_amount").each(function () {
                sum += parseInt($(this).val());
            });

            $('#total_mhada_received_amount').attr('value', sum);

        });

        $(document).on("keyup", ".total_mhada_released_amount", function () {

            var sum = 0;
            $(".total_mhada_released_amount").each(function () {
                sum += parseInt($(this).val());
            });

            $('#total_mhada_released_amount').attr('value', sum);

        });

        $(document).on("keyup", ".gom_total_mhada_received_amount", function () {

            var sum = 0;
            $(".gom_total_mhada_received_amount").each(function () {
                sum += parseInt($(this).val());
            });

            $('#gom_total_mhada_received_amount').attr('value', sum);

        });

        $(document).on("keyup", ".gom_total_mhada_released_amount", function () {

            var sum = 0;
            $(".gom_total_mhada_released_amount").each(function () {
                sum += parseInt($(this).val());
            });

            $('#gom_total_mhada_released_amount').attr('value', sum);

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