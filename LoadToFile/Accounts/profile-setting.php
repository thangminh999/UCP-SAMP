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
$headmod = 'profile_change';
$textl = 'Cài Đặt Tài Khoản: '.$user['Username'].'';
require($rootPath . '/library/head.php');
 	if($user['Model'] > 0 && $user['Model'] < 300){
		$avatar = '<img src="' . $system['url'] . '/assets/img/avatar/'.$user['Model'].'.png" alt="Avatar" /> ';
	}else{
		$avatar = '<img src="' . $system['url'] . '/assets/img/avatar/no-img.png" alt="Avatar" /> ';
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
			$caidat = '<li class="nav-item"><a href="#" class="nav-link active">Cài Đặt</a></li>';
			$hoatdong = '<li class="nav-item"><a href="'.$system['url'].'/Auth/Profile/'.$user['Username'].'/History" class="nav-link">Hoạt Động</a></li>';
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
           "\n" . ' <div class="profile-content card height-full">'.


			"\n" . '<ul class="nav nav-tabs nav-justified">'.
                "\n" . '<li class="nav-item"><a href="#"  class="nav-link active">Đổi Tên</a></li>'.
                "\n" . '<li class="nav-item"><a href="'.$system['url'].'/Auth/Profile/'.$user['Username'].'/Setting/ChangePassword"  class="nav-link">Đổi Mật Khẩu</a></li>'.
                "\n" . '<li class="nav-item"><a href="'.$system['url'].'/Auth/Profile/'.$user['Username'].'/Setting/ChangePincode" class="nav-link">Đổi Mã Pin</a></li>'.
                "\n" . '<li class="nav-item"><a href="'.$system['url'].'/Auth/Profile/'.$user['Username'].'/Setting/ChangeEmail" class="nav-link">Đổi Email</a></li>'.
                "\n" . '<li class="nav-item"><a href="'.$system['url'].'/Auth/Profile/'.$user['Username'].'/Setting/Crash" class="nav-link">Fix Kẹt</a></li>';
               
            echo "\n" . '</ul>';
            echo '<div class="note note-lime note-lime m-b-15">
								<h4><b>Lưu Ý:</b></h4>
								<p>
								Phí đổi tên: <b>450</b> Credits<br>
								Thời Gian Chờ: <b>No Time</b><br>
								Số Lần: <b>10 lần/Ngày</b><br>
								<strong> Tên mới sẽ hiển thị trong game, UCP, Forum</strong>
								</p>
							</div>';
            	echo "\n" . '<form class="form-horizontal form-bordered" id="form-changename">'.
								"\n" . '<div class="form-group row">'.
									"\n" . '<label class="col-md-2 col-form-label text-center">Tên cũ</label>'.
									"\n" . '<div class="col-md-4">'.
									    "\n" . '<input class="form-control" type="text" value="'.$user['Username'].'" id="nameold" readonly />'.
									"\n" . '</div>'.
								"\n" . '</div>'.
								"\n" . '<div class="form-group row">'.
									"\n" . '<label class="col-md-2 col-form-label text-center">Tên mới</label>'.
									"\n" . '<div class="col-md-4">'.
									    "\n" . '<input class="form-control" type="text" id="namenews" placeholder="Tên Mới" />'.
									"\n" . '</div>'.
								"\n" . '</div>'.
								"\n" . '<div class="form-group row">'.
									"\n" . '<label class="col-md-2 col-form-label text-center">Mật khẩu</label>'.
									"\n" . '<div class="col-md-4">'.
									    "\n" . '<input data-toggle="password" data-placement="after" class="form-control" id="password" type="password" placeholder="Xác nhận mật khẩu" />'.
									"\n" . '</div>'.
								"\n" . '</div>'.
								  "\n" . '<div class="row">'.
								  "\n" . '<div class="col-md-2">'.
								  "\n" . '</div>'.
                    "\n" . '<div class="col-md-6" id="button_chagename">'.
                     "\n" . ' <button class="btn btn-primary" type="button" onclick="changename()"><i class="fal fa-check-circle fa-1x"></i> Xác Nhận</button>'.
                    "\n" . '</div>'.
                 "\n" . ' </div>'.
							"\n" . '</form>'.
            "\n" . ' </div>'.
           "\n" . '<!--end begin profile-content -->';
           ?>
			<script type="text/javascript">
				/*function start(){
					var nameold = $("#nameold").val();
           			var namenews= $("#namenews").val();
           			var password= $("#password").val();
           			if (!nameold || !namenews || !password) {
		                showNotification('bg-red text-white', 'Vui Lòng Điền Đầy Đủ Thông Tin');
		                return;
          		 	 }else{
          		 	 $("#button_chagename").html('<button class="btn btn-primary" type="button" onclick="changename()"><i class="fal fa-spinner fa-pulse"></i> Conect To Database</button>');
          		 	  setTimeout(function(){
          		 	  	start1();
          		 	  },3000);	
          		 	}

				}
				function start1(){
					var nameold = $("#nameold").val();
           			var namenews= $("#namenews").val();
           			var password= $("#password").val();
           			$("#button_chagename").html('<button class="btn btn-primary" type="button" onclick="changename()"><i class="fal fa-spinner fa-pulse"></i> Checking Name Old</button>');
           			$.ajax({
                		url     : '/Auth/Ajax/Load.html',
               			type    : 'POST',
                		dataType: 'JSON',
               		data    : {
                   		t       : 'check-name-old',
                    	nameold      : nameold
               		},
               		
              		success: (data) => {
                    $("#btn").html('<i class="fa fa-sign-in" aria-hidden="true"></i> Đăng Nhập');
                    if (data.error) {
                    	 setTimeout(function(){
                        	$("#button_chagename").html('<button class="btn btn-primary" type="button" onclick="changename()"><i class="fal fa-times-circle"></i> Name Old Error</button>');
                        	showNotification('bg-red text-white', data.msg);
                        	 },3000);	
                   		 }else{
                       		 
                       		 setTimeout(function(){

                            start2();
                       		 },3000);
                 		   }
               		}
            		})
				}
				function start2(){
					var nameold = $("#nameold").val();
           			var namenews= $("#namenews").val();
           			var password= $("#password").val();
           			$("#button_chagename").html('<button class="btn btn-primary" type="button" onclick="changename()"><i class="fal fa-spinner fa-pulse"></i> Checking Name News</button>');
           			$.ajax({
                		url     : '/Auth/Ajax/Load.html',
               			type    : 'POST',
                		dataType: 'JSON',
               		data    : {
                   		t       : 'check-name-news',
                    	namenews      : namenews
               		},
              		success: (data) => {
                    if (data.error) {
                    	setTimeout(function(){
                    		$("#button_chagename").html('<button class="btn btn-primary" type="button" onclick="changename()"><i class="fal fa-times-circle"></i>Name News Error</button>');
                        	showNotification('bg-red text-white', data.msg);
                        	 },3000);
                   		 }else{
                       		 
                       		 setTimeout(function(){
                            start3();
                       		 },3000);
                 		   }
               		}
            		})
				}
				function start3(){
					var nameold = $("#nameold").val();
           			var namenews= $("#namenews").val();
           			var password= $("#password").val();
           			$("#button_chagename").html('<button class="btn btn-primary" type="button" onclick="changename()"><i class="fal fa-spinner fa-pulse"></i> Checking Password</button>');
           			$.ajax({
                		url     : '/Auth/Ajax/Load.html',
               			type    : 'POST',
                		dataType: 'JSON',
               		data    : {
                   		t       : 'check-password',
                    	password      : password
               		},
              		success: (data) => {
                    if (data.error) {
                    	setTimeout(function(){
                    		$("#button_chagename").html('<button class="btn btn-primary" type="button" onclick="changename()"><i class="fal fa-times-circle"></i> Password Error</button>');
                        	showNotification('bg-red text-white', data.msg);
                        	 },3000);
                   		 }else{
                       		 showNotification('bg-green text-white', data.msg);
                       		 setTimeout(function(){
                            
                       		 },3000);
                 		   }
               		}
            		})
				}*/
				 function changename(){
				 	var nameold = $("#nameold").val();
           			var namenews= $("#namenews").val();
           			var password= $("#password").val();
           			if (!nameold || !namenews || !password) {
		                showNotification('bg-red text-white', 'Vui Lòng Điền Đầy Đủ Thông Tin');
		                return;
          		 	}
          		 	$("#button_chagename").html('<button class="btn btn-warning" type="button" disabled><i class="fal fa-spinner fa-pulse"></i> Vui Lòng Chờ</button>');
          	 		$.ajax({
               			url     : '/Auth/Ajax/Load.html',
               			type    : 'POST',
               			dataType: 'JSON',
               			data    : {
                   			t       : 'change-name',
                   			nameold  : nameold,
                   			namenews : namenews,
                   			password :password
               			},
                	success: (data) => {
                    	if (data.error) {
                    		setTimeout(function(){
                    		$("#button_chagename").html('<button class="btn btn-danger" type="button" onclick="changename()"><i class="fal fa-times-circle"></i> Làm lại</button>');
                        	showNotification('bg-red text-white', data.msg);
                        	},3000);
                    	} else {
                        	setTimeout(function(){
                        		$("#button_chagename").html('<button class="btn btn-success" type="button"><i class="fal fa-check-circle"></i> Thành Công</button>');
                        	showNotification('bg-green text-white', data.msg);   
                        	},3000);
							setTimeout(function(){
							window.location = '<?php echo  $system['url'];?>';	
							},5000);	
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
			 require($rootPath . '/library/end.php');
			?>