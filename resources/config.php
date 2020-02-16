<?php

ob_start();
session_start();
session_destroy();

// Define directory separator
define('DS', DIRECTORY_SEPARATOR);

// Define directory path
define('TEMPLATE_FRONT', __DIR__ . DS . 'templates/front');
define('TEMPLATE_BACK', __DIR__ . DS . 'templates/back');

// DB connect with constant
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '91221');
define('DB_NAME', 'ecommerce');

// DB connect query
$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Add functions file
require_once 'functions.php';