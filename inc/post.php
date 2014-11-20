<?php
function p(){
  extract($_POST);
  
  $r = FALSE;

  if(isset($form_id) && function_exists("form_$form_id")){
    $r = call_user_func("form_$form_id");
  }
  
  return $r;
}