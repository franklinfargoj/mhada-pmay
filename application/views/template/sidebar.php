<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
   <!-- BEGIN: Aside Menu -->
   <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " 
      data-menu-vertical="true" data-menu-scrollable="false" data-menu-dropdown-timeout="500" >
      <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
         <?php
            if($this->session->userdata('is_admin_role'))
            {
            ?>
         <li class="m-menu__item <?php if($this->router->fetch_class() === 'admin_dashboard' && $this->router->fetch_method() === 'index'){echo 'm-menu__item--active';}?>" aria-haspopup="true" >
            <a href="<?php echo base_url('admin_dashboard');?>" class="m-menu__link ">
            <i class="m-menu__link-icon flaticon-line-graph"></i>
            <span class="m-menu__link-title">
            <span class="m-menu__link-wrap">
            <span class="m-menu__link-text">
            Dashboard
            </span>
            </span>
            </span>
            <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
         </li>
         <li class="m-menu__item <?php if($this->router->fetch_class() === 'admin_dashboard' && $this->router->fetch_method() === 'district_wise_report'){echo 'm-menu__item--active';}?>" aria-haspopup="true" >
            <a href="<?php echo base_url('admin_dashboard/district_wise_report');?>" class="m-menu__link ">
            <i class="m-menu__link-icon flaticon-location"></i>
            <span class="m-menu__link-title">
            <span class="m-menu__link-wrap">
            <span class="m-menu__link-text">
            	Wetlands Statistics
            </span>
            </span>
            </span>
            <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
         </li>
         <li class="m-menu__item <?php if($this->router->fetch_class() === 'admin_dashboard' && $this->router->fetch_method() === 'user_list'){echo 'm-menu__item--active';}?>" aria-haspopup="true" >
            <a href="<?php echo base_url('admin_dashboard/user_list');?>" class="m-menu__link ">
            <i class="m-menu__link-icon flaticon-users"></i>
            <span class="m-menu__link-title">
            <span class="m-menu__link-wrap">
            <span class="m-menu__link-text">
               User List
            </span>
            </span>
            </span>
            <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
         </li>
         <?php
            }else{
            ?>
         <li class="m-menu__item <?php if($this->router->fetch_class() === 'dashboard' && $this->router->fetch_method() === 'index'){echo 'm-menu__item--active';}?>" aria-haspopup="true" >
            <a href="<?php echo base_url('dashboard');?>" class="m-menu__link ">
            <i class="m-menu__link-icon flaticon-line-graph"></i>
            <span class="m-menu__link-title">
            <span class="m-menu__link-wrap">
            <span class="m-menu__link-text">
            Dashboard
            </span>
            </span>
            </span>
            <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
         </li>
         <li class="m-menu__item <?php if($this->router->fetch_class() === 'dashboard' && in_array($this->router->fetch_method(),array('wetland_indentification','view_wetland_details'))){echo 'm-menu__item--active';}?>" aria-haspopup="true" >
            <a href="<?php echo base_url('dashboard/wetland_indentification');?>" class="m-menu__link ">
            <i class="m-menu__link-icon flaticon-location"></i>
            <span class="m-menu__link-title">
            <span class="m-menu__link-wrap">
            <span class="m-menu__link-text">
            Wetland Identification
            </span>
            </span>
            </span>
            <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
         </li>
         <?php
            }
            ?>
      </ul>
   </div>
   <!-- END: Aside Menu -->
</div>
<!-- END: Left Aside -->