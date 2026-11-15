<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;

final class Page
{
    public function __construct(private readonly Database $database)
    {
    }

    public function welcomeMessage(): string
    {
        $statement = $this->database->connection()->query(
            'SELECT content FROM pages ORDER BY id ASC LIMIT 1'
        );

        return (string) $statement->fetchColumn();
    }
}
