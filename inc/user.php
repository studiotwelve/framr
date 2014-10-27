<?php

function user($id = 1){
  global $conn;
  
  if($result = $conn->query("SELECT * FROM `user` WHERE `uid`=`$id`",MYSQLI_USE_RESULT)){
    while($obj = $result->fetch_object()){
      $vars['user'] = array(
        'uid' => $obj->'uid',
        'name' => $obj->'name',
        'pass' => $obj->'pass',
        'updated' => $obj->'updated',
      );
    }
    
    $result->close();
  }
}

function users(){}

function user_is_logged_in(){}

function user_login($name, $pass){}

function user_logout(int $id){}

function user_add(array $arg){}

function user_del(int $id){}