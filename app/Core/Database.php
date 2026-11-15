<?php

declare(strict_types=1);

namespace App\Core;

use PDO;

/**
 * Lazily opens a single PDO connection for the whole request.
 */
final class Database
{
    private ?PDO $connection = null;

    /**
     * @param array{driver: string, host: string, port: int, database: string, username: string, password: string, charset: string} $config
     */
    public function __construct(private readonly array $config)
    {
    }

    public function connection(): PDO
    {
        if ($this->connection instanceof PDO) {
            return $this->connection;
        }

        $dsn = sprintf(
            '%s:host=%s;port=%d;dbname=%s;charset=%s',
            $this->config['driver'],
            $this->config['host'],
            $this->config['port'],
            $this->config['database'],
            $this->config['charset'],
        );

        return $this->connection = new PDO(
            $dsn,
            $this->config['username'],
            $this->config['password'],
            [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ],
        );
    }
}
