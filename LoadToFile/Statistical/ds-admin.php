<?php

define('MT_CMS', 1);
$fileDir = dirname(__FILE__);
$rootPath = realpath($fileDir . '/../..');
chdir($rootPath);
require($rootPath . '/library/Autoloader.php');
$headmod = 'ds_admin';
$textl = 'Danh Sách Administrator';
require($rootPath . '/library/head.php');

	echo "\n" . '<!-- begin panel -->'.
			"\n" . '<div class="panel panel-inverse">'.
				"\n" . '<!-- begin panel-heading -->'.
				"\n" . '<div class="panel-heading">'.
					"\n" . '<div class="panel-heading-btn">'.
								"\n" . '<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>'.
								"\n" . '<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>'.
							"\n" . '</div>'.
					"\n" . '<h4 class="panel-title">Danh Sách Administrator</h4>'.
				"\n" . '</div>'.
				"\n" . '<!-- end panel-heading -->'.
				"\n" . '<!-- begin panel-body -->'.
				"\n" . '<div class="panel-body">'.
					"\n" . '<table id="data-table-default" class="table table-striped table-bordered">'.
						"\n" . '<thead>'.
							"\n" . '<tr>'.
								"\n" . '<th width="1%">#</th>'.
								"\n" . '<th width="1%" data-orderable="false">Avatar</th>'.
								"\n" . '<th class="text-nowrap">Tên nhân vật</th>'.
								"\n" . '<th class="text-nowrap">Level</th>'.
								"\n" . '<th class="text-nowrap">Level Admin</th>'.
								"\n" . '<th class="text-nowrap">Thời gian chơi</th>'.
								"\n" . '<th class="text-nowrap">Trạng thái</th>'.
							"\n" . '</tr>'.
						"\n" . '</thead>'.
						"\n" . '<tbody>';													
						$query = mysqli_query($connect,"SELECT * FROM accounts WHERE `AdminLevel` >= 2 ORDER BY  `AdminLevel` DESC");
						$stt = 0;
						while ( $data = mysqli_fetch_array($query) ) {	
						
						$stt++;
						if($data['Model'] > 0 && $data['Model'] < 300){
						$avatar = '<img src="' . $system['url'] . '/assets/img/avatar/'.$data['Model'].'.png" alt="Avatar" class="img-rounded height-30"/> ';
						}else{
							$avatar = '<img src="' . $system['url'] . '/assets/img/avatar/no-img.png" alt="Avatar" class="img-rounded height-30"/> ';
						}
						if($data['AdminLevel'] == '2'){
							$admin = 'Junior Admin';
						}elseif($data['AdminLevel'] == '3'){
							$admin = 'General Admin';	
						}elseif($data['AdminLevel'] == '4'){
							$admin = 'Senior Admin';	
						}elseif($data['AdminLevel'] == '1337'){
							$admin = 'Head Admin';	
						}elseif($data['AdminLevel'] == '1338'){
							$admin = 'Lead Head Admin';	
						}elseif($data['AdminLevel'] == '99999'){
							$admin = 'Excutive  Admin';	
						}else{
							$admin = 'Hack  Admin';	
						}

						if($data['Online'] == '0'){
							$online = '<span class="label label-danger">Offline</span>';
						}else{
							$online = '<span class="label label-success">Online</span>';
						}
							echo "\n" . '<tr class="odd gradeX">'.
								"\n" . '<td width="1%" class="f-s-600">'.$stt.'</td>'.
								"\n" . '<td width="1%" class="with-img">'.$avatar.'</td>'.
								"\n" . '<td><a href="'.$system['url'].'/Auth/Profile/'.$data['Username'].'">'.$data['Username'].'</a></td>'.
								"\n" . '<td>'.$data['Level'].'</td>'.
								"\n" . '<td>'.$admin.'</td>'.
								"\n" . '<td>'.number_format($data['ConnectedTime']).'</td>'.
								"\n" . '<td>'.$online.'</td>';
								
								
							}
							echo"\n" . '</tr>'.
						"\n" . '</tbody>'.
					"\n" . '</table>'.
				"\n" . '</div>'.
				"\n" . '<!-- end panel-body -->'.
			"\n" . '</div>'.
			"\n" . '<!-- end panel -->';
		
			require($rootPath . '/library/end.php');
			?>