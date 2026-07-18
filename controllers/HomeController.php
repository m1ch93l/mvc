<?php
require_once '../models/PageModel.php';
$message = PageModel::getWelcomeMessage(); // the $message will be the content reflected to your database

$pageTitle = 'Home';
$viewFile  = '../views/home.php';
include '../views/layout.php';