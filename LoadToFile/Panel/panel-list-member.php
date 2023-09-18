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
$headmod = 'panel-member';
$textl = 'Panel: Danh Sách Member';
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

echo "\n" . '<!-- begin panel -->'.
			"\n" . '<div class="panel panel-inverse">'.
				"\n" . '<!-- begin panel-heading -->'.
				"\n" . '<div class="panel-heading">'.
					"\n" . '<div class="panel-heading-btn">'.
								"\n" . '<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>'.
								"\n" . '<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>'.
							"\n" . '</div>'.
					"\n" . '<h4 class="panel-title">Danh Sách Member</h4>'.
				"\n" . '</div>'.
				"\n" . '<!-- end panel-heading -->'.
				"\n" . '<!-- begin panel-body -->'.
				"\n" . '<div class="panel-body">'.
					"\n" . ' <div class="table-responsive">'.
             "\n" . ' <table id="panel_list_member" class="table table-bordered">'.
				"\n" . '</table>'.
            
			"\n" . '</div>'.
				"\n" . '</div>'.
				"\n" . '<!-- end panel-body -->'.
			"\n" . '</div>'.
			"\n" . '<!-- end panel -->';

						
require($rootPath . '/library/end.php');

?>