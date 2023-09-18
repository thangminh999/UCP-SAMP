<?php

define('ROOTPATH', dirname(__FILE__));
defined('MT_CMS') or die('Lỗi: Truy Cập Hệ Thống');
/*
-----------------------------------------------------------------
Lỗi báo cáo (E_ALL & ~ E_NOTICE)
-----------------------------------------------------------------
*/
ob_start();
ini_set('session.use_trans_sid', '0');
ini_set('arg_separator.output', '&amp;');
ini_set('display_errors', 'ON');
date_default_timezone_set('UTC');
//date_default_timezone_set('Asia/Ho_Chi_Minh');
mb_internal_encoding('UTF-8');

function customError($errno, $errstr) {
  echo "<b>Error:</b> [$errno] $errstr<br>";
  echo "Ending Script";
  die();
}

//set error handler
set_error_handler("customError",E_USER_WARNING);
/*
-----------------------------------------------------------------
Các lớp Autoloading
-----------------------------------------------------------------
*/
spl_autoload_register('autoload');
function autoload($name)
{
    $file = autoloaderClassToFile($name);
    if (file_exists($file))
        require_once($file);
}
function autoloaderClassToFile($class)
	{
		if (preg_match('#[^a-zA-Z0-9_\\\\]#', $class))
		{
			return false;
		}

		return ROOTPATH .'/' . str_replace(array('_', '\\'), '/', $class) . '.php';
	}
/**
 * Khai báo Class Controller
 */
new THCMS_Controller;
/**
 * Chuyển đổi biến từ THCMS_Conntroler áp dụng vào coder
 */
$connect = THCMS_Controller::$connect;
//$connect_xenforo = THCMS_Controller::$connect_xenforo; 
$system = THCMS_Controller::$system_set; // info System
$user_id = THCMS_Controller::$user_id; // user true and false
$datauser = THCMS_Controller::$user_data; // user array

/**
 * Biến thường dùng
 */
$id = isset($_REQUEST['id']) ? abs(intval($_REQUEST['id'])) : false;
$style = isset($_REQUEST['style']) ? trim($_REQUEST['style']) : '';
$js = isset($_REQUEST['js']) ? trim($_REQUEST['js']) : '';
$token = isset($_REQUEST['token']) ? trim($_REQUEST['token']) : '';
$type = isset($_REQUEST['type']) ? trim($_REQUEST['type']) : '';
$user = isset($_REQUEST['user']) ? trim($_REQUEST['user']) : '';
$load = isset($_REQUEST['load']) ? trim($_REQUEST['load']) : '';
$headmod = isset($headmod) ? $headmod : '';
