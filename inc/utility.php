<?php
function t(){//Text
  
}

function l(){//Link
  
}

function d(array $arr){//debug array's  
  print("<pre>");
  
  print_r($arr);
  
  print("</pre>");
}

function o($o){//Obfuscate
  $o = uniqid($o.".", true);
	$s = explode(" ", "A B C D E F G H I J K L M N O P Q R S T U V W X Y Z a b c d e f g h i j k l m n o p q r s t u v w x y z 0 1 2 3 4 5 6 7 8 9 [ ] ; ' , . / - = _ + { } | : < > ? ` ~ ! @ # $ % ^ & * ( )");
	$i = 64;
	$c = count($s);
	$k = array();
	
	while($i >= 0){
		$k[] = $s[rand(0,$c)];
		$i=$i-1;
	}
	
	return md5(hash("sha256", $o.serialize($k)));  
}