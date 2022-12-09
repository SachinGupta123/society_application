<?php

/* application/config/email.php */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| SendGrid Setup
|--------------------------------------------------------------------------
|
| All we have to do is configure CodeIgniter to send using the SendGrid
| SMTP relay:
*/
$config['protocol']	= 'smtp';
$config['smtp_port']	= '587';
$config['smtp_host']	= 'smtp-relay.sendinblue.com';
$config['smtp_user']	= 'minas.s@paynet.co.in';
$config['smtp_pass']	= 'RtWvksnQ30rhzgIJ';
$config['mailtype'] = 'html';
$config['charset'] = 'iso-8859-1';
$config['wordwrap'] = TRUE;