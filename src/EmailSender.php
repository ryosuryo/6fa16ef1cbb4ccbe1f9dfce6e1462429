<?php
/**
 * Specify the PHP version
 * This line indicates the minimum PHP version required for this file
 * Change '8.0' to your required version
 * 
 * @category Configuration
 * @package  Levart
 * @author   Damar Suryo Sasono <damarsuryosasono@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     https://github.com/ryosuryo/6fa16ef1cbb4ccbe1f9dfce6e1462429
 */
declare(strict_types=1);

/**
 * EmailSender class for handling email operations using PHPMailer.
 *
 * This file contains the EmailSender class which provides functionality
 * to send emails using the PHPMailer library.
 *
 * @category Email
 * @package  Levart
 * @author   Damar Suryo Sasono <damarsuryosasono@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     https://github.com/ryosuryo/6fa16ef1cbb4ccbe1f9dfce6e1462429
 * /

/**
 * EmailSender class for handling email operations using PHPMailer.
 */

namespace Levart;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

/**
 * EmailSender class for handling email operations using PHPMailer.
 *
 * @category Email
 * @package  Levart
 * @author   Damar Suryo Sasono <damarsuryosasono@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     https://github.com/ryosuryo/6fa16ef1cbb4ccbe1f9dfce6e1462429
 */
class EmailSender
{
    /**
     * Holds the PHPMailer instance used for sending emails.
     *
     * @var PHPMailer
     */

    public $mailer;

    /**
     * Constructor for EmailSender class.
     *
     * @param array $config Configuration array containing SMTP settings.
     */
    public function __construct(array $config)
    {
        $this->mailer = new PHPMailer(true);
        $this->mailer->isSMTP();
        $this->mailer->Host = $config['host'];
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = $config['username'];
        $this->mailer->Password = $config['password'];
        $this->mailer->SMTPSecure = 'tls';
        $this->mailer->Port = $config['port'];
    }

    /**
     * Send an email
     *
     * @param string $to      Recipient's email address
     * @param string $subject Email subject
     * @param string $message Email body
     *
     * @return bool True if sent successfully, false otherwise
     */
    public function sendEmail($to, $subject, $message)
    {
        try {
            $this->mailer->setFrom('from@example.com', 'Mailer');
            $this->mailer->addAddress($to);
            $this->mailer->isHTML(true);
            $this->mailer->Subject = $subject;
            $this->mailer->Body = $message;
            $this->mailer->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
