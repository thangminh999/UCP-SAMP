<?php

define('MT_CMS', 1);
$fileDir = dirname(__FILE__);
$rootPath = realpath($fileDir . '/../..');
chdir($rootPath);
require($rootPath . '/library/Autoloader.php');
	if($_REQUEST){
		$return = array('error' => 0);
		$t = $_REQUEST['t'];
			if ($t == 'check-name-old') {
				$nameold = THCMS_Controller_Function::POST($_POST['nameold']);
					if($nameold == NULL){
						$return['error'] = 1;
						$return['msg']   = 'Name cũ không được bỏ trống';
						die(json_encode($return));
					}
					if ($nameold != $datauser['Username']){
						$return['error'] = 1;
						$return['msg']   = 'Name cũ không khớp với name hiện tại';
						die(json_encode($return));
					}else{
						
						die(json_encode($return));
					}

			}
			if ($t == 'signup') {
				$accounts = THCMS_Controller_Function::POST($_POST['accounts']);
				$password = THCMS_Controller_Function::POST($_POST['password']);
				$repassword = THCMS_Controller_Function::POST($_POST['repassword']);
				$email = THCMS_Controller_Function::POST($_POST['email']);
				$Hash_Whirlpool = THCMS_Controller_Function::Hash_Whirlpool($password);
				if($accounts == NULL){
					$return['error'] = 1;
					$return['msg']   = 'Tên tài khoản không được bỏ trống';
					die(json_encode($return));
				}
				if($password == NULL){
					$return['error'] = 1;
					$return['msg']   = 'Mật khẩu không được bỏ trống';
					die(json_encode($return));
				}
				if($repassword == NULL){
					$return['error'] = 1;
					$return['msg']   = 'Re Password không được bỏ trống';
					die(json_encode($return));
				}
				if($email == NULL){
					$return['error'] = 1;
					$return['msg']   = 'Email không được bỏ trống';
					die(json_encode($return));
				}
				if (THCMS_Controller_Function::is_name($accounts)){
						$return['error'] = 1;
						$return['msg']   = 'Tên đăng nhập không đúng theo quy định<br>Yêu cầu: Họ_Tên';
						die(json_encode($return));
				}
				if (!THCMS_Controller_Function::KiemTraAccounts($accounts)){
						$return['error'] = 1;
						$return['msg']   = 'Tài khoản đã có người sử dụng';
						die(json_encode($return));
				}
				if (THCMS_Controller_Function::is_email($email)){
						$return['error'] = 1;
						$return['msg']   = 'Email không đúng định dạng';
						die(json_encode($return));
				}
				if (!THCMS_Controller_Function::KiemTraEmail($email)) {
						$return['error'] = 1;
						$return['msg']   = 'Email đã tồn tại trên hệ thống';
						die(json_encode($return));
				}
				if($repassword != $password){
					$return['error'] = 1;
						$return['msg']   = 'Mật khẩu nhập lại phải trùng nhau';
						die(json_encode($return));
				}else{
					THCMS_Controller_Function::Registration($accounts,$email,$Hash_Whirlpool);
					$return['msg']   = 'Đăng ký tài khoản thành công.<br>Hệ thống đang chuyển hướng tới trang Đăng nhập';
					die(json_encode($return));
				}
				
			}
			if ($t == 'check-name-news') {
				$namenews = THCMS_Controller_Function::POST($_POST['namenews']);
					if($namenews == NULL){
						$return['error'] = 1;
						$return['msg']   = 'Name mới không được bỏ trống';
						die(json_encode($return));
					}
					if ($namenews == $datauser['Username']){
						$return['error'] = 1;
						$return['msg']   = 'Name mới không được trùng với name cũ';
						die(json_encode($return));
					}
					if (THCMS_Controller_Function::is_name($namenews)){
						$return['error'] = 1;
						$return['msg']   = 'Định dạng name news sai yêu cầu';
						die(json_encode($return));
					}
					if (!THCMS_Controller_Function::KiemTraAccounts($namenews)) {
						$return['error'] = 1;
						$return['msg']   = 'Name mới đã tồn tại trên hệ thống';
						die(json_encode($return));
					}else{
						$return['error'] = 0;
						die(json_encode($return));
					}

			}
			if ($t == 'check-password') {
				$password = THCMS_Controller_Function::POST($_POST['password']);
				 $Hash_Whirlpool = THCMS_Controller_Function::Hash_Whirlpool($password);
					if($password == NULL){
						$return['error'] = 1;
						$return['msg']   = 'Mật khẩu không được bỏ trống';
						die(json_encode($return));
					}
					if ($Hash_Whirlpool != $datauser['Key']){
						$return['error'] = 1;
						$return['msg']   = 'Mật khẩu không chính xác';
						die(json_encode($return));
					}else{
						$return['error'] = 0;
						die(json_encode($return));
					}

			}
			if ($t == 'change-name') {
				$nameold = THCMS_Controller_Function::POST($_POST['nameold']);
				$namenews = THCMS_Controller_Function::POST($_POST['namenews']);
				$password = THCMS_Controller_Function::POST($_POST['password']);
				$Hash_Whirlpool = THCMS_Controller_Function::Hash_Whirlpool($password);
				if(!$user_id){
					$return['error'] = 1;
					$return['msg']   = 'Vui lòng đăng nhập';
					die(json_encode($return));
				}
				if($datauser['Online'] == 1){
					$return['error'] = 1;
					$return['msg']   = 'Tài khoản đang Online, không thể thao tác';
					die(json_encode($return));
				}
				if($nameold == NULL){
						$return['error'] = 1;
						$return['msg']   = 'Name cũ không được bỏ trống';
						die(json_encode($return));
				}
				if ($nameold != $datauser['Username']){
						$return['error'] = 1;
						$return['msg']   = 'Name cũ không khớp với name hiện tại';
						die(json_encode($return));
				}
				if($namenews == NULL){
						$return['error'] = 1;
						$return['msg']   = 'Name mới không được bỏ trống';
						die(json_encode($return));
				}
				if ($namenews == $datauser['Username']){
						$return['error'] = 1;
						$return['msg']   = 'Name mới không được trùng với name cũ';
						die(json_encode($return));
				}
				if (THCMS_Controller_Function::is_name($namenews)){
						$return['error'] = 1;
						$return['msg']   = 'Định dạng name mới sai yêu cầu';
						die(json_encode($return));
				}
				$checkkytu = str_replace('.', '', $namenews);
				if($checkkytu != $namenews){
						$return['error'] = 1;
						$return['msg']   = 'Tên nhân vật chỉ cho phép ký tự "_"<br>Tất cả các ký tự khác không được sử dụng';
						die(json_encode($return));
				}
				if (!THCMS_Controller_Function::KiemTraAccounts($namenews)) {
						$return['error'] = 1;
						$return['msg']   = 'Name mới đã tồn tại trên hệ thống';
						die(json_encode($return));
				}
				if($password == NULL){
						$return['error'] = 1;
						$return['msg']   = 'Mật khẩu không được bỏ trống';
						die(json_encode($return));
				}
				if ($Hash_Whirlpool != $datauser['Key']){
						$return['error'] = 1;
						$return['msg']   = 'Mật khẩu không chính xác';
						die(json_encode($return));
				}
				if($datauser['Credits'] >= 450){
						$total = $datauser['Credits'] - 450;
						THCMS_Controller_Function::SaveChageName($namenews,$datauser['id']);
						THCMS_Controller_Function::UpdateCredits($total,$datauser['id']);
						THCMS_Controller_Function::UpdateChangeNameForum($namenews,$datauser['id']);
						THCMS_Controller_Function::SaveLogChangeName($datauser['id'],$nameold,$namenews,$total);
						if($datauser['Active_Forum'] == 1){
							THCMS_Controller_Function::SaveNameForum($namenews,$datauser['ID_Forum']);
							$return['msg']   = 'Đổi tên thành công<br>Tên Cũ: '.$nameold.'<br>Tên Mới: '.$namenews.'<br>Tài khoản forum của bạn cũng đã thay đổi theo tên mới<br>Đang Load Lại Trang';
							die(json_encode($return));
						}else{
							$return['msg']   = 'Đổi tên thành công<br>Tên Cũ: '.$nameold.'<br>Tên Mới: '.$namenews.'<br>Đang Load Lại Trang';
							die(json_encode($return));
						}
				}else{
						$return['error'] = 1;
						$return['msg']   = 'Tài khoản không đủ Credits';
						die(json_encode($return));
				}

			}
			if ($t == 'change-password') {
				$passwordold = THCMS_Controller_Function::POST($_POST['passwordold']);
				$passwordnews = THCMS_Controller_Function::POST($_POST['passwordnews']);
				$repasswordnews = THCMS_Controller_Function::POST($_POST['repasswordnews']);
				$Hash_Whirlpool = THCMS_Controller_Function::Hash_Whirlpool($passwordold);
				$Hash_Whirlpool_News = THCMS_Controller_Function::Hash_Whirlpool($passwordnews);
				if(!$user_id){
					$return['error'] = 1;
					$return['msg']   = 'Vui lòng đăng nhập';
					die(json_encode($return));
				}
				if($datauser['Online'] == 1){
					$return['error'] = 1;
					$return['msg']   = 'Tài khoản đang Online, không thể thao tác';
					die(json_encode($return));
				}
				if($passwordold == NULL){
						$return['error'] = 1;
						$return['msg']   = 'Vui Lòng Điền Đầy Đủ Thông Tin';
						die(json_encode($return));
				}
				if($passwordnews == NULL){
						$return['error'] = 1;
						$return['msg']   = 'Vui Lòng Điền Đầy Đủ Thông Tin';
						die(json_encode($return));
				}
				if($repasswordnews == NULL){
						$return['error'] = 1;
						$return['msg']   = 'Vui Lòng Điền Đầy Đủ Thông Tin';
						die(json_encode($return));
				}
				if($repasswordnews != $passwordnews){
						$return['error'] = 1;
						$return['msg']   = 'Mật khẩu mới nhập lại phải trùng nhau';
						die(json_encode($return));
				}
				if($Hash_Whirlpool  != $datauser['Key']){
						$total = $datauser['Credits'] - 500;
						$return['error'] = 1;
						$return['msg']   = 'Mật khẩu không đúng';
						die(json_encode($return));
				}
				if($datauser['Active_Mail'] == 0 ){
						$return['error'] = 1;
						$return['msg']   = 'Tài khoản chưa kích hoạt email. bạn bị hạn chế chức năng này';
						die(json_encode($return));
					}
				if($passwordold == $passwordnews){
						$return['error'] = 1;
						$return['msg']   = 'Mật khẩu mới không được trùng với mật khẩu cũ';
						die(json_encode($return));
				}
				if($datauser['TimeSetting'] > time()){
						$return['error'] = 1;
						$return['msg']   = 'Thời gian thay đổi cách nhau 60 phút';
						die(json_encode($return));
				}else{
						
						$total = $datauser['Credits'] - 500;
						THCMS_Controller_Function::UpdatePassword($Hash_Whirlpool_News,$datauser['id']);
						THCMS_Controller_Function::UpdateTimeSetting(time()+3600,$datauser['id']);
						
							$return['msg']   = 'Thay đổi mật khẩu thành công<br>Bạn sẽ đăng xuất khỏi hệ thống và đăng nhập lại';
							die(json_encode($return));
						
				}

			}
			if ($t == 'change-pincode') {
				$pinold = THCMS_Controller_Function::POST($_POST['pinold']);
				$pinnews = THCMS_Controller_Function::POST($_POST['pinnews']);
				$reppinnews = THCMS_Controller_Function::POST($_POST['reppinnews']);
				$Hash_Whirlpool = THCMS_Controller_Function::Hash_Whirlpool($pinold);
				$Hash_Whirlpool_Re = THCMS_Controller_Function::Hash_Whirlpool($pinnews);
					if(!$user_id){
						$return['error'] = 1;
						$return['msg']   = 'Vui lòng đăng nhập';
					die(json_encode($return));
					}
					if($datauser['Online'] == 1){
						$return['error'] = 1;
						$return['msg']   = 'Tài khoản đang Online, không thể thao tác';
						die(json_encode($return));
					}
					if($pinold == NULL || $pinnews == NULL || $reppinnews == NULL){
						$return['error'] = 1;
						$return['msg']   = 'Vui Lòng Điền Đầy Đủ Thông Tin';
						die(json_encode($return));
					}
					if(THCMS_Controller_Function::is_number($pinold) || THCMS_Controller_Function::is_number($pinnews)){
						$return['error'] = 1;
						$return['msg']   = 'Mã pin cũ và mới yêu cầu 4 ký tự số';
						die(json_encode($return));
					}
					if($pinnews != $reppinnews){
						$return['error'] = 1;
						$return['msg']   = 'Mã pin nhập lại không giống nhau';
						die(json_encode($return));
					}
					if($Hash_Whirlpool != $datauser['Pin']){
						
						$return['error'] = 1;
						$return['msg']   = 'Mã pin không đúng';
						die(json_encode($return));
					}
					if($datauser['Active_Mail'] == 0 ){
						$return['error'] = 1;
						$return['msg']   = 'Tài khoản chưa kích hoạt email. bạn bị hạn chế chức năng này';
						die(json_encode($return));
					}
					if($pinnews == $pinold){
						$return['error'] = 1;
						$return['msg']   = 'Mã pin mới không được trùng với mã pin cũ';
						die(json_encode($return));
					}
					if($datauser['TimeSetting'] > time()){
						$return['error'] = 1;
						$return['msg']   = 'Thời gian thay đổi cách nhau 60 phút';
						die(json_encode($return));
					}else{
						
						THCMS_Controller_Function::UpdatePincode($Hash_Whirlpool_Re,$datauser['id']);
						THCMS_Controller_Function::UpdateTimeSetting(time()+3600,$datauser['id']);
						$return['msg']   = 'Thay đổi mã pin thành công<br>Bạn sẽ đăng xuất mã pin khỏi hệ thống và yêu cầu xác nhận mã pin lại';
						die(json_encode($return));
					}
			}
			if ($t == 'change-email') {
				$emailold = THCMS_Controller_Function::POST($_POST['emailold']);
				$emailnews = THCMS_Controller_Function::POST($_POST['emailnews']);
				$reemailnews = THCMS_Controller_Function::POST($_POST['reemailnews']);
					if(!$user_id){
						$return['error'] = 1;
						$return['msg']   = 'Vui lòng đăng nhập';
					die(json_encode($return));
					}
					if($datauser['Online'] == 1){
						$return['error'] = 1;
						$return['msg']   = 'Tài khoản đang Online, không thể thao tác';
						die(json_encode($return));
					}
					if($emailold == NULL || $emailnews == NULL || $reemailnews == NULL){
						$return['error'] = 1;
						$return['msg']   = 'Vui Lòng Điền Đầy Đủ Thông Tin';
						die(json_encode($return));
					}
					if($emailnews != $reemailnews){
						$return['error'] = 1;
						$return['msg']   = 'Email nhập lại không giống nhau';
						die(json_encode($return));
					}
					if(THCMS_Controller_Function::is_email($emailold) || THCMS_Controller_Function::is_email($emailnews)){
						$return['error'] = 1;
						$return['msg']   = 'Email hiện tại và email mới không đúng định dạng';
						die(json_encode($return));
					}
					if($emailold != $datauser['Email']){
						
						$return['error'] = 1;
						$return['msg']   = 'Email hiện tại không đúng với tài khoản của bạn';
						die(json_encode($return));
					}
					if($datauser['Active_Mail'] == 0 ){
						$return['error'] = 1;
						$return['msg']   = 'Tài khoản chưa kích hoạt email. bạn bị hạn chế chức năng này';
						die(json_encode($return));
					}
					if (!THCMS_Controller_Function::KiemTraEmail($emailnews)) {
						$return['error'] = 1;
						$return['msg']   = 'Email mới đã tồn tại trên hệ thống';
						die(json_encode($return));
					}
					if($datauser['TimeSetting'] > time()){
						$return['error'] = 1;
						$return['msg']   = 'Thời gian thay đổi cách nhau 60 phút';
						die(json_encode($return));
					}else{
						
                    	
						$randtoken = THCMS_Controller_Function::Hash_MD5(time());
                        $get_accounts = THCMS_Controller_Function::GetMailAccounts($emailold);
                        $getmail = THCMS_Controller_Function::GetMailler(7);
                        $tieude = $getmail['tieude'];
                        $title = $getmail['title'];
                        $noidung = $getmail['noidung'];
                        $array = array('[ACCOUNT]', '[TOKEN]','[URL]','[CHANGEMAIL]','[LOGO_TEXT]','[COPYRIGHT]','[EMAILOLD]','[EMAILNEWS]');
                        $array_replace = array($get_accounts['Username'], $randtoken, $system['url'], 'Auth/Mailer/ChangeEmail', $system['logo_text'],$system['copyright'],$emailold,$emailnews);
                        $doilenh = str_replace($array, $array_replace, $noidung);
                        $to = $emailold;
                        $name = $get_accounts['Username'];
                         if(THCMS_Controller_Function::SaveTokenEmailChange($emailnews,$randtoken,$get_accounts['id'])){
                            $return['msg']  = THCMS_Controller_Mailer::SendMail($to, $name, $doilenh, $tieude, $title);
                        	die(json_encode($return));
                        }else{
                           $return['msg']  = 'Hệ thống đã gứi 1 tin nhắn vào email: <b>'.$to.' </b><br>Vui lòng kiểm tra  <b>Hộp thư đến & Spam </b><br>Tuy nhiên khi lưu Token và Time ResetPassword bị lỗi, vui lòng báo lỗi này tới admin để được giải quyết';
                        	die(json_encode($return));
                        }
                        THCMS_Controller_Function::SaveTokenEmailChange($emailnews,$randtoken,$datauser['id']);
						THCMS_Controller_Function::UpdateTimeSetting(time()+3600,$datauser['id']);
					}

			}
				if ($t == 'buy-shop-vip') {
				$id = THCMS_Controller_Function::POST($_POST['id']);
				$rank = THCMS_Controller_Function::POST($_POST['rank']);
				$user = THCMS_Controller_Function::POST($_POST['user']);
				$name = THCMS_Controller_Function::POST($_POST['name']);
					if(!$user_id){
						$return['error'] = 1;
						$return['msg']   = 'Vui lòng đăng nhập';
						die(json_encode($return));
					}
					if($datauser['Online'] == 1){
						$return['error'] = 1;
						$return['msg']   = 'Tài khoản đang Online, không thể thao tác';
						die(json_encode($return));
					}
					if (THCMS_Controller_Function::CheckShopVip($id)) {
						$return['error'] = 1;
						$return['msg']   = 'VIP này không tồn tại.<br>Vui lòng chọn vip khác hoặc Load lại web nhé (F5)';
						die(json_encode($return));
					}
					if($user != $datauser['Username']){
						$return['error'] = 1;
						$return['msg']   = 'Tài khoản mua hàng và tài khoản web không giống nhau<br>Bug thì coi chừng nhé!';
						die(json_encode($return));
					}
				$getvip = THCMS_Controller_Function::GetShopVip($id);
					if($getvip['VIP_Active'] == 0){
						$return['error'] = 1;
						$return['msg']   = 'VIP này không còn bán nữa.<br>Vui lòng chọn vip khác';
						die(json_encode($return));
					}
					if($datauser['Credits'] >= $getvip['VIP_Price']){
						$total = $datauser['Credits'] - $getvip['VIP_Price'];
						THCMS_Controller_Function::SaveLogsStore($getvip['VIP_Name'],'VIP',$datauser['Username'],$datauser['id'],$datauser['Credits'],$total,$getvip['VIP_Price']);

						THCMS_Controller_Function::UpdateVipShop($getvip['VIP_DonateRank'],time()+'2592000',$datauser['id']);
						THCMS_Controller_Function::UpdateCredits($total,$datauser['id']);
						if($datauser['DonateRank'] > 0){
                    	
						$return['msg']   = 'Mua '.$getvip['VIP_Name'].' với giá: '.number_format($getvip['VIP_Price']).' thành công<br>Tuy nhiên VIP cũ của bạn sẽ thay thế vào vip mới này';
						die(json_encode($return));
						}else{
							
							$return['msg']   = 'Mua '.$getvip['VIP_Name'].' với giá: '.number_format($getvip['VIP_Price']).' thành công';
						die(json_encode($return));
						}
						
					}else{
						
						$return['error'] = 1;
						$return['msg']   = 'Tài khoản không đủ Credits để mua gói vip này';
						die(json_encode($return));
					}

			}
			if ($t == 'buy-shop-cars') {
				$id = THCMS_Controller_Function::POST($_POST['id']);
				$user = THCMS_Controller_Function::POST($_POST['user']);
				$cars = THCMS_Controller_Function::POST($_POST['cars']);
				$name = THCMS_Controller_Function::POST($_POST['name']);
					if(!$user_id){
						$return['error'] = 1;
						$return['msg']   = 'Vui lòng đăng nhập';
						die(json_encode($return));
					}
					if($datauser['Online'] == 1){
						$return['error'] = 1;
						$return['msg']   = 'Tài khoản đang Online, không thể thao tác';
						die(json_encode($return));
					}
					if (THCMS_Controller_Function::CheckShopCars($id)) {
						$return['error'] = 1;
						$return['msg']   = 'Phương tiện này không tồn tại.<br>Vui lòng chọn loại khác hoặc Load lại web nhé (F5)';
						die(json_encode($return));
					}
					if($user != $datauser['Username']){
						$return['error'] = 1;
						$return['msg']   = 'Tài khoản mua hàng và tài khoản web không giống nhau<br>Bug thì coi chừng nhé!';
						die(json_encode($return));
					}
					$getcars = THCMS_Controller_Function::GetShopCars($id);	
					if($getcars['Cars_Active'] == 0){
						$return['error'] = 1;
						$return['msg']   = 'Phương tiện này không còn bán nữa.<br>Vui lòng chọn vip khác';
						die(json_encode($return));
					}
					$VehicleSlot = $datauser['VehicleSlot'] +5;
					if(THCMS_Controller_Function::CheckVehicleSlot($datauser['id']) >= $VehicleSlot){
						$return['error'] = 1;
						$return['msg']   = 'Slot xe không đủ để mua thêm xe. vui lòng mua slot xe.';
						die(json_encode($return));	
					}
					if($datauser['Credits'] >= $getcars['Cars_Price']){
						
						$total = $datauser['Credits'] - $getcars['Cars_Price'];
						THCMS_Controller_Function::SaveLogsStore($name,'Xe',$datauser['Username'],$datauser['id'],$datauser['Credits'],$total,$getcars['Cars_Price']);
						THCMS_Controller_Function::UpdateCredits($total,$datauser['id']);
						THCMS_Controller_Function::CreatShopCars($datauser['id'],$getcars['Cars_ID'],$datauser['SPos_x'],$datauser['SPos_y'],$datauser['SPos_z']);
						$return['msg']   = 'Mua phương tiện: '.$name.' với giá: '.number_format($getcars['Cars_Price']).' Credits<br>Tọa độ xe ở vị trí bạn đứng trong game';
						die(json_encode($return));
					}else{
						
						$return['error'] = 1;
						$return['msg']   = 'Tài khoản không đủ Credits để mua phương tiện này này';
						die(json_encode($return));
					}
			}
			if ($t == 'buy-shop-item') {
				$id = THCMS_Controller_Function::POST($_POST['id']);
				$user = THCMS_Controller_Function::POST($_POST['user']);
				$name = THCMS_Controller_Function::POST($_POST['name']);
					if(!$user_id){
						$return['error'] = 1;
						$return['msg']   = 'Vui lòng đăng nhập';
						die(json_encode($return));
					}
					if($datauser['Online'] == 1){
						$return['error'] = 1;
						$return['msg']   = 'Tài khoản đang Online, không thể thao tác';
						die(json_encode($return));
					}
					if (THCMS_Controller_Function::CheckShopItem($id)) {
						$return['error'] = 1;
						$return['msg']   = 'Vật phẩm này không tồn tại.<br>Vui lòng chọn loại khác hoặc Load lại web nhé (F5)';
						die(json_encode($return));
					}
					if($user != $datauser['Username']){
						$return['error'] = 1;
						$return['msg']   = 'Tài khoản mua hàng và tài khoản web không giống nhau<br>Bug thì coi chừng nhé!';
						die(json_encode($return));
					}
					$getitem = THCMS_Controller_Function::GetShopItem($id);	
					if($getitem['Item_Active'] == 0){
						$return['error'] = 1;
						$return['msg']   = 'Phương tiện này không còn bán nữa.<br>Vui lòng chọn vật phẩm khác';
						die(json_encode($return));
					}
					if($datauser['Boombox'] == $getitem['id']){
						$return['error'] = 1;
						$return['msg']   = 'Bạn đã có boombox, Bạn không thể mua thêm boombox';
						die(json_encode($return));
					}
					if($datauser['Credits'] >= $getitem['Item_Price']){
						
						$total = $datauser['Credits'] - $getitem['Item_Price'];
						$item = $datauser[''.$getitem['Item_Cloum'].''] + $getitem['Item_Value'];
						THCMS_Controller_Function::SaveLogsStore($getitem['Item_Name'],'Item',$datauser['Username'],$datauser['id'],$datauser['Credits'],$total,$getitem['Item_Price']);
						THCMS_Controller_Function::UpdateCredits($total,$datauser['id']);
						THCMS_Controller_Function::UpdateItem($getitem['Item_Cloum'],$item,$datauser['id']);
						$return['msg']   = 'Đã mua vật phẩm: '.$getitem['Item_Name'].' với giá: '.number_format($getitem['Item_Price']).' Credits';
						die(json_encode($return));
					}else{
						
						$return['error'] = 1;
						$return['msg']   = 'Tài khoản không đủ Credits để mua món đồ này';
						die(json_encode($return));
					}
					
			}
			if ($t == 'buy-shop-skin') {
				$id = THCMS_Controller_Function::POST($_POST['id']);
				$user = THCMS_Controller_Function::POST($_POST['user']);
				$name = THCMS_Controller_Function::POST($_POST['name']);
				$idskin = THCMS_Controller_Function::POST($_POST['idskin']);
					if(!$user_id){
						$return['error'] = 1;
						$return['msg']   = 'Vui lòng đăng nhập';
						die(json_encode($return));
					}
					if($datauser['Online'] == 1){
						$return['error'] = 1;
						$return['msg']   = 'Tài khoản đang Online, không thể thao tác';
						die(json_encode($return));
					}
					if (THCMS_Controller_Function::CheckShopSkin($id)) {
						$return['error'] = 1;
						$return['msg']   = 'Skin này không còn bán trên shop nữa.<br>Vui lòng chọn loại khác hoặc Load lại web nhé (F5)';
						die(json_encode($return));
					}
					if($user != $datauser['Username']){
						$return['error'] = 1;
						$return['msg']   = 'Tài khoản mua hàng và tài khoản web không giống nhau<br>Bug thì coi chừng nhé!';
						die(json_encode($return));
					}
					$getskin = THCMS_Controller_Function::GetShopSkin($id);	
					if($getskin['Skin_Active'] == 0){
						$return['error'] = 1;
						$return['msg']   = 'Skin này không còn bán nữa.<br>Vui lòng chọn skin khác';
						die(json_encode($return));
					}
					if($getskin['Skin_ID'] == $datauser['Model']){
						$return['error'] = 1;
						$return['msg']   = 'Bạn đã có skin này rồi.<br> Vui lòng không mua skin mà bạn đã sỡ hữu';
						die(json_encode($return));
					}
					if($datauser['Credits'] >= $getskin['Skin_Price']){
						$total = $datauser['Credits'] - $getskin['Skin_Price'];
						THCMS_Controller_Function::SaveLogsStore($getskin['Skin_Name'],'Skin',$datauser['Username'],$datauser['id'],$datauser['Credits'],$total,$getskin['Skin_Price']);
						THCMS_Controller_Function::UpdateCredits($total,$datauser['id']);
						//THCMS_Controller_Function::UpdateSkin($getskin['Skin_ID'],$datauser['id']);
						if($datauser['Inv_ItemID_0'] == '0'){
							THCMS_Controller_Function::UpdateSkinTuiDo('Inv_ItemID_0','Inv_ItemAmount_0',$getskin['Skin_ID'],$datauser['id']);
						}elseif($datauser['Inv_ItemID_1'] == '0'){
							THCMS_Controller_Function::UpdateSkinTuiDo('Inv_ItemID_1','Inv_ItemAmount_1',$getskin['Skin_ID'],$datauser['id']);
						}elseif($datauser['Inv_ItemID_2'] == '0'){
							THCMS_Controller_Function::UpdateSkinTuiDo('Inv_ItemID_2','Inv_ItemAmount_2',$getskin['Skin_ID'],$datauser['id']);
						}elseif($datauser['Inv_ItemID_3'] == '0'){
							THCMS_Controller_Function::UpdateSkinTuiDo('Inv_ItemID_3','Inv_ItemAmount_3',$getskin['Skin_ID'],$datauser['id']);
						}elseif($datauser['Inv_ItemID_4'] == '0'){
							THCMS_Controller_Function::UpdateSkinTuiDo('Inv_ItemID_4','Inv_ItemAmount_4',$getskin['Skin_ID'],$datauser['id']);
						}elseif($datauser['Inv_ItemID_5'] == '0'){
							THCMS_Controller_Function::UpdateSkinTuiDo('Inv_ItemID_5','Inv_ItemAmount_5',$getskin['Skin_ID'],$datauser['id']);
						}elseif($datauser['Inv_ItemID_6'] == '0'){
							THCMS_Controller_Function::UpdateSkinTuiDo('Inv_ItemID_6','Inv_ItemAmount_6',$getskin['Skin_ID'],$datauser['id']);
						}elseif($datauser['Inv_ItemID_7'] == '0'){
							THCMS_Controller_Function::UpdateSkinTuiDo('Inv_ItemID_7','Inv_ItemAmount_7',$getskin['Skin_ID'],$datauser['id']);
						}elseif($datauser['Inv_ItemID_8'] == '0'){
							THCMS_Controller_Function::UpdateSkinTuiDo('Inv_ItemID_8','Inv_ItemAmount_8',$getskin['Skin_ID'],$datauser['id']);
						}elseif($datauser['Inv_ItemID_9'] == '0'){
							THCMS_Controller_Function::UpdateSkinTuiDo('Inv_ItemID_9','Inv_ItemAmount_9',$getskin['Skin_ID'],$datauser['id']);
						}elseif($datauser['Inv_ItemID_10'] == '0'){
							THCMS_Controller_Function::UpdateSkinTuiDo('Inv_ItemID_10','Inv_ItemAmount_10',$getskin['Skin_ID'],$datauser['id']);
						}elseif($datauser['Inv_ItemID_11'] == '0'){
							THCMS_Controller_Function::UpdateSkinTuiDo('Inv_ItemID_11','Inv_ItemAmount_11',$getskin['Skin_ID'],$datauser['id']);
						}elseif($datauser['Inv_ItemID_12'] == '0'){
							THCMS_Controller_Function::UpdateSkinTuiDo('Inv_ItemID_12','Inv_ItemAmount_12',$getskin['Skin_ID'],$datauser['id']);
						}elseif($datauser['Inv_ItemID_13'] == '0'){
							THCMS_Controller_Function::UpdateSkinTuiDo('Inv_ItemID_13','Inv_ItemAmount_13',$getskin['Skin_ID'],$datauser['id']);
						}elseif($datauser['Inv_ItemID_14'] == '0'){
							THCMS_Controller_Function::UpdateSkinTuiDo('Inv_ItemID_14','Inv_ItemAmount_14',$getskin['Skin_ID'],$datauser['id']);
						}elseif($datauser['Inv_ItemID_15'] == '0'){
							THCMS_Controller_Function::UpdateSkinTuiDo('Inv_ItemID_15','Inv_ItemAmount_15',$getskin['Skin_ID'],$datauser['id']);
						}elseif($datauser['Inv_ItemID_16'] == '0'){
							THCMS_Controller_Function::UpdateSkinTuiDo('Inv_ItemID_16','Inv_ItemAmount_16',$getskin['Skin_ID'],$datauser['id']);
						}elseif($datauser['Inv_ItemID_17'] == '0'){
							THCMS_Controller_Function::UpdateSkinTuiDo('Inv_ItemID_17','Inv_ItemAmount_17',$getskin['Skin_ID'],$datauser['id']);
						}elseif($datauser['Inv_ItemID_18'] == '0'){
							THCMS_Controller_Function::UpdateSkinTuiDo('Inv_ItemID_18','Inv_ItemAmount_18',$getskin['Skin_ID'],$datauser['id']);
						}elseif($datauser['Inv_ItemID_19'] == '0'){
							THCMS_Controller_Function::UpdateSkinTuiDo('Inv_ItemID_19','Inv_ItemAmount_19',$getskin['Skin_ID'],$datauser['id']);
						}elseif($datauser['Inv_ItemID_20'] == '0'){
							THCMS_Controller_Function::UpdateSkinTuiDo('Inv_ItemID_20','Inv_ItemAmount_20',$getskin['Skin_ID'],$datauser['id']);
						}elseif($datauser['Inv_ItemID_21'] == '0'){
							THCMS_Controller_Function::UpdateSkinTuiDo('Inv_ItemID_21','Inv_ItemAmount_21',$getskin['Skin_ID'],$datauser['id']);
						}elseif($datauser['Inv_ItemID_22'] == '0'){
							THCMS_Controller_Function::UpdateSkinTuiDo('Inv_ItemID_22','Inv_ItemAmount_22',$getskin['Skin_ID'],$datauser['id']);
						}elseif($datauser['Inv_ItemID_23'] == '0'){
							THCMS_Controller_Function::UpdateSkinTuiDo('Inv_ItemID_23','Inv_ItemAmount_23',$getskin['Skin_ID'],$datauser['id']);
						}else{
							
						}
						$return['msg']   = 'Đã mua Skin: '.$getskin['Skin_Name'].' với giá: '.number_format($getskin['Skin_Price']).' Credits<br>Skin được lưu trữ tại túi đồ<br>Vào game bấm: <b>H</b> kiểm tra';
						die(json_encode($return));
					}else{
						
						$return['error'] = 1;
						$return['msg']   = 'Tài khoản không đủ Credits để mua món đồ này';
						die(json_encode($return));
					}
			}
			if ($t == 'buy-shop-skin-gun') {
				$id = THCMS_Controller_Function::POST($_POST['id']);
				$user = THCMS_Controller_Function::POST($_POST['user']);
				$name = THCMS_Controller_Function::POST($_POST['name']);
					if(!$user_id){
						$return['error'] = 1;
						$return['msg']   = 'Vui lòng đăng nhập';
						die(json_encode($return));
					}
					if($datauser['Online'] == 1){
						$return['error'] = 1;
						$return['msg']   = 'Tài khoản đang Online, không thể thao tác';
						die(json_encode($return));
					}
					if (THCMS_Controller_Function::CheckShopSkinGun($id)) {
						$return['error'] = 1;
						$return['msg']   = 'Skin này không còn bán trên shop nữa.<br>Vui lòng chọn loại khác hoặc Load lại web nhé (F5)';
						die(json_encode($return));
					}
					if($user != $datauser['Username']){
						$return['error'] = 1;
						$return['msg']   = 'Tài khoản mua hàng và tài khoản web không giống nhau<br>Bug thì coi chừng nhé!';
						die(json_encode($return));
					}
					$getskingun = THCMS_Controller_Function::GetShopSkinGun($id);	
					if($getskingun['Gun_Active'] == 0){
						$return['error'] = 1;
						$return['msg']   = 'Skin này không còn bán nữa.<br>Vui lòng chọn skin khác';
						die(json_encode($return));
					}
					if($datauser[$getskingun['Gun_Cloum']] > 0){
						$return['error'] = 1;
						$return['msg']   = 'Bạn đã có skin súng này rồi.<br>Vui lòng chọn skin khác';
						die(json_encode($return));
					}
					if($datauser['Credits'] >= $getskingun['Gun_Price']){
						$total = $datauser['Credits'] - $getskingun['Gun_Price'];
						THCMS_Controller_Function::SaveLogsStore($getskingun['Gun_Name'],'SkinGun',$datauser['Username'],$datauser['id'],$datauser['Credits'],$total,$getskingun['Gun_Price']);
						THCMS_Controller_Function::UpdateCredits($total,$datauser['id']);
						THCMS_Controller_Function::UpdateSkinGun($getskingun['Gun_Cloum'],$getskingun['Gun_Value'],$datauser['id']);
						$return['msg']   = 'Đã mua vật Skin: '.$getskingun['Gun_Name'].' với giá: '.number_format($getskingun['Gun_Price']).' Credits';
						die(json_encode($return));
					}else{
						
						$return['error'] = 1;
						$return['msg']   = 'Tài khoản không đủ Credits để mua món đồ này';
						die(json_encode($return));
					}
			}
			if ($t == 'buy-shop-toys') {
				$id = THCMS_Controller_Function::POST($_POST['id']);
				$user = THCMS_Controller_Function::POST($_POST['user']);
				$toys = THCMS_Controller_Function::POST($_POST['toys']);
				$name = THCMS_Controller_Function::POST($_POST['name']);
					if(!$user_id){
						$return['error'] = 1;
						$return['msg']   = 'Vui lòng đăng nhập';
						die(json_encode($return));
					}
					if($datauser['Online'] == 1){
						$return['error'] = 1;
						$return['msg']   = 'Tài khoản đang Online, không thể thao tác';
						die(json_encode($return));
					}
					if (THCMS_Controller_Function::CheckShopToys($id)) {
						$return['error'] = 1;
						$return['msg']   = 'Đồ chơi này không tồn tại.<br>Vui lòng chọn loại khác hoặc Load lại web nhé (F5)';
						die(json_encode($return));
					}
					if($user != $datauser['Username']){
						$return['error'] = 1;
						$return['msg']   = 'Tài khoản mua hàng và tài khoản web không giống nhau<br>Bug thì coi chừng nhé!';
						die(json_encode($return));
					}
					$gettoys = THCMS_Controller_Function::GetShopToys($id);	
					if($gettoys['Toys_Active'] == 0){
						$return['error'] = 1;
						$return['msg']   = 'Đồ chơi này không còn bán nữa.<br>Vui lòng chọn loại khác';
						die(json_encode($return));
					}
					$ToysSlot = $datauser['ToySlot'] +10;
					if(THCMS_Controller_Function::CheckToysSlot($datauser['id']) >= $ToysSlot){
						$return['error'] = 1;
						$return['msg']   = 'Slot toys không đủ. vui lòng mua thêm slot toys.';
						die(json_encode($return));	
					}
					if($datauser['Credits'] >= $gettoys['Toys_Price']){
						
						$total = $datauser['Credits'] - $gettoys['Toys_Price'];
						THCMS_Controller_Function::SaveLogsStore($name,'Toys',$datauser['Username'],$datauser['id'],$datauser['Credits'],$total,$gettoys['Toys_Price']);
						THCMS_Controller_Function::UpdateCredits($total,$datauser['id']);
						THCMS_Controller_Function::CreatShopToys($datauser['id'],$gettoys['Toys_ID']);
						$return['msg']   = 'Mua đồ chơi: '.$name.' với giá: '.number_format($gettoys['Toys_Price']).' Credits';
						die(json_encode($return));
					}else{
						
						$return['error'] = 1;
						$return['msg']   = 'Tài khoản không đủ Credits để mua món đồ này';
						die(json_encode($return));
					}
			}
			if ($t == 'reloadcard') {
				$type_card_name = THCMS_Controller_Function::POST($_POST['type_card_name']);
				$type_card_price = THCMS_Controller_Function::POST($_POST['type_card_price']);
				$type_card_seri = THCMS_Controller_Function::POST($_POST['type_card_seri']);
				$type_card_mathe = THCMS_Controller_Function::POST($_POST['type_card_mathe']);
					//Lấy thông tin từ thesieutoc
					$apikey = 'CC50E99F8E932348A370B86BF65B75A8';
				if(!$user_id){
						$return['error'] = 1;
						$return['msg']   = 'Vui lòng đăng nhập';
						die(json_encode($return));
					}
					
					if($type_card_name == 0){
						$return['error'] = 1;
						$return['msg']   = 'Chưa chọn loại thẻ nạp';
						die(json_encode($return));
					}
					if($type_card_price == 0){
						$return['error'] = 1;
						$return['msg']   = 'Chưa chọn mệnh giá nạp';
						die(json_encode($return));
					}
					if($type_card_name == 1){
						$card_name = 'VIETTEL';	
						$card_send = 'Viettel';	
					}elseif($type_card_name == 2){
						$card_name = 'MOBI';
						$card_send = 'Mobifone';	
					}elseif($type_card_name == 3){
						$card_name = 'VINA';	
						$card_send = 'Vinaphone';	
					}elseif($type_card_name == 4){
						$card_name = 'GATE';
						$card_send = 'Gate';	
					}elseif($type_card_name == 5){
						$card_name = 'ZING';
						$card_send = 'Zing';	
					}else{
						$card_name = 'Error';
					}
					if($type_card_price == 1){
						$card_price = 20000;
						
					}elseif($type_card_price == 2){
						$card_price = 50000;	
						
					}elseif($type_card_price == 3){
						$card_price = 100000;	
						
					}elseif($type_card_price == 4){
						$card_price = 200000;	
						
					}elseif($type_card_price == 5){
						$card_price = 500000;	
						
					}
					if($datauser['Online'] == 1){
						$return['error'] = 1;
						$return['msg']   = 'Tài khoản đang Online, không thể thao tác';
						die(json_encode($return));
					}else{
					    $secret = hash("sha256", time().rand(1,9999));
						$type_card_note = 'Tài_khoản: '.$datauser['Username'].' '.$datauser['id'].' '.$card_price.' '.$card_name.' '.$secret;
						$api = THCMS_Controller_Function::APITheSieuToc($apikey,$type_card_mathe,$type_card_seri,$card_send,$card_price,$type_card_note);
						if ($api['status'] == '00' || $api['status'] == 'thanhcong'){
							$return['msg']   = 'Gửi thẻ '.$card_name.' lên hệ thống thành công Vui lòng chờ hệ thống kiểm tra thẻ !';
							THCMS_Controller_Function::SaveLogsReloadCard($datauser['Username'],$datauser['id'],$card_send,$card_price,$api['msg'],'0',$type_card_seri,$type_card_mathe,$secret);
						die(json_encode($return));
						}else{
						$return['error'] = 1;
						$return['msg']   = $api['msg'];
						die(json_encode($return));
						}
						
					}
					
					
					
			}
			if($t == 'active-forum'){
				$user = THCMS_Controller_Function::POST($_POST['user']);
				$password = THCMS_Controller_Function::POST($_POST['password']);
				$Hash_Whirlpool = THCMS_Controller_Function::Hash_Whirlpool($password);
					if(!$user_id){
						$return['error'] = 1;
						$return['msg']   = 'Vui lòng đăng nhập';
						die(json_encode($return));
					}
					if($user != $datauser['Username']){
						$return['error'] = 1;
						$return['msg']   = 'Tài khoản không đồng nhất';
						die(json_encode($return));
					}
					if($datauser['Online'] == 1){
						$return['error'] = 1;
						$return['msg']   = 'Tài khoản đang Online, không thể thao tác';
						die(json_encode($return));
					}
					if($datauser['Active_Mail'] == 0){
						$return['error'] = 1;
						$return['msg']   = 'Tài khoản chưa kích hoạt email.<br>Bạn bị hạn chế chức năng này';
						die(json_encode($return));
					}
					if($datauser['Active_Forum'] == 1){
						$return['error'] = 1;
						$return['msg']   = 'Tài khoản đã được Active Forum. Bạn không cần Active';
						die(json_encode($return));
					}
					if($Hash_Whirlpool != $datauser['Key']){
						$return['error'] = 1;
						$return['msg']   = 'Mật khẩu không đúng';
						die(json_encode($return));
					}else{
						
						$rootPath_Forum = realpath($fileDir . '/../../../');
						require($rootPath_Forum . '/forum/src/XF.php');
						XF::start($rootPath_Forum);
						$registration = XF::service('XF:User\Registration');
						$input['username'] = $datauser['Username'];
						$input['email'] = $datauser['Email'];
						$input['password'] = $password;
						$registration->setFromInput($input);
						if(THCMS_Controller_Function::SaveActiveForum($datauser['Username'],$datauser['Email'],$datauser['id'])){
							$registration->save();
						$return['msg']   = 'Kích hoạt thành công.<br>Bạn có thể đăng nhập forum bằng tài khoản này.';
							die(json_encode($return));
						}else{
							$return['error'] = 1;
							$return['msg']   = 'Lỗi khi kích hoạt. Vui lòng liên hệ admin';
							die(json_encode($return));
						}
					}
			}
			if($t == 'fixcrash'){
				$user = THCMS_Controller_Function::POST($_POST['user']);
				$password = THCMS_Controller_Function::POST($_POST['password']);
				$Hash_Whirlpool = THCMS_Controller_Function::Hash_Whirlpool($password);
					if(!$user_id){
						$return['error'] = 1;
						$return['msg']   = 'Vui lòng đăng nhập';
						die(json_encode($return));
					}
					if($user != $datauser['Username']){
						$return['error'] = 1;
						$return['msg']   = 'Tài khoản không đồng nhất';
						die(json_encode($return));
					}
					if($datauser['Online'] == 1){
						$return['error'] = 1;
						$return['msg']   = 'Tài khoản đang Online, không thể thao tác';
						die(json_encode($return));
					}
					if($datauser['TimeSetting'] > time()){
						$return['error'] = 1;
						$return['msg']   = 'Thời gian thay đổi cách nhau 60 phút';
						die(json_encode($return));
					}
					if($datauser['KhoaTK'] > 0){
						$return['error'] = 1;
						$return['msg']   = 'Tài khoản bị khóa. không thể sử dụng chức năng';
						die(json_encode($return));
					}
					if($datauser['JailTime'] > 0){
						$return['error'] = 1;
						$return['msg']   = 'Tài khoản đang trong trạng thái ở tù, không thể sử dụng chức năng';
						die(json_encode($return));
					}
					if($Hash_Whirlpool != $datauser['Key']){
						$return['error'] = 1;
						$return['msg']   = 'Mật khẩu không đúng';
						die(json_encode($return));
					}else{
						
						if(THCMS_Controller_Function::FixCrash($datauser['id'])){
						THCMS_Controller_Function::UpdateTimeSetting(time()+3600,$datauser['id']);
						$return['msg']   = 'Fix kẹt thành công. <br> Vào game kiểm tra nhé!';
							die(json_encode($return));
						}else{
							$return['error'] = 1;
							$return['msg']   = 'Lỗi khi fix crash. Vui lòng liên hệ admin';
							die(json_encode($return));
						}
					}
			}
			if($t == 'system'){
				if(!$user_id){
						$return['error'] = 1;
						$return['msg']   = 'Vui lòng đăng nhập';
						die(json_encode($return));
				}
				if($datauser['Panel'] == 0){
						$return['error'] = 1;
						$return['msg']   = 'Bạn không phải Admin';
						die(json_encode($return));
				}
				$title = THCMS_Controller_Function::POST($_POST['title']);
				$url = THCMS_Controller_Function::POST($_POST['url']);
				$url_forum = THCMS_Controller_Function::POST($_POST['url_forum']);
				$logo_img = THCMS_Controller_Function::POST($_POST['logo_img']);
				$logo_text = THCMS_Controller_Function::POST($_POST['logo_text']);
				$copyright = THCMS_Controller_Function::POST($_POST['copyright']);
				$keywords = THCMS_Controller_Function::POST($_POST['keywords']);
				$description = THCMS_Controller_Function::POST($_POST['description']);
				if($title == NULL || $url == NULL || $url_forum == NULL || $logo_img == NULL || $logo_text == NULL || $copyright == NULL){
					$return['error'] = 1;
					$return['msg']   = 'Bạn đã bỏ trống 1 số quan trọng. Không thể lưu';
					die(json_encode($return));
				}else{
					THCMS_Controller_Function::SaveSystem($title,$url,$url_forum,$logo_img,$logo_text,$copyright,$keywords,$description);
					$return['msg']   = 'Đã Lưu Cấu Hình Website';
					die(json_encode($return));
				}

			}
			if($t == 'savemailer'){
				$Mailer = THCMS_Controller_Function::POST($_POST['Mailer']);
				$Password = THCMS_Controller_Function::POST($_POST['Password']);
				$SMTP = THCMS_Controller_Function::POST($_POST['SMTP']);
				$Port = THCMS_Controller_Function::POST($_POST['Port']);
				if(!$user_id){
						$return['error'] = 1;
						$return['msg']   = 'Vui lòng đăng nhập';
						die(json_encode($return));
				}
				if($datauser['Panel'] == 0){
						$return['error'] = 1;
						$return['msg']   = 'Bạn không phải Admin';
						die(json_encode($return));
				}
				if($Mailer == NULL || $Password == NULL || $SMTP == NULL || $Port == NULL){
					$return['error'] = 1;
					$return['msg']   = 'Bạn đã bỏ trống 1 số quan trọng. Không thể lưu';
					die(json_encode($return));
				}else{
					THCMS_Controller_Function::SaveMailer($Mailer,$Password,$SMTP,$Port);
					$return['msg']   = 'Đã Lưu Cấu Hình Mailer';
					die(json_encode($return));
				}
			}
			if($t == 'panel-shop-cars-edit'){
				$uid = THCMS_Controller_Function::POST($_POST['uid']);
				$name = THCMS_Controller_Function::POST($_POST['name']);
				$id = THCMS_Controller_Function::POST($_POST['id']);
				$price = THCMS_Controller_Function::POST($_POST['price']);
				$activecars = THCMS_Controller_Function::POST($_POST['activecars']);
				if(!$user_id){
						$return['error'] = 1;
						$return['msg']   = 'Vui lòng đăng nhập';
						die(json_encode($return));
				}
				if($datauser['Panel'] == 0){
						$return['error'] = 1;
						$return['msg']   = 'Bạn không phải Admin';
						die(json_encode($return));
				}
				if (THCMS_Controller_Function::CheckShopCars($uid)) {
						$return['error'] = 1;
						$return['msg']   = 'Phương tiện này không tồn tại.<br>Vui lòng chọn loại khác hoặc Load lại web nhé (F5)';
						die(json_encode($return));
				}
				if($activecars > 1 && $activecars < 0){
					$return['error'] = 1;
					$return['msg']   = 'Active Cars phải là 1 hoặc 0';
					die(json_encode($return));
				}
				if($name == NULL || $id == NULL || $price == NULL){
					$return['error'] = 1;
					$return['msg']   = 'Bạn đã bỏ trống 1 số quan trọng. Không thể lưu';
					die(json_encode($return));
				}else{
					THCMS_Controller_Function::SaveEditCars($name,$id,$price,$activecars,$uid);
					$return['msg']   = 'Đã Edit Xe: '.$name.' ID: '.$id.'';
					die(json_encode($return));
				}
			}
			if($t == 'Load-Panel-Reload'){
				if($datauser['Panel'] == 0){
						$return['error'] = 1;
						$return['msg']   = 'Bạn không phải Admin';
						die(json_encode($return));
				}
				$mem = THCMS_Controller_Function::LoadPanelList('load-reload');
				$data = array();
				$long = count($mem);
					for ($i=0; $i < $long; $i++) {
						$data[] = array(
						$mem[$i]['id'],
						'<a href="'.$system['url'].'/Auth/Profile/'.$mem[$i]['Username'].'">'.$mem[$i]['Username'].'</a>',
						$mem[$i]['NameCard'],
						number_format($mem[$i]['PriceCard']),
						$mem[$i]['SeriCard'],
						$mem[$i]['PinCard'],
						$mem[$i]['ContentCard'],
						THCMS_Controller_Function::Dipslay_Date($mem[$i]['TimeCard']).' - '.THCMS_Controller_Function::Date_Number($mem[$i]['TimeCard'])
						);
					}
					$return = array('data' => $data);
					die(json_encode($return));
			}
			if($t == 'Load-Panel-Change-Name'){
				if($datauser['Panel'] == 0){
						$return['error'] = 1;
						$return['msg']   = 'Bạn không phải Admin';
						die(json_encode($return));
				}
				$mem = THCMS_Controller_Function::LoadPanelList('load-change-name');
				$data = array();
				$long = count($mem);
					for ($i=0; $i < $long; $i++) {
						$data[] = array(
						$mem[$i]['id'],
						$mem[$i]['ID_User'],
						$mem[$i]['Name_Old'],
						'<a href="'.$system['url'].'/Auth/Profile/'.$mem[$i]['Name_News'].'">'.$mem[$i]['Name_News'].'</a>',
						THCMS_Controller_Function::Dipslay_Date($mem[$i]['TimeChange']).' - '.THCMS_Controller_Function::Date_Number($mem[$i]['TimeChange'])
						);
					}
					$return = array('data' => $data);
					die(json_encode($return));
			}
			if($t == 'Load-Panel-Member'){
				if($datauser['Panel'] == 0){
						$return['error'] = 1;
						$return['msg']   = 'Bạn không phải Admin';
						die(json_encode($return));
				}
				$mem = THCMS_Controller_Function::LoadPanelList('load-member');
				$data = array();
				$long = count($mem);
					for ($i=0; $i < $long; $i++) {
						$data[] = array(
						$mem[$i]['id'],
						'<a href="'.$system['url'].'/Auth/Profile/'.$mem[$i]['Username'].'">'.$mem[$i]['Username'].'</a>',
						$mem[$i]['IP'],
						'<a href="#" class="btn btn-sm btn-primary width-60 m-r-2">Edit</a><a href="#" class="btn btn-sm btn-white width-60">Delete</a>'
						);
					}
					$return = array('data' => $data);
					die(json_encode($return));
			}
			if($t == 'Load-Panel-ShopToys'){
				if($datauser['Panel'] == 0){
						$return['error'] = 1;
						$return['msg']   = 'Bạn không phải Admin';
						die(json_encode($return));
				}
				$mem = THCMS_Controller_Function::LoadPanelShop('ShopToys');
				$data = array();
				$long = count($mem);
					for ($i=0; $i < $long; $i++) {
						if($mem[$i]['Toys_Active'] == 0 ){
							$active = '';
						}else{
							$active = 'checked';
						}	
						$data[] = array(
						$mem[$i]['id'],
						'<img src="'.$system['url'].'/Auth/Picture/Toys-'.$mem[$i]['Toys_ID'].'" alt="Avatar" class="img-rounded height-30"/>',
						$mem[$i]['Toys_Name'],
						$mem[$i]['Toys_ID'],
						number_format($mem[$i]['Toys_Price']),
						'<input type="checkbox" data-render="switchery" data-theme="blue" data-change="check-switchery-state-text" '.$active.' value="'.$mem[$i]['id'].'" />',
						);
					}
					$return = array('data' => $data);
					die(json_encode($return));
			}
			if($t == 'creat-cars'){
				$name = THCMS_Controller_Function::POST($_POST['name']);
				$id = THCMS_Controller_Function::POST($_POST['id']);
				$price = THCMS_Controller_Function::POST($_POST['price']);
				if(!$user_id){
						$return['error'] = 1;
						$return['msg']   = 'Vui lòng đăng nhập';
						die(json_encode($return));
				}
				if($datauser['Panel'] == 0){
						$return['error'] = 1;
						$return['msg']   = 'Bạn không phải Admin';
						die(json_encode($return));
				}
				if($name == NULL || $id == NULL || $price == NULL){
					$return['error'] = 1;
					$return['msg']   = 'Bạn đã bỏ trống 1 số quan trọng. Không thể lưu';
					die(json_encode($return));
				}
				if (THCMS_Controller_Function::CheckIDCars($id)) {
						$return['error'] = 1;
						$return['msg']   = 'Phương tiện đã tồn tại.<br>Vui lòng chỉnh sửa. không được thêm';
						die(json_encode($return));
				}
				if($id >612 && $id <399){
						$return['error'] = 1;
						$return['msg']   = 'ID phương tiện không đúng >= 400 or 611 =<';
						die(json_encode($return));
				}else{
					THCMS_Controller_Function::CreatPanelShopCars($name,$id,$price);
					$return['msg']   = 'Đã Thêm Xe: '.$name.' ID Xe: '.$id.'';
					die(json_encode($return));
				}

			}
			if($t == 'panel-shop-toys-edit'){
				$id = THCMS_Controller_Function::POST($_POST['id']);
				$nametoys = THCMS_Controller_Function::POST($_POST['nametoys']);
				$idtoys = THCMS_Controller_Function::POST($_POST['idtoys']);
				$pricetoys = THCMS_Controller_Function::POST($_POST['pricetoys']);
				if(!$user_id){
						$return['error'] = 1;
						$return['msg']   = 'Vui lòng đăng nhập';
						die(json_encode($return));
				}
				if($datauser['Panel'] == 0){
						$return['error'] = 1;
						$return['msg']   = 'Bạn không phải Admin';
						die(json_encode($return));
				}
				if (THCMS_Controller_Function::CheckShopToys($id)) {
						$return['error'] = 1;
						$return['msg']   = 'Toys này không tồn tại.<br>Vui lòng chọn loại khác hoặc Load lại web nhé (F5)';
						die(json_encode($return));
				}
				if($nametoys == NULL || $idtoys == NULL || $pricetoys == NULL){
					$return['error'] = 1;
					$return['msg']   = 'Bạn đã bỏ trống 1 số quan trọng. Không thể lưu';
					die(json_encode($return));
				}else{
					THCMS_Controller_Function::SaveEditToys($nametoys,$idtoys,$pricetoys,$id);
					$return['msg']   = 'Đã Edit Toys: '.$nametoys.' ID: '.$idtoys.'';
					die(json_encode($return));
				}
			}
			if($t == 'creat-toys'){
				$name = THCMS_Controller_Function::POST($_POST['name']);
				$id = THCMS_Controller_Function::POST($_POST['id']);
				$price = THCMS_Controller_Function::POST($_POST['price']);
				if(!$user_id){
						$return['error'] = 1;
						$return['msg']   = 'Vui lòng đăng nhập';
						die(json_encode($return));
				}
				if($datauser['Panel'] == 0){
						$return['error'] = 1;
						$return['msg']   = 'Bạn không phải Admin';
						die(json_encode($return));
				}
				if($name == NULL || $id == NULL || $price == NULL){
					$return['error'] = 1;
					$return['msg']   = 'Bạn đã bỏ trống 1 số quan trọng. Không thể lưu';
					die(json_encode($return));
				}
				if (THCMS_Controller_Function::CheckIDToys($id)) {
						$return['error'] = 1;
						$return['msg']   = 'Toys đã tồn tại.<br>Vui lòng chỉnh sửa. không được thêm';
						die(json_encode($return));
				}else{
					THCMS_Controller_Function::CreatPanelShopToys($name,$id,$price);
					$return['msg']   = 'Đã Thêm Toys: '.$name.' ID Toys: '.$id.'';
					die(json_encode($return));
				}

			}
			if($t == 'panel-shop-vip-edit'){
				$uid = THCMS_Controller_Function::POST($_POST['uid']);
				$name = THCMS_Controller_Function::POST($_POST['name']);
				$info = THCMS_Controller_Function::POST($_POST['info']);
				$id = THCMS_Controller_Function::POST($_POST['id']);
				$price = THCMS_Controller_Function::POST($_POST['price']);
				$active = THCMS_Controller_Function::POST($_POST['active']);
				if(!$user_id){
						$return['error'] = 1;
						$return['msg']   = 'Vui lòng đăng nhập';
						die(json_encode($return));
				}
				if($datauser['Panel'] == 0){
						$return['error'] = 1;
						$return['msg']   = 'Bạn không phải Admin';
						die(json_encode($return));
				}
				if (THCMS_Controller_Function::CheckShopVip($uid)) {
						$return['error'] = 1;
						$return['msg']   = 'VIP này không tồn tại.<br>Vui lòng chọn vip khác hoặc Load lại web nhé (F5)';
						die(json_encode($return));
				}
				if($active > 1 && $active < 0){
					$return['error'] = 1;
					$return['msg']   = 'Active VIP phải là 1 hoặc 0';
					die(json_encode($return));
				}
				if($name == NULL || $id == NULL || $price == NULL){
					$return['error'] = 1;
					$return['msg']   = 'Bạn đã bỏ trống 1 số quan trọng. Không thể lưu';
					die(json_encode($return));
				}else{
					THCMS_Controller_Function::SaveEditVIP($name,$id,$price,$info,$active,$uid);
					$return['msg']   = 'Đã Edit: '.$name.' UID: '.$uid.'';
					die(json_encode($return));
				}
			}
			if($t == 'creat-vip'){
				$name = THCMS_Controller_Function::POST($_POST['name']);
				$id = THCMS_Controller_Function::POST($_POST['id']);
				$info = THCMS_Controller_Function::POST($_POST['info']);
				$price = THCMS_Controller_Function::POST($_POST['price']);
				if(!$user_id){
						$return['error'] = 1;
						$return['msg']   = 'Vui lòng đăng nhập';
						die(json_encode($return));
				}
				if($datauser['Panel'] == 0){
						$return['error'] = 1;
						$return['msg']   = 'Bạn không phải Admin';
						die(json_encode($return));
				}
				if($name == NULL || $id == NULL || $price == NULL){
					$return['error'] = 1;
					$return['msg']   = 'Bạn đã bỏ trống 1 số quan trọng. Không thể lưu';
					die(json_encode($return));
				}
				if (THCMS_Controller_Function::CheckDonenateVIP($id)) {
						$return['error'] = 1;
						$return['msg']   = 'DonateRank đã tồn tại.<br>Vui lòng chỉnh sửa. không được thêm';
						die(json_encode($return));
				}else{
					THCMS_Controller_Function::CreatPanelShopVIP($name,$id,$info,$price);
					$return['msg']   = 'Đã Thêm: '.$name.' DonateRank: '.$id.'';
					die(json_encode($return));
				}

			}
			if ($t == 'Load-Charts-Level') {
				$mem = THCMS_Controller_Function::LoadCharts('top-level');
				$data = array();
				$long = count($mem);
				$stt = '1';
					
					for ($i=0; $i < $long; $i++) {
						if($mem[$i]['Online'] == 0){
						$online ='<div class="badge badge-danger badge-pill">Offline</div>';
						}else{
						$online ='<div class="badge badge-success badge-pill">Online</div>';
						}
						$data[] = array(
						$stt++,
						'<a href="'.$system['url'].'/Auth/Profile/'.$mem[$i]['Username'].'">'.$mem[$i]['Username'].'</a>',
						number_format($mem[$i]['Level']),
						$online
						);
					}
					$return = array('data' => $data);
					die(json_encode($return));
				
				
			}
			if ($t == 'Load-Charts-Money') {
				THCMS_Controller_Function::UpdateTotalMoney();
				$mem = THCMS_Controller_Function::LoadCharts('top-money');
				$data = array();
				$long = count($mem);
				$stt = '1';
					
					for ($i=0; $i < $long; $i++) {
						if($mem[$i]['Online'] == 0){
						$online ='<div class="badge badge-danger badge-pill">Offline</div>';
						}else{
						$online ='<div class="badge badge-success badge-pill">Online</div>';
						}
						$data[] = array(
						$stt++,
						'<a href="'.$system['url'].'/Auth/Profile/'.$mem[$i]['Username'].'">'.$mem[$i]['Username'].'</a>',
						number_format($mem[$i]['TotalChartsMoney']),
						$online
						);
					}
					$return = array('data' => $data);
					die(json_encode($return));
				
				
			}
			if ($t == 'Load-Charts-Credits') {
				$mem = THCMS_Controller_Function::LoadCharts('top-credits');
				$data = array();
				$long = count($mem);
				$stt = '1';
					
					for ($i=0; $i < $long; $i++) {
						if($mem[$i]['Online'] == 0){
						$online ='<div class="badge badge-danger badge-pill">Offline</div>';
						}else{
						$online ='<div class="badge badge-success badge-pill">Online</div>';
						}
						$data[] = array(
						$stt++,
						'<a href="'.$system['url'].'/Auth/Profile/'.$mem[$i]['Username'].'">'.$mem[$i]['Username'].'</a>',
						number_format($mem[$i]['Credits']),
						$online
						);
					}
					$return = array('data' => $data);
					die(json_encode($return));
			}
			if ($t == 'Load-Charts-Online') {
				$mem = THCMS_Controller_Function::LoadCharts('top-online');
				$data = array();
				$long = count($mem);
				$stt = '1';
					
					for ($i=0; $i < $long; $i++) {
						if($mem[$i]['Online'] == 0){
						$online ='<div class="badge badge-danger badge-pill">Offline</div>';
						}else{
						$online ='<div class="badge badge-success badge-pill">Online</div>';
						}
						$data[] = array(
						$stt++,
						'<a href="'.$system['url'].'/Auth/Profile/'.$mem[$i]['Username'].'">'.$mem[$i]['Username'].'</a>',
						number_format($mem[$i]['ConnectedTime']),
						$online
						);
					}
					$return = array('data' => $data);
					die(json_encode($return));
				
			}
			if ($t == 'Load-Charts-Fame') {
				$mem = THCMS_Controller_Function::LoadCharts('top-fame');
				$data = array();
				$long = count($mem);
				$stt = '1';
					
					for ($i=0; $i < $long; $i++) {
						if($mem[$i]['Online'] == 0){
						$online ='<div class="badge badge-danger badge-pill">Offline</div>';
						}else{
						$online ='<div class="badge badge-success badge-pill">Online</div>';
						}
						$data[] = array(
						$stt++,
						'<a href="'.$system['url'].'/Auth/Profile/'.$mem[$i]['Username'].'">'.$mem[$i]['Username'].'</a>',
						number_format($mem[$i]['DanhVong']),
						$online
						);
					}
					$return = array('data' => $data);
					die(json_encode($return));
			}
			if ($t == 'Load-History-Nap-The') {
				$mem = THCMS_Controller_Function::LoadHistory('NapThe',$datauser['id']);
				$data = array();
				if($mem == 0){
				$long = 0;
				}else{
				$long = count($mem);
				}
				 $stt = '1';
					
					 for ($i=0; $i < $long; $i++) {
						if($mem[$i]['StatusCard'] == 0){
						$status ='<div class="badge badge-primary"><i class="fas fa-spinner fa-pulse"></i> Đang xử lý</div>';
						}elseif($mem[$i]['StatusCard'] == 1){
						$status ='<div class="badge badge-success"><i class="fas fa-check-square"></i> Thành Công</div>';
						}elseif($mem[$i]['StatusCard'] == 2){
						$status ='<div class="badge badge-danger"><i class="fas fa-circle-xmark"></i> Thất Bại</div>';
						}
						$data[] = array(
						$stt++,
						'<div class="badge badge-lime">'.$mem[$i]['NameCard'].'</div>',
						'<div class="badge badge-success">'.number_format($mem[$i]['PriceCard']).'đ</div>',
						'<div class="badge badge-success">'.$mem[$i]['SeriCard'].'</div>',
						'<div class="badge badge-success">'.$mem[$i]['PinCard'].'</div>',
						''.THCMS_Controller_Function::Dipslay_Date($mem[$i]['TimeCard']).' - '.THCMS_Controller_Function::Date_Number($mem[$i]['TimeCard']).'',
						$status
						);
					}
					$return = array('data' => $data);
					die(json_encode($return));
				
			}
			if ($t == 'Load-History-Nap-MoMo') {
				THCMS_Controller_Function::Get_Auto_Momo();
				$mem = THCMS_Controller_Function::LoadHistory('NapMoMo',$datauser['id']);
				$data = array();
				if($mem == 0){
				$long = 0;
				}else{
				$long = count($mem);
				}
				 ;
					for ($i=0; $i < $long; $i++) {
						$coin = ($mem[$i]['Amount'] / 10);
						$data[] = array(
						 	$mem[$i]['TransID'],
						 	$mem[$i]['PhoneNumber'],
						 	$mem[$i]['UserBank'],
						 	number_format($mem[$i]['Amount']),
							 $mem[$i]['Content'],
							 number_format($coin),
						 	date("H:i:s - d/m/Y", ceil($mem[$i]['Time'] / 1000))
						);
					}
				 $return = array('data' => $data);
				die(json_encode($return));
			}
			if ($t == 'Load-Panel') {
				$mem = THCMS_Controller_Function::LoadPanel('top-fame');
				$data = array();
				$long = count($mem);
				$stt = '1';
					
					for ($i=0; $i < $long; $i++) {
						if($mem[$i]['Online'] == 0){
						$online ='<div class="badge badge-danger badge-pill">Offline</div>';
						}else{
						$online ='<div class="badge badge-success badge-pill">Online</div>';
						}
						$data[] = array(
						$stt++,
						'<a href="'.$system['url'].'/Auth/Profile/'.$mem[$i]['Username'].'">'.$mem[$i]['Username'].'</a>',
						number_format($mem[$i]['DanhVong']),
						$online
						);
					}
					$return = array('data' => $data);
					die(json_encode($return));
			}
			if ($t == 'Giftcode') {
				$user = THCMS_Controller_Function::POST($_POST['username']);
				$gift = THCMS_Controller_Function::POST($_POST['giftcode']);
				$password = THCMS_Controller_Function::POST($_POST['password']);
				$Hash_Whirlpool = THCMS_Controller_Function::Hash_Whirlpool($password);
					if(!$user_id){
						$return['error'] = 1;
						$return['msg']   = 'Vui lòng đăng nhập';
						die(json_encode($return));
					}
					if($user != $datauser['Username']){
						$return['error'] = 1;
						$return['msg']   = 'Tài khoản không đồng nhất';
						die(json_encode($return));
					}
					if($datauser['Online'] == 1){
						$return['error'] = 1;
						$return['msg']   = 'Tài khoản đang Online, không thể thao tác';
						die(json_encode($return));
					}
					if($datauser['Level'] < 2){
						$return['error'] = 1;
						$return['msg']   = 'Yêu cầu tài khoản cấp độ 2 trở lên và có 5 giờ chơi';
						die(json_encode($return));
					}
					if($datauser['ConnectedTime'] < 5){
						$return['error'] = 1;
						$return['msg']   = 'Yêu cầu tài khoản cấp độ 2 trở lên và có 5 giờ chơi';
						die(json_encode($return));
					}
					if ($datauser['Gift_UCP'] == 1) {
						$return['error'] = 1;
						$return['msg']   = 'Mỗi tài khoản chỉ nhận được một lần, Vui lòng đợi sự kiện tiếp theo';
						die(json_encode($return));
					}
					if (!THCMS_Controller_Function::CheckGiftcode($gift)) {
						$return['error'] = 1;
						$return['msg']   = 'Giftcode không tồn tại trên hệ thống';
						die(json_encode($return));
					}
					if ($Hash_Whirlpool != $datauser['Key']){
						$return['error'] = 1;
						$return['msg']   = 'Mật khẩu không chính xác';
						die(json_encode($return));
					}else{
						$rand_item = mt_rand(1,100);
						if($rand_item > 0 && $rand_item <= 60){
							$totalmoney = $datauser['Money']+200000;
							THCMS_Controller_Function::UpdateMoney($totalmoney,$datauser['id']);
							$item_msg = 'Money: '.number_format('200000').'SAD';
						}elseif($rand_item > 61 && $rand_item <= 70){
							$totalcredits = $datauser['Credits']+50;
							THCMS_Controller_Function::UpdateCredits($totalcredits,$datauser['id']);
							$item_msg = 'Credits: '.number_format('50').'';
						}elseif($rand_item > 71 && $rand_item <= 80){
							$totalcredits = $datauser['Credits']+100;
							THCMS_Controller_Function::UpdateCredits($totalcredits,$datauser['id']);
							$item_msg = 'Credits: '.number_format('100').'';
						}elseif($rand_item > 81 && $rand_item <= 90){
							$totalcredits = $datauser['Credits']+150;
							THCMS_Controller_Function::UpdateCredits($totalcredits,$datauser['id']);
							$item_msg = 'Credits: '.number_format('150').'';
						}elseif($rand_item > 91 && $rand_item <= 95){
							$totalcredits = $datauser['Credits']+200;
							THCMS_Controller_Function::UpdateCredits($totalcredits,$datauser['id']);
							$item_msg = 'Credits: '.number_format('200').'';
						}elseif($rand_item > 95 && $rand_item <= 100){
							THCMS_Controller_Function::UpdateSkinGun('SkinMP5','1',$datauser['id']);
							$item_msg = 'Skin súng MP5';
						}else{
							$totalmoney = $datauser['Money']+200000;
							THCMS_Controller_Function::UpdateMoney($totalmoney,$datauser['id']);
							$item_msg = 'Money: '.number_format('200000').'SAD';
						}
						$return['msg']   = 'Nhập Giftcode thành công. Bạn nhận được:<br>'.$item_msg.'<br>Xin chúc mừng';
						THCMS_Controller_Function::UpdateCountsGiftcode($gift);
						THCMS_Controller_Function::UpdateAccountsGiftcode($item_msg,$datauser['id']);
						die(json_encode($return));
					}
			}
			if($t == 'Load-Panel-Nap-MoMo'){
				if($datauser['Panel'] == 0){
						$return['error'] = 1;
						$return['msg']   = 'Bạn không phải Admin';
						die(json_encode($return));
				}
				$mem = THCMS_Controller_Function::LoadPanelList('load-nap-momo');
				$data = array();
				if($mem == 0){
				$long = 0;
				}else{
				$long = count($mem);
				}
				
				
				
					for ($i=0; $i < $long; $i++) {
						if($mem[$i]['Status'] == 1){
							$status ='<div class="badge badge-danger"><i class="fas fa-circle-xmark"></i> Có Lỗi</div>';
						}elseif($mem[$i]['Status'] == 2){
							$status ='<div class="badge badge-success"><i class="fas fa-check-square"></i> Hoàn Thành</div>';
						}
						$data[] = array(
						'<div class="badge badge-success">'.$mem[$i]['Username'].'</div> ',
						 '<div class="badge badge-success">'.$mem[$i]['TransID'] .'</div> ',
						 '<div class="badge badge-success"> '.$mem[$i]['PhoneNumber'] .'</div> ',
						 '<div class="badge badge-success"> '.$mem[$i]['UserBank'] .'</div> ',
						 '<div class="badge badge-success"> '.number_format($mem[$i]['Amount']) .'</div> ',
						 '<div class="badge badge-success"> '.$mem[$i]['Content'] .'</div> ',
						 '<div class="badge badge-success"> '.date("H:i:s - d/m/Y", ceil($mem[$i]['Time'] / 1000)) .'</div> ',
						$status
						);
					}
					$return = array('data' => $data);
					die(json_encode($return));
			}
			if($t == 'Load-Panel-Nap-MoMo-2'){
				if($datauser['Panel'] == 0){
						$return['error'] = 1;
						$return['msg']   = 'Bạn không phải Admin';
						die(json_encode($return));
				}
				$mem = THCMS_Controller_Function::LoadPanelList('load-nap-momo-2');
				$data = array();
				if($mem == 0){
				$long = 0;
				}else{
				$long = count($mem);
				}
				
				
					for ($i=0; $i < $long; $i++) {
						$data[] = array(
						'<div class="badge badge-success">'.$mem[$i]['Username'].'</div> ',
						 '<div class="badge badge-success">'.$mem[$i]['TransID'] .'</div> ',
						 '<div class="badge badge-success"> '.$mem[$i]['PhoneNumber'] .'</div> ',
						 '<div class="badge badge-success"> '.$mem[$i]['UserBank'] .'</div> ',
						 '<div class="badge badge-success"> '.number_format($mem[$i]['Amount']) .'</div> ',
						 '<div class="badge badge-success"> '.$mem[$i]['Content'] .'</div> ',
						 '<div class="badge badge-success"> '.date("H:i:s - d/m/Y", ceil($mem[$i]['Time'] / 1000)) .'</div> ',
						 '<div class="badge badge-success"><i class="fas fa-check-square"></i> Hoàn Thành</div>'
						);
					}
					$return = array('data' => $data);
					die(json_encode($return));
			}
			if($t == 'Load-Panel-Nap-MoMo-3'){
				if($datauser['Panel'] == 0){
						$return['error'] = 1;
						$return['msg']   = 'Bạn không phải Admin';
						die(json_encode($return));
				}
				$mem = THCMS_Controller_Function::LoadPanelList('load-nap-momo-3');
				$data = array();
				if($mem == 0){
				$long = 0;
				}else{
				$long = count($mem);
				}
				
				
					for ($i=0; $i < $long; $i++) {
						$data[] = array(
						'<div class="badge badge-danger">'.$mem[$i]['Username'].'</div> ',
						 '<div class="badge badge-success">'.$mem[$i]['TransID'] .'</div> ',
						 '<div class="badge badge-success"> '.$mem[$i]['PhoneNumber'] .'</div> ',
						 '<div class="badge badge-success"> '.$mem[$i]['UserBank'] .'</div> ',
						 '<div class="badge badge-success"> '.number_format($mem[$i]['Amount']) .'</div> ',
						 '<div class="badge badge-success"> '.$mem[$i]['Content'] .'</div> ',
						 '<div class="badge badge-success"> '.date("H:i:s - d/m/Y", ceil($mem[$i]['Time'] / 1000)) .'</div> ',
						 '<div class="badge badge-danger"><i class="far fa-circle-xmark"></i> Có Lỗi</div>'
						);
					}
					$return = array('data' => $data);
					die(json_encode($return));
			}
			if($t == 'Load-Panel-IPBans'){
				if($datauser['Panel'] == 0){
						$return['error'] = 1;
						$return['msg']   = 'Bạn không phải Admin';
						die(json_encode($return));
				}
				$mem = THCMS_Controller_Function::LoadPanelList('banip');
				$data = array();
				$long = count($mem);
					for ($i=0; $i < $long; $i++) {
						$data[] = array(
						$i++,
						$mem[$i]['ip'],
						$mem[$i]['date'],
						$mem[$i]['reason'],
						$mem[$i]['admin']
						);
					}
					$return = array('data' => $data);
					die(json_encode($return));
			}
	}else{
		require($rootPath . '/LoadToFile/PageNotfun/error.php');
				exit();
	}