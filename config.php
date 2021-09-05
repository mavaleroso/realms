<?php

define('BASE_URL', isset($_SERVER['HTTPS']) ? 'https://' . $_SERVER['SERVER_NAME'] : 'http://' . $_SERVER['SERVER_NAME']);
define('APP_NAME', 'ReALMS');

// database
define('SERVER_NAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'realms_db');
