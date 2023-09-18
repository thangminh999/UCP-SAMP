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
$headmod = 'shop-skin';
$textl = 'Shop Skin Custom';
require($rootPath . '/library/head.php');

echo "\n" . '<div class="rowaa">';
echo  "\n" . '<div class="card-deck justify-content-md-center">';
  $query = mysqli_query($connect,"SELECT * FROM `mt_cms_shop_skin` WHERE `Skin_Active` = '1' ORDER BY  `Skin_Price` ASC");
  $i = 1;
  while ( $data = mysqli_fetch_array($query) ) {

        echo"\n" . '<!-- begin col-12 col-sm-4 col-md-4 p-10 -->'.
      "\n" . '<div class="col-12 col-sm-4 col-md-4 p-10">'.
        "\n" . '<!-- begin card -->'.
          "\n" . '<div class="card">'.
            "\n" . '<div class="card-header text-center">'.
               "\n" . '<h4>#'.$i++.':   '.$data['Skin_Name'].'</h4>'.
                "\n" . '</div>'.
              "\n" . '<img class="card-img" src="'.$system['url'].'/Auth/Picture/Skin-'.$data['Skin_ID'].'" alt="'.$data['Skin_Name'].'"  height="300" />'.
                "\n" . '<div class="card-body">'.
              "\n" . '<h4 class="card-title text-center">Thông Tin</h4><hr>'.
              "\n".'<div class="row card-text-cars">'.
        "\n".'<div class="col-4 col-sm-4 col-md-4">'.
              "\n".'<dl class="border-right">'.
 "\n".'<dt class="text-left">Số Lượng</dt>'  .
 "\n".'<dd class="text-center">1</dd><hr>'.
"\n".'</dl>'.
"\n".'<span class="border-right-0"></span>'.
        "\n" . '</div>'.
        "\n".'<div class="col-4 col-sm-4 col-md-4">'.
              "\n".'<dl>'.
  "\n".'<dt class="text-center">Name</dt>'.
  "\n".'<dd class="text-center">'.substr($data['Skin_Name'],'0','7').'...</dd><hr>'.
"\n".'</dl>'.
        "\n" . '</div>'.
        "\n".'<div class="col-4 col-sm-4 col-md-4">'.
              "\n".'<dl class="border-left">'.
  "\n".'<dt class="text-center">Price</dt>'.
  "\n".'<dd class="text-center">'.number_format($data['Skin_Price']).' $</dd><hr>'.
"\n".'</dl>'.
        "\n" . '</div>'.
        "\n".'<a class="btn btn-primary btn-block m-b-5" data-click="buyskin" data-id="'.$data['id'].'" data-user="'.$datauser['Username'].'" data-id-skin="'.$data['Skin_ID'].'" data-name-skin="'.$data['Skin_Name'].'">Mua Skin</a>'.
              "\n" . '</div>'.
              "\n" . '</div>'.
              "\n" . '<div class="card-footer text-center f-s-11">'.$system['copyright'].'</div>'.
            "\n" . '</div>'.
          "\n" . '<!-- end card -->'.
        "\n" . '</div>'.
      "\n" . '<!-- col-12 col-sm-4 col-md-4 p-10 -->';
  }
echo"\n" . '</div>'.
        "\n" . '<!-- end card-deck -->'.
         "\n" . '</div>';

require($rootPath . '/library/end.php');