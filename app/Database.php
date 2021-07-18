<?php
/**
 * Main abstract connection class for database connectivity using PDO
 * @author Palash
 * @version 1.0
 */
namespace app;

use PDO;
use PDOException;
use App\Helper;

class Database
{
    private $host, $username, $pass, $db, $dsn;
    public $pdo;
    
    /**
     * Default constructor of the current class
     */
    public function __construct()
    {
        $this->host     = 'localhost';
        $this->username = 'root';
        $this->pass     = '';
        $this->db       = 'db_mvc';
        $this->pdo      = NULL;
        $this->createConnection();
    }
    
    public function createConnection() {
        try
        {
            $this->dsn = "mysql:host=$this->host;dbname=$this->db";
            $this->pdo = new PDO($this->dsn, $this->username, $this->pass);
        }
        catch (PDOException $e)
        {
            /**
             * 2002 : invalid host
             * 1044 : access denied for user to access db (invalid username) 
             * 1045 : access denied for user to access db via password (no password required)
             * 1049 : unknown database
             */
            $message = Helper::getMessage('DB_UNKNOWN_ERROR');

            $code = $e->getCode();
            switch ($code)
            {
                case 2002:
                    $message = Helper::getMessage('DB_INVALID_HOST');
                break;

                case 1044:
                    $message = Helper::getMessage('DB_INVALID_USER');
                break;
                
                case 1045:
                    $message = Helper::getMessage('DB_INVALID_PASS');
                break;
                
                case 1049:
                    $message = Helper::getMessage('DB_INVALID_BASE');
                break;
            }

            echo "<code><strong>$code</strong>: " . $message . "</code>";
            exit();
        }
    }
}