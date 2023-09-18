<?php

define('MT_CMS', 1);
$fileDir = dirname(__FILE__);
$rootPath = realpath($fileDir . '/../..');
chdir($rootPath);
require($rootPath . '/library/Autoloader.php');
$headmod = 'ds_vipham';
$textl = 'Danh Sách Thành Viên Vi Phạm';
require($rootPath . '/library/head.php');

	echo "\n" . '<!-- begin panel -->'.
			"\n" . '<div class="panel panel-inverse">'.
				"\n" . '<!-- begin panel-heading -->'.
				"\n" . '<div class="panel-heading">'.
					"\n" . '<div class="panel-heading-btn">'.
								"\n" . '<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>'.
								"\n" . '<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>'.
							"\n" . '</div>'.
					"\n" . '<h4 class="panel-title">Danh Sách Thành Viên Banned Có Thời Hạn</h4>'.
				"\n" . '</div>'.
				"\n" . '<!-- end panel-heading -->'.
				"\n" . '<!-- begin panel-body -->'.
				"\n" . '<div class="panel-body">'.
					"\n" . '<table id="data-table-default" class="table table-striped table-bordered">'.
						"\n" . '<thead>'.
							"\n" . '<tr>'.
								"\n" . '<th width="1%">ID</th>'.
								"\n" . '<th width="1%" data-orderable="false">Avatar</th>'.
								"\n" . '<th class="text-nowrap">Tên nhân vật</th>'.
								"\n" . '<th class="text-nowrap">Lý do</th>'.
								"\n" . '<th class="text-nowrap">Ngày Banned</th>'.
								"\n" . '<th class="text-nowrap">Ngày Unband</th>'.
								"\n" . '<th class="text-nowrap">Khóa bởi</th>'.
								
							"\n" . '</tr>'.
						"\n" . '</thead>'.
						"\n" . '<tbody>';													
						$query = mysqli_query($connect,"SELECT * FROM accounts WHERE `KhoaTK` >= 1  ORDER BY  `id` DESC");
						
						while ($data = mysqli_fetch_array($query) ) {	
						

						if($data['Model'] > 0 && $data['Model'] < 300){
						$avatar = '<img src="' . $system['url'] . '/assets/img/avatar/'.$data['Model'].'.png" alt="Avatar" class="img-rounded height-30"/> ';
						}else{
							$avatar = '<img src="' . $system['url'] . '/assets/img/avatar/no-img.png" alt="Avatar" class="img-rounded height-30"/> ';
						}
							if(mysqli_num_rows($query) > 0){
								if($data['BannedBy'] != 'NULL'){
								echo "\n" . '<tr class="odd gradeX">'.
									"\n" . '<td width="1%" class="f-s-600">'.$data['id'].'</td>'.
									"\n" . '<td width="1%" class="with-img">'.$avatar.'</td>'.
									"\n" . '<td><a href="'.$system['url'].'/Auth/Profile/'.$data['Username'].'">'.$data['Username'].'</a></td>'.
									"\n" . '<td>'.$data['ReasonBanned'].'</td>'.
									"\n" . '<td>'.THCMS_Controller_Function::Dipslay_Date($data['TimeBanned']).' - '.THCMS_Controller_Function::Date_Number($data['TimeBanned']).'</td>'.
									"\n" . '<td>'.THCMS_Controller_Function::Dipslay_Date($data['BanTime']).' - '.THCMS_Controller_Function::Date_Number($data['TimeBanned']).'</td>'.
									"\n" . '<td>'.$data['BannedBy'].'</td>'.
									"\n" . '</tr>';
								}
								}else{
								echo "\n" . '<tr class="odd">'.
									"\n" . '<td valign="top" colspan="7" class="dataTables_empty">Không tìm thấy dòng nào phù hợp</td>'.
									"\n" . '</tr>';
								}
							}
							
						echo"\n" . '</tbody>'.
					"\n" . '</table>'.
				"\n" . '</div>'.
				"\n" . '<!-- end panel-body -->'.
			"\n" . '</div>'.
			"\n" . '<!-- end panel -->';
		/*echo "\n" . '<!-- begin panel -->'.
			"\n" . '<div class="panel panel-inverse">'.
				"\n" . '<!-- begin panel-heading -->'.
				"\n" . '<div class="panel-heading">'.
					"\n" . '<div class="panel-heading-btn">'.
								"\n" . '<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>'.
								"\n" . '<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>'.
							"\n" . '</div>'.
					"\n" . '<h4 class="panel-title">Danh Sách Thành Viên Banned Vĩnh Viễn</h4>'.
				"\n" . '</div>'.
				"\n" . '<!-- end panel-heading -->'.
				"\n" . '<!-- begin panel-body -->'.
				"\n" . '<div class="panel-body">'.
					"\n" . '<table id="data-table-default" class="table table-striped table-bordered">'.
						"\n" . '<thead>'.
							"\n" . '<tr>'.
								"\n" . '<th width="1%">ID</th>'.
								"\n" . '<th width="1%" data-orderable="false">Avatar</th>'.
								"\n" . '<th class="text-nowrap">Tên nhân vật</th>'.
								"\n" . '<th class="text-nowrap">Lý do</th>'.
								"\n" . '<th class="text-nowrap">Ngày Banned</th>'.
								"\n" . '<th class="text-nowrap">Ngày Unband</th>'.
								"\n" . '<th class="text-nowrap">Khóa bởi</th>'.
								
							"\n" . '</tr>'.
						"\n" . '</thead>'.
						"\n" . '<tbody>';													
						$query = mysqli_query($connect,"SELECT * FROM accounts WHERE `Ban` >= 1  ORDER BY  `id` DESC");
						
						while ($data = mysqli_fetch_array($query) ) {	
						

						if($data['Model'] > 0 && $data['Model'] < 300){
						$avatar = '<img src="' . $system['url'] . '/assets/img/avatar/'.$data['Model'].'.png" alt="Avatar" class="img-rounded height-30"/> ';
						}else{
							$avatar = '<img src="' . $system['url'] . '/assets/img/avatar/no-img.png" alt="Avatar" class="img-rounded height-30"/> ';
						}
							if(mysqli_num_rows($query) > 0){
								if($data['BannedBy'] != 'NULL'){
								echo "\n" . '<tr class="odd gradeX">'.
									"\n" . '<td width="1%" class="f-s-600">'.$data['id'].'</td>'.
									"\n" . '<td width="1%" class="with-img">'.$avatar.'</td>'.
									"\n" . '<td><a href="'.$system['url'].'/Auth/Profile/'.$data['Username'].'">'.$data['Username'].'</a></td>'.
									"\n" . '<td>'.$data['ReasonBanned'].'</td>'.
									"\n" . '<td>'.THCMS_Controller_Function::Dipslay_Date($data['TimeBanned']).' - '.THCMS_Controller_Function::Date_Number($data['TimeBanned']).'</td>'.
									"\n" . '<td>'.THCMS_Controller_Function::Dipslay_Date($data['BanTime']).' - '.THCMS_Controller_Function::Date_Number($data['TimeBanned']).'</td>'.
									"\n" . '<td>'.$data['BannedBy'].'</td>'.
									"\n" . '</tr>';
								}
								}else{
								echo "\n" . '<tr class="odd">'.
									"\n" . '<td valign="top" colspan="7" class="dataTables_empty">Không tìm thấy dòng nào phù hợp</td>'.
									"\n" . '</tr>';
								}
							}
							
						echo"\n" . '</tbody>'.
					"\n" . '</table>'.
				"\n" . '</div>'.
				"\n" . '<!-- end panel-body -->'.
			"\n" . '</div>'.
			"\n" . '<!-- end panel -->';*/
			require($rootPath . '/library/end.php');
			?>