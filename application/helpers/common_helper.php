<?php
function check_login()
{
	$ci =& get_instance();
	if(!$ci->session->userdata('id_of_user'))
	{
		redirect();
	}
}
function check_admin_login()
{
    $ci =& get_instance();
    if(!$ci->session->userdata('id_of_user'))
    {
        redirect();
    }
    if(!$ci->session->userdata('is_admin_role'))
    {
        redirect();
    }

    if($ci->session->userdata('is_account_role'))
    {
        redirect();
    }
}
function prevent_admin_access()
{
    $ci =& get_instance();
    if($ci->session->userdata('is_admin_role'))
    {
        show_404();
    }
}

function remember_me()
{
    $ci =& get_instance();

    if($ci->session->userdata('remember_me') && !$ci->session->userdata('is_admin_role'))
    {
        redirect('dashboard');
    }
}

function generate_scheme_number()
{
    $type = 'PROJECT';
    $ci = &get_instance();
    $ci->db->order_by('id', 'DESC');
    $ci->db->select('scheme_number');
    $application = $ci->db->get('mhada_schemes')->row();

    $prev_id = isset($application->scheme_number) ? $application->scheme_number : '';
    $prev = explode('-', $prev_id);
    $new_id = 0;
    if (isset($prev[2])) {
        $new_id = (int) $prev[2] + 1;
    } else {
        $new_id = (int) $new_id + 1;
    }

    $new_id = str_pad($new_id, 6, '0', STR_PAD_LEFT);

    return sprintf('MHADA'.'-%s-%s', $type, $new_id);
}

function generate_work_number()
{
    $type = 'WORK';
    $ci = &get_instance();
    $ci->db->order_by('id', 'DESC');
    $ci->db->select('work_number');
    $application = $ci->db->get('project_work_records')->row();

    $prev_id = isset($application->work_number) ? $application->work_number : '';
    $prev = explode('-', $prev_id);
    $new_id = 0;
    if (isset($prev[2])) {
        $new_id = (int) $prev[2] + 1;
    } else {
        $new_id = (int) $new_id + 1;
    }

    $new_id = str_pad($new_id, 6, '0', STR_PAD_LEFT);

    return sprintf('MHADA'.'-%s-%s', $type, $new_id);
}

function get_user_details($user_id)
{
    $ci = &get_instance();
    $ci->db->where('id',$user_id);
    return $ci->db->get('users')->row_array();
}

function ordinal_suffix($num){
    $num = $num % 100; // protect against large numbers
    if($num < 11 || $num > 13){
         switch($num % 10){
            case 1: return 'st';
            case 2: return 'nd';
            case 3: return 'rd';
        }
    }
    return 'th';
}

function romanic_number($integer, $upcase = true) 
{ 
    $table = array('M'=>1000, 'CM'=>900, 'D'=>500, 'CD'=>400, 'C'=>100, 'XC'=>90, 'L'=>50, 'XL'=>40, 'X'=>10, 'IX'=>9, 'V'=>5, 'IV'=>4, 'I'=>1); 
    $return = ''; 
    while($integer > 0) 
    { 
        foreach($table as $rom=>$arb) 
        { 
            if($integer >= $arb) 
            { 
                $integer -= $arb; 
                $return .= $rom; 
                break; 
            } 
        } 
    } 

    return $return; 
}

if (!function_exists('generate_captcha')) {

    function generate_captcha() {
        $CI = &get_instance();

        /*$word = sprintf(
                '%04X%04X', mt_rand(1, 65535), mt_rand(1, 65535)
        );*/

        $word = mt_rand(1000, 9999);

        $vals = array(
            'word' => $word,
            'img_path' => FCPATH . 'public/img/captcha/',
            'img_url' => base_url() . 'public/img/captcha/',
            'font_path' => FCPATH . 'public/fonts/OpenSans-Regular-webfont.ttf',
            'img_width' => '200',
            'word_length'   => 8,
            'img_height' => 50,
            'expiration' => 7200,
            'pool' => '123456789ABCDEFGHIJKLMNPQRSTUVWXYZ',
        );
        $captcha = create_captcha($vals);
        $CI->session->set_userdata('captcha', $captcha);
        return $captcha;
    }

}

if (!function_exists('generate_unique_id')) {

    function generate_unique_id() {
        return sprintf('%04X%04X%04X%04X%04X%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

}

function send_sms($mobile, $message, $time = "201304191320") {

    $url = "http://bulkpush.mytoday.com/BulkSms/SingleMsgApi?feedid=355748&username=9987512960&password=ampjg&To=$mobile&Text=" . urlencode($message) . "&time=$time";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $output = curl_exec($ch);
    curl_close($ch);

    $response = ((array) simplexml_load_string($output));
}

if (!function_exists('url_manupulation')) {

    function url_manupulation() {
       if( !isset($_SERVER['HTTP_REFERER']) || strpos($_SERVER['HTTP_REFERER'], base_url()) === false || empty($_SERVER['HTTP_REFERER'])) {
           show_error('Permission Denied.You are not allowed to access this page');
         }
    }
}

function generate_password($lenght = 4) {
    return bin2hex(openssl_random_pseudo_bytes($lenght));
} 

?>