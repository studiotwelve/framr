<?php

function request_path(){
	static $path;
	
	if(isset($path)){
		return $path;	
	}
	
	if(isset($_GET['q'])&&is_string($_GET['q'])){
		$path = $_GET['q'];
		
	}elseif(isset($_SERVER['REQUEST_URI'])){
		$request_path = strtok($_SERVER['REQUEST_URI'], '?');
		
		$base_path_len = strlen(rtrim(dirname($_SERVER['SCRIPT_NAME']), '\/'));
		
		$path = substr(urldecode($request_path), $base_path_len + 1);
		
		if($path == basename($_SERVER['PHP_SELF'])){
			$path = '';
		}
	}else{
		$path = '';
	}
	
	$path = trim($path, '/');
	
	return $path;
}

function q(){
	$_GET['q'] = request_path();
}

q();

if(empty($q)){
	$q="/";
	$is_front=TRUE;
}

function file_is($path){
	if(!file_exists($path)){
		return FALSE;
	}
	
	if(file_exists($path)){
		return $path;
	}
}