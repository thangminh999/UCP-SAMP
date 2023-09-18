
<?php

define('MT_CMS', 1);
$fileDir = dirname(__FILE__);
require($fileDir . '/library/Autoloader.php');
$headmod = 'mainpage';
require($fileDir . '/library/head.php');

echo '<!-- Start Row-->'.
      '<div class="row">'.
        '<div class="col-lg-6">'.
          '<div class="card animated bounceInUp" style="height: 550px; overflow: hidden;">'.
            '<div class="card-body">'.
              '<h5 class="card-title">Tin tức mới</h5>';
				
            echo '</div>'.
          '</div>'.
        '</div>';
if(date("H", time() + 7 * 3600) == '0' ||
date("H", time() + 7 * 3600) == '1' ||
date("H", time() + 7 * 3600) == '2' ||
date("H", time() + 7 * 3600) == '3' ||
date("H", time() + 7 * 3600) == '4' ||
date("H", time() + 7 * 3600) == '5' ||
date("H", time() + 7 * 3600) == '6' ||
date("H", time() + 7 * 3600) == '7	' ){
$status = '<span class="badge badge-pill badge-danger m-1">Đóng cửa</span>';
}else{
$status = '<span class="badge badge-pill badge-success m-1">Đang mở</span>';
}
 echo '<div class="col-lg-6">'.
          '<div class="card animated bounceInUp" style="height: 600px; overflow: hidden;">'.
            '<div class="card-body">'.
             ' <h5 class="card-title">Thông Tin Job</h5>'.
			 '<div class="table-responsive">'.
               '<table class="table table-bordered">'.
                 ' <thead>'.
                    '<tr>'.
                     ' <th scope="col">Job</th>'.
                      '<th scope="col">Status</th>'.
                    '</tr>'.
                  '</thead>'.
                  '<tbody>'.
                    '<tr>'.
                      '<th scope="row">Pizza Boy (Giao Bánh)</th>'.
                      '<td>'.$status.'</td>'.
                   ' </tr>'.
                    '<tr>'.
                      '<th scope="row">Trucker (Giao Hàng Hóa)</th>'.
                      '<td><span class="badge badge-pill badge-success m-1">Đang mở</span></td>'.
                    '</tr>'.
					'<tr>'.
                      '<th scope="row">Garbage Collector (Vệ Sinh Môi Trường)</th>'.
                      '<td>'.$status.'</td>'.
                    '</tr>'.
					'<tr>'.
                      '<th scope="row">Carpenter (Vận Chuyển Gỗ)</th>'.
                      '<td><span class="badge badge-pill badge-success m-1">Đang mở</span></td>'.
                    '</tr>'.
					'<tr>'.
                      '<th scope="row">Farmer (Nông Dân)</th>'.
                      '<td>'.$status.'</td>'.
                    '</tr>'.
                    '<tr>'.
                      '<th scope="row">Service (Phục Vụ)</th>'.
                      '<td>'.$status.'</td>'.
                    '</tr>'.
                    '<tr>'.
                      '<th scope="row">Miner (Thợ Mỏ)</th>'.
                      '<td>'.$status.'</td>'.
                    '</tr>'.
                    '<tr>'.
                      '<th scope="row">Porter (Bốc Vác)</th>'.
                      '<td>'.$status.'</td>'.
                    '</tr>'.
				    
				
                  '</tbody>'.
                '</table>'.
			'</div>'.
           ' </div>'.
         ' </div>'.
        '</div>'.
      '</div><!--End Row-->';

require($fileDir . '/library/end.php');
?>