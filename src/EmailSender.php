<?php
/**
 * EmailSender class for handling email operations using PHPMailer.
 *
 * This file contains the EmailSender class which provides functionality
 * to send emails using the PHPMailer library.
 *
 * @category Email
 * @package  Levart
 * @author   Damar <damarsuryosasono@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     https://github.com/yourusername/yourrepository
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
 * @author   Damar <damarsuryosasono@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     https://github.com/yourusername/yourrepository
 */
class EmailSender
{
    /**
     * Holds the PHPMailer instance used for sending emails.
     * 
     * @var PHPMailer
     */
    
    private $_mailer;

    /**
     * Constructor for EmailSender class.
     *
     * @param array $config Configuration array containing SMTP settings.
     */
    public function __construct(array $config)
    {
        $this->_mailer = new PHPMailer(true);
        $this->_mailer->isSMTP();
        $this->_mailer->Host = $config['host'];
        $this->_mailer->SMTPAuth = true;
        $this->_mailer->Username = $config['username'];
        $this->_mailer->Password = $config['password'];
        $this->_mailer->SMTPSecure = 'tls';
        $this->_mailer->Port = $config['port'];
    }

    /**
     * Send an email
     *
     * @params string $to Recipient's email address
     * @params string $subject Email subject
     * @params string $message Email body
     * @return bool True if sent successfully, false otherwise
     */
    public function sendEmail($to, $subject, $message)
    {
        try {
            $this->_mailer->setFrom('from@example.com', 'Mailer');
            $this->_mailer->addAddress($to);
            $this->_mailer->isHTML(true);
            $this->_mailer->Subject = $subject;
            $this->_mailer->Body = $message;
            $this->_mailer->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
