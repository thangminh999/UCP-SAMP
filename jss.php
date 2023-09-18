<?php

define('MT_CMS', 1);
$fileDir = dirname(__FILE__);
require($fileDir . '/library/Autoloader.php');
		header('Content-type: text/javascript; charset=utf-8');
		header('Expires: Wed, 01 Jan 2020 00:00:00 GMT');
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s').'');
		header('Cache-Control: public');
	if($js == 'default'){
				echo"\n" . '$(document).ready(function() {'.
				"\n" . '	COLOR_BLACK_TRANSPARENT_2 = "rgba(255,255,255,0.15)";'.
				"\n" . '	COLOR_WHITE = "#333";'.
				"\n" . '	Notification.init();'.
				"\n" . '	FormSliderSwitcher.init();'.
				"\n" . '	App.init();'.
				"\n" . '$(".countdown").each(function(index){'.
                "\n". 'var sec = $(this).attr("id");'.
                "\n". '$(this).countdown({until: +sec,timezone: +7, layout: "HMS",layout: "{mnn} Phút {snn} Giây",expiryText:"--:--:--" });'.
                "\n". '$});'.
				"\n" . '});'.
				"\n" . 'function refreshCaptcha(){'.
				"\n" . 'var img = document.images["captchaimg"];'.
				"\n" . 'img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;'.
				"\n" . '}';
	}elseif($js == 'shop-skin'){		
	echo"\n" . '$(\'[data-click="buyskin"]\').click(function(e) {'.
        "\n" . 'var id = $(this).data(\'id\');'.
        "\n" . 'user = $(this).data(\'user\');'.
        "\n" . 'name = $(this).data(\'name-skin\');'.
        "\n" . 'idskin = $(this).data(\'id-skin\');'.
		 "\n" . 'Swal.mixin({'.
			"\n" . 'confirmButtonText: \'Tiếp tục &rarr;\','.
			"\n" . 'showCancelButton: true,'.
			"\n" . 'imageUrl: \'/Auth/Picture/Skin-\'+idskin,'.
			"\n" . 'imageWidth: 400,'.
			"\n" . 'imageHeight: 200,'.
			"\n" . 'imageAlt: \'Custom image\','.
			"\n" . 'progressSteps: [\'1\', \'2\']'.
		"\n" . '}).queue(['.
			"\n" . '{'.
				"\n" . 'title: \'Xác Nhận Mua: \'+name,'.
				"\n" . 'text: \'Nếu đồng ý mua vui lòng Tiếp Tục\''.
			"\n" . '},'.
			"\n" . '{'.
				"\n" . 'title: \'Xác Nhận\','.
				"\n" . 'text: \'Bạn có chắc muốn mua vật phẩm này\''.
			"\n" . '},'.
		"\n" . ']).then((result) => {'.
			"\n" . 'if (result.value) {'.
				"\n" . 'Swal.fire({'.
					"\n" . 'title: \'Đang Mua Hàng\','.
					"\n" . 'html: \'Vui lòng chờ <strong></strong> seconds.\','.
					"\n" . 'timer: 5000,'.
					"\n" . 'onBeforeOpen: () => {'.
						"\n" . 'Swal.showLoading()'.
							"\n" . 'timerInterval = setInterval(() => {'.
							"\n" . 'Swal.getContent().querySelector(\'strong\')'.
        					"\n" . '.textContent = (Swal.getTimerLeft() / 1000)'.
							"\n" . '.toFixed(0)'.
						"\n" . '}, 100)'.
					"\n" . '},'.
					"\n" . 'onClose: () => {'.
						"\n" . 'clearInterval(timerInterval)'.
					"\n" . '}'.
				"\n" . '}).then((result) => {'.
					"\n" . 'if ('.
						"\n" . 'result.dismiss === Swal.DismissReason.timer'.
						"\n" . '){'.
						"\n" . 'buy_shop_skin(id,user,name,idskin);'.
						"\n" . '}'.
				"\n" . '})'.
			"\n" . '}'.
		"\n" . '})'.
    "\n" . '});'.
	"\n" . 'function buy_shop_skin(id,user,name,idskin){'.
		"\n" . '$.ajax({'.
               	"\n" . 'url     : \'/Auth/Ajax/Load.html\','.
               	"\n" . 'type    : \'POST\','.
               	"\n" . 'dataType: \'JSON\','.
               	"\n" . 'data    : {'.
							"\n" . 't       : \'buy-shop-skin\','.
                   			"\n" . 'id  : id,'.
                   			"\n" . 'user : user,'.
                   			"\n" . 'name :name,'.
                   			"\n" . 'idskin :idskin'.
							"\n" . '},'.
                "\n" . 'success: (data) => {'.
                   "\n" . ' if (data.error) {'.
                        	"\n" . 'showNotification(\'bg-red text-white\', data.msg);   '.                 	
                    "\n" . '} else {'.
                        	"\n" . 'showNotification(\'bg-green text-white\', data.msg); '.  
                    "\n" . '}'.
               "\n" . ' }'.
       "\n" . ' })'.
    "\n" . '}';
	
}elseif($js == 'shop-skin-gun'){		
	echo"\n" . '$(\'[data-click="buyskingun"]\').click(function(e) {'.
        "\n" . 'var id = $(this).data(\'id\');'.
        "\n" . 'user = $(this).data(\'user\');'.
        "\n" . 'name = $(this).data(\'name-skin\');'.
        "\n" . 'img = $(this).data(\'img\');'.
		 "\n" . 'Swal.mixin({'.
			"\n" . 'confirmButtonText: \'Tiếp tục &rarr;\','.
			"\n" . 'showCancelButton: true,'.
			"\n" . 'imageUrl: \'/Auth/Picture/SkinGun-\'+img,'.
			"\n" . 'imageWidth: 400,'.
			"\n" . 'imageHeight: 200,'.
			"\n" . 'imageAlt: \'Custom image\','.
			"\n" . 'progressSteps: [\'1\', \'2\']'.
		"\n" . '}).queue(['.
			"\n" . '{'.
				"\n" . 'title: \'Xác Nhận Mua: \'+name,'.
				"\n" . 'text: \'Nếu đồng ý mua vui lòng Tiếp Tục\''.
			"\n" . '},'.
			"\n" . '{'.
				"\n" . 'title: \'Xác Nhận\','.
				"\n" . 'text: \'Bạn có chắc muốn mua vật phẩm này\''.
			"\n" . '},'.
		"\n" . ']).then((result) => {'.
			"\n" . 'if (result.value) {'.
				"\n" . 'Swal.fire({'.
					"\n" . 'title: \'Đang Mua Hàng\','.
					"\n" . 'html: \'Vui lòng chờ <strong></strong> seconds.\','.
					"\n" . 'timer: 5000,'.
					"\n" . 'onBeforeOpen: () => {'.
						"\n" . 'Swal.showLoading()'.
							"\n" . 'timerInterval = setInterval(() => {'.
							"\n" . 'Swal.getContent().querySelector(\'strong\')'.
        					"\n" . '.textContent = (Swal.getTimerLeft() / 1000)'.
							"\n" . '.toFixed(0)'.
						"\n" . '}, 100)'.
					"\n" . '},'.
					"\n" . 'onClose: () => {'.
						"\n" . 'clearInterval(timerInterval)'.
					"\n" . '}'.
				"\n" . '}).then((result) => {'.
					"\n" . 'if ('.
						"\n" . 'result.dismiss === Swal.DismissReason.timer'.
						"\n" . '){'.
						"\n" . 'buy_shop_skin_gun(id,user,name);'.
						"\n" . '}'.
				"\n" . '})'.
			"\n" . '}'.
		"\n" . '})'.
    "\n" . '});'.
	"\n" . 'function buy_shop_skin_gun(id,user,name){'.
		"\n" . '$.ajax({'.
               	"\n" . 'url     : \'/Auth/Ajax/Load.html\','.
               	"\n" . 'type    : \'POST\','.
               	"\n" . 'dataType: \'JSON\','.
               	"\n" . 'data    : {'.
							"\n" . 't       : \'buy-shop-skin-gun\','.
                   			"\n" . 'id  : id,'.
                   			"\n" . 'user : user,'.
                   			"\n" . 'name :name'.
							"\n" . '},'.
                "\n" . 'success: (data) => {'.
                   "\n" . ' if (data.error) {'.
                        	"\n" . 'showNotification(\'bg-red text-white\', data.msg);   '.                 	
                    "\n" . '} else {'.
                        	"\n" . 'showNotification(\'bg-green text-white\', data.msg); '.  
                    "\n" . '}'.
               "\n" . ' }'.
       "\n" . ' })'.
    "\n" . '}';
	
}elseif($js == 'shop-item'){	
?>
		$('[data-click="buyitem"]').click(function(e) {
			var id = $(this).data('id');
			user = $(this).data('user');
			name = $(this).data('name');
			Swal.mixin({
				confirmButtonText: 'Tiếp tục &rarr;',
				showCancelButton: true,
				imageUrl: '/Auth/Picture/'+name,
				imageWidth: 400,
				imageHeight: 200,
				imageAlt: 'Custom image',
				progressSteps: ['1', '2']
			}).queue([
					{
						title: 'Xác Nhận Mua: '+name,
						text: 'Nếu đồng ý mua vui lòng Tiếp Tục'
					},
					{
						title: 'Xác Nhận',
						text: 'Bạn có chắc muốn mua vật phẩm này'
					},
			]).then((result) => {
				if (result.value) {
					Swal.fire({
						title: 'Đang Mua Hàng',
						html: 'Vui lòng chờ <strong></strong> seconds.',
						timer: 5000,
						onBeforeOpen: () => {
							Swal.showLoading()
							timerInterval = setInterval(() => {
								Swal.getContent().querySelector('strong')
								.textContent = (Swal.getTimerLeft() / 1000)
								.toFixed(0)
							}, 100)
						},
							onClose: () => {
								clearInterval(timerInterval)
							}
					}).then((result) => {
						if (
							result.dismiss === Swal.DismissReason.timer
						) {
							buy_shop_item(id,user,name);
						}
					})
				}
			})  
		});
			function buy_shop_item(id,user,name){

          	 		$.ajax({
               			url     : '/Auth/Ajax/Load.html',
               			type    : 'POST',
               			dataType: 'JSON',
               			data    : {
                   			t       : 'buy-shop-item',
                   			id  : id,
                   			user : user,
                   			name :name
               			},
                	success: (data) => {
                    	if (data.error) {
                        	showNotification('bg-red text-white', data.msg);                    	
                    	} else {
                        	showNotification('bg-green text-white', data.msg);   
                    }
                }
            })
          	}
<?php
}elseif($js == 'shop-vip'){
?>
$('[data-click="buyvip"]').click(function(e) {
        var id = $(this).data('id');
        user = $(this).data('user');
        name = $(this).data('name');
        rank = $(this).data('rank');
		Swal.mixin({
  confirmButtonText: 'Tiếp tục &rarr;',
  showCancelButton: true,
  progressSteps: ['1', '2']
}).queue([
  {
    title: 'Xác Nhận Mua '+name,
    text: 'Nếu đồng ý mua vui lòng Tiếp Tục'
  },
   {
    title: 'Xác Nhận',
    text: 'Bạn có chắc muốn mua VIP này'
  },
]).then((result) => {
  if (result.value) {
   Swal.fire({
  title: 'Đang Mua Hàng',
  html: 'Vui lòng chờ <strong></strong> seconds.',
  timer: 5000,
  onBeforeOpen: () => {
    Swal.showLoading()
    timerInterval = setInterval(() => {
      Swal.getContent().querySelector('strong')
        .textContent = (Swal.getTimerLeft() / 1000)
          .toFixed(0)
    }, 100)
  },
  onClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  if (
    // Read more about handling dismissals
    result.dismiss === Swal.DismissReason.timer
    
  ) {
   buy_shop_vip(id,rank,user,name);
  }
})
  }
})  
    });
	function buy_shop_vip(id,rank,user,name){

          	 		$.ajax({
               			url     : '/Auth/Ajax/Load.html',
               			type    : 'POST',
               			dataType: 'JSON',
               			data    : {
                   			t       : 'buy-shop-vip',
                   			id  : id,
                   			rank : rank,
                   			user :user,
                   			name :name
               			},
                	success: (data) => {
                    	if (data.error) {
                        	showNotification('bg-red text-white', data.msg);                    	
                    	} else {
                        	showNotification('bg-green text-white', data.msg);   
                    }
                }
            })
          	}
<?php
}elseif($js == 'shop-cars'){
?>
	$('[data-click="buycars"]').click(function(e) {
        var id = $(this).data('id');
        user = $(this).data('user');
        cars = $(this).data('cars');
        name = $(this).data('name');
    Swal.mixin({
  confirmButtonText: 'Tiếp tục &rarr;',
  showCancelButton: true,
  imageUrl: '/Auth/Picture/Cars-'+cars,
  imageWidth: 400,
  imageHeight: 200,
  imageAlt: 'Custom image',
  progressSteps: ['1', '2']
}).queue([
  {
    title: 'Xác Nhận Mua: '+name,
    text: 'Nếu đồng ý mua vui lòng Tiếp Tục'
  },
   {
    title: 'Xác Nhận',
    text: 'Bạn có chắc muốn mua phương tiện này'
  },
]).then((result) => {
  if (result.value) {
   Swal.fire({
  title: 'Đang Mua Hàng',
  html: 'Vui lòng chờ <strong></strong> seconds.',
  timer: 5000,
  onBeforeOpen: () => {
    Swal.showLoading()
    timerInterval = setInterval(() => {
      Swal.getContent().querySelector('strong')
        .textContent = (Swal.getTimerLeft() / 1000)
          .toFixed(0)
    }, 100)
  },
  onClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  if (
    // Read more about handling dismissals
    result.dismiss === Swal.DismissReason.timer
    
  ) {
   buy_shop_cars(id,user,cars,name);
  }
})
  }
})  
    });
			function buy_shop_cars(id,user,cars,name){

          	 		$.ajax({
               			url     : '/Auth/Ajax/Load.html',
               			type    : 'POST',
               			dataType: 'JSON',
               			data    : {
                   			t       : 'buy-shop-cars',
                   			id  : id,
                   			user : user,
                   			cars :cars,
                   			name :name
               			},
                	success: (data) => {
                    	if (data.error) {
                        	showNotification('bg-red text-white', data.msg);                    	
                    	} else {
                        	showNotification('bg-green text-white', data.msg);   
                    }
                }
            })
          	}
<?php
}elseif($js == 'shop-toys'){
?>
$('[data-click="buytoys"]').click(function(e) {
        var id = $(this).data('id');
        user = $(this).data('user');
        toys = $(this).data('toys');
        name = $(this).data('name');
    Swal.mixin({
  confirmButtonText: 'Tiếp tục &rarr;',
  showCancelButton: true,
  imageUrl: '/Auth/Picture/Toys-'+toys,
  imageWidth: 400,
  imageHeight: 200,
  imageAlt: 'Custom image',
  progressSteps: ['1', '2']
}).queue([
  {
    title: 'Xác Nhận Mua: '+name,
    text: 'Nếu đồng ý mua vui lòng Tiếp Tục'
  },
   {
    title: 'Xác Nhận',
    text: 'Bạn có chắc muốn mua đồ chơi này'
  },
]).then((result) => {
  if (result.value) {
   Swal.fire({
  title: 'Đang Mua Hàng',
  html: 'Vui lòng chờ <strong></strong> seconds.',
  timer: 5000,
  onBeforeOpen: () => {
    Swal.showLoading()
    timerInterval = setInterval(() => {
      Swal.getContent().querySelector('strong')
        .textContent = (Swal.getTimerLeft() / 1000)
          .toFixed(0)
    }, 100)
  },
  onClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  if (
    // Read more about handling dismissals
    result.dismiss === Swal.DismissReason.timer
    
  ) {
   buy_shop_toys(id,user,toys,name);
  }
})
  }
})  
    });
	function buy_shop_toys(id,user,toys,name){

          	 		$.ajax({
               			url     : '/Auth/Ajax/Load.html',
               			type    : 'POST',
               			dataType: 'JSON',
               			data    : {
                   			t       : 'buy-shop-toys',
                   			id  : id,
                   			user : user,
                   			toys :toys,
                   			name :name
               			},
                	success: (data) => {
                    	if (data.error) {
                        	showNotification('bg-red text-white', data.msg);                    	
                    	} else {
                        	showNotification('bg-green text-white', data.msg);   
                    }
                }
            })
          	}
<?php
}
?>