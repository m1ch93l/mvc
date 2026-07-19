<?php

// fetch data from models
require_once '../models/PageModel.php';
$message = PageModel::getWelcomeMessage(); // the $message will be the content reflected to your database

// title of the page
$pageTitle = 'Home';

// display the view content
$viewFile = '../resources/views/home.php';

// the layout of the page
include '../resources/views/layout.php';
