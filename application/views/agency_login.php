<!DOCTYPE html>
<html lang="en" >
   <!-- begin::Head -->
   <head>
      <meta charset="utf-8" />
      <title>
         MHADA
      </title>
      <meta name="description" content="MHADA">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!--begin::Web font -->
      <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
      <script>
         WebFont.load({
           google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
           active: function() {
               sessionStorage.fonts = true;
           }
         });
      </script>
      <!--end::Web font -->
      <!--begin::Base Styles -->
      <link href="<?php echo base_url();?>assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>public/css/login-custom.css" rel="stylesheet" type="text/css" />
      <!--end::Base Styles -->
      <link rel="shortcut icon" href="<?php echo base_url();?>assets/demo/default/media/img/logo/favicon.ico" />

      <style>
         input{
         padding: 0.8rem 1.5rem !important;
         }
      </style>
      
   </head>
   <!-- end::Head -->
   <!-- end::Body -->
   <body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
      <!-- begin:: Page -->
      <div class="m-grid m-grid--hor m-grid--root m-page">
         <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--singin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url(<?php echo base_url();?>assets/app/media/img//bg/bg-3.jpg);">
             <div class="m-login__logo text-center">
               <a href="#">
               <img src="<?php echo base_url();?>assets/app/media/img//logos/mhada_logo.png" width="390">
               </a>
            </div>
            <div class="m-grid__item m-grid__item--fluid m-login__wrapper">
               <div class="m-login__container">
                  <div class="m-login__signin">
                     <div class="m-login__head">
                        <h3 class="m-login__title">
                           PROJECT MANAGEMENT TRACKING TOOL
                        </h3>
                     </div>
                     <?php
                        if($this->session->flashdata('error'))
                        {
                        ?>
                     <div class="m-alert m-alert--outline m-alert--outline-2x alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                        <strong>
                        Error!
                        </strong>
                        <?php echo $this->session->flashdata('error');?>
                     </div>
                     <?php
                        }
                        ?>
                     <?php
                        if($this->session->flashdata('success'))
                        {
                        ?>
                     <div class="m-alert m-alert--outline m-alert--outline-2x alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                        <strong>
                        Success!
                        </strong>
                        <?php echo $this->session->flashdata('success');?>
                     </div>
                     <?php
                        }
                        ?>
                     <?php echo form_open('','class="m-login__form m-form" id="sign_in_form"');?>
                     <div class="form-group m-form__group">
                        <input class="form-control m-input" type="text" placeholder="Username" name="username" autocomplete="off">
                     </div>
                     <div class="form-group m-form__group">
                        <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password">
                     </div>
                     <div class="form-group">
                        <div class="fullwidth">
                           <br>
                           <center><?php echo $captcha['image']; ?></center>
                        </div>
                     </div>
                     <div class="form-group m-form__group">
                        <input class="form-control m-input" type="text" placeholder="Enter above captcha" name="verification_code">
                     </div>
                     <div class="m-login__form-action">
                        <input type="hidden" name="submit_type" value="sign_in">
                        <button id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--custom m-login__btn m-login__btn--primary" type="submit">
                        Sign In
                        </button>
                     </div>
                     <?php echo form_close();?>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end:: Page -->
      <script>
         var BASE_URL = "<?php echo base_url();?>";
      </script>
      <!--begin::Base Scripts -->
      <script src="<?php echo base_url();?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
      <!--end::Base Scripts -->
      <!--begin::Page Snippets -->
      <script src="<?php echo base_url();?>assets/snippets/pages/user/login.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/sliding.js" type="text/javascript"></script>
      <!--end::Page Snippets -->
   </body>
   <!-- end::Body -->
</html>