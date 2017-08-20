<?php
function validate_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


function displayMsg($str,$state)
{
  if($state=="error"){
      return '<i class="glyphicon glyphicon-exclamation-sign"></i> '.$str;
  }else {
      return '<i class="glyphicon glyphicon-ok-circle"></i> '.$str;
  }

}
 ?>
