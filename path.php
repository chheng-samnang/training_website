<?php
$request_URI = $_SERVER['REQUEST_URI']=="/training_website/index.php"?"/training_website/":$_SERVER['REQUEST_URI'];
$path = "http://" . $_SERVER['SERVER_NAME'].":8888".  $request_URI;
$path_admin = "http://" . $_SERVER['SERVER_NAME'].":8888/training_website/";
$include = "include/config/";
?>
