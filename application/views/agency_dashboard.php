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
     "valueField": "status_count",
     "hideCredits":true,
     "titleField": "status",
     "outlineAlpha": 0.4,
     "depth3D": 15,
     "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[status_count]]</b> ([[percents]]%)</span>",
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
                  foreach($status_abstract as $key => $status_data)
                  {
                  ?>
               <div class="col-md-12 col-lg-6 col-xl-4 status-wise-widget">
                  <!--begin::Total Profit-->
                  <div class="m-widget24">
                     <div class="m-widget24__item">
                        <?php
                           if($key == 0)
                           {
                             echo "<i class='fa fa-home'></i>";
                           }
                           elseif($key == 1)
                           {
                             echo "<i class='fa fa-hourglass-half'></i>";
                           }
                           elseif($key == 2)
                           {
                             echo "<i class='fa fa-check-circle'></i>";
                           }
                           else{
                             echo "<i class='fa fa-cubes'></i>";
                           }
                           ?>
                        <h4 class="m-widget24__title">
                           <?php echo $status_data['status'];?>
                        </h4>
                        <br>
                         <?php if($key == 0)
                         { ?>
                             <span class="m-widget24__desc">
                        <a target="_blank" href="<?php echo base_url('agency/projects');?>">View Details</a>
                        </span>
                         <?php } else { ?>

                             <span class="m-widget24__desc">
                        <a target="_blank" href="<?php echo base_url('agency/projects?status='.$status_data['status_id']);?>">View Details</a>
                        </span>

                         <?php } ?>

                        <span class="m-widget24__stats m--font-brand txt-color">
                        <?php echo isset($status_data['status_count'])?$status_data['status_count']:0;?>
                        </span>
                        <div class="m--space-10"></div>
                        <div class="progress m-progress--sm">
                           <div class="progress-bar bg-color" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                     </div>
                  </div>
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


</script>