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
    "\n" . '<title>Đăng Ký Tài Khoản</title>'.
     "\n" . '</head><body class="pace-top bg-black-darker">' ;
     if($user_id){
        header('Location: ' . $system['url'] . '');
        exit();
     }
echo '<!-- begin #page-loader -->'.
    "\n" . '<<div id="page-loader" class="fade show"><span class="spinner"></span></div>'.
    "\n" . '<<!-- end #page-loader -->' ;
echo '<!-- begin #page-container -->'.
    "\n" . '<div id="page-container" class="fade">'.
        "\n" . '<!-- begin login -->'.
        "\n" . '<div class="login login-with-news-feed">'.
            "\n" . '<!-- begin news-feed -->'.
            "\n" . '<div class="news-feed">'.
                "\n" . '<div class="news-image" style="background-image: url(' . $system['url'] . '/assets/img/login-bg/bg-login.jpg)"></div>'.
                
            "\n" . '</div>'.
            "\n" . '<!-- end news-feed -->';
			/**
 * Reset Password
 */		
		 if (isset($_SESSION['rs_password_token_null'])){
		 	echo '<div class="note note-danger m-b-15">'.
								"\n" . '<div class="note-icon"><i class="fa fa-exclamation-triangle"></i></div>'.
								"\n" . '<div class="note-content">'.
									"\n" . '<h4><b>Lỗi Reset Password</b></h4>'.
									"\n" . '<p>'.$_SESSION['rs_password_token_null'].'</p>'.
								"\n" . '</div>'.
							"\n" . '</div>';
			unset($_SESSION['rs_password_token_null']);					
		 }
		 if (isset($_SESSION['rs_password_token_no_system'])){
		 	echo '<div class="note note-danger m-b-15">'.
								"\n" . '<div class="note-icon"><i class="fa fa-exclamation-triangle"></i></div>'.
								"\n" . '<div class="note-content">'.
									"\n" . '<h4><b>Lỗi Reset Password</b></h4>'.
									"\n" . '<p>'.$_SESSION['rs_password_token_no_system'].'</p>'.
								"\n" . '</div>'.
							"\n" . '</div>';
			unset($_SESSION['rs_password_token_no_system']);						
		 }
		 if (isset($_SESSION['rs_password_user_null'])){
		 	echo '<div class="note note-danger m-b-15">'.
								"\n" . '<div class="note-icon"><i class="fa fa-exclamation-triangle"></i></div>'.
								"\n" . '<div class="note-content">'.
									"\n" . '<h4><b>Lỗi Reset Password</b></h4>'.
									"\n" . '<p>'.$_SESSION['rs_password_user_null'].'</p>'.
								"\n" . '</div>'.
							"\n" . '</div>';
			unset($_SESSION['rs_password_user_null']);				
		 }
		 if (isset($_SESSION['rs_password_user_no_system'])){
		 	echo '<div class="note note-danger m-b-15">'.
								"\n" . '<div class="note-icon"><i class="fa fa-exclamation-triangle"></i></div>'.
								"\n" . '<div class="note-content">'.
									"\n" . '<h4><b>Lỗi Reset Password</b></h4>'.
									"\n" . '<p>'.$_SESSION['rs_password_user_no_system'].'</p>'.
								"\n" . '</div>'.
							"\n" . '</div>';
			unset($_SESSION['rs_password_user_no_system']);				
		 }
		 if (isset($_SESSION['rs_password_token_failed_user'])){
		 	echo '<div class="note note-danger m-b-15">'.
								"\n" . '<div class="note-icon"><i class="fa fa-exclamation-triangle"></i></div>'.
								"\n" . '<div class="note-content">'.
									"\n" . '<h4><b>Lỗi Reset Password</b></h4>'.
									"\n" . '<p>'.$_SESSION['rs_password_token_failed_user'].'</p>'.
								"\n" . '</div>'.
							"\n" . '</div>';
			unset($_SESSION['rs_password_token_failed_user']);				
		 }
		 if (isset($_SESSION['rs_password_token_null_system'])){
		 	echo '<div class="note note-danger m-b-15">'.
								"\n" . '<div class="note-icon"><i class="fa fa-exclamation-triangle"></i></div>'.
								"\n" . '<div class="note-content">'.
									"\n" . '<h4><b>Lỗi Reset Password</b></h4>'.
									"\n" . '<p>'.$_SESSION['rs_password_token_null_system'].'</p>'.
								"\n" . '</div>'.
							"\n" . '</div>';
			unset($_SESSION['rs_password_token_null_system']);				
		 }
		 if (isset($_SESSION['rs_password_user_failed_token'])){
		 	echo '<div class="note note-danger m-b-15">'.
								"\n" . '<div class="note-icon"><i class="fa fa-exclamation-triangle"></i></div>'.
								"\n" . '<div class="note-content">'.
									"\n" . '<h4><b>Lỗi Reset Password</b></h4>'.
									"\n" . '<p>'.$_SESSION['rs_password_user_failed_token'].'</p>'.
								"\n" . '</div>'.
							"\n" . '</div>';
			unset($_SESSION['rs_password_user_failed_token']);				
		 }
		 if (isset($_SESSION['rs_password_time_failed_time_sever'])){
		 	echo '<div class="note note-danger m-b-15">'.
								"\n" . '<div class="note-icon"><i class="fa fa-exclamation-triangle"></i></div>'.
								"\n" . '<div class="note-content">'.
									"\n" . '<h4><b>Lỗi Reset Password</b></h4>'.
									"\n" . '<p>'.$_SESSION['rs_password_time_failed_time_sever'].'</p>'.
								"\n" . '</div>'.
							"\n" . '</div>';
			unset($_SESSION['rs_password_time_failed_time_sever']);				
		 }
		 if (isset($_SESSION['rs_password_success'])){
		 	echo '<div class="note note-success m-b-15">'.
								"\n" . '<div class="note-icon"><i class="fa fa-check-circle"></i></div>'.
								"\n" . '<div class="note-content">'.
									"\n" . '<h4><b>Reset Password Thành Công</b></h4>'.
									"\n" . '<p>'.$_SESSION['rs_password_success'].'</p>'.
								"\n" . '</div>'.
							"\n" . '</div>';
			unset($_SESSION['rs_password_success']);				
		 }
            echo "\n" . '<!-- begin right-content -->'.
            "\n" . '<div class="right-content">'.
                "\n" . '<!-- begin login-header -->'.
                "\n" . '<div class="login-header">'.
                    "\n" . '<div class="brand">'.
                        "\n" . '<img alt="' . $system['title'] . '" title="" height="auto" src="' . $system['logo_img'] . '" width="' . $system['logo_img_width'] . '"> ' . $system['logo_text'] . ''.
                        "\n" . '<small>Đăng ký tài khoản</small>'.
                    "\n" . '</div>'.
                    "\n" . '<div class="icon">'.
                        "\n" . '<i class="fa fa-sign-in"></i>'.
                    "\n" . '</div>'.
                "\n" . '</div>'.
                "\n" . '<!-- end login-header -->'.
                "\n" . '<!-- begin login-content -->'.
                "\n" . '<div class="login-content">';
                    echo "\n" . '<form class="margin-bottom-0">'.
                        "\n" . '<div class="form-group m-b-15">'.
                            "\n" . '<input type="text" id="accounts" class="form-control form-control-lg" placeholder="Tên tài khoản" autocomplete="off" />'.
                        "\n" . '</div>'.
                        "\n" . '<div class="form-group m-b-15">'.
                         
                            "\n" . '<input type="password" id="password" class="form-control form-control-lg" placeholder="Mật khẩu" autocomplete="off" />'.
                        "\n" . '</div>'.
						"\n" . '<div class="form-group m-b-15">'.
                         
                            "\n" . '<input type="password" id="repassword" class="form-control form-control-lg" placeholder="Nhập lại mật khẩu" autocomplete="off" />'.
                        "\n" . '</div>'.
						"\n" . '<div class="form-group m-b-15">'.
                         
                            "\n" . '<input type="mail" id="email" class="form-control form-control-lg" placeholder="Email" autocomplete="off" />'.
                        "\n" . '</div>'.
						
                        "\n" . '<div id="button_signup">'.
                            "\n" . '<button type="button" class="btn btn-primary btn-block btn-lg" onclick="signup()">Đăng Ký</button>'.
                        "\n" . '</div>'.
                         "\n" . '<div class="row form-group m-t-20 ">'.
                     "\n" . '<div class="col-sm-4">'.
                       "\n" . '<div class="text-left"><a href="'. $system['url'] . '/Login" class="btn btn-success m-r-5 m-b-5">Đăng Nhập</a></div>'.
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
?>
<script type="text/javascript">
				
					
				
				 function signup(){
				 	var accounts = $("#accounts").val();
           			var password= $("#password").val();
           			var repassword= $("#repassword").val();
           			var email= $("#email").val();
           			if (!accounts || !password || !repassword || !email) {
		                showNotification('bg-red text-white', 'Vui Lòng Điền Đầy Đủ Thông Tin');
		                return;
          		 	}
          		 	$("#button_signup").html('<button class="btn btn-warning btn-block btn-lg" type="button" disabled><i class="fal fa-spinner fa-pulse"></i> Vui Lòng Chờ</button>');
          	 		$.ajax({
               			url     : '/Auth/Ajax/Load.html',
               			type    : 'POST',
               			dataType: 'JSON',
               			data    : {
                   			t       : 'signup',
                   			accounts  : accounts,
                   			password : password,
                   			repassword :repassword,
                   			email :email
               			},
                	success: (data) => {
                    	if (data.error) {
                    		setTimeout(function(){
                    		$("#button_signup").html('<button class="btn btn-danger btn-block btn-lg" type="button" onclick="signup()"><i class="fal fa-times-circle"></i> Làm lại</button>');
                        	showNotification('bg-red text-white', data.msg);
                        	},3000);
                    	} else {
                        	setTimeout(function(){
                        		$("#button_signup").html('<button class="btn btn-success btn-block btn-lg" type="button"><i class="fal fa-check-circle"></i> Thành Công</button>');
                        	showNotification('bg-green text-white', data.msg);
								setTimeout(function(){
										window.location.href = '/Login';
								},2000);
							},3000);
	
                    }
                }
            })
				 }
			function showNotification(colorName, text) {
            if (colorName === null || colorName === '') { colorName = 'bg-black'; }
            if (text === null || text === '') { text = 'Turning standard Bootstrap alerts'; }
            var allowDismiss = true;
            $.notify({
                message: text
            },
            {
                type: colorName,
                allow_dismiss: allowDismiss,
                newest_on_top: true,
                timer: 1000,
                placement: {
                    from: 'top',
                    align: 'right'
                },
                animate: {
                    enter: 'animated bounceIn',
                    exit: 'animated fadeOutUp'
                },
                template: '<div data-notify="container" class="bootstrap-notify-container alert alert-dismissible {0} ' + (allowDismiss ? "p-r-40" : "") + '" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">&times;</button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
            });
        } 
        	
			</script>
<?php
    echo '<!-- ================== BEGIN BASE JS ================== -->'.
    "\n" . '<script src="' . $system['url'] . '/assets/plugins/jquery/jquery-3.2.1.min.js"></script>'.
    "\n" . '<script src="' . $system['url'] . '/assets/plugins/jquery-ui/jquery-ui.min.js"></script>'.
    "\n" . '<script src="' . $system['url'] . '/assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>'.
    "\n" . '<script src="' . $system['url'] . '/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>'.
    "\n" . '<script src="' . $system['url'] . '/assets/plugins/js-cookie/js.cookie.js"></script>'.
    "\n" . '<script src="' . $system['url'] . '/assets/js/theme/transparent.min.js"></script>'.
    "\n" . '<script src="' . $system['url'] . '/assets/js/apps.min.js"></script>'.
	"\n" . '<script src="' . $system['url'] . '/assets/plugins/notifications/js/bootstrap-notify.js"></script>'.
    "\n" . '<!-- ================== END BASE JS ================== -->';

    echo '<script>'.
        "\n" . '$(document).ready(function() {'.
        "\n" . '    App.init();'.
        "\n" . '});'.
        "\n" . '</script>'.
"\n" . '</body>'.
"\n" . '</html>';
?>