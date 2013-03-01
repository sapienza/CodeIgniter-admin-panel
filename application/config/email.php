<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'ssl://smtp.googlemail.com';
$config['smtp_port'] = 465;
$config['smtp_user'] = 'nettutsTutorials@gmail.com';
$config['smtp_pass'] = 'nettuts-tutorials';
*/

$config['protocol'] = 'sendmail';
$config['mailpath'] = '/usr/sbin/sendmail';
$config['charset'] = 'iso-8859-1';
$config['wordwrap'] = TRUE;