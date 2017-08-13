<?php
check_session();
function check_session(){
  if(empty($_SESSION))
  {
    header("location:login.php");
    exit();
  }
}
?>
