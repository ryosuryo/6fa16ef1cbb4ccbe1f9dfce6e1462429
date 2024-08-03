<?php
declare(strict_types=1);

/**
 * Configuration file
 *
 * This file contains various configuration settings for the application.
 *
 * @category Configuration
 * @package  Levart_Test
 * @author   Your Name <your.email@example.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     https://github.com/yourusername/yourrepository
 */
return [
    'db' => [
        'host' => 'golden-swimmer-9805.8nk.gcp-asia-southeast1.cockroachlabs.cloud',
        'user' => 'damar',
        'pass' => 'eHGt0xgqP364qCusMFe_OQ',
        'name' => 'levart',
    ],
    'email' => [
        'host' => 'smtp.your-email-provider.com',
        'port' => 587,
        'username' => 'your-email@example.com',
        'password' => 'your-email-password',
    ],
    'oauth2' => [
        'client_id' => 'your_client_id',
        'client_secret' => 'your_client_secret',
    ],
];
