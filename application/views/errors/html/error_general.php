
<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7 ie" lang="en" dir="ltr"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8 ie" lang="en" dir="ltr"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9 ie" lang="en" dir="ltr"><![endif]-->
<!--[if gt IE 8]> <html class="no-js gt-ie8 ie" lang="en" dir="ltr"><![endif]-->

<head>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="shortcut icon" href="favicon.ico" />
<title>ERROR</title>
<!-- <link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet" type="text/css" media="all"> -->
<style type="text/css">
/*======= ENCOUNTERED-ERROR ======*/
/*section-starts*/
section.encountered_error_page { display: block; width: 100%;}
.error_description { display: block; margin-top: 30px; text-align: center;}
.error_description h2 { display: block; font-size: 35px; margin-bottom: 15px; color: #0065cd;}
.error_description p { display: block; font-size: 16px; color: #444444; line-height: 22px;}
/*section-ends*/

</style>
</head>

<body> 


<!--section-starts-->
<div class="wrapper">
 <section class="encountered_error_page">
    <div class="error_description">
      <h2><?php echo $heading; ?></h2>
      <p><?php echo $message; ?></p>
    </div>
 </section>
</div> 
<!--section-starts-->


</body>
</html>