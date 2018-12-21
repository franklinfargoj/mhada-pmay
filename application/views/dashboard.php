<!-- Styles -->
<style>
   #status_chart {
   width: 100%;
   height: 500px;
   }
   #stage_chart {
   width: 100%;
   height: 500px;
   }
   .finantial_acc_graphs {
   width: 100%;
   height: 500px;
   }

   @font-face {
    font-family: '07devnewmarathifont';
    src: url('fonts/07devnewmarathifont.eot');
    src: url('fonts/07devnewmarathifont.eot') format('embedded-opentype'),
         url('fonts/07devnewmarathifont.woff2') format('woff2'),
         url('fonts/07devnewmarathifont.woff') format('woff'),
         url('fonts/07devnewmarathifont.ttf') format('truetype'),
         url('fonts/07devnewmarathifont.svg#07devnewmarathifont') format('svg');
}
</style>
<!-- Resources -->
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/pie.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
<script src="<?php echo base_url('public/js/responsive-master/responsive.min.js');?>"></script>
<!-- Chart code -->
<script>
   var chart = AmCharts.makeChart( "status_chart", {
     "type": "pie",
     "theme": "light",
     "dataProvider": <?php echo $status_abstract_json;?>,
     "valueField": "count",
     "hideCredits":true,
     "titleField": "name",
     "outlineAlpha": 0.4,
     "depth3D": 15,
     "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[count]]</b> ([[percents]]%)</span>",
     "angle": 30,
     "labelsEnabled": false,
     "export": {
       "enabled": true
     },
   } );
   
   var chart = AmCharts.makeChart( "stage_chart", {
     "type": "pie",
     "theme": "dark",
     "dataProvider": <?php echo $stage_abstract_json;?>,
     "valueField": "count",
     "hideCredits":true,
     "titleField": "name",
     "outlineAlpha": 0.4,
     "depth3D": 15,
     "startEffect": "elastic",
     "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[count]]</b> ([[percents]]%)</span>",
     "angle": 30,
     "labelsEnabled": false,
     "export": {
       "enabled": true
     },
   } );
   
</script>
<main class="main-content bgc-grey-100">
   <div id="mainContent">
      <?php
         if($this->session->flashdata('success'))
         {
         ?>      
      <div class="alert alert-success alert-dismissable" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
         </button><?php echo $this->session->flashdata('success');?>
      </div>
      <?php
         }
         ?>
      <?php
         if($this->session->flashdata('error'))
         {
         ?>      
      <div class="alert alert-danger alert-dismissable" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
         </button><?php echo $this->session->flashdata('error');?>
      </div>
      <?php
         }
         ?>
      <div class="m-portlet" id="m_portlet_tools_1">
         <div class="mr-auto m-portlet__head">
            <div class="m-portlet__head-caption">
               <div class="m-portlet__head-title">
                  <h3 class="main-title">Status Wise Project Abstract</h3>
               </div>
            </div>
            <div class="m-portlet__head-tools">
               <ul class="m-portlet__nav">
                  <li class="m-portlet__nav-item">
                     <a href="#" data-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon" title="" data-original-title="Collapse">
                     <i class="la la-angle-down"></i>
                     </a>
                  </li>
               </ul>
            </div>
         </div>
         <div class="m-portlet__body  m-portlet__body--no-padding">
            <div class="row m-row--no-padding m-row--col-separator-xl">
               <?php
                  foreach($status_abstract as $status_name => $status_count)
                  {
                  ?>
               <div class="col-md-12 col-lg-6 col-xl-4 status-wise-widget">
                  <!--begin::Total Profit-->
                  <div class="m-widget24">
                     <div class="m-widget24__item">
                        <?php
                           if($status_name == 'Total Projects')
                           {
                             echo "<i class='fa fa-home'></i>";
                           }
                           elseif($status_name == 'Ongoing Projects')
                           {
                             echo "<i class='fa fa-hourglass-half'></i>";
                           }
                           elseif($status_name == 'Completed Projects')
                           {
                             echo "<i class='fa fa-check-circle'></i>";
                           }
                           else{
                             echo "<i class='fa fa-cubes'></i>";
                           }
                           ?>
                        <h4 class="m-widget24__title">
                           <?php echo $status_name;?>
                        </h4>
                        <br>
                        <span class="m-widget24__desc">
                        <a target="_blank" href="<?php echo base_url('schemes?status='.$status_count['ref_id']);?>">View Details</a>
                        </span>
                        <span class="m-widget24__stats m--font-brand txt-color">
                        <?php echo isset($status_count['stats'])?$status_count['stats']:$status_count;?>
                        </span>
                        <div class="m--space-10"></div>
                        <div class="progress m-progress--sm">
                           <div class="progress-bar bg-color" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="m-widget24__change">
                           <?php
                              if(isset($status_count['bifurcation'])){
                              ?>
                           <a class="txt-color" style="cursor: pointer" data-toggle="modal" data-target="#bifur_<?php echo $status_count['ref_id'];?>">View Bifurcation</a>
                           <div class="modal fade" id="bifur_<?php echo $status_count['ref_id'];?>" tabindex="-1" role="dialog" aria-labelledby="updateStatuslabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="adduserLabel"><strong><?php echo $status_name;?></strong></h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body" style="overflow-y: scroll; height:300px;">
                                       <div class="m-widget1">
                                          <?php
                                             foreach($status_count['bifurcation'] as $bifurcation_type_nam => $bifurcation_type_value){
                                             ?>
                                          <div class="m-widget1__item">
                                             <div class="row m-row--no-padding align-items-center">
                                                <div class="col">
                                                   <h3 class="m-widget1__title">
                                                      <?php echo $bifurcation_type_nam;?>
                                                   </h3>
                                                   <span class="m-widget1__desc">
                                                   <a href="<?php echo base_url('schemes?status=1&ref_type='.$bifurcation_type_value['ref_name']);?>" target="_blank">View Details</a>
                                                   </span>
                                                </div>
                                                <div class="col m--align-right">
                                                   <span class="m-widget1__number txt-color">
                                                   <?php echo $bifurcation_type_value['stats'];?>
                                                   </span>
                                                </div>
                                             </div>
                                          </div>
                                          <?php
                                             }
                                             ?>
                                       </div>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary m-btn--pill" data-dismiss="modal">Close</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <?php
                              }
                              ?>
                        </span>
                     </div>
                  </div>
                  <!--end::Total Profit-->
               </div>
               <?php
                  }
                  ?>
            </div>
         </div>
      </div>
      <div class="m-portlet" id="m_portlet_tools_2">
         <div class="mr-auto m-portlet__head">
            <div class="m-portlet__head-caption">
               <div class="m-portlet__head-title">
                  <h3 class="main-title">Status Wise Project Abstract View</h3>
               </div>
            </div>
            <div class="m-portlet__head-tools">
               <ul class="m-portlet__nav">
                  <li class="m-portlet__nav-item">
                     <a href="#" data-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon" title="" data-original-title="Collapse">
                     <i class="la la-angle-down"></i>
                     </a>
                  </li>
               </ul>
            </div>
         </div>
         <div class="m-portlet__body ">
            <div id="status_chart"></div>
         </div>
      </div>
      <div class="m-portlet m_portlet_tools_project">
         <div class="mr-auto m-portlet__head">
            <h3 class="main-title">
               Stage Wise Project Abstract
               <a class="btn m-btn--pill btn-primary btn-sm" href="<?php echo base_url('schemes/stage_consolidated');?>" target="_blank" style="float: right">View Consolidated Report Stage wise</a>
            </h3>
            <div class="m-portlet__head-tools">
               <ul class="m-portlet__nav">
                  <li class="m-portlet__nav-item">
                     <a href="#" data-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon" title="" data-original-title="Collapse">
                     <i class="la la-angle-down"></i>
                     </a>
                  </li>
               </ul>
            </div>
         </div>
         <div class="m-portlet__body  m-portlet__body--no-padding">
            <div class="row m-row--no-padding m-row--col-separator-xl">
               <?php
                  foreach($stage_abstract as $stage_name => $status_count)
                  {
                  ?>
               <div class="col-md-12 col-lg-6 col-xl-3 stage-wise-widget">
                  <!--begin::Total Profit-->
                  <div class="m-widget24">
                     <div class="m-widget24__item">
                        <?php
                           if($stage_name == 'Total Projects')
                           {
                             echo "<i class='fa fa-home'></i>";
                           }
                           elseif($stage_name == 'Completion')
                           {
                             echo "<i class='fa fa-check-circle'></i>";
                           }
                           else{
                             echo "<i class='fa fa-cubes'></i>";
                           }
                           ?>
                        <h4 class="m-widget24__title">
                           <?php echo $stage_name;?>
                        </h4>
                        <br>
                        <span class="m-widget24__desc">
                        <a target="_blank" href="<?php echo base_url('schemes?stage_type='.$status_count['ref_id']);?>">View Details</a>
                        </span>
                        <span class="m-widget24__stats txt-color">
                        <?php echo isset($status_count['stats'])?$status_count['stats']:$status_count;?>
                        </span>
                        <div class="m--space-10"></div>
                        <div class="progress m-progress--sm">
                           <div class="progress-bar m--bg-success bg-color" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="m-widget24__change">
                           <?php
                              if(isset($status_count['bifurcation'])){
                              ?>
                           <a class="txt-color" style="cursor: pointer" data-toggle="modal" data-target="#bifurstage_<?php echo $status_count['ref_id'];?>">View Bifurcation</a>
                           <div class="modal fade" id="bifurstage_<?php echo $status_count['ref_id'];?>" tabindex="-1" role="dialog" aria-labelledby="updateStatuslabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="adduserLabel"><strong><?php echo $stage_name;?></strong></h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body" style="overflow-y: scroll; height:300px;">
                                       <div class="m-widget1">
                                          <?php
                                             foreach($status_count['bifurcation'] as $bifurcation_type_nam => $bifurcation_type_value){
                                             ?>
                                          <div class="m-widget1__item">
                                             <div class="row m-row--no-padding align-items-center">
                                                <div class="col">
                                                   <h3 class="m-widget1__title">
                                                      <?php echo $bifurcation_type_nam;?>
                                                   </h3>
                                                   <span class="m-widget1__desc">
                                                   <a href="<?php echo base_url('schemes?stage='.$bifurcation_type_value['ref_name']);?>" target="_blank">View Details</a>
                                                   </span>
                                                </div>
                                                <div class="col m--align-right">
                                                   <span class="m-widget1__number txt-color">
                                                   <?php echo $bifurcation_type_value['stats'];?>
                                                   </span>
                                                </div>
                                             </div>
                                          </div>
                                          <?php
                                             }
                                             ?>
                                       </div>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <?php
                              }
                              ?>
                        </span>
                     </div>
                  </div>
                  <!--end::Total Profit-->
               </div>
               <?php
                  }
                  ?>
            </div>
         </div>
      </div>
      <div class="m-portlet" id="m_portlet_tools_3">
         <div class="mr-auto m-portlet__head">
            <div class="m-portlet__head-caption">
               <div class="m-portlet__head-title">
                  <h3 class="main-title">View Consolidated Report Stage wise View</h3>
               </div>
            </div>
            <div class="m-portlet__head-tools">
               <ul class="m-portlet__nav">
                  <li class="m-portlet__nav-item">
                     <a href="#" data-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon" title="" data-original-title="Collapse">
                     <i class="la la-angle-down"></i>
                     </a>
                  </li>
               </ul>
            </div>
         </div>
         <div class="m-portlet__body ">
            <div id="stage_chart"></div>
         </div>
      </div>
      <div class="m-portlet m_portlet_tools_project">
         <div class="mr-auto m-portlet__head">
            <div class="m-portlet__head-caption">
               <div class="m-portlet__head-title">
                  <h3 class="main-title">Finantial Accounting <span style="color: black;font-size: 14px;">( Statistics was last updated on <?php echo isset($get_probity_data['updated_on'])?date('d-m-Y H:i',strtotime($get_probity_data['updated_on'])):null;?> <a href="<?php echo base_url('schemes/get_probity_report');?>">Click here</a> to get latest statistics. )</span></h3>
               </div>
            </div>
            <div class="m-portlet__head-tools">
               <ul class="m-portlet__nav">
                  <li class="m-portlet__nav-item">
                     <a href="#" data-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon" title="" data-original-title="Collapse">
                     <i class="la la-angle-down"></i>
                     </a>
                  </li>
               </ul>
            </div>
         </div>
         <div class="m-portlet__body ">
            <div class="row m-row--no-padding">
               <?php
                  if(isset($final_probity_data['finantial_accounting']) && is_array($final_probity_data['finantial_accounting']) && array_filter($final_probity_data['finantial_accounting'])){
                    foreach($final_probity_data['finantial_accounting'] as $module_name => $module_value){
                  ?>
               <div class="col-md-12 col-lg-6 col-xl-6">
                  <h4><?php echo $module_name;?></h4>
                  <?php
                     if(in_array($module_name, array('Receipt'))){
                     ?>
                  <div id="<?php echo "check_file_".$module_name;?>" data-mod="<?php echo $module_name;?>" class="finantial_acc_graphs"></div>
                  <?php
                     }elseif(in_array($module_name, array('Collection','Expenditure'))){
                     ?>
                  <div id="<?php echo "check_file_".$module_name;?>" data-mod="<?php echo $module_name;?>" class="finantial_acc_graphs_bar"></div>
                  <?php
                     }elseif(in_array($module_name, array('Demand and Collection','Expenditure and Budget'))){
                     ?>
                  <div id="<?php echo "check_file_".$module_name;?>" data-mod="<?php echo $module_name;?>" class="finantial_acc_graphs_multiple"></div>
                  <?php
                     }
                     ?>
               </div>
               <?php
                  }
                  }
                  ?>
            </div>
         </div>
      </div>
      <div class="m-portlet m_portlet_tools_project">
         <div class="mr-auto m-portlet__head">
            <div class="m-portlet__head-caption">
               <div class="m-portlet__head-title">
                  <h3 class="main-title">Work <span style="color: black;font-size: 14px;">( Statistics was last updated on <?php echo isset($get_probity_data['updated_on'])?date('d-m-Y H:i',strtotime($get_probity_data['updated_on'])):null;?> <a href="<?php echo base_url('schemes/get_probity_report');?>">Click here</a> to get latest statistics. )</span></h3>
               </div>
            </div>
            <div class="m-portlet__head-tools">
               <ul class="m-portlet__nav">
                  <li class="m-portlet__nav-item">
                     <a href="#" data-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon" title="" data-original-title="Collapse">
                     <i class="la la-angle-down"></i>
                     </a>
                  </li>
               </ul>
            </div>
         </div>
         <div class="m-portlet__body ">
            <div class="row m-row--no-padding">
               <?php
                  if(isset($final_probity_data['work']) && is_array($final_probity_data['work']) && array_filter($final_probity_data['work'])){
                    foreach($final_probity_data['work'] as $module_name => $module_value){
                      if(in_array($module_name, array('Create & Export Bill Counts','Bills Creation Chart','Stage wise bill creation chart'))){
                  ?>
               <div class="col-md-12 col-lg-12 col-xl-12">
                  <div id="<?php echo "check_file_".preg_replace("/[^a-zA-Z]+/", "", $module_name);?>" data-mod="<?php echo $module_name;?>" class="finantial_acc_graphs_bar"></div>
               </div>
               <?php
                  }elseif($module_name == 'Blocks'){
                    foreach($work_blocks as $block_name => $each_blocks){
                  ?>
               <div class="col-md-12 col-lg-6 col-xl-3 status-wise-widget" style="margin-bottom: 5%">
                  <!--begin::Total Profit-->
                  <div class="m-widget24">
                     <div class="m-widget24__item">
                        <i class='fa fa-cubes'></i>
                        <h4 class="m-widget24__title">
                           <?php echo $block_name;?>
                        </h4>
                        <br>
                        <span class="m-widget24__desc">
                        </span>
                        <span class="m-widget24__stats m--font-brand txt-color" style="margin-top: 0%;font-size: 1rem;    margin-right: 21%;">
                        <?php echo isset($each_blocks['0'])?$each_blocks['0'].' | '.preg_replace('/[^A-Za-z0-9\-]/', '', $each_blocks['1']):0;?>
                        </span>
                        <div class="m--space-10"></div>
                        <div class="progress m-progress--sm">
                           <div class="progress-bar bg-color" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                     </div>
                  </div>
                  <!--end::Total Profit-->
               </div>
               <?php
                  }
                  }elseif($module_name == 'board_wise_details'){
                  ?>
                  <div class="col-md-12" style="overflow-x: auto;margin-top: 2%">
                  <table class="table">
                    <thead class="thead-light">
                      <tr>
                        <th>Board</th>
                        <th colspan="2">Budgeted Work</th>
                        <th colspan="2">Works in WMS</th>
                        <th colspan="2">Bills Created </th>
                        <th colspan="2">Exported</th>
                        <th colspan="2">Paid</th>
                      </tr>
                      <tr>
                        <th></th>
                        <th>Number of works</th>
                        <th>₹ (Crore)</th>
                        <th>Number of works</th>
                        <th>₹ (Crore)</th>
                        <th>Number of works</th>
                        <th>₹ (Crore)</th>
                        <th>Number of works</th>
                        <th>₹ (Crore)</th>
                        <th>Number of works</th>
                        <th>₹ (Crore)</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach($final_probity_data['work']['board_wise_details'] as $each_board_details){
                      ?>
                        <tr>
                          <td><?php echo isset($each_board_details['board_name'])?$each_board_details['board_name']:null;?></td>
                          <td><?php echo isset($each_board_details['bud_work_number'])?$each_board_details['bud_work_number']:null;?></td>
                          <td><?php echo isset($each_board_details['bud_work_amt'])?$each_board_details['bud_work_amt']:null;?></td>
                          <td><?php echo isset($each_board_details['wms_number'])?$each_board_details['wms_number']:null;?></td>
                          <td><?php echo isset($each_board_details['wms_amount'])?$each_board_details['wms_amount']:null;?></td>
                          <td><?php echo isset($each_board_details['bills_created_number'])?$each_board_details['bills_created_number']:null;?></td>
                          <td><?php echo isset($each_board_details['bills_created_amount'])?$each_board_details['bills_created_amount']:null;?></td>
                          <td><?php echo isset($each_board_details['exported_number'])?$each_board_details['exported_number']:null;?></td>
                          <td><?php echo isset($each_board_details['exported_amount'])?$each_board_details['exported_amount']:null;?></td>  
                          <td><?php echo isset($each_board_details['paid_number'])?$each_board_details['paid_number']:null;?></td> 
                          <td><?php echo isset($each_board_details['paid_amount'])?$each_board_details['paid_amount']:null;?></td>
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                <?php
                  }
                ?>
               <?php
                  }
                  }
                  ?>
            </div>
         </div>
      </div>
      <div class="m-portlet m_portlet_tools_project">
         <div class="mr-auto m-portlet__head">
            <div class="m-portlet__head-caption">
               <div class="m-portlet__head-title">
                  <h3 class="main-title">Citizen Service <span style="color: black;font-size: 14px;">( Statistics was last updated on <?php echo isset($get_probity_data['updated_on'])?date('d-m-Y H:i',strtotime($get_probity_data['updated_on'])):null;?> <a href="<?php echo base_url('schemes/get_probity_report');?>">Click here</a> to get latest statistics. )</span></h3>
               </div>
            </div>
            <div class="m-portlet__head-tools">
               <ul class="m-portlet__nav">
                  <li class="m-portlet__nav-item">
                     <a href="#" data-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon" title="" data-original-title="Collapse">
                     <i class="la la-angle-down"></i>
                     </a>
                  </li>
               </ul>
            </div>
         </div>
         <div class="m-portlet__body ">
            <div class="row m-row--no-padding">
                <?php
                  if(isset($final_probity_data['Citizen service']) && is_array($final_probity_data['Citizen service']) && array_filter($final_probity_data['Citizen service'])){
                    foreach($final_probity_data['Citizen service'] as $module_name => $module_value){
                      if(in_array($module_name, array('Board Wise application status','Board Wise application counts')) && $module_name!= '0'){
                ?>
                    <div class="col-md-12 col-lg-12 col-xl-12">
                      <div id="<?php echo "check_file_".preg_replace("/[^a-zA-Z]+/", "", $module_name);?>" data-mod="<?php echo $module_name;?>" class="finantial_acc_graphs_bar"></div>
                   </div>
                <?php
                     }
                    }
                  }
                ?>
            </div>
         </div>
      </div>
      <div class="m-portlet m_portlet_tools_project">
         <div class="mr-auto m-portlet__head">
            <div class="m-portlet__head-caption">
               <div class="m-portlet__head-title">
                  <h3 class="main-title">Payroll <span style="color: black;font-size: 14px;">( Statistics was last updated on <?php echo isset($get_probity_data['updated_on'])?date('d-m-Y H:i',strtotime($get_probity_data['updated_on'])):null;?> <a href="<?php echo base_url('schemes/get_probity_report');?>">Click here</a> to get latest statistics. )</span></h3>
               </div>
            </div>
            <div class="m-portlet__head-tools">
               <ul class="m-portlet__nav">
                  <li class="m-portlet__nav-item">
                     <a href="#" data-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon" title="" data-original-title="Collapse">
                     <i class="la la-angle-down"></i>
                     </a>
                  </li>
               </ul>
            </div>
         </div>
         <div class="m-portlet__body ">
            <div class="row m-row--no-padding">
                <?php
                  if(isset($final_probity_data['payroll']) && is_array($final_probity_data['payroll']) && array_filter($final_probity_data['payroll'])){
                    foreach($final_probity_data['payroll'] as $module_name => $module_value){
                      if(in_array($module_name, array('Total employee count','Employee Status','Types of Bills','Bill Summary'))){
                ?>
                    <div class="col-md-12 col-lg-6 col-xl-6">
                      <div id="<?php echo "check_file_".preg_replace("/[^a-zA-Z]+/", "", $module_name);?>" data-mod="<?php echo $module_name;?>" class="finantial_acc_graphs_bar"></div>
                   </div>
                <?php
                     }else{
                ?>
                <div class="col-md-12 col-lg-12 col-xl-12">
                  <div id="<?php echo "check_file_".$module_name;?>" data-mod="<?php echo $module_name;?>" class="finantial_acc_graphs_multiple"></div>
                </div>
                <?php
                      }
                    }
                  }
                ?>
            </div>
         </div>
      </div>
   </div>
</main>
<script src="<?php echo base_url();?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/snippets/pages/user/login.js" type="text/javascript"></script>
<script src="<?php echo base_url('public/js/high.js');?>"></script>
<script src="<?php echo base_url('public/js/drilldown.js');?>"></script>
<script>
  Highcharts.setOptions({
      lang: {
          thousandsSep: ','
      }
  });

   $(document).on('change','#ownership',function(){
      var value = $(this).val();
   
      if(value == 'Government & Private Both')
      {
         $('#only_both').show();
         $('.app_both').val('');
      }
      else{
         $('#only_both').hide();
         $('.app_both').val('0');
      }
   });
   
   $(document).ready(function(){
      $( ".finantial_acc_graphs" ).each(function( index ) {
        var id_ref = $(this).attr('id');
        var data_mod = $(this).data('mod');
   
        if(data_mod == 'Receipt')
        {
          var check_type_mod = <?php echo json_encode($final_probity_data['finantial_accounting']['Receipt']);?>
        }
   
        var chart = AmCharts.makeChart( ""+id_ref+"", {
          "type": "pie",
          "theme": "light",
          "dataProvider": check_type_mod,
          "valueField": "value",
          "hideCredits":true,
          "titleField": "type",
          "outlineAlpha": 0.4,
          "depth3D": 15,
          "startEffect": "elastic",
          "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
          "angle": 30,
          "labelsEnabled": false,
          "export": {
            "enabled": true
          },
        } );
      });
   
      $( ".finantial_acc_graphs_bar" ).each(function( index ) {
   
          var final_main_array = [];
   
          var id_ref = $(this).attr('id');
          var data_mod = $(this).data('mod');
   
          if(data_mod == 'Collection')
          {
            var drilldown_allow = 1;
            var y_value = 'Amount (Crs)';
            var check_type_mod = <?php echo json_encode($final_probity_data['finantial_accounting']['Collection']);?>;
          }
          else if(data_mod == 'Expenditure')
          {
            var drilldown_allow = 1;
            var y_value = 'Amount (Crs)';
            var check_type_mod = <?php echo json_encode($final_probity_data['finantial_accounting']['Expenditure']);?>
          }
          else if(data_mod == 'Create & Export Bill Counts')
          {
            var drilldown_allow = 0;
            var y_value = 'Number of Bills';
            var check_type_mod = <?php echo json_encode($final_probity_data['work']['Create & Export Bill Counts']);?>;
          }
          else if(data_mod == 'Bills Creation Chart')
          {
            var y_value = 'Number of Bills';
            var drilldown_allow = 0;
            var check_type_mod = <?php echo json_encode($final_probity_data['work']['Bills Creation Chart']);?>;
          }
          else if(data_mod == 'Stage wise bill creation chart')
          {
            var y_value = 'Number of Bills';
            var drilldown_allow = 0;
            var check_type_mod = <?php echo json_encode($final_probity_data['work']['Stage wise bill creation chart']);?>;
          }
          else if(data_mod == 'Board Wise application status')
          {
            var y_value = 'Application Count';
            var drilldown_allow = 0;
            var check_type_mod = <?php echo json_encode($final_probity_data['Citizen service']['Board Wise application status']);?>;
          }
          else if(data_mod == 'Board Wise application counts')
          {
            var y_value = 'Application Count';
            var drilldown_allow = 0;
            var check_type_mod = <?php echo json_encode($final_probity_data['Citizen service']['Board Wise application counts']);?>;
          }
          else if(data_mod == 'Total employee count')
          {
            var y_value = 'Employee Count';
            var drilldown_allow = 0;
            var check_type_mod = <?php echo json_encode($final_probity_data['payroll']['Total employee count']);?>;
          }
          else if(data_mod == 'Employee Status')
          {
            var y_value = 'Employee Count';
            var drilldown_allow = 0;
            var check_type_mod = <?php echo json_encode($final_probity_data['payroll']['Employee Status']);?>;
          }
          else if(data_mod == 'Types of Bills')
          {
            var y_value = 'Total Bill Count';
            var drilldown_allow = 0;
            var check_type_mod = <?php echo json_encode($final_probity_data['payroll']['Types of Bills']);?>;
          }
          else if(data_mod == 'Bill Summary')
          {
            var y_value = 'Total Bill Count';
            var drilldown_allow = 0;
            var check_type_mod = <?php echo json_encode($final_probity_data['payroll']['Bill Summary']);?>;
          }
   
          var sup_part_array = [];
          $(check_type_mod).each(function( index, value) {
            final_main_array['check_name'] = value.value_name;
            final_main_array['check_name_type'] = data_mod;
            var check_ar = {
              'name': value.type , 'y': value.value , 'drilldown': value.type.toLowerCase() , 'name_type': value.value_name
            };
   
            if(drilldown_allow == 0){
              delete check_ar["drilldown"];
            }
   
            final_main_array.push(check_ar);
   
            var sub_part = value.sub_part;
            var sub_part_partial = [];
   
            $(sub_part).each(function( index, value) {
              var sub_part_par = {'name':value.type,'y':value.value};
              sub_part_partial.push(sub_part_par);
            });
   
            var sub_part_each = {'id': check_ar['drilldown'] , 'name' : check_ar['name_type'] , 'data' : sub_part_partial};
            sup_part_array.push(sub_part_each);
          });
   
          $('#'+id_ref+'').highcharts({
              chart: {
                  type: 'column',
                  style: {
                      fontFamily: "'07devnewmarathifont'"
                  }
              },
              title: {
                  text: final_main_array['check_name_type']
              },
              xAxis: {
                  type: 'category',
                  labels:{
                    useHTML:true
                  }
              },
              yAxis: {
                title: {
                  text: y_value
                },
              },

              labels: {
                  useHTML: Highcharts.hasBidiBug
              },
         
              legend: {
                  enabled: false
              },
              credits: {
                  enabled: false
              },
         
              plotOptions: {
                  series: {
                      borderWidth: 0,
                      dataLabels: {
                          enabled: true,
                      }
                  }
              },
         
              series: [{
                  name: final_main_array['check_name'],
                  colorByPoint: true,
                  data: final_main_array
              }],
              drilldown: {
                  series: sup_part_array
              }
          })
      });
   
      $( ".finantial_acc_graphs_multiple" ).each(function( index ) {
   
          var id_ref = $(this).attr('id');
          var data_mod = $(this).data('mod');
   
          if(data_mod == 'Demand and Collection')
          {
           var value_suffix = 'Cr';
           var axis_text = 'Amount';
           var text_name = 'Demand and Collection';
           var check_type_mod = <?php echo json_encode($demand_and_collection);?>
          }
          else if(data_mod == 'Expenditure and Budget')
          {
            var value_suffix = 'Cr';
            var axis_text = 'Amount';
            var text_name = 'Expenditure and Budget';
            var check_type_mod = <?php echo json_encode($expenditure_budget);?>
          }
          if(data_mod == 'Board Wise Employee')
          {
            var value_suffix = null;
            var text_name = 'Board Wise Employee';
            var axis_text = 'Total Employee count';
            var check_type_mod = <?php echo json_encode($board_wise_employee);?>
          }
   
          var type_formula = [];
          var sub_array = [];
          var sub_array_values = [];
      
          $(check_type_mod).each(function( index, value) {
            $(value).each(function( index_type, value_type) {
              var each_type_name = value_type.type;
              type_formula.push(each_type_name);
   
              var sub_part_check = value_type.sub_part;
   
               $(sub_part_check).each(function( sup_part_id, sup_part_value) {
                  if(jQuery.inArray( sup_part_value.type,  sub_array) == -1){
                    sub_array.push(sup_part_value.type);
                  }
   
                  if(typeof(sub_array_values[sup_part_value.type]) == "undefined" || sub_array_values[sup_part_value.type] == null)
                    {
                      sub_array_values[sup_part_value.type] = [];
                    }
                    sub_array_values[sup_part_value.type].push(sup_part_value.value);
               });
            });
          });
   
          var final_chart_array = [];
   
          $(sub_array).each(function(sup_array_key,sup_array_details) {
            var each_sec = {'name': sup_array_details , 'data' : sub_array_values[sup_array_details]};
            final_chart_array.push(each_sec);
          });
        
          Highcharts.chart(''+id_ref+'', {
            chart: {
              type: 'bar',
              style: {
                      fontFamily: "'07devnewmarathifont'"
              }
            },
            title: {
              text: text_name
            },
            xAxis: {
              categories: type_formula,
              title: {
                text: null
              },
              labels:{
                    useHTML:true
              }
            },
            labels: {
              useHTML: Highcharts.hasBidiBug
            },
            yAxis: {
              min: 0,
              title: {
                text: axis_text,
                align: 'high'
              },
              labels: {
                overflow: 'justify',
                formatter: function() {
                     //This will round the value, but you can do anything to this value now
                     if(axis_text == 'Amount'){
                       return (this.value/1000000000).toFixed(0)+'Cr';
                     }else{
                      return this.value;
                     }
                 }
              }
            },
            tooltip: {
              valueSuffix: value_suffix
            },
            credits: {
                  enabled: false
            },
            plotOptions: {
              bar: {
                dataLabels: {
                  enabled: true
                }
              }
            },
            legend: {
              layout: 'vertical',
              align: 'right',
              verticalAlign: 'top',
              x: -40,
              y: 80,
              floating: true,
              borderWidth: 1,
              backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
              shadow: true
            },
            credits: {
              enabled: false
            },
            series: final_chart_array
          });
   
      });
   });

  function addCommas(nStr) {
      nStr += '';
      x = nStr.split('.');
      x1 = x[0];
      x2 = x.length > 1 ? '.' + x[1] : '';
      var rgx = /(\d+)(\d{3})/;
      while (rgx.test(x1)) {
              x1 = x1.replace(rgx, '$1' + ',' + '$2');
      }
      return x1 + x2;
  } 
</script>