<?php
/**
 * Database class for handling database operations.
 * Class provides methods for connecting to and interacting with a PostgreSQL DB
 *
 * @category Configuration
 * @package  Levart
 * @author   Your Name <your.email@example.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     https://github.com/yourusername/yourrepository
 */
 namespace Levart;

/**
 * Database class for handling database operations.
 * Class provides methods for connecting to and interacting with a PostgreSQL DB
 *
 * @category Configuration
 * @package  Levart
 * @author   Your Name <your.email@example.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     https://github.com/yourusername/yourrepository
 */
class Database
{
    /**
     * PDO instance for database connection.
     *
     * @var \PDO
     */
    private $_pdo;

    /**
     * Database constructor.
     * 
     * @param array $config Database configuration
     */
    public function __construct($config)
    {
        $dsn = "pgsql:host={$config['host']};dbname={$config['name']}";
        $this->_pdo = new \PDO($dsn, $config['user'], $config['pass']);
        $this->_pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    /**
     * Insert an email into the database.
     *
     * @params string $to The recipient's email address
     * @params string $subject The email subject
     * @params string $message The email message
     * @params string $status The status of the email
     * @return bool Returns true on success or false on failure
     */
    public function insertEmail($to, $subject, $message, $status)
    {
        $sql = "INSERT INTO emails (recipient, subject, message, status)
                VALUES (?, ?, ?, ?)";
        $stmt = $this->_pdo->prepare($sql);
        return $stmt->execute([$to, $subject, $message, $status]);
    }
}
