<?php
$str = $_GET['q'];
$pass = $_GET['p'];

if(strcmp($str,$pass)==0){
  return true;
}else {
  echo "Password and Confirm Password not match!";
}
 ?>
