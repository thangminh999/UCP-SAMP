<?php

defined('MT_CMS') or die('Lỗi: Truy Cập Hệ Thống');
class THCMS_Controller_Function extends THCMS_Controller
{
		public static function POST($key) {
		$key = addslashes($key);
		$key = stripslashes($key);
		return $key;
		}
		public static function KiemTraAccounts($username) {
		$result = mysqli_query(THCMS_Controller::$connect,"SELECT Username FROM accounts WHERE Username = '$username'");
		if (mysqli_num_rows($result) < 1)
			return 1;
		return 0;
		}
		public static function CheckTransIDMoMo($var) {
		$result = mysqli_query(THCMS_Controller::$connect,"SELECT TransID FROM mt_cms_napthe_momo WHERE TransID = '$var'");
		if (mysqli_num_rows($result) > 0)
			return 1;
		return 0;
		}
		public static function CheckShopVip($id) {
		$result = mysqli_query(THCMS_Controller::$connect,"SELECT id FROM mt_cms_shop_vip WHERE id = '$id'");
		if (mysqli_num_rows($result) < 1)
			return 1;
		return 0;
		}
		public static function PanelCheck($type) {
		$result = mysqli_query(THCMS_Controller::$connect,"SELECT * FROM accounts WHERE id = '$id'");
		if (mysqli_num_rows($result) < 1)
			return 1;
		return 0;
		}
		public static function CheckShopCars($id) {
		$result = mysqli_query(THCMS_Controller::$connect,"SELECT id FROM mt_cms_shop_cars WHERE id = '$id'");
		if (mysqli_num_rows($result) < 1)
			return 1;
		return 0;
		}
		public static function CheckShopItem($id) {
		$result = mysqli_query(THCMS_Controller::$connect,"SELECT id FROM mt_cms_shop_item WHERE id = '$id'");
		if (mysqli_num_rows($result) < 1)
			return 1;
		return 0;
		}
		public static function CheckShopSkin($id) {
		$result = mysqli_query(THCMS_Controller::$connect,"SELECT id FROM mt_cms_shop_skin WHERE id = '$id'");
		if (mysqli_num_rows($result) < 1)
			return 1;
		return 0;
		}
		public static function CheckShopSkinGun($id) {
		$result = mysqli_query(THCMS_Controller::$connect,"SELECT id FROM mt_cms_shop_skingun WHERE id = '$id'");
		if (mysqli_num_rows($result) < 1)
			return 1;
		return 0;
		}
		public static function CheckVehicleSlot($id) {
		$result = mysqli_query(THCMS_Controller::$connect,"SELECT * FROM vehicles WHERE sqlID = '$id'");
		return mysqli_num_rows($result);
		}
		public static function CheckToysSlot($id) {
		$result = mysqli_query(THCMS_Controller::$connect,"SELECT * FROM toys WHERE player = '$id'");
		return mysqli_num_rows($result);
		}
		public static function CheckIDCars($id) {
		$result = mysqli_query(THCMS_Controller::$connect,"SELECT Cars_ID FROM mt_cms_shop_cars WHERE Cars_ID = '$id'");
		if (mysqli_num_rows($result) > 0)
			return 1;
		return 0;
		}
		public static function CheckIDToys($id) {
		$result = mysqli_query(THCMS_Controller::$connect,"SELECT Toys_ID FROM mt_cms_shop_toys WHERE Toys_ID = '$id'");
		if (mysqli_num_rows($result) > 0)
			return 1;
		return 0;
		}
		public static function CheckGiftcode($name) {
		$result = mysqli_query(THCMS_Controller::$connect,"SELECT Gift_Name FROM mt_cms_giftcode WHERE Gift_Name = '$name'");
		if (mysqli_num_rows($result) > 0)
			return 1;
		return 0;
		}
		public static function CheckDonenateVIP($id) {
		$result = mysqli_query(THCMS_Controller::$connect,"SELECT VIP_DonateRank FROM mt_cms_shop_vip WHERE VIP_DonateRank = '$id'");
		if (mysqli_num_rows($result) > 0)
			return 1;
		return 0;
		}
		public static function RewiteURL($text)
	{
	$text = html_entity_decode(trim($text), ENT_QUOTES, 'UTF-8');
	$text=str_replace(" ","-", $text);$text=str_replace("--","-", $text);
	$text=str_replace("@","-",$text);$text=str_replace("/","-",$text);
	$text=str_replace("\\","-",$text);$text=str_replace(":","",$text);
	$text=str_replace("\"","",$text);$text=str_replace("'","",$text);
	$text=str_replace("<","",$text);$text=str_replace(">","",$text);
	$text=str_replace(",","",$text);$text=str_replace("?","",$text);
	$text=str_replace(";","",$text);$text=str_replace(".","",$text);
	$text=str_replace("[","",$text);$text=str_replace("]","",$text);
	$text=str_replace("(","",$text);$text=str_replace(")","",$text);
    $text=str_replace("color","", $text);
    $text = str_replace("red","", $text);
	$text=str_replace("́","", $text);
	$text=str_replace("̀","", $text);
	$text=str_replace("̃","", $text);
	$text=str_replace("̣","", $text);
	$text=str_replace("̉","", $text);
	$text=str_replace("*","",$text);$text=str_replace("!","",$text);
	$text=str_replace("$","-",$text);$text=str_replace("&","-and-",$text);
	$text=str_replace("%","",$text);$text=str_replace("#","",$text);
	$text=str_replace("^","",$text);$text=str_replace("=","",$text);
	$text=str_replace("+","",$text);$text=str_replace("~","",$text);
	$text=str_replace("`","",$text);$text=str_replace("--","-",$text);
	$text = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $text);
	$text = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $text);
	$text = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $text);
	$text = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $text);
	$text = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $text);
	$text = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $text);
	$text = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $text);
	$text = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $text);
	$text = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $text);
	$text = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $text);
	$text = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $text);
	$text = preg_replace("/(đ)/", 'd', $text);
	$text = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $text);
	$text = preg_replace("/(đ)/", 'd', $text);
	$text = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $text);
	$text = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $text);
	$text = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $text);
	$text = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $text);
	$text = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $text);
	$text = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $text);
	$text = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $text);
	$text = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $text);
	$text = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $text);
	$text = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $text);
	$text = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $text);
	$text = preg_replace("/(Đ)/", 'D', $text);
	$text = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $text);
	$text = preg_replace("/(Đ)/", 'D', $text);
	$text=strtolower($text);
	return $text;
	}
		public static function ShowNewsXenforo()
    {
      echo  '<div class="body notify-box">'.
			'<div style="overflow: hidden;">';
				$result = mysqli_query(THCMS_Controller::$connect_xenforo,"SELECT * FROM xf_thread WHERE node_id = '35' OR discussion_state = 'visible' ORDER BY 'post_date' ");
				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						echo  '<div class="listbox-content-item"><p><i class="mdi mdi-asterisk"></i> <a href="'.THCMS_Controller::$system_set['url_forum'].'/threads/' . THCMS_Controller_Function::RewiteURL($row['title']) .'.'.$row['thread_id'].'">'.$row['title'].'</a></p><i class="mdi mdi-calendar"></i> ' . THCMS_Controller_Function::Dipslay_Date($row['post_date']) . '</span></div>';
					}
				}else{
					echo '<div class="listbox-content-item">Chưa có Thông Tin</div>';
				}
				echo '</div>  '.  
              '</div>';
    }
		public static function CheckShopToys($id) {
		$result = mysqli_query(THCMS_Controller::$connect,"SELECT id FROM mt_cms_shop_toys WHERE id = '$id'");
		if (mysqli_num_rows($result) < 1)
			return 1;
		return 0;
		}
		
		public static function KiemTraEmail($str) {
		$result = mysqli_query(THCMS_Controller::$connect,"SELECT Email FROM accounts WHERE Email = '$str'");
		if (mysqli_num_rows($result) < 1)
			return 1;
		return 0;
		}
		public static function is_email($str) {
		$partten = "/^[A-Za-z0-9_\.]{6,32}@([a-zA-Z0-9]{2,12})(\.[a-zA-Z]{2,12})+$/";
		if (!preg_match ($partten,$str))
			return 1;
		return 0;
		}
		public static function is_name($str){
		$valid_uname = "/^[A-Z\a-z_]+_[A-Z\a-z]/";
			if (!preg_match ($valid_uname, $str))
			return 1;
		return 0;
		}
		
		public static function is_number($str) {
		$partten = "/^[0-9]{4}$/";
		if (!preg_match ($partten,$str))
			return 1;
		return 0;
		}
		/**
		 * [Hash_Whirlpool description]
		 * @param [type] $str [description]
		 */
		public static function Hash_Whirlpool($var) {
		return strtoupper(hash('whirlpool',$var));
		}	
		public static function Hash_MD5($var) {
		return md5($var);
		}
		public static function GetNameAccounts($username) {
		$result = mysqli_query(THCMS_Controller::$connect,"SELECT * FROM accounts WHERE Username = '$username' LIMIT 1");
		$row    = mysqli_fetch_assoc($result);
		return $row;
		}
		public static function GetSeriReloadCard($str) {
		$result = mysqli_query(THCMS_Controller::$connect,"SELECT * FROM mt_cms_napthe_log WHERE SeriCard = '$str' LIMIT 1");
		$row    = mysqli_fetch_assoc($result);
		return $row;
		}
		public static function GetGift($giftname) {
		$result = mysqli_query(THCMS_Controller::$connect,"SELECT * FROM mt_cms_giftcode WHERE Gift_Name = '$giftname' LIMIT 1");
		$row    = mysqli_fetch_assoc($result);
		return $row;
		}
		public static function GetGiaVang() {
		$result = mysqli_query(THCMS_Controller::$connect,"SELECT * FROM gold WHERE Year = '2019' LIMIT 1");
		$row    = mysqli_fetch_assoc($result);
		return $row;
		}
		public static function SlectNameXenforo($username) {
		$result = mysqli_query(THCMS_Controller::$connect_xenforo,"SELECT * FROM xf_user WHERE username = '$username'");
		$row    = mysqli_fetch_assoc($result);
		return $row;
		}	
		public static function GetMailAccounts($str) {
		$result = mysqli_query(THCMS_Controller::$connect,"SELECT * FROM accounts WHERE Email = '$str' LIMIT 1");
		$row    = mysqli_fetch_assoc($result);
		return $row;
		}
		public static function GetShopVip($str_id) {
		$result = mysqli_query(THCMS_Controller::$connect,"SELECT * FROM mt_cms_shop_vip WHERE id = '$str_id' LIMIT 1");
		$row    = mysqli_fetch_assoc($result);
		return $row;
		}
		public static function GetShopCars($str_id) {
		$result = mysqli_query(THCMS_Controller::$connect,"SELECT * FROM mt_cms_shop_cars WHERE id = '$str_id' LIMIT 1");
		$row    = mysqli_fetch_assoc($result);
		return $row;
		}
		public static function GetShopItem($str_id) {
		$result = mysqli_query(THCMS_Controller::$connect,"SELECT * FROM mt_cms_shop_item WHERE id = '$str_id' LIMIT 1");
		$row    = mysqli_fetch_assoc($result);
		return $row;
		}
		public static function GetShopSkin($str_id) {
		$result = mysqli_query(THCMS_Controller::$connect,"SELECT * FROM mt_cms_shop_skin WHERE id = '$str_id' LIMIT 1");
		$row    = mysqli_fetch_assoc($result);
		return $row;
		}
		public static function GetShopSkinGun($str_id) {
		$result = mysqli_query(THCMS_Controller::$connect,"SELECT * FROM mt_cms_shop_skingun WHERE id = '$str_id' LIMIT 1");
		$row    = mysqli_fetch_assoc($result);
		return $row;
		}
		public static function GetShopToys($str_id) {
		$result = mysqli_query(THCMS_Controller::$connect,"SELECT * FROM mt_cms_shop_toys WHERE id = '$str_id' LIMIT 1");
		$row    = mysqli_fetch_assoc($result);
		return $row;
		}
		public static function GetMailler($str) {
		$result = mysqli_query(THCMS_Controller::$connect,"SELECT * FROM mt_cms_mailer WHERE id = '$str' LIMIT 1");
		$row    = mysqli_fetch_assoc($result);
		return $row;
		}
		public static function KiemTraTokenResetPassword($str) {
		$result = mysqli_query(THCMS_Controller::$connect,"SELECT Token_ResetPassword FROM accounts WHERE Token_ResetPassword = '$str'");
		if (mysqli_num_rows($result) < 1)
			return 1;
		return 0;
		}
		public static function KiemTraTokenResetPincode($str) {
		$result = mysqli_query(THCMS_Controller::$connect,"SELECT Token_ResetPincode FROM accounts WHERE Token_ResetPincode = '$str'");
		if (mysqli_num_rows($result) < 1)
			return 1;
		return 0;
		}
		public static function KiemTraTokenActiveMail($str) {
		$result = mysqli_query(THCMS_Controller::$connect,"SELECT Token_Email FROM accounts WHERE Token_Email = '$str'");
		if (mysqli_num_rows($result) < 1)
			return 1;
		return 0;
		}
		public static function KiemTraTokenChangeMail($str) {
		$result = mysqli_query(THCMS_Controller::$connect,"SELECT Token_Email_Change FROM accounts WHERE Token_Email_Change = '$str'");
		if (mysqli_num_rows($result) < 1)
			return 1;
		return 0;
		}
		public static function CheckNapTheCham($str) {
		$result = mysqli_query(THCMS_Controller::$connect,"SELECT SeriCard FROM mt_cms_napthe_log WHERE SeriCard = '$str'");
		if (mysqli_num_rows($result) < 1)
			return 1;
		return 0;
		}
		public static function Date_Text($var)
   	{
        $shift = (7 + 0) * 3600;
        if (date("N", $var + $shift) == 1) {
            $thu_time = 'Thứ Hai';
        }else if (date("N", $var + $shift) == 2) {
            $thu_time = 'Thứ Ba';
        }else if (date("N", $var + $shift) == 3) {
            $thu_time = 'Thứ Tư';
        }else if (date("N", $var + $shift) == 4) {
            $thu_time = 'Thứ Năm';
        }else if (date("N", $var + $shift) == 5) {
            $thu_time = 'Thứ Sáu';
        }else if (date("N", $var + $shift) == 6) {
            $thu_time = 'Thứ Bảy';
        }else if (date("N", $var + $shift) == 7) {
            $thu_time = 'Chủ Nhật';
        }
        if (date('Y', $var) == date('Y', time())) {
            $jun = round((time()-$var)/60);
            if ($jun < 1) {
                return 'Vừa xong';
            }else if($jun >= 1 && $jun < 60){
                return $jun . ' phút';
            }else{
                if (date('z', $var + $shift) == date('z', time() + $shift)) {
                    return 'Hôm nay';
                }else if (date('z', $var + $shift) == date('z', time() + $shift) - 1) {
               		 return 'Hôm qua';
                }else if (date('z', $var + $shift) == date('z', time() + $shift) - 2) {
                    return $thu_time;
                }else if (date('z', $var + $shift) == date('z', time() + $shift) - 3) {
                    return $thu_time;
                }else{
                    return $thu_time;
                }
            }
        }

        return $thu_time . ', '.date("j", $var + $shift) . ' tháng ' . date("n", $var + $shift) . ' ' . date("Y", $var + $shift);
    }
    public static function Date_Number($var)
    {
       $shift = (7 + 0) * 3600;
        return date("H", $var + $shift) . ':' . date("i", $var + $shift). ':' . date("s", $var + $shift);
    }
     public static function Dipslay_Date($var)
    {
       $shift = (7 + 0) * 3600;
         return date("j", $var + $shift) . '/' . date("n", $var + $shift) . '/' . date("Y", $var + $shift);
    }
		public static function RandomString($str ='default',$length){ 
			if($str == 'default'){
				$characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
			    $charsLength = strlen($characters) -1;
			    $string = "";
			    for($i=0; $i<$length; $i++){
			        $randNum = mt_rand(0, $charsLength);
			        $string .= $characters[$randNum];
			    }	
			}
			if($str == 'viet_hoa'){
				$characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
			    $charsLength = strlen($characters) -1;
			    $string = "";
			    for($i=0; $i<$length; $i++){
			        $randNum = mt_rand(0, $charsLength);
			        $string .= $characters[$randNum];
			    }	
			}
			if($str == 'viet_thuong'){
				$characters = "abcdefghijklmnopqrstuvwxyz";
			    $charsLength = strlen($characters) -1;
			    $string = "";
			    for($i=0; $i<$length; $i++){
			        $randNum = mt_rand(0, $charsLength);
			        $string .= $characters[$randNum];
			    }	
			}
			if($str == 'viet_thuong_va_so'){
				$characters = "abcdefghijklmnopqrstuvwxyz0123456789";
			    $charsLength = strlen($characters) -1;
			    $string = "";
			    for($i=0; $i<$length; $i++){
			        $randNum = mt_rand(0, $charsLength);
			        $string .= $characters[$randNum];
			    }	
			}
			if($str == 'viet_hoa_va_so'){
				$characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
			    $charsLength = strlen($characters) -1;
			    $string = "";
			    for($i=0; $i<$length; $i++){
			        $randNum = mt_rand(0, $charsLength);
			        $string .= $characters[$randNum];
			    }	
			}
			if($str == 'viet_so'){
				$characters = "0123456789";
			    $charsLength = strlen($characters) -1;
			    $string = "";
			    for($i=0; $i<$length; $i++){
			        $randNum = mt_rand(0, $charsLength);
			        $string .= $characters[$randNum];
			    }	
			}
		    
		    return $string;
		}
		public static function SaveTokenResetPassword($str_token, $str_id) {
			$time = time()+3600;
			$result = mysqli_query(THCMS_Controller::$connect,"UPDATE `accounts` SET  `Token_ResetPassword` = '" . $str_token . "', `Time_ResetPassword` = '" . $time . "' WHERE `id` = '".$str_id."'");
			if ($result)
			return 1;
			return 0;
		}
		public static function SaveResetPassword($str_pass ,$str_token,$str_id) {
			$result = mysqli_query(THCMS_Controller::$connect,"UPDATE `accounts` SET  `Key` = '" . strtoupper(hash('whirlpool',$str_pass)) . "', `Token_ResetPassword` = '" . $str_token. "' WHERE `id` = '".$str_id."'");
			if ($result)
			return 1;
			return 0;
		}
		public static function UpdateReadLogMember($str_id) {
			$result = mysqli_query(THCMS_Controller::$connect,"UPDATE `mt_cms_log` SET  `Read` = '1' WHERE `id` = '".$str_id."'");
			if ($result)
			return 1;
			return 0;
		}
		public static function SaveLogChangeName($str_id,$str_old,$str_news,$str_price) {
			$str_id = mysqli_real_escape_string(THCMS_Controller::$connect,$str_id);
			$str_old = mysqli_real_escape_string(THCMS_Controller::$connect,$str_old);
			$str_news = mysqli_real_escape_string(THCMS_Controller::$connect,$str_news);
			$str_price = mysqli_real_escape_string(THCMS_Controller::$connect,$str_price);
			$result = mysqli_query(THCMS_Controller::$connect,"
			INSERT INTO `mt_cms_change_name` SET  
			`ID_User` = '".$str_id."',
			`Name_Old` = '".$str_old."',
			`Name_News` = '".$str_news."',
			`Price` = '".$str_price."',
			`TimeChange` = '" . time() . "'
			");
			if ($result)
			return 1;
			return 0;
		}
		public static function Registration($str_username,$str_email,$str_pass) {
			$str_username = mysqli_real_escape_string(THCMS_Controller::$connect,$str_username);
			$str_email = mysqli_real_escape_string(THCMS_Controller::$connect,$str_email);
			$str_pass = mysqli_real_escape_string(THCMS_Controller::$connect,$str_pass);
			$result = mysqli_query(THCMS_Controller::$connect,"
			INSERT INTO `accounts` SET  
			`Username` = '".$str_username."',
			`Email` = '".$str_email."',
			`Key` = '".$str_pass."'
			");
			if ($result)
			return 1;
			return 0;
		}
		public static function SaveTokenResetPincode($str_token, $str_id) {
			$time = time()+3600;
			$result = mysqli_query(THCMS_Controller::$connect,"UPDATE `accounts` SET  `Token_ResetPincode` = '" . $str_token . "', `Time_ResetPincode` = '" . $time . "' WHERE `id` = '".$str_id."'");
			if ($result)
			return 1;
			return 0;
		}
		public static function SaveResetPincode($str_pin ,$str_token,$str_id) {
			$result = mysqli_query(THCMS_Controller::$connect,"UPDATE `accounts` SET  `Pin` = '" . strtoupper(hash('whirlpool',$str_pin)) . "', `Token_ResetPincode` = '" . $str_token. "' WHERE `id` = '".$str_id."'");
			if ($result)
			return 1;
			return 0;
		}
		public static function CreatePincode($str_pin ,$str_id) {
			$result = mysqli_query(THCMS_Controller::$connect,"UPDATE `accounts` SET  `Pin` = '" . strtoupper(hash('whirlpool',$str_pin)) . "'  WHERE `id` = '".$str_id."'");
			if ($result)
			return 1;
			return 0;
		}
		public static function CreateEmail($str_email ,$str_id) {
			$result = mysqli_query(THCMS_Controller::$connect,"UPDATE `accounts` SET  `Email` = '" . $str_email . "'  WHERE `id` = '".$str_id."'");
			if ($result)
			return 1;
			return 0;
		}
		public static function SaveTokenActiveMail($str_token, $str_id) {
			 $time = time()+3600;
			$result = mysqli_query(THCMS_Controller::$connect,"UPDATE `accounts` SET  `Token_Email` = '" . $str_token . "', `Time_Email` = '" . $time . "' WHERE `id` = '".$str_id."'");
			if ($result)
			return 1;
			return 0;
		}
		public static function SaveActiveMail($str_token,$str_id) {
			$result = mysqli_query(THCMS_Controller::$connect,"UPDATE `accounts` SET  `Active_Mail` = '1', `Token_Email` = '" . $str_token. "' WHERE `id` = '".$str_id."'");
			if ($result)
			return 1;
			return 0;
		}
		public static function SaveChageMail($str_email,$str_token,$str_id) {
			$result = mysqli_query(THCMS_Controller::$connect,"UPDATE `accounts` SET  `Email` = '".$str_email."', `Token_Email_Change` = '" . $str_token. "' WHERE `id` = '".$str_id."'");
			if ($result)
			return 1;
			return 0;
		}
		public static function FixCrash($str_id) {
			$result = mysqli_query(THCMS_Controller::$connect,
			"UPDATE `accounts` SET  
			`SPos_x` = '2094.6599', 
			`SPos_y` = '-1806.5745', 
			`SPos_z` = '13.5508',
			`VirtualWorld` = '0'
			WHERE `id` = '".$str_id."'
			");
			if ($result)
			return 1;
			return 0;
		}
		public static function UpdateNapCham($str_content,$str_status,$str_seri) {
			$result = mysqli_query(THCMS_Controller::$connect,"UPDATE `mt_cms_napthe_log` SET  `ContentCard` = '".$str_content."', `StatusCard` = '" . $str_status. "' WHERE `SeriCard` = '".$str_seri."'");
			if ($result)
			return 1;
			return 0;
		}
		public static function SaveChageMailXenforo($str_email,$str_id_forum) {
			$result = mysqli_query(THCMS_Controller::$connect_xenforo,"UPDATE `xf_user` SET  `email` = '".$str_email."' WHERE `id` = '".$str_id_forum."'");
			if ($result)
			return 1;
			return 0;
		}
		public static function SaveChageName($str_name,$str_id) {
			$result = mysqli_query(THCMS_Controller::$connect,"UPDATE `accounts` SET  `Username` = '".$str_name."' WHERE `id` = '".$str_id."'");
			if ($result)
			return 1;
			return 0;
		}
		public static function UpdateNameXenforoAccounts($str_name,$str_id) {
			$result = mysqli_query(THCMS_Controller::$connect,"UPDATE `accounts` SET  `User_Forum` = '".$str_name."' WHERE `id` = '".$str_id."'");
			if ($result)
			return 1;
			return 0;
		}
		public static function UpdateEmailXenforoAccounts($str_mail,$str_id) {
			$result = mysqli_query(THCMS_Controller::$connect,"UPDATE `accounts` SET  `Email_Forum` = '".$str_mail."' WHERE `id` = '".$str_id."'");
			if ($result)
			return 1;
			return 0;
		}
		public static function UpdateCredits($str_credits,$str_id) {
			$result = mysqli_query(THCMS_Controller::$connect,"UPDATE `accounts` SET  `Credits` = '".$str_credits."' WHERE `id` = '".$str_id."'");
			if ($result)
			return 1;
			return 0;
		}
		public static function UpdateMoney($str_money,$str_id) {
			$result = mysqli_query(THCMS_Controller::$connect,"UPDATE `accounts` SET  `Money` = '".$str_money."' WHERE `id` = '".$str_id."'");
			if ($result)
			return 1;
			return 0;
		}
		public static function UpdateAddCredits($str_credits,$str_id) {
			$result = mysqli_query(THCMS_Controller::$connect,"UPDATE `accounts` SET  `Credits` = Credits +".$str_credits." WHERE `id` = '".$str_id."'");
			if ($result)
			return 1;
			return 0;
		}
		public static function UpdateItem($str_cloum,$str_total,$str_id) {
			$result = mysqli_query(THCMS_Controller::$connect,"UPDATE `accounts` SET  `".$str_cloum."` = '".$str_total."' WHERE `id` = '".$str_id."'");
			if ($result)
			return 1;
			return 0;
		}
		public static function UpdateSkin($str_skin,$str_id) {
			$result = mysqli_query(THCMS_Controller::$connect,"UPDATE `accounts` SET  `Model` = '".$str_skin."' WHERE `id` = '".$str_id."'");
			if ($result)
			return 1;
			return 0;
		}
		public static function UpdateAccountsGiftcode($str_msg,$str_id) {
			$result = mysqli_query(THCMS_Controller::$connect,"UPDATE `accounts` SET  `Gift_UCP` = '1', `Gift_Msg`= '".$str_msg."' WHERE `id` = '".$str_id."'");
			if ($result)
			return 1;
			return 0;
		}
		public static function UpdateCountsGiftcode($str_name) {
			$result = mysqli_query(THCMS_Controller::$connect,"UPDATE `mt_cms_giftcode` SET  `Gift_Counts` = `Gift_Counts` +'1' WHERE `Gift_Name` = '".$str_name."'");
			if ($result)
			return 1;
			return 0;
		}
		public static function UpdateSkinGun($str_cloum,$str_total,$str_id) {
			$result = mysqli_query(THCMS_Controller::$connect,"UPDATE `accounts` SET  `".$str_cloum."` = '".$str_total."' WHERE `id` = '".$str_id."'");
			if ($result)
			return 1;
			return 0;
		}
		public static function UpdateTimeSetting($str_time,$str_id) {
			$result = mysqli_query(THCMS_Controller::$connect,"UPDATE `accounts` SET  `TimeSetting` = '".$str_time."' WHERE `id` = '".$str_id."'");
			if ($result)
			return 1;
			return 0;
		}
		public static function UpdatePassword($str_password,$str_id) {
			$result = mysqli_query(THCMS_Controller::$connect,"UPDATE `accounts` SET  `Key` = '".$str_password."' WHERE `id` = '".$str_id."'");
			if ($result)
			return 1;
			return 0;
		}
		public static function UpdatePasswordXenforo($str_password,$str_id) {
			$result = mysqli_query(THCMS_Controller::$connect_xenforo,"
				UPDATE xf_user_authenticate
            SET data = BINARY
            CONCAT(
            CONCAT(
            CONCAT('a:3:{s:4:\"hash\";s:40:\"', SHA1(CONCAT(SHA1('".$str_password."'), SHA1('salt')))),
            CONCAT('\";s:4:\"salt\";s:40:\"', SHA1('salt'))
            ),
            '\";s:8:\"hashFunc\";s:4:\"sha1\";}'
            ),
            scheme_class = 'XenForo_Authentication_Core'
            WHERE user_id = '".$str_id."'");
			if ($result)
			return 1;
			return 0;
		}
		public static function UpdatePincode($str_pin,$str_id) {
			$result = mysqli_query(THCMS_Controller::$connect,"UPDATE `accounts` SET  `Pin` = '".$str_pin."' WHERE `id` = '".$str_id."'");
			if ($result)
			return 1;
			return 0;
		}
		public static function SaveTokenEmailChange($str_email,$str_token, $str_id) {
			$result = mysqli_query(THCMS_Controller::$connect,"UPDATE `accounts` SET  `Email_Change` = '" . $str_email . "', `Token_Email_Change` = '" .$str_token. "',`Time_Email_Change` = '".time()."+86400' WHERE `id` = '".$str_id."'");
			if ($result)
			return 1;
			return 0;
		}
		public static function UpdateVipShop($str_id_vip,$str_time_vip, $str_id_user) {
			$result = mysqli_query(THCMS_Controller::$connect,"UPDATE `accounts` SET  `DonateRank` = '" . $str_id_vip . "', `VIPExpire` = '" .$str_time_vip. "' WHERE `id` = '".$str_id_user."'");
			if ($result)
			return 1;
			return 0;
		}
		public static function CreatShopCars($str_id_user, $str_id_cars,$str_x,$str_y,$str_z) {
			$str_id_user = mysqli_real_escape_string(THCMS_Controller::$connect,$str_id_user);
			$str_id_cars = mysqli_real_escape_string(THCMS_Controller::$connect,$str_id_cars);
			$str_x = mysqli_real_escape_string(THCMS_Controller::$connect,$str_x);
			$str_y = mysqli_real_escape_string(THCMS_Controller::$connect,$str_y);
			$str_z = mysqli_real_escape_string(THCMS_Controller::$connect,$str_z);
			$result = mysqli_query(THCMS_Controller::$connect,
				"INSERT INTO   `vehicles` SET  
				`sqlID` = '" . $str_id_user . "', 
				`pvModelId` = '" . $str_id_cars . "',
				`pvPosX` = '" . $str_x . "',
				`pvPosY` = '" . $str_y . "',
				`pvPosZ` = '" . $str_z . "',
				`pvFuel` = '100'
				");
			if ($result)
			return 1;
			return 0;
		}	
		public static function CreatShopToys($str_id_user, $str_id_toys) {
			$str_id_user = mysqli_real_escape_string(THCMS_Controller::$connect,$str_id_user);
			$str_id_toys = mysqli_real_escape_string(THCMS_Controller::$connect,$str_id_toys);
			$result = mysqli_query(THCMS_Controller::$connect,
				"INSERT INTO   `toys` SET  
				`player` = '" . $str_id_user . "', 
				`modelid` = '" . $str_id_toys . "'
				");
			if ($result)
			return 1;
			return 0;
		}	
		public static function SaveActiveForum($user,$email, $str_id_user) {
			$result_xenforo = mysqli_query(THCMS_Controller::$connect_xenforo,"SHOW TABLE STATUS LIKE 'xf_user'");
			$data_xenforo = mysqli_fetch_assoc($result_xenforo);
			$next_increment = $data_xenforo['Auto_increment'];
			$result = mysqli_query(THCMS_Controller::$connect,"
				UPDATE `accounts` SET  
				`ID_Forum` = '".$next_increment."', 
				`Active_Forum` = '1',
				`User_Forum` = '".$user."',
				`Email_Forum` = '".$email."'
				 WHERE `id` = '".$str_id_user."'
				 ");
			if ($result)
			return 1;
			return 0;
		}
		public static function UpdateChangeNameForum($user, $str_id_user) {
				$user = mysqli_real_escape_string(THCMS_Controller::$connect,$user);
				$str_id_user = mysqli_real_escape_string(THCMS_Controller::$connect,$str_id_user);
			$result = mysqli_query(THCMS_Controller::$connect,"
				UPDATE `accounts` SET  
				`User_Forum` = '".$user."'
				 WHERE `id` = '".$str_id_user."'
				 ");
			if ($result)
			return 1;
			return 0;
		}
		public static function SaveNameForum($str_user, $str_id_user_forum) {
			$result = mysqli_query(THCMS_Controller::$connect_xenforo,"
				UPDATE `xf_user` SET  
				`username` = '" . $str_user . "'
				 WHERE `user_id` = '".$str_id_user_forum."'
				 ");
			if ($result)
			return 1;
			return 0;
		}
		public static function SaveSystem($str_title,$str_url,$str_url_forum,$str_logo_img,$str_logo_text,$str_copyright,$str_keywords,$str_description) {
			$str_title = mysqli_real_escape_string(THCMS_Controller::$connect,$str_title);
			$str_url = mysqli_real_escape_string(THCMS_Controller::$connect,$str_url);
			$str_url_forum = mysqli_real_escape_string(THCMS_Controller::$connect,$str_url_forum);
			$str_logo_img = mysqli_real_escape_string(THCMS_Controller::$connect,$str_logo_img);
			$str_logo_text = mysqli_real_escape_string(THCMS_Controller::$connect,$str_logo_text);
			$str_copyright = mysqli_real_escape_string(THCMS_Controller::$connect,$str_copyright);
			$str_keywords = mysqli_real_escape_string(THCMS_Controller::$connect,$str_keywords);
			$str_description = mysqli_real_escape_string(THCMS_Controller::$connect,$str_description);
			
			mysqli_query(THCMS_Controller::$connect,"UPDATE `mt_cms_system` SET `val`='".$str_title."' WHERE `key` = 'title'");
			mysqli_query(THCMS_Controller::$connect,"UPDATE `mt_cms_system` SET `val`='".$str_url."' WHERE `key` = 'url'");
			mysqli_query(THCMS_Controller::$connect,"UPDATE `mt_cms_system` SET `val`='".$str_url_forum."' WHERE `key` = 'url_forum'");
			mysqli_query(THCMS_Controller::$connect,"UPDATE `mt_cms_system` SET `val`='".$str_logo_img."' WHERE `key` = 'logo_img'");
			mysqli_query(THCMS_Controller::$connect,"UPDATE `mt_cms_system` SET `val`='".$str_logo_text."' WHERE `key` = 'logo_text'");
			mysqli_query(THCMS_Controller::$connect,"UPDATE `mt_cms_system` SET `val`='".$str_copyright."' WHERE `key` = 'copyright'");
			mysqli_query(THCMS_Controller::$connect,"UPDATE `mt_cms_system` SET `val`='".$str_keywords."' WHERE `key` = 'keywords'");
			mysqli_query(THCMS_Controller::$connect,"UPDATE `mt_cms_system` SET `val`='".$str_description."' WHERE `key` = 'description'");
		}	
		public static function SaveMailer($str_Mailer,$str_Password,$str_SMTP,$str_Port) {
			$str_Mailer = mysqli_real_escape_string(THCMS_Controller::$connect,$str_Mailer);
			$str_Password = mysqli_real_escape_string(THCMS_Controller::$connect,$str_Password);
			$str_SMTP = mysqli_real_escape_string(THCMS_Controller::$connect,$str_SMTP);
			$str_Port = mysqli_real_escape_string(THCMS_Controller::$connect,$str_Port);
			mysqli_query(THCMS_Controller::$connect,"UPDATE `mt_cms_system` SET `val`='".$str_Mailer."' WHERE `key` = 'Mailer'");
			mysqli_query(THCMS_Controller::$connect,"UPDATE `mt_cms_system` SET `val`='".$str_Password."' WHERE `key` = 'Password'");
			mysqli_query(THCMS_Controller::$connect,"UPDATE `mt_cms_system` SET `val`='".$str_SMTP."' WHERE `key` = 'SMTP'");
			mysqli_query(THCMS_Controller::$connect,"UPDATE `mt_cms_system` SET `val`='".$str_Port."' WHERE `key` = 'Port'");

		}	
		public static function SaveEditCars($str_name,$str_id,$str_price,$str_activecars,$str_uid) {
			$str_name = mysqli_real_escape_string(THCMS_Controller::$connect,$str_name);
			$str_id = mysqli_real_escape_string(THCMS_Controller::$connect,$str_id);
			$str_price = mysqli_real_escape_string(THCMS_Controller::$connect,$str_price);
			$str_activecars = mysqli_real_escape_string(THCMS_Controller::$connect,$str_activecars);
			$result = mysqli_query(THCMS_Controller::$connect,"
				UPDATE `mt_cms_shop_cars` SET  
				`Cars_Name` = '" . $str_name . "', 
				`Cars_ID` = '" . $str_id . "',
				`Cars_Price` = '" .$str_price. "',
				`Cars_Active` = '" .$str_activecars. "'
				 WHERE `id` = '".$str_uid."'
				 ");
			if ($result)
			return 1;
			return 0;
		}

		public static function CreatPanelShopCars($str_name,$str_id,$str_price) {
			$str_name = mysqli_real_escape_string(THCMS_Controller::$connect,$str_name);
			$str_id = mysqli_real_escape_string(THCMS_Controller::$connect,$str_id);
			$str_price = mysqli_real_escape_string(THCMS_Controller::$connect,$str_price);
			$result = mysqli_query(THCMS_Controller::$connect,
				"INSERT INTO   `mt_cms_shop_cars` SET  
				`Cars_Name` = '" . $str_name . "', 
				`Cars_ID` = '" . $str_id . "',
				`Cars_Price` = '" . $str_price . "',
				`Cars_Active` = '1'
				");
			if ($result)
			return 1;
			return 0;
		}	
		public static function SaveEditToys($str_name,$str_id,$str_price,$str_uid) {
			$str_name = mysqli_real_escape_string(THCMS_Controller::$connect,$str_name);
			$str_id = mysqli_real_escape_string(THCMS_Controller::$connect,$str_id);
			$str_price = mysqli_real_escape_string(THCMS_Controller::$connect,$str_price);
			$result = mysqli_query(THCMS_Controller::$connect,"
				UPDATE `mt_cms_shop_toys` SET  
				`Toys_Name` = '" . $str_name . "', 
				`Toys_ID` = '" . $str_id . "',
				`Toys_Price` = '" .$str_price. "'
				 WHERE `id` = '".$str_uid."'
				 ");
			if ($result)
			return 1;
			return 0;
		}

		public static function CreatPanelShopToys($str_name,$str_id,$str_price) {
			$str_name = mysqli_real_escape_string(THCMS_Controller::$connect,$str_name);
			$str_id = mysqli_real_escape_string(THCMS_Controller::$connect,$str_id);
			$str_price = mysqli_real_escape_string(THCMS_Controller::$connect,$str_price);
			$result = mysqli_query(THCMS_Controller::$connect,
				"INSERT INTO   `mt_cms_shop_toys` SET  
				`Toys_Name` = '" . $str_name . "', 
				`Toys_ID` = '" . $str_id . "',
				`Toys_Price` = '" . $str_price . "',
				`Toys_Active` = '1'
				");
			if ($result)
			return 1;
			return 0;
		}
		public static function SaveEditVIP($str_name,$str_id,$str_price,$str_info,$active,$str_uid) {
			$str_name = mysqli_real_escape_string(THCMS_Controller::$connect,$str_name);
			$str_id = mysqli_real_escape_string(THCMS_Controller::$connect,$str_id);
			$str_price = mysqli_real_escape_string(THCMS_Controller::$connect,$str_price);
			$str_info = mysqli_real_escape_string(THCMS_Controller::$connect,$str_info);
			$active = mysqli_real_escape_string(THCMS_Controller::$connect,$active);
			$result = mysqli_query(THCMS_Controller::$connect,"
				UPDATE `mt_cms_shop_vip` SET  
				`VIP_Name` = '" . $str_name . "', 
				`VIP_DonateRank` = '" . $str_id . "',
				`VIP_Price` = '" .$str_price. "',
				`VIP_Info`  = '" .$str_info. "',
				`VIP_Active` = '" .$active. "'
				 WHERE `id` = '".$str_uid."'
				 ");
			if ($result)
			return 1;
			return 0;
		}	
		public static function CreatPanelShopVIP($str_name,$str_id,$str_info,$str_price) {
			$str_name = mysqli_real_escape_string(THCMS_Controller::$connect,$str_name);
			$str_id = mysqli_real_escape_string(THCMS_Controller::$connect,$str_id);
			$str_info = mysqli_real_escape_string(THCMS_Controller::$connect,$str_info);
			$str_price = mysqli_real_escape_string(THCMS_Controller::$connect,$str_price);
			$result = mysqli_query(THCMS_Controller::$connect,
				"INSERT INTO   `mt_cms_shop_vip` SET  
				`VIP_Name` = '" . $str_name . "', 
				`VIP_DonateRank` = '" . $str_id . "',
				`VIP_Info` = '" . $str_info . "',
				`VIP_Price` = '" . $str_price . "',
				`VIP_Active` = '1'
				");
			if ($result)
			return 1;
			return 0;
		}
		public static function SaveLogsStore($str_item, $str_loai,$str_user,$str_iduser,$str_credits_before,$str_credits_after,$str_price) {
			$str_item = mysqli_real_escape_string(THCMS_Controller::$connect,$str_item);
			$str_loai = mysqli_real_escape_string(THCMS_Controller::$connect,$str_loai);
			$str_user = mysqli_real_escape_string(THCMS_Controller::$connect,$str_user);
			$str_iduser = mysqli_real_escape_string(THCMS_Controller::$connect,$str_iduser);
			$str_credits_before = mysqli_real_escape_string(THCMS_Controller::$connect,$str_credits_before);
			$str_credits_after = mysqli_real_escape_string(THCMS_Controller::$connect,$str_credits_after);
			$str_price  = mysqli_real_escape_string(THCMS_Controller::$connect,$str_price);
			$result = mysqli_query(THCMS_Controller::$connect,
				"INSERT INTO   `mt_cms_log` SET  
				`Items` = '" . $str_item . "', 
				`Loai` = '" . $str_loai . "',
				`Username` = '" . $str_user . "',
				`IDUser` = '" . $str_iduser . "',
				`Credits_before` = '" . $str_credits_before . "',
				`Credits_after`  = '" . $str_credits_after . "',
				`Price` = '" . $str_price . "',
				`Time` = '" . time() . "',
				`Time_Text` = '" . gmdate("H:i:s - d/m/Y", time() +7  * 3600) . "'
				");
			if ($result)
			return 1;
			return 0;
		}
		public static function SaveLogsReloadCard($str_user,$str_id_user,$str_card_name,$str_card_price,$str_card_content,$str_card_status,$str_card_seri,$str_card_pin, $secret) {
			$str_user = mysqli_real_escape_string(THCMS_Controller::$connect,$str_user);
			$str_id_user = mysqli_real_escape_string(THCMS_Controller::$connect,$str_id_user);
			$str_card_name = mysqli_real_escape_string(THCMS_Controller::$connect,$str_card_name);
			$str_card_price = mysqli_real_escape_string(THCMS_Controller::$connect,$str_card_price);
			$str_card_content = mysqli_real_escape_string(THCMS_Controller::$connect,$str_card_content);
			$str_card_status = mysqli_real_escape_string(THCMS_Controller::$connect,$str_card_status);
			$str_card_seri = mysqli_real_escape_string(THCMS_Controller::$connect,$str_card_seri);
			$str_card_pin = mysqli_real_escape_string(THCMS_Controller::$connect,$str_card_pin);
			$result = mysqli_query(THCMS_Controller::$connect,
				"INSERT INTO   `mt_cms_napthe_log` SET  
				`Username` = '" . $str_user . "', 
				`ID_User` = '" . $str_id_user . "', 
				`NameCard` = '" . $str_card_name . "', 
				`PriceCard` = '" . $str_card_price . "', 
				`ContentCard` = '" . $str_card_content . "', 
				`SeriCard` = '" . $str_card_seri . "', 
				`PinCard` = '" . $str_card_pin . "', 
				`StatusCard` = '" . $str_card_status . "', 
				`trans_id` = '".$secret."',
				`TimeCard` = '" . time() . "'
				");
			if ($result)
			return 1;
			return 0;
		}
		 public static function SaveLongNapMoMo($transid,$numberphone,$userbank,$amount,$content,$time,$userid,$username,$status) {
			$transid = mysqli_real_escape_string(THCMS_Controller::$connect,$transid);
			$numberphone = mysqli_real_escape_string(THCMS_Controller::$connect,$numberphone);
			$userbank = mysqli_real_escape_string(THCMS_Controller::$connect,$userbank);
			$amount = mysqli_real_escape_string(THCMS_Controller::$connect,$amount);
			$content = mysqli_real_escape_string(THCMS_Controller::$connect,$content);
			$time = mysqli_real_escape_string(THCMS_Controller::$connect,$time);
			$userid = mysqli_real_escape_string(THCMS_Controller::$connect,$userid);
			$username = mysqli_real_escape_string(THCMS_Controller::$connect,$username);
			$status = mysqli_real_escape_string(THCMS_Controller::$connect,$status);
			$result = mysqli_query(THCMS_Controller::$connect,
				"INSERT INTO   `mt_cms_napthe_momo` SET  
				`TransID` = '" . $transid . "',
				`PhoneNumber` = '" . $numberphone . "',
				`UserBank` = '" . $userbank . "',
				`Amount` = '" . $amount . "',
				`Content` = '" . $content . "',
				`Time` = '" . $time . "', 
				`UserID` = '" . $userid . "',
				`Username` = '" . $username . "',
				`Status` = '" . $status . "'
				");
			if ($result)
			return 1;
			return 0;
		}
		public static function CURL(){
			return function_exists('curl_version');
		}
		public static function APIReloadCardGamebank($str_seri,$str_pin,$str_card_type,$str_price_guest,$str_note,$str_merchant_id,$str_api_user,$str_api_password){
		if (THCMS_Controller_Function::CURL()) {
		$fields = array(
			'merchant_id' => $str_merchant_id,
			'pin' => $str_pin,
			'seri' => $str_seri,
			'price_guest' => $str_price_guest,
			'card_type' => $str_card_type,
			'note' => $str_note
		);
		$ch = curl_init("https://sv.gamebank.vn/api/card");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
		curl_setopt($ch, CURLOPT_TIMEOUT, 120);
		curl_setopt($ch, CURLOPT_USERPWD, $str_api_user . ":" . $str_api_password);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		$result = curl_exec($ch);
		$result = json_decode($result);

		$return = array(
			'code' => $result->code,
			'msg' => $result->msg,
			'info_card' => $result->info_card,
			'transaction_id' => $result->transaction_id,
		);
		
	} else {
		//Trường hợp máy chủ chưa bật cURL
		$result =  file_get_contents("http://sv.gamebank.vn/api/card2?merchant_id=".$str_merchant_id."&api_user=".trim($str_api_user)."&api_password=".trim($str_api_password)."&pin=".trim($str_pin)."&seri=".trim($str_seri)."&card_type=".intval($str_card_type)."&price_guest=".$str_price_guest."&note=".urlencode($str_note)."");   
		$result = str_replace("\xEF\xBB\xBF",'',$result); 
		$result = json_decode($result);
		$return = array(
			'code' => $result->code,
			'msg' => $result->msg,
			'info_card' => $result->info_card,
			'transaction_id' => $result->transaction_id,
		);
	}
	return $return;
		}
		public static function APITheSieuToc($str_key,$str_pin,$str_seri,$str_type,$str_price,$str_content) {
			$url = "https://thesieutoc.net/chargingws/v2?APIkey=" . $str_key . "&mathe=" . $str_pin . "&seri=" . $str_seri . "&type=" . $str_type . "&menhgia=" . $str_price . "&content=" . urlencode($str_content);
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, 1);
			$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			curl_setopt($ch, CURLOPT_REFERER, $actual_link);
			curl_setopt($ch, CURLOPT_CAINFO, __DIR__ .'/curl-ca-bundle.crt');
            curl_setopt($ch, CURLOPT_CAPATH, __DIR__ .'/curl-ca-bundle.crt');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$out = json_decode(curl_exec($ch));
			if (isset($out->status)) {
				$error = 200;
			}
			
			return array(
			'check' => $error, // trả về 200 là hoạt động
			'msg' => $out->msg,
			'url' => $url,
			'status' => $out->status, // tham số này trả ra nếu bằng 00 thì thành công ; bằng số khác thì thất bại , chi tiết lỗi nằm ở msg
			'title' => $out->title, // thông báo thất bại hay thành công :v		 
			'amount' => $str_price // thông báo thất bại hay thành công :v		 
			);
		}
		
		public static function ValidateCallback($out){ //Hàm kiểm tra callback từ sever
    		if (isset($out['status'],
    		$out['serial'],
    		$out['pin'],
    		$out['card_type'],
    		$out['amount'],
    		$out['content'],
    		$out['real_amount'])) {
    			return $out; //xác thực thành công, return mảng dữ liệu từ sever trả về.
    
    		} else {
    			return false; //Xác thực callback thất bại.
    		}
	    }
		
		
		public static function UpdateTotalMoney() {
			$result = mysqli_query(THCMS_Controller::$connect, "SELECT * FROM accounts WHERE `Level`  > '3'");
				while ($row = mysqli_fetch_assoc($result)) {
				$total = $row['Money']+$row['Bank'];
				mysqli_query(THCMS_Controller::$connect,"UPDATE `accounts` SET  `TotalChartsMoney` = '".$total."' WHERE `id` = '".$row['id']."'");
			}
			
		}
		public static function TotalAmountMoMo($value) {
			if($value == 'TotalAmount'){
				$result = mysqli_query(THCMS_Controller::$connect,"SELECT SUM(Amount) AS 'Amount' FROM mt_cms_napthe_momo");
			}elseif($value == 'AmountUser'){
				 $result = mysqli_query(THCMS_Controller::$connect,"SELECT SUM(Amount) AS 'Amount' FROM `mt_cms_napthe_momo` WHERE `Status` = '2'");
			}
				$row    = mysqli_fetch_assoc($result);
			
			return $row;
		}
		public static function LoadCharts($value) {
			if($value == 'top-level'){
				$return = array();
				$result = mysqli_query(THCMS_Controller::$connect, "SELECT * FROM `accounts` WHERE `AdminLevel`  < '1' ORDER BY  `Level` DESC LIMIT 20");
				if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
				$return[] = $row;
				}
				return $return;
				}
			}
			if($value == 'top-money'){
				$return = array();
				$result = mysqli_query(THCMS_Controller::$connect, "SELECT * FROM `accounts` WHERE `AdminLevel`  < '1' ORDER BY  `TotalChartsMoney` DESC LIMIT 20");
				if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
				$return[] = $row;
				}
				return $return;
				}
			}
			if($value == 'top-credits'){
				$return = array();
				$result = mysqli_query(THCMS_Controller::$connect, "SELECT * FROM `accounts` WHERE `AdminLevel`  < '1' ORDER BY  `Credits` DESC LIMIT 20");
				if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
				$return[] = $row;
				}
				return $return;
				}
			}
			if($value == 'top-online'){
				$return = array();
				$result = mysqli_query(THCMS_Controller::$connect, "SELECT * FROM `accounts` WHERE `AdminLevel`  < '1' ORDER BY  `ConnectedTime` DESC LIMIT 20");
				if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
				$return[] = $row;
				}
				return $return;
				}
			}
			if($value == 'top-fame'){
				$return = array();
				$result = mysqli_query(THCMS_Controller::$connect, "SELECT * FROM `accounts` WHERE `AdminLevel`  < '1' ORDER BY  `DanhVong` DESC LIMIT 200");
				if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
				$return[] = $row;
				}
				return $return;
				}
			}
		}
		public static function LoadPanelList($value) {
			if($value == 'load-reload'){
				$return = array();
				$result = mysqli_query(THCMS_Controller::$connect, "SELECT * FROM `mt_cms_napthe_log` WHERE `StatusCard` = '2' ORDER BY  `id` DESC ");
				if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
				$return[] = $row;
				}
				return $return;
				}
			}
			if($value == 'load-change-name'){
				$return = array();
				$result = mysqli_query(THCMS_Controller::$connect, "SELECT * FROM `mt_cms_change_name` ORDER BY  `id` DESC ");
				if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
				$return[] = $row;
				}
				return $return;
				}
			}
			if($value == 'load-member'){
				$return = array();
				$result = mysqli_query(THCMS_Controller::$connect, "SELECT * FROM `accounts` ORDER BY  `id` DESC ");
				if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
				$return[] = $row;
				}
				return $return;
				}
			}
			if($value == 'load-nap-momo'){
				$return = array();
				$result = mysqli_query(THCMS_Controller::$connect, "SELECT * FROM `mt_cms_napthe_momo` ORDER BY  `id` DESC ");
				if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
				$return[] = $row;
				}
				return $return;
				}else{
				 return 0;
				}
			}
			if($value == 'load-nap-momo-2'){
				$return = array();
				$result = mysqli_query(THCMS_Controller::$connect, "SELECT * FROM `mt_cms_napthe_momo` WHERE `Status` = '2'  ORDER BY  `id` DESC ");
				if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
				$return[] = $row;
				}
				return $return;
				}else{
				return 0;
				}
			}
			if($value == 'load-nap-momo-3'){
				$return = array();
				$result = mysqli_query(THCMS_Controller::$connect, "SELECT * FROM `mt_cms_napthe_momo` WHERE `Status` = '1'  ORDER BY  `id` DESC ");
				if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
				$return[] = $row;
				}
				return $return;
				}else{
				return 0;
				}
			}
			if($value == 'banip'){
				$return = array();
				$result = mysqli_query(THCMS_Controller::$connect, "SELECT * FROM `ip_bans`");
				if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
				$return[] = $row;
				}
				return $return;
				}
			}
			
		}
		public static function LoadPanelShop($value) {
			if($value == 'ShopToys'){
				$return = array();
				$result = mysqli_query(THCMS_Controller::$connect, "SELECT * FROM `mt_cms_shop_toys` ORDER BY  `Toys_Price` ASC ");
				if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
				$return[] = $row;
				}
				return $return;
				}
			}
			
		}
		public static function UpdateSkinTuiDo($invid, $inv_amount, $inv_amount_value,$id) {
			$result = mysqli_query(THCMS_Controller::$connect,"UPDATE `accounts` SET  `".$invid."` = '1', `".$inv_amount."`= '".$inv_amount_value."' WHERE `id` = '".$id."'");
			if ($result)
			return 1;
			return 0;
		}
		public static function LoadHistory($value,$str) {
			if($value == 'NapThe'){
				$return = array();
				$result = mysqli_query(THCMS_Controller::$connect, "SELECT * FROM `mt_cms_napthe_log` WHERE `ID_User` = '".$str."' ORDER BY  `id` DESC");
				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						$return[] = $row;
					}
					return $return;
				}else{
					 return 0;
				}
			}elseif($value == 'NapMoMo'){
				$return = array();
				$result = mysqli_query(THCMS_Controller::$connect, "SELECT * FROM `mt_cms_napthe_momo` WHERE `UserID` = '".$str."' ORDER BY  `id` DESC");
				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						$return[] = $row;
					}
					return $return;
				}else{
					 return 0;
				}
			}
			
		}
		public static function cURL_API ($url){
			$curl = curl_init();
			curl_setopt_array($curl, array(
  			CURLOPT_URL => $url,
  			CURLOPT_RETURNTRANSFER => true,
  			CURLOPT_ENCODING => '',
  			CURLOPT_MAXREDIRS => 10,
  			CURLOPT_TIMEOUT => 0,
  			CURLOPT_FOLLOWLOCATION => true,
  			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  			CURLOPT_CUSTOMREQUEST => 'GET',
			));
			$response = curl_exec($curl);
			curl_close($curl);
			return $response;
		}
		public static function Get_Auto_Momo(){
			$url = ''.self::$system_set['api_url_momo'].'/historyapimomo/'. self::$system_set['api_key_momo'].'';
			$data = self::cURL_API($url); 
			$str = json_decode($data,true);
				foreach ($str['momoMsg']['tranList'] as $data) {
					$SDT = $data['partnerId'];
					$UserBank   = $data['partnerName'];
					$SoTien     = $data['amount'];
					$NoiDung    = $data['comment'];
					$TransID    = $data['tranId'];
					$Time       = $data['clientTime'];
						if ($data['io'] == 1) {
							//Get số tiền bằng hoặc lớn hơn 10.000 VND sẽ tiến hành xử lý
    						if($SoTien >= 10000){
    							//Check TransID Có tồn tại trên Mysql không
    							if (!self::CheckTransIDMoMo($TransID)){
    								//Kiểm Tra Thông tin tài khoản có tồn tại hay không
    								if (!self::KiemTraAccounts($NoiDung)){
    									$player = self::GetNameAccounts($NoiDung);
    									$credits = ($SoTien / 10);
    									self::UpdateAddCredits($credits, $player['id']);
    									self::SaveLongNapMoMo($TransID,$SDT,$UserBank,$SoTien,$NoiDung,$Time,$player['id'],$player['Username'],'2');
    								}else{ 
										//Lưu Log Momo nhưng không tìm thấy Tài khoản
    									self::SaveLongNapMoMo($TransID,$SDT,$UserBank,$SoTien,$NoiDung,$Time,'0','NoName','1');
    								}
    							}
    						}//End Get SoTien 10.000VND
							
						}//End Data io
					
				}//End foreach
		}
	

}