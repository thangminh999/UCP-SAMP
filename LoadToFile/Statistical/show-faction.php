<?php

define('MT_CMS', 1);
$fileDir = dirname(__FILE__);
$rootPath = realpath($fileDir . '/../..');
$rootPath2 = realpath($fileDir . '/../../..');
chdir($rootPath);
require($rootPath . '/library/Autoloader.php');
$result = mysqli_query($connect,"SELECT * FROM groups WHERE id = '$id'");
$Member = ($id-1);
$result_accounts = mysqli_query($connect,"SELECT Member FROM accounts WHERE Member = '$Member'");		
if(!$id || mysqli_num_rows($result) < 1 || mysqli_num_rows($result_accounts) < 1){
	require($rootPath . '/LoadToFile/PageNotfun/error.php');
	exit();
}
$row  = mysqli_fetch_assoc($result);
$headmod = 'ds_faction';
$textl = 'Danh Sách Thành Viên Faction '.$row['Name'].'';
require($rootPath . '/library/head.php');



	echo "\n" . '<!-- begin row -->'.
			"\n" . '<div class="row">'.
			   "\n" . ' <!-- begin col-2 -->'.
			    "\n" . '<div class="col-lg-2">'.
			       "\n" . '<!-- begin card -->'.
					"\n" . '<div class="card card-inverse bg-gradient-green text-center">'.
						"\n" . '<div class="card-block">'.
							"\n" . '<blockquote class="card-blockquote">'.
									"\n" . '<h4 class="font-weight-bold">'.$row['Name'].'</h4> '.
								"\n" . '<p class="f-s-14 f-w-600">'.$row['MOTD'].'</p>'.
								"\n" . '<footer class="f-s-12">Notification <cite title="'.$row['Name'].'">'.$row['Name'].'</cite></footer>'.
							"\n" . '</blockquote>'.
						"\n" . '</div>'.
					"\n" . '</div>'.
					"\n" . '<!-- end card -->'.
			    "\n" . '</div>'.
			    "\n" . '<!-- end col-2 -->'.
			    "\n" . '<!-- begin col-10 -->'.
			    "\n" . '<div class="col-lg-10">'.
			        "\n" . '<!-- begin panel -->'.
                    "\n" . '<div class="panel panel-inverse">'.
                        "\n" . '<!-- begin panel-heading -->'.
                        "\n" . '<div class="panel-heading">'.
                            "\n" . '<div class="panel-heading-btn">'.
                                "\n" . '<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>'.
                                "\n" . '<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>'.
                            "\n" . '</div>'.
                            "\n" . '<h4 class="panel-title">'.$textl.'</h4>'.
                        "\n" . '</div>'.
                        "\n" . '<!-- end panel-heading -->'.
                      
                        "\n" . '<!-- begin panel-body -->'.
                        "\n" . '<div class="panel-body">'.
                            "\n" . '<table id="data-table-default" class="table table-striped table-bordered">'.
                               "\n" . '<thead>'.
									"\n" . '<tr>'.
										"\n" . '<th width="1%">#</th>'.
										"\n" . '<th width="1%" data-orderable="false">Avatar</th>'.
										"\n" . '<th class="text-nowrap">Tên</th>'.
										"\n" . '<th class="text-nowrap">Cấp độ</th>'.
										"\n" . '<th class="text-nowrap">D.I.V</th>'.
										"\n" . '<th class="text-nowrap">Rank</th>'.
										"\n" . '<th class="text-nowrap">Tình Trạng</th>'.
										"\n" . '<th class="text-nowrap">Lần Cuối Đăng Nhập</th>'.
									"\n" . '</tr>'.
								"\n" . '</thead>'.
                                "\n" . '<tbody>';
                               $query = mysqli_query($connect,"SELECT * FROM accounts WHERE Member = '$Member'  ORDER by Rank DESC");
                                //$query = mysqli_query($connect,"SELECT * FROM `accounts` WHERE `Member` = $Member OR `AdminLevel`  = '0' ORDER BY  `Rank` DESC LIMIT 500");
                                while ( $data = mysqli_fetch_array($query) ) {
                                	if($data['Model'] > 0 && $data['Model'] < 300){
										$avatar = '<img src="' . $system['url'] . '/assets/img/avatar/'.$data['Model'].'.png" alt="Avatar" class="img-rounded height-30"/> ';
									}else{
										$avatar = '<img src="' . $system['url'] . '/assets/img/avatar/no-img.png" alt="Avatar" class="img-rounded height-30"/> ';
									}
									if($data['Online'] == '0'){
										$online = '<span class="label label-danger">Offline</span>';
									}else{
										$online = '<span class="label label-success">Online</span>';
									}
									if($data['Rank'] == 0){
										$rank = $row['Rank0'];
									}elseif($data['Rank'] == 1){
										$rank = $row['Rank1'];
									}elseif($data['Rank'] == 2){
										$rank = $row['Rank2'];
									}elseif($data['Rank'] == 3){
										$rank = $row['Rank3'];
									}elseif($data['Rank'] == 4){
										$rank = $row['Rank4'];
									}elseif($data['Rank'] == 5){
										$rank = $row['Rank5'];
									}elseif($data['Rank'] == 6){
										$rank = $row['Rank6'];
									}elseif($data['Rank'] == 7){
										$rank = $row['Rank7'];
									}elseif($data['Rank'] == 8){
										$rank = $row['Rank8'];
									}elseif($data['Rank'] == 9){
										$rank = $row['Rank9'];
									}else{
										$rank = 'None';
									}
									if($data['Division'] == 1){
										$div = $row['Div1'];
									}elseif($data['Division'] == 2){
										$div = $row['Div2'];
									}elseif($data['Division'] == 3){
										$div = $row['Div3'];
									}elseif($data['Division'] == 4){
										$div = $row['Div4'];
									}elseif($data['Division'] == 5){
										$div = $row['Div5'];
									}elseif($data['Division'] == 6){
										$div = $row['Div6'];
									}elseif($data['Division'] == 7){
										$div = $row['Div7'];
									}elseif($data['Division'] == 8){
										$div = $row['Div8'];
									}elseif($data['Division'] == 9){
										$div = $row['Div9'];
									}elseif($data['Division'] == 10){
										$div = $row['Div10'];
									}else{
										$div = 'None';
									}
	                                echo"\n" . '<tr class="odd gradeX">'.
									"\n" . '<td width="1%" class="f-s-600">'.$data['id'].'</td>'.
									"\n" . '<td width="1%" class="with-img">'.$avatar.'</td>'.
									"\n" . '<td><a href="'.$system['url'].'/Auth/Profile/'.$data['Username'].'">'.$data['Username'].'</a></td>'.
									"\n" . '<td>'.$data['Level'].'</td>'.
									"\n" . '<td>'.$div.'</td>'.
									"\n" . '<td>'.$rank.'</td>'.
									"\n" . '<td>'.$online.'</td>'.
									"\n" . '<td>'.$data['LastLogin'].'</td>';
								}

                                echo"\n" . '</tbody>'.
                            "\n" . '</table>'.
                        "\n" . '</div>'.
                        "\n" . '<!-- end panel-body -->'.
                    "\n" . '</div>';
                   "\n" . ' <!-- end panel -->';
                "\n" . '</div>';
                "\n" . '<!-- end col-10 -->';
            "\n" . '</div>';
            "\n" . '<!-- end row -->';











require($rootPath . '/library/end.php');