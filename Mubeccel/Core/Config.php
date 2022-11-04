<?php
error_reporting(1);
ini_set('display_errors', 1);
define("DEBUG_MODE",    TRUE);

define('MYSQL_HOST',	'localhost');
define('MYSQL_DB',		'test');
define('MYSQL_USER',	'root');
define('MYSQL_PASS',	'');





header('Content-Type: text/html; Charset=UTF-8');
date_default_timezone_set('Europe/Istanbul');
define("ALLOWED_METHODS",   array("GET", "POST"));
define("DEFAULT_METHOD",        "GET");
define("DEFAULT_CONTROLLER",    "home");
define("DEFAULT_ACTION",        "index");
define("DEFAULT_PARAM",         "");

define("APPS_PATH", "../Mubeccel/Apps/");
define("BASE_PATH", "../Mubeccel/");
define("CORE_PATH", "../Mubeccel/Core/");
define("LAYOUTS_PATH", "../Mubeccel/Layouts/");
define("EXTS_PATH", "../Mubeccel/Plugins/");

require_once CORE_PATH . "/Mubeccel.php";
require_once BASE_PATH . "/Route.php";
require_once BASE_PATH . "/vendor/autoload.php";
define("MODEL_PATH", APPS_PATH . Mubeccel::$activeController . "/");




spl_autoload_register ( function ($class) {
    $sources = array(
        BASE_PATH . $class . ".php",
        CORE_PATH . $class . ".php",
        EXTS_PATH . $class . ".php",
    );
    $app = explode("Model", $class)[0];
    if( file_exists(APPS_PATH . $app . "/" . $class . ".php"))
    {
        require_once APPS_PATH . $app . "/" . $class . ".php";
    }
    
    foreach ($sources as $source) {
        if (file_exists($source)) {
            require_once $source;
        } 
    } 
});




?>