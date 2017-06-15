<?php
require_once dirname(__FILE__).'/PHPMailer.php';

class Mail
{
    /**
     * @var PHPMailer
     */
    public static  $mailer;

    public static function send($to,$subject = "",$body = "")
    {
        if (self::$mailer === null) {
            self::$mailer = new PHPMailer();
        }

        $config = Yii::app()->params['webmaster'];
        $mailer = self::$mailer;
        $mailer->IsSMTP();
        $mailer->Subject = $subject;
//        $mailer->AltBody = "To view the message, please use an HTML compatible email viewer! - From home.huo.com"; // optional, comment out and test
        $mailer->SetFrom($config['email'], $config['name']);
        $mailer->Username = $config['email'];
        $mailer->Password = $config['password'];
        $mailer->SMTPAuth   = true;                  // 启用 SMTP 验证功能
        $mailer->SMTPDebug  = 1;
        $mailer->Host       = 'stmp.163.com';      // SMTP 服务器
        $mailer->Debugoutput = 'error_log';
        $mailer->MsgHTML($body);
        $mailer->AddAddress($to, strstr($to, '@', true) );
        if (!$mailer->Send()) {
            return $mailer->ErrorInfo;
        }else {
            return true;
        }

    }
}
