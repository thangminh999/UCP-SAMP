<?php

define('MT_CMS', 1);
$fileDir = dirname(__FILE__);
$rootPath = realpath($fileDir . '/../..');
chdir($rootPath);
require($rootPath . '/library/Autoloader.php');
  	setcookie('cuid', '');
    setcookie('cups', '');
    setcookie('pincode', '');
    session_destroy();
    header('Location: ' . $system['url'] . '');