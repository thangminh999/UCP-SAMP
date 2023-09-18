<?php
                        
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;                     
defined('MT_CMS') or die('Lỗi: Truy Cập Hệ Thống');
class THCMS_Controller_Mailer extends THCMS_Controller
{
       public static function SendMail($to, $name, $noidung, $tieude, $title ) {
                        require(ROOTPATH . '/PHPMailer/src/Exception.php');
                        require(ROOTPATH . '/PHPMailer/src/PHPMailer.php');
                        require(ROOTPATH . '/PHPMailer/src/SMTP.php');
                        $mail = new PHPMailer();
                        $mail->IsSMTP(); // set mailer to use SMTP
                        $mail->CharSet  = "utf-8";
                        $mail->SMTPDebug  = 0; 
                        $mail->Host = self::$system_set['SMTP'];
                        $mail->Port = self::$system_set['Port'];
                        $mail->SMTPAuth = true; // turn on SMTP authentication
                        $mail->SMTPSecure = 'ssl';
                        $mail->Username = self::$system_set['Mailer']; // your SMTP username or your gmail username
                        $mail->Password = self::$system_set['Password']; // your SMTP password or your gmail password
                        $mail->From = self::$system_set['Mailer']; 
                        $mail->FromName = $tieude; // Name to indicate where the email came from when the recepient received
                        $mail->AddAddress($to,$name);
                        $mail->AddReplyTo(self::$system_set['Mailer'],self::$system_set['title']);
                        //$mail->WordWrap = 50; // set word wrap
                        $mail->IsHTML(true); // send as HTML
                        $mail->Subject = $title;
                        //$mail->MsgHTML($noidung);
                        $mail->Body = $noidung;
                        //$mail->AltBody = $noidung;
                        if(!$mail->Send()) {
                         $error = '<div class="alert alert-danger fade show">Lỗi Khi Gửi Mail<br>Nội dung: <b>'.$mail->ErrorInfo.'</b></div">'; 
                         } else {
                         $error = '<div class="alert alert-success fade show">Hệ thống đã gứi 1 tin nhắn vào email: <b>'.$to.' </b><br>Vui lòng kiểm tra  <b>Hộp thư đến & Spam </b></div>';
                         }
                    return $error;     
                }

}