<?php
define('ABSPATH',__DIR__); #loading php  #double underscore indicates where the file actually is
define('ADMIN_PATH', ABSPATH.'/admin');
define('ADMIN_SCRIPT_PATH', ADMIN_PATH.'/scripts');


ini_set('display_errors', 1);
require_once ABSPATH.'/config/database.php';
require_once ADMIN_SCRIPT_PATH.'/admin/scripts/read.php';