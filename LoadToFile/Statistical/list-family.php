<?php

define('MT_CMS', 1);
$fileDir = dirname(__FILE__);
$rootPath = realpath($fileDir . '/../..');
chdir($rootPath);
require($rootPath . '/library/Autoloader.php');
$headmod = 'ds_family';
$textl = 'Danh Sách Family';
require($rootPath . '/library/head.php');

	echo "\n" . '<!-- begin panel -->'.
			"\n" . '<div class="panel panel-inverse">'.
				"\n" . '<!-- begin panel-heading -->'.
				"\n" . '<div class="panel-heading">'.
					"\n" . '<div class="panel-heading-btn">'.
								"\n" . '<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>'.
								"\n" . '<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>'.
							"\n" . '</div>'.
					"\n" . '<h4 class="panel-title">Danh Sách Family</h4>'.
				"\n" . '</div>'.
				"\n" . '<!-- end panel-heading -->'.
				"\n" . '<!-- begin panel-body -->'.
				"\n" . '<div class="panel-body">'.
					"\n" . '<table id="data-table-default" class="table table-striped table-bordered">'.
						"\n" . '<thead>'.
							"\n" . '<tr>'.
								"\n" . '<th width="10%">#</th>'.
								"\n" . '<th class="text-nowrap">Tên Family</th>'.
							"\n" . '</tr>'.
						"\n" . '</thead>'.
						"\n" . '<tbody>';													
						$query = mysqli_query($connect,"SELECT * FROM `families` WHERE `Taken` = '1' ORDER BY ID ASC");
						while ( $data = mysqli_fetch_array($query) ) {
								
							echo "\n" . '<tr class="odd gradeX">'.
								"\n" . '<td width="10%" class="f-s-600">'.$data['ID'].'</td>'.
								"\n" . '<td><a href="' . $system['url'] . '/Auth/Statistical/Family/'.$data['ID'].'">'.$data['Name'].'</a></td>'.
								"\n" . '</tr>';
								
							}
							
						echo"\n" . '</tbody>'.
					"\n" . '</table>'.
				"\n" . '</div>'.
				"\n" . '<!-- end panel-body -->'.
			"\n" . '</div>'.
			"\n" . '<!-- end panel -->';
		
			require($rootPath . '/library/end.php');
			?>