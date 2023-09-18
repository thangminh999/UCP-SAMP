<?php

define('MT_CMS', 1);
$fileDir = dirname(__FILE__);
$rootPath = realpath($fileDir . '/../..');
chdir($rootPath);
require($rootPath . '/library/Autoloader.php');
if(!$user_id){
require($rootPath . '/LoadToFile/PageNotfun/error.php');
exit();
}
$headmod = 'napmomo';
$textl = 'Nạp Tiền Qua Ví MoMo';
require($rootPath . '/library/head.php');

echo "\n" . '<!-- begin row -->'.
			"\n" . '<div class="row">'.
				"\n" . '<!-- begin col-8 -->'.
				"\n" . '<div class="col-lg-8">'.
					"\n" . '<!-- begin panel -->'.
					"\n" . '<div class="panel panel-inverse" data-sortable-id="index-1">'.
						"\n" . '<div class="panel-heading">'.
							"\n" . '<div class="panel-heading-btn">'.
								"\n" . '<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>'.
								"\n" . '<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>'.
							"\n" . '</div>'.
							"\n" . '<h4 class="panel-title"><i class="fa fa-bullhorn"></i>Nạp Tiền Qua Ví MoMo</h4>'.
						"\n" . '</div>'.
						"\n" . '<div class="panel-body height-full">'.
							 "\n" .'<div class="note note-lime note-lime m-b-15">'.
								"\n" . '<h4><b>Lưu Ý:</b></h4>'.
								"\n" . '<p>'.
								"\n" . '<strong>Hệ thống nạp tiền bằng ví điện tử MoMo Auto 30s -> 1 min</strong><br>Mệnh giá chuyển tiền tối thiểu là 10.000 VND<hr><strong>Nội dung chuyển tiền:</strong><br><b>SDT</b>: 0911095876<br><b>Tên:</b> Hoàng Ngọc Minh Thắng<br><b>Nội Dung:</b> '.$datauser['Username'].'<hr><strong>Bảng giá chuyển tiền:</strong><br>10.000 VND = 1.000 Credits<br>Sao khi chuyển tiền thành công vui lòng load lại lịch sử để biết thêm thông tin<br>Bấm vào nút <i class="fa fa-redo"></i> để load lại lịch sử chuyển tiền (Không cần F5)'.
								"\n" . '</p>'.
							 	"\n" . '</div>'.

							
							
						"\n" . '</div>'.
					"\n" . '</div>'.
					"\n" . '<!-- end panel -->'.
				"\n" . '</div>'.
				"\n" . '<!-- end col-8 -->'.
				"\n" . '<!-- begin col-4 -->'.
				"\n" . '<div class="col-lg-4">'.
					"\n" . '<!-- begin panel -->'.
					"\n" . '<div class="panel panel-inverse" data-sortable-id="index-6">'.
						"\n" . '<div class="panel-heading">'.
							"\n" . '<div class="panel-heading-btn">'.
								"\n" . '<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>'.
								"\n" . '<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>'.
							"\n" . '</div>'.
							"\n" . '<h4 class="panel-title">Bảng Giá Chuyển Tiền</h4>'.
						"\n" . '</div>'.
						"\n" . '<div class="panel-body height-full">'.
							"\n" . '<div class="row">'.
								"\n" . '<div class="col-md-4 border border-primary">'.
									"\n" . '<h3 class="text-center m-t-15">20.000 VND</h3>'.
								"\n" . '</div>'.
								"\n" . '<div class="col-md-8 border border-primary">'.
									"\n" . '<h2 class="text-center m-t-10">2.000 Credits</h2>'.
								"\n" . '</div>'.
							"\n" . '</div>'.
							"\n" . '<div class="row">'.
								"\n" . '<div class="col-md-4 border border-primary">'.
									"\n" . '<h3 class="text-center m-t-15">50.000 VND</h3>'.
								"\n" . '</div>'.
								"\n" . '<div class="col-md-8 border border-primary">'.
									"\n" . '<h2 class="text-center m-t-10">5.000 Credits</h2>'.
								"\n" . '</div>'.
							"\n" . '</div>'.
							"\n" . '<div class="row">'.
								"\n" . '<div class="col-md-4 border border-primary">'.
									"\n" . '<h3 class="text-center m-t-15">100.000 VND</h3>'.
								"\n" . '</div>'.
								"\n" . '<div class="col-md-8 border border-primary">'.
									"\n" . '<h2 class="text-center m-t-10">10.000 Credits</h2>'.
								"\n" . '</div>'.
							"\n" . '</div>'.
							"\n" . '<div class="row">'.
								"\n" . '<div class="col-md-4 border border-primary">'.
									"\n" . '<h3 class="text-center m-t-15">200.000 VND</h3>'.
								"\n" . '</div>'.
								"\n" . '<div class="col-md-8 border border-primary">'.
									"\n" . '<h2 class="text-center m-t-10">20.000 Credits</h2>'.
								"\n" . '</div>'.
							"\n" . '</div>'.
							"\n" . '<div class="row">'.
								"\n" . '<div class="col-md-4 border border-primary">'.
									"\n" . '<h3 class="text-center m-t-15">500.000 VND</h3>'.
								"\n" . '</div>'.
								"\n" . '<div class="col-md-8 border border-primary">'.
									"\n" . '<h2 class="text-center m-t-10">50.000 Credits</h2>'.
								"\n" . '</div>'.
							"\n" . '</div>'.
					"\n" . '</div>'.
					"\n" . '<!-- end panel -->'.
				"\n" . '</div>'.
				"\n" . '<!-- end col-4 -->'.
			"\n" . '</div>'.
			"\n" . '</div>'.
			"\n" . '<!-- end row -->';
			echo "\n" . '<!-- begin row -->'.
			 "\n" . '<div class="row">'.
				 "\n" . '<!-- begin col-8 -->'.
				 "\n" . '<div class="col-lg-12">'.
					 "\n" . '<!-- begin panel -->'.
					 "\n" . '<div class="panel panel-inverse" data-sortable-id="index-1">'.
						 "\n" . '<div class="panel-heading">'.
							 "\n" . '<div class="panel-heading-btn">'.
								 "\n" . '<a class="btn btn-xs btn-icon btn-circle btn-success" data-click="reload"><i class="fa fa-redo"></i></a>'.
								 "\n" . '<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>'.
								 "\n" . '<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus" ></i></a>'.
							 "\n" . '</div>'.
							"\n" . '<h4 class="panel-title"><i class="fa fa-bullhorn"></i> Lịch sử nạp MoMo </h4>'.
						 "\n" . '</div>'.
						 "\n" . '<div class="panel-body height-full">'.
								 "\n" . ' <div class="table-responsive">'.
             "\n" . ' <table id="load_history_nap_momo" class="table table-striped table-bordered">'.
				"\n" . '</table>'.
				"\n" . '</div>'.


							
						 "\n" . '</div>'.
					 "\n" . '</div>'.
					 "\n" . '<!-- end panel -->'.
				 "\n" . '</div>'.
				 "\n" . '<!-- end col-8-->';
			 "\n" . '</div>'.
			 "\n" . '<!-- end row -->';
?>
<script type="text/javascript"> 
				
					
				
				 function reloadcard(){
				 	var type_card_name = $("#type_card_name").val();
           			var type_card_price= $("#type_card_price").val();
           			var type_card_seri= $("#type_card_seri").val();
           			var type_card_mathe= $("#type_card_mathe").val();
           			if (!type_card_seri || !type_card_mathe) {
		                showNotification('bg-red text-white', 'Vui Lòng Điền Đầy Đủ Thông Tin');
		                return;
          		 	}
          		 	$("#button_reloadcard").html('<button class="btn btn-warning" type="button" disabled><i class="fal fa-spinner fa-pulse"></i> Vui Lòng Chờ</button>');
          	 		$.ajax({
               			url     : '/Auth/Ajax/Load.html',
               			type    : 'POST',
               			dataType: 'JSON',
               			data    : {
                   			t       : 'reloadcard',
                   			type_card_name  : type_card_name,
                   			type_card_price : type_card_price,
                   			type_card_seri :type_card_seri,
                   			type_card_mathe :type_card_mathe
               			},
                	success: (data) => {
                    	if (data.error) {
                    		setTimeout(function(){
                    		$("#button_reloadcard").html('<button class="btn btn-danger" type="button" onclick="reloadcard()"><i class="fal fa-times-circle"></i> Làm lại</button>');
                        	showNotification('bg-red text-white', data.msg);
                        	},3000);
                    	} else {
                        	setTimeout(function(){
                        		$("#button_reloadcard").html('<button class="btn btn-success" type="button"><i class="fal fa-check-circle"></i> Thành Công</button>');
                        	showNotification('bg-green text-white', data.msg);
                        	},3000);
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
			<script type="text/javascript">
            function liftOff() { 
                $(this).remove();   
            } 
           
        </script>
<?php

require($rootPath . '/library/end.php');