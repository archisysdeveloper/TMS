<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['email_sender'] = 'apes@archisys.biz'; // default sender use in programs
$config['email_sender_name'] = 'apes'; // default sender name
/*------------------------------------------------------*/


$config['protocol']='smtp';
$config['smtp_host']='ssl://smtp.googlemail.com';
$config['smtp_port']=465;
$config['smtp_timeout']=30;
$config['smtp_user']='archisysapes@gmail.com';
$config['smtp_pass']='Reset@123';
$config['charset']='utf-8';  
$config['newline']="\r\n";
$config['mailtype'] = 'html';


/* end of file */