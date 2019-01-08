<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
      <title>PMAY - PMTT</title>
      <style>
         #loader{transition:all .3s ease-in-out;opacity:1;visibility:visible;position:fixed;height:100vh;width:100%;background:#fff;z-index:90000}#loader.fadeOut{opacity:0;visibility:hidden}.spinner{width:40px;height:40px;position:absolute;top:calc(50% - 20px);left:calc(50% - 20px);background-color:#333;border-radius:100%;-webkit-animation:sk-scaleout 1s infinite ease-in-out;animation:sk-scaleout 1s infinite ease-in-out}@-webkit-keyframes sk-scaleout{0%{-webkit-transform:scale(0)}100%{-webkit-transform:scale(1);opacity:0}}@keyframes sk-scaleout{0%{-webkit-transform:scale(0);transform:scale(0)}100%{-webkit-transform:scale(1);transform:scale(1);opacity:0}}

         .logo_header {
            font-size: 46px;
             text-align: center;
             padding: 6px;
             padding-top: 33px;
         }
      </style>
      <link href="<?php echo base_url();?>theme/style.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
      <!--end::Page Vendors -->
      <link href="<?php echo base_url();?>assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
      <script src="<?php echo base_url();?>public/js/sweetalert.min.js"></script>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/sweetalert.css">
      <base href="<?php echo base_url();?>">
      <link href="<?php echo base_url();?>public/css/custom.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>public/css/style-new.css" rel="stylesheet" type="text/css" />
   </head>
   <body class="app">
      <div id="loader">
         <div class="spinner"></div>
      </div>
      <script>window.addEventListener('load', () => {
         const loader = document.getElementById('loader');
         setTimeout(() => {
           loader.classList.add('fadeOut');
         }, 300);
         });
      </script>
