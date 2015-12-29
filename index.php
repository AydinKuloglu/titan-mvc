<?php
/**
 * TITAN Mini MVC Framework
 * 
 * Titan is a simple mvc application framework for php developers.
 *
 * @author 		Turan Karatuğ - <tkaratug@hotmail.com.tr> - <www.turankaratug.com>
 * @version 	1.0.4
 * @copyright	2015
 * @license		https://opensource.org/licenses/MIT
 * @link 		https://github.com/tkaratug/titan-mvc
 */

// Constants
define('BASE_DIR', '/');
define('ROOT_DIR', realpath(dirname(__FILE__)) .'/');
define('SYSTEM_DIR', ROOT_DIR .'system/');
define('APP_DIR', ROOT_DIR .'app/');
define('VERSION', '1.0.4');
define('DIRECT', true);
define('ENVIRONMENT', 'production'); // production | development

// Error Reporting
if(ENVIRONMENT == 'production') {
    error_reporting(0);
    ini_set('display_errors', 0);
} else {
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
}

// Autoload Core Classes
function autoload_core($class_name) {
    require_once SYSTEM_DIR . 'core/' . $class_name . '.php';
}

spl_autoload_register('autoload_core');

// Starting Titan
$app = new App();
