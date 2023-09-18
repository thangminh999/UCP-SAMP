<?php

define('MT_CMS', 1);
$fileDir = dirname(__FILE__);
$rootPath = realpath($fileDir . '/../..');
chdir($rootPath);
require($rootPath . '/library/Autoloader.php');

	if($load && $type){
		if($load == 'Panel' && $type == 'ShopToys'){
			 echo "\n" . '<table id="data-table-default" class="table table-striped table-bordered">'.
						"\n" . '<thead>'.
							"\n" . '<tr>'.
								
								"\n" . '<th width="1%" data-orderable="false">Avatar</th>'.
								"\n" . '<th class="text-nowrap">Tên Toys</th>'.
								"\n" . '<th width="1%">ID</th>'.
								"\n" . '<th width="3%">Price</th>'.
								"\n" . '<th width="3%">Active</th>'.
								"\n" . '<th class="text-nowrap">Hành Động</th>'.
								
							"\n" . '</tr>'.
						"\n" . '</thead>'.
						"\n" . '<tbody>';

						$query = mysqli_query($connect,"SELECT * FROM mt_cms_shop_toys  ORDER BY  `Toys_Price` ASC");
						$stt = 0;
						while ( $data = mysqli_fetch_array($query) ) {	
						$stt++;		
						if($data['Toys_Active'] == 0 ){
							$active = '<i class="fa fa-times-circle text-danger" >';
						}else{
							$active = '<i class="fa fa-check-circle text-success" ></i>';
						}			
							echo "\n" . '<tr class="odd gradeX">'.
								
								"\n" . '<td width="1%" class="with-img"><img src="'.$system['url'].'/Auth/Picture/Toys-'.$data['Toys_ID'].'" alt="Avatar" class="img-rounded height-30"/> </td>'.
								"\n" . '<td>'.substr($data['Toys_Name'],'0','7').'..</td>'.
								"\n" . '<td width="1%">'.$data['Toys_ID'].'</td>'.
								"\n" . '<td width="3%">'.number_format($data['Toys_Price']).'</td>'.
								"\n" . '<td width="3%">'.$active.'</td>'.
								"\n" . '<td class="with-btn" nowrap>
								<a href="#dentai-'.$data['id'].'" class="btn btn-sm btn-primary width-60 m-r-2" data-toggle="modal">Edit</a>';
								if($data['Toys_Active'] == 1){
									 $slect = "\n" . ' <select name="" id="activetoys-'.$data['id'].'" class="form-control" required="required">'.
											"\n" . '<option class="bg-black" value="1" selected>Được Bán</option>'.
											"\n" . '<option class="bg-black" value="0">Không Bán</option>'.
											"\n" . '</select>';
								}elseif($data['Toys_Active'] == 0){
									 $slect = "\n" . '<select name="" id="activetoys-'.$data['id'].'" class="form-control" required="required">'.
											"\n" . '<option class="bg-black" value="1">Được Bán</option>'.
											"\n" . '<option class="bg-black" value="0" selected>Không Bán</option>'.
											"\n" . '</select>';
								}
								 echo "\n" . '<!-- #dentai-'.$data['Toys_Name'].' -->'.
								
								
							"\n" . '<div class="modal fade" id="dentai-'.$data['id'].'">'.
								"\n" . '<div class="modal-dialog">'.
									"\n" . '<div class="modal-content">'.
										"\n" . '<div class="modal-header">'.
										   "\n" . '<h4 class="modal-title">Chỉnh sửa toys:  '.$data['Toys_Name'].'</h4>'.
											
										"\n" . '</div>'.
										"\n" . '<div class="modal-body bg-black">'.
											
										"\n" . '<form class="form-horizontal form-bordered" id ="save-mailer">'.
								 "\n" . '<div class="form-group row mb-3">'.
									 "\n" . '<label class="col-md-4 col-form-label text-blue "><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Name Toys</font></font></label>'.
									 "\n" . '<div class="col-md-8">'.
                                         "\n" . '<div class="input-group date">'.
                                         "\n" . '<input type="hidden" class="form-control" id="uid-'.$data['id'].'" value="'.$data['id'].'">'.
                                             "\n" . '<input type="text" class="form-control" id="name-'.$data['id'].'" value="'.$data['Toys_Name'].'">'.
                                             "\n" . '<div class="input-group-addon">'.
                                                "\n" . ' <i class="fal fa-file-signature" data-toggle="tooltip" data-html="true" title="<b>Tên của toys</b>"></i>'.
                                             "\n" . '</div>'.
                                         "\n" . '</div>'.
									 "\n" . '</div>'.
								 "\n" . '</div>'.
								"\n" . '<div class="form-group row mb-3">'.
									 "\n" . '<label class="col-md-4 col-form-label text-blue"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ID Toys</font></font></label>'.
									 "\n" . '<div class="col-md-8">'.
                                         "\n" . '<div class="input-group date">'.
                                             "\n" . '<input type="text" class="form-control" id="id-'.$data['id'].'" value="'.$data['Toys_ID'].'">'.
                                             "\n" . '<div class="input-group-addon">'.
                                                "\n" . ' <i class="fal fa-id-card"  data-toggle="tooltip" data-html="true" title="<b>ID của toys</b>"></i>'.
                                             "\n" . '</div>'.
                                         "\n" . '</div>'.
									 "\n" . '</div>'.
								 "\n" . '</div>'.
								 "\n" . '<div class="form-group row mb-3">'.
									 "\n" . '<label class="col-md-4 col-form-label text-blue"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Giá Tiền</font></font></label>'.
									 "\n" . '<div class="col-md-8">'.
                                         "\n" . '<div class="input-group date">'.
                                             "\n" . '<input type="text" class="form-control" id="price-'.$data['id'].'" value="'.$data['Toys_Price'].'">'.
                                             "\n" . '<div class="input-group-addon">'.
                                                "\n" . ' <i class="fal fa-money-check" data-toggle="tooltip" data-html="true" title="<b>Giá tiền của toys</b>"></i>'.
                                             "\n" . '</div>'.
                                         "\n" . '</div>'.
									 "\n" . '</div>'.
								 "\n" . '</div>'.
								 "\n" . '<div class="form-group row mb-3">'.
									 "\n" . '<label class="col-md-4 col-form-label text-blue"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Active</font></font></label>'.
									 "\n" . '<div class="col-md-8">'.
                                         "\n" . '<div class="input-group date">'.
                                            "\n" . ''.$slect.''.
                                             "\n" . '<div class="input-group-addon">'.
                                                "\n" . ' <i class="fal fa-lock-alt" data-toggle="tooltip" data-html="true" title="<b>Active Bán Or Không Bán"></i>'.
                                             "\n" . '</div>'.
                                         "\n" . '</div>'.
									 "\n" . '</div>'.
								 "\n" . '</div>'.
								
								 
								 "\n" . '<div class="form-group row mb-3">'.
									 "\n" . '<label class="col-md-4 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></label>'.
									 "\n" . '<div class="col-md-8">'.
                                         "\n" . '<div class="col-md-7 offset-md-3" id="edittoys-'.$data['id'].'">'.
                                            "\n" . '<button type="button" class="btn btn-sm btn-primary m-r-5" onclick="saveedittoys'.$data['id'].'()">Lưu Lại</button>'.
											"\n" . '</form>'.
                                       "\n" . ' </div>'.
									 "\n" . '</div>'.

								 "\n" . '</div>'.

							"\n" . '</form>';
echo"\n" . ' <script type="text/javascript">'.
	"\n" . 'function saveedittoys'.$data['id'].'(){'.
		"\n" . 'var uid = $("#uid-'.$data['id'].'").val();'.
		"\n" . 'var name = $("#name-'.$data['id'].'").val();'.
        "\n" . 'var id= $("#id-'.$data['id'].'").val();'.
        "\n" . 'var price= $("#price-'.$data['id'].'").val();'.
        "\n" . '//var activecars= $("#activecars").val();'.
        "\n" . 'var activetoys = $("#activetoys-'.$data['id'].'").val();'.
       "\n" . 'if (!name) {'.
		    "\n" . 'showNotification(\'bg-red text-white\', \'Name toys không được bỏ trống\');'.
		     "\n" . 'return;'.
        "\n" . '}else if (!id) {'.
		    "\n" . 'showNotification(\'bg-red text-white\', \'ID toys không được bỏ trống\');'.
		     "\n" . 'return;'.
        "\n" . '}else if (!price) {'.
		    "\n" . 'showNotification(\'bg-red text-white\', \'Giá tiền không được bỏ trống\');'.
		     "\n" . 'return;'.
       "\n" . ' }'.
		"\n" . '$("#edittoys-'.$data['id'].'").html(\'<button class="btn btn-warning" type="button" disabled><i class="fal fa-spinner fa-pulse"></i> Vui Lòng Chờ</button>\');'.
		"\n" . '$.ajax({'.
               			"\n" . 'url     : \'/Auth/Ajax/Load.html\','.
               			"\n" . 'type    : \'POST\','.
               			"\n" . 'dataType: \'JSON\','.
               			"\n" . 'data    : {'.
                   			"\n" . 't       : \'panel-shop-toys-edit\','.
                   			"\n" . 'uid  : uid,'.
                   			"\n" . 'name  : name,'.
                   			"\n" . 'id : id,'.
                   			"\n" . 'price :price,'.
                   			"\n" . 'activetoys:activetoys'.
               			"\n" . '},'.
                	"\n" . 'success: (data) => {'.
                    	"\n" . 'if (data.error) {'.
                    		"\n" . 'setTimeout(function(){'.
                    		"\n" . '$("#edittoys-'.$data['id'].'").html(\'<button class="btn btn-danger" type="button\" onclick="saveedittoys'.$data['id'].'()"><i class="fal fa-times-circle"></i> Làm lại</button>\');'.
                        	"\n" . 'showNotification(\'bg-red text-white\', data.msg);'.
                        	"\n" . '},3000);'.
                    	"\n" . '} else {'.
                        	"\n" . 'setTimeout(function(){'.
                        		"\n" . '$("#edittoys-'.$data['id'].'").html(\'<button class="btn btn-success" type="button" onclick="saveedittoys'.$data['id'].'()"><i class="fal fa-check-circle"></i> Chỉnh Sửa</button>\');'.
                        	"\n" . 'showNotification(\'bg-green text-white\', data.msg);'.
                        	"\n" . '},3000);'.
                        	
                    "\n" . '}'.
                "\n" . '}'.
            "\n" . '})'.
	"\n" . '}'.

	"\n" . '</script>';

										echo "\n" . '</div>'.
										"\n" . '<div class="modal-footer">'.
											"\n" . '<a class="btn btn-white" data-dismiss="modal">Close</a>'.
										"\n" . '</div>'.
									"\n" . '</div>'.
								"\n" . '</div>'.
							"\n" . '</div>';

							}
							echo"\n" . '</tr>'.
						"\n" . '</tbody>'.
					"\n" . '</table>';
		}
	}
