<?php
define('MT_CMS', 1);
$fileDir = dirname(__FILE__);
$rootPath = realpath($fileDir . '/');
chdir($rootPath);
require($rootPath . '/library/Autoloader.php');

$validate = THCMS_Controller_Function::ValidateCallback($_POST);
if ($validate != false) { //Nếu xác thực callback đúng thì chạy vào đây.
    $status = $validate['status']; //Trạng thái thẻ nạp, thẻ thành công = thanhcong , Thẻ sai, thẻ sai mệnh giá = thatbai
    $serial = $validate['serial']; //Số serial của thẻ.
    $pin = $validate['pin']; //Mã pin của thẻ.
    $card_type = $validate['card_type']; //Loại thẻ. vd: Viettel, Mobifone, Vinaphone.
    $amount = $validate['amount']; //Mệnh giá của thẻ. nếu bạn sài thêm hàm sai mệnh giá vui lòng sử dụng thêm hàm này tự cập nhật mệnh giá thật kèm theo desc là mệnh giá củ
    $real_amount = $validate['real_amount']; // thực nhận đã trừ chiết khấu
    $content = explode(" ", $validate['content']); // id transaction explode " " như ở file loadajax $type_card_note
    $result = THCMS_Controller::$connect->query("SELECT * FROM mt_cms_napthe_log WHERE StatusCard = 0 AND trans_id = '{$content[5]}' AND PinCard = '{$pin}' AND SeriCard = '{$serial}' AND NameCard = '{$card_type}'");

    if ($result->num_rows > 0) {
        $result = $result->fetch_array(MYSQLI_ASSOC);
        print_r($result);
        if ($status == 'thanhcong') {
            //Xử lý nạp thẻ thành công tại đây.
            if ($amount == '10000') {
                $credits = '1000';
            } elseif ($amount == '20000') {
                $credits = '2000';
            } elseif ($amount == '30000') {
                $credits = '3000';
            } elseif ($amount == '50000') {
                $credits = '5000';
            } elseif ($amount == '100000') {
                $credits = '10000';
            } elseif ($amount == '200000') {
                $credits = '20000';
            } elseif ($amount == '300000') {
                $credits = '30000';
            } elseif ($amount == '500000') {
                $credits = '50000';
            }
            THCMS_Controller_Function::UpdateAddCredits($credits, $content[2]);
            THCMS_Controller::$connect->query("UPDATE mt_cms_napthe_log SET StatusCard = 1, ContentCard = 'Thẻ Nạp Thành Công, + " . $credits . " Credits. ' WHERE id = {$result['id']}"); // chuyển cho kết quả thành công   


        } else {
            //Xử lý nạp thẻ thất bại tại đây.
            THCMS_Controller::$connect->query("UPDATE mt_cms_napthe_log SET StatusCard = 2, ContentCard = 'Thẻ Nạp Thất Bại !' WHERE id = {$result['id']}"); // thất bại   
        }

        #[!] Lưu log Nạp Thẻ 
        $file = "card.log";
        $fh = fopen($file, 'a') or die("cant open file");
        fwrite($fh, "Tai khoan: " . $result['Username'] . ", data: " . json_encode($_POST));
        fwrite($fh, "\r\n");
        fclose($fh);
    } else {
        http_response_code(403);
        die('Forbidden');
    }
} else {
    http_response_code(403);
    die('Forbidden');
}
