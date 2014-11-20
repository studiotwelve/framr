<?php
function session(){
  if(!isset($_SESSION)){
  	session_id(o(session_id().$_SERVER["REMOTE_ADDR"]));
    session_name($_SERVER["SERVER_NAME"].".fsssn");

  	session_start();
  	  	
  	$s = array(
    	"id"    => session_id(),
    	"name"  => session_name(),
  		"ip" 		=> $_SERVER["REMOTE_ADDR"],
  		"date" 	=> date("U"),
  	);
  	
  	foreach($s as $k => $v){
  		if(!isset($_SESSION[$k])){
  			$_SESSION[$k] = $s[$k];
  		}
  	}
  	
  	if(isset($_SESSION["views"])){
  		$_SESSION["views"] = $_SESSION["views"]+1;
  	} else {
  		$_SESSION["views"] = 1;
  	}
  	
  	session_add();
	}
}

function session_clear(){
	session_remove();
	unset($_SESSION);
	session_destroy();
	session();
}

function session_add(){
  $db = db();
  
  $session_stored = FALSE;
  
  $id = $_SESSION["id"];
  
  if($q = $db->query("SELECT * FROM session WHERE id='$id'")){
    if($q->num_rows > 0){
      $session_stored = TRUE;
      
      $stored_session = $q->fetch_assoc();
    }
  } elseif($db->error){
    print($db->error); exit();
  }
    
  $q->close();
  
  if(isset($_SESSION["user"]) && is_array($_SESSION["user"])){
    $_SESSION["user"] = serialize($_SESSION["user"]);
  }
  
  if($session_stored && (!$stored_session == $_SESSION)){
    foreach($_SESSION as $k => $v){
      $c[] = "$k = '".$db->real_escape_string($v)."'";
    }
    
    $c = implode(", ", $c);
    
    $qry = "UPDATE session SET $c WHERE id='$id'";
  } else {
    foreach($_SESSION as $k => $v){
      $keys[] = $k;
      $vals[] = $db->real_escape_string($v);
    }
    
    $keys = implode(", ", $keys);
    
    $vals = implode("', '", $vals);
    
    $qry = "INSERT INTO session ($keys) VALUES ('$vals')";
  }
  
  if($r = $db->query($qry)){
    $session_stored = TRUE;
  } elseif($db->error){    
    print($db->error); exit();
  }
  
  return $session_stored;
}

function session_remove(){
  $db = db();
  
  if($r = $db->query("DELETE FROM session WHERE id = `".$_SESSION["id"]."`")){    
    return TRUE;
  } elseif($db->error){
    print($db->error); exit();
  }
}

session();