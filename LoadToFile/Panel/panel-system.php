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
$headmod = 'panel-system';
$textl = 'Panel: Cấu Hình';
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
				 "\n" . '<!-- begin col-6 -->'.
				 "\n" . '<div class="col-lg-6">'.
					 "\n" . '<!-- begin panel -->'.
					 "\n" . '<div class="panel panel-inverse" data-sortable-id="index-1">'.
						 "\n" . '<div class="panel-heading">'.
							 "\n" . '<div class="panel-heading-btn">'.
								 "\n" . '<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>'.
								 "\n" . '<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus" ></i></a>'.
							 "\n" . '</div>'.
							"\n" . '<h4 class="panel-title"><i class="fa fa-bullhorn"></i> Cấu hình hệ thống</h4>'.
						 "\n" . '</div>'.
						 "\n" . '<div class="panel-body height-full">'.
							 "\n" . '<form class="form-horizontal form-bordered" id ="savesystem">'.
								 "\n" . '<div class="form-group row">'.
									 "\n" . '<label class="col-md-4 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tiêu đề (Title)</font></font></label>'.
									 "\n" . '<div class="col-md-8">'.
                                         "\n" . '<div class="input-group date" id="datetimepicker1">'.
                                             "\n" . '<input type="text" class="form-control" id="title" value="'.$system['title'].'">'.
                                             "\n" . '<div class="input-group-addon">'.
                                                "\n" . ' <i class="fal fa-comment-dots"></i>'.
                                             "\n" . '</div>'.
                                         "\n" . '</div>'.
									 "\n" . '</div>'.
								 "\n" . '</div>'.
								"\n" . '<div class="form-group row">'.
									 "\n" . '<label class="col-md-4 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">URL UCP</font></font></label>'.
									 "\n" . '<div class="col-md-8">'.
                                         "\n" . '<div class="input-group date" id="datetimepicker1">'.
                                             "\n" . '<input type="text" class="form-control" id="url" value="'.$system['url'].'">'.
                                             "\n" . '<div class="input-group-addon">'.
                                                "\n" . ' <i class="fal fa-link"></i>'.
                                             "\n" . '</div>'.
                                         "\n" . '</div>'.
									 "\n" . '</div>'.
								 "\n" . '</div>'.
								 "\n" . '<div class="form-group row">'.
									 "\n" . '<label class="col-md-4 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">URL Forum</font></font></label>'.
									 "\n" . '<div class="col-md-8">'.
                                         "\n" . '<div class="input-group date" id="datetimepicker1">'.
                                             "\n" . '<input type="text" class="form-control" id="url_forum" value="'.$system['url_forum'].'">'.
                                             "\n" . '<div class="input-group-addon">'.
                                                "\n" . ' <i class="fal fa-link"></i>'.
                                             "\n" . '</div>'.
                                         "\n" . '</div>'.
									 "\n" . '</div>'.
								 "\n" . '</div>'.
								 "\n" . '<div class="form-group row">'.
									 "\n" . '<label class="col-md-4 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Logo IMG (đường dẫn)</font></font></label>'.
									 "\n" . '<div class="col-md-8">'.
                                         "\n" . '<div class="input-group date" id="datetimepicker1">'.
                                             "\n" . '<input type="text" class="form-control" id="logo_img" value="'.$system['logo_img'].'">'.
                                             "\n" . '<div class="input-group-addon">'.
                                                "\n" . ' <i class="fal fa-images" data-toggle="tooltip" data-html="true" title="<img src=\''.$system['logo_img'].'\' width=\'120\'>""></i>'.
                                             "\n" . '</div>'.
                                         "\n" . '</div>'.
									 "\n" . '</div>'.
								 "\n" . '</div>'.
								 "\n" . '<div class="form-group row">'.
									 "\n" . '<label class="col-md-4 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Logo Text</font></font></label>'.
									 "\n" . '<div class="col-md-8">'.
                                         "\n" . '<div class="input-group date" id="datetimepicker1">'.
                                             "\n" . '<input type="text" class="form-control" id="logo_text" value="'.$system['logo_text'].'">'.
                                             "\n" . '<div class="input-group-addon">'.
                                                "\n" . ' <i class="fal fa-font" data-toggle="tooltip" data-html="true" title="'.$system['logo_text'].'"></i>'.
                                             "\n" . '</div>'.
                                         "\n" . '</div>'.
									 "\n" . '</div>'.
								 "\n" . '</div>'.
								 "\n" . '<div class="form-group row">'.
									 "\n" . '<label class="col-md-4 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Copyright</font></font></label>'.
									 "\n" . '<div class="col-md-8">'.
                                         "\n" . '<div class="input-group date" id="datetimepicker1">'.
                                             "\n" . '<input type="text" class="form-control" id="copyright" value="'.$system['copyright'].'">'.
                                             "\n" . '<div class="input-group-addon">'.
                                                "\n" . ' <i class="fal fa-font" data-toggle="tooltip" data-html="true" title="'.$system['copyright'].'"></i>'.
                                             "\n" . '</div>'.
                                         "\n" . '</div>'.
									 "\n" . '</div>'.
								 "\n" . '</div>'.
								 "\n" . '<div class="form-group row">'.
									 "\n" . '<label class="col-md-4 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Keyword</font></font></label>'.
									 "\n" . '<div class="col-md-8">'.
                                         "\n" . '<div class="input-group date" id="datetimepicker1">'.
                                             "\n" . '<textarea rows="3" type="text" class="form-control" id="keywords">'.$system['keywords'].'</textarea>'.
                                             "\n" . '<div class="input-group-addon">'.
                                                "\n" . ' <i class="fal fa-font" data-toggle="tooltip" data-html="true" title="'.$system['keywords'].'"></i>'.
                                             "\n" . '</div>'.
                                         "\n" . '</div>'.
									 "\n" . '</div>'.
								 "\n" . '</div>'.
								 "\n" . '<div class="form-group row">'.
									 "\n" . '<label class="col-md-4 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Description</font></font></label>'.
									 "\n" . '<div class="col-md-8">'.
                                         "\n" . '<div class="input-group date" id="datetimepicker1">'.
                                             "\n" . '<textarea rows="3" type="text" class="form-control" id="description">'.$system['description'].'</textarea>'.
                                             "\n" . '<div class="input-group-addon">'.
                                                "\n" . ' <i class="fal fa-font" data-toggle="tooltip" data-html="true" title="'.$system['description'].'"></i>'.
                                             "\n" . '</div>'.
                                         "\n" . '</div>'.
									 "\n" . '</div>'.
								 "\n" . '</div>'.
								 
								 "\n" . '<div class="form-group row">'.
									 "\n" . '<label class="col-md-4 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Button</font></font></label>'.
									 "\n" . '<div class="col-md-8">'.
                                         "\n" . '<div class="col-md-7 offset-md-3" id ="buttonsystem">'.
                                            "\n" . '<button type="button" class="btn btn-sm btn-primary m-r-5" onclick="savesystem()">Lưu Lại</button>'.
                                       "\n" . ' </div>'.
									 "\n" . '</div>'.

								 "\n" . '</div>'.

							"\n" . '</form>'.
						 "\n" . '</div>'.
					 "\n" . '</div>'.
					 "\n" . '<!-- end panel -->'.
				 "\n" . '</div>'.
				 "\n" . '<!-- end col-6 -->';
			 ?>
<script type="text/javascript">
	function savesystem(){
		var title = $("#title").val();
        var url= $("#url").val();
        var url_forum= $("#url_forum").val();
        var logo_img= $("#logo_img").val();
        var logo_text= $("#logo_text").val();
        var copyright= $("#copyright").val();
		var keywords= $("#keywords").val();
		var description= $("#description").val();
       if (!title) {
		    showNotification('bg-red text-white', 'Tiêu đề không được bỏ trống');
		     return;
        }else if (!url) {
		    showNotification('bg-red text-white', 'URL Website không được bỏ trống');
		     return;
        }else if (!url_forum) {
		    showNotification('bg-red text-white', 'URL Forum không được bỏ trống');
		     return;
        }else if (!logo_img) {
		    showNotification('bg-red text-white', 'URL Logo không được bỏ trống');
		     return;
        }else if (!logo_text) {
		    showNotification('bg-red text-white', 'Logo Text không được bỏ trống');
		     return;
        }else if (!copyright) {
		    showNotification('bg-red text-white', 'Copyright không được bỏ trống');
		     return;
        }
		$("#buttonsystem").html('<button class="btn btn-warning" type="button" disabled><i class="fal fa-spinner fa-pulse"></i> Vui Lòng Chờ</button>');
		$.ajax({
               			url     : '/Auth/Ajax/Load.html',
               			type    : 'POST',
               			dataType: 'JSON',
               			data    : {
                   			t       : 'system',
                   			title  : title,
                   			url : url,
                   			url_forum :url_forum,
                   			logo_img :logo_img,
                   			logo_text :logo_text,
                   			copyright :copyright,
                   			keywords :keywords,
                   			description :description
               			},
                	success: (data) => {
                    	if (data.error) {
                    		setTimeout(function(){
                    		$("#buttonsystem").html('<button class="btn btn-danger" type="button" onclick="savesystem()"><i class="fal fa-times-circle"></i> Làm lại</button>');
                        	showNotification('bg-red text-white', data.msg);
                        	},3000);
                    	} else {
                        	setTimeout(function(){
                        		$("#buttonsystem").html('<button class="btn btn-success" type="button"><i class="fal fa-check-circle"></i> Thành Công</button>');
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
			 <?php
				 echo "\n" . '<!-- begin col-6 -->'.
				 "\n" . '<div class="col-lg-6">'.
					 "\n" . '<!-- begin panel -->'.
					 "\n" . '<div class="panel panel-inverse" data-sortable-id="index-6">'.
						 "\n" . '<div class="panel-heading">'.
							 "\n" . '<div class="panel-heading-btn">'.
								 "\n" . '<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>'.
								 "\n" . '<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>'.
							 "\n" . '</div>'.
							 "\n" . '<h4 class="panel-title">Cấu hình mailer</h4>'.
						 "\n" . '</div>'.
						 "\n" . '<div class="panel-body">'.
							 "\n" . '<form class="form-horizontal form-bordered" id ="save-mailer">'.
								 "\n" . '<div class="form-group row">'.
									 "\n" . '<label class="col-md-4 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Email</font></font></label>'.
									 "\n" . '<div class="col-md-8">'.
                                         "\n" . '<div class="input-group date" id="datetimepicker1">'.
                                             "\n" . '<input type="text" class="form-control" id="Mailer" value="'.$system['Mailer'].'">'.
                                             "\n" . '<div class="input-group-addon">'.
                                                "\n" . ' <i class="fal fa-envelope" data-toggle="tooltip" data-html="true" title="<b>Email của mailer</b>"></i>'.
                                             "\n" . '</div>'.
                                         "\n" . '</div>'.
									 "\n" . '</div>'.
								 "\n" . '</div>'.
								"\n" . '<div class="form-group row">'.
									 "\n" . '<label class="col-md-4 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Password Mailer</font></font></label>'.
									 "\n" . '<div class="col-md-8">'.
                                         "\n" . '<div class="input-group date" id="datetimepicker1">'.
                                             "\n" . '<input type="text" class="form-control" id="Password" value="'.$system['Password'].'">'.
                                             "\n" . '<div class="input-group-addon">'.
                                                "\n" . ' <i class="fal fa-key"  data-toggle="tooltip" data-html="true" title="<b>Mật khẩu của mailer</b>"></i>'.
                                             "\n" . '</div>'.
                                         "\n" . '</div>'.
									 "\n" . '</div>'.
								 "\n" . '</div>'.
								 "\n" . '<div class="form-group row">'.
									 "\n" . '<label class="col-md-4 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">SMTP</font></font></label>'.
									 "\n" . '<div class="col-md-8">'.
                                         "\n" . '<div class="input-group date" id="datetimepicker1">'.
                                             "\n" . '<input type="text" class="form-control" id="SMTP" value="'.$system['SMTP'].'">'.
                                             "\n" . '<div class="input-group-addon">'.
                                                "\n" . ' <i class="fal fa-link" data-toggle="tooltip" data-html="true" title="<b>SMTP của mailer</b>"></i>'.
                                             "\n" . '</div>'.
                                         "\n" . '</div>'.
									 "\n" . '</div>'.
								 "\n" . '</div>'.
								 "\n" . '<div class="form-group row">'.
									 "\n" . '<label class="col-md-4 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cổng (Port)</font></font></label>'.
									 "\n" . '<div class="col-md-8">'.
                                         "\n" . '<div class="input-group date" id="datetimepicker1">'.
                                             "\n" . '<input type="text" class="form-control" id="Port" value="'.$system['Port'].'">'.
                                             "\n" . '<div class="input-group-addon">'.
                                                "\n" . ' <i class="fal fa-lock-alt" data-toggle="tooltip" data-html="true" title="<b>Cổng Port Connect Mailer"></i>'.
                                             "\n" . '</div>'.
                                         "\n" . '</div>'.
									 "\n" . '</div>'.
								 "\n" . '</div>'.
								
								 
								 "\n" . '<div class="form-group row">'.
									 "\n" . '<label class="col-md-4 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Button</font></font></label>'.
									 "\n" . '<div class="col-md-8">'.
                                         "\n" . '<div class="col-md-7 offset-md-3" id="savemailer">'.
                                            "\n" . '<button type="button" class="btn btn-sm btn-primary m-r-5" onclick="savemailer()">Lưu Lại</button>'.
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
	function savemailer(){
		var Mailer = $("#Mailer").val();
        var Password= $("#Password").val();
        var SMTP= $("#SMTP").val();
        var Port= $("#Port").val();
         if (!Mailer) {
		    showNotification('bg-red text-white', 'Mailer không được bỏ trống');
		     return;
        }else if (!Password) {
		    showNotification('bg-red text-white', 'Password không được bỏ trống');
		     return;
        }else if (!SMTP) {
		    showNotification('bg-red text-white', 'SMTP không được bỏ trống');
		     return;
        }else if (!Port) {
		    showNotification('bg-red text-white', 'Port không được bỏ trống');
		     return;
        }
        $("#savemailer").html('<button class="btn btn-warning" type="button" disabled><i class="fal fa-spinner fa-pulse"></i> Vui Lòng Chờ</button>');
		$.ajax({
               			url     : '/Auth/Ajax/Load.html',
               			type    : 'POST',
               			dataType: 'JSON',
               			data    : {
                   			t       : 'savemailer',
                   			Mailer  : Mailer,
                   			Password : Password,
                   			SMTP :SMTP,
                   			Port :Port
               			},
                	success: (data) => {
                    	if (data.error) {
                    		setTimeout(function(){
                    		$("#savemailer").html('<button class="btn btn-danger" type="button" onclick="savemailer()"><i class="fal fa-times-circle"></i> Làm lại</button>');
                        	showNotification('bg-red text-white', data.msg);
                        	},3000);
                    	} else {
                        	setTimeout(function(){
                        		$("#savemailer").html('<button class="btn btn-success" type="button"><i class="fal fa-check-circle"></i> Thành Công</button>');
                        	showNotification('bg-green text-white', data.msg);
                        	},3000);
                        	
                    }
                }
            })
	}

</script>
<?php
require($rootPath . '/library/end.php');
