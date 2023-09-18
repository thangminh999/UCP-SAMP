<?php

defined('MT_CMS') or die('Lỗi: Truy Cập Hệ Thống');
echo '<!-- begin report -->
        <div class="theme-panel">
            <a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-exclamation"></i></a>
            <div class="theme-panel-content">
                <h5 class="m-t-0">Báo Lỗi Webstie</h5>
                <textarea class="form-control m-b-10" id="clipboard-textarea" rows="7">Chức năng đang xây dựng</textarea>
                <div class="divider"></div>
            </div>
        </div>
        <!-- end report -->';
echo 	"\n". '<div id="page-container" class="footer text-center m-0">'.
		 "\n". ' <a href="' . $system['url_discord'] . '"><span> Discord</span></a> - '.
		 "\n". ' <a href="' . $system['facebook_page'] . '"><span> Facebook Page</span></a> - '.
		  "\n". '<a href="' . $system['zalo_group'] . '"><span> Zalo Group</span></a> <br>'.
		 "\n". ' ' . $system['copyright'] . '<br>'.
    	 "\n". '</div>';
echo '</div>'.
		"\n" . '</div>'.
		"\n" . '<!-- end #content -->'.
	    "\n" . '<!-- ================== BEGIN BASE JS ================== -->'.
	    "\n" . '<script src="' . $system['url'] . '/assets/plugins/jquery/jquery-3.2.1.min.js"></script>'.
	    "\n" . '<script src="' . $system['url'] . '/assets/plugins/jquery-ui/jquery-ui.min.js"></script>'.
	    "\n" . '<script src="' . $system['url'] . '/assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>'.
	    "\n" . '<script src="' . $system['url'] . '/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>'.
	    "\n" . '<script src="' . $system['url'] . '/assets/plugins/js-cookie/js.cookie.js"></script>'.
	    "\n" . '<script src="' . $system['url'] . '/assets/js/theme/transparent.js"></script>'.
	    "\n" . '<script src="' . $system['url'] . '/assets/js/apps.js"></script>'.
	    "\n" . '<script src="' . $system['url'] . '/js.php"></script>'.
	    "\n" . '<script src="' . $system['url'] . '/jss.php?js=default"></script>'.
	    "\n" . '<script src="' . $system['url'] . '/assets/plugins/notifications/js/bootstrap-notify.js"></script>'.
	    "\n" . '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.0.1/dist/sweetalert2.all.min.js"></script>'.
	    "\n" . '<script src="' . $system['url'] . '/assets/js/demo/ui-modal-notification.demo.min.js"></script>	'.
	    "\n" . '<script src="' . $system['url'] . '/assets/plugins/jquery.countdown.mysql/jquery.countdown.js"></script>'.	        
	    "\n" . '<script src="' . $system['url'] . '/assets/plugins/switchery/switchery.min.js"></script>'.
	    "\n" . '<script src="' . $system['url'] . '/assets/js/demo/form-slider-switcher.demo.js"></script>	'.		
	    "\n" . '<!-- ================== END BASE JS ================== -->'.
	    "\n" . '<!-- ================== BEGIN PAGE LEVEL JS ================== -->';

	echo "\n" . '<script src="' . $system['url'] . '/assets/plugins/DataTables/datatables.min.js"></script>'.
	 "\n" . '<script src="' . $system['url'] . '/assets/plugins/DataTables/dataTables.altEditor.free.js"></script>'.
	"\n" . '<script src="' . $system['url'] . '/assets/js/demo/table-manage-default.demo.min.js"></script>';
			if($headmod == 'shop-skin'){
				echo "\n" . '<script src="' . $system['url'] . '/jss.php?js=shop-skin"></script>';		
			}elseif($headmod == 'shop-oder'){
				echo "\n" . '<script src="' . $system['url'] . '/jss.php?js=shop-item"></script>';		
			}elseif($headmod == 'shop-vip'){
				echo "\n" . '<script src="' . $system['url'] . '/jss.php?js=shop-vip"></script>';		
			}elseif($headmod == 'shop-cars'){
				echo "\n" . '<script src="' . $system['url'] . '/jss.php?js=shop-cars"></script>';		
			}elseif($headmod == 'shop-toys'){
				echo "\n" . '<script src="' . $system['url'] . '/jss.php?js=shop-toys"></script>';		
			}elseif($headmod == 'shop-skin-gun'){
				echo "\n" . '<script src="' . $system['url'] . '/jss.php?js=shop-skin-gun"></script>';		
			}
			if($headmod == 'profile_change'){
	echo "\n" . '<script src="' . $system['url'] . '/assets/plugins/bootstrap-show-password/bootstrap-show-password.js"></script>';				
			}
	    echo "\n" . '<!-- ================== END PAGE LEVEL JS ================== -->';
echo"\n" . '<script>'.
		"\n" . ' $(document).ready(function() {';
		
		if($headmod == 'bxh_level'){
			echo "\n" . ' load_top_level();';
		}elseif($headmod == 'bxh_money'){
			echo "\n" . ' load_top_money();';
		}elseif($headmod == 'bxh_credits'){
			echo "\n" . ' load_top_credits();';
		}elseif($headmod == 'bxh_online'){
			echo "\n" . ' load_top_online();';
		}elseif($headmod == 'bxh_danhvong'){
			echo "\n" . ' load_top_fame();';
		}elseif($headmod == 'ds-banned'){
			echo "\n" . ' load_ds_vipham();';	
		}elseif($headmod == 'ds-faction'){
		echo "\n" . '$("#ds_faction").DataTable({responsive: true,});';	
		}elseif($headmod == 'ds-family'){
		echo "\n" . '$("#ds_family").DataTable({responsive: true,});';	
		}
		if($user_id){
			if($headmod == 'napthe'){
				 echo "\n" . 'load_history_nap_the();';	
			}
			 if($headmod == 'napmomo'){
				 echo "\n" . 'load_history_nap_momo();';	
			}
			if($datauser['Panel'] == 1){
				if($headmod == 'panel-reload'){
					echo "\n" . ' panel_list_reload();';	
				}
				if($headmod == 'panel-change-name'){
					echo "\n" . ' panel_list_changename();';	
				}
				if($headmod == 'panel-member'){
					echo "\n" . ' panel_list_member();';	
				}
				if($headmod == 'panel-toys'){
				echo "\n" . ' panel_shop_toys();';
				}	
				if($headmod == 'panel-list-momo'){
				echo "\n" . ' panel_list_nap_momo();';
				echo "\n" . ' panel_list_nap_momo_2();';
				echo "\n" . ' panel_list_nap_momo_3();';
				}if($headmod == 'panel-list-ipbans'){
				echo "\n" . ' panel_list_ipbans();';
				}					
			}
		}
		echo "\n" . ' });'.
		
	"\n" . '$(document).on(\'hover\', \'[data-click=reload]\', function(e) {'.
        "\n" . 'if (!$(this).attr(\'data-init\')) {'.
            "\n" . '$(this).tooltip({'.
            "\n" . '    title: \'Reload\','.
            "\n" . '    placement: \'bottom\','.
            "\n" . '    trigger: \'hover\','.
            "\n" . '    container: \'body\''.
            "\n" . '});'.
            "\n" . '$(this).tooltip(\'show\');'.
            "\n" . '$(this).attr(\'data-init\', true);'.
        "\n" . '}'.
   "\n" . ' });'.
    "\n" . '$(document).on(\'click\', \'[data-click=reload]\', function(e) {'.
       "\n" . ' e.preventDefault();'.
       "\n" . ' var target = $(this).closest(\'.panel\');'.
        "\n" . 'if (!$(target).hasClass(\'panel-loading\')) {'.
            "\n" . 'var targetBody = $(target).find(\'.panel-body\');'.
            "\n" . 'var spinnerHtml = \'<div class="panel-loader"><span class="spinner-small"></span></div>\';'.
            "\n" . '$(target).addClass(\'panel-loading\');'.
            "\n" . '$(targetBody).prepend(spinnerHtml);'.
            "\n" . 'setTimeout(function() {'.
                "\n" . '$(target).removeClass(\'panel-loading\');'.
                "\n" . '$(target).find(\'.panel-loader\').remove();';
               if($headmod == 'bxh_level'){
			echo "\n" . ' load_top_level();';
		}elseif($headmod == 'bxh_money'){
			echo "\n" . ' load_top_money();';
		}elseif($headmod == 'bxh_credits'){
			echo "\n" . ' load_top_credits();';
		}elseif($headmod == 'bxh_online'){
			echo "\n" . ' load_top_online();';
		}elseif($headmod == 'bxh_danhvong'){
			echo "\n" . ' load_top_fame();';
		}elseif($headmod == 'panel-toys'){
			echo "\n" . ' panel_shop_toys();';
		}elseif($headmod == 'panel-list-momo'){
			echo "\n" . ' panel_list_nap_momo();';
			echo "\n" . ' panel_list_nap_momo_2();';
			echo "\n" . ' panel_list_nap_momo_3();';
		}elseif($headmod == 'napthe'){
			 echo "\n" . 'load_history_nap_the();';
		} elseif($headmod == 'napmomo'){
			 echo "\n" . 'load_history_nap_momo();';
		}
				
            echo "\n" . '}, 2000);'.
        "\n" . '}'.
    "\n" . '});'.
		
		"\n" . '</script>'.
"\n" . '</body>'.
"\n" . '</html>';
ob_flush();
?>