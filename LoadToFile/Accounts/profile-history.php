<?php

define('MT_CMS', 1);
$fileDir = dirname(__FILE__);
$rootPath = realpath($fileDir . '/../..');
chdir($rootPath);
require($rootPath . '/library/Autoloader.php');
if($user_id){
	if($user != $datauser['Username'] ){
				require($rootPath . '/LoadToFile/PageNotfun/error.php');
				exit();
		}else{
			$user = THCMS_Controller_Function::GetNameAccounts($user);
		}
	
}else{
	require($rootPath . '/LoadToFile/PageNotfun/error.php');
	exit();
}

$headmod = 'profile';
$textl = 'Lịch Sử Hoạt Động '.$user['Username'].'';
require($rootPath . '/library/head.php');
 	if($user['Model'] > 0 && $user['Model'] < 300){
		$avatar = '<img src="' . $system['url'] . '/assets/img/avatar/'.$user['Model'].'.png" alt="Avatar" /> ';
	}else{
		$avatar = '<img src="' . $system['url'] . '/assets/img/avatar/skin-'.$user['Model'].'.png" alt="Avatar" /> ';
	}
	if($user['DonateRank'] == '1'){
		$vip = '<a href="#" class="btn btn-sm btn-primary"><i class="fa fa-shield-alt"></i> VIP Đồng</a>';
	}elseif($user['DonateRank'] == '2'){
		$vip = '<a href="#" class="btn btn-sm btn-primary"><i class="fa fa-shield-alt"></i> VIP Bạc</a>';
	}elseif($user['DonateRank'] == '3'){
		$vip = '<a href="#" class="btn btn-sm btn-primary"><i class="fa fa-shield-alt"></i> VIP Vàng</a>';
	}elseif($user['DonateRank'] == '4'){
		$vip = '<a href="#" class="btn btn-sm btn-primary"><i class="fa fa-shield-alt"></i> VIP Premium</a>';
	}else{
		$vip = '';
	}
	if($user['Sex'] == '1'){
		$sex = '<i class="fa fa-male"></i>';
	}else{
		$sex = '<i class="fa fa-female"></i>';
	}
	if($user['AdminLevel'] == '2'){
		$admin = '<a href="#" class="btn btn-sm btn-yellow"><i class="fab fa-adversal"></i> Junior Admin</a>';
	}elseif($user['AdminLevel'] == '3'){
		$admin = '<a href="#" class="btn btn-sm btn-yellow"><i class="fab fa-adversal"></i> General Admin</a>';	
	}elseif($user['AdminLevel'] == '4'){
		$admin = '<a href="#" class="btn btn-sm btn-yellow"><i class="fab fa-adversal"></i> Senior Admin</a>';	
	}elseif($user['AdminLevel'] == '1337'){
		$admin = '<a href="#" class="btn btn-sm btn-yellow"><i class="fab fa-adversal"></i> Head Admin</a>';	
	}elseif($user['AdminLevel'] == '1338'){
		$admin = '<a href="#" class="btn btn-sm btn-yellow"><i class="fab fa-adversal"></i> Lead Head Admin</a>';	
	}elseif($user['AdminLevel'] == '99999'){
		$admin = '<a href="#" class="btn btn-sm btn-yellow"><i class="fab fa-adversal"></i> Excutive  Admin</a>';	
	}else{
		$admin = '';	
	}
	if($user['Online'] == '0'){
		$online = '<span class="label label-danger">Offline</span>';
	}else{
		$online = '<span class="label label-success">Online</span>';
	}
	if($user_id){
		if($user['Username'] == $datauser['Username']){
			/*
		 * Phần này hiển thị dành cho thành viên xem profile của chính mình
		 */
			$RegDays = substr($user['RegiDate'],'8','2');
			$RegMonth  = substr($user['RegiDate'],'5','2');
			$RegYears  = substr($user['RegiDate'],'0','4');
			$Reghour  = substr($user['RegiDate'],'11','2');
			$Regmin  = substr($user['RegiDate'],'14','2');
			$Regseconds  = substr($user['RegiDate'],'17','2');
			

			$BirthDays = substr($user['BirthDate'],'8','2');
			$BirthMonth = substr($user['BirthDate'],'5','2');
			$BirthYears = substr($user['BirthDate'],'0','4');
			

			$LastDays = substr($user['LastLogin'],'8','2');
			$LastMonth = substr($user['LastLogin'],'5','2');
			$LastYears = substr($user['LastLogin'],'0','4');
			$Lasthour = substr($user['LastLogin'],'11','2');
			$Lastmin = substr($user['LastLogin'],'14','2');
			$Lastseconds = substr($user['LastLogin'],'17','2');

			$Posx = $user['SPos_x'];
			$Posy = $user['SPos_y'];
			$Posz = $user['SPos_z'];

			$email = $user['Email'];
			$ipgame = $user['IP'];
			$ipwebs = $user['IP'];
			$Money = $user['Money'];
			$Bank = $user['Bank'];
			$Total = ($Money+$Bank);
			$Credits = number_format($user['Credits']).' Credits';
			$Level = $user['Level'];
			$ConnectTime = number_format($user['ConnectedTime']).' Giờ';

			if($user['Active_Mail'] == 0){
				$atv_mail = '<i class="fa fa-times-circle text-danger" ></i>';
			}elseif($user['Active_Mail'] == 1){
				$atv_mail = '<i class="fa fa-check-circle text-success" ></i>';
			}else{
				$atv_mail = '<i class="fa fa-times-circle text-danger" ></i>';
			}
			$caidat = '<li class="nav-item"><a href="'.$system['url'].'/Auth/Profile/'.$user['Username'].'/Setting" class="nav-link">Cài Đặt</a></li>';
			$hoatdong = '<li class="nav-item active"><a href="#" class="nav-link">Hoạt Động</a></li>';
		}else{
		/*
		 * Phần này hiển thị dành cho thành viên xem profile người khác
		 */
			$RegDays = substr($user['RegiDate'],'8','2');
			$RegMonth  = substr($user['RegiDate'],'5','2');
			$RegYears  = substr($user['RegiDate'],'0','4');
			$Reghour  = substr($user['RegiDate'],'11','2');
			$Regmin  = substr($user['RegiDate'],'14','2');
			$Regseconds  = substr($user['RegiDate'],'17','2');
			
			$LastDays = substr($user['LastLogin'],'8','2');
			$LastMonth = substr($user['LastLogin'],'5','2');
			$LastYears = substr($user['LastLogin'],'0','4');
			$Lasthour = substr($user['LastLogin'],'11','2');
			$Lastmin = substr($user['LastLogin'],'14','2');
			$Lastseconds = substr($user['LastLogin'],'17','2');

			$BirthDays = substr($user['BirthDate'],'8','2');
			$BirthMonth = substr($user['BirthDate'],'5','2');
			$BirthYears = substr($user['BirthDate'],'0','4');
			
			
			$Posx = $user['SPos_x'];
			$Posy = $user['SPos_y'];
			$Posz = $user['SPos_z'];

			$ConnectTime = number_format($user['ConnectedTime']).' Giờ';
			$Level = $user['Level'];
			$ipgame = substr($user['IP'],'0','7').'.***.***';
			$ipwebs = substr($user['IP'],'0','7').'.***.***';
			$Money = $user['Money'];
			$Bank = $user['Bank'];
			$Total = ($Money+$Bank);
			$Credits = '****';
			$email = substr($user['Email'],'0','4').'**@***';
			$atv_mail = '';
			$caidat = '';
			$hoatdong = '';

		}

	}else{
		/*
		 * Phần này là hiển thị dành cho người cho đăng nhập
		 */
			$RegDays = substr($user['RegiDate'],'8','2');
			$RegMonth  = substr($user['RegiDate'],'5','2');
			$RegYears  = substr($user['RegiDate'],'0','4');
			$Reghour  = substr($user['RegiDate'],'11','2');
			$Regmin  = substr($user['RegiDate'],'14','2');
			$Regseconds  = substr($user['RegiDate'],'17','2');
			
			$LastDays = substr($user['LastLogin'],'8','2');
			$LastMonth = substr($user['LastLogin'],'5','2');
			$LastYears = substr($user['LastLogin'],'0','4');
			$Lasthour = substr($user['LastLogin'],'11','2');
			$Lastmin = substr($user['LastLogin'],'14','2');
			$Lastseconds = substr($user['LastLogin'],'17','2');
			
			$BirthDays = substr($user['BirthDate'],'8','2');
			$BirthMonth = substr($user['BirthDate'],'5','2');
			$BirthYears = substr($user['BirthDate'],'0','4');

			$Posx = $user['SPos_x'];
			$Posy = $user['SPos_y'];
			$Posz = $user['SPos_z'];

			$ConnectTime = number_format($user['ConnectedTime']).' Giờ';

			$Level = $user['Level'];

			$Money = $user['Money'];

			$Bank = $user['Bank'];

			$Total = ($Money+$Bank);

			$Credits = '****';

			$ipgame = substr($user['IP'],'0','7').'.***.***';

			$ipwebs = substr($user['IP'],'0','7').'.***.***';

			$email = substr($user['Email'],'0','4').'**@***';

			$atv_mail = '';

			$caidat = '';

			$hoatdong = '';
			
	}
echo  "\n" . '<!-- begin profile -->'.
			 "\n" . '<div class="profile">'.
				 "\n" . '<div class="profile-header">'.
					 "\n" . '<!-- BEGIN profile-header-cover -->'.
					 "\n" . '<div class="profile-header-cover"></div>'.
					 "\n" . '<!-- END profile-header-cover -->'.
					 "\n" . '<!-- BEGIN profile-header-content -->'.
					 "\n" . '<div class="profile-header-content">'.
						 "\n" . '<!-- BEGIN profile-header-img -->'.
						 "\n" . '<div class="profile-header-img">'.
							 "\n" . ''.$avatar.''.
						 "\n" . '</div>'.
						 "\n" . '<!-- END profile-header-img -->'.
						 "\n" . '<!-- BEGIN profile-header-info -->'.
						 "\n" . '<div class="profile-header-info">'.
							 "\n" . '<h4 class="m-t-10 m-b-5">'.$sex.' '.$user['Username'].' '.$online.'</h4>'.
							 "\n" . '<p class="m-b-10">'.$system['logo_text'].'</p>'.
							 "\n" . ''.$vip.' '.$admin.''.
						 "\n" . '</div>'.
						 "\n" . '<!-- END profile-header-info -->'.
					 "\n" . '</div>'.
					 "\n" . '<!-- END profile-header-content -->'.
					 "\n" . '<!-- BEGIN profile-header-tab -->'.
					 "\n" . '<ul class="profile-header-tab nav nav-tabs">'.
						 "\n" . '<li class="nav-item"><a href="'.$system['url'].'/Auth/Profile/'.$user['Username'].'" class="nav-link">Thông Tin</a></li>'.
						 "\n" . '<li class="nav-item"><a href="'.$system['url'].'/Auth/Profile/'.$user['Username'].'/Cars" class="nav-link" >Kho Xe</a></li>'.
						 "\n" . '<li class="nav-item"><a href="'.$system['url'].'/Auth/Profile/'.$user['Username'].'/Toys" class="nav-link">Kho Toys</a></li>'.
						 "\n" . ''.$caidat.''.
						 "\n" . ''.$hoatdong.''.
					 "\n" . '</ul>'.
					 "\n" . '<!-- END profile-header-tab -->'.
				 "\n" . '</div>'.
			 "\n" . '</div>'.
			 "\n" . '<!-- end profile -->';

			echo  "\n" . '<!-- begin profile-content -->'.
           "\n" . ' <div class="profile-content card height-full">';


					echo  "\n" . '<!-- begin timeline -->'.
						"\n" . '<ul class="timeline">';
							$query = mysqli_query($connect,"SELECT * FROM mt_cms_log WHERE `IDUser` = '".$user['id']."' ORDER BY  `Time` DESC");
							while ( $data = mysqli_fetch_array($query) ) {
								if($data['Status'] == 1){
								$status = '<i class="far fa-times-circle fa-3x text-red-darker"></i>';
								}else{
								$status = '<i class="far fa-check-circle fa-3x text-green-darker"></i>';
								}
								if($data['Read'] == 0){
									THCMS_Controller_Function::UpdateReadLogMember($data['id']);
								}

							echo"\n" . '<li>'.
								"\n" . '<!-- begin timeline-time -->'.
								"\n" . '<div class="timeline-time">'.
									"\n" . '<span class="date">'.THCMS_Controller_Function::Date_Text($data['Time']).'</span>'.
									"\n" . '<span class="time">'.THCMS_Controller_Function::Date_Number($data['Time']).'</span>'.
								"\n" . '</div>'.
								"\n" . '<!-- end timeline-time -->'.
								"\n" . '<!-- begin timeline-icon -->'.
								"\n" . '<div class="timeline-icon">'.
									"\n" . '<a href="javascript:;">&nbsp;</a>'.
								"\n" . '</div>'.
								"\n" . '<!-- end timeline-icon -->'.
								"\n" . '<!-- begin timeline-body -->'.
								"\n" . '<div class="timeline-body">'.
									"\n" . '<div class="timeline-header">'.
										"\n" . '<span class="userimage">'.$status.'</span>'.
										"\n" . '<span class="username">'.$data['Content'].'</span>'.
										"\n" . '<span class="pull-right text-muted">'.$data['Time_Text'].'</span>'.
									"\n" . '</div>'.
								"\n" . '</div>'.
								"\n" . '<!-- end timeline-body -->'.
							"\n" . '</li>';
						}

						echo"\n" . '</ul>'.
						"\n" . '<!-- end timeline -->';

          
           echo"\n" . ' </div>'.
           "\n" . '<!--end begin profile-content -->';

			 require($rootPath . '/library/end.php');
			?>