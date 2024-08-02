<?php
namespace Levart;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailSender {
    private $mailer;

    public function __construct($config) {
        $this->mailer = new PHPMailer(true);
        $this->mailer->isSMTP();
        $this->mailer->Host = $config['host'];
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = $config['username'];
        $this->mailer->Password = $config['password'];
        $this->mailer->SMTPSecure = 'tls';
        $this->mailer->Port = $config['port'];
    }

    public function sendEmail($to, $subject, $message) {
        try {
            $this->mailer->setFrom('from@example.com', 'Mailer');
            $this->mailer->addAddress($to);
            $this->mailer->isHTML(true);
            $this->mailer->Subject = $subject;
            $this->mailer->Body    = $message;
            $this->mailer->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
