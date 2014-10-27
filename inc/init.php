<?php
define("ROOT",$_SERVER['DOCUMENT_ROOT']);
define("LESS", ROOT."/less");
define("CSS", ROOT."/css");
define("JS", ROOT."/js");
define("CACHE", ROOT."/cache");

global $vars;
$vars = array(
  "site" => array(
    "mysql" => array(),
  ),
);

extract($_GET);

include("path.php");
include("config.php");
include("mysql.php");
include("user.php");
include("session.php");
include("date.php");

extract($vars);

print_r($vars);