<?php

defined('MT_CMS') or die('Lỗi: Truy Cập Hệ Thống');
$headmod = isset($headmod) ? mysqli_real_escape_string($connect,$headmod) : '';
$textl = isset($textl) ? $textl : $system['title'];
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
    "\n" . '<link rel="shortcut icon" href="' . $system['url'] . '/favicon.ico" type="image/x-icon">'.
    "\n" . '<!-- ================== BEGIN BASE CSS STYLE ================== -->'.
	"\n" . '<link href="' . $system['url'] . '/css.php?style=default" rel="stylesheet" />'.
	"\n" . '<!-- ================== END BASE CSS STYLE ================== -->'.
	"\n" . '<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->';
			
	echo"\n" . '<!-- ================== END PAGE LEVEL STYLE ================== -->'.
	"\n" . '<!-- ================== BEGIN BASE JS ================== -->'.
	"\n" . '<script src="' . $system['url'] . '/assets/plugins/pace/pace.min.js"></script>'.
	"\n" . '<!-- ================== END BASE JS ================== -->'.
    "\n" . '<title>' . $textl . '</title>'.
     "\n" . '</head><body>' ;




echo '<!-- begin page-cover -->'.
	"\n" . '<div class="page-cover"></div>'.
	"\n" . '<!-- end page-cover -->'.
	"\n" . '<!-- begin #page-loader -->'.
	"\n" . '<div id="page-loader" class="fade show"><span class="spinner"></span></div>'.
	"\n" . '<!-- end #page-loader -->';
echo '<!-- begin #page-container -->'.
	"\n" . '<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">';


echo '<!-- begin #header -->'.
		"\n" . '<div id="header" class="header navbar-default">'.
			"\n" . '<!-- begin navbar-header -->'.
			"\n" . '<div class="navbar-header">'.
				"\n" . '<a href="' . $system['url'] . '" class="navbar-brand"><img alt="' . $system['title'] . '" title="" height="auto" src="' . $system['logo_img'] . '" width="' . $system['logo_img_width'] . '"> ' . $system['logo_text'] . '</a>'.
				"\n" . '<button type="button" class="navbar-toggle" data-click="sidebar-toggled">'.
					"\n" . '<span class="icon-bar"></span>'.
					"\n" . '<span class="icon-bar"></span>'.
					"\n" . '<span class="icon-bar"></span>'.
				"\n" . '</button>'.
			"\n" . '</div>'.
			"\n" . '<!-- end navbar-header -->'.
			
			"\n" . '<!-- begin header-nav -->'.
			"\n" . '<ul class="navbar-nav navbar-right">'.
				"\n" . '<li>'.
					"\n" . '<form class="navbar-form">'.
						"\n" . '<div class="form-group">'.
							"\n" . '<input type="text" class="form-control" placeholder="Tìm Kiếm Thành Viên" />'.
							"\n" . '<button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>'.
						"\n" . '</div>'.
					"\n" . '</form>'.
				"\n" . '</li>';
				if($user_id){
					
				 echo "\n" . '<li class="dropdown navbar-user">'.
					"\n" . '<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">';
						if($datauser['Model'] > 0 && $datauser['Model'] < 300){
						echo '<img src="' . $system['url'] . '/assets/img/avatar/'.$datauser['Model'].'.png" alt="Avatar" /> ';
						}else{
							echo '<img src="' . $system['url'] . '/assets/img/avatar/skin-'.$datauser['Model'].'.png" alt="Avatar" /> ';
						}
						echo '<span class="d-none d-md-inline">'.$datauser['Username'].'</span> <b class="caret"></b>'.
					"\n" . '</a>'.
					"\n" . '<div class="dropdown-menu dropdown-menu-right">'.
						"\n" . '<a href="' . $system['url'] . '/Auth/Profile/'.$datauser['Username'].'" class="dropdown-item">Profile</a>'.
						"\n" . '<a href="' . $system['url'] . '/Auth/Profile/'.$datauser['Username'].'/Cars" class="dropdown-item">Kho Cars</a>'.
						"\n" . '<a href="' . $system['url'] . '/Auth/Profile/'.$datauser['Username'].'/Toys" class="dropdown-item">Kho Toys</a>'.
						"\n" . '<a href="' . $system['url'] . '/Auth/Profile/'.$datauser['Username'].'/Setting" class="dropdown-item">Setting</a>'.
						"\n" . '<div class="dropdown-divider"></div>'.
						"\n" . '<a href="' . $system['url'] . '/Logout" class="dropdown-item">Đăng Xuất</a>'.
					"\n" . '</div>'.
				"\n" . '</li>';
			}else{
				echo "\n" . '<li class="dropdown navbar-user">'.
					"\n" . '<a href="' . $system['url'] . '/Login">'.
						"\n" . '<i class="fas fa-lg fa-fw m-r-10 fa-lock"></i>'.
						"\n" . '<span class="d-none d-md-inline btn btn-primary m-r-5 m-b-5">Đăng Nhập</span>'.
					"\n" . '</a>'.
				"\n" . '</li>';
			}
			echo"\n" . '</ul>'.
			"\n" . '<!-- end header navigation right -->'.
		"\n" . '</div>'.
		"\n" . '<!-- end #header -->';

echo '<!-- begin #sidebar -->'.
		"\n" . '<div id="sidebar" class="sidebar">'.
			"\n" . '<!-- begin sidebar scrollbar -->'.
			"\n" . '<div data-scrollbar="true" data-height="100%">'.
				"\n" . '<!-- begin sidebar nav -->'.
				"\n" . '<ul class="nav">';
					if($headmod == 'mainpage'){
					echo"\n" . '<li class="has-sub active">';
					}else{
						echo"\n" . '<li class="has-sub">';
					}
						echo"\n" . '<a href="' . $system['url'] . '">'.
						    "\n" . '<i class="far fa-home"></i>'.
						    "\n" . '<span>Trang Chủ</span>'.
					    "\n" . '</a>'.
					"\n" . '</li>'.
					"\n" . '<li class="has-sub">'.
						"\n" . '<a href="' . $system['url_forum'] . '">'.
						    "\n" . '<i class="fal fa-comment-alt"></i>'.
						    "\n" . '<span>Diễn Đàn</span>'.
					    "\n" . '</a>'.
					"\n" . '</li>'.
					"\n" . '<li class="has-sub">'.
						"\n" . '<a href="' . $system['url_discord'] . '">'.
						    "\n" . '<i class="fal fa-comment-alt"></i>'.
						    "\n" . '<span>Discord</span>'.
					    "\n" . '</a>'.
					"\n" . '</li>';
					if($user_id){
						
						if($headmod == 'napthe' || $headmod == 'napmomo' || $headmod == 'napbank'){
					echo"\n" . '<li class="has-sub active">';
					}else{
					echo"\n" . '<li class="has-sub">';
					}
							echo"\n" . '<a href="javascript:;">'.
					        "\n" . '<b class="caret"></b>'.
						    "\n" . '<i class="fal fa-credit-card"></i>'.
						    "\n" . '<span>Nạp Tiền</span>'.
						"\n" . '</a>'.
						"\n" . '<ul class="sub-menu">';
						if($headmod == 'napthe'){
							echo "\n" . '<li class="active"><a href="' . $system['url'] . '/Auth/NapTien/TheCao">Nạp Thẻ Cào</a></li>';
						}else{
							echo "\n" . '<li><a href="' . $system['url'] . '/Auth/NapTien/TheCao">Nạp Thẻ Cào</a></li>';
						}
						/*if($headmod == 'napmomo'){
						echo"\n" . '<li class="active"><a href="' . $system['url'] . '/Auth/NapTien/MoMo">Nạp MoMo</a></li>';
						}else{
						echo"\n" . '<li><a href="' . $system['url'] . '/Auth/NapTien/MoMo">Nạp MoMo</a></li>';
						}*/
						/*if($headmod == 'napbank'){
							echo"\n" . '<li class="active"><a href="' . $system['url'] . '/Auth/NapTien/Banking">Nạp Banking</a></li>';
						}else{
							echo"\n" . '<li><a href="' . $system['url'] . '/Auth/NapTien/Banking">Nạp Banking</a></li>';
						}*/
						
						echo"\n" . '</ul>'.
					"\n" . '</li>';
					
						
						if($datauser['Panel'] == 1){
							if($headmod == 'panel-system' || 
								$headmod == 'panel-cars' || 
								$headmod == 'panel-toys' || 
								$headmod == 'panel-vip' || 
								$headmod == 'panel-history' || 
								$headmod == 'panel-reload' || 
								$headmod == 'panel-change-name' || 
								$headmod == 'panel-member'|| 
								$headmod == 'panel-list-momo'||
								$headmod == 'panel-list-banking'){
								echo"\n" . '<li class="has-sub active">';
							}else{
								echo"\n" . '<li class="has-sub">';
							}
						echo"\n" . '<a href="javascript:;">'.
					        "\n" . '<b class="caret"></b>'.
						    "\n" . '<i class="fal fa-cogs"></i>'.
						    "\n" . '<span>Admin Panel</span>'.
						"\n" . '</a>'.
						"\n" . '<ul class="sub-menu">';

							if($headmod == 'panel-cars' || $headmod == 'panel-toys' || $headmod == 'panel-vip' ){
								echo"\n" . '<li class="has-sub active">';
								
							}else{
								echo"\n" . '<li class="has-sub">';

							}
								echo "\n" . '<a href="javascript:;"><b class="caret"></b>Panel Shop</a>'.
								"\n" . '<ul class="sub-menu">';
									if($headmod == 'panel-vip'){
									echo"\n" . '<li class="active"><a href="' . $system['url'] . '/Auth/Panel/Shop/VIP">Panel VIP</a></li>';
									}else{
									echo"\n" . '<li><a href="' . $system['url'] . '/Auth/Panel/Shop/VIP">Panel VIP</a></li>';
									}
									if($headmod == 'panel-cars'){
									echo"\n" . '<li class="active"><a href="' . $system['url'] . '/Auth/Panel/Shop/Cars">Panel Cars</a></li>';
									}else{
									echo"\n" . '<li><a href="' . $system['url'] . '/Auth/Panel/Shop/Cars">Panel Cars</a></li>';
									}
									if($headmod == 'panel-toys'){
									echo"\n" . '<li class="active"><a href="' . $system['url'] . '/Auth/Panel/Shop/Toys">Panel Toys</a></li>';
									}else{
									echo"\n" . '<li><a href="' . $system['url'] . '/Auth/Panel/Shop/Toys">Panel Toys</a></li>';
									}
									
								
								echo"\n" . '</ul>'.
							"\n" . '</li>';
							if($headmod == 'panel-reload' || $headmod == 'panel-change-name' || $headmod == 'panel-member'|| $headmod == 'panel-history'|| $headmod == 'panel-list-momo' || $headmod == 'panel-list-ipbans'){
								echo"\n" . '<li class="has-sub active">';
								
							}else{
								echo"\n" . '<li class="has-sub">';

							}
								echo "\n" . '<a href="javascript:;"><b class="caret"></b>Panel List</a>'.
								"\n" . '<ul class="sub-menu">';
									if($headmod == 'panel-reload'){
										echo"\n" . '<li class="active"><a href="' . $system['url'] . '/Auth/Panel/List/Reload">List Nạp Thẻ</a></li>';
									}else{
										echo"\n" . '<li><a href="' . $system['url'] . '/Auth/Panel/List/Reload">List Nạp Thẻ</a></li>';
									}
									if($headmod == 'panel-change-name'){
										echo"\n" . '<li class="active"><a href="' . $system['url'] . '/Auth/Panel/List/Change-Name">List Đổi Tên</a></li>';
									}else{
										echo"\n" . '<li><a href="' . $system['url'] . '/Auth/Panel/List/Change-Name">List Đổi Tên</a></li>';
									}
									if($headmod == 'panel-member'){
										echo"\n" . '<li class="active"><a href="' . $system['url'] . '/Auth/Panel/List/Member">List Member</a></li>';
									}else{
										echo"\n" . '<li><a href="' . $system['url'] . '/Auth/Panel/List/Member">List Member</a></li>';
									}
									if($headmod == 'panel-history'){
										echo"\n" . '<li class="active"><a href="' . $system['url'] . '/Auth/Panel/History">List History</a></li>';
									}else{
										echo"\n" . '<li><a href="' . $system['url'] . '/Auth/Panel/History">List History</a></li>';	
									}
									if($headmod == 'panel-list-momo'){
										echo"\n" . '<li class="active"><a href="' . $system['url'] . '/Auth/Panel/List/MoMo">List Nạp MoMo</a></li>';
									}else{
										echo"\n" . '<li><a href="' . $system['url'] . '/Auth/Panel/List/MoMo">List Nạp MoMo</a></li>';	
									}
									if($headmod == 'panel-list-banking'){
										echo"\n" . '<li class="active"><a href="' . $system['url'] . '/Auth/Panel/List/IPBans">List Nạp Bank</a></li>';
									}else{
										echo"\n" . '<li><a href="' . $system['url'] . '/Auth/Panel/List/IPBans">List IP Nạp Bank</a></li>';	
									}
								
								echo"\n" . '</ul>'.
							"\n" . '</li>';
							if($headmod == 'panel-system'){
							echo"\n" . '<li class="active"><a href="' . $system['url'] . '/Auth/Panel/System">Panel Cấu Hình</a></li>';
							}else{
							echo"\n" . '<li><a href="' . $system['url'] . '/Auth/Panel/System">Panel Cấu Hình</a></li>';	
							}
							echo"\n" . '</ul>'.
					"\n" . '</li>';
						}
						if($headmod == 'shop-vip' || $headmod == 'shop-cars' || $headmod == 'shop-toys'|| $headmod == 'shop-card'){
					echo"\n" . '<li class="has-sub active">';
					}else{
					echo"\n" . '<li class="has-sub">';
					}
							echo"\n" . '<a href="javascript:;">'.
					        "\n" . '<b class="caret"></b>'.
						    "\n" . '<i class="fal fa-store-alt"></i>'.
						    "\n" . '<span>Cửa Hàng</span>'.
						"\n" . '</a>'.
						"\n" . '<ul class="sub-menu">';
						if($headmod == 'shop-vip'){
							echo "\n" . '<li class="active"><a href="' . $system['url'] . '/Auth/Shop/VIP">Shop VIP</a></li>';
						}else{
							echo "\n" . '<li><a href="' . $system['url'] . '/Auth/Shop/VIP">Shop VIP</a></li>';
						}
						if($headmod == 'shop-xe'){
						echo"\n" . '<li class="active"><a href="' . $system['url'] . '/Auth/Shop/Cars">Shop Xe</a></li>';
						}else{
						echo"\n" . '<li><a href="' . $system['url'] . '/Auth/Shop/Cars">Shop Xe</a></li>';
						}
						/*if($headmod == 'shop-toys'){
							echo"\n" . '<li class="active"><a href="' . $system['url'] . '/Auth/Shop/Toys">Store Toys</a></li>';
						}else{
							echo"\n" . '<li><a href="' . $system['url'] . '/Auth/Shop/Toys">Shop Đồ Chơi</a></li>';
						}*/
						
						echo"\n" . '</ul>'.
					"\n" . '</li>';
					}
					if($headmod == 'bxh_credits' || $headmod == 'bxh_level' || $headmod == 'bxh_money' || $headmod == 'bxh_online'){
					echo"\n" . '<li class="has-sub active">';
					}else{
					echo"\n" . '<li class="has-sub">';
					}
						echo"\n" . '<a href="javascript:;">'.
					        "\n" . '<b class="caret"></b>'.
						    "\n" . '<i class="fal fa-trophy"></i>'.
						    "\n" . '<span>Bảng xếp hạng</span>'.
						"\n" . '</a>'.
						"\n" . '<ul class="sub-menu">';
						if($headmod == 'bxh_level'){
							echo"\n" . '<li class="active"><a href="' . $system['url'] . '/Auth/Charts/Level">BXH Level</a></li>';
						}else{
							echo"\n" . '<li><a href="' . $system['url'] . '/Auth/Charts/Level">BXH Level</a></li>';
						}	
						if($headmod == 'bxh_money'){
							echo"\n" . '<li class="active"><a href="' . $system['url'] . '/Auth/Charts/Money">BXH Money</a></li>';
						}else{
							echo"\n" . '<li><a href="' . $system['url'] . '/Auth/Charts/Money">BXH Money</a></li>';
						}	
						if($headmod == 'bxh_credits'){
							echo"\n" . '<li class="active"><a href="' . $system['url'] . '/Auth/Charts/Credits">BXH Credits</a></li>';
						}else{
							echo"\n" . '<li><a href="' . $system['url'] . '/Auth/Charts/Credits">BXH Credits</a></li>';
						}
						if($headmod == 'bxh_online'){
							echo"\n" . '<li class="active"><a href="' . $system['url'] . '/Auth/Charts/Online">BXH Online</a></li>';
						}else{
							echo"\n" . '<li><a href="' . $system['url'] . '/Auth/Charts/Online">BXH Online</a></li>';
						}
						
						echo"\n" . '</ul>'.
					"\n" . '</li>	';
					/*if($headmod == 'ds_faction' || $headmod == 'ds_family'){
						echo "\n" . '<li class="has-sub active">';
					}else{
						echo "\n" . '<li class="has-sub">';
					}
						echo"\n" . '<a href="javascript:;">'.
					        "\n" . '<b class="caret"></b>'.
						    "\n" . '<i class="fal fa-chart-bar"></i>'.
						    "\n" . '<span>Thống kê</span>'.
						"\n" . '</a>'.
						"\n" . '<ul class="sub-menu">';




						if($headmod == 'ds_faction'){
							echo"\n" . '<li class="active"><a href="' . $system['url'] . '/Auth/Statistical/Faction">Danh sách Faction</a></li>';
						}else{
							echo"\n" . '<li><a href="' . $system['url'] . '/Auth/Statistical/Faction">Danh sách Faction</a></li>';
						}	
						if($headmod == 'ds_family'){
							echo"\n" . '<li class="active"><a href="' . $system['url'] . '/Auth/Statistical/Family">Danh sách Family</a></li>';
						}else{
							echo"\n" . '<li><a href="' . $system['url'] . '/Auth/Statistical/Family">Danh sách Family</a></li>';
						}*/
						echo"\n" . '</ul>'.
					"\n" . '</li>'.
				
			        "\n" . '<!-- begin sidebar minify button -->'.
					"\n" . '<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>'.
			        "\n" . '<!-- end sidebar minify button -->'.
				"\n" . '</ul>'.
				"\n" . '<!-- end sidebar nav -->'.
			"\n" . '</div>'.
			"\n" . '<!-- end sidebar scrollbar -->'.
		"\n" . '</div>'.
		"\n" . '<div class="sidebar-bg"></div>'.
		"\n" . '<!-- end #sidebar -->'.
		"\n" . '<!-- begin #content -->';
		if($headmod == 'profile'){
			echo "\n" . '<div id="content" class="content content-full-width">';
		}else{
		echo"\n" . '<div id="content" class="content">';
		}
		
/**
 * ActiveMail
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
/**
 * Reset Pin Code
 */
		if (isset($_SESSION['rs_pincode_token_null'])){
		 	echo '<div class="note note-danger m-b-15">'.
								"\n" . '<div class="note-icon"><i class="fa fa-exclamation-triangle"></i></div>'.
								"\n" . '<div class="note-content">'.
									"\n" . '<h4><b>Lỗi Reset Pincode</b></h4>'.
									"\n" . '<p>'.$_SESSION['rs_pincode_token_null'].'</p>'.
								"\n" . '</div>'.
							"\n" . '</div>';
			unset($_SESSION['rs_pincode_token_null']);					
		 }
		 if (isset($_SESSION['rs_pincode_token_no_system'])){
		 	echo '<div class="note note-danger m-b-15">'.
								"\n" . '<div class="note-icon"><i class="fa fa-exclamation-triangle"></i></div>'.
								"\n" . '<div class="note-content">'.
									"\n" . '<h4><b>Lỗi Reset Pincode</b></h4>'.
									"\n" . '<p>'.$_SESSION['rs_pincode_token_no_system'].'</p>'.
								"\n" . '</div>'.
							"\n" . '</div>';
			unset($_SESSION['rs_pincode_token_no_system']);						
		 }
		 if (isset($_SESSION['rs_pincode_user_null'])){
		 	echo '<div class="note note-danger m-b-15">'.
								"\n" . '<div class="note-icon"><i class="fa fa-exclamation-triangle"></i></div>'.
								"\n" . '<div class="note-content">'.
									"\n" . '<h4><b>Lỗi Reset Pincode</b></h4>'.
									"\n" . '<p>'.$_SESSION['rs_pincode_user_null'].'</p>'.
								"\n" . '</div>'.
							"\n" . '</div>';
			unset($_SESSION['rs_pincode_user_null']);				
		 }
		 if (isset($_SESSION['rs_pincode_user_no_system'])){
		 	echo '<div class="note note-danger m-b-15">'.
								"\n" . '<div class="note-icon"><i class="fa fa-exclamation-triangle"></i></div>'.
								"\n" . '<div class="note-content">'.
									"\n" . '<h4><b>Lỗi Reset Pincode</b></h4>'.
									"\n" . '<p>'.$_SESSION['rs_pincode_user_no_system'].'</p>'.
								"\n" . '</div>'.
							"\n" . '</div>';
			unset($_SESSION['rs_pincode_user_no_system']);				
		 }
		 if (isset($_SESSION['rs_pincode_token_failed_user'])){
		 	echo '<div class="note note-danger m-b-15">'.
								"\n" . '<div class="note-icon"><i class="fa fa-exclamation-triangle"></i></div>'.
								"\n" . '<div class="note-content">'.
									"\n" . '<h4><b>Lỗi Reset Pincode</b></h4>'.
									"\n" . '<p>'.$_SESSION['rs_pincode_token_failed_user'].'</p>'.
								"\n" . '</div>'.
							"\n" . '</div>';
			unset($_SESSION['rs_pincode_token_failed_user']);				
		 }
		 if (isset($_SESSION['rs_pincode_token_null_system'])){
		 	echo '<div class="note note-danger m-b-15">'.
								"\n" . '<div class="note-icon"><i class="fa fa-exclamation-triangle"></i></div>'.
								"\n" . '<div class="note-content">'.
									"\n" . '<h4><b>Lỗi Reset Pincode</b></h4>'.
									"\n" . '<p>'.$_SESSION['rs_pincode_token_null_system'].'</p>'.
								"\n" . '</div>'.
							"\n" . '</div>';
			unset($_SESSION['rs_pincode_token_null_system']);				
		 }
		 if (isset($_SESSION['rs_pincode_user_failed_token'])){
		 	echo '<div class="note note-danger m-b-15">'.
								"\n" . '<div class="note-icon"><i class="fa fa-exclamation-triangle"></i></div>'.
								"\n" . '<div class="note-content">'.
									"\n" . '<h4><b>Lỗi Reset Pincode</b></h4>'.
									"\n" . '<p>'.$_SESSION['rs_pincode_user_failed_token'].'</p>'.
								"\n" . '</div>'.
							"\n" . '</div>';
			unset($_SESSION['rs_pincode_user_failed_token']);				
		 }
		 if (isset($_SESSION['rs_pincode_time_failed_time_sever'])){
		 	echo '<div class="note note-danger m-b-15">'.
								"\n" . '<div class="note-icon"><i class="fa fa-exclamation-triangle"></i></div>'.
								"\n" . '<div class="note-content">'.
									"\n" . '<h4><b>Lỗi Reset Pincode</b></h4>'.
									"\n" . '<p>'.$_SESSION['rs_pincode_time_failed_time_sever'].'</p>'.
								"\n" . '</div>'.
							"\n" . '</div>';
			unset($_SESSION['rs_pincode_time_failed_time_sever']);				
		 }
		 if (isset($_SESSION['rs_pincode_success'])){
		 	echo '<div class="note note-success m-b-15">'.
								"\n" . '<div class="note-icon"><i class="fa fa-check-circle"></i></div>'.
								"\n" . '<div class="note-content">'.
									"\n" . '<h4><b>Reset Password Thành Công</b></h4>'.
									"\n" . '<p>'.$_SESSION['rs_pincode_success'].'</p>'.
								"\n" . '</div>'.
							"\n" . '</div>';
			unset($_SESSION['rs_pincode_success']);				
		 }
/**
 * Active Email
 */
		if (isset($_SESSION['active_mail_token_null'])){
		 	echo '<div class="note note-danger m-b-15">'.
								"\n" . '<div class="note-icon"><i class="fa fa-exclamation-triangle"></i></div>'.
								"\n" . '<div class="note-content">'.
									"\n" . '<h4><b>Lỗi Active Email</b></h4>'.
									"\n" . '<p>'.$_SESSION['active_mail_token_null'].'</p>'.
								"\n" . '</div>'.
							"\n" . '</div>';
			unset($_SESSION['active_mail_token_null']);					
		 }
		 if (isset($_SESSION['active_mail_token_no_system'])){
		 	echo '<div class="note note-danger m-b-15">'.
								"\n" . '<div class="note-icon"><i class="fa fa-exclamation-triangle"></i></div>'.
								"\n" . '<div class="note-content">'.
									"\n" . '<h4><b>Lỗi Active Email</b></h4>'.
									"\n" . '<p>'.$_SESSION['active_mail_token_no_system'].'</p>'.
								"\n" . '</div>'.
							"\n" . '</div>';
			unset($_SESSION['active_mail_token_no_system']);					
		 }
		 if (isset($_SESSION['active_mail_user_null'])){
		 	echo '<div class="note note-danger m-b-15">'.
								"\n" . '<div class="note-icon"><i class="fa fa-exclamation-triangle"></i></div>'.
								"\n" . '<div class="note-content">'.
									"\n" . '<h4><b>Lỗi Active Email</b></h4>'.
									"\n" . '<p>'.$_SESSION['active_mail_user_null'].'</p>'.
								"\n" . '</div>'.
							"\n" . '</div>';
			unset($_SESSION['active_mail_user_null']);					
		 }
		  if (isset($_SESSION['active_mail_user_no_system'])){
		 	echo '<div class="note note-danger m-b-15">'.
								"\n" . '<div class="note-icon"><i class="fa fa-exclamation-triangle"></i></div>'.
								"\n" . '<div class="note-content">'.
									"\n" . '<h4><b>Lỗi Active Email</b></h4>'.
									"\n" . '<p>'.$_SESSION['active_mail_user_no_system'].'</p>'.
								"\n" . '</div>'.
							"\n" . '</div>';
			unset($_SESSION['active_mail_user_no_system']);					
		 }
		 if (isset($_SESSION['active_mail_token_failed_user'])){
		 	echo '<div class="note note-danger m-b-15">'.
								"\n" . '<div class="note-icon"><i class="fa fa-exclamation-triangle"></i></div>'.
								"\n" . '<div class="note-content">'.
									"\n" . '<h4><b>Lỗi Active Email</b></h4>'.
									"\n" . '<p>'.$_SESSION['active_mail_token_failed_user'].'</p>'.
								"\n" . '</div>'.
							"\n" . '</div>';
			unset($_SESSION['active_mail_token_failed_user']);					
		 }
		 if (isset($_SESSION['active_mail_token_null_system'])){
		 	echo '<div class="note note-danger m-b-15">'.
								"\n" . '<div class="note-icon"><i class="fa fa-exclamation-triangle"></i></div>'.
								"\n" . '<div class="note-content">'.
									"\n" . '<h4><b>Lỗi Active Email</b></h4>'.
									"\n" . '<p>'.$_SESSION['active_mail_token_null_system'].'</p>'.
								"\n" . '</div>'.
							"\n" . '</div>';
			unset($_SESSION['active_mail_token_null_system']);					
		 }
		 if (isset($_SESSION['active_mail_user_failed_token'])){
		 	echo '<div class="note note-danger m-b-15">'.
								"\n" . '<div class="note-icon"><i class="fa fa-exclamation-triangle"></i></div>'.
								"\n" . '<div class="note-content">'.
									"\n" . '<h4><b>Lỗi Active Email</b></h4>'.
									"\n" . '<p>'.$_SESSION['active_mail_user_failed_token'].'</p>'.
								"\n" . '</div>'.
							"\n" . '</div>';
			unset($_SESSION['active_mail_user_failed_token']);					
		 }
		 if (isset($_SESSION['active_mail_time_failed_time_sever'])){
		 	echo '<div class="note note-danger m-b-15">'.
								"\n" . '<div class="note-icon"><i class="fa fa-exclamation-triangle"></i></div>'.
								"\n" . '<div class="note-content">'.
									"\n" . '<h4><b>Lỗi Active Email</b></h4>'.
									"\n" . '<p>'.$_SESSION['active_mail_time_failed_time_sever'].'</p>'.
								"\n" . '</div>'.
							"\n" . '</div>';
			unset($_SESSION['active_mail_time_failed_time_sever']);					
		 }
		 if (isset($_SESSION['active_mail_on_sever'])){
		 	echo '<div class="note note-danger m-b-15">'.
								"\n" . '<div class="note-icon"><i class="fa fa-exclamation-triangle"></i></div>'.
								"\n" . '<div class="note-content">'.
									"\n" . '<h4><b>Lỗi Active Email</b></h4>'.
									"\n" . '<p>'.$_SESSION['active_mail_on_sever'].'</p>'.
								"\n" . '</div>'.
							"\n" . '</div>';
			unset($_SESSION['active_mail_on_sever']);					
		 }
		 if (isset($_SESSION['active_mail_failed_system'])){
		 	echo '<div class="note note-danger m-b-15">'.
								"\n" . '<div class="note-icon"><i class="fa fa-exclamation-triangle"></i></div>'.
								"\n" . '<div class="note-content">'.
									"\n" . '<h4><b>Lỗi Active Email</b></h4>'.
									"\n" . '<p>'.$_SESSION['active_mail_failed_system'].'</p>'.
								"\n" . '</div>'.
							"\n" . '</div>';
			unset($_SESSION['active_mail_failed_system']);					
		 }
		 if (isset($_SESSION['active_mail_success'])){
		 	echo '<div class="note note-success m-b-15">'.
								"\n" . '<div class="note-icon"><i class="fa fa-check-circle"></i></div>'.
								"\n" . '<div class="note-content">'.
									"\n" . '<h4><b>Kích Hoạt Tài Khoản Thành Công</b></h4>'.
									"\n" . '<p>'.$_SESSION['active_mail_success'].'</p>'.
								"\n" . '</div>'.
							"\n" . '</div>';
			unset($_SESSION['active_mail_success']);					
		 }





			if($user_id){		 
					if ($datauser['Email'] == NULL){	
					echo '<div class="note note-danger m-b-15">'.
													"\n" . '<div class="note-icon"><i class="fa fa-exclamation-triangle"></i></div>'.
													"\n" . '<div class="note-content">'.
														"\n" . '<h4><b>Lỗi Chưa Tạo Email</b></h4>'.
														"\n" . '<p>Phát hiện tài khoản chưa có email. Vui lòng cập nhật email cho tài khoản<br>'.
														"\n".'</p>'.
													"\n" . '</div>'.
												"\n" . '</div>';
					"\n" . '<!-- begin panel -->'.
                    "\n" . '<div class="panel panel-inverse" data-sortable-id="form-stuff-10">'.
                        
                        "\n" . '<!-- begin panel-body -->'.
                        "\n" . '<div class="panel-body">';
                        	if (isset($_POST['createemail'])) {
                        		$error = array();
                        		 $accounts = isset($_POST['accounts']) ? trim($_POST['accounts']) : '';
               					 $email = isset($_POST['email']) ? trim($_POST['email']) : '';
               					 if (empty($accounts)) {
		                         	sleep(1);   
		                            $error['accounts'][] = ' <div class="alert alert-danger fade show"><strong>Phát hiện Bug Code</strong></div>';

		                        }elseif ($datauser['Username'] != $accounts) {
		                       		sleep(1); 
		                        	$error['accounts'][] = '<div class="alert alert-danger fade show"><strong>Phát hiện Bug Code</strong></div>';
		                        }
		                        if (empty($email)) {
		                        	sleep(1); 
		                        	$error['email'][] = '<div class="alert alert-danger fade show"><strong>Email không được bỏ trống</strong></div>';
		                       }elseif (THCMS_Controller_Function::is_email($email)) {
		                                sleep(1); 
		                             $error['email'][] = '<div class="alert alert-danger fade show"><strong><strong>Email không đúng định dạng</strong></div>';
		                        }
		                         if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha']) != 0){ 
				                    sleep(1); 
				                    $error['captcha'][] = '<div class="alert alert-danger fade show"><strong><strong>Captcha không đúng</strong></div>'; 
				                }
		                        if (empty($error)) {
		                        	if (!THCMS_Controller_Function::KiemTraEmail($email)) {
					                    sleep(1); 
					                    $error['check_db'][]  = '<div class="alert alert-danger fade show">Email đã tồn tại trên 1 tài khoản khác.</div>';
					                    }else{
		                        		
		                        			if(THCMS_Controller_Function::CreateEmail($email,$datauser['id'])){
		                        				sleep(5); 
		                        				  $error['check_db'][] = '<div class="alert alert-success fade show"><strong>Tạo Email Thành Công</strong></div><meta http-equiv="refresh" content="5; url='.$system['url'].'">';

		                        			}else{
		                        				$error['check_db'][] = '<div class="alert alert-danger fade show"><strong>Có lỗi trong quá trình Create Email</strong></div>';
		                        			}
		                        		}
		                        		
		                        }

                        	}
                        		
								echo "\n" . '<form  action="" method="post" class="form-horizontal form-bordered">';
								if (isset($error)){
									echo "\n" . '<div class="form-group row">'.
									"\n" . '<label class="col-md-3 col-form-label">Notification:</label>'.
									"\n" . '<div class="col-md-9">'.
									(isset($error['check_db']) ? '' . implode('', $error['check_db']) . '' : '') .
									(isset($error['captcha']) ? '' . implode('', $error['captcha']) . '' : '') .
									 (isset($error['accounts']) ? '' . implode('', $error['accounts']) . '' : '') .
									 (isset($error['email']) ? '' . implode('', $error['email']) . '' : '') .
                                   "\n" . ' </div>'.
                                "\n" . '</div>';
                            }
								echo "\n" . '<div class="form-group row">'.
									"\n" . '<label class="col-md-3 col-form-label">Tài Khoản:</label>'.
									"\n" . '<div class="col-md-9">'.
                                        "\n" . '<input type="text" name="accounts" class="form-control form-control-lg" placeholder="Tên tài khoản" autocomplete="off" value="'.$datauser['Username'].'" readonly/>'.
									"\n" . '</div>'.
								"\n" . '</div>'.
								"\n" . '<div class="form-group row">'.
									"\n" . '<label class="col-md-3 col-form-label">Email:</label>'.
									"\n" . '<div class="col-md-9">'.
								         "\n" . '<input type="email" name="email" class="form-control form-control-lg" placeholder="Nhập Email mới" autocomplete="off"/>'.
                                   "\n" . ' </div>'.
                                "\n" . '</div>'.
                                "\n" . '<div class="form-group row">'.
									"\n" . '<label class="col-md-3 col-form-label">Captcha:</label>'.
									"\n" . '<div class="col-md-9">'.
									 "\n" . '<div class="row">'.
									 "\n" . '<div class="col-sm-5">'.
								          "\n" . '<input type="text" name="captcha" class="form-control form-control-lg inverse-mode" placeholder="Enter Captcha IMG" autocomplete="off" required />'.
								         "\n" . ' </div>'.
								          "\n" . '<div class="col-sm-5">'.
								            "\n" . '<img src="' . $system['url'] . '/captcha.php?rand='.rand().'" id="captchaimg">'.
								             "\n" . '<a href="javascript: refreshCaptcha();" class="btn btn-success btn-icon btn-circle btn-lg"><i class="fa fa-sync fa-spin"></i></a>'.
								           "\n" . ' </div>'.
								          "\n" . ' </div>'.
                                   "\n" . ' </div>'.
                                "\n" . '</div>'.
								"\n" . '<div class="form-group row">'.
									"\n" . '<label class="col-md-3 col-form-label">Button</label>'.
									"\n" . '<div class="col-md-9">'.
									"\n" . '<button type="submit" name="createemail" class="btn btn-lg btn-primary m-r-5">Create Email</button>'.
                                    "\n" . '</div>'.
                               "\n" . ' </div>'.
							"\n" . '</form>'.
							"\n" . '</div>'.
                        "\n" . '<!-- end panel-body -->'.
                    "\n" . '</div>'.
                    "\n" . '<!-- end panel -->';					
					  require(ROOTPATH . '/end.php');							
					 exit();						
					}elseif (THCMS_Controller_Function::is_email($datauser['Email'])){
						echo '<div class="note note-danger m-b-15">'.
													"\n" . '<div class="note-icon"><i class="fa fa-exclamation-triangle"></i></div>'.
													"\n" . '<div class="note-content">'.
														"\n" . '<h4><b>Lỗi Định Dạng Enail</b></h4>'.
														"\n" . '<p>Phát hiện tài khoản có email không đúng định dạng. Vui lòng cập nhật email mới cho tài khoản<br>'.
														"\n".'</p>'.
													"\n" . '</div>'.
												"\n" . '</div>';
					"\n" . '<!-- begin panel -->'.
                    "\n" . '<div class="panel panel-inverse" data-sortable-id="form-stuff-10">'.
                        
                        "\n" . '<!-- begin panel-body -->'.
                        "\n" . '<div class="panel-body">';
                        	if (isset($_POST['createemail'])) {
                        		$error = array();
                        		 $accounts = isset($_POST['accounts']) ? trim($_POST['accounts']) : '';
               					 $email = isset($_POST['email']) ? trim($_POST['email']) : '';
               					 if (empty($accounts)) {
		                         	sleep(1);   
		                            $error['accounts'][] = ' <div class="alert alert-danger fade show"><strong>Phát hiện Bug Code</strong></div>';

		                        }elseif ($datauser['Username'] != $accounts) {
		                       		sleep(1); 
		                        	$error['accounts'][] = '<div class="alert alert-danger fade show"><strong>Phát hiện Bug Code</strong></div>';
		                        }
		                        if (empty($email)) {
		                        	sleep(1); 
		                        	$error['email'][] = '<div class="alert alert-danger fade show"><strong>Email không được bỏ trống</strong></div>';
		                       }elseif (THCMS_Controller_Function::is_email($email)) {
		                                sleep(1); 
		                             $error['email'][] = '<div class="alert alert-danger fade show"><strong><strong>Email không đúng định dạng</strong></div>';
		                        }
		                         if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha']) != 0){ 
				                    sleep(1); 
				                    $error['captcha'][] = '<div class="alert alert-danger fade show"><strong><strong>Captcha không đúng</strong></div>'; 
				                }
		                        if (empty($error)) {
		                        	if (!THCMS_Controller_Function::KiemTraEmail($email)) {
					                    sleep(1); 
					                    $error['check_db'][]  = '<div class="alert alert-danger fade show">Email đã tồn tại trên 1 tài khoản khác.</div>';
					                    }else{
		                        		
		                        			if(THCMS_Controller_Function::CreateEmail($email,$datauser['id'])){
		                        				sleep(5); 
		                        				  $error['check_db'][] = '<div class="alert alert-success fade show"><strong>Tạo Email Thành Công</strong></div><meta http-equiv="refresh" content="5; url='.$system['url'].'">';

		                        			}else{
		                        				$error['check_db'][] = '<div class="alert alert-danger fade show"><strong>Có lỗi trong quá trình Create Email</strong></div>';
		                        			}
		                        		}
		                        		
		                        }

                        	}
                        		
								echo "\n" . '<form  action="" method="post" class="form-horizontal form-bordered">';
								if (isset($error)){
									echo "\n" . '<div class="form-group row">'.
									"\n" . '<label class="col-md-3 col-form-label">Notification:</label>'.
									"\n" . '<div class="col-md-9">'.
									(isset($error['check_db']) ? '' . implode('', $error['check_db']) . '' : '') .
									(isset($error['captcha']) ? '' . implode('', $error['captcha']) . '' : '') .
									 (isset($error['accounts']) ? '' . implode('', $error['accounts']) . '' : '') .
									 (isset($error['email']) ? '' . implode('', $error['email']) . '' : '') .
                                   "\n" . ' </div>'.
                                "\n" . '</div>';
                            }
								echo "\n" . '<div class="form-group row">'.
									"\n" . '<label class="col-md-3 col-form-label">Tài Khoản:</label>'.
									"\n" . '<div class="col-md-9">'.
                                        "\n" . '<input type="text" name="accounts" class="form-control form-control-lg" placeholder="Tên tài khoản" autocomplete="off" value="'.$datauser['Username'].'" readonly/>'.
									"\n" . '</div>'.
								"\n" . '</div>'.
								"\n" . '<div class="form-group row">'.
									"\n" . '<label class="col-md-3 col-form-label">Email:</label>'.
									"\n" . '<div class="col-md-9">'.
								         "\n" . '<input type="email" name="email" class="form-control form-control-lg" placeholder="Nhập Email mới" autocomplete="off"/>'.
                                   "\n" . ' </div>'.
                                "\n" . '</div>'.
                                "\n" . '<div class="form-group row">'.
									"\n" . '<label class="col-md-3 col-form-label">Captcha:</label>'.
									"\n" . '<div class="col-md-9">'.
									 "\n" . '<div class="row">'.
									 "\n" . '<div class="col-sm-5">'.
								          "\n" . '<input type="text" name="captcha" class="form-control form-control-lg inverse-mode" placeholder="Enter Captcha IMG" autocomplete="off" required />'.
								         "\n" . ' </div>'.
								          "\n" . '<div class="col-sm-5">'.
								            "\n" . '<img src="' . $system['url'] . '/captcha.php?rand='.rand().'" id="captchaimg">'.
								             "\n" . '<a href="javascript: refreshCaptcha();" class="btn btn-success btn-icon btn-circle btn-lg"><i class="fa fa-sync fa-spin"></i></a>'.
								           "\n" . ' </div>'.
								          "\n" . ' </div>'.
                                   "\n" . ' </div>'.
                                "\n" . '</div>'.
								"\n" . '<div class="form-group row">'.
									"\n" . '<label class="col-md-3 col-form-label">Button</label>'.
									"\n" . '<div class="col-md-9">'.
									"\n" . '<button type="submit" name="createemail" class="btn btn-lg btn-primary m-r-5">Create Email</button>'.
                                    "\n" . '</div>'.
                               "\n" . ' </div>'.
							"\n" . '</form>'.
							"\n" . '</div>'.
                        "\n" . '<!-- end panel-body -->'.
                    "\n" . '</div>'.
                    "\n" . '<!-- end panel -->';					
					  require(ROOTPATH . '/end.php');	
					  exit();	
					}elseif ($datauser['Active_Mail'] == 0){	
											if (isset($_POST['active-mail'])) {
                        						$error = array();
                        							if (THCMS_Controller_Function::is_email($datauser['Email'])){
                        								 $error['email'][] = '<div class="alert alert-danger fade show">Email không đúng định dạng không thể kích hoạt</div>';
                        							}elseif ($datauser['Email'] == NULL){
                        								$error['email'][] = '<div class="alert alert-danger fade show">Bạn chưa tạo email. không thể kích hoạt</div>';
                        							}elseif ($datauser['Active_Mail'] == 1){
                        								$error['email'][] = '<div class="alert alert-danger fade show">Tài khoản đã được kích hoạt trước đó. Vui lòng kiểm tra lại</div>';
                        							}else{
                        								$randtoken = THCMS_Controller_Function::Hash_MD5(time());
					                                    $getmail = THCMS_Controller_Function::GetMailler(6);
					                                    $tieude = $getmail['tieude'];
					                                    $title = $getmail['title'];
					                                    $noidung = $getmail['noidung'];
					                                    $array = array('[ACCOUNT]', '[TOKEN]','[URL]','[ACTIVEMAIL]','[LOGO_TEXT]','[COPYRIGHT]');
					                                    $array_replace = array($datauser['Username'], $randtoken, $system['url'], 'Auth/Mailer/ActiveMail', $system['logo_text'],$system['copyright']);
					                                    $doilenh = str_replace($array, $array_replace, $noidung);
					                                    $to = $datauser['Email'];
					                                    $name = $datauser['Username'];
					                                     if(THCMS_Controller_Function::SaveTokenActiveMail($randtoken,$datauser['id'])){
					                                        $error['check_db'][]  = THCMS_Controller_Mailer::SendMail($to, $name, $doilenh, $tieude, $title);
					                                    }else{
					                                        $error['check_db'][]  = '<div class="alert alert-danger fade show">Hệ thống đã gứi 1 tin nhắn vào email: <b>'.$to.' </b><br>Vui lòng kiểm tra  <b>Hộp thư đến & Spam </b><br>Tuy nhiên khi lưu Token và Time Active Email bị lỗi, vui lòng báo lỗi này tới admin để được giải quyết</div>';
					                                    }
                        							}
                        						}
                        						if (isset($error)){
                        						echo (isset($error['check_db']) ? '' . implode('', $error['check_db']) . '' : '');			
                        						}
												echo '<div class="note note-danger m-b-15">'.
													"\n" . '<div class="note-icon"><i class="fa fa-exclamation-triangle"></i></div>'.
													"\n" . '<div class="note-content">'.
														"\n" . '<h4><b>Lỗi Chưa Kich Hoạt Tài Khoản</b></h4>'.
														"\n" . '<p>Tài khoản chưa kích hoạt Email. Vui lòng kích hoạt Email để không bị hạn chế chức năng'.
														 "\n" . '<form  action="" method="POST">'.
														"\n" . '<button type="submit" name="active-mail"  class="btn btn-primary m-r-5 m-b-5">Active Email</button>'.
														"\n" . '</form>'.
														"\n".'</p>'.
													"\n" . '</div>'.
												"\n" . '</div>';
					}
				if($datauser['KhoaTK'] >= 1){
					echo '<div class="note note-danger m-b-15">'.
								"\n" . '<div class="note-icon"><i class="fa fa-exclamation-triangle"></i></div>'.
								"\n" . '<div class="note-content">'.
									"\n" . '<h4><b>Tài Khoản Bị Khóa</b></h4>'.
									"\n" . '<p>Tài khoản của bạn đã bị khóa, Bạn sẽ bị hạn chế 1 số chức năng trên Webstie<br> <b>Thông Tin Bị Khóa:</b><br>
									<ul>
									  <li>Accounts Banned: <b>'.$datauser['Username'].'</b></li>
									  <li>Lý Do Banned: <b>'.$datauser['ReasonBanned'].'</b></li>
									  <li>Người Banned: <b>'.$datauser['BannedBy'].'</b></li>
									  <li>Thời Gian Banned: <b>'.THCMS_Controller_Function::Dipslay_Date($datauser['TimeBanned']).' - '.THCMS_Controller_Function::Date_Number($datauser['TimeBanned']).'</b></li>
									  <li>Thời Gian UNBand: <b>'.THCMS_Controller_Function::Dipslay_Date($datauser['BanTime']).' - '.THCMS_Controller_Function::Date_Number($datauser['BanTime']).'</b></li>
									</ul>
									</p>'.
								"\n" . '</div>'.
							"\n" . '</div>';
				}
			}