<?php

namespace Core;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mail
{
    protected $PHPMailer;
    protected $recepient = 'asamofalov63@gmail.com';

    function __construct()
    {
        $this->PHPMailer = new PHPMailer(true);
        $this->SetParams();
    }

    public function Send($subject, $msg)
    {
        $this->PHPMailer->Subject = $subject;
        $this->PHPMailer->Body = $msg;

        $this->PHPMailer->send();
    }

    protected function SetParams()
    {
        $this->PHPMailer->IsSMTP();
        $this->PHPMailer->Host       = 'smtp.yandex.ru';
        $this->PHPMailer->SMTPAuth   = true;
        $this->PHPMailer->Username   = 'support@blackbeans.ru';
        $this->PHPMailer->Password   = '16101970pop';
        $this->PHPMailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $this->PHPMailer->Port       = 465;

        $this->PHPMailer->setFrom($this->PHPMailer->Username, 'Dev project');
        $this->PHPMailer->addAddress($this->recepient, 'asamofalov');
    }
}