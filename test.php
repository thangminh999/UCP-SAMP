<?php

define('MT_CMS', 1);
$fileDir = dirname(__FILE__);
require($fileDir . '/library/Autoloader.php');
$a = THCMS_Controller_Function::TotalAmountMoMo('AmountUser');
echo $a['Amount'];
?>