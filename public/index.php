<?php
if (empty($_GET['page'])) {
    header('Location: ?page=home');
    exit;
}

$page = $_GET['page'];

switch ($page) {
    case 'home':
        require_once '../controllers/HomeController.php';
        break;
    case 'about':
        require_once '../controllers/AboutController.php';
        break;
    default:
        echo "404 Not Found";
        break;
}

