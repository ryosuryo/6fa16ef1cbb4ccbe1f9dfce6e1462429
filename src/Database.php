<?php
/**
 * Specify the PHP version
 * This line indicates the minimum PHP version required for this file
 * Change '8.0' to your required version
 * @category Configuration
 * @package  Levart
 * @author   Damar Suryo Sasono <damarsuryosasono@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     https://github.com/ryosuryo/6fa16ef1cbb4ccbe1f9dfce6e1462429
 */
declare(strict_types=1);

namespace Levart\Damar;

use PDO;

/**
 * Database class for handling database operations.
 * Class provides methods for connecting to and interacting with a PostgreSQL DB
 *
 * @category Configuration
 * @package  Levart
 * @author   Damar Suryo Sasono <damarsuryosasono@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @version  Release: 1.0
 * @link     https://github.com/ryosuryo/6fa16ef1cbb4ccbe1f9dfce6e1462429
 */
class Database
{
    /**
     * PDO instance for database connection.
     *
     * @var PDO
     */
    public PDO $pdo;

    /**
     * Database constructor.
     *
     * @param array $config Database configuration
     */
    public function __construct(array $config)
    {
        $dsn = "pgsql:host={$config['host']};dbname={$config['name']}";
        $this->pdo = new PDO($dsn, $config['user'], $config['pass']);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * Insert an email into the database.
     *
     * @param string $to      The recipient's email address
     * @param string $subject The email subject
     * @param string $message The email message
     * @param string $status  The status of the email
     *
     * @return bool Returns true on success or false on failure
     */
    public function insertEmail(string $to,
                                string $subject,
                                string $message,
                                string $status): bool
    {
        $sql = 'INSERT INTO emails (recipient, subject, message, status)
                VALUES (?, ?, ?, ?)';
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$to, $subject, $message, $status]);
    }
}
