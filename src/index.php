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
 * @author   Damar Suryo Sasono <damarsuryosasono@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     https://github.com/ryosuryo/6fa16ef1cbb4ccbe1f9dfce6e1462429
 */
require_once '../vendor/autoload.php';

use Levart\Damar\Database;
use Levart\Damar\EmailSender;
use Levart\Damar\Config; // Added this line to import the Config class
use League\OAuth2\Server\AuthorizationServer;
use League\OAuth2\Server\Grant\ClientCredentialsGrant;
use League\OAuth2\Server\ResourceServer;
use League\OAuth2\Server\Middleware\ResourceServerMiddleware;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../config');
$dotenv->load();

if (!class_exists('Levart\Config')) {
    http_response_code(500);
    echo json_encode(['error' => 'Configuration class not found']);
    exit;
}

$configDb = Config::getDb(); // Use the new method to get the configuration
$configEmail = Config::getEmail(); // Use the new method to get the configuration

$db = new Database($configDb);
$emailSender = new EmailSender($configEmail);

// OAuth2 setup here

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === '/send-email'
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
