<?php 
$config_use_sessions = TRUE;
ini_set('session.cache_limiter','public');
session_cache_limiter(false);

    // include('plugins/swiftmailer/autoload.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
# Default time zone for the webapplication  
date_default_timezone_set('Asia/Colombo');
# project
# project
#define('SITE_NAME', 'myBlog');


# Emails 

# Contact
define('EMAIL_ONE', 'nilanga.perera@gmail.com');
// define('MOBILE', ' +94 71 222 22 22');
define('PHONE', ' +94 718724448');

define('ADDRESS', 'No: 75/3, Uswatta Circukar Road, Moratuwa, Sri Lanka');
?>