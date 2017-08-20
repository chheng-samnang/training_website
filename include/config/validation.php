<?php
function validate_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function displayMsg($string="",$status){
	if($status="error"){
		return $string;
	}else{
		return " Login Successfuly".$string;
	}
}
 ?>
