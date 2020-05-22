<?php

// Always provide a TRAILING SLASH (/) AFTER A PATH
define("DEBUG", TRUE);
define('URL', '/profad/');
define('LIBS', 'libs/');
define('PATH', dirname(dirname(__FILE__)));

define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'profad');
define('DB_USER', 'root');
define('DB_PASS', 'root.user');

// The sitewide hashkey, do not change this because its used for passwords!
// This is for other hash keys... Not sure yet
define('HASH_GENERAL_KEY', 'MixitUp2015');

// This is for database passwords only
define('HASH_PASSWORD_KEY', 'catsFLYhigh2015profad');