<!DOCTYPE html>
<head>
   <meta charset="utf-8" />
   <title>MHADA</title>
   <link rel="shortcut icon" href="favicon.ico" />
   <style type="text/css">
      body {
      background: #fafafa url(http://jackrugile.com/images/misc/noise-diagonal.png);
      color: #444;
      font: 100%/10px 'Helvetica Neue', helvetica, arial, sans-serif;
      text-shadow: 0 1px 0 #fff;
      page-break-inside:auto;
      }
      strong {
      font-weight: bold; 
      }
      em {
      font-style: italic; 
      }
      table {
      background: #f5f5f5;
      box-shadow: inset 0 1px 0 #fff;
      font-size: 10px;
      line-height: 12px;
      text-align: left;
      width: 100%;
      page-break-inside:auto;
      } 
      th {
      background: url(http://jackrugile.com/images/misc/noise-diagonal.png), linear-gradient(#777, #444);
      border-left: 1px solid #555;
      border-right: 1px solid #777;
      border-top: 1px solid #555;
      border-bottom: 1px solid #333;
      box-shadow: inset 0 1px 0 #999;
      color: #fff;
      font-weight: bold;
      position: relative;
      text-shadow: 0 1px 0 #000;  
      }
      th:after {
      background: linear-gradient(rgba(255,255,255,0), rgba(255,255,255,.08));
      content: '';
      display: block;
      height: 25%;
      left: 0;
      margin: 1px 0 0 0;
      position: absolute;
      top: 25%;
      width: 100%;
      }
      th:first-child {
      border-left: 1px solid #777;  
      box-shadow: inset 1px 1px 0 #999;
      }
      th:last-child {
      box-shadow: inset -1px 1px 0 #999;
      }
      td {
      border-right: 1px solid black;
      border-left: 1px solid black;
      border-top: 1px solid black;
      border-bottom: 1px solid black;
      padding: 3px 4px;
      position: relative;
      transition: all 300ms;
      }
      td:first-child {
      box-shadow: inset 1px 0 0 #fff;
      } 
      td:last-child {
      border-right: 1px solid #e8e8e8;
      box-shadow: inset -1px 0 0 #fff;
      } 
      tr {
      background: url(http://jackrugile.com/images/misc/noise-diagonal.png);  
      page-break-inside:auto;
      }
      tr:nth-child(odd) td {
      background: #f1f1f1 url(http://jackrugile.com/images/misc/noise-diagonal.png);  
      }
      tr:last-of-type td {
      box-shadow: inset 0 -1px 0 #fff; 
      }
      tr:last-of-type td:first-child {
      box-shadow: inset 1px -1px 0 #fff;
      } 
      tr:last-of-type td:last-child {
      box-shadow: inset -1px -1px 0 #fff;
      } 
   </style>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
   <!-- BEGIN HEADER -->
   <!-- END HEADER -->
   <!-- BEGIN CONTAINER -->
   <div class="page-container row-fluid">
      <!-- BEGIN SIDEBAR -->
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE -->
      <div class="page-content">
         <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
         <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
         <!-- BEGIN PAGE CONTAINER-->        
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                  <h3 class="page-title">
                     <strong>Stages Wise Completion Report</strong>
                  </h3>
                  <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
               <table class="table">
                  <thead class="thead-light">
                     <tr>
                        <th scope="col">#</th>
                        <th scope="col">Project Number</th>
                        <th scope="col">Project Name</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">Stage Name</th>
                        <th scope="col">Expected Completion Date</th>
                        <th scope="col">Actual Completion Date</th>
                        <th scope="col">Delays (In Days)</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        if(is_array($get_consolidated_details) && array_filter($get_consolidated_details))
                        {
                           $count_serial = 0;
                           foreach($get_consolidated_details as $project_number => $each_project_details)
                           {
                              $delay_time_total = 0;
                              $count_details = count($each_project_details);
                        ?>
                     <tr>
                        <th scope="row" rowspan="<?php echo $count_details;?>"><?php echo $count_serial+1;?></th>
                        <td rowspan="<?php echo $count_details;?>"><?php echo $project_number;?></td>
                        <td rowspan="<?php echo $count_details;?>"><?php echo isset($each_project_details[0]['scheme_name'])?$each_project_details[0]['scheme_name']:null;?></td>
                        <td rowspan="<?php echo $count_details;?>"><?php echo isset($each_project_details[0]['project_start_date'])?date('d-m-Y',strtotime($each_project_details[0]['project_start_date'])):'-';?></td>
                        <td><?php echo isset($each_project_details[0]['stage_name_value'])?$each_project_details[0]['stage_name_value']:null;?></td>
                        <td><?php echo empty($each_project_details[0]['expected_completion_date'])?'-':date('d-m-Y',strtotime($each_project_details[0]['expected_completion_date']));?></td>
                        <td><?php echo empty($each_project_details[0]['actual_completion_date'])?'-':date('d-m-Y',strtotime($each_project_details[0]['actual_completion_date']));?></td>
                        <td>
                           <?php
                              $diff = 0;
                              if(!empty($each_project_details[0]['actual_completion_date']))
                              {
                                 $date1 = new DateTime($each_project_details[0]['expected_completion_date']);
                                 $date2 = new DateTime($each_project_details[0]['actual_completion_date']);
                              
                                 $diff = $date2->diff($date1)->format("%a");
                              
                                 echo $diff;
                              }
                              else{
                                 echo '-';
                              }
                              
                              $delay_time_total = $delay_time_total+$diff;
                              ?>
                        </td>
                     </tr>
                     <?php
                        if($count_details > 1){
                           foreach($each_project_details as $desc_count => $each_pro_descrip){
                              if($desc_count == 0){continue;}
                        ?>
                     <tr>
                        <td><?php echo isset($each_pro_descrip['stage_name_value'])?$each_pro_descrip['stage_name_value']:null;?></td>
                        <td><?php echo empty($each_pro_descrip['expected_completion_date'])?'-':date('d-m-Y',strtotime($each_pro_descrip['expected_completion_date']));?></td>
                        <td><?php echo empty($each_pro_descrip['actual_completion_date'])?'-':date('d-m-Y',strtotime($each_pro_descrip['actual_completion_date']));?></td>
                        <td>
                           <?php
                              $diff = 0;
                              if(!empty($each_pro_descrip['actual_completion_date']))
                              {
                                 $date1 = new DateTime($each_pro_descrip['expected_completion_date']);
                                 $date2 = new DateTime($each_pro_descrip['actual_completion_date']);
                              
                                 $diff = $date2->diff($date1)->format("%a");
                              
                                 echo $diff;
                              }
                              else{
                                 echo '-';
                              }
                              
                              $delay_time_total = $delay_time_total+$diff;
                              ?>
                        </td>
                     </tr>
                     <?php
                        }
                        }
                        ?>
                     <tr>
                        <td colspan="7" align="center" style="background-color: cadetblue;color: white;font-size: large;font-weight: bold;">Total Delay (In Days)</td>
                        <td>
                           <h5><?php echo $delay_time_total;?></h5>
                        </td>
                     </tr>
                     <?php
                        $count_serial++;
                        }
                        }else{
                        echo "<tr><td colspan='8'>No Survey Reports found.</td></tr>";
                        }
                        ?>
                  </tbody>
               </table>
            </div>
            <div class="row-fluid">
               &nbsp;
            </div>
         </div>
      </div>
   </div>
</body>
<!-- END BODY -->
</html>