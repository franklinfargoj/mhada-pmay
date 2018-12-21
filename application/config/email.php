<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| SENDING EMAIL
|--------------------------------------------------------------------------
|
| This item determines which server global should be used to retrieve the
| URI string.  The default setting of 'AUTO' works for most servers.
| If your links do not seem to work, try one of the other delicious flavors:
|
| 'AUTO'			Default - auto detects
| 'PATH_INFO'		Uses the PATH_INFO
| 'QUERY_STRING'	Uses the QUERY_STRING
| 'REQUEST_URI'		Uses the REQUEST_URI
| 'ORIG_PATH_INFO'	Uses the ORIG_PATH_INFO
|
*/

//$config['protocol'] = "smtp";    //The mail sending protocol.  mail, sendmail, or smtp
//$config['smtp_host'] = "mail.mpcb.gov.in";
//$config['smtp_port'] = "25";
//$config['smtp_user'] = "portalsupport@mpcb.gov.in";
//$config['smtp_pass'] = "Welcome123";
/*$config['protocol'] = 'smtp';
$config['smtp_host'] = 'ssl://smtp.googlemail.com';
$config['smtp_port'] = 465;
$config['smtp_user'] = 'mpcbportal@gmail.com';
$config['smtp_pass'] = '^Lpd6sn3nvg}@pDx';*/

// $config['protocol'] = 'smtp';
// $config['smtp_host'] = 'mail.wwindia.com';
// $config['smtp_port'] = 25;
// $config['smtp_user'] = 'vinay.patil@wwindia.com';
// $config['smtp_pass'] = 'vinay@123';

/*$config['protocol'] = "smtp"; 
$config['smtp_host'] = "mail.mpcb.gov.in";
$config['smtp_port'] = "25";
$config['smtp_user'] = "portalsupport@mpcb.gov.in";
$config['smtp_pass'] = "welcome";*/
/*$config['smtp_crypto'] = 'tls';*/
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'smtp.falconide.com';
$config['smtp_port'] = 25;
$config['smtp_user'] = 'mpcb';
$config['smtp_pass'] = 'Aso@1234';
$config['mailtype'] = 'html';
$config['charset'] = "utf-8";
$config['newline'] = "\r\n";
