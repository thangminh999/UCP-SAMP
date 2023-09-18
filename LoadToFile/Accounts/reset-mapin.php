<?php

define('MT_CMS', 1);
$fileDir = dirname(__FILE__);
$rootPath = realpath($fileDir . '/../..');
chdir($rootPath);
require($rootPath . '/library/Autoloader.php');
$keywords = isset($keywords) ? htmlspecialchars($keywords) : $system['keywords'];
$description = isset($description) ? htmlspecialchars($description) : $system['description'];
echo'<!DOCTYPE html>' .
    "\n" . '<html lang="vi">' .
    "\n" . '<head>' .
    "\n" . '<meta charset="utf-8">' .
    "\n" . '<meta http-equiv="X-UA-Compatible" content="IE=edge">' .
    "\n" . '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=yes">' .
    "\n" . '<meta name="HandheldFriendly" content="true">' .
    "\n" . '<meta name="MobileOptimized" content="width">' .
    "\n" . '<meta content="yes" name="apple-mobile-web-app-capable">' .
    "\n" . '<meta name="Generator" content="' . $system['title'] . ',' . $system['url'] . '">' .
    "\n" . '<meta name="keywords" content="' . $keywords . '">'.
    "\n" . '<meta name="description" content="' . $description . '">'.
    "\n" . '<!-- ================== BEGIN BASE CSS STYLE ================== -->'.
	"\n" . '<link href="' . $system['url'] . '/css.php?style=default" rel="stylesheet" />'.
	"\n" . '<!-- ================== END BASE CSS STYLE ================== -->'.
	"\n" . '<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->'.
	"\n" . '<!-- ================== END PAGE LEVEL STYLE ================== -->'.
	"\n" . '<!-- ================== BEGIN BASE JS ================== -->'.
	"\n" . '<script src="' . $system['url'] . '/assets/plugins/pace/pace.min.js"></script>'.
	"\n" . '<!-- ================== END BASE JS ================== -->'.
    "\n" . '<title>Khôi phục mã PIN</title>'.
     "\n" . '</head><body class="pace-top">' ;
echo '<!-- begin #page-loader -->'.
    "\n" . '<div id="page-loader" class="fade show"><span class="spinner"></span></div>'.
    "\n" . '<!-- end #page-loader -->'.
    "\n" . '<div class="login-cover">'.
        "\n" . '<div class="login-cover-image" style="background-image: url(/assets/img/login-bg/login-bg-17.jpg)" data-id="login-cover-image"></div>'.
        "\n" . '<div class="login-cover-bg"></div>'.
    "\n" . '</div>'.
    "\n" . '<!-- begin #page-container -->'.
    "\n" . '<div id="page-container" class="fade">'.
        "\n" . '<!-- begin login -->'.
        "\n" . '<div class="login bg-white-transparent-1 animated fadeInDown">'.
            "\n" . '<!-- begin brand -->'.
            "\n" . '<div class="login-header">'.
                "\n" . '<div class="brand">'.
                        "\n" . '<img alt="' . $system['title'] . '" title="" height="auto" src="' . $system['logo_img'] . '" width="' . $system['logo_img_width'] . '"> ' . $system['logo_text'] . ''.
                        "\n" . '<small>Khôi phục mã pin</small>'.
                "\n" . '</div>'.
                "\n" . '<div class="icon">'.
                    "\n" . '<i class="fa fa-envelope"></i>'.
                "\n" . '</div>'.
            "\n" . '</div>'.
            "\n" . '<!-- end brand -->'.
            "\n" . '<!-- begin login-content -->'.
            "\n" . '<div class="login-content">';
                    if (isset($_POST['submit'])) {
                            $error = array();
                            $captcha = isset($_POST['captcha']) ? trim($_POST['captcha']) : NULL;
                            $email = isset($_POST['email']) ? trim($_POST['email']) : '';
                             if (empty($email)) {
                                sleep(1); 
                                $error['email'][] = '<h4 class="text-danger"><strong>Email không được bỏ trống</strong></h4>';
                            }elseif (THCMS_Controller_Function::is_email($email)) {
                                sleep(1); 
                                $error['email'][] = '<h4 class="text-danger"><strong>Email không đúng định dạng</strong></h4>';
                            }
                            if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha']) != 0){ 
                                sleep(1); 
                                $error['captcha'][] = '<h4 class="text-danger"><strong>Captcha không đúng</strong></h4>';     
                            }
                            if (empty($error)) {
                               if (THCMS_Controller_Function::KiemTraEmail($email)) {
                                sleep(1); 
                                $error['check_db'][]  = '<div class="alert alert-danger fade show">Email không tồn tại trên hệ thống</div>';
                                }else{
                                    
                                    $randtoken = THCMS_Controller_Function::Hash_MD5(time());
                                    $get_accounts = THCMS_Controller_Function::GetMailAccounts($email);
                                    $getmail = THCMS_Controller_Function::GetMailler(4);
                                    $tieude = $getmail['tieude'];
                                    $title = $getmail['title'];
                                    $noidung = $getmail['noidung'];
                                    $array = array('[ACCOUNT]', '[TOKEN]','[URL]','[RSPCD]','[LOGO_TEXT]','[COPYRIGHT]');
                                    $array_replace = array($get_accounts['Username'], $randtoken, $system['url'], 'Auth/Mailer/ResetPincode', $system['logo_text'],$system['copyright']);
                                    $doilenh = str_replace($array, $array_replace, $noidung);
                                    $to = $email;
                                    $name = $get_accounts['Username'];
                                     if(THCMS_Controller_Function::SaveTokenResetPincode($randtoken,$get_accounts['id'])){
                                        $error['check_db'][]  = THCMS_Controller_Mailer::SendMail($to, $name, $doilenh, $tieude, $title);
                                    }else{
                                        $error['check_db'][]  = '<div class="alert alert-danger fade show">Hệ thống đã gứi 1 tin nhắn vào email: <b>'.$to.' </b><br>Vui lòng kiểm tra  <b>Hộp thư đến & Spam </b><br>Tuy nhiên khi lưu Token và Time ResetPassword bị lỗi, vui lòng báo lỗi này tới admin để được giải quyết</div>';
                                    }

                                }
                            }
                    }  
                echo"\n" . '<form action="" method="POST" class="margin-bottom-0">'.
                 (isset($error['check_db']) ? '' . implode('', $error['check_db']) . '' : '') .
                    "\n" . '<div class="form-group m-b-20">'.
                      (isset($error['email']) ? '' . implode('', $error['email']) . '' : '') .
                        "\n" . '<input type="email"  name="email" class="form-control form-control-lg inverse-mode" placeholder="Email Address" autocomplete="off" required />'.
                    "\n" . '</div>'.
                     (isset($error['captcha']) ? '' . implode('', $error['captcha']) . '' : '') .
                     "\n" . '<div class="row form-group m-b-20">'.
                     "\n" . '<div class="col-sm-6">'.
                        "\n" . '<input type="text" name="captcha" class="form-control form-control-lg inverse-mode" placeholder="Enter Captcha IMG" autocomplete="off" required />'.
                    "\n" . '</div>'.  
                    "\n" . '<div class="col-sm-4">'.
                        "\n" . '<img src="' . $system['url'] . '/captcha.php?rand='.rand().'" id="captchaimg">'.
                    "\n" . '</div>'.  
                    "\n" . '<div class="col-sm-2">'.
                        "\n" . '<a href="javascript: refreshCaptcha();" class="btn btn-success btn-icon btn-circle btn-lg"><i class="fa fa-sync fa-spin"></i></a>'.
                     "\n" . '</div>'.
                    "\n" . '</div>'.
                    "\n" . '<div class="login-buttons">'.
                        "\n" . '<button type="submit" name="submit" class="btn btn-primary btn-block btn-lg">Reset PinCode</button>'.
                    "\n" . '</div>'.
                     "\n" . '<div class="row form-group m-t-20 ">'.
                     "\n" . '<div class="col-sm-4">'.
                       "\n" . '<div class="text-left"><a href="' . $system['url'] . '/Login" class="btn btn-success m-r-5 m-b-5">Đăng Nhập</a></div>'.
                       "\n" . '</div>'.     
                        "\n" . '<div class="col-sm-4">'.
                        "\n" . '<div class="text-center"><a href="' . $system['url'] . '/ResetPassword" class="btn btn-lime m-r-5 m-b-5">Quên Mật Khẩu</a></div>'.
                       "\n" . '</div>'. 
                        "\n" . '<div class="col-sm-4">'.
                        "\n" . '<div class="text-right"><a href="#" class="btn btn-purple m-r-5 m-b-5">Quên Mã Pin</a></div>'.
                       "\n" . '</div>'.   
                        "\n" . '</div>'.
                "\n" . '</form>'.
            "\n" . '</div>'.
            "\n" . '<!-- end login-content -->'.
        "\n" . '</div>'.
        "\n" . '<!-- end login -->'.
    "\n" . '</div>'.
    "\n" . '<!-- end page container -->';

	echo '<!-- ================== BEGIN BASE JS ================== -->'.
	"\n" . '<script src="' . $system['url'] . '/assets/plugins/jquery/jquery-3.2.1.min.js"></script>'.
	"\n" . '<script src="' . $system['url'] . '/assets/plugins/jquery-ui/jquery-ui.min.js"></script>'.
	"\n" . '<script src="' . $system['url'] . '/assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>'.
	"\n" . '<script src="' . $system['url'] . '/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>'.
	"\n" . '<script src="' . $system['url'] . '/assets/plugins/js-cookie/js.cookie.js"></script>'.
	"\n" . '<script src="' . $system['url'] . '/assets/js/theme/transparent.min.js"></script>'.
	"\n" . '<script src="' . $system['url'] . '/assets/js/apps.min.js"></script>'.
	"\n" . '<!-- ================== END BASE JS ================== -->';

	echo '<script>'.
		"\n" . '$(document).ready(function() {'.
		"\n" . '	App.init();'.
           "\n" . ' LoginV2.init();'.
		"\n" . '});'.
         "\n" . 'function refreshCaptcha(){'.
    "\n" . 'var img = document.images["captchaimg"];'.
    "\n" . 'img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;'.
    "\n" . '}'.
		"\n" . '</script>'.
"\n" . '</body>'.
"\n" . '</html>';
?>