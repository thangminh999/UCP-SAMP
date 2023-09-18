<?php

define('MT_CMS', 1);
$fileDir = dirname(__FILE__);
$rootPath = realpath($fileDir . '/../..');
chdir($rootPath);
require($rootPath . '/library/Autoloader.php');
if(!$user_id){
		 header('Location: ' . $system['url'] . '/Login');
exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vòng Quay May Mắn || Cơ Hội Nhận Quà</title>
    <link rel="stylesheet" href="/assets/event/css/typo/typo.css" />
    <link rel="stylesheet" href="/assets/event/css/hc-canvas-luckwheel.css" />
    <style>
      .hc-luckywheel{
        position:fixed;
        top: 50%;
        left: 50%;
        margin-top: -250px;
        margin-left: -250px;
      }
    </style>
  </head>
  <body class="bg">
    <div class="wrapper typo" id="wrapper">
      <section id="luckywheel" class="hc-luckywheel">
        <div class="hc-luckywheel-container">
          <canvas class="hc-luckywheel-canvas" width="500px" height="500px"
            >Vòng Xoay May Mắn</canvas
          >
        </div>
        <a class="hc-luckywheel-btn" href="javascript:;">Xoay</a>
      </section>
    </div>
</style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="/assets/event/js/hc-canvas-luckwheel.js"></script>
    <script>
      var isPercentage = true;
      var prizes = [
              {
                text: "Credits",
                img: "/assets/event/images/Credits.png",
                number: 0, // 1%,
                percentpage: 0.01 // 1%
              },
              {
                text: "Nón J2 Team",
                img: "/assets/event/images/Non.png",
                number: 1,
                percentpage: 0.01 // 1%
              },
              {
                text: "Vòng Tay J2Team",
                img: "/assets/event/images/Vong.png",
                number : 1,
                percentpage: 0.01 // 10%
              },
              {
                text: "J2Team Security",
                img: "/assets/event/images/j2_logo.png",
                number: 1,
                percentpage: 0.1 // 24%
              },
              {
                text: "Chúc bạn may mắn lần sau",
                img: "/assets/event/images/miss.png",
                percentpage: 0.88// 88%
              },
            ];
      document.addEventListener(
        "DOMContentLoaded",
        function() {
          hcLuckywheel.init({
            id: "luckywheel",
            config: function(callback) {
              callback &&
                callback(prizes);
            },
            mode : "both",
            getPrize: function(callback) {
              var rand = randomIndex(prizes);
              var chances = rand;
              callback && callback([rand, chances]);
            },
            gotBack: function(data) {
              if(data == null){
                Swal.fire(
                  'Chương trình kết thúc',
                  'Đã hết phần thưởng',
                  'error'
                )
              } else if (data == 'Chúc bạn may mắn lần sau'){
                Swal.fire(
                  'Bạn không trúng thưởng',
                  data,
                  'error'
                )
              } else{
                Swal.fire(
                  'Đã trúng giải',
                  data,
                  'success'
                )
              }
            }
          });
        },
        false
      );
      function randomIndex(prizes){
        if(isPercentage){
          var counter = 1;
          for (let i = 0; i < prizes.length; i++) {
            if(prizes[i].number == 0){
              counter++
            }
          }
          if(counter == prizes.length){
            return null
          }
          let rand = Math.random();
          let prizeIndex = null;
          console.log(rand);
          switch (true) {
            case rand < prizes[4].percentpage:
              prizeIndex = 4 ;
              break;
            case rand < prizes[4].percentpage + prizes[3].percentpage:
              prizeIndex = 3;
              break;
            case rand < prizes[4].percentpage + prizes[3].percentpage + prizes[2].percentpage:
              prizeIndex = 2;
              break;
            case rand < prizes[4].percentpage + prizes[3].percentpage + prizes[2].percentpage + prizes[1].percentpage:
              prizeIndex = 1;
              break;  
            case rand < prizes[4].percentpage + prizes[3].percentpage + prizes[2].percentpage + prizes[1].percentpage  + prizes[0].percentpage:
              prizeIndex = 0;
              break;  
          }
          if(prizes[prizeIndex].number != 0){
            prizes[prizeIndex].number = prizes[prizeIndex].number - 1
            return prizeIndex
          }else{
            return randomIndex(prizes)
          }
        }else{
          var counter = 0;
          for (let i = 0; i < prizes.length; i++) {
            if(prizes[i].number == 0){
              counter++
            }
          }
          if(counter == prizes.length){
            return null
          }
          var rand = (Math.random() * (prizes.length)) >>> 0;
          if(prizes[rand].number != 0){
            prizes[rand].number = prizes[rand].number - 1
            return rand
          }else{
            return randomIndex(prizes)
          }
        }
      }
    </script>
  </body>
</html>


