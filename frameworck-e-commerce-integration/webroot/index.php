<?php
define("DS", DIRECTORY_SEPARATOR);
define("ROOT", dirname(dirname(__FILE__)));

define("WEBROOT", ROOT.DS."views");
define("APP", ROOT.DS."app");

define("LIB", APP.DS."lib");
define("CONF", APP.DS."config");
define("MVC", APP.DS."mvc");

require_once(CONF.DS."init.php");
require_once(CONF.DS."config.php");

$uri = $_SERVER['REQUEST_URI'];
$uri = urldecode(trim($uri, "/"));

$router = new Router($uri);
$app = App::run($uri);

?>
