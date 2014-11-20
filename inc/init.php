<?php
define("ROOT", $_SERVER['DOCUMENT_ROOT']);
define("LESS", ROOT."/less");
define("CSS", ROOT."/css");
define("JS", ROOT."/js");
define("CACHE", ROOT."/cache");

include("date.php");

$vars = array();

function vars(&$vars, $arr = array()){  
  $vars = array_merge($arr, $vars);
  return $vars;
}

$vars = vars($vars, array());
global $vars;

extract($_GET);

include("utility.php");
include("path.php");
include("mysql.php");
include("user.php");
user($vars);
users($vars);

include("session.php");

extract($vars);