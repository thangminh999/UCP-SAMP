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
$headmod = 'panel-history';
$textl = 'Panel: Lịch sử mua hàng';
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
				 "\n" . '<div class="col-lg-12">'.
					 "\n" . '<!-- begin panel -->'.
					 "\n" . '<div class="panel panel-inverse" data-sortable-id="index-1">'.
						 "\n" . '<div class="panel-heading">'.
							 "\n" . '<div class="panel-heading-btn">'.
								 "\n" . '<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>'.
								 "\n" . '<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus" ></i></a>'.
							 "\n" . '</div>'.
							"\n" . '<h4 class="panel-title"><i class="fa fa-bullhorn"></i> Lịch sử mua hàng </h4>'.
						 "\n" . '</div>'.
						 "\n" . '<div class="panel-body height-full">'.
								
						 "\n" . '<table id="data-table-default" class="table table-striped table-bordered">'.
						"\n" . '<thead>'.
							"\n" . '<tr>'.
								"\n" . '<th width="1%">#</th>'.
								"\n" . '<th width="5%">Loại</th>'.
								"\n" . '<th width="15%">Users</th>'.
								"\n" . '<th class="text-nowrap">Vật Phẩm</th>'.
								"\n" . '<th class="text-nowrap">Price</th>'.
								"\n" . '<th width="15%">Thời Gian</th>'.
								"\n" . '<th width="15%">Credits Before</th>'.
								"\n" . '<th width="15%">Credits After</th>'.
							"\n" . '</tr>'.
						"\n" . '</thead>'.
						"\n" . '<tbody>';

						$query = mysqli_query($connect,"SELECT * FROM mt_cms_log  ORDER BY  `Time` DESC");
						$stt = 0;
						while ( $data = mysqli_fetch_array($query) ) {	
						$stt++;		

							echo "\n" . '<tr class="odd gradeX">'.
								"\n" . '<td width="1%" class="f-s-600">'.$stt.'</td>'.
								"\n" . '<td>'.$data['Loai'].'</td>'.
								"\n" . '<td><a href="'.$system['url'].'/Auth/Profile/'.$data['Username'].'">'.$data['Username'].'</a></td>'.
								"\n" . '<td>'.$data['Items'].'</td>'.
								"\n" . '<td>'.number_format($data['Price']).'</td>'.
								"\n" . '<td>'.$data['Time_Text'].'</td>'.
								"\n" . '<td>'.number_format($data['Credits_before']).'</td>'.
								"\n" . '<td>'.number_format($data['Credits_after']).'</td>';
								
							}
							echo"\n" . '</tr>'.
						"\n" . '</tbody>'.
					"\n" . '</table>'.



							
						 "\n" . '</div>'.
					 "\n" . '</div>'.
					 "\n" . '<!-- end panel -->'.
				 "\n" . '</div>'.
				 "\n" . '<!-- end col-8-->';
			 "\n" . '</div>'.
			 "\n" . '<!-- end row -->';
?>
<script type="text/javascript">
	function creatcars(){
		var name = $("#name").val();
        var id= $("#id").val();
        var price= $("#price").val();
         if (!name) {
		    showNotification('bg-red text-white', 'Name xe không được bỏ trống');
		     return;
        }else if (!id) {
		    showNotification('bg-red text-white', 'ID xe không được bỏ trống');
		     return;
        }else if (!price) {
		    showNotification('bg-red text-white', 'Giá tiền không được bỏ trống');
		     return;
        }
        $("#creat-cars").html('<button class="btn btn-warning" type="button" disabled><i class="fal fa-spinner fa-pulse"></i> Vui Lòng Chờ</button>');
		$.ajax({
               			url     : '/Auth/Ajax/Load.html',
               			type    : 'POST',
               			dataType: 'JSON',
               			data    : {
                   			t       : 'creat-cars',
                   			name  : name,
                   			id : id,
                   			price :price,
               			},
                	success: (data) => {
                    	if (data.error) {
                    		setTimeout(function(){
                    		$("#creat-cars").html('<button class="btn btn-danger" type="button" onclick="creatcars()"><i class="fal fa-times-circle"></i> Làm lại</button>');
                        	showNotification('bg-red text-white', data.msg);
                        	},3000);
                    	} else {
                        	setTimeout(function(){
                        		$("#creat-cars").html('<button class="btn btn-success" type="button" onclick="creatcars()"><i class="fal fa-check-circle"></i> Thêm Xe</button>');
                        	showNotification('bg-green text-white', data.msg);
                        	},3000);
                        	
                    }
                }
            })
	}

</script>
<?php
require($rootPath . '/library/end.php');
