<?php
/**
 * Database class for handling database operations.
 * Class provides methods for connecting to and interacting with a PostgreSQL DB
 *
 * @category Configuration
 * @package  Levart
 * @author   Damar Suryo Sasono <damarsuryosasono@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     https://github.com/ryosuryo/6fa16ef1cbb4ccbe1f9dfce6e1462429
 */
namespace Levart;

/**
 * Configuration file
 *
 * This file contains various configuration settings for the application.
 *
 * @category Configuration
 * @package  Levart_Test
 * @author   Damar Suryo Sasono <damarsuryosasono@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     https://github.com/ryosuryo/6fa16ef1cbb4ccbe1f9dfce6e1462429
 */
class Config
{
    // Constructor to initialize configurations if needed
    /**
     * Config constructor.
     *
     * Initializes the configuration settings for the application.
     */
    public function __construct()
    {
        // Initialization code can go here
    }

    private static $_db = [
        'host' => 'golden-swimmer-9805.8nk.gcp-asia-southeast1.cockroachlabs.cloud',
        'user' => 'damar',
        'pass' => 'eHGt0xgqP364qCusMFe_OQ',
        'name' => 'levart',
    ];

    private static $_email = [
        'host' => 'smtp.your-email-provider.com',
        'port' => 587,
        'username' => 'your-email@example.com',
        'password' => 'your-email-password',
    ];

    private static $_oauth2 = [
        'client_id' => 'your_client_id',
        'client_secret' => 'your_client_secret',
    ];

    /**
     * Get the database configuration.
     *
     * @return array Database configuration settings.
     */
    public static function getDb()
    {
        return self::$_db;
    }

    /**
     * Set the database configuration.
     *
     * @param array $db Database configuration settings.
     * 
     * @return void
     */
    public static function setDb($db)
    {
        self::$_db = $db;
    }

    /**
     * Get the email configuration.
     *
     * @return array Email configuration settings.
     */
    public static function getEmail()
    {
        return self::$_email;
    }

    /**
     * Set the email configuration.
     *
     * @param array $email Email configuration settings.
     * 
     * @return void
     */
    public static function setEmail($email)
    {
        self::$_email = $email;
    }

    /**
     * Get the OAuth2 configuration.
     *
     * @return array OAuth2 configuration settings.
     */
    public static function getOauth2()
    {
        return self::$_oauth2;
    }

    /**
     * Set the OAuth2 configuration.
     *
     * @param array $oauth2 OAuth2 configuration settings.
     * 
     * @return void
     */
    public static function setOauth2($oauth2)
    {
        self::$_oauth2 = $oauth2;
    }
}
