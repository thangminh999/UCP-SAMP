<?php

define('MT_CMS', 1);
$fileDir = dirname(__FILE__);
require($fileDir . '/library/Autoloader.php');
$fc = new THCMS_Controller_Captcha;
$fc->phpcaptcha('#162453','#fff',120,45,10,25);