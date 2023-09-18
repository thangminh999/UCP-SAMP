<?php

define('MT_CMS', 1);
$fileDir = dirname(__FILE__);
require($fileDir . '/library/Autoloader.php');
$credits = (50000 / 10);
THCMS_Controller_Function::UpdateAddCredits($credits,'11');