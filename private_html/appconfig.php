<?php
require_once "dbconfig.php";

#Get base path to app folder
$temp = explode(DIRECTORY_SEPARATOR, __DIR__);   #$temp contains the file path to the folder appconfig.php is found in; file path separated with '/'s
unset($temp[count($temp)-1]);   #destroys the last element in the $temp array, in this case 'private_html'
#define directory path then paths to public and private html
define('BASE_PATH', implode(DIRECTORY_SEPARATOR, $temp) . DIRECTORY_SEPARATOR);	#defines a constant named 'BASE_PATH' with elements from $temp separated by '/'s\
define('PUBLIC_PATH', BASE_PATH. 'html' . DIRECTORY_SEPARATOR);	  #defines a constant named 'WEB_PATH' that points to the folder 'html'
define('WEB_PATH', PUBLIC_PATH);
define('PRIVATE_PATH', BASE_PATH . 'private_html' . DIRECTORY_SEPARATOR);	#defines a constant named 'PRIVATE_PATH' that points to the folder 'private_html'
define('CLASS_PATH', PUBLIC_PATH . "class" . DIRECTORY_SEPARATOR);	#defines a constant named 'CLASS_ROOT' that points to the folder 'class' in 'public_html'


#Smarty-related paths
define('SMARTY_PATH', PUBLIC_PATH . 'smarty' . DIRECTORY_SEPARATOR);	#root path to smarty folder
define('SMARTY_TEMPLATES', PUBLIC_PATH . 'templates' . DIRECTORY_SEPARATOR);	#'SMARTY_TEMPLATES points to templates file in public_html
define('SMARTY', SMARTY_PATH . 'libs' . DIRECTORY_SEPARATOR . 'Smarty.class.php');	 #smarty.class.php contains code to run smarty


#Smarty required code to make Smarty functional
require_once SMARTY;
$smarty = new Smarty();    #define smarty variable
$smarty -> setTemplateDir(SMARTY_TEMPLATES);
$smarty -> setCompileDir(SMARTY_PATH . 'templates_c');
$smarty -> setCacheDir(SMARTY_PATH . 'cache');
$smarty -> setConfigDir(SMARTY_PATH . 'configs');


# Test Smarty installation
// $smarty -> testInstall();
#Autoloader for loading classes without needing to include them in every php file
function autoloader($class){
    include CLASS_PATH . $class . ".php";
}
spl_autoload_register('autoloader');