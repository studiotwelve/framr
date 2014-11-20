<?php

function user(&$vars, $id = 1){
  $db = db();
  if($db){
  $r = $db->query("SELECT * FROM user WHERE `id` = $id");
  if($r){
  while($w = $r->fetch_assoc()){
    $u = $w;
  }
  
  $r->close();
  $vars["user"] = $u;
  }}
  return $vars;
}

function users(&$vars){
  $db = db($vars);
  $r = $db->query("SELECT * FROM `user`");
  
  while($w = $r->fetch_assoc()){
    $u[] = $w;
  }
  
  $r->close();
  $vars["users"] = $u;
  return $vars;
}

#Login
function user_is_logged_in(array $user){
  
}

function users_logged_in(){
  
}

function user_login(string $name, string $pass, bool $rem){
  $db = db();
  
  $pass = o($pass);
  
  $r = FALSE;
  
  if(!$q = $db->query("SELECT * FROM user WHERE `pass` = $pass")){
    if($db->error){
      $r = $db->error;
      
      die($r);
    } else {
      $r = FALSE;
    }
  } else {
    $r = TRUE;
    
    session_clear();
    
    while($u = $q->fetch_assoc()){
      $_SESSION['user'] = $u;
    }
    
    $q->close();
  }
  
  return $r;
}

function user_logout(int $uid){
  
}

function user_session(int $uid){
  
}

#Management
function user_add(array $user){
  
}

function user_del(int $uid){
  
}

function user_edit(int $uid){
  
}

function user_roles(int $uid){
  
}

function user_role_add(int $uid, int $rid){
  
}

function user_role_del(int $uid, int $rid){
  
}

function user_groups(int $uid){
  
}

function user_group_add(int $uid, int $gid){
  
}

function user_group_del(int $uid, int $gid){
  
}