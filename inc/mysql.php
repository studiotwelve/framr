<?php
function conn(){
  global $conn;
  
  $h = $vars['site']['mysql']['hostname'];
  $u = $vars['site']['mysql']['username'];
  $p = $vars['site']['mysql']['password'];
  $d = $vars['site']['mysql']['database'];
  $t = null;
  
  if((!empty($vars['site']['mysql']['port']))&&(int)$vars['site']['mysql']['port']>0){
    $t=(int)$vars['site']['mysql']['port']>0;
  }
  
  $conn = mysqli_connect($h,$u,$p,$d,$t);
  
  if(!$conn){
    alert('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_error(),'error');
  }
  
  return $conn;
}

conn();

print(mysqli_get_host_info($conn));