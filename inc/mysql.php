<?php

function db(){
  $c = FALSE;
  
  include('config.php');
  
  extract($db);
  
  $c = new mysqli($host, $user, $pass, $data, ((isset($port)) ? $port : null));
  
  if($c->connect_error){
    $c = $c->connect_error_no.': '.$c->connect_error;
  }
  
  return $c;
}

$db = db($vars);
global $db;