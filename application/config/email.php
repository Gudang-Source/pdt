<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


$config['from'] = 'noreply@spps.com';
$config['from_name'] = 'noreply@spps.com';
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'ssl://smtp.gmail.com';
$config['smtp_port'] = 465;
$config['smtp_user'] = 'noreply.spps@gmail.com';
$config['smtp_pass'] = '@admin234#';
$config['smtp_timeout'] = 30;
$config['mailtype'] = 'html';
$config['charset'] = 'iso-8859-1';
$config['priority'] = 1;
$config['newline'] = "\r\n";
$config['crlf'] = "\r\n";
/* End of file email.php */
/* Location: ./application/config/email.php */
?>