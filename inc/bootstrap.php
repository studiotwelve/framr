<?php
define("ROOT",$_SERVER['DOCUMENT_ROOT']);

global $vars;
$vars = array(
  "site" => array(
    "mysql" => array(),
  ),
);

include("config.php");
include("mysql.php");