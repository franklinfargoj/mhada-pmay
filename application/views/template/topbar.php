<header class="m-grid__item    m-header "  data-minimize-offset="200" data-minimize-mobile-offset="200" >
   <div class="m-container m-container--fluid m-container--full-height">
      <div class="m-stack m-stack--ver m-stack--desktop">
         <!-- BEGIN: Brand -->
         <div class="m-stack__item m-brand  m-brand--skin-dark ">
            <div class="m-stack m-stack--ver m-stack--general">
               <div class="m-stack__item m-stack__item--middle m-brand__logo">
                  <a class="m-brand__logo-wrapper">
                  <img alt="" style="width: 58%;" src="<?php echo base_url();?>assets/app/media/img/logos/isro_logo.png"/>
                  </a>
               </div>
               <div class="m-stack__item m-stack__item--middle m-brand__tools">
                    <a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block" style="float: left">
                     <span></span>
                   </a>       
               </div>
               <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
                  <div class="m-stack__item m-topbar__nav-wrapper">
                     <ul class="m-topbar__nav m-nav m-nav--inline">
                        <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">
                           <a href="#" class="m-nav__link m-dropdown__toggle">
                           <span class="m-topbar__userpic">
                           <img src="<?php echo base_url();?>assets/app/media/img/users/my_profile.png" class="m--img-rounded m--marginless m--img-centered" alt=""/>
                           </span>
                           </a>
                           <div class="m-dropdown__wrapper">
                              <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                              <div class="m-dropdown__inner">
                                 <div class="m-dropdown__header m--align-center" style="background: url(assets/app/media/img/misc/user_profile_bg.jpg); background-size: cover;">
                                    <div class="m-card-user m-card-user--skin-dark">
                                       <div class="m-card-user__pic">
                                          <img src="<?php echo base_url();?>assets/app/media/img/users/my_profile.png" class="m--img-rounded m--marginless" alt=""/>
                                       </div>
                                       <div class="m-card-user__details">
                                          <span class="m-card-user__name m--font-weight-500">
                                             <?php echo $this->session->userdata('name_of_user');?>
                                          </span>
                                          <a class="m-card-user__email m--font-weight-300 m-link">
                                             <?php echo $this->session->userdata('email_of_user');?>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="m-dropdown__body">
                                    <div class="m-dropdown__content">
                                       <ul class="m-nav m-nav--skin-light">
                                          <li class="m-nav__item">
                                             <a href="<?php echo base_url('dashboard/my_profile');?>" class="m-nav__link">
                                                <i class="m-nav__link-icon flaticon-profile-1"></i>
                                                <span class="m-nav__link-title">
                                                   <span class="m-nav__link-wrap">
                                                         <span class="m-nav__link-text">
                                                               My Profile
                                                         </span>
                                                   </span>
                                                </span>
                                             </a>
                                          </li>
                                          <li class="m-nav__separator m-nav__separator--fit"></li>
                                          <li class="m-nav__item">
                                             <a href="<?php echo base_url('login/change_password');?>" class="m-nav__link">
                                                <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                <span class="m-nav__link-title">
                                                   <span class="m-nav__link-wrap">
                                                         <span class="m-nav__link-text">
                                                            Change Password
                                                         </span>
                                                   </span>
                                                </span>
                                             </a>
                                          </li>
                                          <li class="m-nav__separator m-nav__separator--fit"></li>
                                          <li class="m-nav__item">
                                             <a href="<?php echo base_url('login/logout');?>" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
                                             Logout
                                             </a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <!-- END: Brand -->
      </div>
   </div>
</header>
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
<!-- BEGIN: Header -->
<!-- END: Header -->
<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
<!-- BEGIN: Left Aside -->
<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
<i class="la la-close"></i>
</button>