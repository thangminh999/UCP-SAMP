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
$headmod = 'shop-vip';
$textl = 'Shop VIP';
require($rootPath . '/library/head.php');

echo "\n" . '<div class="row">';
$query = mysqli_query($connect,"SELECT * FROM `mt_cms_shop_vip` WHERE `VIP_Active` = '1' ORDER BY  `VIP_DonateRank` ASC");
		while ( $data = mysqli_fetch_array($query) ) {	
			if($data['VIP_DonateRank'] == 2){
				$color ='siliver';
			}elseif ($data['VIP_DonateRank'] == 3){
				$color ='gold';
			}elseif ($data['VIP_DonateRank'] == 4){
				$color ='pentium';
			}else{
				$color ='';
			}
           echo  "\n" . '<div class="col-md-4 col-sm-6">'.
              	  "\n" . '<div class="pricingTable '.$color.'">'.
                    "\n" . '<div class="pricingTable-header">'.
                        "\n" . '<h3 class="title">'.$data['VIP_Name'].'</h3>'.
                        "\n" . '<div class="price-value">'.number_format($data['VIP_Price']).' Credits/Month</div>'.
                    "\n" . '</div>'.
                    "\n" . '<a href="#dentai-'.$data['VIP_DonateRank'].'" class="pricingTable-detail m-b-10 m-t-20" data-toggle="modal">Chi tiết</a>	'.
                    "\n" . '<a class="pricingTable-signup" data-click="buyvip" data-id="'.$data['id'].'" data-rank="'.$data['VIP_DonateRank'].'" data-user="'.$datauser['Username'].'" data-name="'.$data['VIP_Name'].'">Mua Ngay</a>'.
                "\n" . '</div>'.
            "\n" . '</div>';
            echo "\n" . '<!-- #dentai-'.$data['VIP_DonateRank'].' -->'.
							"\n" . '<div class="modal fade" id="dentai-'.$data['VIP_DonateRank'].'">'.
								"\n" . '<div class="modal-dialog">'.
									"\n" . '<div class="modal-content">'.
										"\n" . '<div class="modal-header">'.
										   "\n" . '<h4 class="modal-title">Chi Tiết '.$data['VIP_Name'].'</h4>'.
											
										"\n" . '</div>'.
										"\n" . '<div class="modal-body">'.
											"\n" . ''.$data['VIP_Info'].''.
										"\n" . '</div>'.
										"\n" . '<div class="modal-footer">'.
											"\n" . '<a class="btn btn-white" data-dismiss="modal">Close</a>'.
										"\n" . '</div>'.
									"\n" . '</div>'.
								"\n" . '</div>'.
							"\n" . '</div>';
        }
        echo "\n" . '</div>';
require($rootPath . '/library/end.php');