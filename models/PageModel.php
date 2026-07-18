<?php
require_once __DIR__ . '/../config/database.php';

class PageModel
{
    public static function getWelcomeMessage()
    {
        $db   = Database::connect();
        $stmt = $db->prepare("SELECT content FROM pages");
        $stmt->execute();
        return $stmt->fetchColumn(); // returns just the content
    }
}
