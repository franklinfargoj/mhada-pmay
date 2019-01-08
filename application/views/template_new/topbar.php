<div>
<div class="sidebar">
   <div class="sidebar-inner">
      <div class="sidebar-logo">
            <a class="sidebar-link td-n" href="<?php echo base_url('schemes/dashboard');?>">
               <div class="logo">
                  <div class="logo_header">                     
                     <img src="<?php echo base_url();?>assets/app/media/img//logos/MHADA-Logo.jpg" width="100%" alt="">
                  </div>
               </div>                     
               <div class="peer peer-greed"> </div>                  
            </a>
            <div class="peer">
               <div class="mobile-toggle sidebar-toggle"><a href="" class="td-n"><i class="ti-arrow-circle-left"></i></a></div>
            </div>
      </div>
      <?php
         $admin_role = $this->session->userdata('is_admin_role');
         $is_agency_role = $this->session->userdata('is_agency_role');
      ?>
      <ul class="sidebar-menu scrollable pos-r">
         <li class="nav-item"><a class="sidebar-link" href="<?php echo base_url('schemes/dashboard');?>"><span class="icon-holder"><i class="c-blue-500 ti-home"></i> </span><span class="title">Dashboard</span></a></li>
         <?php
            if($admin_role){
         ?>
         <li class="nav-item <?php if(current_url()==base_url('projects') ) { ?> active <?php } ?>"><a class="sidebar-link" href="<?php echo base_url('projects');?>"><span class="icon-holder"><i class="c-red-500 ti-files"></i> </span><span class="title">Projects</span></a></li>
         <li class="nav-item <?php if(current_url()==base_url('agencies') ) { ?> active <?php } ?>"><a class="sidebar-link" href="<?php echo base_url('agencies');?>"><span class="icon-holder"><i class="c-red-500 ti-files"></i> </span><span class="title">Agencies</span></a></li>
        <!-- <li class="nav-item"><a class="sidebar-link" href="<?php echo base_url('masters');?>"><span class="icon-holder"><i class="c-orange-500 ti-layout-list-thumb"></i> </span><span class="title">Manage Masters</span></a></li>
         <li class="nav-item"><a class="sidebar-link" href="<?php echo base_url('users');?>"><span class="icon-holder"><i class="c-deep-orange-500 ti-calendar"></i> </span><span class="title">Users</span></a></li>-->
         <?php
            } elseif($is_agency_role)
            { ?>
                <li class="nav-item active"><a class="sidebar-link" href="<?php echo base_url('agency/projects');?>"><span class="icon-holder"><i class="c-red-500 ti-files"></i> </span><span class="title">Projects</span></a></li>

          <?php  }
         ?>
      </ul>
   </div>
</div>
<div class="page-container">
<div class="header navbar">
   <div class="header-container text-center">
      <ul class="nav-left">
         <li class="mob-sidebar"><a id="sidebar-toggle" class="sidebar-toggle" href="javascript:void(0);"><i class="ti-menu"></i></a></li>
         <li>
            <div class="logo">
               <div class="logo_header">
                  <!-- <img src="<?php echo base_url();?>assets/app/media/img//logos/mhada_logo.png" width="210"> -->
                  <img src="<?php echo base_url();?>assets/app/media/img//logos/logo.png" width="400" alt="">
               </div>
            </div>  
         </li>
      </ul>
      <h3 class="partal-heading">PMAY - PMTT</h3>
      <ul class="nav-right">
         <li class="dropdown">
            <a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" data-toggle="dropdown">
               <div class="peer mR-10">
                  <!-- <img class="w-2r bdrs-50p" src="<?php echo base_url();?>assets/app/media/img/users/my_profile.png" alt=""> -->
                  <i class="ti-user" aria-hidden="true"></i>
               </div>
                <?php if($is_agency_role)
                { ?>
                    <div class="peer"><span class="fsz-sm c-grey-900"><?php echo $this->session->userdata('name_of_agency');?></span></div>
                <?php } else { ?>
               <div class="peer"><span class="fsz-sm c-grey-900"><?php echo $this->session->userdata('name_of_user');?></span></div>
                <?php } ?>
            </a>
            <ul class="dropdown-menu fsz-sm">
                <?php if($is_agency_role)
                { ?>
                    <li><a href="<?php echo base_url('login/agency_logout');?>" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-power-off mR-10"></i> <span>Logout</span></a></li>
                <?php } else
                {
                    ?>
               <li><a href="<?php echo base_url('login/logout');?>" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-power-off mR-10"></i> <span>Logout</span></a></li>
            <?php } ?>
            </ul>
         </li>
      </ul>
   </div>
</div>
