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
                  <div class="bgc-white bdrs-3" style="overflow-x:auto;">
                     <!-- <h3 class="main-title">
                     <?php echo $survey_numer;?>
                     </h4>
                     <br> -->
                     <div class="">
                        <div class="">


                           <div class="">
                               <?php echo form_open('','class="class="m-form m-form--fit m-form--label-align-right" id="scheme_form"');?>

                               <div class="m-portlet__head">
                                 <div class="m-portlet__head-caption">
                                    <h3 class="main-title">
                                          Add Project
                                       <a href="<?php echo base_url('projects');?>" class="btn m-btn--pill btn-outline-dark float-right">Back</a>
                                    </h3>
                                 </div>
                              </div>
                             <div class="m-portlet__body" style="margin-top: -3%;">
<!--                                  <div class="row">
                                    <div class="col-lg-6">
                                       <label for="is_pmay" class="form-control-label">
                                          <strong>Is this a PMAY project ? <span style="color: red">*</span></strong>
                                       </label>
                                       <select name="is_pmay" class="form-control">
                                          <option value="0">No</option>
                                          <option value="1">Yes</option>
                                       </select>
                                    </div>
                                 </div> -->
                                  <div class="row" style="margin-top: 2%">
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="code" class="form-control-label">
                                                  <strong>Code <span style="color: red">*</span></strong>
                                              </label>
                                              <input type="text" name="code" class="form-control" id="code">
                                          </div>
                                      </div>
                                  </div>
                                 <div class="row" style="margin-top: 2%">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="title" class="form-control-label">
                                             <strong>Title <span style="color: red">*</span></strong>
                                          </label>
                                          <input type="text" name="title" class="form-control" id="title">
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="address" class="form-control-label">
                                             <strong>Address <span style="color: red">*</span></strong>
                                          </label>
                                          <input type="text" name="address" class="form-control" id="address">
                                       </div>
                                    </div>
                                 </div>

                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="form-group m-form__group">
                                              <label for="district_id" class="form-control-label">
                                                  <strong>District <span style="color: red">*</span></strong>
                                              </label>
                                              <select name="district_id" class="form-control" id="district_id">
                                                  <option value="">Select District</option>
                                                  <?php
                                                  if(is_array($districts) && array_filter($districts))
                                                  {
                                                      foreach($districts as $district){
                                                          ?>
                                                          <option value="<?php echo $district['id'];?>"><?php echo $district['name'];?></option>
                                                          <?php
                                                      }
                                                  }
                                                  ?>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group m-form__group">
                                              <label for="city" class="form-control-label">
                                                  <strong>City <span style="color: red">*</span></strong>
                                              </label>
                                              <select name="city_id" class="form-control" id="city_id">
                                                  <option value="">Select City</option>
                                              </select>
                                          </div>
                                      </div>
                                  </div>


                                  <div class="row" style="margin-top: 2%">
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="slac_meeting_date" class="form-control-label">
                                                  <strong>SLAC Meeting Date <span style="color: red">*</span></strong>
                                              </label>
                                              <input class="form-control" type="date" name="slac_meeting_date" value="" id="slac_meeting_date">
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="slac_meeting_no" class="form-control-label">
                                                  <strong>SLAC Meeting No <span style="color: red">*</span></strong>
                                              </label>
                                              <input type="text" name="slac_meeting_no" class="form-control" id="slac_meeting_no">
                                          </div>
                                      </div>
                                  </div>


                                  <div class="row" style="margin-top: 2%">
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="slsmc_meeting_date" class="form-control-label">
                                                  <strong>SLSMC Meeting Date <span style="color: red">*</span></strong>
                                              </label>
                                              <input class="form-control" type="date" name="slsmc_meeting_date" value="" id="slsmc_meeting_date">
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="slsmc_meeting_no" class="form-control-label">
                                                  <strong>SLSMC Meeting No <span style="color: red">*</span></strong>
                                              </label>
                                              <input type="text" name="slsmc_meeting_no" class="form-control" id="slsmc_meeting_no">
                                          </div>
                                      </div>
                                  </div>


                                  <div class="row" style="margin-top: 2%">
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="csmc_meeting_date" class="form-control-label">
                                                  <strong>CSMC Meeting Date <span style="color: red">*</span></strong>
                                              </label>
                                              <input class="form-control" type="date" name="csmc_meeting_date" value="" id="csmc_meeting_date">
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="csmc_meeting_no" class="form-control-label">
                                                  <strong>CSMC Meeting No <span style="color: red">*</span></strong>
                                              </label>
                                              <input type="text" name="csmc_meeting_no" class="form-control" id="csmc_meeting_no">
                                          </div>
                                      </div>
                                  </div>

                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="form-group m-form__group">
                                              <label for="vertical" class="form-control-label">
                                                  <strong>Vertical <span style="color: red">*</span></strong>
                                              </label>
                                              <select name="vertical" class="form-control" id="vertical">
                                                  <option value="">Select Vertical</option>
                                                  <option value="AHP">AHP</option>
                                                  <option value="AHP | PPP">AHP | PPP</option>
                                                  <option value="BLC">BLC</option>
                                                  <option value="ISSR">ISSR</option>
                                                  <option value="ISSR (SRA)">ISSR (SRA)</option>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="implementing_agency" class="form-control-label">
                                                  <strong>Implementing Agency <span style="color: red">*</span></strong>
                                              </label>
                                              <input type="text" name="implementing_agency" class="form-control" id="implementing_agency">
                                          </div>
                                      </div>
                                  </div>


                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="dpr" class="form-control-label">
                                                  <strong>DPR <span style="color: red">*</span></strong>
                                              </label>
                                              <input type="text" name="dpr" class="form-control" id="dpr">
                                          </div>
                                      </div>
                                  </div>


                                  <!-- ============================================================================= -->


                              </div>

                               <div class="m-portlet__head">
                                   <div class="m-portlet__head-caption">
                                       <h3 class="main-title">
                                           Approved DUs
                                           </h3>
                                   </div>
                               </div>

                               <div class="m-portlet__body" style="margin-top: -3%;">
                                   <div class="row" style="margin-top: 2%">
                                       <div class="col-lg-6">
                                           <div class="form-group">
                                               <label for="EWS" class="form-control-label">
                                                   <strong>EWS <span style="color: red">*</span></strong>
                                               </label>
                                               <input type="text" name="EWS" class="form-control total_dus" id="EWS" value="0">
                                           </div>
                                       </div>
                                       <div class="col-lg-6">
                                           <div class="form-group">
                                               <label for="LIG" class="form-control-label">
                                                   <strong>LIG <span style="color: red">*</span></strong>
                                               </label>
                                               <input  type="text" name="LIG" class="form-control total_dus" id="LIG" value="0">
                                           </div>
                                       </div>
                                   </div>

                                   <div class="row" style="margin-top: 2%">
                                       <div class="col-lg-6">
                                           <div class="form-group">
                                               <label for="MIG" class="form-control-label">
                                                   <strong>MIG <span style="color: red">*</span></strong>
                                               </label>
                                               <input type="text" name="MIG" class="form-control total_dus" id="MIG" value="0">
                                           </div>
                                       </div>
                                       <div class="col-lg-6">
                                           <div class="form-group">
                                               <label for="HIG" class="form-control-label">
                                                   <strong>HIG <span style="color: red">*</span></strong>
                                               </label>
                                               <input type="text" name="HIG" class="form-control total_dus" id="HIG" value="0">
                                           </div>
                                       </div>
                                   </div>


                                   <div class="row" style="margin-top: 2%">
                                       <div class="col-lg-6">
                                           <div class="form-group">
                                               <label for="total_dus" class="form-control-label">
                                                   <strong>Total Dus <span style="color: red">*</span></strong>
                                               </label>
                                               <input readonly type="text" name="total_dus" class="form-control" id="total_dus">
                                           </div>
                                       </div>
                                       <div class="col-lg-6">

                                           <div class="form-group">
                                               <label for="probable_start_date_of_project" class="form-control-label">
                                                   <strong>Probable Start Date Of Project <span style="color: red">*</span></strong>
                                               </label>
                                               <input class="form-control" type="date" name="probable_start_date_of_project" value="" id="probable_start_date_of_project">
                                           </div>

                                       </div>
                                   </div>

                                   <div class="row" style="margin-top: 2%">
                                       <div class="col-lg-6">
                                           <div class="form-group">
                                               <label for="probable_date_of_completion" class="form-control-label">
                                                   <strong>Probable Date Of Completion <span style="color: red">*</span></strong>
                                               </label>
                                               <input class="form-control" type="date" name="probable_date_of_completion" value="" id="probable_date_of_completion">
                                           </div>
                                       </div>
                                       <div class="col-lg-6">
                                           <div class="form-group">
                                               <label for="is_dpr_submitted" class="form-control-label">
                                                   <strong>DPR Submitted <span style="color: red">*</span></strong>
                                               </label> <span>&nbsp;</span>
                                           <input type="radio" name="is_dpr_submitted" value="1">Yes  <span>&nbsp;</span>
                                           <input type="radio" name="is_dpr_submitted" value="0">No
                                           </div>
                                       </div>

                                   </div>

                                   <div class="row" style="margin-top: 2%">
                                       <div class="col-lg-6">
                                           <div class="form-group">
                                               <label for="is_plan_approved" class="form-control-label">
                                                   <strong>Plan Approved <span style="color: red">*</span></strong>
                                               </label> <span>&nbsp;</span>
                                               <input type="radio" name="is_plan_approved" value="1">Yes  <span>&nbsp;</span>
                                               <input type="radio" name="is_plan_approved" value="0">No
                                           </div>
                                       </div>
                                       <div class="col-lg-6">
                                           <div class="form-group">
                                               <label for="is_ec_obtained" class="form-control-label">
                                                   <strong>EC Obtained If Required <span style="color: red">*</span></strong>
                                               </label> <span>&nbsp;</span>
                                               <input type="radio" name="is_ec_obtained" value="1">Yes  <span>&nbsp;</span>
                                               <input type="radio" name="is_ec_obtained" value="0">No
                                           </div>
                                       </div>

                                   </div>
                                   <div class="row" style="margin-top: 2%">
                                       <div class="col-lg-6">
                                           <div class="form-group">
                                               <label for="is_tendering_completed" class="form-control-label">
                                                   <strong>Tendering Completed <span style="color: red">*</span></strong>
                                               </label> <span>&nbsp;</span>
                                               <input type="radio" name="is_tendering_completed" value="1">Yes  <span>&nbsp;</span>
                                               <input type="radio" name="is_tendering_completed" value="0">No
                                           </div>
                                       </div>

                                   </div>

                                   <!-- ============================================================================= -->


                               </div>

                               <div class="m-portlet__head">
                                   <div class="m-portlet__head-caption">
                                       <h3 class="main-title">
                                           Implementing Agency Contact Details
                                       </h3>
                                   </div>
                               </div>

                               <div class="m-portlet__body" style="margin-top: -3%;">
                                   <div class="row" style="margin-top: 2%">
                                       <div class="col-lg-6">
                                           <div class="form-group">
                                               <label for="agency_email" class="form-control-label">
                                                   <strong>Agency Email <span style="color: red">*</span></strong>
                                               </label>
                                               <input type="text" name="agency_email" class="form-control" id="agency_email">
                                           </div>
                                       </div>
                                       <div class="col-lg-6">
                                           <div class="form-group">
                                               <label for="agency_mobile_no" class="form-control-label">
                                                   <strong>Agency Mobile No <span style="color: red">*</span></strong>
                                               </label>
                                               <input type="text" name="agency_mobile_no" class="form-control" id="agency_mobile_no">
                                           </div>
                                       </div>
                                   </div>

                                   <div class="row">
                                       <div class="col-lg-6">
                                           <div class="form-group">
                                               <label for="agency_landline" class="form-control-label">
                                                   <strong>Agency Landline No <span style="color: red">*</span></strong>
                                               </label>
                                               <input type="text" name="agency_landline" class="form-control" id="agency_landline">
                                           </div>
                                       </div>
                                   </div>

                                   <div class="row" style="margin-top: 2%">
                                       <div class="col-lg-6">
                                           <h5 class="main-title">
                                               Consultant Contact Details
                                           </h5>
                                       </div>
                                   </div>

                               <div id="consultant_detail">
                                   <div class="row" style="margin-top: 2%">
                                       <div class="col-lg-6">
                                           <div class="form-group">
                                               <label for="consultant_name" class="form-control-label">
                                                   <strong>Consultant Name <span style="color: red">*</span></strong>
                                               </label>
                                               <input type="text" name="consultant_name[]" class="form-control" >
                                           </div>
                                       </div>
                                       <div class="col-lg-6">
                                           <div class="form-group">
                                               <label for="consultant_mobile_no" class="form-control-label">
                                                   <strong>Consultant Mobile No <span style="color: red">*</span></strong>
                                               </label>
                                               <input type="text" name="consultant_mobile_no[]" class="form-control">
                                           </div>
                                       </div>
                                   </div>

                                   <div class="row">
                                       <div class="col-lg-6">
                                           <div class="form-group">
                                               <label for="agency_landline" class="form-control-label">
                                                   <strong>Consultant Landline No <span style="color: red">*</span></strong>
                                               </label>
                                               <input type="text" name="consultant_landline[]" class="form-control" >
                                           </div>
                                       </div>
                                   </div>
                               </div>

                                   <div class="row">
                                       <div class="col-lg-6">
                                          <a href="javascript:void(0);" id="add_consultant" name="add_consultant">Add Consultant</a>
                                       </div>
                                   </div>

                               <div class="m-form__actions">
                                   <br>
                                   <button type="Submit" id="submit_scheme_form" class="btn m-btn--pill btn-primary">
                                       Submit
                                   </button>
                               </div>



                           </div>

                            <?php echo form_close();?>








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
        $("#add_consultant").click(function(){
            $('#consultant_detail').append('<div class="row" style="margin-top: 2%">\n' +
                '                                       <div class="col-lg-6">\n' +
                '                                           <div class="form-group">\n' +
                '                                               <label for="consultant_name" class="form-control-label">\n' +
                '                                                   <strong>Consultant Name <span style="color: red">*</span></strong>\n' +
                '                                               </label>\n' +
                '                                               <input type="text" name="consultant_name[]" class="form-control" >\n' +
                '                                           </div>\n' +
                '                                       </div>\n' +
                '                                       <div class="col-lg-6">\n' +
                '                                           <div class="form-group">\n' +
                '                                               <label for="consultant_mobile_no" class="form-control-label">\n' +
                '                                                   <strong>Consultant Mobile No <span style="color: red">*</span></strong>\n' +
                '                                               </label>\n' +
                '                                               <input type="text" name="consultant_mobile_no[]" class="form-control">\n' +
                '                                           </div>\n' +
                '                                       </div>\n' +
                '                                   </div>\n' +
                '\n' +
                '                                   <div class="row">\n' +
                '                                       <div class="col-lg-6">\n' +
                '                                           <div class="form-group">\n' +
                '                                               <label for="agency_landline" class="form-control-label">\n' +
                '                                                   <strong>Consultant Landline No <span style="color: red">*</span></strong>\n' +
                '                                               </label>\n' +
                '                                               <input type="text" name="consultant_landline[]" class="form-control" >\n' +
                '                                           </div>\n' +
                '                                       </div>\n' +
                '                                   </div>');
        });



        $("#district_id").change(function(){
            var selectedDistrict = $("#district_id option:selected").val();
            $.ajax({
                type: "POST",
                url: "projects/get_cities",
                data: { district : selectedDistrict }
            }).done(function(data){
                $("#city_id").html(data);
                console.log(data);
            });

        });


        $('.total_dus').keypress(function(event) {
            var $this = $(this);
            if ((event.which != 46 || $this.val().indexOf('.') != -1) &&
                ((event.which < 48 || event.which > 57) &&
                    (event.which != 0 && event.which != 8))) {
                event.preventDefault();
            }

            var text = $(this).val();
            if ((event.which == 46) && (text.indexOf('.') == -1)) {
                setTimeout(function() {
                    if ($this.val().substring($this.val().indexOf('.')).length > 3) {
                        $this.val($this.val().substring(0, $this.val().indexOf('.') + 3));
                    }
                }, 1);
            }

            if ((text.indexOf('.') != -1) &&
                (text.substring(text.indexOf('.')).length > 2) &&
                (event.which != 0 && event.which != 8) &&
                ($(this)[0].selectionStart >= text.length - 2)) {
                event.preventDefault();
            }
        });


        $(document).on("keyup blur", ".total_dus", function () {

            var sum = 0;
            $(".total_dus").each(function() {
                  sum += parseInt($(this).val());
            });

            $('#total_dus').attr('value',sum);

        });





    });
</script>
