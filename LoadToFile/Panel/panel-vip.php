<?php

define('MT_CMS', 1);
$fileDir = dirname(__FILE__);
$rootPath = realpath($fileDir . '/../..');
chdir($rootPath);
require($rootPath . '/library/Autoloader.php');
if($user_id){
	if($datauser['Panel'] == 0 ){
				require($rootPath . '/LoadToFile/PageNotfun/error.php');
				exit();
		}
}else{
	require($rootPath . '/LoadToFile/PageNotfun/error.php');
	exit();
}
$headmod = 'panel-vip';
$textl = 'Panel: Shop VIP';
require($rootPath . '/library/head.php');
$result_online = mysqli_query($connect,"SELECT * FROM accounts WHERE Online = 1");
$online = mysqli_num_rows($result_online);
$result_member = mysqli_query($connect,"SELECT * FROM accounts");
$member = mysqli_num_rows($result_member);
$result_faction = mysqli_query($connect,"SELECT * FROM accounts WHERE Member >= 1");
$member_faction = mysqli_num_rows($result_faction);
$result_family = mysqli_query($connect,"SELECT * FROM accounts WHERE FMember > 0 AND FMember < 21");
$member_family = mysqli_num_rows($result_family);
echo "\n" . '<div class="row">'.
			    "\n" . '<!-- begin col-3 -->'.
			    "\n" . '<div class="col-lg-3 col-md-6">'.
			        "\n" . '<div class="widget widget-stats bg-blue">'.
						"\n" . '<div class="stats-icon stats-icon-lg"><i class="far fa-globe-asia"></i></div>'.
			        	"\n" . '<div class="stats-content">'.
							"\n" . '<div class="stats-title">Online</div>'.
							"\n" . '<div class="stats-number">'.number_format($online).'</div>'.
							"\n" . '<div class="stats-desc">Thành Viên Online</div>'.
                        "\n" . '</div>'.
			        "\n" . '</div>'.
			    "\n" . '</div>'.
			    "\n" . '<!-- end col-3 -->'.
			     "\n" . '<!-- begin col-3 -->'.
			    "\n" . '<div class="col-lg-3 col-md-6">'.
			        "\n" . '<div class="widget widget-stats bg-green">'.
						"\n" . '<div class="stats-icon stats-icon-lg"><i class="far fa-users"></i></div>'.
			        	"\n" . '<div class="stats-content">'.
							"\n" . '<div class="stats-title">Member</div>'.
							"\n" . '<div class="stats-number">'.number_format($member).'</div>'.
							"\n" . '<div class="stats-desc">Thành Viên</div>'.
                        "\n" . '</div>'.
			        "\n" . '</div>'.
			    "\n" . '</div>'.
			    "\n" . '<!-- end col-3 -->'.
			     "\n" . '<!-- begin col-3 -->'.
			    "\n" . '<div class="col-lg-3 col-md-6">'.
			        "\n" . '<div class="widget widget-stats bg-red">'.
						"\n" . '<div class="stats-icon stats-icon-lg"><i class="far fa-industry-alt"></i></div>'.
			        	"\n" . '<div class="stats-content">'.
							"\n" . '<div class="stats-title">Member Faction</div>'.
							"\n" . '<div class="stats-number">'.number_format($member_faction).'</div>'.
							"\n" . '<div class="stats-desc">Thành Viên Faction</div>'.
                        "\n" . '</div>'.
			        "\n" . '</div>'.
			    "\n" . '</div>'.
			    "\n" . '<!-- end col-3 -->'.
			    "\n" . '<!-- begin col-3 -->'.
			    "\n" . '<div class="col-lg-3 col-md-6">'.
			        "\n" . '<div class="widget widget-stats bg-grey-darker">'.
						"\n" . '<div class="stats-icon stats-icon-lg"><i class="far fa-house-flood"></i></div>'.
			        	"\n" . '<div class="stats-content">'.
							"\n" . '<div class="stats-title">Member Famlily</div>'.
							"\n" . '<div class="stats-number">'.number_format($member_family).'</div>'.
							"\n" . '<div class="stats-desc">Thành Viên Famlily</div>'.
                        "\n" . '</div>'.
			        "\n" . '</div>'.
			    "\n" . '</div>'.
			    "\n" . '<!-- end col-3 -->'.
			"\n" . '</div>';
	echo "\n" . '<!-- begin row -->'.
			 "\n" . '<div class="row">'.
				 "\n" . '<!-- begin col-8 -->'.
				 "\n" . '<div class="col-lg-8">'.
					 "\n" . '<!-- begin panel -->'.
					 "\n" . '<div class="panel panel-inverse" data-sortable-id="index-1">'.
						 "\n" . '<div class="panel-heading">'.
							 "\n" . '<div class="panel-heading-btn">'.
								 "\n" . '<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>'.
								 "\n" . '<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus" ></i></a>'.
							 "\n" . '</div>'.
							"\n" . '<h4 class="panel-title"><i class="fa fa-bullhorn"></i> Danh Sách Shop VIP</h4>'.
						 "\n" . '</div>'.
						 "\n" . '<div class="panel-body height-full">'.
								
						 "\n" . '<table id="data-table-default" class="table table-striped table-bordered">'.
						"\n" . '<thead>'.
							"\n" . '<tr>'.
								
								
								"\n" . '<th class="text-nowrap">Tên VIP</th>'.
								"\n" . '<th width="1%">DonateRank</th>'.
								"\n" . '<th width="3%">Price</th>'.
								"\n" . '<th width="3%">Active</th>'.
								"\n" . '<th class="text-nowrap">Hành Động</th>'.
								
							"\n" . '</tr>'.
						"\n" . '</thead>'.
						"\n" . '<tbody>';

						$query = mysqli_query($connect,"SELECT * FROM mt_cms_shop_vip  ORDER BY  `VIP_Price` ASC");
						$stt = 0;
						while ( $data = mysqli_fetch_array($query) ) {	
						$stt++;		
						if($data['VIP_Active'] == 0 ){
							$active = '<i class="fa fa-times-circle text-danger" >';
						}else{
							$active = '<i class="fa fa-check-circle text-success" ></i>';
						}			
							echo "\n" . '<tr class="odd gradeX">'.
								
								
								"\n" . '<td>'.$data['VIP_Name'].'</td>'.
								"\n" . '<td width="1%">'.$data['VIP_DonateRank'].'</td>'.
								"\n" . '<td width="3%">'.number_format($data['VIP_Price']).'</td>'.
								"\n" . '<td width="3%">'.$active.'</td>'.
								"\n" . '<td class="with-btn" nowrap>
								<a href="#dentai-'.$data['id'].'" class="btn btn-sm btn-primary width-60 m-r-2" data-toggle="modal">Edit</a>';
								if($data['VIP_Active'] == 1){
									 $slect = "\n" . ' <select name="" id="active-'.$data['id'].'" class="form-control" required="required">'.
											"\n" . '<option class="bg-black" value="1" selected>Được Bán</option>'.
											"\n" . '<option class="bg-black" value="0">Không Bán</option>'.
											"\n" . '</select>';
								}elseif($data['VIP_Active'] == 0){
									 $slect = "\n" . '<select name="" id="active-'.$data['id'].'" class="form-control" required="required">'.
											"\n" . '<option class="bg-black" value="1">Được Bán</option>'.
											"\n" . '<option class="bg-black" value="0" selected>Không Bán</option>'.
											"\n" . '</select>';
								}
								 echo "\n" . '<!-- #dentai-'.$data['VIP_Name'].' -->'.
								
								
							"\n" . '<div class="modal fade" id="dentai-'.$data['id'].'">'.
								"\n" . '<div class="modal-dialog">'.
									"\n" . '<div class="modal-content">'.
										"\n" . '<div class="modal-header">'.
										   "\n" . '<h4 class="modal-title">Chỉnh sửa:  '.$data['VIP_Name'].'</h4>'.
											
										"\n" . '</div>'.
										"\n" . '<div class="modal-body">'.
											
										"\n" . '<form class="form-horizontal form-bordered" id ="save-mailer">'.
								 "\n" . '<div class="form-group row mb-3">'.
									 "\n" . '<label class="col-md-4 col-form-label text-blue "><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Name VIP</font></font></label>'.
									 "\n" . '<div class="col-md-8">'.
                                         "\n" . '<div class="input-group date">'.
                                         "\n" . '<input type="hidden" class="form-control" id="uid-'.$data['id'].'" value="'.$data['id'].'">'.
                                             "\n" . '<input type="text" class="form-control" id="name-'.$data['id'].'" value="'.$data['VIP_Name'].'">'.
                                             "\n" . '<div class="input-group-addon">'.
                                                "\n" . ' <i class="fal fa-file-signature" data-toggle="tooltip" data-html="true" title="<b>Tên của VIP</b>"></i>'.
                                             "\n" . '</div>'.
                                         "\n" . '</div>'.
									 "\n" . '</div>'.
								 "\n" . '</div>'.
								"\n" . '<div class="form-group row mb-3">'.
									 "\n" . '<label class="col-md-4 col-form-label text-blue"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">DonateRank</font></font></label>'.
									 "\n" . '<div class="col-md-8">'.
                                         "\n" . '<div class="input-group date">'.
                                             "\n" . '<input type="text" class="form-control" id="id-'.$data['id'].'" value="'.$data['VIP_DonateRank'].'">'.
                                             "\n" . '<div class="input-group-addon">'.
                                                "\n" . ' <i class="fal fa-id-card"  data-toggle="tooltip" data-html="true" title="<b>ID của VIP</b>"></i>'.
                                             "\n" . '</div>'.
                                         "\n" . '</div>'.
									 "\n" . '</div>'.
								 "\n" . '</div>'.
								 "\n" . '<div class="form-group row mb-3">'.
									 "\n" . '<label class="col-md-4 col-form-label text-blue"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Giá Tiền</font></font></label>'.
									 "\n" . '<div class="col-md-8">'.
                                         "\n" . '<div class="input-group date">'.
                                             "\n" . '<input type="text" class="form-control" id="price-'.$data['id'].'" value="'.$data['VIP_Price'].'">'.
                                             "\n" . '<div class="input-group-addon">'.
                                                "\n" . ' <i class="fal fa-money-check" data-toggle="tooltip" data-html="true" title="<b>Giá tiền của VIP</b>"></i>'.
                                             "\n" . '</div>'.
                                         "\n" . '</div>'.
									 "\n" . '</div>'.
								 "\n" . '</div>'.
								  "\n" . '<div class="form-group row mb-3">'.
									 "\n" . '<label class="col-md-4 col-form-label text-blue"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">VIP Info (HTML)</font></font></label>'.
									 "\n" . '<div class="col-md-8">'.
                                         "\n" . '<div class="input-group date">'.

                                             "\n" . '<textarea class="form-control" rows="5" id="info-'.$data['id'].'">'.$data['VIP_Info'].'</textarea>'.
                                             "\n" . '<div class="input-group-addon">'.
                                                "\n" . ' <i class="fal fa-money-check" data-toggle="tooltip" data-html="true" title="<b>Giá tiền của VIP</b>"></i>'.
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
                                         "\n" . '<div class="col-md-7 offset-md-3" id="editvip-'.$data['id'].'">'.
                                            "\n" . '<button type="button" class="btn btn-sm btn-primary m-r-5" onclick="saveeditvip'.$data['id'].'()">Lưu Lại</button>'.
                                       "\n" . ' </div>'.
									 "\n" . '</div>'.

								 "\n" . '</div>'.

							"\n" . '</form>';
echo"\n" . ' <script type="text/javascript">'.
	"\n" . 'function saveeditvip'.$data['id'].'(){'.
		"\n" . 'var uid = $("#uid-'.$data['id'].'").val();'.
		"\n" . 'var name = $("#name-'.$data['id'].'").val();'.
		"\n" . 'var info = $("#info-'.$data['id'].'").val();'.
        "\n" . 'var id= $("#id-'.$data['id'].'").val();'.
        "\n" . 'var price= $("#price-'.$data['id'].'").val();'.
        "\n" . '//var activecars= $("#activecars").val();'.
        "\n" . 'var active = $("#active-'.$data['id'].'").val();'.
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
		"\n" . '$("#editvip-'.$data['id'].'").html(\'<button class="btn btn-warning" type="button" disabled><i class="fal fa-spinner fa-pulse"></i> Vui Lòng Chờ</button>\');'.
		"\n" . '$.ajax({'.
               			"\n" . 'url     : \'/Auth/Ajax/Load.html\','.
               			"\n" . 'type    : \'POST\','.
               			"\n" . 'dataType: \'JSON\','.
               			"\n" . 'data    : {'.
                   			"\n" . 't       : \'panel-shop-vip-edit\','.
                   			"\n" . 'uid  : uid,'.
                   			"\n" . 'name  : name,'.
                   			"\n" . 'info  : info,'.
                   			"\n" . 'id : id,'.
                   			"\n" . 'price :price,'.
                   			"\n" . 'active:active'.
               			"\n" . '},'.
                	"\n" . 'success: (data) => {'.
                    	"\n" . 'if (data.error) {'.
                    		"\n" . 'setTimeout(function(){'.
                    		"\n" . '$("#editvip-'.$data['id'].'").html(\'<button class="btn btn-danger" type="button\" onclick="saveeditvip'.$data['id'].'()"><i class="fal fa-times-circle"></i> Làm lại</button>\');'.
                        	"\n" . 'showNotification(\'bg-red text-white\', data.msg);'.
                        	"\n" . '},3000);'.
                    	"\n" . '} else {'.
                        	"\n" . 'setTimeout(function(){'.
                        		"\n" . '$("#editvip-'.$data['id'].'").html(\'<button class="btn btn-success" type="button" onclick="saveeditvip'.$data['id'].'()"><i class="fal fa-check-circle"></i> Chỉnh Sửa</button>\');'.
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
					"\n" . '</table>'.



							"\n" . '</form>'.
						 "\n" . '</div>'.
					 "\n" . '</div>'.
					 "\n" . '<!-- end panel -->'.
				 "\n" . '</div>'.
				 "\n" . '<!-- end col-8-->';
			 
?>
<script type="text/javascript">
	
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
				 echo "\n" . '<!-- begin col-6 -->'.
				 "\n" . '<div class="col-lg-4">'.
					 "\n" . '<!-- begin panel -->'.
					 "\n" . '<div class="panel panel-inverse" data-sortable-id="index-6">'.
						 "\n" . '<div class="panel-heading">'.
							 "\n" . '<div class="panel-heading-btn">'.
								 "\n" . '<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>'.
								 "\n" . '<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>'.
							 "\n" . '</div>'.
							 "\n" . '<h4 class="panel-title">Thêm VIP</h4>'.
						 "\n" . '</div>'.
						 "\n" . '<div class="panel-body">'.
							 "\n" . '<form class="form-horizontal form-bordered" id ="save-mailer">'.
								 "\n" . '<div class="form-group row">'.
									 "\n" . '<label class="col-md-4 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Name VIP:</font></font></label>'.
									 "\n" . '<div class="col-md-8">'.
                                         "\n" . '<div class="input-group date">'.
                                             "\n" . '<input type="text" class="form-control" id="name" placeholder="Tên Của VIP">'.
                                             "\n" . '<div class="input-group-addon">'.
                                                "\n" . ' <i class="fal fa-car" data-toggle="tooltip" data-html="true" title="<b>Tên VIP muốn thêm</b>"></i>'.
                                             "\n" . '</div>'.
                                         "\n" . '</div>'.
									 "\n" . '</div>'.
								 "\n" . '</div>'.
								"\n" . '<div class="form-group row">'.
									 "\n" . '<label class="col-md-4 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ID VIP</font></font></label>'.
									 "\n" . '<div class="col-md-8">'.
                                         "\n" . '<div class="input-group date">'.
                                             "\n" . '<input type="text" class="form-control" id="id" placeholder="ID Của VIP">'.
                                             "\n" . '<div class="input-group-addon">'.
                                                "\n" . ' <i class="fal fa-car-side"  data-toggle="tooltip" data-html="true" title="<b>ID VIP muốn thêm</b>"></i>'.
                                             "\n" . '</div>'.
                                         "\n" . '</div>'.
									 "\n" . '</div>'.
								 "\n" . '</div>'.
								 "\n" . '<div class="form-group row">'.
									 "\n" . '<label class="col-md-4 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Giá Tiền (Credits)</font></font></label>'.
									 "\n" . '<div class="col-md-8">'.
                                         "\n" . '<div class="input-group date">'.
                                             "\n" . '<input type="text" class="form-control" id="price" placeholder="Giá Tiền Của VIP">'.
                                             "\n" . '<div class="input-group-addon">'.
                                                "\n" . ' <i class="fal fa-money-check" data-toggle="tooltip" data-html="true" title="<b>Đơn vị tính là Credits</b>"></i>'.
                                             "\n" . '</div>'.
                                         "\n" . '</div>'.
									 "\n" . '</div>'.
								 "\n" . '</div>'.

								 "\n" . '<div class="form-group row">'.
									 "\n" . '<label class="col-md-4 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Info VIP (HTML)</font></font></label>'.
									 "\n" . '<div class="col-md-8">'.
                                         "\n" . '<div class="input-group date">'.
                                          "\n" . '<textarea class="form-control" rows="5" id="info" placeholder="Nhập thông tin của vip dạng HTML"></textarea>'.
                                             "\n" . '<div class="input-group-addon">'.
                                                "\n" . ' <i class="fal fa-info" data-toggle="tooltip" data-html="true" title="<b>Info VIP HTML</b>"></i>'.
                                             "\n" . '</div>'.
                                         "\n" . '</div>'.
									 "\n" . '</div>'.
								 "\n" . '</div>'.

								 "\n" . '<div class="form-group row">'.
									 "\n" . '<label class="col-md-4 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Button</font></font></label>'.
									 "\n" . '<div class="col-md-8">'.
                                         "\n" . '<div class="col-md-7 offset-md-3" id="creat-vip">'.
                                            "\n" . '<button type="button" class="btn btn-sm btn-primary m-r-5" onclick="creatvip()">Lưu Lại</button>'.
                                       "\n" . ' </div>'.
									 "\n" . '</div>'.

								 "\n" . '</div>'.

							"\n" . '</form>'.
						 "\n" . '</div>'.
					 "\n" . '</div>'.
				 "\n" . '</div>'.
				 "\n" . '<!-- end col-6 -->'.
			 "\n" . '</div>'.
			 "\n" . '<!-- end row -->';
?>
<script type="text/javascript">
	function creatvip(){
		var name = $("#name").val();
        var id= $("#id").val();
        var price= $("#price").val();
        var info= $("#info").val();
         if (!name) {
		    showNotification('bg-red text-white', 'Name toys không được bỏ trống');
		     return;
        }else if (!id) {
		    showNotification('bg-red text-white', 'ID toys không được bỏ trống');
		     return;
        }else if (!price) {
		    showNotification('bg-red text-white', 'Giá tiền không được bỏ trống');
		     return;
        }
        $("#creat-vip").html('<button class="btn btn-warning" type="button" disabled><i class="fal fa-spinner fa-pulse"></i> Vui Lòng Chờ</button>');
		$.ajax({
               			url     : '/Auth/Ajax/Load.html',
               			type    : 'POST',
               			dataType: 'JSON',
               			data    : {
                   			t       : 'creat-vip',
                   			name  : name,
                   			id : id,
                   			price :price,
                   			info :info,
               			},
                	success: (data) => {
                    	if (data.error) {
                    		setTimeout(function(){
                    		$("#creat-vip").html('<button class="btn btn-danger" type="button" onclick="creatvip()"><i class="fal fa-times-circle"></i> Làm lại</button>');
                        	showNotification('bg-red text-white', data.msg);
                        	},3000);
                    	} else {
                        	setTimeout(function(){
                        		$("#creat-vip").html('<button class="btn btn-success" type="button" onclick="creatvip()"><i class="fal fa-check-circle"></i> Thêm Xe</button>');
                        	showNotification('bg-green text-white', data.msg);
                        	},3000);
                        	
                    }
                }
            })
	}

</script>
<?php
require($rootPath . '/library/end.php');
