<?php
/**
 * Main entry point for the application.
 *
 * File sets up the necessary dependencies and handles the email sending endpoint.
 *
 * PHP version 7.4
 *
 * @category Application
 * @package  Levart
 * @author   Damar <damarsuryosasono@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     https://github.com/yourusername/yourrepository
 */

require_once 'vendor/autoload.php';

use Levart\Database;
use Levart\EmailSender;

use League\OAuth2\Server\AuthorizationServer;
use League\OAuth2\Server\Grant\ClientCredentialsGrant;
use League\OAuth2\Server\ResourceServer;
use League\OAuth2\Server\Middleware\ResourceServerMiddleware;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../config');
$dotenv->load();
$config = include_once __DIR__ . '/../config/config.php';

$db = new Database($config['db']);
$emailSender = new EmailSender($config['email']);

// OAuth2 setup here

if ($_SERVER['REQUEST_METHOD'] === 'POST'
    && $_SERVER['REQUEST_URI'] === '/send-email'
) {
    $input = json_decode(file_get_contents('php://input'), true);

    if (!isset($input['to'], $input['subject'], $input['message'])) {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid input']);
        exit;
    }

    $to = $input['to'];
    $subject = $input['subject'];
    $message = $input['message'];

    $status = $emailSender->sendEmail($to, $subject, $message) ? 'sent' : 'failed';

    $db->insertEmail($to, $subject, $message, $status);

    echo json_encode(['status' => $status]);
}
