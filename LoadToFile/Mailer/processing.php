<?php

define('MT_CMS', 1);
$fileDir = dirname(__FILE__);
$rootPath = realpath($fileDir . '/../..');
chdir($rootPath);
require($rootPath . '/library/Autoloader.php');


if($type == 'ResetPassword' && $token && $user){
  		if($token == NULL){
  			sleep(2);	
		 	$_SESSION['rs_password_token_null'] = 'Token không thể bỏ trống';
		 	header('Location: ' . $system['url'] . '');
		 	exit();
  		}
  		if(THCMS_Controller_Function::KiemTraTokenResetPassword($token)){
  			sleep(2);
		 	$_SESSION['rs_password_token_no_system'] = 'Token không tồn tại trên hệ thống';
		 	header('Location: ' . $system['url'] . '');
		 	exit();
  		}
  		if($user == NULL){
  			sleep(2);
		 	$_SESSION['rs_password_user_null'] = 'Tài khoản không thể bỏ trống';
		 	header('Location: ' . $system['url'] . '');
		 	exit();
  		}
  		if (THCMS_Controller_Function::KiemTraAccounts($user)) {
  			sleep(2);
         	$_SESSION['rs_password_user_no_system'] = 'Tài khoản không tồn tại trên hệ thống';
         	header('Location: ' . $system['url'] . '');
		 	exit();
        }
       $get_user = THCMS_Controller_Function::GetNameAccounts($user);
       if ($token != $get_user['Token_ResetPassword'] ) {
			sleep(2);
			$_SESSION['rs_password_token_failed_user'] = 'Token này không phải của tài khoản: '.$user.'';
         	header('Location: ' . $system['url'] . '');
		 	exit();
       }
       if ($get_user['Token_ResetPassword'] == NULL) {
			sleep(2);
			$_SESSION['rs_password_token_null_system'] = 'Tài khoản không có token để thao tác chức năng.';
         	header('Location: ' . $system['url'] . '');
		 	exit();
       }
       if ($user != $get_user['Username'] ) {
			sleep(2);
			$_SESSION['rs_password_user_failed_token'] = 'Token này không phải của tài khoản: '.$user.'';
         	header('Location: ' . $system['url'] . '');
		 	exit();
       }
        if ($get_user['Time_ResetPassword'] < time()) {
			sleep(2);
			$_SESSION['rs_password_time_failed_time_sever'] = 'Token Đã Chết. Vui Lòng Kiểm Tra Lại';
         	header('Location: ' . $system['url'] . '');
		 	exit();
       }else{
         
       	$randtoken = THCMS_Controller_Function::Hash_MD5(time());
	       $getmail = THCMS_Controller_Function::GetMailler(3);
	       $passnews = THCMS_Controller_Function::RandomString('default','15');
	       $tieude = $getmail['tieude'];
	       $title = $getmail['title'];
	       $noidung = $getmail['noidung'];
	       $array = array('[ACCOUNT]', '[TOKEN]','[URL]','[RSPW]','[LOGO_TEXT]','[COPYRIGHT]','[EMAIL]','[NEWSPW]');
	       $array_replace = array($get_user['Username'], $randtoken, $system['url'], 'Auth/Mailer/ResetPassword', $system['logo_text'],$system['copyright'],$get_user['Email'],$passnews);
	       $doilenh = str_replace($array, $array_replace, $noidung);
	       $to = $get_user['Email'];
	       $name = $get_user['Username'];
	       if(THCMS_Controller_Function::SaveResetPassword($passnews,$randtoken,$get_user['id'])){
			    if($get_user['Active_Forum'] == 1){
			   THCMS_Controller_Function::UpdatePasswordXenforo($passnews,$get_user['ID_Forum']);
				}
	       $_SESSION['rs_password_success'] = ''.THCMS_Controller_Mailer::SendMail($to, $name, $doilenh, $tieude, $title).'';
		   header('Location: ' . $system['url'] . '');
	   		}else{
	   		 $_SESSION['rs_password_success'] =	'<div class="alert alert-danger fade show">Hệ thống đã gứi 1 tin nhắn vào email: <b>'.$to.' </b><br>Vui lòng kiểm tra  <b>Hộp thư đến & Spam </b><br>Tuy nhiên khi lưu Password mới bị lỗi, vui lòng báo lỗi này tới admin để được giải quyết</div>';
	   		header('Location: ' . $system['url'] . '');
			}
       }
}
if($type == 'ResetPincode' && $token && $user){
	if($token == NULL){
  			sleep(2);	
		 	$_SESSION['rs_pincode_token_null'] = 'Token không thể bỏ trống';
		 	header('Location: ' . $system['url'] . '');
		 	exit();
  		}
  		if(THCMS_Controller_Function::KiemTraTokenResetPincode($token)){
  			sleep(2);
		 	$_SESSION['rs_pincode_token_no_system'] = 'Token không tồn tại trên hệ thống';
		 	header('Location: ' . $system['url'] . '');
		 	exit();
  		}
  		if($user == NULL){
  			sleep(2);
		 	$_SESSION['rs_pincode_user_null'] = 'Tài khoản không thể bỏ trống';
		 	header('Location: ' . $system['url'] . '');
		 	exit();
  		}
  		if (THCMS_Controller_Function::KiemTraAccounts($user)) {
  			sleep(2);
         	$_SESSION['rs_pincode_user_no_system'] = 'Tài khoản không tồn tại trên hệ thống';
         	header('Location: ' . $system['url'] . '');
		 	exit();
        }
       $get_user = THCMS_Controller_Function::GetNameAccounts($user);
       if ($token != $get_user['Token_ResetPincode'] ) {
			sleep(2);
			$_SESSION['rs_pincode_token_failed_user'] = 'Token này không phải của tài khoản: '.$user.'';
         	header('Location: ' . $system['url'] . '');
		 	exit();
       }
       if ($get_user['Token_ResetPincode'] == NULL) {
			sleep(2);
			$_SESSION['rs_pincode_token_null_system'] = 'Tài khoản không có token để thao tác chức năng.';
         	header('Location: ' . $system['url'] . '');
		 	exit();
       }
       if ($user != $get_user['Username'] ) {
			sleep(2);
			$_SESSION['rs_pincode_user_failed_token'] = 'Token này không phải của tài khoản: '.$user.'';
         	header('Location: ' . $system['url'] . '');
		 	exit();
       }
        if ($get_user['Time_ResetPincode'] < time()) {
			sleep(2);
			$_SESSION['rs_pincode_time_failed_time_sever'] = 'Token Đã Chết. Vui Lòng Kiểm Tra Lại';
         	header('Location: ' . $system['url'] . '');
		 	exit();
       }else{
          
	       		$randtoken = THCMS_Controller_Function::Hash_MD5(time());
			    $getmail = THCMS_Controller_Function::GetMailler(5);
			    $pinnews = THCMS_Controller_Function::RandomString('viet_so','4');
			    $tieude = $getmail['tieude'];
			    $title = $getmail['title'];
			    $noidung = $getmail['noidung'];
			       $array = array('[ACCOUNT]', '[TOKEN]','[URL]','[RSPW]','[LOGO_TEXT]','[COPYRIGHT]','[EMAIL]','[NEWSPCD]');
			    $array_replace = array($get_user['Username'], $randtoken, $system['url'], 'Auth/Mailer/ResetPassword', $system['logo_text'],$system['copyright'],$get_user['Email'],$pinnews);
			    $doilenh = str_replace($array, $array_replace, $noidung);
			    $to = $get_user['Email'];
			    $name = $get_user['Username'];
			    if(THCMS_Controller_Function::SaveResetPincode($pinnews,$randtoken,$get_user['id'])){
			       $_SESSION['rs_pincode_success'] = ''.THCMS_Controller_Mailer::SendMail($to, $name, $doilenh, $tieude, $title).'';
			       	header('Location: ' . $system['url'] . '');
			   }else{
			   		 $_SESSION['rs_pincode_success'] =	'<div class="alert alert-danger fade show">Hệ thống đã gứi 1 tin nhắn vào email: <b>'.$to.' </b><br>Vui lòng kiểm tra  <b>Hộp thư đến & Spam </b><br>Tuy nhiên khi lưu Pincode mới bị lỗi, vui lòng báo lỗi này tới admin để được giải quyết</div>';
			   		 	header('Location: ' . $system['url'] . '');
			   	}

       }

}
if($type == 'ActiveMail' && $token && $user){
		if($token == NULL){
  			sleep(2);	
		 	$_SESSION['active_mail_token_null'] = 'Token không thể bỏ trống';
		 	header('Location: ' . $system['url'] . '');
		 	exit();
  		}
  		if(THCMS_Controller_Function::KiemTraTokenActiveMail($token)){
  			sleep(2);
		 	$_SESSION['active_mail_token_no_system'] = 'Token không tồn tại trên hệ thống';
		 	header('Location: ' . $system['url'] . '');
		 	exit();
  		}
  		if($user == NULL){
  			sleep(2);
		 	$_SESSION['active_mail_user_null'] = 'Tài khoản không thể bỏ trống';
		 	header('Location: ' . $system['url'] . '');
		 	exit();
  		}
  		if (THCMS_Controller_Function::KiemTraAccounts($user)) {
  			sleep(2);
         	$_SESSION['active_mail_user_no_system'] = 'Tài khoản không tồn tại trên hệ thống';
         	header('Location: ' . $system['url'] . '');
		 	exit();
        }
        $get_user = THCMS_Controller_Function::GetNameAccounts($user);
        if ($token != $get_user['Token_Email'] ) {
			sleep(2);
			$_SESSION['active_mail_token_failed_user'] = 'Token này không phải của tài khoản: '.$user.'';
         	header('Location: ' . $system['url'] . '');
		 	exit();
       }
       if ($get_user['Token_Email'] == NULL) {
			sleep(2);
			$_SESSION['active_mail_token_null_system'] = 'Tài khoản không có token để thao tác chức năng.';
         	header('Location: ' . $system['url'] . '');
		 	exit();
       }
       if ($user != $get_user['Username'] ) {
			sleep(2);
			$_SESSION['active_mail_user_failed_token'] = 'Token này không phải của tài khoản: '.$user.'';
         	header('Location: ' . $system['url'] . '');
		 	exit();
       }
       if ($get_user['Time_Email'] < time()) {
			sleep(2);
			$_SESSION['active_mail_time_failed_time_sever'] = 'Token Đã Chết. Vui Lòng Kiểm Tra Lại';
         	header('Location: ' . $system['url'] . '');
		 	exit();
       }
       if ($get_user['Active_Mail'] == 1){
       		sleep(2);
       		$_SESSION['active_mail_on_sever'] = 'Tài khoản đã được kích hoạt trước đó.';
         	header('Location: ' . $system['url'] . '');
		 	exit();
       }else{
          
       		$randtoken = THCMS_Controller_Function::Hash_MD5(time());
       		  if(THCMS_Controller_Function::SaveActiveMail($randtoken,$get_user['id'])){
       		  	sleep(2);
       		  	 $_SESSION['active_mail_success'] = 'Tài khoản đã kích hoạt email thành công';
       		  	 header('Location: ' . $system['url'] . '');
		 		
       		  }else{
       		  	sleep(2);
       		  	 $_SESSION['active_mail_failed_system'] = 'Kích hoạt email không thành công do lỗi hệ thống';
       		  	 header('Location: ' . $system['url'] . '');
       		  }
       }
	}
if($type == 'ChangeEmail' && $token && $user){	
		if($token == NULL){
  			sleep(2);	
		 	$_SESSION['active_mail_token_null'] = 'Token không thể bỏ trống';
		 	header('Location: ' . $system['url'] . '');
		 	exit();
  		}
  		if(THCMS_Controller_Function::KiemTraTokenChangeMail($token)){
  			sleep(2);
		 	$_SESSION['active_mail_token_no_system'] = 'Token không tồn tại trên hệ thống';
		 	header('Location: ' . $system['url'] . '');
		 	exit();
  		}
  		if($user == NULL){
  			sleep(2);
		 	$_SESSION['active_mail_user_null'] = 'Tài khoản không thể bỏ trống';
		 	header('Location: ' . $system['url'] . '');
		 	exit();
  		}
  		if (THCMS_Controller_Function::KiemTraAccounts($user)) {
  			sleep(2);
         	$_SESSION['active_mail_user_no_system'] = 'Tài khoản không tồn tại trên hệ thống';
         	header('Location: ' . $system['url'] . '');
		 	exit();
        }
        $get_user = THCMS_Controller_Function::GetNameAccounts($user);
        if ($token != $get_user['Token_Email_Change'] ) {
			sleep(2);
			$_SESSION['active_mail_token_failed_user'] = 'Token này không phải của tài khoản: '.$user.'';
         	header('Location: ' . $system['url'] . '');
		 	exit();
       }
       if ($get_user['Token_Email_Change'] == NULL) {
			sleep(2);
			$_SESSION['active_mail_token_null_system'] = 'Tài khoản không có token để thao tác chức năng.';
         	header('Location: ' . $system['url'] . '');
		 	exit();
       }
       if ($user != $get_user['Username'] ) {
			sleep(2);
			$_SESSION['active_mail_user_failed_token'] = 'Token này không phải của tài khoản: '.$user.'';
         	header('Location: ' . $system['url'] . '');
		 	exit();
       }
       if ($get_user['Time_Email_Change'] < time()) {
			sleep(2);
			$_SESSION['active_mail_time_failed_time_sever'] = 'Token Đã Chết. Vui Lòng Kiểm Tra Lại';
         	header('Location: ' . $system['url'] . '');
		 	exit();
       }
       if($get_user['Online'] == 1){

       	sleep(2);
			$_SESSION['active_mail_user_online'] = 'Tài khoản đang online. Không thể tiến hành thay đổi email';
         	header('Location: ' . $system['url'] . '');
		 	exit();
		 }else{
         
       			$randtoken = THCMS_Controller_Function::Hash_MD5(time());
       		  if(THCMS_Controller_Function::SaveChageMail($get_user['Email_Change'],$randtoken,$get_user['id'])){
       		  	sleep(2);
              if($get_user['Active_Forum'] == 1){
                THCMS_Controller_Function::SaveChageMailXenforo($get_user['Email_Change'],$get_user['ID_Forum']);
       		  	 $_SESSION['active_mail_success'] = 'Thay đổi Email thành công<br>Email tài khoản forum của bạn đã đổi sang email mới';
       		  	 header('Location: ' . $system['url'] . '');
		 		       }else{
                $_SESSION['active_mail_success'] = 'Thay đổi Email thành công';
               header('Location: ' . $system['url'] . '');
               }
       		  }else{
       		  	sleep(2);
       		  	 $_SESSION['active_mail_failed_system'] = 'Kích hoạt email không thành công do lỗi hệ thống';
       		  	 header('Location: ' . $system['url'] . '');
       		  }
       }
}