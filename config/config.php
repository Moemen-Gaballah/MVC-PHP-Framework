<?php 

define('DEBUG', true);

// DB config
define('DB_NAME', 'DB_MVC'); // database name
define('DB_USER', 'root'); // database user
define('DB_PASSWORD', ''); // database password
define('DB_HOST', '127.0.0.1'); // database host ***use IP address to avoid DNS lookup

define('DEFAULT_CONTROLLER', 'Home'); // default controller if there isn't one defiened in the url;
define('DEFAULT_LAYOUT', 'default'); // if no layout is set in controller use this layout.

define('PROOT', 'http://localhost/Projects/mvc/'); // set this to '/' for a live server.

define('SITE_TITLE', 'Moemen MVC Framework'); // This will be used if no site title is set

