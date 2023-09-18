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
    "\n" . '<title>Xác Nhận Mã Pin</title>'.
     "\n" . '</head><body class="pace-top bg-black-darker">' ;
     if(!$user_id){
        header('Location: ' . $system['url'] . '/Login');
        exit();
     }elseif (isset($_COOKIE['pincode'])){ 
         header('Location: ' . $system['url'] . '');
          exit();
    }

echo '<!-- begin #page-loader -->'.
    "\n" . '<div id="page-loader" class="fade show"><span class="spinner"></span></div>'.
    "\n" . '<!-- end #page-loader -->';
echo '<!-- begin #page-container -->'.
    "\n" . '<div id="page-container" class="fade">'.
        "\n" . '<!-- begin login -->'.
        "\n" . '<div class="login login-with-news-feed">'.
            "\n" . '<!-- begin news-feed -->'.
            "\n" . '<div class="news-feed">'.
                "\n" . '<div class="news-image" style="background-image: url(' . $system['url'] . '/assets/img/login-bg/bg-login.jpg)"></div>'.
                
            "\n" . '</div>'.
            "\n" . '<!-- end news-feed -->'.
            "\n" . '<!-- begin right-content -->'.
            "\n" . '<div class="right-content">'.
                "\n" . '<!-- begin login-header -->'.
                "\n" . '<div class="login-header">'.
                    "\n" . '<div class="brand">'.
                        "\n" . '<img alt="' . $system['title'] . '" title="" height="auto" src="' . $system['logo_img'] . '" width="' . $system['logo_img_width'] . '"> ' . $system['logo_text'] . ''.
                        "\n" . '<small>Xác Nhận Mã Pin</small>'.
                    "\n" . '</div>'.
                    "\n" . '<div class="icon">'.
                        "\n" . '<i class="fa fa-sign-in"></i>'.
                    "\n" . '</div>'.
                "\n" . '</div>'.
                "\n" . '<!-- end login-header -->'.
                "\n" . '<!-- begin login-content -->'.
                "\n" . '<div class="login-content">';
                $accounts = isset($_POST['accounts']) ? trim($_POST['accounts']) : '';
                $pincode = isset($_POST['pincode']) ? trim($_POST['pincode']) : '';
                $remember = isset($_POST['remember']) ? 1 : 0;
                    if (isset($_POST['submit'])) {
                        $error = array();
                        $yeucau = "/^[A-Z\a-z_]+_[A-Z\a-z]/";
                        if (empty($accounts)) {
                         sleep(1);   
                             $error['accounts'][] = '<h4 class="text-danger"><strong>Phát hiện Bug Code</strong></h4>';
                        }elseif ($datauser['Username'] != $accounts) {
                        sleep(1); 
                         $error['accounts'][] = '<h4 class="text-danger"><strong>Phát hiện Bug Code</strong></h4>';
                        }
                       if (empty($pincode)) {
                        sleep(1); 
                        $error['pincode'][] = '<h4 class="text-danger"><strong>Mã pin không được bỏ trống</strong></h4>';
                       }/*elseif (mb_strlen($pincode) > 4) {
                        sleep(1); 
                          $error['pincode'][] = '<h4 class="text-danger"><strong>Mã pin chỉ cho phép là số và 4 ký tự</strong></<h4>';
                        }elseif (THCMS_Controller_Function::is_number($pincode)) {
                                sleep(1); 
                                $error['pincode'][] = '<h4 class="text-danger"><strong>Mã pin chỉ cho phép là số và 4 ký tự</strong></h4>';
                            }*/
                        if (empty($error)) {
                         $Hash_Whirlpool = THCMS_Controller_Function::Hash_Whirlpool($pincode);   
                            if ($Hash_Whirlpool != $datauser['Pin']) {
                                sleep(1); 
                                $error['check_db'][] = '<h4 class="text-danger"><strong>Mã pin không chính xác</strong></<h4>';
                               
                            }else{
                                 sleep(5);   
                                   
                                    $CKPin = base64_encode($datauser['Pin']);
                                    setcookie("pincode", $CKPin, time() + 3600 * 24*1);
                                    header('Location: ' . $system['url'] . '');
                                
                            }
                        
                        }


                    }

                    echo "\n" . '<form action="" method="post" class="margin-bottom-0">'.
                        "\n" . '<div class="form-group m-b-15">'.
                        (isset($error['check_db']) ? '' . implode('', $error['check_db']) . '' : '') .
                        (isset($error['accounts']) ? '' . implode('', $error['accounts']) . '' : '') .
                            "\n" . '<input type="text" name="accounts" class="form-control form-control-lg" placeholder="Tên tài khoản" autocomplete="off" value="'.$datauser['Username'].'" readonly/>'.
                        "\n" . '</div>'.
                        "\n" . '<div class="form-group m-b-15">'.
                         (isset($error['pincode']) ? '' . implode('', $error['pincode']) . '' : '') .
                            "\n" . '<input type="text" name="pincode" class="form-control form-control-lg" placeholder="Nhập mã pin" autocomplete="off" maxlength="4" />'.
                        "\n" . '</div>'.
                        "\n" . '<div class="login-buttons">'.
                            "\n" . '<button type="submit" name="submit" class="btn btn-primary btn-block btn-lg">Check Pincode</button>'.
                        "\n" . '</div>'.
                         "\n" . '<div class="row form-group m-t-20 ">'.
                     "\n" . '<div class="col-sm-4">'.
                       "\n" . '<div class="text-left"><a href="#" class="btn btn-success m-r-5 m-b-5">Đăng Nhập</a></div>'.
                       "\n" . '</div>'.     
                        "\n" . '<div class="col-sm-4">'.
                        "\n" . '<div class="text-center"><a href="'. $system['url'] . '/ResetPassword" class="btn btn-lime m-r-5 m-b-5">Quên Mật Khẩu</a></div>'.
                       "\n" . '</div>'. 
                        "\n" . '<div class="col-sm-4">'.
                        "\n" . '<div class="text-right"><a href="' . $system['url'] . '/ResetPinCode" class="btn btn-purple m-r-5 m-b-5">Quên Mã Pin</a></div>'.
                       "\n" . '</div>'.   
                        "\n" . '</div>'.
                        "\n" . '<hr />'.
                        "\n" . '<p class="text-center">'.
                            "\n" . '' . $system['copyright'] . ''.
                        "\n" . '</p>'.
                    "\n" . '</form>'.
                "\n" . '</div>'.
                "\n" . '<!-- end login-content -->'.
            "\n" . '</div>'.
            "\n" . '<!-- end right-container -->'.
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
        "\n" . '    App.init();'.
        "\n" . '});'.
        "\n" . '</script>'.
"\n" . '</body>'.
"\n" . '</html>';
?>